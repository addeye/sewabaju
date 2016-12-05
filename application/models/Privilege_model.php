<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 03/12/2016
 * Time: 14:18
 */
class Privilege_model extends Base_model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function active($modul,$group_id,$act)
    {
        $table = 'm_role';
        $status=0;
        $condition['modul'] = $modul;
        $condition['group_id'] = $group_id;

        $result = $this->getData($table,$condition)->row();

        switch ($act)
        {
            case 'create':
                $status = $result->c;
                break;
            case 'read':
                $status = $result->r;
                break;
            case 'update':
                $status = $result->u;
                break;
            case 'delete':
                $status = $result->d;
                break;
        }

        if($status)
        {
            return TRUE;
        }
        return FALSE;
    }
}