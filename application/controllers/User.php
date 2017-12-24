<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}

	public function index()
	{
		$this->load->view('user/login');
    }

    // login proccess
    function login_proccess(){
        $arr = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        $userLogin = $this->users_model->login_proccess($arr);
        if($userLogin->num_rows() == 1){
            $this->session->set_userdata('username', $userLogin->row()->username);
            $this->session->set_flashdata('message', 'Login berhasil');
            redirect('home');
        }else{
            $this->session->set_flashdata('message', 'Login gagal');
            redirect('user');
        }
    }
}
