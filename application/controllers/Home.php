<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index(){
        $this->load->helper(array("url"));
        $this->load->view("home/index");
    }

    public function cadastro(){
        $this->load->helper(array("url", "form"));
        $this->load->view("home/cadastro");
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