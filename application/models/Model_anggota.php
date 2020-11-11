<?php

class Model_anggota extends CI_Model{

	function input_anggota($typefile){


		$kode_anggota = $this->input->post('kode_anggota');
		$nama_anggota = $this->input->post('nama_anggota');
		$provinsi	  = $this->input->post('provinsi');
		$kota 		  = $this->input->post('kota');
		$kecamatan 	  = $this->input->post('kecamatan');
		$alamat	 	  = $this->input->post('alamat');
		$jk	 	  	  = $this->input->post('jk');
		$no_hp	 	  = $this->input->post('no_hp');
		$tanggallahir = $this->input->post('tgl_lahir');
		$tgldaftar	  = $this->input->post('tgl_daftar');
		$foto		  = $this->input->post('kode_anggota').$typefile;

		


		$data = array(

			'kode_anggota' => $kode_anggota,
			'nama_anggota' => $nama_anggota,
			'id_provinsi'  => $provinsi,
			'id_kota'	   => $kota,
			'id_kecamatan' => $kecamatan,
			'alamat'	   => $alamat,
			'jk'		   => $jk,
			'no_hp'		   => $no_hp,
			'tgl_lahir'    => $tanggallahir,
			'tgl_daftar'   => $tgldaftar,
			'foto'		   => $foto


		);

		$this->db->insert('anggota',$data);


	}



	function update_anggota(){


		$kode_anggota = $this->input->post('kode_anggota');
		$nama_anggota = $this->input->post('nama_anggota');
		$provinsi	  = $this->input->post('provinsi');
		$kota 		  = $this->input->post('kota');
		$kecamatan 	  = $this->input->post('kecamatan');
		$alamat	 	  = $this->input->post('alamat');
		$jk	 	  	  = $this->input->post('jk');
		$no_hp	 	  = $this->input->post('no_hp');
		$tanggallahir = $this->input->post('tgl_lahir');
		$tgldaftar	  = $this->input->post('tgl_daftar');
		

		


		$data = array(

			
			'nama_anggota' => $nama_anggota,
			'id_provinsi'  => $provinsi,
			'id_kota'	   => $kota,
			'id_kecamatan' => $kecamatan,
			'alamat'	   => $alamat,
			'jk'		   => $jk,
			'no_hp'		   => $no_hp,
			'tgl_lahir'    => $tanggallahir,
			'tgl_daftar'   => $tgldaftar,
			


		);

		$this->db->update('anggota',$data,array('kode_anggota'=>$kode_anggota));


	}

	




	function view_anggota(){


		return $this->db->get('anggota');


	}

	function hapus_anggota($id){


			$this->db->delete('anggota',array('kode_anggota'=>$id));

	}


	function getAnggota($id){


		return $this->db->get_where('anggota',array('kode_anggota'=>$id));
	}



	function getKodeLast(){


		$query = "SELECT * FROM anggota ORDER BY kode_anggota DESC LIMIT 1";
		return $this->db->query($query);
	}



}