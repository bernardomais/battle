<?php

require(APPPATH.'libraries/REST_controller.php');

class Characters extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('character_model');
    }

    //API - client sends id and on valid id character information is sent back
    public function byId_get()
    {
        $id = $this->get('id');

        if(!$id) {

            $this->response('No ID specified', 400);

            exit;
        }

        $result = $this->character_model->getbyid($id);

        if($result) {

            $this->response($result, 200);

            exit;
        }
        else {

             $this->response('Invalid ID', 404);

            exit;
        }
    }
    
    //API -  fetch all characters
    public function all_get()
    {
        $result = $this->character_model->getall();

        if($result) {

            $this->response($result, 200);

        }
        else {

            $this->response('No record found', 404);

        }
    }
    
    //API -  fetch all characters in a list
    public function radio_get($name = null)
    {
        $results = $this->character_model->getall();

        if($results) {
            
            $data = array();
            $i = 0;
            
            foreach($results as $result) {
                
                $data[$i]['value'] = $result['id'];
                $data[$i]['character'] = $result['name'];
                $data[$i]['name'] = $name;
                $i++;
            
            }

            $this->response($data, 200);

        }
        else {

            $this->response('No record found', 404);

        }
    }

    //API - create a new character item in database
    public function add_post()
    {
        $name      = $this->post('name');
        $type      = $this->post('type');
        $health    = $this->post('health');
        $power     = $this->post('power');
        $agility   = $this->post('agility');
        $weapon_id = $this->post('weapon_id');

        if(!$name || !$type || !$health || !$power || !$agility || !$weapon_id) {

            $this->response('Enter complete character information to save', 400);

        }
        else {

            $result = $this->character_model->add(array('name'=>$name, 'type'=>$type, 'health'=>$health, 'power'=>$power, 'agility'=>$agility, 'weapon_id'=>$weapon_id));

            if($result === 0) {

                $this->response('Character information coild not be saved. Try again.', 404);

            }
            else {

                $this->response('success', 200);

            }

        }
    }

    //API - update a character
    public function update_put()
    {
        $name      = $this->put('name');
        $type      = $this->put('type');
        $health    = $this->put('health');
        $power     = $this->put('power');
        $agility   = $this->put('agility');
        $weapon_id = $this->put('weapon_id');
        $id        = $this->put('id');

        if(!$name || !$type || !$health || !$power || !$agility || !$weapon_id)
        {

            $this->response('Enter complete character information to save', 400);

        }
        else {

            $result = $this->character_model->update($id, array('name'=>$name, 'type'=>$type, 'health'=>$health, 'power'=>$power, 'agility'=>$agility, 'weapon_id'=>$weapon_id));

            if($result === 0) {

                $this->response('Character information coild not be saved. Try again.', 404);

            }
            else {

                $this->response('success', 200);

            }

        }
    }

    //API - delete a character
    public function delete_delete()
    {
        $id = $this->delete('id');

        if(!$id) {

            $this->response('Parameter missing', 404);

        }

        if($this->character_model->delete($id)) {

            $this->response('success', 200);

        }
        else {

            $this->response('Failed', 400);

        }

    }

}