<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 10/09/2016
 * Time: 23:21
 */
class Log_model extends Base_model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save($param)
    {
        $sql        = $this->db->insert_string('m_log',$param);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    public function savebarang($id,$data=array())
    {
        $condition['id']=$id;
        return $this->updateData('m_barang',$data,$condition);
    }

    public function getBarangById($id)
    {
        $result = $this->getData('m_barang',array('id'=>$id))->row();
        return $result;
    }

    public function updateTransBuy($id,$data=array())
    {
        $condition['id'] = $id;
        return $this->updateData('trans_buy',$data,$condition);
    }

    public function getTransBuyById($id)
    {
        $result = $this->getData('trans_buy',array('id'=>$id))->row();
        return $result;
    }
}