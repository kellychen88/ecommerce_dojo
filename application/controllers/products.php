<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product');   
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		date_default_timezone_set('America/Los_Angeles'); 
		$name="";
//		$this->output->enable_profiler();		
	}

	public function index()
	{
		// $product_id = 38; //hard code for now
		$array['name'] = "All";
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
	public function show($id, $name) {
	//var_dump($name);
		$array['name'] = $name;
		$array['category'] = $this->product->get_all_categories();

		if ($id == 'all') {
			$array['product']  = $this->product->get_all_products();		
		} else {
			$array['product']  = $this->product->get_product_by_category_id($id);	
		}
			//var_dump($array); 
		$this->load->view('category_page', $array);
	}
}

//end of main controller