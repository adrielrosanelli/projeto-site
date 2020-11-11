<?php

// class My_Controller extends CI_Controller{

//     public function __construct()
//     {
//         parent::__construct();
//         if($this->session->userdata('logado')!=true){
//             $this->session->set_fleshdata('mensagem','Realize o login para proseguir');
//             redirect(base_url('login'));
//         }
//         $this->header();
//     }

//     public function __destruct()
//     {
//         $this->_footer();
//     }
//     public function header(){
//         $this->load->view('includes/header');
//     }
//     public function _footer(){
//         require_once(APPPATH.'views/includes/footer.php');
//     }
// }



class My_Controller extends CI_Controller{

    public function __construct()
    {
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