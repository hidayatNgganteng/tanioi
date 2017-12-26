<?php

class Users_model extends CI_Model {

    // login proccess
    function login_proccess($arr){
        $this->db->where($arr);
        return $this->db->get('pelanggan');
    }

    // signup proccess
    function signup_proccess($arr){
        $insert = $this->db->insert('pelanggan', $arr);
        if(!$insert){
            return false;
        }

        return true;
    }

    // current user
    function currentUser(){
        $arr = array(
            'username' => $this->session->userdata('username')
        );
        $this->db->where($arr);
        return $this->db->get('pelanggan');
    }

    // edit proccess
    function edit_proccess($arr, $id){
        $arrKey = array(
            'id' => $id
        );
        
        $this->db->where($arrKey);
        $update = $this->db->update('pelanggan', $arr);
        if(!$update){
            return false;
        }

        return true;
    }
}