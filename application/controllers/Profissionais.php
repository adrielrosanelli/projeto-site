<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

class Profissionais extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profissionais_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['transacionador']=$this->Profissionais_model->get_all();
        $this->load->view('profissional/list',$data);
    }

    public function create(){
        $data['titulo'] = 'Cadastrar-se';
        $data['action']=base_url('profissionais/create_action');
        $data['id']='';
        $data['nome']=set_value('nome');
        $data['email']=set_value('email');
        $data['descricao']=set_value('descricao');
        $data['dataNascimento']=set_value('dataNascimento');
        $data['escolaridade']=set_value('escolaridade');
        $data['precoHora']=set_value('precoHora');
        $data['status']=set_value('status');
        $this->load->view('profissional/form',$data);
    }

    public function create_action(){
        $this->_validationRules();
        if($this->form_validation->run()==FALSE){
            $this->create();
        }else{
            $insert = array(
                'nome'=>$this->input->post('nome'),
                'email'=>$this->input->post('email'),
                'descricao'=>$this->input->post('descricao'),
                'dataNascimento'=>$this->input->post('dataNascimento'),
                'escolaridade'=>$this->input->post('escolaridade'),
                'precoHora'=>$this->input->post('precoHora'),
                'status'=>$this->input->post('status'),
            );
            $transacionador = $this->Profissionais_model->insert($insert);
            if($transacionador){
                $this->_configsUpload();
                if(!$this->upload->do_upload('arquivo')){
                    $this->session->set_flashdata('mensagem',$this->upload->display_errors());
                    redirect(base_url('profissionais'));
                    exit();
                }else{
                    $upload = $this->upload->data();
                    $this->Profissionais_model->update($transacionador,array('arquivo'=>$upload['file_name']));
                }
                $this->session->set_flashdata('mensagem','Cadastrado com sucesso');
            }else{
                $this->session->set_flashdata('mensagem','Falha ao cadastrar');
            }
            redirect(base_url('profissionais'));
        }
    }

    final function _configsUpload(){
        $config['upload_path'] = '.uploads/profissional';
        @mkdir($config['upload_path']);
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['max_size']             = 2048;
        $config['max_width']            = 2048;
        $config['max_height']           = 2048;
        $config['encrypt_name']         = true;
        $this->load->library('upload', $config);
        return $config;
    }
    final function _validationRules(){
        $this->form_validation->set_rules('nome','Nome','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
    }

    public function detalhes($id){
        if(empty($id)){
            show_404();
        }else{
            $data['transacionador']=$this->Profissionais_model->getWhere(array('id'=>$id));
            $this->load->view('profissional/detalhes',$data);
        }
    }
}
