<?php

    defined("BASEPATH") OR exit("Ação não permitida.");

    class Login_model extends CI_Model{

        public function __construct()
        {
            parent::__construct();
        }

        public function get_user($post){
            $this->db->select()->from("users")->where("email", $post["email"]);

            return $this->db->get()->row();
        }
    }