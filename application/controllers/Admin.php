<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		$this->load->view('admin/login');
    }

    // login proccess
    function login_proccess(){
        $arr = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        );

        $userLogin = $this->admin_model->login_proccess($arr);
        if($userLogin->num_rows() == 1){
            $this->session->set_userdata('adminUsername', $userLogin->row()->username);
            $this->session->set_flashdata('message', 'Login berhasil');
            redirect('admin/home');
        }else{
            $this->session->set_flashdata('message', 'Login gagal');
            redirect('admin');
        }
    }

    // logout
    function logout(){
        $this->session->unset_userdata('adminUsername');
        $this->session->set_flashdata('message','Anda berhasil keluar');
        redirect('admin');
    }

    // home
    public function home()
	{
        if(empty($this->session->userdata('adminUsername'))){
            $this->load->view('admin/login');
        }else{
            $this->load->view('admin/home');
        }
    }

    // product view
    function product_view(){
        if(empty($this->session->userdata('adminUsername'))){
            $this->load->view('admin/login');
        }else{
            $data['getAllProduct'] = $this->admin_model->getAllProduct();
            $this->load->view('admin/product/view', $data);
        }
    }
    
    // product detail
    function product_details($id){
        if(empty($this->session->userdata('adminUsername'))){
            $this->load->view('admin/login');
        }else{
            $data['productById'] = $this->admin_model->productById($id);
            $this->load->view('admin/product/details', $data);
        }
    }

    // product detail
    function product_delete($id){
        if(empty($this->session->userdata('adminUsername'))){
            $this->load->view('admin/login');
        }else{
            $this->admin_model->productDeleteById($id);
            $this->session->set_flashdata('message', 'Berhasil dihapus');
            redirect('admin/product_view');
        }
    }

    // add product
    function product_add(){
        if(empty($this->session->userdata('adminUsername'))){
            $this->load->view('admin/login');
        }else{
            $this->load->view('admin/product/add');
        }
    }

    // product_add_proccess
    function product_add_proccess(){
        if(empty($this->session->userdata('adminUsername'))){
            $this->load->view('admin/login');
        }else{
            $config['upload_path']          = './assets/img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
            $config['max_width']            = 1024;
            $config['max_height']           = 1024;
    
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('foto')){
                $this->session->set_flashdata('message', 'Error pada saat upload foto. Maximal 2MB!!!');
                redirect('admin/product_view');
            }else{
                $arr = array(
                    'kategori' => $this->input->post('kategori'),
                    'nama' => $this->input->post('nama'),
                    'berat' => $this->input->post('berat'),
                    'harga' => $this->input->post('harga'),
                    'stok' => $this->input->post('stok'),
                    'foto' => $this->upload->data('file_name'),
                    'deskripsi' => $this->input->post('deskripsi')
                );
    
                $insert = $this->admin_model->product_add_proccess($arr);
                if($insert){
                    $this->session->set_flashdata('message', 'Data berhasil disimpan');
                    redirect('admin/product_view');
                }else{
                    $this->session->set_flashdata('message', 'Gagal insert ke database');
                    redirect('admin/product_view');
                }
            }
        }
    }

    // edit product
    function product_edit($id){
        if(empty($this->session->userdata('adminUsername'))){
            $this->load->view('admin/login');
        }else{
            $data['productById'] = $this->admin_model->productById($id);
            $this->load->view('admin/product/edit', $data);
        }
    }

    // edit product proccess
    function product_edit_proccess($id){
        if(empty($this->session->userdata('adminUsername'))){
            $this->load->view('admin/login');
        }else{
            // if photo changed
            if(!empty($_FILES['foto']['name'])) {
                $config['upload_path']          = './assets/img/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                $config['max_width']            = 1024;
                $config['max_height']           = 1024;
        
                $this->load->library('upload', $config);
        
                if (!$this->upload->do_upload('foto')){
                    $this->session->set_flashdata('message', 'Error pada saat upload foto. Maximal 2MB!!!');
                    redirect('admin/product_view');
                }else{
                    // current data
                    $dataCurrentAdmin = $this->admin_model->currentAdmin();
                    
                    // unlink foto <hapus foto lama>
                    unlink($config['upload_path'].$dataCurrentAdmin->row()->foto); 
                                        
                    $arr = array(
                        'kategori' => $this->input->post('kategori'),
                        'nama' => $this->input->post('nama'),
                        'berat' => $this->input->post('berat'),
                        'harga' => $this->input->post('harga'),
                        'stok' => $this->input->post('stok'),
                        'foto' => $this->upload->data('file_name'),
                        'deskripsi' => $this->input->post('deskripsi')
                    );
        
                    $update = $this->admin_model->product_edit_proccess($arr, $id);
                    if($update){
                        $this->session->set_flashdata('message', 'Data berhasil diupdate');
                        redirect('admin/product_view');
                    }else{
                        $this->session->set_flashdata('message', 'Gagal insert ke database');
                        redirect('admin/product_view');
                    }
                }

            // if photo not changed
            }else{
                // post
                $arr = array(
                    'kategori' => $this->input->post('kategori'),
                    'nama' => $this->input->post('nama'),
                    'berat' => $this->input->post('berat'),
                    'harga' => $this->input->post('harga'),
                    'stok' => $this->input->post('stok'),
                    'deskripsi' => $this->input->post('deskripsi')
                );
    
                $update = $this->admin_model->product_edit_proccess($arr, $id);
                if($update){
                    $this->session->set_flashdata('message', 'Data berhasil diupdate');
                    redirect('admin/product_view');
                }else{
                    $this->session->set_flashdata('message', 'Gagal insert ke database');
                    redirect('admin/product_view');
                }
            }
        }
    }

    // purchase
    function purchase(){
        if(empty($this->session->userdata('adminUsername'))){
            $this->load->view('admin/login');
        }else{
            $data['getAllTransaction'] = $this->admin_model->getAllTransaction();
            $this->load->view('admin/purchase', $data);
        }
    }

    // cancel
    function cancel($id){
        $this->admin_model->cancel($id);
        $this->session->set_flashdata('message','Barang telah dibatalkan');
        redirect('admin/purchase');
    }

    // confirmation
    function confirmation($id){
        $this->admin_model->confirmation($id);
        $this->session->set_flashdata('message','Barang telah dikonfirmasi');
        redirect('admin/purchase');
    }
}
