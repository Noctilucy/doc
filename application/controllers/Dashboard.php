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
        $data_grafik = $this->db->query("SELECT sum(total_harga) as total, MONTH(tgl_transaksi) as bulan from pembelian group by MONTH(tgl_transaksi)")->result();

        $penjualan = $this->penjualan->get_resume();
        $pembelian = $this->pembelian->get_resume();
        $debit = $this->penjualan->get_debit();

        $data = array(
            'title'             => 'Dashboard',
            'penjualan' => $penjualan,
            'pembelian' => $pembelian,
            'data_grafik' => $data_grafik,
            'pembayaran'=> $debit
        );
        $this->load->view('header');
        $this->load->view('dashboard', $data);
        $this->load->view('footer');
    }
}

?>