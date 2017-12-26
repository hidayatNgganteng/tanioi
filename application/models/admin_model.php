<?php

class Admin_model extends CI_Model {

    // login proccess
    function login_proccess($arr){
        $this->db->where($arr);
        return $this->db->get('admin');
    }

    // getAllProduct
    function getAllProduct(){
        $this->db->order_by('kategori','asc');
        return $this->db->get('produk');
    }

    // productById
    function productById($id){
        $arr = array(
            'id' => $id
        );
        $this->db->where($arr);
        return $this->db->get('produk');
    }

    // productDeleteById
    function productDeleteById($id){
        $arr = array(
            'id' => $id
        );
        $this->db->where($arr);
        return $this->db->delete('produk');
    }

    // product_add_proccess
    function product_add_proccess($arr){
        return $this->db->insert('produk', $arr);
    }

    // product_edit_proccess
    function product_edit_proccess($arr, $id){
        $arrWhere = array(
            'id' => $id
        );
        $this->db->where($arrWhere);
        return $this->db->update('produk', $arr);
    }

    // current admin
    function currentAdmin(){
        $arr = array(
            'username' => $this->session->userdata('adminUsername')
        );
        $this->db->where($arr);
        return $this->db->get('admin');
    }

    // get all transaction
    function getAllTransaction(){
        return $this->db->get('transaksi');
    }

    // cancel
    function cancel($id){
        $arr = array(
            'id_transaksi' => $id
        );
        $arrUpdate = array(
            'status' => 'Dibatalkan Oleh Admin',
            'tgl_sampai' => '-'
        );
        $this->db->where($arr);
        return $this->db->update('transaksi', $arrUpdate);
    }

    // confirmation
    function confirmation($id){
        $arr = array(
            'id_transaksi' => $id
        );
        $arrUpdate = array(
            'status' => 'Barang Sedang Dikirim',
            'tgl_sampai' => date('d-m-Y')
        );
        $this->db->where($arr);
        return $this->db->update('transaksi', $arrUpdate);
    }
}