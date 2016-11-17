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
            'data' => $this->model->getAll()
        );
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

        $data = array(
            'code' => $code,
            'date' => $date,
            'customer_id' => $customer_id,
            'note' => $note,
            'status' => 1,
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

        $id = $this->input->post('id');

        $data = array(
            'date' => $date,
            'customer_id' => $customer_id,
            'note' => $note,
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
                'status'=>STATUS_FITTING
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

    public function invoice($appointment_id)
    {
        $data['deal'] = $this->dmodel->getDataByAppointment($appointment_id);
        $data['traccessories'] = $this->model->getTrAccessories($appointment_id);
        $data['tritem'] = $this->model->getTrItem($appointment_id);
        $data['company'] = $this->model->getCompany();
        $this->load->view('appointment/v_invoice',$data);
    }

    public function invoice_print($appointment_id)
    {
        $data['deal'] = $this->dmodel->getDataByAppointment($appointment_id);
        $data['traccessories'] = $this->model->getTrAccessories($appointment_id);
        $data['tritem'] = $this->model->getTrItem($appointment_id);
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

}