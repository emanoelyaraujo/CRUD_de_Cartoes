<?php

defined("BASEPATH") or exit("Ação não permitida.");

class Navbar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
        $this->load->model("Navbar_model");
    }

    public function index()
    {

        $id = $this->session->userdata("id");

        $data = [
            "usuario" => $this->Navbar_model->getUser($id)
        ];

        $this->load->view("edit", $data);
    }

    public function atualizaUsuario()
    {

        $id = $this->session->userdata("id");

        $this->form_validation->set_rules("first_name", "nome", "trim|required");
        $this->form_validation->set_rules("last_name", "sobrenome", "trim|required");
        $this->form_validation->set_rules("email", "e-mail", "trim|required|valid_email");
        $this->form_validation->set_rules("password", "senha", "trim");
        $this->form_validation->set_rules("confirm_password", "confirmação da senha", "matches[password]");

        if ($this->form_validation->run())
        {
            $recebeUsuario = $this->input->post();

            $email = $this->session->userdata("login_email");

            if($recebeUsuario["email"] == $email){
                unset($recebeUsuario["email"]);
            } else {
                $usuario = $this->Navbar_model->getEmail($recebeUsuario["email"]);

                if($usuario){
                    $this->session->set_flashdata("email", "E-mail informado já existe.");
                    redirect("Navbar");
                }
            }

            unset($recebeUsuario["confirm_password"]);

            if (trim($recebeUsuario["password"]) != "")
            {
                $recebeUsuario["password"] = password_hash($recebeUsuario["password"], PASSWORD_DEFAULT);
            }
            else
            {
                unset($recebeUsuario["password"]);
            }

            $idInserido = $this->Navbar_model->updateUser($recebeUsuario, $id);

            if ($idInserido > 0)
            {
                $this->session->set_flashdata("sucesso", "Usuário editado com sucesso!");
                
                if(isset($recebeUsuario["email"])){
                    $this->session->unset_userdata("login_email");
                    $this->session->set_userdata("login_email", $recebeUsuario["email"]);
                }
                
                redirect("Home");
            }
            else
            {
                $this->session->set_flashdata("error", "Falha ao editar usuário.");
            }
        }
        else
        {
            $this->msgErro();
        }

        redirect("Navbar");
    }

    public function chamaView(){
        $this->load->view("delete");
    }

    public function deletaUsuario(){
        $id = $this->session->userdata("id");

        $linhasAfetadas = $this->Navbar_model->deleteUser($id);

        if($linhasAfetadas){
            redirect("Login/logout");
        } else {
            $this->session->set_flashdata("error", "Falha ao encerrar a sessão.");
            redirect("Home");
        }
    }

    public function msgErro()
    {
        $error_array = $this->form_validation->error_array();

        foreach ($error_array as $index => $e)
        {
            $this->session->set_flashdata($index, $e);
        }
    }
}
