<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('products_model');
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
        $this->session->set_flashdata('message', 'Data telah ditambahkan');
        $this->load->view('product/product_cart', $data);
    }

    // product cart
    function cart(){
        $data['allProducts'] = $this->products_model->getAllProduct();
        $data['product_cart'] = $this->products_model->product_cart();
        $this->session->set_flashdata('message');
        $this->load->view('product/product_cart', $data);
    }

    // delete cart
    function cart_delete($id){
        $this->session->unset_userdata('k'.$id);
        $data['allProducts'] = $this->products_model->getAllProduct();
        $data['product_cart'] = $this->products_model->product_cart();
        $this->session->set_flashdata('message', 'Data telah dihapus');
        $this->load->view('product/product_cart', $data);
    }

    // checkout
    function checkout(){
        $data['allProducts'] = $this->products_model->getAllProduct();
        $this->load->view('product/product_checkout', $data);
    }
}
