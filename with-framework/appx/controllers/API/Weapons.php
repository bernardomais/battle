<?php

require(APPPATH.'/libraries/REST_controller.php');

class Weapons extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('weapon_model');
    }

    //API - client sends id and on valid id weapon information is sent back
    public function byId_get()
    {
        $id = $this->get('id');

        if(!$id) {

            $this->response('No ID specified', 400);

            exit;
        }

        $result = $this->weapon_model->getbyid($id);

        if($result) {

            $this->response($result, 200);

            exit;
        }
        else {

             $this->response('Invalid ID', 404);

            exit;
        }
    }

    //API -  fetch all weapons
    public function all_get()
    {
        $result = $this->weapon_model->getall();

        if($result) {

            $this->response($result, 200);

        }
        else {

            $this->response('No record found', 404);

        }
    }
    
    //API -  fetch all weapons as a list of id and name
    public function list_all_get()
    {
        $result = $this->weapon_model->list_all();

        if($result) {

            $this->response($result, 200);

        }
        else {

            $this->response('No record found', 404);

        }
    }

    //API - create a new weapon item in database
    public function add_post()
    {
        $name          = $this->post('name');
        $type          = $this->post('type');
        $attack        = $this->post('attack');
        $defense       = $this->post('defense');
        $damage        = $this->post('damage');
        $damage_amount = $this->post('damage_amount');

        if(empty($name) || empty($type) || empty($attack) || empty($defense) || empty($damage) || empty($damage_amount)) {

            $this->response('Enter complete weapon information to save', 400);

        }
        else {

            $result = $this->weapon_model->add(array('name'=>$name, 'type'=>$type, 'attack'=>$attack, 'defense'=>$defense, 'damage'=>$damage, 'damage_amount'=>$damage_amount));

            if($result === 0) {

                $this->response('Weapon information coild not be saved. Try again.', 404);

            }
            else {

                $this->response('success', 200);

            }

        }
    }

    //API - update a weapon
    public function update_put()
    {
        $name          = $this->put('name');
        $type          = $this->put('type');
        $attack        = $this->put('attack');
        $defense       = $this->put('defense');
        $damage        = $this->put('damage');
        $damage_amount = $this->put('damage_amount');
        $id            = $this->put('id');

        if(!$name || !$type || !$attack || !$defense || !$damage || !$damage_amount)
        {

            $this->response('Enter complete weapon information to save', 400);

        }
        else {

            $result = $this->weapon_model->update($id, array('name'=>$name, 'type'=>$type, 'attack'=>$attack, 'defense'=>$defense, 'damage'=>$damage, 'damage_amount'=>$damage_amount));

            if($result === 0) {

                $this->response('Weapon information coild not be saved. Try again.', 404);

            }
            else {

                $this->response('success', 200);

            }

        }
    }

    //API - delete a weapon
    public function delete_delete()
    {
        $id = $this->delete('id');

        if(!$id) {
            $this->response('Parameter missing', 404);

        }
        
        $retorno = $this->weapon_model->delete($id);

        if($retorno == 'success') {

            $this->response('success', 200);

        }
        else {

            $this->response($retorno, 400);

        }

    }

}