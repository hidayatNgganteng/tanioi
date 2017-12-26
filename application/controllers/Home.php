<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('products_model');
		$this->load->model('users_model');
	}

	public function index()
	{
		$data['allProducts'] = $this->products_model->getAllProduct();
		$data['currentUser'] = $this->users_model->currentUser();
		$this->load->view('home', $data);
	}
}
