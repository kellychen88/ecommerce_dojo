<?php

class Main2 extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
//		$this->load->view('upload_form', array('error' => ' ' ));
		$this->load->view('edit_product', array('error' => ' ' ));	

	}

	function update()
	{
		// $config['upload_path'] = './uploads/';
		$config['upload_path'] = '././assets/img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			// $this->load->view('upload_form', $error);
			$this->load->view('product_edit', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			// $this->load->view('upload_success', $data);
			var_dump($data);
		}


	}
}
?>