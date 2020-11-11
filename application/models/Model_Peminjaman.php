<?php

class Model_peminjaman extends CI_Model{



	function getKodeLast(){


		$query = "SELECT * FROM peminjaman ORDER BY kode_pinjam DESC LIMIT 1";
		return $this->db->query($query);


	}

	function cek_jmlbuku(){

		return $this->db->get('tmp');

	}


	function view_peminjaman(){

		$query = "SELECT kode_pinjam,tgl_pinjam,batas_kembali,peminjaman.kode_anggota,nama_anggota
				  FROM peminjaman
				  INNER JOIN anggota on peminjaman.kode_anggota = anggota.kode_anggota";

		return $this->db->query($query);

	}

	function view_detailpinjam($id){

		$query ="SELECT detailpinjam.kode_buku,nama_buku,pengarang FROM detailpinjam
				INNER JOIN buku on detailpinjam.kode_buku = buku.kode_buku WHERE kode_pinjam = '$id'";
		return $this->db->query($query);
	}

	function hapus_peminjaman($id){
		$hapuspinjam = $this->db->delete('peminjaman',array('kode_pinjam'=>$id));
		if ($hapuspinjam){

			$this->db->delete('detailpinjam',array('kode_pinjam'=>$id));

		}
	}

	function input_peminjaman(){

		$kode_pinjam 	= $this->input->post('kode_peminjaman');
		$tgl_peminjaman	= $this->input->post('tgl_pinjam');
		$tgl_kembali	= $this->input->post('tgl_kembali');
		$kode_anggota	= $this->input->post('kode_anggota');
		$detailbuku		= $this->db->get('tmp');
		

		$data			= array(

						 'kode_pinjam' 	=> $kode_pinjam,
						 'tgl_pinjam'  	=> $tgl_peminjaman,
						 'batas_kembali'=> $tgl_kembali,
						 'kode_anggota'	=> $kode_anggota	
		);	

		$insertpinjam 	= $this->db->insert('peminjaman',$data);			
		if ($insertpinjam){

			foreach ($detailbuku->result() as $d) {

				$databuku = array(

							'kode_pinjam' => $kode_pinjam,
							'kode_buku'   => $d->kode_buku	

				);

				$this->db->insert('detailpinjam',$databuku);
			}	

			$query = "truncate table tmp";
			$this->db->query($query);
		}
		


	}


	function view_lappinjam($dari,$sampai){

		$query = "SELECT kode_pinjam,tgl_pinjam,batas_kembali,peminjaman.kode_anggota,nama_anggota
				  FROM peminjaman
				  INNER JOIN anggota on peminjaman.kode_anggota = anggota.kode_anggota
				  WHERE tgl_pinjam BETWEEN '$dari' AND '$sampai'";

		return $this->db->query($query);


	}


}