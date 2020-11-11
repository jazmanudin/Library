<?php

class Buku extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		check_login();
		$this->load->model(array('Model_buku','Model_kategori'));


	}

	function view_buku(){
		$data['listbuku'] = $this->Model_buku->view_buku();
		$this->template->load('template','Buku/view_buku',$data);
		
	}
	
	
	function input_buku(){
		
		if(isset($_POST['submit'])){

			$this->Model_buku->input_buku();
			$this->session->set_flashdata('msg',
			'<div class="alert alert-success">
				<h4>Successfully</h4>
				<p>Data Berhasil Di Simpan</p>

			</div>');
			redirect('Buku/view_buku');

		}else{

			$data['listkategori'] = $this->Model_kategori->view_kategori();
			$this->template->load('template','Buku/frm_inputbuku',$data);
		}
	}
	
	
	
	function edit_buku(){
		
		$this->template->load('template','Buku/frm_editbuku');
		
	}

	function hapus_buku(){
		$id = $this->uri->segment(3);
		$this->Model_buku->hapus_buku($id);
		$this->session->set_flashdata('msg',
			'<div class="alert alert-success">
				<h4>Successfully</h4>
				<p>Data Berhasil Di Hapus</p>

			</div>');
		redirect('Buku/view_buku');

	}
	
	function get_buku(){

		$kodebuku 		= $this->input->post('kodebuku');
		$buku 			= $this->Model_buku->get_buku($kodebuku);

		if($buku->num_rows()>0){

			$buku = $buku->row_array();

			echo $buku['nama_buku']."|".$buku['pengarang'];


		}


	}


	function insert_bukutmp(){

		$kodebuku 		= $this->input->post('kodebuku');

		$cekbuku 		= $this->Model_buku->cekbuku($kodebuku);
		
		if($cekbuku->num_rows()>0){
			echo "<script>alert('Data Buku Sudah di Masukan')</script>";
		}else{
			$this->Model_buku->insert_bukutmp($kodebuku);
		}
		


	}


	function delbukutmp(){

		$kodebuku 		= $this->input->post('kodebuku');
		$this->Model_buku->delbukutmp($kodebuku);



	}


	function view_bukutmp(){

		$data['bukutmp'] = $this->Model_buku->view_bukutmp();
		$this->load->view('Peminjaman/bukutmp',$data);

	}
	
	
	
}