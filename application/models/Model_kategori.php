<?php

class Model_kategori extends CI_Model{


	function view_kategori(){


		return $this->db->get('kategori');
	}


	function getKodeLast(){

		$query = "SELECT * FROM kategori ORDER BY kode_kategori DESC LIMIT 1";
		return $this->db->query($query);

	}

	function input_kategori(){

		$kode_kategori = $this->input->post('kode_kategori');
		$nama_kategori = $this->input->post('nama_kategori');

		$data = array(

				'kode_kategori' => $kode_kategori,
				'nama_kategori' => $nama_kategori

		);

		$this->db->insert('kategori',$data);

	}


	function hapus_kategori($id){


		$this->db->delete('kategori',array('kode_kategori'=>$id));

	}



}