<?php

defined("BASEPATH") or exit("Ação não permitida.");

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library("form_validation");
        $this->load->model("Register_model");
    }

    public function index()
    {
        $this->load->view("register");
    }

    public function insereUsuario()
    {

        $this->form_validation->set_rules("first_name", "nome", "trim|required|max_length[50]");
        $this->form_validation->set_rules("last_name", "sobrenome", "trim|required|max_length[50]");
        $this->form_validation->set_rules("email", "e-mail", "trim|required|is_unique[users.email]|valid_email|max_length[255]");
        $this->form_validation->set_rules("password", "senha", "trim|required|min_length[6]|max_length[15]");

        if ($this->form_validation->run())
        {

            $recebeUsuario = $this->input->post();

            $id_inserido = $this->Register_model->create($recebeUsuario);

            if ($id_inserido > 0)
            {
                $this->session->set_flashdata("sucesso", "Usuário cadastrado com sucesso!");

                redirect("Login");
            }
            else
            {
                $this->session->set_flashdata("error", "Falha ao cadastrar usuário.");
            }
        }
        else
        {
            $this->msgErro();
        }

        redirect("Register");
    }

    public function msgErro()
    {
        $errorArray = $this->form_validation->error_array();

        foreach ($errorArray as $index => $e)
        {
            $this->session->set_flashdata($index, "<div class='text-danger'>$e</div>");
        }
    }
}
