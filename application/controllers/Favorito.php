<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Favorito extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Favorito_model');
        $this->output->set_content_type('application/json');
    }

    function favorito_get() {
        $id = $this->get('id');

        if($id) {            
            $favorito = $this->Favorito_model->getFavorito($id);
            if($gerente) {
                $this->response($favorito, 200);
            } else {
                $this->response(NULL, 400);
            }
        }
        else {
            $this->response(NULL, 404);
        }
    }

    function favoritos_get() {
        $data['favoritos'] = $this->Favorito_model->getAll();

        if($data) {
            $this->response($data, 200);
        } else {
            $this->response(NULL, 404);
        }
    }

    function favorito_put() {

        $novo_favorito = [            
            'cliente_id'    => $this->put('cliente_id'),
            'food_truck_id' => $this->put('food_truck_id')
        ];

        if(! isset($novo_favorito) || ! empty($novo_favorito) ) {
            if($result = $this->Favorito_model->createFavorito($novo_favorito)) {
                $this->response($result, 201); 
            }
        } else {
            $this->response("Favorito nao definido :(", 400);
        }
    }

    function favorito_delete() {
        $id = (int) $this->get('id');

        if ($id <= 0) {
            $message = "ID inválido";
            $this->response($message, 400); 
        }
        
        $this->Favorito_model->deleteFavorito($id);

        $message = [
            'id' => $id,
            'message' => 'Favorito deletado :)'
        ];

        $this->set_response($message, 204);
    }
}
