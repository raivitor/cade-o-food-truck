<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Cliente extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Cliente_model');
        $this->load->model('Geoposicao_model');
        $this->output->set_content_type('application/json');
    }

    function cliente_get() {
        $id = $this->get('id');

        if($id) {            
            $gerente = $this->Cliente_model->getCliente($id);
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

    function clientes_get() {
        $data['clientes'] = $this->Cliente_model->getAll();

        if($data) {
            $this->response($data, 200);
        } else {
            $this->response(NULL, 404);
        }
    }

    function cliente_put() {

        $novo_cliente = [            
            'usuario_email' => $this->put('usuario_email'),
            'geoposicao_id' => $this->put('geoposicao_id')
        ];

         $geoposicao = [   
            'latitude'  => $this->put('latitude'),
            'longitude' => $this->put('longitude')
        ];

        if(! isset($novo_cliente) || ! empty($novo_cliente) ) {
            if($result = $this->Cliente_model->createCliente($novo_cliente)) {
                $this->Geoposicao_model->createGeoposicao($geoposicao);
                $this->response($result, 201); 
            }
        } else {
            $this->response("Cliente nao definido :(", 400);
        }
    }

    function cliente_post() {

        $cliente = [            
            'id'        => $this->post('id'),
            'latitude'  => $this->post('latitude'),
            'longitude' => $this->post('longitude')
        ];

        if(! isset($cliente) || ! empty($cliente) ) {
            if($result = $this->Cliente_model->updateCliente($cliente)) {
              $this->response($result, 201); 
            }
        } else {
            $this->response("Cliente nao definido :(", 400);
        }
    }


    function cliente_delete() {
        $id = (int) $this->get('id');

        if ($id <= 0) {
            $message = "ID inválido";
            $this->response($message, 400); 
        }
        
        $this->Cliente_model->deleteCliente($id);

        $message = [
            'id' => $id,
            'message' => 'Cliente deletado :)'
        ];

        $this->set_response($message, 204);
    }
}
