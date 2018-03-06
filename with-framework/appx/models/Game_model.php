<?php

class Game_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }
    
    //API call - recebe o nome do personagem pelo seu id
    public function getById($id)
    {    
        $this->db->select('c.name, c.health');

        $this->db->from('characters c');

        $this->db->where('c.id', $id);

        $query = $this->db->get();

        if($query->num_rows() == 1) {

           return $query->result_array();

        }
        else {

            return 0;

        }
    }

    //API call - recebe as informações de todos as partidas
    public function getall()
    {
        $this->db->select('id, name, type, health, power, agility');

        $this->db->from('games');

        $this->db->order_by('id', 'desc');

        $query = $this->db->get();

        if($query->num_rows() > 0) {

            return $query->result_array();

        }
        else {

            return 0;

        }
    }
    
    //API call - recebe as informações de todos os personagens realicionados a partida
    public function players($id = null, $order_by = null)
    {
        $this->db->select('
            g.name as `game`, 
            g.created, 
            c.id as `character_id`, 
            c.name as `character`, 
            c.type as `character_type`, 
            c.health as `character_health`, 
            c.power as `character_power`, 
            c.agility as `character_agility`, 
            w.name as `weapon`, 
            w.type as `weapon_type`, 
            w.attack as `weapon_attack`, 
            w.defense as `weapon_defense`, 
            w.damage as `weapon_damage`, 
            w.damage_amount as `weapon_damage_amount`, 
            cg.points
        ');

        $this->db->from('character_game cg');
        
        $this->db->join('games g', 'g.id = cg.game_id');
        
        $this->db->join('characters c', 'c.id = cg.character_id');
        
        $this->db->join('weapons w', 'w.id = c.weapon_id');

        $this->db->where('g.id', $id);
        
        if (isset($order_by))
            $this->db->order_by('cg.order', 'desc');

        $query = $this->db->get();

        if($query->num_rows() > 0) {

           return $query->result_array();

        }
        else {

            return 0;

        }
    }

    //API call - apaga uma partida
    public function delete($id)
    {
        $this->db->where('id', $id);

        if($this->db->delete('games')) {

            return true;

        }
        else {

            return false;

        }
    }

    //API call - insere uma nova partida
    public function add($data)
    {
        $game = array('name' => $data['name']);
        
        if($this->db->insert('games', $game)) {
            
            $game_id        = $this->db->insert_id();
            
            $character_game =  array(
                                        array(
                                            'game_id' => $game_id,
                                            'character_id' => $data['first_character_id'],
                                            'health' => $data['first_character_health'],
                                        ),
                                        array(
                                            'game_id' => $game_id,
                                            'character_id' => $data['second_character_id'],
                                            'health' => $data['second_character_health'],
                                        )
                                    );
            
            if ($this->db->insert_batch('character_game', $character_game)) {
                
                return $game_id;
                
            }
            
        }
        
        return false;
        
    }

    //API call - atualiza os pontos do personagem na partida
    public function updatePoints($data, $order = false)
    {
        $this->db->where('game_id = '.$data['game_id'].' AND character_id = '.$data['character_id']);

        if ($order) {
            $data = array('points' => $data['points'], 'order'  => $data['points']);
        }
        else {
            $data = array('points' => $data['points']);
        }
        
        if($this->db->update('character_game', $data)) {
            return true;
        }
        else {
            return false;
        }
    }
    
    //API call - reseta os pontos dos personagens na partida
    public function resetPoints($id)
    {
        $this->db->where('game_id', $id);
        
        if($this->db->update('character_game', array('points' => 0))) {

            return true;

        }
        else {

            return false;

        }
    }

    public function updateHealth($game_id, $loser_id, $damage)
    {
        $this->db->where('game_id = '.$game_id.' AND character_id = '.$loser_id);
                
        if($this->db->update('character_game', array('health' => $damage))) {
            
            return true;
            
        }
        else {
            
            return false;
            
        }
    }
}