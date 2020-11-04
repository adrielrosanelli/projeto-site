<?php

class MY_Controller extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->header();
	}
	public function __destruct(){
		include APPPATH. 'views/includes/footer.php';
	}
	public function header(){

	$this->load->view('includes/header');
}
}
