<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Usuario extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->model('Gerente_model');
        $this->load->model('Dono_model');
        $this->output->set_content_type('application/json');
    }

    function user_get() {
        $id = $this->get('id');

        if($id) {            
            $user = $this->Usuario_model->getUser($id);
            if($user) {
                $this->response($user, 200);
            } else {
                $this->response(NULL, 400);
            }
        }
        else {
            $this->response(NULL, 404);
        }
    }

    function users_get() {
        $data['users'] = $this->Usuario_model->getAll();

        if($data) {
            $this->response($data, 200);
        } else {
            $this->response(NULL, 404);
        }
    }

    function user_put() {

        $new_user = [            
            'name'     => $this->put('name'),
            'password' => $this->put('password'),
            'email'    => $this->put('email'),
            'birthday' => $this->put('birthday'),
            'cpf'      => $this->put('cpf'), 
            'papel'    => $this->put('papel'),
            'sexo'     => $this->put('sexo') 
        ];

        print_r($new_user);

        if(! isset($new_user) || ! empty($new_user) ) {

            if($result = $this->Usuario_model->createUser($new_user)) {

                if( $new_user['papel'] == "Gerente") {
                    $this->Gerente_model->createGerente($new_user['email']);
                } elseif ( $new_user['papel'] == "Dono"  ) {
                    $this->Dono_model->createDono($new_user['email']);
                }

                $this->response($result, 201); 
            }
        } else {
            $this->response("Usuario nao definido", 400);
        }
        
    }

    function user_post() {

        $user = [            
            'id'       => $this->post('id'),
            'name'     => $this->post('name'),
            'password' => $this->post('password'),
            'email'    => $this->post('email'),
            'birthday' => $this->post('birthday'),
            'cpf'      => $this->post('cpf'),
            'papel'    => $this->post('papel'),
            'sexo'     => $this->post('sexo') 
        ];

        print_r($user);

        if(! isset($user) || ! empty($user) ) {
            if($result = $this->Usuario_model->updateUser($user)) {
              $this->response($result, 201); 
            }
        } else {
            $this->response("Usuario nao definido", 400);
        }
        
    }


    function user_delete() {
        $id = (int) $this->get('id');

        if ($id <= 0)
        {
            $message = "ID inválido";
            $this->response(NULL, 400); 
        }

        $this->Usuario_model->deleteUser($id);

        $message = [
            'id' => $id,
            'message' => 'Usuario deletado :)'
        ];

        $this->set_response($message, 204);
    }
}
