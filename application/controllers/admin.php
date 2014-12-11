<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product');  
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		date_default_timezone_set('America/Los_Angeles'); 

		// File configs
		$config['upload_path'] = '././assets/img/';
		$config['allowed_types'] = 'gif|jpeg|png|jpg';
		$config['max_size']	= '500';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->load->library('upload', $config);

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

	public function add()
	{
		// $array['product']  = $this->product->get_product_by_id($product_id);	
		$array['category'] = $this->product->get_all_categories();
		$this->load->view('add_product', $array);

	}
	public function edit()
	{

		$product_id = 38; //hard code for now
		$array['product']  = $this->product->get_product_by_id($product_id);	
		$array['category'] = $this->product->get_all_categories();

		$this->load->view('edit_product', $array);	
	}
	public function delete()
	{
		$this->load->view('delete');
	}	
	public function process()
	{

		$product=$this->input->post();

		// // check whether any image data is available
		// if ( ! $this->upload->do_upload())
		// {
		// 	$array['error'] = $this->upload->display_errors();
		// 	$array['category'] = $this->product->get_all_categories();

		// 	$this->load->view('add_product', $array);
		// }
		// else
		// {




			// upload file
			$data = array('upload_data' => $this->upload->data());

			var_dump($product);
			var_dump($data);
			die();

			$file_name='././assets/img/'.$data['upload_data']['file_name'];

			// check if new category is added. If so, then use that new cat_id instead
			if (!empty($product['add_new_cat'])) {
				// create new category ID
				$this->product->add_cat($product['add_new_cat']);

				// get last inserted category ID and make that the new category ID for the new product
				$last_id=$this->product->get_lastInsertID();
				$product['cat']=$last_id['LAST_INSERT_ID()'];
			}


			// if (!empty($images)){
			// 	$img_path=1
			// }


			$product['image_path']=$file_name;
			$this->product->add_product($product);

			// get last inserted product ID and add the category-product relationship
			$last_id=$this->product->get_lastInsertID();			
			$this->product->add_cat_relationships($product['cat'],$last_id['LAST_INSERT_ID()']);
			redirect('/admin/add');
		// }
	}
}

//end of main controller