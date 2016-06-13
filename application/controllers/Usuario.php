<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function index(){
        
        $this->load->model("Usuario_model");
        $usuarios = $this->Usuario_model->get();

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

    	$this->load->model("Usuario_model");
    	$this->Usuario_model->store($usuario);
        $this->index();
    }

    public function Editar($id = null){
        if($id){
            $this->load->model("Usuario_model");
            $usuarios = $this->Usuario_model->getUser($id);   
        } else{

        }

    }
/*
    public function Autenticar(){
        $usuario = array(
            "email" => $this->input->post("email"),
            "senha" => md5($this->input->post("senha"))
        );

        $this->load->model("Usuario_model")->Autenticar()
    }*/
}