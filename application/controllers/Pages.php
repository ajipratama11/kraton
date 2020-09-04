<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->icon = "fa-desktop";
		$this->load->model('M_barang');
		$this->load->model('M_kategori');
	}
	public function home()
	{
		$this->load->view("pages/home");
	}
	public function dashboard()
	{
		$param['pageInfo'] = "Dashboard";
	}
	public function form_tambahbarang()
	{
		$param['pageInfo'] = "Example Form";
		$param['kategori'] = $this->db->query("SELECT * FROM kategori")->result();
		$this->template->load("pages/v_tambahbarang", $param);
	}
	public function edit_kategori()
	{
		$this->load->view("pages/v_modal_edit_kategori");
	}
	public function tambah_stok()
	{
		$this->load->view("pages/v_modal_tambah_stok");
	}
	public function aksitambah_stok()
	{
		$id = $this->input->post('id');
		$tambahstok = $this->input->post('tambahstok');
		$this->db->query("UPDATE `barang` SET `stok`=stok+'$tambahstok' WHERE id_barang='$id'");
		redirect('Pages/table_barang');
	}


	public function delete_barang(){
		$id_barang = $this->uri->segment(3);
		$this->M_barang->deleteBarang($id_barang);
		$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Barang Berhasil Disimpan :)</div>');
		redirect('Pages/table_barang');
	}
	public function delete_kategori(){
		$id_kategori = $this->uri->segment(3);
		$this->M_kategori->deleteKategori($id_kategori);
		$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Barang Berhasil Disimpan :)</div>');
		redirect('Pages/table_kategori');
	}
	public function table_barang()
	{
		$param['pageInfo'] = "Example Table";
		$param['barang'] = $this->M_barang->get_barang();
		$this->template->load("pages/v_barang", $param);
	}
	public function table_kategori()
	{
		$param['pageInfo'] = "Example Table";
		$param['kategori'] = $this->M_kategori->get_kategori();
		$this->template->load("pages/v_kategori", $param);
	}
	public function login()
	{
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
