            <div id="body">
                
                <h2>Iniciar novo jogo:</h2>
                
                <div class="row">
                    
                    <div class="col-lg-12">
                        
                        <?php
                            $attr = array('name' => 'form_add_game', 'id' => 'form_add_game');

                            echo form_open(base_url('battle/addgame'), $attr);
                        ?>
                        
                        <div class="form-group">
                            <?= form_label('Nome da batalha:', 'name') . form_input('name', null, array('class' => 'form-control')); ?>
                        </div>
                        
                    </div>
                    
                </div>
                    
                <div class="row">
                    
                    <div class="col-lg-5">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Escolha o 1º competidor:</h3>
                            </div>
                            <div class="panel-body">
                                <?php
                                    foreach ($radio_first as $radio):
                                        echo '<div class="form-check">';
                                        echo form_radio(array('name' => $radio->name, 'value' => $radio->value, 'id' => $radio->value, 'class' => 'form-check-input'));
                                        echo form_label($radio->character, $radio->value);
                                        echo '</div>';
                                    endforeach;
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
                                <h3 class="panel-title">Escolha o 2º competidor:</h3>
                            </div>
                            <div class="panel-body">
                                <?php
                                    foreach ($radio_second as $radio):
                                        echo '<div class="form-check">';
                                        echo form_radio(array('name' => $radio->name, 'value' => $radio->value, 'id' => $radio->value, 'class' => 'form-check-input'));
                                        echo form_label($radio->character, $radio->value);
                                        echo '</div>';
                                    endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                
                </div>
                
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <?php
                            echo form_submit('btn_enviar', 'Enviar > ', array('class' => 'btn btn-success btn-xs')) . 
                                 form_close();
                        ?>
                    </div>
                </div>
                
            </div>
