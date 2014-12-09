<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
//		$this->load->model('____');  
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		date_default_timezone_set('America/Los_Angeles'); 
		$this->output->enable_profiler();		
	}

	public function index()
	{
		$this->load->view('admin_login');
	}

	public function prod_details()
	{
		$this->load->view('prod_details_page');
	}

	public function carts()
	{
		$this->load->view('carts_page');
	}
	public function display()
	{
		$this->load->view('display_orders');
	}
	public function products()
	{
		$this->load->view('display_products');
	}
	public function single_order()
	{
		$this->load->view('display_single_order');
	}
	public function edit()
	{
		$this->load->view('edit_product');
	}
	public function delete()
	{
		$this->load->view('delete');
	}	

}

//end of main controller