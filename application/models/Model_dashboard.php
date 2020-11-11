<?php

class Model_dashboard extends CI_Model{


	function grafikAnggota(){
		$tahunini = date('Y');
		$query = "SELECT bulan.id,nama_bulan,(SELECT COUNT(kode_anggota) as jmlanggota FROM anggota WHERE MONTH(tgl_daftar) = bulan.id 
		          AND YEAR(tgl_daftar) = '$tahunini') as jmlanggota FROM bulan";
		return $this->db->query($query);
	}

	function grafikKategori(){


		$query = "  SELECT nama_kategori, COUNT(buku.kode_buku) as jml FROM buku
					
					INNER JOIN kategori ON buku.kode_kategori = kategori.kode_kategori GROUP by nama_kategori";

		return $this->db->query($query);
	}

	function listbulan(){
		$query = "SELECT * FROM bulan LIMIT 4";
		return $this->db->query($query);

	}


	function grafikPeminjaman($tahun){

		$query = "SELECT bulan.id,nama_bulan,(SELECT COUNT(kode_pinjam) as jml FROM peminjaman WHERE MONTH(tgl_pinjam) = bulan.id AND YEAR(		  tgl_pinjam) ='$tahun') as jml FROM bulan";
		return $this->db->query($query);

	}


}