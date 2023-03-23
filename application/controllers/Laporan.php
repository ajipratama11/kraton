<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->icon = "fa-desktop";
        $this->load->model('Excel_import_model');
        $this->load->model('M_pembelian');
        $this->load->model('M_penjualan');
        $this->load->model('M_laporan');
        if ($this->session->userdata('status') != "login") {
            echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '" . base_url('Login') . "';
            </script>"; //Url Logi
        }
    }

    function index()
    {
        $this->load->view('excel_import');
    }
    public function laporanpembelian()
    {

        $param['pageInfo'] = "List Pembelian";
		$param['pembelian'] = $this->M_pembelian->listpembelian();
		$this->template->load("laporan/v_pembelian", $param);
    }
    public function laporanpenjualan()
    {

        $param['pageInfo'] = "List Penjualan";
        $param['penjualan'] = $this->M_penjualan->listpenjualan();
		$this->template->load("laporan/v_penjualan", $param);
    }
  
}
