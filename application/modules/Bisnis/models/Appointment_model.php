<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 02/11/2016
 * Time: 13:26
 */
class Appointment_model extends Base_model
{
    protected $table = 'm_appointment';
    protected $table_baju = 'm_baju';
    protected $table_acessories = 'm_accessories';
    protected $tr_item = 'tr_item';
    protected $tr_accessories = 'tr_accessories';
    protected $mdeal = 'm_deal';
    protected $mcompany = 'm_company';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('../../master/models/customer_model','cmodel');
    }

    public function getAll()
    {
        $condition['deleted']='0';
        $pagedata = $this->getData($this->table,$condition)->result();
        foreach($pagedata as $key=>$row)
        {
            $pagedata[$key]->mcustomer = $this->cmodel->getId($row->customer_id);
            $pagedata[$key]->mdeal = $this->getData($this->mdeal,array('appointment_id'=>$row->id))->result();
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
        $kode = $this->getkodeunik($this->table,'APP');
        return $kode;
    }

    public function getBaju()
    {
        $result = $this->get($this->table_baju)->result();
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function getAccessories()
    {
        $result = $this->get($this->table_acessories)->result();
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function getBajuById($id)
    {
        $condition['id'] = $id;
        $result = $this->getData($this->table_baju,$condition)->row();
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function getAccessoriesById($id)
    {
        $condition['id'] = $id;
        $result = $this->getData($this->table_acessories,$condition)->row();
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function addItem($data=array())
    {
        $result = $this->addData($this->tr_item,$data);
        if($result)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function getTrItem($appointment_id)
    {
        $condition['appointment_id'] = $appointment_id;
        $result = $this->getData($this->tr_item,$condition)->result();
        foreach($result as $key=>$row)
        {
            $result[$key]->mbaju = $this->getData($this->table_baju,array('id'=>$row->baju_id))->row();
        }
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function delAllTrItem($appointment_id)
    {
        $condition['appointment_id'] = $appointment_id;
        $result = $this->deleteData($this->tr_item,$condition);
        if($result)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function delItemId($id)
    {
        $condition['id'] = $id;
        $result = $this->deleteData($this->tr_item,$condition);
        if($result)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function addAccessories($data=array())
    {
        $result = $this->addData($this->tr_accessories,$data);
        if($result)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function getTrAccessories($appointment_id)
    {
        $condition['appointment_id'] = $appointment_id;
        $result = $this->getData($this->tr_accessories,$condition)->result();
        foreach($result as $key=>$row)
        {
            $result[$key]->maccessories = $this->getData($this->table_acessories,array('id'=>$row->accessories_id))->row();
        }
        if($result)
        {
            return $result;
        }
        return [];
    }

    public function delAllTrAccessories($appointment_id)
    {
        $condition['appointment_id'] = $appointment_id;
        $result = $this->deleteData($this->tr_accessories,$condition);
        if($result)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function delAccessoriesId($id)
    {
        $condition['id'] = $id;
        $result = $this->deleteData($this->tr_accessories,$condition);
        if($result)
        {
            return TRUE;
        }
        return FALSE;
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

    public function getCustomerById($id)
    {
        $result = $this->getData($this->table,array('customer_id'=>$id))->result();
        if($result)
        {
            return $result;
        }
        return [];
    }

}