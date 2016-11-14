<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 02/11/2016
 * Time: 13:10
 */
class User extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model','model');
    }

    public function index()
    {
        $data = array(
            'header_title' => 'User',
            'header_desc' => 'Master',
            'link_add' => site_url('setting/user/add'),
            'link_edit' => site_url('setting/user/update/'),
            'link_delete' => site_url('setting/user/delete'),
            'data' => $this->model->getAll()
        );
        $content = 'user/v_user_table';

        $this->pinky->output($data,$content);
    }

    public function add()
    {
        $data = array(
            'header_title' => 'Form User',
            'header_desc' => 'Master',
            'link_back' => site_url('setting/user'),
            'link_act' => site_url('setting/user/do_add'),
        );
        $content = 'user/v_user_add';
        $this->pinky->output($data,$content);
    }

    public function do_add()
    {
        $name = $this->input->post('name');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $data = array(
            'name' => $name,
            'username' => $username,
            'password' => $password,
        );

        $result = $this->model->create($data);
        if($result)
        {
            alert();
            redirect('setting/user');
        }
    }

    public function update($id)
    {
        $data = array(
            'header_title' => 'Update User',
            'header_desc' => 'Master',
            'link_back' => site_url('setting/user'),
            'link_act' => site_url('setting/user/do_update'),
            'd' => $this->model->getId($id)
        );

        $content = 'user/v_user_update';
        $this->pinky->output($data,$content);
    }

    public function do_update()
    {
        $name = $this->input->post('name');
        $username = $this->input->post('username');

        $id = $this->input->post('id');

        $data = array(
            'name' => $name,
            'username' => $username,
        );
        if($this->input->post('password'))
        {
            $data['password'] = md5($this->input->post('password'));
        }
        $condition['id']= $id;
        $result = $this->model->update($id,$data);
        if($result)
        {
            alert(2);
            redirect('setting/user');
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