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
	}

	public function index()
	{
		$data['header_title'] = 'Dashboard';
		$data['header_desc'] = 'Master | Sewa Baju';
		$this->pinky->output($data,'pinky/home');
		//$this->load->view('view_barcode');
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
