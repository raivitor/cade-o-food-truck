<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function index(){
        
        $this->load->model("Usuario_model");
        $usuarios = $this->Usuario_model->getAllUsers();

        $dados = array("usuarios" => $usuarios);
        $this->load->helper(array("url", "form"));
        $this->load->view("usuario/index", $dados);
    }

    public function Cadastrar() {
    	$usuario = array(
	        "nome" => $this->input->post("nome"),
	        "email" => $this->input->post("email"),
	        "senha" => md5($this->input->post("senha"))
	    );

    	$this->load->model("usuario_model");
    	$this->usuario_model->Cadastrar($usuario);
        $this->index();
    	//$this->load->view("usuario/index");
    }
}