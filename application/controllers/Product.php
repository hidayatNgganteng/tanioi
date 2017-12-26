<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('products_model');
        $this->load->model('users_model');
	}

	public function index($category = 'all')
	{
        $category = urldecode($category);
        $data['allProducts'] = $this->products_model->getAllProduct();
        $data['productByCategory'] = $this->products_model->productByCategory($category);
        if($category == 'all'){
            $data['category'] = 'Semua produk';
        }else{
            $data['category'] = $category;
        }
		$this->load->view('product/Product', $data);
    }
    
    // product details
    function details($id = 0){
        $data['productById'] = $this->products_model->productById($id)->row();
        $this->load->view('product/product_details', $data);
    }

    // product search
    function search(){
        $keyword = $this->input->post('keyword');
        $data['allProducts'] = $this->products_model->getAllProduct();
        $data['productByKeyword'] = $this->products_model->productByKeyword($keyword);
        $data['keyword'] = $keyword;
        $this->load->view('product/product_search', $data);
    }

    // product buy
    function buy($id){
        if(!empty($this->session->userdata('k'.$id))){
            $arr = array(
                'k'.$id => $this->session->userdata('k'.$id) + 1
            );
            $this->session->set_userdata($arr);
        }else{
            $arr = array(
                'k'.$id => 1
            );
            $this->session->set_userdata($arr);
        }

        $data['allProducts'] = $this->products_model->getAllProduct();
        $data['product_cart'] = $this->products_model->product_cart();
        $data['currentUser'] = $this->users_model->currentUser();

        if(!empty($this->session->userdata('username'))){
            $this->session->set_flashdata('message', 'Data telah ditambahkan');
            $this->load->view('product/product_cart', $data);
        }else{
            $this->session->set_flashdata('message', 'Produk telah ditambahkan ke keranjang, Silakan anda login terlebih dahulu');
            redirect('user');
        }
    }

    // product cart
    function cart(){
        $data['allProducts'] = $this->products_model->getAllProduct();
        $data['product_cart'] = $this->products_model->product_cart();
        $data['currentUser'] = $this->users_model->currentUser();
        $this->session->set_flashdata('message');
        $this->load->view('product/product_cart', $data);
    }

    // delete cart
    function cart_delete($id){
        $this->session->unset_userdata('k'.$id);
        $data['allProducts'] = $this->products_model->getAllProduct();
        $data['product_cart'] = $this->products_model->product_cart();
        $data['currentUser'] = $this->users_model->currentUser();
        $this->session->set_flashdata('message', 'Data telah dihapus');
        $this->load->view('product/product_cart', $data);
    }

    // checkout
    function checkout(){

        $flag = 1;
        $currentUser = $this->users_model->currentUser();
        $transactionByBuyer = $this->products_model->transactionByBuyer($currentUser->row()->id);

        // jk sebelumnya ada transaksi yang belum selesai
        if($transactionByBuyer->num_rows() > 0){
            $this->session->set_flashdata('message','Produk telah ditambahkan dengan keranjang sebelumnya. Untuk membatalkan silakan menuju menu Transaksi Anda');
            // $this->products_model->transactionDeleteActive($currentUser->row()->id);
        }
        
        while(!empty($this->input->post('id_produk'.$flag.''))){

            if($this->input->post('stok_sekarang'.$flag.'') > 0){
                $arr = array(
                    'id_pembeli' => $currentUser->row()->id,
                    'nama_pembeli' => $currentUser->row()->nama,
                    'telepon' => $currentUser->row()->telepon,
                    'alamat' => $currentUser->row()->alamat,
                    'tgl_beli' => date('d-m-Y'),
                    'metode' => $this->input->post('metode'),
                    'email' => $currentUser->row()->email,
                    'id_produk' => $this->input->post('id_produk'.$flag.''),
                    'nama_produk' => $this->input->post('nama_produk'.$flag.''),
                    'harga' => $this->input->post('harga'.$flag.''),
                    'jumlah' => $this->input->post('jumlah'.$flag.''),
                    'total' => ($this->input->post('harga'.$flag.'') * $this->input->post('jumlah'.$flag.'')),
                    'status' => 'Menunggu Konfirmasi'
                );
                
                $this->products_model->transaction_proccess($arr);
                // $this->products_model->reduce_stock(($this->input->post('stok_sekarang'.$flag.'') - $this->input->post('jumlah'.$flag.'')),$this->input->post('id_produk'.$flag.''));
            }
            $flag++;
        }


        $data['allProducts'] = $this->products_model->getAllProduct();
        $data['product_cart'] = $this->products_model->product_cart();
        $data['currentUser'] = $this->users_model->currentUser();
        $data['payment'] = $this->products_model->payment($this->users_model->currentUser()->row()->id);
        $this->load->view('product/product_payment', $data);
    }

    // finish
    function finish(){
        
        $data['allProducts'] = $this->products_model->getAllProduct();
        $data['product_cart'] = $this->products_model->product_cart();
        $data['currentUser'] = $this->users_model->currentUser();
        $data['payment'] = $this->products_model->payment($this->users_model->currentUser()->row()->id);
        
        // clear session cart
        foreach($data['payment']->result() as $k => $v){
            $this->session->unset_userdata('k'.$v->id_produk);
        }

        // clear session flash
        $this->session->set_flashdata('message');

        $this->load->view('product/product_finish', $data);
    }

    // transaction
    function transaction(){
        $data['allProducts'] = $this->products_model->getAllProduct();
        $data['product_cart'] = $this->products_model->product_cart();
        $data['currentUser'] = $this->users_model->currentUser();
        $data['getAllTransaction'] = $this->products_model->getAllTransaction();
        $this->load->view('product/product_transaction', $data);
    }
}