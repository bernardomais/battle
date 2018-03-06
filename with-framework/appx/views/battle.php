           
            <div id="body">
                
                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->session->flashdata('msg'); ?>
                    </div>
                </div>
                
                <div class="row">
                    
                    <div class="col-lg-6">
                        
                        <h1>Lista de personagens</h1>

                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Tipo</th>
                                <th class="text-center">Vida</th>
                                <th class="text-center">Força</th>
                                <th class="text-center">Agilidade</th>
                                <th class="text-center">***Ações***</th>
                            </tr>
                            <?php
                                foreach ($characters as $character):
                                    echo '<tr>'
                                        . '<td>'.anchor(base_url('battle/viewcharacter/'.$character->id), $character->name).'</td>'
                                        . '<td>'.$character->type.'</td>'
                                        . '<td>'.$character->health.'</td>'
                                        . '<td>'.$character->power.'</td>'
                                        . '<td>'.$character->agility.'</td>'
                                        . '<td class="text-center">'
                                        . anchor(base_url('battle/editcharacter/'.$character->id), '<span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('class' => 'btn btn-primary btn-xs'))
                                        . ' '
                                        . anchor(base_url('battle/deletecharacter/'.$character->id), '<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>', array('class' => 'btn btn-warning btn-xs'))
                                        . '</td>'
                                        . '</tr>';
                                endforeach;
                            ?>
                        </table>
                    </div>

                    <div class="col-lg-6">
                        
                        <h1>Lista de armas</h1>

                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center">Tipo</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Força</th>
                                <th class="text-center">Defesa</th>
                                <th class="text-center">Dano</th>
                                <th class="text-center">***Ações***</th>
                            </tr>
                            <?php
                                foreach ($weapons as $weapon):
                                    echo '<tr>'
                                        .'<td>'.anchor(base_url('battle/viewweapon/'.$weapon->id), $weapon->type, array('title' => $weapon->type)).'</td>'
                                        . '<td>'.$weapon->name.'</td>'
                                        . '<td>'.$weapon->attack.'</td>'
                                        . '<td>'.$weapon->defense.'</td>'
                                        . '<td>'.$weapon->damage.'d'.$weapon->damage_amount.'</td>'
                                        . '<td class="text-center">'
                                        . anchor(base_url('battle/editweapon/'.$weapon->id), '<span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('class' => 'btn btn-primary btn-xs'))
                                        . ' '
                                        . anchor(base_url('battle/deleteweapon/'.$weapon->id), '<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>', array('class' => 'btn btn-warning btn-xs'))
                                        .'</td>'
                                        . '</tr>';
                                endforeach;
                            ?>
                        </table>
                    </div>
                
                </div>
                
            </div>