<?php

class Login extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Login_model');
        $this->load->model('Profissionais_model');
    }

    public function index(){
        $this->load->view('login');
    }
    // LOGIN
    public function action(){
        $this->form_validation->set_rules('email','E-mail','required|valid_email');
        $this->form_validation->set_rules('senha','senha','required');
        if($this->form_validation->run()==FALSE){
            $this->index();
        }else{
            $where = array(
                'email'=>$this->input->post('email'),
                'senha'=>$this->input->post('senha')
            );
            $busca = $this->Login_model->get($where);
            if($busca){

                $sessao = array(
                'logado'=>true,
                'id'=>$busca->id,
                'nome'=>$busca->nome,
                'email'=>$busca->email,
                'telefone'=>$busca->telefone,
                'senha'=>$busca->senha,
                'descricao'=>$busca->descricao,
                'dataNascimento'=>$busca->dataNascimento,
                'escolaridade'=>$busca->escolaridade,
                'precoHora'=>$busca->precoHora,
                'status'=>$busca->status,
                'arquivo'=>$busca->arquivo,
            );
                $this->session->set_userdata($sessao);
                if(!$_SESSION['ultimaUrl']){
                    redirect(base_url('home'));
                }else{
                    redirect($_SESSION['ultimaUrl']);
                    session_unset();
                }
            }else{
                $this->session->set_flashdata('mensagem','Login invalido');
                redirect(base_url('login'));
            }
        }
    }


    public function create(){
        $data['titulo'] = 'Cadastrar-se';
        $data['action'] = base_url('login/create_action');
        $data['id'] = '';
        $data['nome'] = set_value('nome');
        $data['email'] = set_value('email');
        $data['senha'] = set_value('senha');
        $data['dataNascimento'] = set_value('dataNascimento');
        $this->load->view('login/form', $data);
    }


    public function create_action(){
        $this->action();
        $this->_validationRules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $insert = array(
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email'),
                'senha'=>$this->input->post('senha'),
                'dataNascimento' => $this->input->post('dataNascimento'),
            );
            $transacionador = $this->Profissionais_model->insert($insert);
            if (!$transacionador) {
                $this->session->set_flashdata('mensagem', 'Falha ao cadastrar');
            }
            redirect(base_url('login'));
        }
    }

    // Logout
    public function logout(){
        session_destroy();
        redirect(base_url('login'));
    }

    final function _validationRules(){
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    }

}