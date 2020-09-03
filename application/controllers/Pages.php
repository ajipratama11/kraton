<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
    function __construct(){
        parent::__construct();
		$this->icon = "fa-desktop";
		$this->load->model('M_barang');
		$this->load->model('M_kategori');
	}
	public function home()
	{
		$this->load->view("pages/home");
	}
	public function dashboard(){
		$param['pageInfo'] = "Dashboard";
	}
	public function form_tambahbarang(){
		$param['pageInfo'] = "Example Form";
		$this->template->load("pages/v_tambahbarang", $param);
	}
	public function table_barang(){
		$param['pageInfo'] = "Example Table";
		$param['barang'] = $this->M_barang->get_barang();
		$this->template->load("pages/v_barang", $param);
	}
	public function table_kategori(){
		$param['pageInfo'] = "Example Table";
		$param['kategori'] = $this->M_kategori->get_kategori();
		$this->template->load("pages/v_kategori", $param);
	}
	public function login(){
		$this->load->view("auth/login");
	}


	public function tambah_barang()
    {
			$id_barang = $this->M_barang->get_idbarang();
            $this->M_barang->addBarang($id_barang);
            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Barang Berhasil Disimpan :)</div>');
            redirect('Pages/table_barang');
    }
	public function tambah_kategori()
    {
			$id_kategori = $this->M_kategori->get_idkategori();
            $this->M_kategori->addKategori($id_kategori);
            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Barang Berhasil Disimpan :)</div>');
            redirect('Pages/table_kategori');
    }

	
}
