<?php

class Model_user extends CI_Model{



	function login($username,$password){


		 $check      = $this->db->get_where('users',array('username'=>$username,'password'=>$password));
         return      $check;
	}



}