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

		$this->load->view('category_page', $array);
	}
	public function show($id, $name) 
	{
		$array['name'] = $name;
		$array['category'] = $this->product->get_all_categories();

		if ($id == 'all') {
			$array['product']  = $this->product->get_all_products();		
		} else {
			$array['product']  = $this->product->get_product_by_category_id($id);	
		}
 
		$this->load->view('category_page', $array);
	}
	public function search() {
		$array['category'] = $this->product->get_all_categories();
		if (isset($_POST["search-product"])) 
		{
			$array['name'] = $_POST["search-product"];
			$array['product']  = $this->product->get_product_by_product_name($_POST['search-product']);
			$this->load->view('category_page', $array);
		}
	}
	public function prod_details($prod_id)
	{
		$array['product']  = $this->product->get_product_by_id($prod_id);
		$this->load->view('prod_details_page', $array);
	}

	public function carts()
	{
		$this->load->view('carts_page');
	}
}

//end of main controller