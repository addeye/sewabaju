<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 02/11/2016
 * Time: 13:10
 */
class Kategori extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model','model');

        $this->session->set_flashdata('parent_menu_active', 'master');
        $this->session->set_flashdata('child_menu_active', 'kategori');
    }

    public function index()
    {
        $data = array(
            'header_title' => 'Kategori',
            'header_desc' => 'Master',
            'link_add' => site_url('master/kategori/add'),
            'link_import' => site_url('master/kategori/import'),
            'link_edit' => site_url('master/kategori/update/'),
            'link_delete' => site_url('master/kategori/delete'),
            'data' => $this->model->getAll()
        );
        $content = 'kategori/v_kategori_table';

        $this->pinky->output($data,$content);
    }

    public function add()
    {
        $data = array(
            'header_title' => 'Form Kategori',
            'header_desc' => 'Master',
            'link_back' => site_url('master/kategori'),
            'link_act' => site_url('master/kategori/do_add'),
        );
        $content = 'kategori/v_kategori_add';
        $this->pinky->output($data,$content);
    }

    public function do_add()
    {
        $name = $this->input->post('name');

        $data = array(
            'name' => $name,
        );

        $result = $this->model->create($data);
        if($result)
        {
            alert();
            redirect('master/kategori');
        }
    }

    public function update($id)
    {
        $data = array(
            'header_title' => 'Update Kategori',
            'header_desc' => 'Master',
            'link_back' => site_url('master/kategori'),
            'link_act' => site_url('master/kategori/do_update'),
            'd' => $this->model->getId($id)
        );

        $content = 'kategori/v_kategori_update';
        $this->pinky->output($data,$content);
    }

    public function do_update()
    {
        $name = $this->input->post('name');

        $id = $this->input->post('id');

        $data = array(
            'name' => $name,
        );

        $condition['id']= $id;
        $result = $this->model->update($id,$data);
        if($result)
        {
            alert(2);
            redirect('master/kategori');
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

    public function import()
    {
        $data = array(
            'header_title' => 'Import Kategori',
            'header_desc' => 'Master',
            'link_back' => site_url('master/kategori'),
            'link_act' => site_url('master/kategori/do_import'),
            'link_download' => base_url('uploads/master/template_kategori.xlsx'),
        );

        $content = 'kategori/v_kategori_import';
        $this->pinky->output($data,$content);
    }

    public function do_import()
    {
        $this->load->library('Libexcel');

        $fileName = time().$_FILES['file']['name'];

        $config['upload_path'] = './uploads/master/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if(! $this->upload->do_upload('file') )
            $this->upload->display_errors();

        $media = $this->upload->data();

        $inputFileName = './uploads/master/'.$media['file_name'];

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
            );

            //sesuaikan nama dengan nama tabel
            $insert = $this->model->create($data);
            delete_files($media['file_path']);

        }
        alert();
        redirect('master/kategori');
    }
}