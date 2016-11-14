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
    }

    public function access($id)
    {
        $data = array(
            'header_title' => 'Form Role',
            'header_desc' => 'Master',
            'link_back' => site_url('setting/group'),
            'link_act' => site_url('setting/role/do_access'),
            'id' => $id
        );
        $content = 'role/v_role_add';
        $this->pinky->output($data,$content);
    }

    public function do_access()
    {
        $group_id = $this->input->post('group_id');
        $attr = $this->input->post('attr');
        return var_dump($attr['User']['create']);

        foreach(modul() as $key=>$val)
        {
            $modul = $this->input->post($val);
            $data['group_id'] = $group_id;
            $data['modul'] = $key;

            return var_dump($modul);
        }

        for($i=0; $i<count($modul); $i++)
        {
            $data = array(
                'group_id' => $group_id[$i],
                'modul' => $modul[$i],
                'c' => $create[$i],
            );
        }
    }
}