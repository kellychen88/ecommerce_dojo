<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();


	}

	public function index()
	{

	}


	public function update(){

		// Config and library for image upload
		$config['upload_path'] = '././assets/img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->load->library('upload', $config);
		// $this->upload->initialize($config);

		$data = array('upload_data' => $this->upload->data());
//		$this->upload->data();
		$data = array('upload_data' => $this->upload->do_upload());


		var_dump($data);

		if ( ! $this->upload->update())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
		}

	}	
}

//end of main controller