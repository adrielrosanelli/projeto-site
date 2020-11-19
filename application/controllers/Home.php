<?php
require_once 'Profissionais.php';
class Home extends MY_Controller
{
    public function index()
    {
        $this->load->view('home/index');
    }
}
