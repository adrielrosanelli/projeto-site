<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Projeto extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Projeto_model');
        $this->load->model('Login_model');
        $this->load->library('form_validation');
    }

    public function index(){

        $data['projeto'] = $this->Projeto_model->get_all();
        $this->load->view('projeto/list', $data);
    }
 
    public function create(){
        isLoged($_SERVER['HTTP_REFERER']);
        $data['titulo'] = 'Cadastrar Vaga';
        $data['action'] = base_url('projeto/create_action');
        $data['id'] = '';
        $data['valor'] = set_value('valor');
        $data['nome'] = set_value('nome');
        $data['descricao'] = set_value('descricao');
        $data['dataInicial'] = set_value('dataInicial');
        $data['status'] = set_value('status');
        $this->load->view('projeto/form', $data);
    }

    public function create_action(){
        
        $this->_validationRules();
        if($this->form_validation->run()==FALSE){
            $this->create();
        }else{
            $insert = array(
                'valor' => $this->input->post('valor'),
                'nome' =>$this->input->post('nome'),
                'codigoDoContratante'=>$this->session->userdata('id'),
                'descricao'=>$this->input->post('descricao'),
                'dataInicial'=>$this->input->post('dataInicial'),
                'status'=>$this->input->post('status'),
            );
            $projeto = $this->Projeto_model->insert($insert);
            if($projeto){
                $this->session->set_flashdata('mensagem','Falha ao cadastrar');
            }
            redirect(base_url('projeto'));
        }
    }

    public function delete($id){
        isLoged($_SERVER['HTTP_REFERER']);
        if(!empty($id) && is_numeric($id)){
            $projeto = $this->Projeto_model->get_where(array('id'=>$id));
            if($projeto){
                $this->Projeto_model->delete(array('id'=>$id));
                $this->session->set_flashdata('mensagem','Vaga removida com sucesso');
            }else{
                $this->session->set_fleshdata('mensagem','Vaga Inexistente');
            }
        }else{
            $this->session->set_flashdata('mensagem','Vaga não Encontrada');
        }
        redirect(base_url('projeto'));
    }

    public function update($id){
        isLoged($_SERVER['HTTP_REFERER']);
        $projeto = $this->Projeto_model->get_where(array('id'=>$id));
            if($projeto){
            $data['titulo'] = 'Alterar Vaga';
            $data['action'] = base_url('projeto/update_action/'.$projeto->id);
            $data['id'] = $projeto->id;
            $data['valor'] = set_value('valor',$projeto->valor);
            $data['nome'] = set_value('nome',$projeto->nome);
            $data['descricao'] = set_value('descricao',$projeto->descricao);
            $data['dataInicial'] = set_value('dataInicial',$projeto->dataInicial);
            $data['status'] = set_value('status');
            $this->load->view('projeto/form', $data);
        }else{
            $this->session->set_flashdata('mensagem','Vaga não encontrada');
            redirect(base_url('projeto'));
        }
    }

    public function update_action($id){
        $this->_validationRules();
        if($this->form_validation->run()==FALSE){
            $this->update($id);
        }else{
            $update = array(
                'valor'=>$this->input->post('valor'),
                'nome'=>$this->input->post('nome'),
                'descricao'=>$this->input->post('descricao'),
                'dataInicial'=>$this->input->post('dataInicial'),
                'status'=>$this->input->post('status'),
            );
            if($this->Projeto_model->update($id,$update)){
                $this->session->set_flashdata('mensagem','Vaga Alterada com Sucesso');
            }else{
                $this->session->set_flashdata('mensagem','Falha ao Alterar a vaga');
            }
            redirect(base_url("projeto"));
        }
    }

    public function detalhes($id){
        if(empty($id)){
            show_404();
        }else{
            $data['projeto'] = $this->Projeto_model->get_where(array('id'=>$id));
            $this->load->view('projeto/detalhes',$data);
        }
    }


    final function _validationRules(){
        $this->form_validation->set_rules('nome', 'Nome', 'required');
    }
}