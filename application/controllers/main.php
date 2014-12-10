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
	
		$product_id = 38; //hard code for now
		
		$array['product']  = $this->Product->get_product_by_id($product_id);
   //var_dump($array);  die();
		$this->session->set_userdata('product_id', $product_id);
		$this->session->set_userdata('category',array());

		$category  = $this->Product->get_all_categories();

		$this->session->set_userdata('category', $category);
//var_dump($this->session->userdata('category'));  die();
		$this->load->view('edit_product', $array);	
	}
	public function action()
	{
	    if (isset($_POST['Cancel'])) {
	        redirect('edit_product');
	    }
	    elseif (isset($_POST['Preview'])) {
	        # Save-button was clicked
	    }
	}
	public function preview()
	{
			$name = $this->input->post('name');
			$desc = $this->input->post('desc');
	        $cat = $this->input->post('cat');
	// var_dump($name);  die();	    
		    $product = array(
		    	'id' => $this->session->userdata('product_id'),
		       'name' => $name,
		       'desc' => $desc,
		       'cat'=> $cat
		    );
		    //var_dump($product); die();
		    //send to database
		     // $this->load->model('Product');
		     // $this->User->add_user($user);
		     // $data="Your account has been created. Please login.";
		     // $this->session->set_flashdata("success",$data);
		     redirect('preview_product/', $product);
	}
}

//end of main controller