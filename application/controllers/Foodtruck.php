<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Foodtruck extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Foodtruck_model');
        $this->output->set_content_type('application/json');    
    }

    function foodtruck_get() {
        $id = $this->get('id');

        if($id) {            
            $foodtruck = $this->Foodtruck_model->gettruck($id);
            if($foodtruck) {
                $this->response($foodtruck, 200);
            } else {
                $this->response(NULL, 400);
            }
        }
        else {
            $this->response(NULL, 404);
        }
    }

    // pegar localização do usuario e comparar com o truck
    function foodtrucks_get() {
        $data['foodtrucks'] = $this->Foodtruck_model->getAll();

        if($data) {
            $this->response($data, 200);
        } else {
            $this->response(NULL, 404);
        }
    }

    //
    function foodtruck_put() {

        $new_truck = [            
            'nome'          => $this->put('nome'),
            'descricao'     => $this->put('descricao'),
            'telefone'      => $this->put('telefone'),
            'logo'          => $this->put('logo'),
            'fotos'         => $this->put('fotos'),
        ];

        if(!isset($new_truck) || !empty($new_truck)) {
            if($result = $this->Foodtruck_model->createTruck($new_truck)) {
                $this->response($result, 201); 
            }
        } else {
            $this->response("foodtruck nao definido", 400);
        }
        
    }

    function foodtruck_post() {
        $foodtruck = [            
            'nome'          => $this->put('nome'),
            'descricao'     => $this->put('descricao'),
            'telefone'      => $this->put('telefone'),
            'logo'          => $this->put('logo'),
            'fotos'         => $this->put('fotos'),
        ];

        if(!isset($foodtruck) || !empty($foodtruck)) {
            if($result = $this->Foodtruck_model->updateTruck($foodtruck)) {
              $this->response($result, 201); 
            }
        } else {
            $this->response("foodtruck nao definido", 400);
        }
    }


    function foodtruck_delete() {
        $id = (int) $this->get('id');

        if ($id <= 0){
            $message = "ID inválido";
            $this->response(NULL, 400); 
        }

        $this->Foodtruck_model->deleteTruck($id);

        $this->response('foodtruck deletado', 204);
    }
}