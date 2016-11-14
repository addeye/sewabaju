<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 02/11/2016
 * Time: 13:10
 */
class Promo extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('promo_model','model');
    }

    public function index()
    {
        $data = array(
            'header_title' => 'Promo',
            'header_desc' => 'Master',
            'link_add' => site_url('master/promo/add'),
            'link_edit' => site_url('master/promo/update/'),
            'link_delete' => site_url('master/promo/delete'),
            'data' => $this->model->getAll()
        );
        $content = 'promo/v_promo_table';

        $this->pinky->output($data,$content);
    }

    public function add()
    {
        $data = array(
            'header_title' => 'Form Promo',
            'header_desc' => 'Master',
            'link_back' => site_url('master/promo'),
            'link_act' => site_url('master/promo/do_add'),
        );
        $content = 'promo/v_promo_add';
        $this->pinky->output($data,$content);
    }

    public function do_add()
    {
        $name = $this->input->post('name');
        $note = $this->input->post('note');
        $disc = $this->input->post('disc');

        $data = array(
            'name' => $name,
            'note' => $note,
            'disc' => $disc,
        );

        $result = $this->model->create($data);
        if($result)
        {
            alert();
            redirect('master/promo');
        }
    }

    public function update($id)
    {
        $data = array(
            'header_title' => 'Update Promo',
            'header_desc' => 'Master',
            'link_back' => site_url('master/promo'),
            'link_act' => site_url('master/promo/do_update'),
            'd' => $this->model->getId($id)
        );

        $content = 'promo/v_promo_update';
        $this->pinky->output($data,$content);
    }

    public function do_update()
    {
        $name = $this->input->post('name');
        $note = $this->input->post('note');
        $disc = $this->input->post('disc');

        $id = $this->input->post('id');

        $data = array(
            'name' => $name,
            'note' => $note,
            'disc' => $disc,
        );

        $condition['id']= $id;
        $result = $this->model->update($id,$data);
        if($result)
        {
            alert(2);
            redirect('master/promo');
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