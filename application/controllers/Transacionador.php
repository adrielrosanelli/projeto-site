<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transacionador extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transacionador_model');
        $this->load->model('Projeto_model');
        $this->load->library('form_validation');
    }

    //  HOME
    public function index()
    {
        $data['projeto'] = $this->Projeto_model->get_byTransacionador(array('transacionador.id'=>$this->session->userdata('id')));
        var_dump($data);
        exit();
        $this->load->view('transacionador/list', $data);
    }

    // CREATE 
    public function create(){
        $data['titulo'] = 'Cadastrar-se';
        $data['action'] = base_url('profissionais/create_action');
        $data['id'] = '';
        $data['nome'] = set_value('nome');
        $data['email'] = set_value('email');
        $data['descricao'] = set_value('descricao');
        $data['dataNascimento'] = set_value('dataNascimento');
        $data['escolaridade'] = set_value('escolaridade');
        $data['precoHora'] = set_value('precoHora');
        $data['status'] = set_value('status');
        $this->load->view('profissional/form', $data);
    }

    public function create_action(){
        $this->_validationRules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $insert = array(
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email'),
                'descricao' => $this->input->post('descricao'),
                'dataNascimento' => $this->input->post('dataNascimento'),
                'escolaridade' => $this->input->post('escolaridade'),
                'precoHora' => $this->input->post('precoHora'),
                'status' => $this->input->post('status'),
            );
            $transacionador = $this->Profissionais_model->insert($insert);
            if ($transacionador) {
                $this->_configsUpload();
                if (!$this->upload->do_upload('arquivo')) {
                    $this->session->set_flashdata('mensagem', $this->upload->display_errors());
                    redirect(base_url('transacionador'));
                    exit();
                } else {
                    $upload = $this->upload->data();
                    $this->Profissionais_model->update($transacionador, array('arquivo' => $upload['file_name']));
                }
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao cadastrar');
            }
            redirect(base_url('transacionador'));
        }
    }

    // DELETE
    public function delete($id){
        if (!empty($id) && is_numeric($id)) {
            $transacionador = $this->Profissionais_model->get_where(array('id' => $id));
            if ($transacionador) {
                unlink('uploads/profissionais/'.$transacionador->arquivo);
                $this->Profissionais_model->delete(array('id' => $id));
                $this->session->set_flashdata('mensagem', 'Removido com sucesso');
            } else {
                $this->session->set_flashdata('mensagem', 'Não existe');
            }
        } else {
            $this->session->set_flashdata('mensagem', 'Não Encontrado');
        }
        redirect(base_url('transacionador'));
    }

    // UPDATES
    public function update($id){
        $transacionador = $this->Profissionais_model->get_where(array('id'=>$id));
        if($transacionador){
        $data['titulo'] = 'Alterar';
        $data['action'] = base_url('profissionais/update_action/'.$transacionador->id);
        $data['id'] = $transacionador->id;
        $data['nome'] = set_value('nome', $transacionador->nome);
        $data['email'] = set_value('email', $transacionador->email);
        $data['descricao'] = set_value('descricao', $transacionador->descricao);
        $data['dataNascimento'] = set_value('dataNascimento', $transacionador->dataNascimento);
        $data['escolaridade'] = set_value('escolaridade', $transacionador->escolaridade);
        $data['precoHora'] = set_value('precoHora', $transacionador->precoHora);
        $data['status'] = set_value('status', $transacionador->status);
        $data['arquivo'] = $transacionador->arquivo;
        $this->load->view('profissional/form', $data);
        }else{
            $this->session->set_flashdata('mensagem','Não encontrado');
            redirect(base_url("profissionais"));
        }
    }
    
    public function update_action($id){
        $this->_validationRules();
        if($this->form_validation->run() == FALSE){
            $this->update($id);
        }else{
            $arquivo = $this->input->post('arquivo_aux');
            if($_FILES['arquivo']['name']){
                $config = $this->_configsUpload();
                if(!$this->upload->do_upload('arquivo')){
                    $this->session->set_flashdata('mensagem',$this->upload->display_errors());
                    redirect(base_url('transacionador'));
                    exit();
                }else{
                    unlink($config['upload_path'].$arquivo);
                    $upload = $this->upload->data();
                    $arquivo = $upload['file_name'];
                }
            }
            $update = array(
                'nome'=>$this->input->post('nome'),
                'email'=>$this->input->post('email'),
                'descricao'=>$this->input->post('descricao'),
                'dataNascimento'=>$this->input->post('dataNascimento'),
                'escolaridade'=>$this->input->post('escolaridade'),
                'precoHora'=>$this->input->post('precoHora'),
                'status'=>$this->input->post('status'),
                'arquivo'=>$arquivo,
            );
            if($this->Profissionais_model->update($id,$update)){
                $this->session->set_flashdata('mensagem','Alterado com Sucesso');
            }else{
                $this->session->set_flashdata('mensagem','Falha ao alterar o Profissional');
            }
            redirect(base_url('transacionador'));
        }
    }


    final function _configsUpload(){
        $config['upload_path'] = 'uploads/profissionais';
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
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    }

    public function projetos($codigoDoTransacionador)
    {
        if (empty($codigoDoTransacionador)) {
            show_404();
        } else {
            $data['projeto'] = $this->Projeto_model->get_where(array('codigoDoTransacionador' => $codigoDoTransacionador));
            $this->load->view('transacionador/list', $data);
        }
    }

    
}