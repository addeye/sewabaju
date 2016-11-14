<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 02/11/2016
 * Time: 13:10
 */
class Acces extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('acces_model','model');
        $this->load->model('partner_model','pmodel');
    }

    public function index()
    {
        $data = array(
            'header_title' => 'Accessories',
            'header_desc' => 'Master',
            'link_add' => site_url('master/acces/add'),
            'link_edit' => site_url('master/acces/update/'),
            'link_delete' => site_url('master/acces/delete'),
            'data' => $this->model->getAll()
        );
        $content = 'acces/v_acces_table';

        $this->pinky->output($data,$content);
    }

    public function add()
    {
        $data = array(
            'header_title' => 'Form Accessories',
            'header_desc' => 'Master',
            'link_back' => site_url('master/acces'),
            'link_act' => site_url('master/acces/do_add'),
            'partner' => $this->pmodel->getAll(),
        );
        $content = 'acces/v_acces_add';
        $this->pinky->output($data,$content);
    }

    public function do_add()
    {
        $code = $this->model->getKode();
        $name = $this->input->post('name');
        $rent_price = $this->input->post('rent_price');
        $sale_price = $this->input->post('sale_price');
        $partner = $this->input->post('partner');

        $data = array(
            'code' => $code,
            'name' => $name,
            'rent_price' => $rent_price,
            'sale_price' => $sale_price,
            'partner' => $partner,
        );

        $result = $this->model->create($data);
        if($result)
        {
            alert();
            redirect('master/acces');
        }
    }

    public function update($id)
    {
        $data = array(
            'header_title' => 'Update Accessories',
            'header_desc' => 'Master',
            'link_back' => site_url('master/acces'),
            'link_act' => site_url('master/acces/do_update'),
            'd' => $this->model->getId($id),
            'partner' => $this->pmodel->getAll(),
        );

        $content = 'acces/v_acces_update';
        $this->pinky->output($data,$content);
    }

    public function do_update()
    {
        $name = $this->input->post('name');
        $rent_price = $this->input->post('rent_price');
        $sale_price = $this->input->post('sale_price');
        $partner = $this->input->post('partner');

        $id = $this->input->post('id');

        $data = array(
            'name' => $name,
            'rent_price' => $rent_price,
            'sale_price' => $sale_price,
            'partner' => $partner,
        );

        $condition['id']= $id;
        $result = $this->model->update($id,$data);
        if($result)
        {
            alert(2);
            redirect('master/acces');
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