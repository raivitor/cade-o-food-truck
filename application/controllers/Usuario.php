<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function index(){
        $this->output->enable_profiler(TRUE);
        $data = array('returned: '. $this->input->get('id'));
        //print_r($data);
        $params = json_decode(file_get_contents('php://input'), TRUE);

        $usuario = array(
            "nome" => $this->input->post_get("nome"),
            "email" => $this->input->post_get("email"),
            "senha" => $this->input->post_get("senha")
        );
        json_output(201, $usuario);
        //$this->response($data);
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