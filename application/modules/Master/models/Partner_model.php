<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 02/11/2016
 * Time: 13:26
 */
class Partner_model extends Base_model
{
    protected $table = 'm_partner';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $pagedata = $this->getData($this->table,array('status'=>0))->result();
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
        $kode = $this->getkodeunik($this->table,'PA');
        return $kode;
    }

}