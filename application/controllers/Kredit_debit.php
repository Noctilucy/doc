<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Kredit_debit extends CI_Controller {

    public function __construct() 
    {
        parent :: __construct();
        if ($this->session->userdata('login') != 1){
            redirect('login');
          
        }
    }

    public function index()
    {
        $this->load->model('Kredit_debit_model', 'kdm');
        $this->load->model('Penjualan_model', 'penjualan');
        $this->load->model('Pembelian_model', 'pembelian');
        $data_debit_kredit = $this->kdm->get_list();
        $debit = $this->penjualan->get_debit();
        $kredit = $this->pembelian->get_kredit();

        $data = array(
            'title' => 'Kredit Debit',
            'data_kd' => $data_debit_kredit,
            'debit'=> $debit,
            'kredit'=> $kredit
        );

        $this->load->view('header');
        $this->load->view('kredit_debit/list', $data);
        $this->load->view('footer');
      
    }
}

?>