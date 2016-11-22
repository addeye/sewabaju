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
        $result = $this->model->delete($id);
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
}