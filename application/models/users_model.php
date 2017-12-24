<?php

class Users_model extends CI_Model {

    // login proccess
    function login_proccess($arr){
        $this->db->where($arr);
        return $this->db->get('pelanggan');
    }
}