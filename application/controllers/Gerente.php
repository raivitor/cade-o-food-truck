<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Gerente extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Gerente_model');
        $this->output->set_content_type('application/json');
    }

    function gerente_get() {
        $id = $this->get('id');

        if($id) {            
            $gerente = $this->Gerente_model->getGerente($id);
            if($gerente) {
                $this->response($gerente, 200);
            } else {
                $this->response(NULL, 400);
            }
        }
        else {
            $this->response(NULL, 404);
        }
    }

    function gerentes_get() {
        $data['gerentes'] = $this->Gerente_model->getAll();

        if($data) {
            $this->response($data, 200);
        } else {
            $this->response(NULL, 404);
        }
    }

    function gerente_put() {

        $usuario_email = $this->put('usuario_email');            

        if(! isset($usuario_email) || ! empty($usuario_email) ) {
            if($result = $this->Gerente_model->createGerente($usuario_email)) {
              $this->response($result, 201); 
            }
        } else {
            $this->response("Gerente nao definido :(", 400);
        }
        
    }


    function gerente_delete() {
        $id = (int) $this->get('id');

        if ($id <= 0) {
            $message = "ID inválido";
            $this->response($message, 400); 
        }
        
        $this->Gerente_model->deleteGerenteById($id);

        $message = [
            'id' => $id,
            'message' => 'Usuario deletado :)'
        ];

        $this->set_response($message, 204);
    }
}
