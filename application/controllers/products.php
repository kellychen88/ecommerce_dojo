<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product');   
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		date_default_timezone_set('America/Los_Angeles'); 
//		$this->output->enable_profiler();		
	}

	public function index()
	{
		// $product_id = 38; //hard code for now
		$array['product']  = $this->product->get_all_products();	
		$array['category'] = $this->product->get_all_categories();
	//var_dump($array); die();

		$this->load->view('category_page', $array);
	}

	public function prod_details()
	{
		$this->load->view('prod_details_page');
	}

	public function carts()
	{
		$this->load->view('carts_page');
	}

}

//end of main controller