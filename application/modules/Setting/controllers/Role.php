<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 04/11/2016
 * Time: 15:36
 */
class Role extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('role_model','model');

        $this->session->set_flashdata('parent_menu_active', 'setting');
        $this->session->set_flashdata('child_menu_active', 'user_group');
    }

    public function access($id)
    {
        $data = array(
            'header_title' => 'Form Role',
            'header_desc' => 'Master',
            'link_back' => site_url('setting/group'),
            'link_act' => site_url('setting/role/do_access'),
            'id' => $id,
            'role' => $this->model->getByGroup($id)
        );

        if($data['role'])
        {
            $data['link_act'] = site_url('setting/role/update_access');
        }

        $content = 'role/v_role_add';
        $this->pinky->output($data,$content);
    }

    public function update_access()
    {

    }

    public function do_access()
    {
        $group_id = $this->input->post('group_id');
        $attr = $this->input->post('attr');

        foreach(modul() as $key=>$val)
        {
            $data['group_id'] = $group_id;
            $data['modul'] = $key;
            $m = $attr[$key];
            $data['c'] = isset($m['c'])?'1':'0';
            $data['r'] = isset($m['r'])?'1':'0';
            $data['u'] = isset($m['u'])?'1':'0';
            $data['d'] = isset($m['d'])?'1':'0';

            $this->model->create($data);
        }
        alert();
        redirect('setting/role/access/'.$group_id);
    }
}