<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Geoposicao extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Geoposicao_model');
        $this->output->set_content_type('application/json');
    }

    function geoposicao_get() {
        $id = $this->get('id');

        if($id) {            
            $geoposicao = $this->Geoposicao_model->getGeoposicao($id);
            if($geoposicao) {
                $this->response($geoposicao, 200);
            } else {
                $this->response(NULL, 400);
            }
        }
        else {
            $this->response(NULL, 404);
        }
    }

    function geoposicoes_get() {
        $data['geoposicoes'] = $this->Geoposicao_model->getAll();

        if($data) {
            $this->response($data, 200);
        } else {
            $this->response(NULL, 404);
        }
    }

    function geoposicao_put() {

        $geoposicao = [   
            'latitude'  => $this->put('latitude'),
            'longitude' => $this->put('longitude')
        ];

        if(! isset($geoposicao) || ! empty($geoposicao) ) {
            if($result = $this->Geoposicao_model->createGeoposicao($geoposicao)) {
              $this->response($result, 201); 
            }
        } else {
            $this->response("Geoposicao nao definida :(", 400);
        }
        
    }


    function geoposicao_post() {

        $geoposicao = [   
            'id'        => $this->post('id'),
            'latitude'  => $this->post('latitude'),
            'longitude' => $this->post('longitude')
        ];

        if(! isset($geoposicao) || ! empty($geoposicao) ) {
            if($result = $this->Geoposicao_model->updateGeoposicao($geoposicao)) {
              $this->response($result, 201); 
            }
        } else {
            $this->response("Geoposicao nao definido :(", 400);
        }
        
    }

    function geoposicao_delete() {
        $id = (int) $this->get('id');

        if ($id <= 0) {
            $message = "ID inválido";
            $this->response($message, 400); 
        }
        
        $this->Geoposicao_model->deleteGeoposicao($id);

        $message = [
            'id' => $id,
            'message' => 'Geoposicao deletada :)'
        ];

        $this->set_response($message, 204);
    }
}
