<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
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
}

//end of main controller