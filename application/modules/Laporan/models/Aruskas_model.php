<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 25/11/2016
 * Time: 11:11
 */
class Aruskas_model extends Base_model
{
    protected $mdeal = 'm_deal';
    protected $mappointemnt = 'm_appointment';
    protected $tritem = 'tr_item';
    protected $mcompany = 'm_company';
    protected $mbaju = 'm_baju';

    public function __construct()
    {
        parent::__construct();
    }

    public function getDeal($from,$to)
    {
        $condition['date_dp >= '] = $from;
        $condition['date_dp <= '] = $to;
        $result = $this->getData($this->mdeal,$condition)->result();

        foreach($result as $key=>$row)
        {
            $result[$key]->mappointment = $this->getData($this->mappointemnt,array('id'=>$row->appointment_id))->row();
            $result[$key]->tritem = $this->getData($this->tritem,array('appointment_id'=>$row->appointment_id))->result();
        }

        if($result)
        {
            return $result;
        }
        return [];
    }

    public function getIdBaju($id)
    {
        $result = $this->getData($this->mbaju,array('id'=>$id))->row();

        if($result)
        {
            return $result;
        }
        return [];
    }

    public function getCompany()
    {
        $result = $this->getData($this->mcompany,array('id'=>1))->row();
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function getAllBaju()
    {
        $total=array();
        $condition['partner']=0;
        $result = $this->getData($this->mbaju,$condition)->result();
        foreach($result as $key=>$row)
        {
            $trData = $this->getData($this->tritem,array('baju_id'=>$row->id))->result();
            $result[$key]->tritem = $trData;
            $result[$key]->balance = $row->hpp_price<0?abs($row->hpp_price):0-$row->hpp_price;
        }

        if($result)
        {
            return $result;
        }
        return [];
    }
}