<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Dono extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Dono_model');
        $this->output->set_content_type('application/json');
    }

    function dono_get() {
        $id = $this->get('id');

        if($id) {            
            $dono = $this->Dono_model->getDono($id);
            if($dono) {
                $this->response($dono, 200);
            } else {
                $this->response(NULL, 400);
            }
        }
        else {
            $this->response(NULL, 404);
        }
    }

    function donos_get() {
        $data['donos'] = $this->Dono_model->getAll();

        if($data) {
            $this->response($data, 200);
        } else {
            $this->response(NULL, 404);
        }
    }

    function dono_put() {

        $usuario_email = $this->put('usuario_email');            

        if(! isset($usuario_email) || ! empty($usuario_email) ) {
            if($result = $this->Dono_model->createDono($usuario_email)) {
              $this->response($result, 201); 
            }
        } else {
            $this->response("Dono nao definido :(", 400);
        }
        
    }


    function dono_delete() {
        $id = (int) $this->get('id');

        if ($id <= 0) {
            $message = "ID inválido";
            $this->response($message, 400); 
        }
        
        $this->Dono_model->deleteDonoById($id);

        $message = [
            'id' => $id,
            'message' => 'Dono deletado :)'
        ];

        $this->set_response($message, 204);
    }
}
