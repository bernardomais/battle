<?php

class Character_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    //API call - recebe as informações de um personagem pelo seu id
    public function getbyid($id)
    {
        $this->db->select('c.name, c.type, c.health, c.power, c.agility, c.weapon_id, w.type as weapon_type, w.name as weapon_name, w.attack as weapon_attack, w.defense as weapon_defense, w.damage as weapon_damage, w.damage_amount as weapon_damage_amount');

        $this->db->from('characters c');
        
        $this->db->join('weapons w', 'c.weapon_id = w.id');

        $this->db->where('c.id',$id);

        $query = $this->db->get();

        if($query->num_rows() == 1) {

           return $query->result_array();

        }
        else {

            return 0;

        }
    }

    //API call - recebe as informações de todos os personagens
    public function getall()
    {
        $this->db->select('id, name, type, health, power, agility');

        $this->db->from('characters');

        $this->db->order_by('id', 'desc');

        $query = $this->db->get();

        if($query->num_rows() > 0) {

            return $query->result_array();

        }
        else {

            return 0;

        }
    }

    //API call - apaga um personagem
    public function delete($id)
    {
        $this->db->where('id', $id);

        if($this->db->delete('characters')) {

            return true;

        }
        else {

            return false;

        }
    }

    //API call - insere um novo personagem
    public function add($data)
    {
        if($this->db->insert('characters', $data)) {

            return true;

        }
        else{

            return false;

        }
    }

    //API call - atualiza as informações de um personagem
    public function update($id, $data)
    {
        $this->db->where('id', $id);

        if($this->db->update('characters', $data)) {

            return true;

        }
        else {

            return false;

        }
    }

}