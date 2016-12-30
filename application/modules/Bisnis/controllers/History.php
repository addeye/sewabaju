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
        $this->load->model('../../master/models/customer_model','cmodel');
        $this->load->model('deal_model','dmodel');
        $this->load->model('made_model','mmodel');

        $this->session->set_flashdata('parent_menu_active', 'bisnis');
        $this->session->set_flashdata('child_menu_active', 'history');
    }

    public function index()
    {
        role(MODUL_HISTORY_SEWA_BAJU,'read');

        $data = array(
            'header_title' => 'Appointment',
            'header_desc' => 'Master',
            'link_invoice' => site_url('bisnis/history/invoice/'),
            'link_delivery' => site_url('bisnis/history/delivery/'),
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

    public function invoice($appointment_id)
    {
        $data['deal'] = $this->dmodel->getDataByAppointment($appointment_id);
        $data['appointment'] = $this->model->getId($appointment_id);

        $traccessories = $this->model->getTrAccessories($appointment_id);
        $tritem = $this->model->getTrItem($appointment_id);
        $dpromo = $this->model->getDpromo($appointment_id);
        $trjobs = $this->model->getTrJobs($appointment_id);
        $trmade = $this->model->getTrMade($appointment_id);

        foreach($tritem as $row)
        {
            $product[] = array(
                'name' => $row->mbaju->name,
                'qty' => $row->qty,
                'total' => rupiah($row->total)
            );
        }

        foreach ($dpromo as $dp) {
            foreach($dp->trpromo as $row)
            {
                $product[] = array(
                    'name' => $row->mbaju?$row->mbaju->name:'Belum Milih',
                    'qty' => $row->qty,
                    'total' => rupiah($row->total)
                );
            }
        }

        foreach($traccessories as $row)
        {
            $product[] = array(
                'name' => $row->maccessories->name,
                'qty' => $row->qty,
                'total' => rupiah($row->total)
            );
        }

        foreach($trjobs as $row)
        {
            $product[] = array(
                'name' => $row->job,
                'qty' => '-',
                'total' => rupiah($row->price)
            );
        }

        foreach($trmade as $row)
        {
            $product[] = array(
                'name' => $row->disc,
                'qty' => '-',
                'total' => rupiah($row->price)
            );
        }

        $data['product'] = $product;
//        return var_dump($data);
        $data['company'] = $this->model->getCompany();
        $this->load->view('history/v_invoice',$data);
    }

    public function delivery($appointment_id)
    {
        $data['deal'] = $this->dmodel->getDataByAppointment($appointment_id);
        $data['appointment'] = $this->model->getId($appointment_id);
        $data['appointment']->title = $data['appointment']->status==STATUS_DIPINJAM ?'DATE OF PICK UP' : 'DATE OF RETURN';
        $data['appointment']->date_delivery = $data['appointment']->status==STATUS_DIPINJAM ? $data['appointment']->pickuped : $data['appointment']->returned;
        $data['appointment']->ttd = $data['appointment']->status == STATUS_DIPINJAM ? $data['appointment']->ttd_pickup : $data['appointment']->ttd_return;
        $data['traccessories'] = $this->model->getTrAccessories($appointment_id);
        $data['tritem'] = $this->model->getTrItem($appointment_id);
        $data['trjobs'] = $this->model->getTrJobs($appointment_id);
        $data['trmade'] = $this->model->getTrMade($appointment_id);

        $data['company'] = $this->model->getCompany();
        $this->load->view('history/v_delivery',$data);
    }
}