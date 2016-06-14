<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Cardapio extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Cardapio_model');
        $this->output->set_content_type('application/json');
    }

    function cardapio_get() {
        $id = $this->get('id');

        if($id) {            
            $cardapio = $this->Cardapio_model->getItemDeCardapio($id);
            if($cardapio) {
                $this->response($cardapio, 200);
            } else {
                $this->response(NULL, 400);
            }
        }
        else {
            $this->response(NULL, 404);
        }
    }

    function cardapios_get() {
        $data['cardapios'] = $this->Cardapio_model->getAll();

        if($data) {
            $this->response($data, 200);
        } else {
            $this->response(NULL, 404);
        }
    }

    function cardapio_put() {

        $item = [            
            'nome'            => $this->put('nome'),
            'preco'           => $this->put('preco'),
            'ingredientes'    => $this->put('ingredientes'),
            'descricao'       => $this->put('descricao'),
            'sabor_id'        => $this->put('sabor_id'),
            'categoria_nome'  => $this->put('categoria_nome'),
            'food_truck_id'   => $this->put('food_truck_id')
        ];

        print_r($item);

        if(! isset($item) || ! empty($item) ) {

            if($result = $this->Cardapio_model->createItemDeCardapio($item)) {

                $this->response($result, 201); 
            }
        } else {
            $this->response("Cardapio nao definido", 400);
        }
        
    }

    function cardapio_post() {

        $cardapio = [            
            'id'             => $this->post('id'),
            'nome'           => $this->post('nome'),
            'preco'          => $this->post('preco'),
            'ingredientes'   => $this->post('ingredientes'),
            'descricao'      => $this->post('descricao'),
            'sabor_id'       => $this->post('sabor_id'),
            'categoria_nome' => $this->post('categoria_nome')
        ];

        print_r($cardapio);

        if(! isset($cardapio) || ! empty($cardapio) ) {
            if($result = $this->Cardapio_model->updateItemDeCardapio($cardapio)) {
              $this->response($result, 201); 
            }
        } else {
            $this->response("Cardapio nao definido", 400);
        }
        
    }


    function cardapio_delete() {
        $id = (int) $this->get('id');

        if ($id <= 0)
        {
            $message = "ID inválido";
            $this->response(NULL, 400); 
        }

        $this->Cardapio_model->deleteItemDeCardapio($id);

        $message = [
            'id' => $id,
            'message' => 'Cardapio deletado :)'
        ];

        $this->set_response($message, 204);
    }
}
