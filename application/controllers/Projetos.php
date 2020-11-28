<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Projetos extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Projetos_model');
        $this->load->library('form_validation');
    }

    //  HOME
    public function index()
    {
        $data['projeto'] = $this->Projetos_model->get_all();
        $this->load->view('projetos/list', $data);
    }

    // CREATE
    public function create(){
        $data['titulo'] = 'Cadastrar-se';
        $data['action'] = base_url('projetos/create_action');
        $data['id'] = '';
        $data['valor'] = set_value('valor');
        $data['nome'] = set_value('nome');
        $data['descricao'] = set_value('descricao');
        $data['dataInicial'] = set_value('dataInicial');
        $data['escolaridade'] = set_value('escolaridade');
        $data['status'] = set_value('status');
        $this->load->view('projetos/form', $data);
    }

    public function create_action(){
        $this->_validationRules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $insert = array(
                'valor' => $this->input->post('valor'),
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email'),
                'dataInicial' => $this->input->post('dataInicial'),
                'escolaridade' => $this->input->post('escolaridade'),
                'status' => $this->input->post('status'),
            );
            $projeto = $this->Projetos_model->insert($insert);
            if ($projeto) {
                $this->_configsUpload();
                if (!$this->upload->do_upload('arquivo')) {
                    $this->session->set_flashdata('mensagem', $this->upload->display_errors());
                    redirect(base_url('projetos'));
                    exit();
                } else {
                    $upload = $this->upload->data();
                    $this->Projetos_model->update($projeto, array('arquivo' => $upload['file_name']));
                }
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao cadastrar');
            }
            redirect(base_url('projetos'));
        }
    }

    // DELETE
    public function delete($id){
        if (!empty($id) && is_numeric($id)) {
            $projeto = $this->Projetos_model->get_where(array('id' => $id));
            if ($projeto) {
                unlink('uploads/projetos/'.$projeto->arquivo);
                $this->Projetos_model->delete(array('id' => $id));
                $this->session->set_flashdata('mensagem', 'Removido com sucesso');
            } else {
                $this->session->set_flashdata('mensagem', 'Não existe');
            }
        } else {
            $this->session->set_flashdata('mensagem', 'Não Encontrado');
        }
        redirect(base_url('projetos'));
    }

    // UPDATES
    public function update($id){
        $projeto = $this->Projetos_model->get_where(array('id'=>$id));
        if($projeto){
        $data['titulo'] = 'Alterar';
        $data['action'] = base_url('projetos/update_action/'.$projetor->id);
        $data['id'] = '';
        $data['valor'] = set_value('valor', $projeto->valor);
        $data['nome'] = set_value('nome', $projeto->nome);
        $data['descricao'] = set_value('descricao', $projeto->descricao);
        $data['dataInicial'] = set_value('dataInicial', $projeto->descricao);
        $data['escolaridade'] = set_value('escolaridade', $projeto->descricao);
        $data['status'] = set_value('status', $projeto->status);
        $data['arquivo'] = $projeto->arquivo;
        $this->load->view('projetos/form', $data);
        }else{
            $this->session->set_flashdata('mensagem','Não encontrado');
            redirect(base_url("projetos"));
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
                    redirect(base_url('projetos'));
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
            if($this->Projetos_model->update($id,$update)){
                $this->session->set_flashdata('mensagem','Alterado Com sucesso');
            }else{
                $this->session->set_flashdata('mensagem','Falha ao alterar');
            }
            redirect(base_url('projetos'));
        }
    }


    final function _configsUpload(){
        $config['upload_path'] = 'uploads/projetos';
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

    public function detalhes($id)
    {
        if (empty($id)) {
            show_404();
        } else {
            $data['transacionador'] = $this->Projetos_model->get_where(array('id' => $id));
            $this->load->view('projetos/detalhes', $data);
        }
    }

    
}
