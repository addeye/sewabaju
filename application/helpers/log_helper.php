<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 10/09/2016
 * Time: 22:30
 */
if(!function_exists('helper_log'))
{
    function helper_log($tipe = "", $str = "")
    {
        $CI = & get_instance();

        if (strtolower($tipe) == "login"){
            $log_tipe   = 0;
        }
        elseif(strtolower($tipe) == "logout")
        {
            $log_tipe   = 1;
        }
        elseif(strtolower($tipe) == "add"){
            $log_tipe   = 2;
        }
        elseif(strtolower($tipe) == "edit"){
            $log_tipe  = 3;
        }
        else{
            $log_tipe  = 4;
        }

        // paramter
        $param['log_user']      = $CI->session->userdata('name');
        $param['log_tipe']      = $log_tipe;
        $param['log_desc']      = $str;

        //load model log
        $CI->load->model('log_model');

        //save to database
        $CI->log_model->save($param);

    }
}

if(!function_exists('savebarang'))
{
    function savebarang($id,$data=array(),$act=1)
    {
        $CI = & get_instance();

        //load model log
        $CI->load->model('log_model');

        //call data
        $row = $CI->log_model->getBarangById($id);
        $old_stock = $row->stock;

        switch ($act)
        {
            case 1:
                $data['stock'] = $data['stock']+$old_stock;
                //save to database
                $CI->log_model->savebarang($id,$data);
                break;
            case 0:
                $data['stock'] = $old_stock-$data['stock'];
                //save to database
                $CI->log_model->savebarang($id,$data);
                break;
        }

        //save to database
//        $CI->log_model->savebarang($id,$data);

    }
}

if(!function_exists('role'))
{
    function role($modul,$act)
    {
        $CI = & get_instance();

        $level = $CI->session->level;

        /*Call Status*/
        $result = $CI->privilege_model->active($modul,$level,$act);

        if(!$result)
        {
            redirect('welcome/denied');
        }
        return TRUE;
    }
}
