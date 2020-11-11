<?php

class Anggota extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		check_login();
		$this->load->model(array('Model_provinsi','Model_anggota'));
	}

	function view_anggota(){
		$data['listanggota'] = $this->Model_anggota->view_anggota();
		$this->template->load('template','Anggota/view_anggota',$data);

	
	}	
	
	
	function input_anggota(){

		if(isset($_POST['submit'])){
			$config['upload_path']          = './uploads/foto_anggota';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	  		$config['file_name']			= $this->input->post('kode_anggota');
	        $this->load->library('upload', $config);
	     	


	     	if($this->upload->do_upload('foto')){
	     		$gbr	  =$this->upload->data();
	     		$typefile =$gbr['file_ext'];
	     		$this->Model_anggota->input_anggota($typefile);
	     		$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
					<h4>Successfully</h4>
					<p>Data Berhasil Di Simpan</p>

				</div>');
	     		redirect('Anggota/view_anggota');

	     		
	     	}else{

	     		echo "ERROR";
	     	}
	 
		}else{
			
			$anggota 				= $this->Model_anggota->getKodeLast()->row_array();
			$nomorterakhir			= $anggota['kode_anggota'];			
			$data['kode_anggota']	= buatkode($nomorterakhir,'A',4);
			$data['listprovinsi'] 	= $this->Model_provinsi->listprovinsi();
			$this->template->load('template','Anggota/frm_inputanggota',$data);

		}
		
		
		
	}
	
	function edit_anggota(){
		
		if(isset($_POST['submit'])){

			$this->Model_anggota->update_anggota();
			$this->session->set_flashdata('msg',
			'<div class="alert alert-success">
				<h4>Successfully</h4>
				<p>Data Berhasil Di Update</p>

			</div>');
			redirect('anggota/view_anggota');

		}else{
			$id 					= $this->uri->segment(3);
			$anggota 				= $this->Model_anggota->getAnggota($id)->row_array();
			$kota 					= $this->Model_provinsi->getKota($anggota['id_kota'])->row_array();
			$kec 					= $this->Model_provinsi->getKecamatan($anggota['id_kecamatan'])->row_array();
			$data['anggota']		= $anggota;
			$data['kota']			= $kota['nama_kota'];
			$data['kec']			= $kec['nama_kecamatan'];
			$data['listprovinsi'] 	= $this->Model_provinsi->listprovinsi();
			$this->template->load('template','Anggota/frm_editanggota',$data);
		}
		
	}

	function get_kota(){

		$id_prov 		= $this->input->post('id_prov');
		$listkabupaten  = $this->Model_provinsi->listkabupaten($id_prov);
		echo "<option>-- Plih Kabupaten / Kota -- </option>";
		foreach ($listkabupaten->result() as $k){

			echo "<option value=$k->id_kota>$k->nama_kota</option>";


		}

	}


	function get_kecamatan(){

		$id_kota		= $this->input->post('id_kota');
		$listkecamatan  = $this->Model_provinsi->listkecamatan($id_kota);
		echo "<option>-- Plih Kecamatan -- </option>";
		foreach ($listkecamatan->result() as $k){

			echo "<option value=$k->id_kecamatan>$k->nama_kecamatan</option>";


		}

	}


	function hapus_anggota(){
		$this->load->library('upload');
		$path ="./uploads/foto_anggota/";
		$id = $this->uri->segment(3);
		$d = $this->Model_anggota->getAnggota($id)->row_array();
		@unlink($path.$d['foto']);
		$this->Model_anggota->hapus_anggota($id);

		$this->session->set_flashdata('msg',
			'<div class="alert alert-success">
				<h4>Successfully</h4>
				<p>Data Berhasil Di Hapus</p>

			</div>');
		redirect('Anggota/view_anggota');


	}
	
	
	
	
}
