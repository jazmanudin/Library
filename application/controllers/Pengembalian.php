<?php

class Pengembalian extends CI_Controller{

	function __construct(){
		parent::__construct();
		check_login();
		$this->load->model(array('Model_pengembalian'));

	}
	function view_pengembalian(){

		$data['list_pengembalian'] = $this->Model_pengembalian->view_pengembalian();
		$this->template->load('template','Pengembalian/view_pengembalian',$data);
	}

	function input_pengembalian(){
		
		if(isset($_POST['submit'])){

			$this->Model_pengembalian->input_pengembalian();
			redirect('pengembalian/view_pengembalian');
		}else{

			$pengembalian 				= $this->Model_pengembalian->getKodeLast()->row_array();
			$nomor_terakhir 			= $pengembalian['kode_pengembalian'];
			$tglhariini					= date('dmy');
			$data['kode_pengembalian']	= buatkode($nomor_terakhir,'PB'.$tglhariini,3);
			$data['list_peminjaman'] 	= $this->Model_pengembalian->view_peminjaman();
			$this->template->load('template','Pengembalian/input_pengembalian',$data);
		}
	}

	function detail_buku(){
		$id = $this->input->post('kode_pinjam');
		$data['list_detail'] = $this->Model_pengembalian->view_detailbuku($id);
		$this->load->view('pengembalian/detail_buku',$data);
	}

	function hapus_pengembalian(){

		$id = $this->uri->segment(3);
		$this->Model_pengembalian->hapus_pengembalian($id);
		redirect('pengembalian/view_pengembalian');
	}

}