<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Empresa extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Empresa_model');
        $this->output->set_content_type('application/json');
    }

    function emp_get() {
        $id = $this->get('id');

        if($id) {            
            $empresa = $this->Empresa_model->getEmp($id);
            if($empresa) {
                $this->response($empresa, 200);
            } else {
                $this->response(NULL, 400);
            }
        }
        else {
            $this->response(NULL, 404);
        }
    }

    function empresas_get() {
        $data['empresas'] = $this->Empresa_model->getAll();

        if($data) {
            $this->response($data, 200);
        } else {
            $this->response(NULL, 404);
        }
    }

    function empresa_put() {

        $new_emp = [            
            'nome'     => $this->put('nome'),
            'cnpj'     => $this->put('cnpj'),
            'idDono'   => $this->put('idDono')
        ];

        print_r($new_empresa);

        if(!isset($new_emp) || !empty($new_emp)) {
            if($result = $this->Empresa_model->createEmp($new_emp)) {
                $this->response($result, 201); 
            }
        } else {
            $this->response("Empresa nao definido", 400);
        }
        
    }

    function empresa_post() {
        $empresa = [            
            'id'       => $this->post('id'),
            'nome'     => $this->post('nome'),
            'cnpj'     => $this->post('cnpj')
        ];

        print_r($empresa);

        if(! isset($empresa) || ! empty($empresa) ) {
            if($result = $this->Empresa_model->updateEmpresa($empresa)) {
              $this->response($result, 201); 
            }
        } else {
            $this->response("Empresa nao definido", 400);
        }
    }


    function empresa_delete() {
        $id = (int) $this->get('id');

        if ($id <= 0){
            $message = "ID inválido";
            $this->response(NULL, 400); 
        }

        $this->Empresa_model->deleteUser($id);

        $this->response('Empresa deletado', 204);
    }
}