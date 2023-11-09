<?php

defined('BASEPATH') OR exit ('No direct script access allowed');

class Dashboard extends CI_Controller{

    public function __construct() 
    {
        parent :: __construct();
        if ($this->session->userdata('login') != 1){
            redirect('login');
        }
    }

    public function index() 
    {   
        $this->load->model('Penjualan_model', 'penjualan');
        $this->load->model('Pembelian_model', 'pembelian');
        $penjualan = $this->penjualan->get_resume();
        $pembelian = $this->pembelian->get_resume();

        $data = array(
            'title'             => 'Dashboard',
            'penjualan' => $penjualan,
            'pembelian' => $pembelian
        );
        $this->load->view('header');
        $this->load->view('dashboard', $data);
        $this->load->view('footer');
    }
}

?>