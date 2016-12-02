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
}