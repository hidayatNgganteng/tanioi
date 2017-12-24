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
}

?>