<?php

class My_Controller extends CI_Controller{
    public function __contruct(){
        parent::__construct();
        $this->header();
    }
    public function __destruct()
    {
        include APPPATH. 'views/includes/footer.php';
    }
    public function header(){
        $this->load->view('includes/header');
    }
}