<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 21/11/2016
 * Time: 11:19
 */
class History extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('appointment_model','model');
    }

    public function index()
    {
        $data = array(
            'header_title' => 'Appointment',
            'header_desc' => 'Master',
            'link_invoice' => site_url('bisnis/appointment/invoice/'),
            'link_delivery' => site_url('bisnis/appointment/delivery/'),
            'data' => $this->model->getHistory()
        );

        foreach($data['data'] as $key=>$row)
        {

            $data['data'][$key]->status_data = $row->status==STATUS_SIAP_AMBIL ? 'Pick Up':'Return';
            $data['data'][$key]->link_change = $row->status==STATUS_SIAP_AMBIL ? site_url('bisnis/appointment/pickup/'.$row->id):site_url('bisnis/appointment/kembali/'.$row->id);
        }

        $content = 'history/v_history_table';

        $this->pinky->output($data,$content);
    }
}