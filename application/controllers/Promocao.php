<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Promocao extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Promocao_model');
        $this->output->set_content_type('application/json');
    }

    function promocao_get() {
        $id = $this->get('id');

        if($id) {            
            $promocao = $this->Promocao_model->getPromocao($id);
            if($promocao) {
                $this->response($promocao, 200);
            } else {
                $this->response(NULL, 400);
            }
        }
        else {
            $this->response(NULL, 404);
        }
    }

    function promocoes_get() {
        $data['promocoes'] = $this->Promocao_model->getAll();

        if($data) {
            $this->response($data, 200);
        } else {
            $this->response(NULL, 404);
        }
    }

    function promocao_put() {

        $nova_promocao = [            
            'desconto'            => $this->put('desconto'),
            'valor'               => $this->put('valor'),
            'data_de_inicio'      => $this->put('data_de_inicio'),
            'data_de_termino'     => $this->put('data_de_termino'), 
            'food_truck_id'       => $this->put('food_truck_id'),
            'item_de_cardapio_id' => $this->put('item_de_cardapio_id')

        ];

        print_r($nova_promocao);

        if(! isset($nova_promocao) || ! empty($nova_promocao) ) {
            if($result = $this->Promocao_model->createPromocao($nova_promocao)) {
                $this->response($result, 201); 
            }
        } else {
            $this->response("Promocao nao definida", 400);
        }
        
    }

    function promocao_post() {

        $promocao = [            
            'id'                  => $this->post('id'),
            'desconto'            => $this->post('desconto'),
            'valor'               => $this->post('valor'),
            'data_de_inicio'      => $this->post('data_de_inicio'),
            'data_de_termino'     => $this->post('data_de_termino'), 
            'item_de_cardapio_id' => $this->post('item_de_cardapio_id')
        ];

        print_r($promocao);

        if(! isset($promocao) || ! empty($promocao) ) {
            if($result = $this->Promocao_model->updatePromocao($promocao)) {
              $this->response($result, 201); 
            }
        } else {
            $this->response("Promocao nao definida", 400);
        }
    }

    function promocao_delete() {
        $id = (int) $this->get('id');

        if ($id <= 0)
        {
            $message = "ID inválido";
            $this->response(NULL, 400); 
        }

        $this->Promocao_model->deletePromocao($id);

        $message = [
            'id' => $id,
            'message' => 'Promocao deletado :)'
        ];

        $this->set_response($message, 204);
    }
}
