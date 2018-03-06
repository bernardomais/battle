<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('game_model');
        $this->load->model('character_model');
    }
    
    public function index()
    {
        if ($this->game_model->updateHealth(46, 5, 125))
            echo 'BOA';
    }

    public function characters()
    {
        $data = $this->character_model->getall();

        if (empty($data))
            $data = 'Vazio';

        echo '<h1>Personagens</h1>';
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit();
    }
}