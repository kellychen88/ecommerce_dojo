<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product');  
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
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
	public function check()
	{
		$user_info['email'] = $this->input->post('email');
		$user_info['password'] = $this->input->post('password');
		$user = $this->product->check($user_info);
		if(isset($user['email']) && $user['email'] == $user_info['email'])
		{
			$id = $user['id'];
			$this->session->set_userdata('id', $id);
			$orders['orders'] = $this->product->display_all_orders();
			$this->load->view('display_orders', $orders);
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
		$orders['orders'] = $this->product->display_all_orders();
		$this->load->view('display_orders', $orders);
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
	public function single_order($id)
	{
		$order['products'] = $this->product->get_products_by_id($id);
		$order['order'] = $this->product->get_order_by_id($id);
		$this->load->view('display_single_order', $order);
	}

	public function add()
	{
		// $array['product']  = $this->product->get_product_by_id($product_id);	
		$array['category'] = $this->product->get_all_categories();
		$this->load->view('add_product', $array);

	}
	public function edit($product_id)
	{
		$array['product']  = $this->product->get_product_by_id($product_id);	
		$array['category'] = $this->product->get_all_categories();
		$array['category_id'] = $this->product->get_cat_id_by_product_id($product_id);
		$array['images']=$this->product->get_all_images_by_id($product_id);
		$array['error']=$this->session->flashdata('error');
		$this->load->view('edit_product', $array);	
	}

	public function delete_img($img_id)
	{
		var_dump($img_id);
		// delete function
	}

	public function delete()
	{
		$this->load->view('delete');
	}	
	public function update()
	{

		$product=$this->input->post();

		// check if new category is added. If so, then use that new cat_id instead
		if (!empty($product['add_new_cat'])) {
			// create new category ID
			$this->product->add_cat($product['add_new_cat']);

			// get last inserted category ID and make that the new category ID for the new product
			$last_id=$this->product->get_lastInsertID();
			$product['cat']=$last_id['LAST_INSERT_ID()'];
		}

		// Create a proper array with info on each image of the product
		$images=array();
		for ($i=0; $i<count($product['image_IDs']);$i++){
			$images[]=array(
				'image_ID'=>$product['image_IDs'][$i], 
				'image_name'=>$product['image_names'][$i], 
				'image_path'=>$product['image_paths'][$i],
				'image_main'=>0
			);
		}

		// check whether any image data is available
		if ( ! $this->upload->do_upload()) {
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error',$error);
		}
		else{
			$data = array('upload_data' => $this->upload->data());

			$new_file_name=$data['upload_data']['file_name'];
			$new_image_path='../../assets/img/'.$new_file_name;

			// Create a new image to the array
			$images[]=array(
				'image_ID'=>'999',  // set dummy value
				'image_name'=>$new_file_name,
				'image_path'=>$new_image_path,
				'image_main'=>0
			);
		}

		//get the main image ID
		$main_img_id=$product['main_img_id'];

		//get all existing images IDs

		$image_IDs=$this->product->get_all_image_IDs();
		foreach($image_IDs as $image_ID){
			$all_image_ID[]=$image_ID['id'];
		}

		foreach ($images as $image){

			//set value if image becomes main
			if ($image['image_ID']==$main_img_id){
				$image['image_main']=1;	
			}

			//add or edit image table depending whether image file is new
			if (!(in_array($image['image_ID'],$all_image_ID))){
				$this->product->add_image($product['product_id'],$image);	
			}				
			else{
				$this->product->edit_images($product['product_id'],$image);
			}

			//figure out the main image path
			if ($image['image_ID']==$product['main_img_id']) {
				$main_img_path=$image['image_path'];
			}
		}

		// edit the product table
		$this->product->edit_product($product,$main_img_path);

		// else
		// {
		// 	// upload file
		// 	$data = array('upload_data' => $this->upload->data());
		// 	$file_name=$data['upload_data']['file_name'];
		// 	$image_path='../../assets/img/'.$file_name;


		// 	$product['image_path']=$image_path;
		// 	$product['file_name']=$file_name;

		// 	var_dump($product); die();

		// 	if ($product['action']=='add')
		// 	{
		// 		$this->product->add_product($product,$product['main']);

		// 		// get last inserted product ID and add the category-product relationship
		// 		$last_id=$this->product->get_lastInsertID();			
		// 		$this->product->add_cat_relationships($product['cat'],$last_id['LAST_INSERT_ID()']);
		// 	}
		// 	elseif ($product['action']=='Edit')
		// 	{
		// 		$this->product->edit_product($product,$product['main']);
		// 	}

		// }

		redirect('/admin/edit/'.$product['product_id']);

	}
	public function edit_action()
	{
		//echo $this->input->post('action');

		if($this->input->post('action') == 'Cancel') 
  		{
  			redirect('/admin/products');
  		} elseif ($this->input->post('action') == 'Preview') {
  	
			$array['product']=$this->input->post();
			
  			//var_dump($array); //die();

  			$this->load->view('preview_product', $array);
  		} elseif ($this->input->post('action') == 'Update') {
  			echo "Go to update page";
  		}
	}
}

//end of main controller