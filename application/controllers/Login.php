<?php

defined("BASEPATH") or exit("Ação não permitida.");

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
        $this->load->model("Login_model");
    }

    public function index()
    {
        $this->load->view("login");
    }

    public function validaLogin()
    {
        $this->form_validation->set_rules("email", "E-mail", "trim|required|valid_email");
        $this->form_validation->set_rules("password", "Senha", "trim|required");

        if ($this->form_validation->run())
        {

            $post = $this->input->post();

            $usuario = $this->Login_model->get_user($post);

            if ($usuario)
            {

                if (password_verify($post["password"], $usuario->password))
                {

                    // cria sessões para armazenar o usuario logado
                    $this->session->set_userdata("logged", true);
                    $this->session->set_userdata("id", $usuario->id);
                    $this->session->set_userdata("login_email", $usuario->email);

                    redirect("home");
                }
                else
                {
                    $this->session->set_flashdata("error", "Senha incorreta.");
                }
            }
            else
            {
                $this->session->set_flashdata("error", "<div class='text-danger'>Usuário informado não está cadastrado.</div>");
                redirect("Register");
                
            }
        }
        else
        {
            $this->session->set_flashdata('error', validation_errors('<p class="mb-0">', '</p>'));
        }

        redirect("login");
    }

    public function logout()
	{
		// Verifica se o usuário está logado, se não estiver redireciona ele para a tela de login
		if (!$this->session->userdata('logged'))
		{
			redirect(base_url('login'));
		}

		// Remove as sessões do usuário
		$this->session->unset_userdata('logged');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('login_email');

		// Reireciona para o método index
		redirect('login');
	}
    
}
