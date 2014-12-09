<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->model('Product');	
	
		$product_id = 31; //hard code for now
		
		$array['product']  = $this->Product->get_product_by_id($product_id);

		$this->session->set_userdata('courses',array());


		$category  = $this->Product->get_all_categories();
 //   var_dump($array);  die();


		$this->session->set_userdata('category', $category);
//var_dump($this->session->userdata('category'));  die();
		$this->load->view('edit_product', $array);	
	}
}

//end of main controller