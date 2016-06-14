<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Sabor extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Sabor_model');
        $this->output->set_content_type('application/json');
    }

    function sabor_get() {
        $id = $this->get('id');

        if($id) {            
            $sabor = $this->Sabor_model->getSabor($id);
            if($sabor) {
                $this->response($sabor, 200);
            } else {
                $this->response(NULL, 400);
            }
        }
        else {
            $this->response(NULL, 404);
        }
    }

    function sabores_get() {
        $data['sabores'] = $this->Sabor_model->getAll();

        if($data) {
            $this->response($data, 200);
        } else {
            $this->response(NULL, 404);
        }
    }

    function sabor_put() {

        $tipo = $this->put('tipo');            

        if(! isset($tipo) || ! empty($tipo) ) {
            if($result = $this->Sabor_model->createSabor($tipo)) {
              $this->response($result, 201); 
            }
        } else {
            $this->response("Sabor nao definido :(", 400);
        }
        
    }


    function sabor_post() {

        $sabor = [
            'id'   => $this->post('id'),
            'tipo' => $this->post('tipo')
        ];

        if(! isset($sabor) || ! empty($sabor) ) {
            if($result = $this->Sabor_model->updateSabor($sabor)) {
              $this->response($result, 201); 
            }
        } else {
            $this->response("Sabor nao definido :(", 400);
        }
        
    }

    function sabor_delete() {
        $id = (int) $this->get('id');

        if ($id <= 0) {
            $message = "ID inválido";
            $this->response($message, 400); 
        }
        
        $this->Sabor_model->deleteSabor($id);

        $message = [
            'id' => $id,
            'message' => 'Sabor deletado :)'
        ];

        $this->set_response($message, 204);
    }
}
