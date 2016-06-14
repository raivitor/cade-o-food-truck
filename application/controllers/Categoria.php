<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Categoria extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Categoria_model');
        $this->output->set_content_type('application/json');
    }

    function categoria_get() {
        $id = $this->get('id');

        if($id) {            
            $categoria = $this->Categoria_model->getCategoria($id);
            if($categoria) {
                $this->response($categoria, 200);
            } else {
                $this->response(NULL, 400);
            }
        }
        else {
            $this->response(NULL, 404);
        }
    }

    function categorias_get() {
        $data['categorias'] = $this->Categoria_model->getAll();

        if($data) {
            $this->response($data, 200);
        } else {
            $this->response(NULL, 404);
        }
    }

    function categoria_put() {

        $nome = $this->put('nome');

        if(! isset($nome) || ! empty($nome) ) {
            if($result = $this->Categoria_model->createCategoria($nome)) {
              $this->response($result, 201); 
            }
        } else {
            $this->response("Categoria nao definido :(", 400);
        }
        
    }


    function categoria_post() {

        $categoria = [
            'id'   => $this->post('id'),
            'nome' => $this->post('nome')
        ];

        if(! isset($categoria) || ! empty($categoria) ) {
            if($result = $this->Categoria_model->updateCategoria($categoria)) {
              $this->response($result, 201); 
            }
        } else {
            $this->response("Categoria nao definido :(", 400);
        }
        
    }

    function categoria_delete() {
        $id = (int) $this->get('id');

        if ($id <= 0) {
            $message = "ID inválido";
            $this->response($message, 400); 
        }
        
        $this->Categoria_model->deleteCategoria($id);

        $message = [
            'id' => $id,
            'message' => 'Categoria deletado :)'
        ];

        $this->set_response($message, 204);
    }
}
