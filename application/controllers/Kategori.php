<?php


class Kategori extends CI_Controller{
	
	function __construct(){
		parent:: __construct();
		check_login();
		$this->load->model('Model_kategori');
	}
	function view_kategori(){
		
		$data['listkategori'] = $this->Model_kategori->view_kategori();
		$this->template->load('template','Kategori/view_kategori',$data);
		
	}
	
	
	function input_kategori(){

		if(isset($_POST['submit'])){

			$this->Model_kategori->input_kategori();
			redirect('Kategori/view_kategori');
			$this->session->set_flashdata('msg',
			'<div class="alert alert-success">
				<h4>Successfully</h4>
				<p>Data Berhasil Di Simpan</p>

			</div>');
		}

		$kategori 				= $this->Model_kategori->getKodeLast()->row_array();
		$nomorterakhir			= $kategori['kode_kategori'];
		$data['kode_kategori']	= buatkode($nomorterakhir,'K',3);
		$this->template->load('template','Kategori/frm_inputkategori',$data);
		
	}
	
	
	
	function edit_kategori(){
		
		$this->template->load('template','Kategori/frm_editkategori');
		
	}


	function hapus_kategori(){

		$id = $this->uri->segment(3);
		$this->Model_kategori->hapus_kategori($id);
		$this->session->set_flashdata('msg',
			'<div class="alert alert-success">
				<h4>Successfully</h4>
				<p>Data Berhasil Di Hapus</p>

			</div>');
		redirect('Kategori/view_kategori');


	}
	
	
	
}