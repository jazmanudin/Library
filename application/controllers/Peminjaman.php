<?php 

class Peminjaman extends CI_COntroller{
	
	function __construct(){
		parent::__construct();
		check_login();
		$this->load->Model(array('Model_peminjaman','Model_anggota','Model_buku'));
	}

	function view_peminjaman(){
		$data['list_peminjaman'] = $this->Model_peminjaman->view_peminjaman();
		$this->template->load('template','Peminjaman/view_peminjaman',$data);
	}
	

	function hapus_peminjaman(){

		$id = $this->uri->segment(3);
		$this->Model_peminjaman->hapus_peminjaman($id);
		$this->session->set_flashdata('msg',
			'<div class="alert alert-success">
				<h4>Successfully</h4>
				<p>Data Berhasil Di Hapus</p>

			</div>');
		redirect('peminjaman/view_peminjaman');

	}
	
	
	function input_peminjaman(){
		if(isset($_POST['submit'])){
			$insertpinjam = $this->Model_peminjaman->input_peminjaman();
			$this->session->set_flashdata('msg',
			'<div class="alert alert-success">
				<h4>Successfully</h4>
				<p>Data Berhasil Di Simpan</p>

			</div>');
			redirect('Peminjaman/view_peminjaman');
		}else{

			$peminjaman 			= $this->Model_peminjaman->getKodeLast()->row_array();
			$nomorterakhir			= $peminjaman['kode_pinjam'];
			$tglhariini 			= date("dmy");
			$data['kode_pinjam']	= buatkode($nomorterakhir,'P'.$tglhariini,3);
			$data['listanggota']	= $this->Model_anggota->view_anggota();
			$data['listbuku']		= $this->Model_buku->view_buku();
			$this->template->load('template','Peminjaman/frm_inputpinjam',$data);
		}
	}


	function view_detailpinjam(){

		$id 					= $this->input->post('kode_pinjam');
		$data['list_detail']	= $this->Model_peminjaman->view_detailpinjam($id);
		$this->load->view('peminjaman/view_detailpinjam',$data);

	}

	function hitungtglkembali(){

		$tgl_pinjam 	= $this->input->post('tgl_peminjaman');
		$tgl_kembali 	= date('Y-m-d', strtotime("+7 day", strtotime(date($tgl_pinjam))));
		echo $tgl_kembali;

	}


	function cek_jmlbuku(){

		$jmlbuku = $this->Model_peminjaman->cek_jmlbuku()->num_rows();

		echo $jmlbuku;

	}


	function laporan(){

		$this->template->load('template','peminjaman/frm_laporan');

	}

	function view_lappinjam(){
		$dari 						= $this->input->post('dari');
		$sampai						= $this->input->post('sampai');
		$data['list_peminjaman']	= $this->Model_peminjaman->view_lappinjam($dari,$sampai);
		$this->load->view('peminjaman/view_lappinjam',$data);

	}

	function lap_peminjaman(){
		$dari 						= $this->input->post('dari');
		$sampai						= $this->input->post('sampai');
		$data['dari']				= $dari;
		$data['sampai']				= $sampai;
		$data['list_peminjaman']	= $this->Model_peminjaman->view_lappinjam($dari,$sampai);
		$this->load->view('laporan/lap_peminjaman',$data);
	}
	
	
}