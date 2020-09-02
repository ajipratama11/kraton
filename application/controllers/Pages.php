<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
    function __construct(){
        parent::__construct();
		$this->icon = "fa-desktop";
		$this->load->model('M_barang');
	}
	public function home()
	{
		$this->load->view("pages/home");
	}
	public function dashboard(){
		$param['pageInfo'] = "Dashboard";
	}
	public function form(){
		$param['pageInfo'] = "Example Form";
		$this->template->load("pages/form", $param);
	}
	public function table(){
		$param['pageInfo'] = "Example Table";
		$this->template->load("pages/table", $param);
	}
	public function login(){
		$this->load->view("auth/login");
	}


	public function tambah_barang()
    {
            $this->M_barang->addBarang();
            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Barang Berhasil Disimpan :)</div>');
            redirect('Pages/table');
        
    }

	
}
