<?php

Class Auth extends CI_Controller{

    function __construct() {
        parent::__construct();
     
        $this->load->model(array('Model_user'));

    }


    // Login
    function index(){


        if(isset($_POST['submit'])){
          $username = $this->input->post('username');
          $password = $this->input->post('password');

           $hasil = $this->Model_user->login($username,$password)->num_rows();
           $op    = $this->Model_user->login($username,$password)->row_array();

           if($hasil!=0){

               $this->session->set_userdata(array('status_login'=>'admin','operator_id'=>$op['id_user'],'nama_user'=>$op['nama_lengkap']));
               redirect('dashboard');
           }else{

               redirect('auth');
           }
        }else{
            check_log();
            $this->template->load('template_login','Auth/frm_login');
        }


    }




    

    //Log Out

    function logout(){

        $this->session->sess_destroy();
        redirect('auth');

    }


  


}
