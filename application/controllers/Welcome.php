<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends My_controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model','model');
		/* Active Menu */

		$this->session->set_flashdata('parent_menu_active', 'dashboard');
//		$this->session->set_flashdata('child_menu_active',  'customer');
	}

	public function index()
	{
		$data['header_title'] = 'Dashboard';
		$data['header_desc'] = 'Master | Sewa Baju';

		$rowData = $this->model->getDataAllTr();
		$fitingData = $this->model->getFittingDate();
		$dataCalendar = array();

		foreach($rowData as $row)
		{
			if($row->mdeal)
			{
				$dataCalendar[] = array(
					'title' => $row->mbaju->name,
					'start' => $row->mdeal->date_borrow,
					'end' => $row->mdeal->date_back.'T23:59:00',
					'description' => $row->mcustomer->name,
				);
			}
		}

		foreach($fitingData as $row)
		{
			$dataCalendar[] = array(
				'title' => $row->mcustomer->name,
				'start' => $row->date_fitting,
				'description' => $row->mcustomer->name.'- Fitting',
				'color' => 'red',
			);
		}

		$data['dcalendar'] = json_encode($dataCalendar);
		$this->pinky->output($data,'pinky/home');

		//$this->load->view('view_barcode');
	}

	public function denied()
	{
		$this->pinky->output(NULL,'pinky/denied');
	}

	function bikin_barcode($kode)
	{
//kita load library nya ini membaca file Zend.php yang berisi loader
//untuk file yang ada pada folder Zend
		$this->load->library('zend');

//load yang ada di folder Zend
		$this->zend->load('Zend/Barcode');

//generate barcodenya
//$kode = 12345abc;
		Zend_Barcode::render('code128', 'image', array('text'=>$kode), array());
	}
//end of class
}
