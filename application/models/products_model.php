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
        // if(!empty($this->session->userdata())){
            
        //     $arr = array();
        //     foreach($this->session->userdata() as $k => $v){
        //         $e = array();
        //         $e['id'] = $k;

        //         array_push($arr, $e);
        //     }

        //     echo "hidayat";
        //     print_r($arr);
        //     // $this->db->where($e);
        //     // return $this->db->get('produk');

        // }else{
        //     return null;
        // }
        // foreach(){

        // }
    }
}

?>