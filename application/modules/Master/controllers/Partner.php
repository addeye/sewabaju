<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 02/11/2016
 * Time: 13:10
 */
class Partner extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('partner_model','model');
    }

    public function index()
    {
        $data['partner'] = $this->model->getAll();
        $data = array(
            'header_title' => 'Partner',
            'header_desc' => 'Master',
            'link_add' => site_url('master/partner/add'),
            'link_edit' => site_url('master/partner/update/'),
            'link_delete' => site_url('master/partner/delete'),
            'partner' => $this->model->getAll()
        );
        $content = 'partner/v_partner_table';

        $this->pinky->output($data,$content);
    }

    public function add()
    {
        $data = array(
            'header_title' => 'Form Partner',
            'header_desc' => 'Master',
            'link_back' => site_url('master/partner'),
            'link_act' => site_url('master/partner/do_add'),
        );
        $content = 'partner/v_partner_add';
        $this->pinky->output($data,$content);
    }

    public function do_add()
    {
        $name = $this->input->post('name');
        $code = $this->model->getkode();
        $born_date = $this->input->post('born_date');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');

        $data = array(
            'code' => $code,
            'name' => $name,
            'born_date' => $born_date,
            'phone' => $phone,
            'address' => $address,
        );

        $result = $this->model->create($data);
        if($result)
        {
            alert();
            redirect('master/partner');
        }
    }

    public function update($id)
    {
        $data = array(
            'header_title' => 'Update Partner',
            'header_desc' => 'Master',
            'link_back' => site_url('master/partner'),
            'link_act' => site_url('master/partner/do_update'),
            'd' => $this->model->getId($id)
        );

        $content = 'partner/v_partner_update';
        $this->pinky->output($data,$content);
    }

    public function do_update()
    {
        $name = $this->input->post('name');
        $code = $this->model->getkode();
        $born_date = $this->input->post('born_date');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');

        $id = $this->input->post('id');

        $data = array(
            'code' => $code,
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
            redirect('master/partner');
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