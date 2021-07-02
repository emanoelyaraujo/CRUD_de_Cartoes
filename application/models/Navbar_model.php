<?php 

defined("BASEPATH") OR exit("Ação não permitida.");

class Navbar_model extends CI_Model{

    public $tabela = "users";

    public function __construct()
    {
        parent::__construct();
    }

    public function getUser($id){
        $this->db->select()->from($this->tabela)->where("id", $id);

        return $this->db->get()->row();
    }

    public function getEmail($email){
        $this->db->select()->from($this->tabela)->where("email", $email);

        return $this->db->get()->row();
    }

    public function updateUser($user, $id){

        $this->db->where("id", $id)->update($this->tabela, $user);

        return $this->db->affected_rows();
    }

    public function deleteUser($id)
    {
        $this->db->where("id", $id)->delete($this->tabela);

        return $this->db->affected_rows();
    }
}