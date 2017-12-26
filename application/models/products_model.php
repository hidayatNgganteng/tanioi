<?php

class Products_model extends CI_Model {

    // get all product
    function getAllProduct(){
        return $this->db->get('produk');
    }

    // Product by category
    function productByCategory($category){
        if($category == 'all'){
            return $this->db->get('produk');
        }else{
            $key = array(
                'kategori' => $category
            );
            $this->db->where($key);
            return $this->db->get('produk');
        }
    }

    // product by id
    function productById($id){
        $key = array(
            'id' => $id
        );

        $this->db->where($key);
        return $this->db->get('produk');
    }

    // product by keyword
    function productByKeyword($keyword){
        $key = array(
            'nama' => $keyword
        );

        $this->db->like($key);
        return $this->db->get('produk');
    }

    // product cart
    function product_cart(){
        $arr = array();
        $where = "";
        $no = 1;
        foreach($this->session->userdata() as $k => $v){
            if($k[0] == 'k'){
                if($no == 1){
                    $where .= "id = ".ltrim($k, 'k')."";
                }else{
                    $where .= " OR id = ".ltrim($k, 'k')."";
                }
                $no++;
            }
        }

        if($where == !null){
            $this->db->where($where);
            return $this->db->get('produk');
        }else{
            return null;
        }

    }

    // transaction proccess
    function transaction_proccess($arr){
        return $this->db->insert('transaksi', $arr);
    }

    // reduce stock
    function reduce_stock($count, $id){
        $arr = array(
            'id' => $id
        );

        $arrUpdate = array(
            'stok' => $count
        );
        $this->db->where($arr);
        return $this->db->update('produk', $arrUpdate);
    }

    // payment
    function payment($id_user){
        $arr = array(
            'id_pembeli' => $id_user,
            'status' => 'Menunggu Konfirmasi'
        );
        $this->db->where($arr);
        return $this->db->get('transaksi');
    }

    // transaction by buyer
    function transactionByBuyer($id_pembeli){
        $arr = array(
            'id_pembeli' => $id_pembeli,
            'status' => 'Menunggu Konfirmasi'
        );
        $this->db->where($arr);
        return $this->db->get('transaksi');
    }

    // transaction Delete Active
    function transactionDeleteActive($id_pembeli){
        $arr = array(
            'id_pembeli' => $id_pembeli,
            'status' => 'Menunggu Konfirmasi'
        );
        $this->db->where($arr);
        return $this->db->delete('transaksi');
    }

    // get all transaction
    function getAllTransaction(){
        return $this->db->get('transaksi');
    }
}

?>