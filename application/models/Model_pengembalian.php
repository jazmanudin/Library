<?php

class Model_pengembalian extends CI_Model{


	function getKodeLast(){


		$query ="SELECT * FROM pengembalian ORDER BY kode_pengembalian DESC LIMIT 1";
		return $this->db->query($query);

	}

	function view_peminjaman(){

		$query ="SELECT kode_pinjam,tgl_pinjam,batas_kembali,peminjaman.kode_anggota,nama_anggota
		FROM peminjaman
		INNER JOIN anggota ON peminjaman.kode_anggota = anggota.kode_anggota
		WHERE kode_pinjam NOT IN (SELECT kode_pinjam FROM pengembalian)";
		return $this->db->query($query);
	}

	function view_detailbuku($id){

		$query ="SELECT detailpinjam.kode_buku,nama_buku,pengarang
				FROM detailpinjam
				INNER JOIN buku on detailpinjam.kode_buku = buku.kode_buku
				WHERE kode_pinjam='$id'";

		return $this->db->query($query);
	}

	function input_pengembalian(){

		$kode_pengembalian = $this->input->post("kode_pengembalian");
		$tgl_kembali	   = $this->input->post("tglkembali");
		$kode_pinjam	   = $this->input->post("kode_pinjam");
		$denda			   = $this->input->post("denda");

		$data = array(

				'kode_pengembalian' => $kode_pengembalian,
				'tgl_kembali'		=> $tgl_kembali,
				'kode_pinjam'		=> $kode_pinjam,
				'denda'				=> $denda

		);

		$this->db->insert('pengembalian',$data);

	}


	function view_pengembalian(){

		$query = "SELECT kode_pengembalian,tgl_kembali,pengembalian.kode_pinjam,peminjaman.kode_anggota,nama_anggota
				  FROM pengembalian
				  INNER JOIN peminjaman on pengembalian.kode_pinjam = peminjaman.kode_pinjam
				  INNER JOIN anggota on peminjaman.kode_anggota = anggota.kode_anggota";

		return $this->db->query($query);
	}

	function hapus_pengembalian($id){

		$this->db->delete('pengembalian',array('kode_pengembalian'=>$id));
	}

}