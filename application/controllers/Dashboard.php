<?php

defined('BASEPATH') OR exit ('No direct script access allowed');

class Dashboard extends CI_Controller{

    public function index() 
    {   
        $this->load->model('Penjualan_model', 'penjualan');
        $penjualan = $this->penjualan->get_resume();
        $data = array(
            'title'             => 'Dashboard',
            'penjualan' => $penjualan
        );
        $this->load->view('header');
        $this->load->view('dashboard', $data);
        $this->load->view('footer');
    }
}

?>