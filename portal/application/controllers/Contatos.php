<?php
Class Contatos extends MY_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Contatos_model');
	}

	public function index(){
		$data['contatos']=$this->Contatos_model->get();
		$this->load->view('contatos/index',$data);	
	}
	public function detalhes($id){
		if(empty($id)){
			show_404();
		}else{
			$data['contatos'] = $this->contatos_model->getWhere(array('id'=>$id));
			$this ->load->view('contatos/detalhes',$data);
		}

	}
}
