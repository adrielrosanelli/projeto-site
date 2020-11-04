<?php 

class Profissionais extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profissionais_model');
    }

    public function index(){
        $data['profissional']=$this->Profissionais_model->get();
        $this->load->view('profissional/index',$data);
    }
}

?>
