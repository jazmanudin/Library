<?php

class Model_Provinsi extends CI_Model {



	function listprovinsi(){

		return $this->db->get('provinsi');

	}


	function listkabupaten($id){


		$this->db->order_by('nama_kota','ASC');
		return $this->db->get_where('kota',array('id_provinsi'=>$id));


	}


	function listkecamatan($id){


		$this->db->order_by('nama_kecamatan','ASC');
		return $this->db->get_where('kecamatan',array('id_kota'=>$id));


	}


	function getKota($id){


		return $this->db->get_where('kota',array('id_kota'=>$id));
	}

	function getKecamatan($id){


		return $this->db->get_where('kecamatan',array('id_kecamatan'=>$id));
	}



}