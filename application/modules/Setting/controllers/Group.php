<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 02/11/2016
 * Time: 13:10
 */
class Group extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('group_model','model');
        $this->load->model('role_model','rmodel');

        $this->session->set_flashdata('parent_menu_active', 'setting');
        $this->session->set_flashdata('child_menu_active', 'user_group');
    }

    public function index()
    {
        $data = array(
            'header_title' => 'Group',
            'header_desc' => 'Master',
            'link_add' => site_url('setting/group/add'),
            'link_edit' => site_url('setting/group/update/'),
            'link_delete' => site_url('setting/group/delete'),
            'link_access' => site_url('setting/role/access/'),
            'data' => $this->model->getAll()
        );
        $content = 'group/v_group_table';

        $this->pinky->output($data,$content);
    }

    public function add()
    {
        $data = array(
            'header_title' => 'Form Group',
            'header_desc' => 'Master',
            'link_back' => site_url('setting/group'),
            'link_act' => site_url('setting/group/do_add'),
        );
        $content = 'group/v_group_add';
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
            redirect('setting/group');
        }
    }

    public function update($id)
    {
        $data = array(
            'header_title' => 'Update Group',
            'header_desc' => 'Master',
            'link_back' => site_url('setting/group'),
            'link_act' => site_url('setting/group/do_update'),
            'd' => $this->model->getId($id)
        );

        $content = 'group/v_group_update';
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
            redirect('setting/group');
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