<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 02/11/2016
 * Time: 13:10
 */
class Customer extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model','model');

        $this->session->set_flashdata('parent_menu_active', 'master');
        $this->session->set_flashdata('child_menu_active', 'customer');
    }

    public function index()
    {
        $data = array(
            'header_title' => 'Customer',
            'header_desc' => 'Master',
            'link_add' => site_url('master/customer/add'),
            'link_edit' => site_url('master/customer/update/'),
            'link_import' => site_url('master/customer/import'),
            'link_delete' => site_url('master/customer/delete'),
            'link_appointment' => site_url('master/customer/appointment'),
            'data' => $this->model->getAll()
        );
        $content = 'customer/v_customer_table';

        $this->pinky->output($data,$content);
    }

    public function add()
    {
        $data = array(
            'header_title' => 'Form Customer',
            'header_desc' => 'Master',
            'link_back' => site_url('master/customer'),
            'link_act' => site_url('master/customer/do_add'),
        );
        $content = 'customer/v_customer_add';
        $this->pinky->output($data,$content);
    }

    public function do_add()
    {
        $name = $this->input->post('name');
        $card = $this->model->getkode();
        $born_date = $this->input->post('born_date');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');

        $data = array(
            'card' => $card,
            'name' => $name,
            'born_date' => $born_date,
            'phone' => $phone,
            'address' => $address,
        );

        $result = $this->model->create($data);
        if($result)
        {
            alert();
            redirect('master/customer');
        }
    }

    public function update($id)
    {
        $data = array(
            'header_title' => 'Update Partner',
            'header_desc' => 'Master',
            'link_back' => site_url('master/customer'),
            'link_act' => site_url('master/customer/do_update'),
            'd' => $this->model->getId($id)
        );

        $content = 'customer/v_customer_update';
        $this->pinky->output($data,$content);
    }

    public function do_update()
    {
        $name = $this->input->post('name');
        $card = $this->model->getkode();
        $born_date = $this->input->post('born_date');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');

        $id = $this->input->post('id');

        $data = array(
            'card' => $card,
            'name' => $name,
            'born_date' => $born_date,
            'phone' => $phone,
            'address' => $address,
        );

        $condition['id']= $id;
        $result = $this->model->update($id,$data);
        if($result)
        {
            alert(2);
            redirect('master/customer');
        }
    }

    public function delete($id)
    {
        $data['status'] = '1';
        $result = $this->model->update($id,$data);
        if($result)
        {
            alert(3);
        }
    }

    public function appointment($id)
    {
        $data['appointment'] = $this->model->getHistoryAppointment($id);
        $this->load->view('customer/v_customer_history',$data);
    }

    public function import()
    {
        $data = array(
            'header_title' => 'Import Customer',
            'header_desc' => 'Master',
            'link_back' => site_url('master/customer'),
            'link_act' => site_url('master/customer/do_import'),
            'link_download' => base_url('uploads/master/template_customer.xlsx'),
        );

        $content = 'customer/v_customer_import';
        $this->pinky->output($data,$content);
    }

    public function do_import()
    {
        $this->load->library('Libexcel');

        $fileName = time().$_FILES['file']['name'];

        $config['upload_path'] = './uploads/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if(! $this->upload->do_upload('file') )
            $this->upload->display_errors();

        $media = $this->upload->data();

        $inputFileName = './uploads/'.$media['file_name'];

        $objPHPExcel = $this->libexcel->identifikasi($inputFileName);

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                NULL,
                TRUE,
                FALSE);

            //Sesuaikan sama nama kolom tabel di database
            $data = array(
                "name"=> $rowData[0][0],
                "born_date"=> date('Y-m-d',$this->libexcel->convertDate($rowData[0][1])),
                "phone"=> $rowData[0][2],
                "address"=> $rowData[0][3],
                "card" => $this->model->getkode()
            );

//            return var_dump($data);

            //sesuaikan nama dengan nama tabel
            $insert = $this->model->create($data);
        }
        unlink($media['full_path']);
        alert();
        redirect('master/customer');
    }
}