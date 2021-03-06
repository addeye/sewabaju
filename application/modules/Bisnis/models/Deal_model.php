<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 02/11/2016
 * Time: 13:26
 */
class Deal_model extends Base_model
{
    protected $table = 'm_deal';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('../../master/models/customer_model','cmodel');
        $this->load->model('appointment_model','amodel');
    }

    public function getAll()
    {
        $pagedata = $this->get($this->table)->result();
        foreach($pagedata as $key=>$row)
        {
            $pagedata[$key]->mcustomer = $this->cmodel->getId($row->customer_id);
        }
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function getId($id)
    {
        $condition['id']=$id;
        $pagedata = $this->getData($this->table,$condition)->row();
        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function getDataByAppointment($appointment_id)
    {
        $condition['appointment_id'] = $appointment_id;
        $pagedata = $this->getData($this->table,$condition)->row();
        if($pagedata)
        {
            $pagedata->mcustomer = $this->cmodel->getId($pagedata->customer_id);
        }

        if($pagedata)
        {
            return $pagedata;
        }
        return [];
    }

    public function create($data=array())
    {
        $query = $this->addData($this->table,$data);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function update($id,$data=array())
    {
        $condition['id'] = $id;
        $query = $this->updateData($this->table,$data,$condition);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function updateByApp($id,$data=array())
    {
        $condition['appointment_id'] = $id;
        $query = $this->updateData($this->table,$data,$condition);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function delete($id)
    {
        $condition['id']=$id;
        $query = $this->deleteData($this->table,$condition);
        if($query)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function getkode()
    {
        $kode = $this->getkodeunik($this->table,'DL');
        return $kode;
    }

}