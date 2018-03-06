            <div id="body">
                <div class="row">
                    <div class="col-lg-12">
                        <span class="pull-right">Criado em: <?= date('d/m/Y - H:i:s',strtotime($players[0]->created)); ?></span>
                        <h1 style="border-bottom: 1px solid #D0D0D0;">Batalha: <?= $players[0]->game; ?> > <?= $players[0]->character ?> ataca <?= $players[1]->character ?></h1>
                        <h6>Rola-se um 1d20 + fator de agilidade + fator de ataque da arma do atacante contra 1d20 + fator de agilidade + fator de defesa da arma do defensor. Quem será o mais forte?</h6>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->session->flashdata('msg'); ?>
                    </div>
                    <div class="col-lg-12">
                        <?= $this->session->flashdata('end'); ?>
                    </div>
                </div>
                
                <div class="row">
                    
                    <div class="col-lg-5">
                        
                        <div class="panel panel-default">
                            
                            <div class="panel-heading">
                                <h3 class="panel-title"><?= $players[0]->character; ?></h3>
                            </div>
                            
                            <div class="panel-body">

                                <ul>
                                    <li>Nome completo: <b><?= $players[0]->character ?></b></li>
                                    <li>Tipo / Espécie: <b><?= $players[0]->character_type ?></b></li>
                                    <li>Pontos de vida: <b><?= $players[0]->character_health ?></b></li>
                                    <li>Força: <b><?= $players[0]->character_power ?></b></li>
                                    <li>Agilidade: <b><?= $players[0]->character_agility ?></b></li>
                                    <li>Tipo de armamento: <b><?= $players[0]->weapon_type ?></b></li>
                                    <li>Nome da arma: <b><?= $players[0]->weapon ?></b></li>
                                    <li>Poder de ataque da arma: <b><?= $players[0]->weapon_attack ?></b></li>
                                    <li>Poder de defesa da arma: <b><?= $players[0]->weapon_defense ?></b></li>
                                    <li>Faces de dano: <b><?= $players[0]->weapon_damage.'d'.$players[0]->weapon_damage_amount ?></b></li>
                                    <?php if ($players[0]->points > 0): ?>
                                        <li>Força de ataque: <b><?= $players[0]->points ?></b></li>
                                    <?php endif; ?>
                                </ul>
                                
                                <?php
                                    if ($players[0]->character_health > 0 && $players[0]->points == 0):
                                        
                                        $attr = array('name' => 'form_points_0', 'id' => 'form_points_0');

                                        echo form_open(base_url('battle/attackpoints/'), $attr) . 
                                            form_hidden('game_id', $id) . 
                                            form_hidden('character_id', $players[0]->character_id) . 
                                            form_hidden('character', $players[0]->character) . 
                                            form_hidden('agility', $players[0]->character_agility) . 
                                            form_hidden('weapon', $players[0]->weapon_attack) . 
                                            form_hidden('type', 'attack') . 
                                            form_hidden('base_url', 'battle/attack/'.$id) . 
                                            form_submit('btn_points_0', 'Atacar > ', array('class' => 'btn btn-success btn-xs pull-right')) . 
                                            form_close();
                                    endif;
                                ?>
                                    
                            </div>
                        
                        </div>
                    
                    </div>
                
                    <div class="col-lg-2 text-center">
                        <h3>(*Versus*)</h3>
                    </div>
                    
                    <div class="col-lg-5">
                        
                        <div class="panel panel-default">
                            
                            <div class="panel-heading">
                                <h3 class="panel-title"><?= $players[1]->character; ?></h3>
                            </div>
                            
                            <div class="panel-body">

                                <ul>
                                    <li>Nome completo: <b><?= $players[1]->character ?></b></li>
                                    <li>Tipo / Espécie: <b><?= $players[1]->character_type ?></b></li>
                                    <li>Pontos de vida: <b><?= $players[1]->character_health ?></b></li>
                                    <li>Força: <b><?= $players[1]->character_power ?></b></li>
                                    <li>Agilidade: <b><?= $players[1]->character_agility ?></b></li>
                                    <li>Tipo de armamento: <b><?= $players[1]->weapon_type ?></b></li>
                                    <li>Nome da arma: <b><?= $players[1]->weapon ?></b></li>
                                    <li>Poder de ataque da arma: <b><?= $players[1]->weapon_attack ?></b></li>
                                    <li>Poder de defesa da arma: <b><?= $players[1]->weapon_defense ?></b></li>
                                    <li>Faces de dano: <b><?= $players[1]->weapon_damage.'d'.$players[1]->weapon_damage_amount ?></b></li>
                                    <?php if ($players[1]->points > 0): ?>
                                    <li>Força de defesa: <b><?= $players[1]->points ?></b></li>
                                    <?php endif; ?>
                                </ul>
                                
                                <?php
                                    if ($players[1]->character_health > 0 && $players[1]->points == 0):
                                        
                                        $attr = array('name' => 'form_points_1', 'id' => 'form_points_1');

                                        echo form_open(base_url('battle/attackpoints/'), $attr) . 
                                            form_hidden('game_id', $id) . 
                                            form_hidden('character_id', $players[1]->character_id) . 
                                            form_hidden('character', $players[1]->character) . 
                                            form_hidden('agility', $players[1]->character_agility) . 
                                            form_hidden('weapon', $players[1]->weapon_defense) . 
                                            form_hidden('type', 'defense') . 
                                            form_hidden('base_url', 'battle/attack/'.$id) . 
                                            form_submit('btn_points_1', '< Defender', array('class' => 'btn btn-danger btn-xs pull-left')) . 
                                            form_close();
                                    endif;
                                ?>
                                    
                            </div>
                        
                        </div>
                    
                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="col-lg-12 text-center">
                    <?php
                    /** /
                        if (($players[0]->character_health > 0) && ($players[1]->character_health > 0)):
                            if (($players[0]->points != 0) && ($players[1]->points != 0)):
                                $attr = array('name' => 'form_attack_1', 'id' => 'form_attack_1');

                                echo form_open(base_url('battle/revenge/'.$id), $attr) . 
                                                form_hidden('id', $id) .
                                                '<button type="submit" name="btn_points_1" class="btn btn-danger" aria-label="Left Align">' .
                                                '<span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span> Vingança' . 
                                                '</button>' . 
                                                form_close();
                            endif;
                        else:
                            echo 'Fim de jogo!';
                        endif;
                    /**/
                    ?>
                    </div>
                </div>
            
            </div>