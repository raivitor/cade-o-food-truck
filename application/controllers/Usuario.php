<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Usuario extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Usuario_model');
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
            'name'     => $this->input->get('name'),
            'password' => $this->input->get('password'),
            'email'    => $this->input->get('email'),
            'birthday' => $this->input->get('birthday'),
            'cpf'      => $this->input->get('cpf') 
        ];

        if(! isset($new_user) || ! empty($new_user) ) {
            if($result = $this->Usuario_model->createUser($new_user)) {
              $this->response($result, 201); 
            }
        } else {
            $this->response("Usuario nao definido", 400);
        }
        
    }

    function user_post() {

        $user = [            
            'name'     => $this->input->get('name'),
            'password' => $this->input->get('password'),
            'email'    => $this->input->get('email'),
            'birthday' => $this->input->get('birthday'),
            'cpf'      => $this->input->get('cpf') 
        ];

        if(! isset($user) || ! empty($user) ) {
            if($result = $this->Usuario_model->createUser($user)) {
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
