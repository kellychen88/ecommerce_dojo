<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	private $_sort = 'sort_price';

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
		if($this->input->get('limit')){ $limit = $this->input->get('limit');}else{$limit = 8;};
	 	if($this->input->get('page')){ $page = $this->input->get('page');}else{$page = 1;};
	 	$start = ( $page - 1 ) * $limit;
	 	$array['each_page'] = $this->product->product_pages($start, $limit);
		$array['product']  = $this->product->get_all_products();	
		$array['category'] = $this->product->get_all_categories();

		$this->load->view('category_page', $array);
	}
	public function show($id, $name)
	 {
	 	//echo $id; echo $name;
	 	if($this->input->get('limit')){ $limit = $this->input->get('limit');}else{$limit = 8;};
	 	if($this->input->get('page')){ $page = $this->input->get('page');}else{$page = 1;};
	 	$start = ( $page - 1 ) * $limit;
		$name = str_replace('%20', ' ', $name);
		$array['id'] = $id;
		$array['name'] = $name;
		$array['category'] = $this->product->get_all_categories();
		if ($id == 'all') {
			$array['product']  = $this->product->get_all_products();
			$array['each_page'] = $this->product->product_pages($start, $limit);		
		} else {
			$array['product']  = $this->product->get_product_by_category_id($id);
			$array['each_page'] = $this->product->product_pages_id($start, $limit, $id);	
		}
	
		$this->load->view('category_page', $array);
	}	
	public function add_shipping()
	{
		$ship['first_name_ship'] = $this->input->post('first_name_ship');
		$ship['last_name_ship'] = $this->input->post('last_name_ship');
		$ship['address1_ship'] = $this->input->post('address1_ship');
		$ship['address2_ship'] = $this->input->post('address2_ship');
		$ship['city_ship'] = $this->input->post('city_ship');
		$ship['state_ship'] = $this->input->post('state_ship');
		$ship['zip_ship'] = $this->input->post('zip_ship');
		$this->product->add_shipping($ship);
		redirect('products/index');

	}
	
	public function search()
	{

		$array['category'] = $this->product->get_all_categories();
		if(isset($_POST['search-product']))
		{
			$array['name'] = $_POST['search-product'];
			$array['each_page'] = $this->product->get_product_by_product_name($_POST['search-product']);
			$this->load->view('category_page', $array);
		}	
	}

	public function prod_details($prod_id)
	{
		$array['cat_name'] = $this->product->get_cat_name_by_product_id($prod_id);
		$array['category'] = $this->product->get_cat_id_by_product_id($prod_id);
		$array['product']  = $this->product->get_product_by_id($prod_id);
		$array['image']  = $this->product->get_image_by_id($prod_id);
		$this->load->view('prod_details_page', $array);
	}
	public function carts()
	{
		$this->load->view('carts_page');
	}

	public function sort() 
	{
			$this->_sort = $this->input->post('sort'); // $_POST("sort");
			echo $this->_sort;
	}

}

//end of main controller