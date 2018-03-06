<?php

class Weapon_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    //API call - recebe as informações de uma arma pelo seu id
    public function getbyid($id)
    {
        $this->db->select('id, name, type, attack, defense, damage, damage_amount');

        $this->db->from('weapons');

        $this->db->where('id',$id);

        $query = $this->db->get();

        if($query->num_rows() == 1) {

           return $query->result_array();

        }
        else {

            return 0;

        }
    }

    //API call - recebe as informações de todas as armas
    public function getall()
    {
        $this->db->select('id, name, type, attack, defense, damage, damage_amount');

        $this->db->from('weapons');

        $this->db->order_by('id', 'desc');

        $query = $this->db->get();

        if($query->num_rows() > 0) {

            return $query->result_array();

        }
        else {

            return 0;

        }
    }
    
    //API call - recebe as informações de todas as armas
    public function list_all()
    {
        $this->db->select('id, name, type');

        $this->db->from('weapons');

        $this->db->order_by('id', 'asc');

        $query = $this->db->get();

        if($query->num_rows() > 0) {

            return $query->result_array();

        }
        else {

            return 0;

        }
    }
    
    //API call - apaga uma arma do sistema se esta não estiver associada a nenhum pesonagem
    public function delete($id)
    {
        $this->db->where('weapon_id', $id);
        
        $fk = $this->db->get('characters');
        
        if(empty($fk->result_array())) {
            
            $this->db->where('id', $id);
            
            if($this->db->delete('weapons')) {
                return 'success';
            }
            else {
                return 'Não foi possível excluir. Tente novamente mais tarde.';
            }
            
        } 
        else {
            return 'Este armamento está sendo utilizado por um personagem, por isso, isso não pode ser excluído!';
        }
    }

    //API call - insere uma nova arma
    public function add($data)
    {
        if($this->db->insert('weapons', $data)) {

            return true;

        }
        else{

            return false;

        }
    }

    //API call - atualiza as informações de uma arma
    public function update($id, $data)
    {
        $this->db->where('id', $id);

        if($this->db->update('weapons', $data)) {

            return true;

        }
        else {

            return false;

        }
    }

}