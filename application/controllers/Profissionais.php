<?php 

class Profissionais extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profissionais_model');
    }

    public function index(){
        $data['profissional']=$this->Profissionais_model->get();
        $this->load->view('profissional/home',$data);
    }
    public function detalhes($id){
        if(empty($id)){
            show_404();
        }else{
            $data['profissional'] = $this->profissionais_model->getWhere(array('id'=>$id));
            $this ->load->view('profissional/detalhes');
        }
    }
}

?>