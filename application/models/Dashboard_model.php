<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 21/10/2016
 * Time: 10:07
 */
class Dashboard_model extends Base_model
{
    protected $tritem = 'tr_item';
    protected $mcustomer = 'm_customer';
    protected $mbaju = 'm_baju';
    protected $mdeal = 'm_deal';
    protected $maccessories = 'm_accessories';
    protected $mappointment = 'm_appointment';

    public function __construct()
    {
        parent::__construct();
    }

    public function getDataAllTr()
    {
        $data = $this->getData($this->tritem,array('returned'=>NULL))->result();
        foreach($data as $key=>$val)
        {
            $data[$key]->mcustomer = $this->getData($this->mcustomer,array('id'=>$val->customer_id))->row();
            $data[$key]->mbaju = $this->getData($this->mbaju,array('id'=>$val->baju_id))->row();
            $data[$key]->mdeal = $this->getData($this->mdeal,array('appointment_id'=>$val->appointment_id))->row();
        }

        if($data)
        {
            return $data;
        }
        return [];
    }

    public function getFittingDate()
    {
        $data = $this->getData($this->mdeal,array('fitting'=>NULL))->result();
        foreach($data as $key=>$row)
        {
            $data[$key]->mcustomer = $this->getData($this->mcustomer,array('id'=>$row->customer_id))->row();
        }
        if($data)
        {
            return $data;
        }
        return [];
    }
}