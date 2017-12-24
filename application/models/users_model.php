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
}