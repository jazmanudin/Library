<?php

class Model_buku extends CI_Model{


	function get_buku($id){


		return $this->db->get_where('buku',array('kode_buku'=>$id));



	}



	function view_buku(){

			$query = " SELECT kode_buku,nama_buku,nama_kategori,pengarang,penerbit,tahun FROM buku
					   INNER JOIN kategori ON buku.kode_kategori = kategori.kode_kategori";
			return $this->db->query($query);


	}

	function hapus_buku($id){

		$this->db->delete('buku',array('kode_buku'=>$id));

	}

	function input_buku(){
		$kode_buku 		= $this->input->post('kode_buku');
		$nama_buku		= $this->input->post('nama_buku');
		$kategori 		= $this->input->post('kategori');
		$pengarang		= $this->input->post('pengarang');
		$penerbit 		= $this->input->post('penerbit');
		$tahun			= $this->input->post('tahun');


		$data = array(

				'kode_buku' 	=> $kode_buku,
				'nama_buku' 	=> $nama_buku,
				'kode_kategori' => $kategori,
				'pengarang'		=> $pengarang,
				'penerbit'		=> $penerbit,
				'tahun'			=> $tahun

		);

		$this->db->insert('buku',$data);
	}



	function insert_bukutmp($kode_buku){

		$data = array(

			'kode_buku' => $kode_buku
		);
		$this->db->insert('tmp',$data);

	}


	function view_bukutmp(){

		$query ="SELECT tmp.kode_buku,nama_buku,pengarang 
				FROM tmp 
				INNER JOIN buku ON tmp.kode_buku = buku.kode_buku";
		return $this->db->query($query);

	}


	function delbukutmp($kode_buku){

		$this->db->delete('tmp',array('kode_buku'=>$kode_buku));

	}

	function cekbuku($kode_buku){


		return $this->db->get_where('tmp',array('kode_buku'=>$kode_buku));

	}





}