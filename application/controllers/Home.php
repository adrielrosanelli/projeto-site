<?php
class Home extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profissionais_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['transacionador'] = $this->Profissionais_model->get_all();
        $this->load->view('home/index', $data);
    }
}
