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
    public function delete($id){
        if(!empty($id) && is_numeric($id)){
            $transacionador = $this->Profissinal_model->get_where(array('id'=>$id));
            if($transacionador){
                unlink('uploads/transacionador/'.$transacionador->arquivo);
                $this->Profissional_model->delete(array('id'=>$id));
                $this->session->set_flashdata('mensagem','Removido com sucesso');
            }else{
                $this->session->set_flashdata('mensagem','Não existe');
            }
        }else{
            $this->session->set_flashdata('mensagem','Não Encontrado');
        }
        redirect(base_url('profissionais'));
    }
    public function create(){
        $data['titulo'] = 'Cadastrar-se';
        $data['id']='';
        $data['action']=base_url('profissionais/create_action');
        $data['nome']=set_value('nome');
        $data['email']=set_value('email');
        $this->load->view('profissionais/form',$data);
    }
    public function create_action(){
        $this->_validationRules();
        if($this->form_validation->run()==FALSE){
            $this->create();
        }else{
            $insert = array(
                'nome'=>$this->input->post('nome'),
                'email'=>$this->input->post('email'),
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
                    $this->Proficionais_model->update($transacionador,array('arquivo'=>$upload['file_name']));
                }
                $this->session->set_flashdata('mensagem','Cadastrado com sucesso');
            }else{
                $this->session->set_flashdata('mensagem','Falha ao cadastrar');
            }
            redirect(base_url('profissionais'));
        }
    }
    public function update($id){
        $transacionador = $this->Profissionais_model->get_where(array('id'=>$id));
        if($transacionador){
            $data['titulo'] = 'Alterar';
            $data['id'] = $transacionador->id;
            $data['action'] = base_url('profissionais/update_action/'.$transacionador->id);
            $data['nome'] = set_value('nome',$transacionador->nome);
            $data['email'] = set_value('email',$transacionador->email);
            $data['arquivo'] = $transacionador->arquivo;
            $this->load->view('profissionais/form',$data);
        }else{
            $this->session->set_flashdata('mensagem','Não encontrado');
            redirect(base_url('profissionais'));
        }
    }

    public function update_action($id){
        $this->_validationRules();
        if($this->form_validation->run()== FALSE){
            $this->update($id);
        }else{
            $arquivo = $this->input->post('arquivo_aux');
            if($_FILES['arquivo']['name']){
                $config = $this->_configsUpload();
                if(!$this->upload->do_upload('arquivo')){
                    $this->session->set_flashdata('mensagem',$this->upload->display_errors());
                    redirect(base_url('profissionais'));
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
                'arquivo'=>$arquivo,
            );
            if($this->Profissionais_model->update($id,$update)){
                $this->session->set_flashdata('mensagem','Alterado com sucesso');
            }else{
                $this->session->set_flashdata('mensagem','Falha ao alterar');
            }
            redirect(base_url('profissionais'));
        }
    }
    final function _configsUpload(){
        $config['upload_path'] = '.uploads/profissionais';
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
        $this->form_validation->set_rules('email','Email','erquired|valid_email');
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

?>
