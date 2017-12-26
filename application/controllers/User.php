<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}

	public function index($alert = null)
	{
        if($alert != null){
            $this->session->set_flashdata('message', 'Anda harus login terlebih dahulu');
        }
		$this->load->view('user/login');
    }

    // login proccess
    function login_proccess(){
        $arr = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
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

    // signup
    function signup(){
        $this->load->view('user/signup');
    }

    // signup proccess
    function signup_proccess(){
        // validation duplicate
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[pelanggan.email]');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[pelanggan.username]');

        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('message','Username / Email sudah digunakan');
            redirect('user/signup');
        }else{
            $config['upload_path']          = './assets/img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
            $config['max_width']            = 1024;
            $config['max_height']           = 1024;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')){
                $this->session->set_flashdata('message', 'Error pada saat upload foto');
                redirect('user/signup');
            }else{
                $arr = array(
                    'nama' => $this->input->post('nama'),
                    'jenkel' => $this->input->post('jenkel'),
                    'telepon' => $this->input->post('telepon'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                    'foto' => $this->upload->data('file_name'),
                    'kota' => $this->input->post('kota'),
                    'provinsi' => $this->input->post('provinsi'),
                    'negara' => $this->input->post('negara'),
                    'kodepos' => $this->input->post('kodepos'),
                    'alamat' => $this->input->post('alamat')
                );

                $insert = $this->users_model->signup_proccess($arr);
                if($insert){
                    $this->session->set_flashdata('message', 'Data berhasil disimpan');
                    redirect('user');
                }else{
                    $this->session->set_flashdata('message', 'Gagal insert ke database');
                    redirect('user/signup');
                }
            }
        }
    }

    // logout
    function logout(){
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message','Anda berhasil keluar');
        redirect('home');
    }

    // view
    function view(){
        if(!empty($this->session->userdata('username'))){
            $data['currentUser'] = $this->users_model->currentUser();
            $this->load->view('user/view', $data);
        }else{
            $this->session->set_flashdata('message', 'Anda harus login terlebih dahulu');
            $this->load->view('user');
        }
    }

    // edit
    function edit(){
        if(!empty($this->session->userdata('username'))){
            $data['currentUser'] = $this->users_model->currentUser();
            $this->load->view('user/edit', $data);
        }else{
            $this->session->set_flashdata('message', 'Anda harus login terlebih dahulu');
            $this->load->view('user');
        }
    }

    // edit proccess
    function edit_proccess($id){
        if(!empty($this->session->userdata('username'))){
            
            // if photo changed
            if(!empty($_FILES['foto']['name'])) {
                $config['upload_path']          = './assets/img/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                $config['max_width']            = 1024;
                $config['max_height']           = 1024;
                
                $this->load->library('upload', $config);
                
                if($this->upload->do_upload('foto')){

                    // current data
                    $dataCurrentUser = $this->users_model->currentUser();

                    // unlink foto <hapus foto lama>
                    unlink($config['upload_path'].$dataCurrentUser->row()->foto); 

                    // post
                    $arr = array(
                        'nama' => $this->input->post('nama'),
                        'jenkel' => $this->input->post('jenkel'),
                        'telepon' => $this->input->post('telepon'),
                        'email' => $this->input->post('email'),
                        'username' => $this->input->post('username'),
                        'foto' => $this->upload->data('file_name'),
                        'kota' => $this->input->post('kota'),
                        'provinsi' => $this->input->post('provinsi'),
                        'negara' => $this->input->post('negara'),
                        'kodepos' => $this->input->post('kodepos'),
                        'alamat' => $this->input->post('alamat')
                    );

                    // jika password diubah
                    if(!empty($this->input->post('password'))){
                        $arr['password'] = md5($this->input->post('password'));
                    }
    
                    $update = $this->users_model->edit_proccess($arr, $id);

                    if($update){
                        $this->session->set_userdata('username', $this->input->post('username'));
                        $this->session->set_flashdata('message', 'Data berhasil diedit');
                        redirect('user/edit');
                    }else{
                        $this->session->set_flashdata('message', 'Gagal update ke database');
                        redirect('user/edit');
                    }

                }else{
                    $this->session->set_flashdata('message', 'Error pada saat upload foto');
                    redirect('user/edit');
                }

            // if photo not changed
            }else{
                // post
                $arr = array(
                    'nama' => $this->input->post('nama'),
                    'jenkel' => $this->input->post('jenkel'),
                    'telepon' => $this->input->post('telepon'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'kota' => $this->input->post('kota'),
                    'provinsi' => $this->input->post('provinsi'),
                    'negara' => $this->input->post('negara'),
                    'kodepos' => $this->input->post('kodepos'),
                    'alamat' => $this->input->post('alamat')
                );

                // jika password diubah
                if(!empty($this->input->post('password'))){
                    $arr['password'] = md5($this->input->post('password'));
                }

                $update = $this->users_model->edit_proccess($arr, $id);

                if($update){
                    $this->session->set_userdata('username', $this->input->post('username'));
                    $this->session->set_flashdata('message', 'Data berhasil diedit');
                    redirect('user/edit');
                }else{
                    $this->session->set_flashdata('message', 'Gagal update ke database');
                    redirect('user/edit');
                }
            }

        }else{
            $this->session->set_flashdata('message', 'Anda harus login terlebih dahulu');
            $this->load->view('user');
        }
    }
}
