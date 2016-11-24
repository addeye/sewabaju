<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 02/11/2016
 * Time: 13:10
 */
class Baju extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('baju_model','model');
        $this->load->model('kategori_model','kmodel');
        $this->load->model('partner_model','pmodel');

        $this->session->set_flashdata('parent_menu_active', 'master');
        $this->session->set_flashdata('child_menu_active', 'baju');
    }

    public function index()
    {
        $data['partner'] = $this->model->getAll();
        $data = array(
            'header_title' => 'Baju',
            'header_desc' => 'Master',
            'link_add' => site_url('master/baju/add'),
            'link_edit' => site_url('master/baju/update/'),
            'link_import' => site_url('master/baju/import'),
            'link_delete' => site_url('master/baju/delete'),
            'link_customerhistory' => site_url('master/baju/history_customer'),
            'data' => $this->model->getAll()
        );

        $content = 'baju/v_baju_table';

        $this->pinky->output($data,$content);
    }

    public function add()
    {
        $data = array(
            'header_title' => 'Form Baju',
            'header_desc' => 'Master',
            'link_back' => site_url('master/baju'),
            'link_act' => site_url('master/baju/do_add'),
            'kategori' => $this->kmodel->getAll(),
            'partner' => $this->pmodel->getAll(),
        );
        $content = 'baju/v_baju_add';
        $this->pinky->output($data,$content);
    }

    public function do_add()
    {
        $name = $this->input->post('name');
        $code = $this->model->getkode();
        $colour = $this->input->post('colour');
        $kategori = $this->input->post('kategori');
        $hpp_price = $this->input->post('hpp_price');
        $rent_price = $this->input->post('rent_price');
//        $production_price = $this->input->post('production_price');
        $sale_price = $this->input->post('sale_price');
        $qty = $this->input->post('qty');
        $partner = $this->input->post('partner');
        $note = $this->input->post('note');

        $data = array(
            'code' => $code,
            'name' => $name,
            'colour' => $colour,
            'kategori' => $kategori,
            'hpp_price' => $hpp_price,
            'rent_price' => $rent_price,
//            'production_price' => $production_price,
            'sale_price' => $sale_price,
            'qty' => $qty,
            'partner' => $partner,
            'note' => $note,
        );

        if($this->input->post('new_item'))
        {
            $data['new_item'] = $this->input->post('new_item');
        }

        $name_base = $this->input->post('name');
        $name_baju = "baju-".$name_base."-".time();
        $path = 'baju';

//        return var_dump($_FILES['image_file']);

        if($_FILES['image_file'])
        {
            if($_FILES['image_file']['size']!=0)
            {
                $resCover = $this->upload_image('image_file',$name_baju,$path);
                $fileCov = $resCover['data'];
                $data['image'] = $fileCov['file_name'];
            }

        }

        $result = $this->model->create($data);
        if($result)
        {
            alert();
            redirect('master/baju');
        }
    }

    public function update($id)
    {
        $data = array(
            'header_title' => 'Update Baju',
            'header_desc' => 'Master',
            'link_back' => site_url('master/baju'),
            'link_act' => site_url('master/baju/do_update'),
            'd' => $this->model->getId($id),
            'kategori' => $this->kmodel->getAll(),
            'partner' => $this->pmodel->getAll(),
        );

        $content = 'baju/v_baju_update';
        $this->pinky->output($data,$content);
    }

    public function do_update()
    {
        $name = $this->input->post('name');
        $colour = $this->input->post('colour');
        $kategori = $this->input->post('kategori');
        $hpp_price = $this->input->post('hpp_price');
        $rent_price = $this->input->post('rent_price');
//        $production_price = $this->input->post('production_price');
        $sale_price = $this->input->post('sale_price');
        $qty = $this->input->post('qty');
        $partner = $this->input->post('partner');
        $note = $this->input->post('note');

        $id = $this->input->post('id');

        $data = array(
            'name' => $name,
            'colour' => $colour,
            'kategori' => $kategori,
            'hpp_price' => $hpp_price,
            'rent_price' => $rent_price,
//            'production_price' => $production_price,
            'sale_price' => $sale_price,
            'qty' => $qty,
            'partner' => $partner,
            'note' => $note,
        );
        if($this->input->post('new_item'))
        {
            $data['new_item'] = $this->input->post('new_item');
        }

        $condition['id']= $id;

        $name_base = $this->input->post('name');
        $name_baju = "baju-".$name_base."-".time();
        $path = 'baju';

        $this->deletefileimages('baju',$id);

        if($_FILES['image_file'])
        {
            if($_FILES['image_file']['size']!=0)
            {
                $resCover = $this->upload_image('image_file',$name_baju,$path);
                $fileCov = $resCover['data'];
                $data['image'] = $fileCov['file_name'];
            }

        }

        $result = $this->model->update($id,$data);
        if($result)
        {
            alert(2);
            redirect('master/baju/update/'.$id);
        }
    }

    public function delete($id)
    {
        $this->deletefileimages('baju',$id);
        $data['status'] = '1';
        $result = $this->model->update($id,$data);
        if($result)
        {
            alert(3);
        }
    }

    public function upload_image($input,$filename,$path)
    {
        $config['upload_path']          = './uploads/'.$path;
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 2048;
        $config['file_name']            = $filename;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($input))
        {
            $error = $this->upload->display_errors();

            $data  =array(
                'status' => FALSE,
                'message' => $error
            );

            return $data;
        }
        else
        {
            $data = $this->upload->data();

            $data = array(
                'status' => TRUE,
                'message' => "Successfully upload Image",
                'data' => $data
            );

            return $data;
        }
    }

    public function deletefileimages($dir,$id)
    {
        $data = $this->model->getId($id);
        $file = $data->image;
        if($file!=''){
            $path = "./uploads/".$dir."/".$file;
            $act = @unlink($path);
        }
    }

    public function import()
    {
        $data = array(
            'header_title' => 'Import Baju',
            'header_desc' => 'Master',
            'link_back' => site_url('master/baju'),
            'link_act' => site_url('master/baju/do_import'),
            'link_download' => base_url('uploads/master/template_baju.xlsx'),
        );

        $content = 'baju/v_baju_import';
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
                "colour"=> $rowData[0][1],
                "kategori"=> $rowData[0][2],
                "hpp_price"=> $rowData[0][3],
                "rent_price"=> $rowData[0][4],
                "sale_price"=> $rowData[0][5],
                "note"=> $rowData[0][6],
                "code" => $this->model->getkode()
            );

//            return var_dump($data);

            //sesuaikan nama dengan nama tabel
            $insert = $this->model->create($data);

        }
        unlink($media['full_path']);
        alert();
        redirect('master/baju');
    }

    public function history_customer($idbaju)
    {
        $customer = array();
        $dataRow = $this->model->getCustomerRentById($idbaju);
        if($dataRow)
        {
            foreach($dataRow as $row)
            {
                $customer[] = $row->mcustomer->name.' - '.$row->mcustomer->address;
            }
        }

        $data['customer'] = array_unique($customer);
        $this->load->view('baju/v_baju_history',$data);
    }
}