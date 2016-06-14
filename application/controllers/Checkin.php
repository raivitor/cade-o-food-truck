<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Checkin extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Checkin_model');
        $this->output->set_content_type('application/json');
    }

    function checkin_get() {
        $idUser = $this->get('idUser');
        $idTruck = $this->get('idTruck');

        echo $idUser;
        if($idUser) {            
            $checkin = $this->Checkin_model->getCheckin($idUser, $idTruck);
            if($checkin) {
                $this->response($checkin, 200);
            } else {
                $this->response(NULL, 400);
            }
        }
        else {
            $this->response(NULL, 404);
        }
    }

    function checkins_get() {
        $idUser     = $this->get('idUser');
        $idTruck    = $this->get('idTruck');

        $data['checkins'] = $this->Checkin_model->getAll($idUser, $idTruck);

        if($data) {
            $this->response($data, 200);
        } else {
            $this->response(NULL, 404);
        }
    }

    function checkin_put() {

        $new_checkin = [            
            'idUser'    => $this->put('idUser'),
            'idTruck' => $this->put('idTruck'),
            'data'          => time()
        ];

        if(!isset($new_checkin) || !empty($new_checkin)) {
            if($result = $this->Checkin_model->createCheckin($new_checkin)) {
                $this->response($result, 201); 
            }
        } else {
            $this->response("Checkin invalido", 400);
        }
        
    }


    function checkin_delete() {
        $idUser     = (int)$this->get('idUser');
        $idTruck    = (int)$this->get('idTruck');

        echo $idUser;

        if ($idUser <= 0 || $idTruck <= 0){
            $this->response(NULL, 400); 
        }

        $this->Checkin_model->deleteCheckin($idUser, $idTruck);

        $this->response('Empresa deletado', 204);
    }
}