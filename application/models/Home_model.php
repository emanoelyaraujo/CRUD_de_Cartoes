<?php

defined("BASEPATH") or exit("Ação não permitida.");

class Home_model extends CI_Model
{

    private $tabela = "cards";

    public function __construct()
    {
        parent::__construct();
    }

    public function getCard($id){
        $this->db->select()->from($this->tabela)->where("id", $id);

        return $this->db->get()->row();
    }

    public function create($usuario)
    {

        $this->db->insert($this->tabela, $usuario);

        return $this->db->insert_id();
    }

    public function listaCards()
    {
        $this->db->select("c.*,u.first_name,u.last_name")
            ->from($this->tabela . " as c")
            ->join("users as u", "c.idUser = u.id", "inner")
            ->where("idUser", $this->session->userdata("id"));

        return $this->db->get()->result();
    }

    public function updateCards($cartao, $id)
    {
        $this->db->where("id", $id)->update($this->tabela, $cartao);

        return $this->db->affected_rows();
    }

    public function deleteCards($id){
        $this->db->where("id", $id)->delete($this->tabela);

        return $this->db->affected_rows();
    }
}
