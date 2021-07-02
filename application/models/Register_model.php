<?php

defined("BASEPATH") OR exit("Ação não permitida.");


class Register_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        
    }

    public function create($usuario){
        $usuario["password"] = password_hash(trim($usuario["password"]), PASSWORD_DEFAULT);

        $this->db->insert("users", $usuario);

        return $this->db->insert_id();
    }
}