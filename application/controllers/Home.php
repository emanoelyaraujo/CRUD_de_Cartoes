<?php

defined("BASEPATH") or exit("Ação não permitida.");

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata("logged")){
            redirect("Login");
        }

        $this->load->model("Home_model");

    }

    public function index()
    {
        $data = [
            "lista" => $this->Home_model->listaCards()
        ];

        $this->load->view("home", $data);

    }

    public function chamaView($id = null)
    {
        $acao = $this->uri->segment(2);

        $data = [];

        switch ($acao)
        {
            case "inserir":
                $data["acao"] = "inserirCartao";
                $data["titulo"] = "Novo Cartão";
                $data["cor"] = "primary";
                $data["botao"] = "Adicionar";
                break;
            case "alterar":
                $data["acao"] = "atualizaCartao";
                $data["titulo"] = "Editar Cartão";
                $data["cor"] = "warning";
                $data["botao"] = "Editar";
                break;
            case "deletar":
                $data["acao"] = "deletaCartao";
                $data["titulo"] = "Exluir Cartão";
                $data["cor"] = "danger";
                $data["botao"] = "Excluir";
                break;
        }

        if (!is_null($id))
        {
            $cartao = $this->Home_model->getCard($id);

            $data["cartao"] = $cartao;
        }
        $this->load->view("form", $data);
    }

    public function inserirCartao()
    {
        $recebeCartao = $this->input->post();
        $recebeCartao["number"] = str_replace(" ", "", $recebeCartao["number"]);
        $recebeCartao["date"] = date("Ymd", strtotime($recebeCartao["date"]));
        $recebeCartao["idUser"] = $this->session->userdata("id");


        if (is_null($this->Home_model->getCardNumber($recebeCartao["number"])))
        {
            $idInserido = $this->Home_model->create($recebeCartao);

            if ($idInserido > 0)
            {
                $this->session->set_flashdata("sucesso", "Cartão cadastrado com sucesso!");
                redirect("Home");
            }
        }

        $this->session->set_flashdata("error", "Falha ao cadastrar cartão.");

        redirect("Home/inserir");
    }

    public function atualizaCartao($id)
    {
        $recebeCartao = $this->input->post();

        $recebeCartao["number"] = str_replace(" ", "", $recebeCartao["number"]);
        $recebeCartao["date"] = date("Ymd", strtotime($recebeCartao["date"]));
        $recebeCartao["idUser"] = $this->session->userdata("id");

        if (is_null($this->Home_model->getCardNumber($recebeCartao["number"])))
        {
            $linhasAfetadas = $this->Home_model->updateCards($recebeCartao, $id);

            if ($linhasAfetadas > 0)
            {
                $this->session->set_flashdata("sucesso", "Cartão atualizado com sucesso!");
                redirect("Home");
            }
        }

        $this->session->set_flashdata("error", "Falha ao atulizar cartão.");
        redirect("Home/alterar/$id");

    }

    public function deletaCartao($id)
    {
        $linhasAfetadas = $this->Home_model->deleteCards($id);

        if ($linhasAfetadas > 0)
        {
            $this->session->set_flashdata("sucesso", "Cartão excluído com sucesso!");
        }
        else
        {
            $this->session->set_flashdata("error", "Falha ao excluír cartão.");
            redirect("Home/deletar/$id");
        }

        redirect("Home");
    }
}
