<?php

class Dashboard extends Ci_Controller{

	function __construct(){
		parent::__construct();
		check_login();
		$this->load->model(array('Model_dashboard','Model_buku','Model_anggota','Model_kategori','Model_peminjaman'));
	}



	function index(){
		$tahunini					= date("Y");
		$tahunlalu					= $tahunini - 1;
		$data['getJmlBuku']			= $this->Model_buku->view_buku()->num_rows();
		$data['getJmlAnggota']		= $this->Model_anggota->view_anggota()->num_rows();
		$data['getJmlKategori']		= $this->Model_kategori->view_kategori()->num_rows();
		$data['getJmlPinjam']		= $this->Model_peminjaman->view_peminjaman()->num_rows();
		$data['bulan'] 				= $this->Model_dashboard->listbulan();
		$data['grafikKategori'] 	= $this->Model_dashboard->grafikKategori();
		$data['grafikAnggota']  	= $this->Model_dashboard->grafikAnggota();
		$data['grafikPinjamNow']	= $this->Model_dashboard->grafikPeminjaman($tahunini);
		$data['grafikPinjamLast']	= $this->Model_dashboard->grafikPeminjaman($tahunlalu);	 
		$this->template->load('template','dashboard',$data);
	}



}