<?php

require(APPPATH.'/libraries/REST_controller.php');

class Games extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('game_model');
    }

    //API - client sends id and a name is sent back
    public function nameById_get()
    {
        $id    = $this->get('id');

        if(!$id) {

            $this->response('No ID specified', 400);

            exit;
        }

        $result = $this->game_model->getnamebyid($id);

        if($result) {

            $this->response($result, 200);

            exit;
        }
        else {

             $this->response('Invalid ID', 404);

            exit;
        }
    }

    public function players_get()
    {
        $id = $this->get('id');
        $order = $this->get('order');
        
        if ($order)
            $result = $this->game_model->players($id, $order);
        else
            $result = $this->game_model->players($id);

        if($result) {

            $this->response($result, 200);

        }
        else {

            $this->response('No record found', 404);

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

    //API - create a new game item in database
    public function add_post()
    {
        $name                    = $this->post('name');
        $first_character_id      = $this->post('first_character_id');
        $second_character_id     = $this->post('second_character_id');

        if(!isset($name) || !isset($first_character_id) || !isset($second_character_id)) {

            $this->response('Enter complete game information to continue', 400);

        }
        else {
            
            $first  = $this->game_model->getbyid($first_character_id);
            $second = $this->game_model->getbyid($second_character_id);
                    
            $add = array(
                    'name'=>$name, 
                    'first_character_id' => $first_character_id, 
                    'second_character_id' => $second_character_id, 
                    'first_character_health' => $first[0]['health'], 
                    'second_character_health' => $second[0]['health'], 
            );

            $result = $this->game_model->add($add);

            if($result === 0) {

                $this->response('Game information coild not be saved. Try again.', 404);

            }
            else {
                
                $this->response($result, 200);
                
            }

        }
    }

    //API - put
    public function points_put()
    {
        $game_id      = $this->put('game_id');
        $character_id = $this->put('character_id');
        $agility      = $this->put('agility');

        if(!isset($game_id) || !isset($character_id) || !isset($agility)) {

            $this->response('Enter complete information to save', 400);

        }
        else {

            $points = (rand(1, 20)) + $agility;
            
            $result = $this->game_model->updatePoints(array('game_id' => $game_id, 'character_id' => $character_id, 'points'=> $points), true);

            if($result === 0) {

                $this->response('Information coild not be saved. Try again.', 404);

            }
            else {

                $this->response('success', 200);

            }
        }
    }
    
    //API - put
    public function attackPoints_put()
    {
        $game_id      = $this->put('game_id');
        $character_id = $this->put('character_id');
        $agility      = $this->put('agility');
        $weapon       = $this->put('weapon');

        if(!isset($game_id) || !isset($character_id) || !isset($agility) || !isset($weapon)) {

            $this->response('Enter complete information to save', 400);

        }
        else {

            $points = (rand(1, 20)) + $agility + $weapon;
            
            $result = $this->game_model->updatePoints(array('game_id' => $game_id, 'character_id' => $character_id, 'points'=> $points));

            if($result === 0) {

                $this->response('Information coild not be saved. Try again.', 404);

            }
            else {

                $this->response($points, 200);

            }
        }
    }

    //API - put
    public function resetPoints_put()
    {
        $id      = $this->put('id');
        
        $result = $this->game_model->resetPoints($id);

        if($result === 0) {

            $this->response('Information coild not be saved. Try again.', 404);

        }
        else {

            $this->response('success', 200);

        }
    }
    
    //API - put
    public function damage_put()
    {
        $game_id  = $this->put('game_id');
        $loser_id = $this->put('loser_id');
        $damage   = $this->put('damage');
        
        if(!isset($game_id) || !isset($loser_id) || !isset($damage)) {

            $this->response('Enter complete information to save', 400);

        }
        else {

            $result = $this->game_model->updateHealth($game_id, $loser_id, $damage);

            if($result === 0) {

                $this->response('Information coild not be saved. Try again.', 404);

            }
            else {

                $this->response($result, 200);

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