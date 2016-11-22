<?php

/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 02/11/2016
 * Time: 13:10
 */
class Appointment extends My_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('appointment_model','model');
        $this->load->model('../../master/models/customer_model','cmodel');
        $this->load->model('deal_model','dmodel');
        $this->load->model('made_model','mmodel');

        $this->session->set_flashdata('parent_menu_active', 'bisnis');
        $this->session->set_flashdata('child_menu_active', 'appointment');
    }

    public function index()
    {
        $data = array(
            'header_title' => 'Appointment',
            'header_desc' => 'Master',
            'link_add' => site_url('bisnis/appointment/add'),
            'link_edit' => site_url('bisnis/appointment/update/'),
            'link_delete' => site_url('bisnis/appointment/delete'),
            'link_deal' => site_url('bisnis/appointment/deal/'),
            'link_invoice' => site_url('bisnis/appointment/invoice/'),
            'link_delivery' => site_url('bisnis/appointment/delivery/'),
            'data' => $this->model->getAll()
        );

        foreach($data['data'] as $key=>$row)
        {

            $data['data'][$key]->status_data = $row->status==STATUS_SIAP_AMBIL ? 'Pick Up':'Return';
            $data['data'][$key]->link_change = $row->status==STATUS_SIAP_AMBIL ? site_url('bisnis/appointment/pickup/'.$row->id):site_url('bisnis/appointment/kembali/'.$row->id);
        }

        $content = 'appointment/v_appointment_table';

        $this->pinky->output($data,$content);
    }

    public function add()
    {
        $data = array(
            'header_title' => 'Form Appointment',
            'header_desc' => 'Master',
            'link_back' => site_url('bisnis/appointment'),
            'link_act' => site_url('bisnis/appointment/do_add'),
            'link_cus' => site_url('bisnis/appointment/form_customer'),
            'link_cus_id' => site_url('bisnis/appointment/historyCustomer'),
            'customer' => $this->cmodel->getAll()
        );
        $content = 'appointment/v_appointment_add';
        $this->pinky->output($data,$content);
    }

    public function do_add()
    {
        $code = $this->model->getkode();
        $date = $this->input->post('date');
        $customer_id = $this->input->post('customer_id');
        $note = $this->input->post('note');
        $created_at = date('Y-m-d');

        $data = array(
            'code' => $code,
            'date' => $date,
            'customer_id' => $customer_id,
            'note' => $note,
            'status' => 1,
            'created_at'=>$created_at
        );

        $result = $this->model->create($data);
        if($result)
        {
            alert();
            redirect('bisnis/appointment');
        }
    }

    public function update($id)
    {
        $data = array(
            'header_title' => 'Update Appointment',
            'header_desc' => 'Master',
            'link_back' => site_url('bisnis/appointment'),
            'link_act' => site_url('bisnis/appointment/do_update'),
            'd' => $this->model->getId($id),
            'customer' => $this->cmodel->getAll()
        );

        $content = 'appointment/v_appointment_update';
        $this->pinky->output($data,$content);
    }

    public function do_update()
    {
        $date = $this->input->post('date');
        $customer_id = $this->input->post('customer_id');
        $note = $this->input->post('note');
        $updated_at = date('Y-m-d');

        $id = $this->input->post('id');

        $data = array(
            'date' => $date,
            'customer_id' => $customer_id,
            'note' => $note,
            'updated_at'=>$updated_at
        );

        $result = $this->model->update($id,$data);
        if($result)
        {
            alert(2);
            redirect('bisnis/appointment');
        }
    }

    public function delete($id)
    {
        $data['deleted'] = '1';
        $data['cancel'] = $cancel = $this->input->post('cancel');
        $result = $this->model->update($id,$data);

        if($result)
        {
            alert(3);
        }
    }

    public function form_customer()
    {
        $data = array(
            'link_act' => site_url('bisnis/appointment/do_addcustomer'),
        );
        $this->load->view('appointment/v_customer_add',$data);
    }

    public function do_addcustomer()
    {
        $name = $this->input->post('name');
        $card = $this->cmodel->getkode();
        $born_date = $this->input->post('born_date');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');

        $data = array(
            'card' => $card,
            'name' => $name,
            'born_date' => $born_date,
            'phone' => $phone,
            'address' => $address,
        );

        $result = $this->cmodel->create($data);
        if($result)
        {
            alert();
            redirect('bisnis/appointment/add');
        }
    }

    public function deal($id)
    {
        $data = array(
            'header_title' => 'Deal Appointment',
            'header_desc' => 'Master',
            'link_back' => site_url('bisnis/appointment'),
            'link_act' => site_url('bisnis/appointment/do_deal'),

            'link_baju' => site_url('bisnis/appointment/viewbaju'),
            'link_addbaju' => site_url('bisnis/appointment/addbaju'),
            'link_del_allitem' => site_url('bisnis/appointment/delete_item'),
            'link_del_iditem' => site_url('bisnis/appointment/delete_itemid'),

            'link_accessories' => site_url('bisnis/appointment/viewaccessories'),
            'link_addaccessories' => site_url('bisnis/appointment/addaccessories'),
            'link_del_allaccessories' => site_url('bisnis/appointment/delete_accessories'),
            'link_del_idaccessories' => site_url('bisnis/appointment/delete_accessoriesid'),

            'link_jobs' => site_url('bisnis/appointment/viewjobs'),
            'link_addjobs' => site_url('bisnis/appointment/addjobs'),
            'link_del_alljobs' => site_url('bisnis/appointment/delete_jobs'),
            'link_del_idjobs' => site_url('bisnis/appointment/delete_jobsid'),

            'link_made' => site_url('bisnis/appointment/viewmade'),
            'link_addmade' => site_url('bisnis/appointment/addmade'),
            'link_del_allmade' => site_url('bisnis/appointment/delete_made'),
            'link_del_idmade' => site_url('bisnis/appointment/delete_madeid'),

            'link_total_transaksi' => site_url('bisnis/appointment/totalTransaksi'),
            'link_invoice' => site_url('bisnis/appointment/invoice/'.$id),

            'd' => $this->model->getId($id),
            'baju' => $this->model->getBaju(),
            'accessories' => $this->model->getAccessories(),
            'deal' => $this->dmodel->getDataByAppointment($id)
        );

        if(count($data['deal']))
        {
            $data['link_act'] = site_url('bisnis/appointment/update_deal');
        }

        $content = 'appointment/v_appointment_deal';
        $this->pinky->output($data,$content);
    }

    public function do_deal()
    {
        $appointment_id = $this->input->post('appointment_id');
        $customer_id = $this->input->post('customer_id');
        $date_borrow = $this->input->post('date_borrow');
        $date_back = $this->input->post('date_back');
        $date_fitting = $this->input->post('date_fitting');
        $down_payment = $this->input->post('down_payment');
        $date_dp = $this->input->post('date_dp');
        $pay_dp = $this->input->post('pay_dp');
        $remaining_payment = $this->input->post('remaining_payment');
        $date_rp = $this->input->post('date_rp');
        $pay_rp = $this->input->post('pay_rp');
        $total = $this->input->post('total');
        $note = $this->input->post('note');
        $deposit = $this->input->post('deposit');
        $fitting = $this->input->post('fitting');
        $process = $this->input->post('process');
        $shipping = $this->input->post('shipping');
        $shipping_address = $this->input->post('shipping_address');
        $shipping_cost = $this->input->post('shipping_cost');

        if($this->input->post('total'))
        {
            $data_up = array(
                'status'=>STATUS_DEAL
            );

            $this->model->update($appointment_id,$data_up);
        }

        $data = array(
            'appointment_id' => $appointment_id,
            'customer_id' => $customer_id,
            'date_borrow' => $date_borrow,
            'date_back' => $date_back,
            'date_fitting' => $date_fitting,
            'down_payment' => $down_payment,
            'date_dp' => $date_dp,
            'pay_dp' => $pay_dp,
            'remaining_payment' => $remaining_payment,
            'date_rp' => $date_rp,
            'pay_rp' => $pay_rp,
            'total' => $total,
            'note' => $note,
            'deposit' => $deposit,
            'fitting' => $fitting,
            'process' => $process,
            'shipping' => $shipping,
            'shipping_address' => $shipping_address,
            'shipping_cost' => $shipping_cost
        );

        $result = $this->dmodel->create($data);
        if($result)
        {
            alert();
            redirect('bisnis/appointment/deal/'.$appointment_id);
        }
    }

    public function update_deal()
    {
        $appointment_id = $this->input->post('appointment_id');
        $customer_id = $this->input->post('customer_id');
        $date_borrow = $this->input->post('date_borrow');
        $date_back = $this->input->post('date_back');
        $date_fitting = $this->input->post('date_fitting');
        $down_payment = $this->input->post('down_payment');
        $date_dp = $this->input->post('date_dp');
        $pay_dp = $this->input->post('pay_dp');
        $remaining_payment = $this->input->post('remaining_payment');
        $date_rp = $this->input->post('date_rp');
        $pay_rp = $this->input->post('pay_rp');
        $total = $this->input->post('total');
        $note = $this->input->post('note');
        $deposit = $this->input->post('deposit');
        $fitting = $this->input->post('fitting');
        $process = $this->input->post('process');
        $shipping = $this->input->post('shipping');
        $shipping_address = $this->input->post('shipping_address');
        $shipping_cost = $this->input->post('shipping_cost');

        $id = $this->input->post('id');

        $data = array(
            'appointment_id' => $appointment_id,
            'customer_id' => $customer_id,
            'date_borrow' => $date_borrow,
            'date_back' => $date_back,
            'date_fitting' => $date_fitting,
            'down_payment' => $down_payment,
            'date_dp' => $date_dp,
            'pay_dp' => $pay_dp,
            'remaining_payment' => $remaining_payment,
            'date_rp' => $date_rp,
            'pay_rp' => $pay_rp,
            'total' => $total,
            'note' => $note,
            'deposit' => $deposit,
            'fitting' => $fitting,
            'process' => $process,
            'shipping' => $shipping,
            'shipping_address' => $shipping_address,
            'shipping_cost' => $shipping_cost
        );

        if($this->input->post('fitting'))
        {
            $data_up = array(
                'status'=>STATUS_SIAP_AMBIL
            );

            $this->model->update($appointment_id,$data_up);
        }

        $result = $this->dmodel->update($id,$data);
        if($result)
        {
            alert();
            redirect('bisnis/appointment/deal/'.$appointment_id);
        }
    }

    public function totalTransaksi($appointment_id,$shipping_cost=0)
    {
        $total = array();
        $baju = $this->model->getTrItem($appointment_id);
        foreach($baju as $row)
        {
            $total[] = $row->total;
        }
        $accessories = $this->model->getTrAccessories($appointment_id);
        foreach($accessories as $row)
        {
            $total[] = $row->total;
        }

        $jobs = $this->model->getTrJobs($appointment_id);
        foreach($jobs as $row)
        {
            $total[] = $row->price;
        }

        $made = $this->model->getTrMade($appointment_id);
        foreach($made as $row)
        {
            $total[] = $row->price;
        }

        $grandtotal = array_sum($total);
        $grandtotal = $grandtotal + $shipping_cost;

        $data = array(
            'total'=> $grandtotal,
            'labeltotal' => rupiah($grandtotal),
        );
        echo json_encode($data);
    }


    public function viewbaju($appointment_id)
    {
        $data['tritem'] = $this->model->getTrItem($appointment_id);
        $this->load->view('appointment/v_list_baju',$data);
    }

    public function addbaju()
    {
        $appointment_id = $this->input->post('appointment_id');
        $baju_id = $this->input->post('baju_id');
        $customer_id = $this->input->post('customer_id');
        $qty = 1;

        $bajus = $this->model->getBajuById($baju_id);
        $baju_price = $bajus->rent_price;


        $data = array(
            'appointment_id' => $appointment_id,
            'customer_id' => $customer_id,
            'baju_id' => $baju_id,
            'qty' => $qty,
            'price' => $baju_price,
            'total' => $qty * $baju_price
        );

        $this->model->addItem($data);

    }

    public function delete_item($appointment_id)
    {
        $result = $this->model->delAllTrItem($appointment_id);
        if($result)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function delete_itemid($id)
    {
        $result = $this->model->delItemId($id);
        if($result)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function viewaccessories($appointment_id)
    {
        $data['traccessories'] = $this->model->getTrAccessories($appointment_id);
        $this->load->view('appointment/v_list_accessories',$data);
    }

    public function addAccessories()
    {
        $appointment_id = $this->input->post('appointment_id');
        $accessories_id = $this->input->post('accessories_id');
        $customer_id = $this->input->post('customer_id');
        $qty = 1;

        $accessories = $this->model->getAccessoriesById($accessories_id);
        $accessories_price = $accessories->rent_price;

        $data = array(
            'appointment_id' => $appointment_id,
            'customer_id' => $customer_id,
            'accessories_id' => $accessories_id,
            'qty' => $qty,
            'price' => $accessories_price,
            'total' => $qty * $accessories_price
        );

        $this->model->addAccessories($data);

    }

    public function delete_accessories($appointment_id)
    {
        $result = $this->model->delAllTrAccessories($appointment_id);
        if($result)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function delete_accessoriesid($id)
    {
        $result = $this->model->delAccessoriesId($id);
        if($result)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function viewjobs($appointment_id)
    {
        $data['trjobs'] = $this->model->getTrJobs($appointment_id);
        $this->load->view('appointment/v_list_jobs',$data);
    }

    public function addJobs()
    {
        $appointment_id = $this->input->post('appointment_id');
        $job = $this->input->post('job');
        $price = $this->input->post('price');

        $data = array(
            'appointment_id' => $appointment_id,
            'job' => $job,
            'price' => $price,
        );

        $this->model->addJobs($data);

    }

    public function delete_jobs($appointment_id)
    {
        $result = $this->model->delAllTrJobs($appointment_id);
        if($result)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function delete_jobsid($id)
    {
        $result = $this->model->delJobsId($id);
        if($result)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function viewmade($appointment_id)
    {
        $data['trmade'] = $this->model->getTrMade($appointment_id);
        $this->load->view('appointment/v_list_made',$data);
    }

    public function addMade()
    {
        $appointment_id = $this->input->post('appointment_id');
        $disc = $this->input->post('disc');
        $price = $this->input->post('price');

        $data = array(
            'appointment_id' => $appointment_id,
            'disc' => $disc,
            'price' => $price,
        );

        $this->model->addmade($data);

    }

    public function delete_made($appointment_id)
    {
        $result = $this->model->delAllTrMade($appointment_id);
        if($result)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function delete_madeid($id)
    {
        $result = $this->model->delMadeId($id);
        if($result)
        {
            return TRUE;
        }
        return FALSE;
    }

    public function invoice($appointment_id)
    {
        $data['deal'] = $this->dmodel->getDataByAppointment($appointment_id);

        $traccessories = $this->model->getTrAccessories($appointment_id);
        $tritem = $this->model->getTrItem($appointment_id);
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
        $this->load->view('appointment/v_invoice',$data);
    }

    public function invoice_print($appointment_id)
    {
        $data['deal'] = $this->dmodel->getDataByAppointment($appointment_id);
        $traccessories = $this->model->getTrAccessories($appointment_id);
        $tritem = $this->model->getTrItem($appointment_id);
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
        $data['company'] = $this->model->getCompany();
        $this->load->view('appointment/v_invoice_print',$data);
    }

    public function historyCustomer($id)
    {
        $result = $this->model->getCustomerById($id);
        $result = json_encode($result);
        if($result)
        {
            echo $result;
        }
    }

    public function pickup($appointment_id)
    {
        $data_up = array(
            'status'=>STATUS_DIPINJAM,
            'pickuped' => date('Y-m-d')
        );

        $this->model->update($appointment_id,$data_up);
        redirect('bisnis/appointment');
    }

    public function kembali($appointment_id)
    {
        $data_up = array(
            'status'=>STATUS_KEMBALI,
            'returned' => date('Y-m-d')
        );

        $this->model->updateAllTrItemByAppointmentId($appointment_id);

        $this->model->update($appointment_id,$data_up);
        redirect('bisnis/appointment');
    }

    public function delivery($appointment_id)
    {
        $data['deal'] = $this->dmodel->getDataByAppointment($appointment_id);
        $data['appointment'] = $this->model->getId($appointment_id);
        $data['appointment']->title = $data['appointment']->status==STATUS_DIPINJAM ?'DATE OF PICK UP' : 'DATE OF RETURN';
        $data['appointment']->date_delivery = $data['appointment']->status==STATUS_DIPINJAM ? $data['appointment']->pickuped : $data['appointment']->returned;
        $data['traccessories'] = $this->model->getTrAccessories($appointment_id);
        $data['tritem'] = $this->model->getTrItem($appointment_id);
        $data['trjobs'] = $this->model->getTrJobs($appointment_id);
        $data['trmade'] = $this->model->getTrMade($appointment_id);

        $data['company'] = $this->model->getCompany();
        $this->load->view('appointment/v_delivery',$data);
    }

    public function delivery_print($appointment_id)
    {
        $data['deal'] = $this->dmodel->getDataByAppointment($appointment_id);
        $data['appointment'] = $this->model->getId($appointment_id);
        $data['appointment']->title = $data['appointment']->status==STATUS_DIPINJAM ?'DATE OF PICK UP' : 'DATE OF RETURN';
        $data['appointment']->date_delivery = $data['appointment']->status==STATUS_DIPINJAM ? $data['appointment']->pickuped : $data['appointment']->returned;
        $data['traccessories'] = $this->model->getTrAccessories($appointment_id);
        $data['tritem'] = $this->model->getTrItem($appointment_id);
        $data['trjobs'] = $this->model->getTrJobs($appointment_id);
        $data['trmade'] = $this->model->getTrMade($appointment_id);

        $data['company'] = $this->model->getCompany();
        $this->load->view('appointment/v_delivery_print',$data);
    }

}