<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Battle extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('rest', array(
            'server' => base_url('/API/')
        ));
    }
    
    public function index()
    {
        $data['characters'] = $this->rest->get('characters/all');
        
        $data['weapons'] = $this->rest->get('weapons/all');
        
        $data['menu'] = array(
                            array(
                                'base_url' => 'battle/addgame/',
                                'span_class' => 'glyphicon glyphicon-star',
                                'name' => 'Iniciar jogo',
                                'others' => array('class' => 'btn btn-success btn-xs')
                            ),
                            array(
                                'base_url' => 'battle/addcharacter/',
                                'span_class' => 'glyphicon glyphicon-plus',
                                'name' => 'Personagem',
                                'others' => array('class' => 'btn btn-default btn-xs')
                            ),
                            array(
                                'base_url' => 'battle/addweapon/',
                                'span_class' => 'glyphicon glyphicon-plus',
                                'name' => ' Armamento',
                                'others' => array('class' => 'btn btn-default btn-xs')
                            )
                        );
        
        $this->load->view('layout/header');
        $this->load->view('layout/menu', $data);
        $this->load->view('battle', $data);
        $this->load->view('layout/footer');
    }

    public function play($id = null)
    {
        $data['id'] = $id;
        
        $data['players'] = $this->rest->get('games/players/id/'.$id);
        
        $data['menu'] = array(
                            array(
                                'base_url' => '',
                                'span_class' => 'glyphicon glyphicon-repeat',
                                'name' => ' Voltar',
                                'others' => array('class' => 'btn btn-default btn-xs')
                            )
                        );
        
        $this->load->helper('form');
        
        $this->load->view('layout/header');
        $this->load->view('layout/menu', $data);
        $this->load->view('play', $data);
        $this->load->view('layout/footer');
    }
    
    public function attack($id = null)
    {
        $data['id'] = $id;
        
        if ($this->input->method() === 'post')
            $this->rest->put('games/resetpoints/', array('id' => $id));
        
        $data['players'] = $this->rest->get('games/players/id/'.$id.'/order/1');
        
        $data['menu'] = array(
                            array(
                                'base_url' => '',
                                'span_class' => 'glyphicon glyphicon-repeat',
                                'name' => ' Voltar',
                                'others' => array('class' => 'btn btn-default btn-xs')
                            )
                        );
        
        $this->load->helper('form');
        
        $this->load->view('layout/header');
        $this->load->view('layout/menu', $data);
        $this->load->view('attack', $data);
        $this->load->view('layout/footer');
    }
    
    public function revenge($id = null)
    {
        $data['id'] = $id;
        
        if ($this->input->method() === 'post')
            $this->rest->put('games/resetpoints/', array('id' => $id));
        
        $data['players'] = $this->rest->get('games/players/id/'.$id.'/order/1');
        
        $data['menu'] = array(
                            array(
                                'base_url' => '',
                                'span_class' => 'glyphicon glyphicon-repeat',
                                'name' => ' Voltar',
                                'others' => array('class' => 'btn btn-default btn-xs')
                            )
                        );
        
        $this->load->helper('form');
        
        $this->load->view('layout/header');
        $this->load->view('layout/menu', $data);
        $this->load->view('revenge', $data);
        $this->load->view('layout/footer');
    }
    
    public function points()
    {
        if ($this->input->method() === 'post') {
            
            $data['game_id']      = $this->input->post('game_id');
            $data['character_id'] = $this->input->post('character_id');
            $data['agility']      = $this->input->post('agility');
            
            $return = $this->rest->put('games/points', $data);
            
            if ($return == 'success') {
                
                $game = $this->rest->get('games/players/id/'.$data['game_id'].'/order/1');
                
                if ($game[0]->points == $game[1]->points) {
                    $this->rest->put('games/resetpoints/', array('id' => $data['game_id']));
                    
                    $msg = '<div class="alert alert-warning alert-dismissible" role="alert">' . 
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                            '<strong>Partida empatada!</strong> Tente novamente.' .
                            '</div>';
                } 
                else if ($game[1]->points == 0) {
                    $msg = '<div class="alert alert-info alert-dismissible" role="alert">' . 
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                            '<strong>Batalha iniciada!</strong> '.$game[0]->character.' conseguiu '.$game[0]->points.' pontos. ' .
                            $game[1]->character.' ainda não jogou.' .
                            '</div>';
                } else {
                    $msg = '<div class="alert alert-success alert-dismissible" role="alert">' . 
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                            '<strong>'.$game[0]->character.' venceu com '.$game[0]->points.' pontos!</strong> O vencedor ataca primeiro. '. 
                            $game[1]->character.' fez apenas ' . $game[1]->points . ' pontos. ' .
                            '</div>';
                }
            }
            else {
                $msg =  '<div class="alert alert-danger alert-dismissible" role="alert">' . 
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                    $return . 
                    '</div>';
            }
            
            $this->session->set_flashdata('msg', $msg);
            
            redirect(base_url('battle/play/'.$data['game_id']));
            
        }
        else {
            
            redirect(base_url('battle/addgame/'));
            
        }
    }
    
    public function attackPoints()
    {
        if ($this->input->method() === 'post') {
            
            $data['type']         = $this->input->post('type');
            $data['game_id']      = $this->input->post('game_id');
            $data['character_id'] = $this->input->post('character_id');
            $data['agility']      = $this->input->post('agility');
            $data['weapon']       = $this->input->post('weapon');
            $data['character']    = $this->input->post('character');
            $data['base_url']     = $this->input->post('base_url');
            
            $return = $this->rest->put('games/attackpoints', $data);
            
            if (!empty($return)) {
            
                $game = $this->rest->get('games/players/id/'.$data['game_id'].'/order/1');
                
                if ($game[0]->points == $game[1]->points) {
                    $this->rest->put('games/resetpoints/', array('id' => $data['game_id']));
                    
                    $msg = '<div class="alert alert-warning alert-dismissible" role="alert">' . 
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                            '<strong>Esta batalha terminou empatada!</strong> Tente novamente.' .
                            '</div>';
                } 
                else if ($game[1]->points == 0) {
                    $msg = '<div class="alert alert-success alert-dismissible" role="alert">' . 
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                            '<strong>'.$data['character'].'</strong> conseguiu um poder de ataque de '.$return.' pontos! '.$game[1]->character.' ainda não defendeu.' .
                            '</div>';
                }
                else if ($game[0]->points == 0) {
                    $msg = '<div class="alert alert-danger alert-dismissible" role="alert">' . 
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                            '<strong>'.$data['character'].'</strong> já montou suas defesas e conseguiu um poder de '.$return.' pontos! '.$game[0]->character.' ainda não atacou.' .
                            '</div>';
                } 
                else if ($game[0]->points > $game[1]->points) {
                    $msg = '<div class="alert alert-success alert-dismissible" role="alert">' . 
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                            '<strong>'.$game[0]->character.' marcou '.$game[0]->points.' pontos! </strong>'.$game[1]->character.' marcou apenas '.$game[1]->points.' pontos. '.$game[1]->character.' sofrerá os danos da sua derrota!' . 
                            '</div>';
                    // calcular o dano
                    $health = $this->damage($game[0]->weapon_damage, $game[0]->weapon_damage_amount, $game[0]->character_power, $game[1]->character_health);
                    $damage = array(
                                'game_id' => $data['game_id'],
                                'loser_id' => $game[1]->character_id,
                                'damage' => $health,
                                );
                        
                    $this->rest->put('games/damage/', $damage);
                    
                    if ($health < 0) {
                        $end = '<div class="alert alert-danger alert-dismissible" role="alert">' . 
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                                '<strong>'.$game[0]->character.' venceu o jogo!</strong> '.$game[1]->character.' tinha '.$game[1]->character_health.' pontos de vida, perdeu '.$health.' pontos de vida e não resistiu!' . 
                                '</div>';
                        $this->session->set_flashdata('end', $end);
                    }
                    else {
                        $end = '<div class="alert alert-info alert-dismissible" role="alert">' . 
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                                '<strong>'.$game[0]->character.' venceu esta batalha!</strong> '.$game[1]->character.' tinha '.$game[1]->character_health.' pontos de vida, perdeu '.$health.' pontos de vida e agora está com ' . ($game[1]->character_health - $health) .'.'.
                                '</div>';
                        $this->session->set_flashdata('end', $end);
                    }
                } 
                else if ($game[0]->points < $game[1]->points) {
                    $msg = '<div class="alert alert-danger alert-dismissible" role="alert">' . 
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                            '<strong>'.$game[1]->character.' marcou '.$game[1]->points.' pontos! </strong>'.$game[0]->character.' marcou apenas '.$game[0]->points.' pontos. Por ter se defendido bem não sofrerá nenhum dano!' . 
                            '</div>';
                }
                else {
                $msg =  '<div class="alert alert-danger alert-dismissible" role="alert">' . 
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                    $return . 
                    '</div>';
                }
            }
            
            $this->session->set_flashdata('msg', $msg);
            
            redirect(base_url($data['base_url']));
            
        }
        else {   
            redirect(base_url('battle/play/'.$data['game_id']));
        }
    }
    
    private function damage($damage, $damage_amount, $power, $health)
    {
        $acum = 0;
        
        for ($i = 0; $i < $damage; $i++) {
            
            $acum += (rand(1, $damage_amount)) + $power;
            
        }
        
        return ($health - $acum);
    }
    
    public function battle($id = null)
    {
        $data['id'] = $id;
        
        $data['players'] = $this->rest->get('games/players/id/'.$id);
        
        $data['menu'] = array(
                            array(
                                'base_url' => '',
                                'span_class' => 'glyphicon glyphicon-repeat',
                                'name' => ' Voltar',
                                'others' => array('class' => 'btn btn-default btn-xs')
                            )
                        );
        
        $this->load->helper('form');
        
        $this->load->view('layout/header');
        $this->load->view('layout/menu', $data);
        $this->load->view('battle', $data);
        $this->load->view('layout/footer');
    }
    
    public function viewCharacter($id = null)
    {
        $data['id'] = $id;
        
        $data['character'] = $this->rest->get('characters/byid/id/'.$id);
        
        $data['menu'] = array(
                            array(
                                'base_url' => 'battle/editcharacter/'.$id,
                                'span_class' => 'glyphicon glyphicon-pencil',
                                'name' => ' Editar',
                                'others' => array('class' => 'btn btn-default btn-xs')
                            ),
                            array(
                                'base_url' => '',
                                'span_class' => 'glyphicon glyphicon-repeat',
                                'name' => ' Voltar',
                                'others' => array('class' => 'btn btn-default btn-xs')
                            )
                        );
        
        $this->load->view('layout/header');
        $this->load->view('layout/menu', $data);
        $this->load->view('view_character', $data);
        $this->load->view('layout/footer');
    }
    
    public function viewWeapon($id = null)
    {
        $data['id'] = $id;
        
        $data['weapon'] = $this->rest->get('weapons/byid/id/'.$id);
        
        $data['menu'] = array(
                            array(
                                'base_url' => 'battle/editweapon/'.$id,
                                'span_class' => 'glyphicon glyphicon-pencil',
                                'name' => ' Editar',
                                'others' => array('class' => 'btn btn-default btn-xs')
                            ),
                            array(
                                'base_url' => '',
                                'span_class' => 'glyphicon glyphicon-repeat',
                                'name' => ' Voltar',
                                'others' => array('class' => 'btn btn-default btn-xs')
                            )
                        );
        
        $this->load->view('layout/header');
        $this->load->view('layout/menu', $data);
        $this->load->view('view_weapon', $data);
        $this->load->view('layout/footer');
    }
    
    public function addCharacter()
    {
        if ($this->input->method() === 'post') {
            
            $data['name']      = $this->input->post('name', TRUE);
            $data['type']      = $this->input->post('type', TRUE);
            $data['health']    = $this->input->post('health');
            $data['power']     = $this->input->post('power');
            $data['agility']   = $this->input->post('agility');
            $data['weapon_id'] = $this->input->post('weapon_id');
        
            $return = $this->rest->post('characters/add', $data);
            
            if ($return == 'success') {
                
                $msg = '<div class="alert alert-success alert-dismissible" role="alert">' . 
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                    '<strong> Personagem inserido!</strong> Deixe suas batalhas mais emocionantes. ' .
                    '</div>';
            }
            else {
                $msg =  '<div class="alert alert-danger alert-dismissible" role="alert">' . 
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                    $return . 
                    '</div>';
            }
        
            $this->session->set_flashdata('msg', $msg);

            redirect(base_url());
            
        }
        
        $this->load->helper('form');
        
        $weapons = $this->rest->get('weapons/list_all');
        
        $data['weapons'][0] = 'Selecione uma arma';
        
        foreach ($weapons as $weapon) {
                
                $data['weapons'][$weapon->id] = $weapon->name . ' (Tipo: '.$weapon->type.')';
                    
        }
        
        $data['menu'] = array(
                            array(
                                'base_url' => '',
                                'span_class' => 'glyphicon glyphicon-repeat',
                                'name' => ' Voltar',
                                'others' => array('class' => 'btn btn-default btn-xs')
                            )
                        );
        
        $this->load->view('layout/header');
        $this->load->view('layout/menu', $data);
        $this->load->view('add_character');
        $this->load->view('layout/footer');
    }
    
    public function addWeapon()
    {
        if ($this->input->method() === 'post') {
            
            $data['name']          = $this->input->post('name', TRUE);
            $data['type']          = $this->input->post('type', TRUE);
            $data['attack']        = $this->input->post('attack');
            $data['defense']       = $this->input->post('defense');
            $data['damage']        = $this->input->post('damage');
            $data['damage_amount'] = $this->input->post('damage_amount');
        
            $return = $this->rest->post('weapons/add', $data);
            
            if ($return == 'success') {
                
                $msg = '<div class="alert alert-success alert-dismissible" role="alert">' . 
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                    '<strong> Armamento '.$data['name'].' inserido!</strong> Mais armas, mais poder de fogo para seus combates. ' .
                    '</div>';
            }
            else {
                $msg =  '<div class="alert alert-danger alert-dismissible" role="alert">' . 
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                    $return . 
                    '</div>';
            }
        
            $this->session->set_flashdata('msg', $msg);

            redirect(base_url());

        }
        
        $this->load->helper('form');
        
        $data['menu'] = array(
                            array(
                                'base_url' => '',
                                'span_class' => 'glyphicon glyphicon-repeat',
                                'name' => ' Voltar',
                                'others' => array('class' => 'btn btn-default btn-xs')
                            )
                        );
        
        $this->load->view('layout/header');
        $this->load->view('layout/menu', $data);
        $this->load->view('add_weapon');
        $this->load->view('layout/footer');
    }
    
    public function addGame()
    {
        if ($this->input->method() === 'post') {
            
            $data['name']                    = $this->input->post('name');
            $data['first_character_id']      = $this->input->post('first_character_id');
            $data['second_character_id']     = $this->input->post('second_character_id');
             
            $return = $this->rest->post('games/add', $data);
            
            if (!empty($return)) {
                
                redirect(base_url('battle/play/'.$return));
            }
            else {
                echo $return;
            }

        }
        
        $data['radio_first']  = $this->rest->get('characters/radio/first_character_id');
        $data['radio_second'] = $this->rest->get('characters/radio/second_character_id');
        
        $this->load->helper('form');
        
        $data['menu'] = array(
                            array(
                                'base_url' => '',
                                'span_class' => 'glyphicon glyphicon-repeat',
                                'name' => ' Voltar',
                                'others' => array('class' => 'btn btn-default btn-xs')
                            )
                        );
        
        $this->load->view('layout/header');
        $this->load->view('layout/menu', $data);
        $this->load->view('add_game', $data);
        $this->load->view('layout/footer');
    }
    
    public function editCharacter($id = null)
    {
        if ($this->input->method() === 'post') {
            
            $data['id']        = $this->input->post('id');
            $data['name']      = $this->input->post('name', TRUE);
            $data['type']      = $this->input->post('type', TRUE);
            $data['health']    = $this->input->post('health');
            $data['power']     = $this->input->post('power');
            $data['agility']   = $this->input->post('agility');
            $data['weapon_id'] = $this->input->post('weapon_id');
        
            $return = $this->rest->put('characters/update', $data);
            
            if ($return == 'success') {
                
                $msg = '<div class="alert alert-success alert-dismissible" role="alert">' . 
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                    '<strong> Personagem '.$data['name'].' atualizado!</strong> Grandes combates necessitam de grandes personagens. ' .
                    '</div>';
            }
            else {
                $msg =  '<div class="alert alert-danger alert-dismissible" role="alert">' . 
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                    $return . 
                    '</div>';
            }
        
            $this->session->set_flashdata('msg', $msg);

            redirect(base_url());
        
        }
        
        $data['id'] = $id;
        
        $data['character'] = $this->rest->get('characters/byid/id/'.$id);
        
        $weapons = $this->rest->get('weapons/list_all');
        
        foreach ($weapons as $weapon) {
                
                $data['weapons'][$weapon->id] = $weapon->name . ' (Tipo: '.$weapon->type.')';
                    
        }
        
        $data['menu'] = array(
                            array(
                                'base_url' => '',
                                'span_class' => 'glyphicon glyphicon-repeat',
                                'name' => ' Voltar',
                                'others' => array('class' => 'btn btn-default btn-xs')
                            )
                        );
        
        $this->load->helper('form');
        
        $this->load->view('layout/header');
        $this->load->view('layout/menu', $data);
        $this->load->view('edit_character', $data);
        $this->load->view('layout/footer');
    }
    
    public function editWeapon($id = null)
    {
        if ($this->input->method() === 'post') {
            
            $data['id']            = $this->input->post('id');
            $data['name']          = $this->input->post('name', TRUE);
            $data['type']          = $this->input->post('type', TRUE);
            $data['attack']        = $this->input->post('attack');
            $data['defense']       = $this->input->post('defense');
            $data['damage']        = $this->input->post('damage');
            $data['damage_amount'] = $this->input->post('damage_amount');
        
            $return = $this->rest->put('weapons/update', $data);
            
            if ($return == 'success') {
                
                $msg = '<div class="alert alert-success alert-dismissible" role="alert">' . 
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                    '<strong> Armamento '.$data['name'].' atualizado!</strong> Uma boa arma pode salvar de um resultado  adverso em batalha. ' .
                    '</div>';
            }
            else {
                $msg =  '<div class="alert alert-danger alert-dismissible" role="alert">' . 
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                    $return . 
                    '</div>';
            }
        
            $this->session->set_flashdata('msg', $msg);

            redirect(base_url());
            
        }
        
        $data['id'] = $id;
        
        $data['weapon'] = $this->rest->get('weapons/byid/id/'.$id);
        
        $data['menu'] = array(
                            array(
                                'base_url' => '',
                                'span_class' => 'glyphicon glyphicon-repeat',
                                'name' => ' Voltar',
                                'others' => array('class' => 'btn btn-default btn-xs')
                            )
                        );
        
        $this->load->helper('form');
        
        $this->load->view('layout/header');
        $this->load->view('layout/menu', $data);
        $this->load->view('edit_weapon', $data);
        $this->load->view('layout/footer');
    }
    
    public function deleteCharacter($id = null)
    {
        $return = $this->rest->delete('characters/delete', array('id' => $id));
        
        if ($return == 'success') {

            $msg = '<div class="alert alert-success alert-dismissible" role="alert">' . 
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                '<strong> Personagem excluído!</strong> Crei novos personagens para incrementar seus combates. ' .
                '</div>';
        }
        else {
            $msg =  '<div class="alert alert-danger alert-dismissible" role="alert">' . 
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                $return . 
                '</div>';
        }

        $this->session->set_flashdata('msg', $msg);

        redirect(base_url());
        
    }
    
    public function deleteWeapon($id = null)
    {
        $return = $this->rest->delete('weapons/delete', array('id' => $id));
            
        if ($return == 'success') {
            $msg = '<div class="alert alert-success alert-dismissible" role="alert">' . 
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                    '<strong> Armamento excluído!</strong> Crie novas armas e proteções para usar em suas batalhas. ' .
                    '</div>';
        }
        else {
            $msg =  '<div class="alert alert-danger alert-dismissible" role="alert">' . 
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . 
                    $return . 
                    '</div>';
        }
        
        $this->session->set_flashdata('msg', $msg);
        
        redirect(base_url());
        
    }
    
}
