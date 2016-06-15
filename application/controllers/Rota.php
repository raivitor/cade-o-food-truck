<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Rota extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Rota_model');
        $this->output->set_content_type('application/json');
    }

    function rota_get() {
        $id = $this->get('id');

        if($id) {            
            $rota = $this->Rota_model->getrota($id);
            if($rota) {
                $this->response($rota, 200);
            } else {
                $this->response(NULL, 400);
            }
        }
        else {
            $this->response(NULL, 404);
        }
    }

    function rotas_get() {
        $data['rotas'] = $this->Rota_model->getAll();

        if($data) {
            $this->response($data, 200);
        } else {
            $this->response(NULL, 404);
        }
    }

    function rota_put() {

        $nova_rota = [            
            'rua'             => $this->put('rua'),
            'cep'             => $this->put('cep'),
            'cidade'          => $this->put('cidade'),
            'estado'          => $this->put('estado'),
            'dia_da_semana'   => $this->put('dia_da_semana'), 
            'hora_de_inicio'  => $this->put('hora_de_inicio'),
            'hora_de_termino' => $this->put('hora_de_termino'), 
            'food_truck_id'   => $this->put('food_truck_id'),
            'geoposicao_id'   => $this->put('geoposicao_id')
        ];

        print_r($nova_rota);

        if(! isset($nova_rota) || ! empty($nova_rota) ) {
            if($result = $this->Rota_model->createRota($nova_rota)) {
                $this->response($result, 201); 
            }
        } else {
            $this->response("Rota nao definida", 400);
        }
        
    }

    function rota_post() {

        $rota = [            
            'id'              => $this->post('id'),
            'rua'             => $this->post('rua'),
            'cep'             => $this->post('cep'),
            'cidade'          => $this->post('cidade'),
            'estado'          => $this->post('estado'),
            'dia_da_semana'   => $this->post('dia_da_semana'), 
            'hora_de_inicio'  => $this->post('hora_de_inicio'),
            'hora_de_termino' => $this->post('hora_de_termino'), 
            'food_truck_id'   => $this->post('food_truck_id'),
            'geoposicao_id'   => $this->post('geoposicao_id')
        ];

        print_r($rota);

        if(! isset($rota) || ! empty($rota) ) {
            if($result = $this->Rota_model->updateRota($rota)) {
              $this->response($result, 201); 
            }
        } else {
            $this->response("Rota nao definida", 400);
        }
    }


    function rota_delete() {
        $id = (int) $this->get('id');

        if ($id <= 0)
        {
            $message = "ID inválido";
            $this->response(NULL, 400); 
        }

        $this->Rota_model->deleteRota($id);

        $message = [
            'id' => $id,
            'message' => 'Rota deletado :)'
        ];

        $this->set_response($message, 204);
    }
}
