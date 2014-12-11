<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product');  
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		date_default_timezone_set('America/Los_Angeles'); 
		$this->output->enable_profiler();		
	}

	public function index()
	{
		$this->load->view('admin_login');
	}
	public function check()
	{
		$user_info['email'] = $this->input->post('email');
		$user_info['password'] = $this->input->post('password');
		$user = $this->product->check($user_info);
		if(isset($user['email']) && $user['email'] == $user_info['email'])
		{
			$id = $user['ID'];
			$this->session->set_userdata('id', $id);
			$this->load->view('display_orders');
		}
		else
		{
			$error = "Username/password are NOT registered as admin";
			$this->session->set_flashdata('error', $error);
			$this->load->view('admin_login');
		}	

	}
	public function display()
	{
		$this->load->view('display_orders');
	}
	public function products()
	{
		if($this->input->get('limit')){ $limit = $this->input->get('limit');}else{$limit = 4;};
		if($this->input->get('page')){ $page = $this->input->get('page');}else{$page = 1;};
		$start = ( $page - 1 ) * $limit;
		$all_products['products'] = $this->product->product_pages($start, $limit);
		$all_products['all'] = $this->product->get_all_products();
		$this->load->view('display_products', $all_products);

	}
	public function single_order()
	{
		$this->load->view('display_single_order');
	}

	public function add()
	{
		$product_id = 38; //hard code for now
		$array['product']  = $this->product->get_product_by_id($product_id);	
		$array['category'] = $this->product->get_all_categories();
		// var_dump($array);
		// die();
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
		// $config['upload_path'] = './uploads/';
		$config['upload_path'] = '././assets/img/';
		$config['allowed_types'] = 'gif|jpeg|png';
		$config['max_size']	= '500';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
		// check whether any image data is available
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			// $this->load->view('upload_form', $error);
			$this->load->view('add_product', $error);
		}
		else
		{
			// upload file
			$data = array('upload_data' => $this->upload->data());
			// var_dump($data);
			$file_name='././assets/img/'.$data['upload_data']['file_name'];
			// grab all data
			$product=$this->input->post();
			// check if new category is added. If so, then use that new cat_id instead
			if (!empty($product['add_new_cat'])) {
				// create new category ID
				$this->product->add_cat($product['add_new_cat']);

				// get last inserted category ID and make that the new category ID for the new product
				$last_id=$this->product->get_lastInsertID();
				$product['cat']=$last_id['LAST_INSERT_ID()'];
			}

			$product['iage_path']=$file_name;
			$this->product->add_product($product);

			// get last inserted product ID and add the category-product relationship
			$last_id=$this->product->get_lastInsertID();			
			$this->product->add_cat_relationships($product['cat'],$last_id['LAST_INSERT_ID()']);
			redirect('/admin/add');
		}
	}
}

//end of main controller