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
    }

    public function index()
    {
        $data = array(
            'header_title' => 'Kategori',
            'header_desc' => 'Master',
            'link_add' => site_url('master/kategori/add'),
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
        $result = $this->model->delete($id);
        if($result)
        {
            alert(3);
        }
    }
}