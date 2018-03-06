            <div id="body">
                
                <div class="row">
                    
                    <div class="col-lg-6">
                        <?php
                            echo heading('Alterar personagem:', 2);

                            $attr = array('name' => 'form_edit_character', 'id' => 'form_edit_character');

                            echo form_open(base_url('battle/editcharacter'), $attr) . 
                                form_hidden('id', $id) . 
                                '<div class="form-group">' . 
                                    form_label('Nome', 'name') . form_input(array('name' => 'name', 'value' => $character[0]->name, 'id' => 'name', 'placeholder' => 'Nome do personagem', 'class' => 'form-control', 'maxlength' => 20)) . 
                                '</div>' . 
                                '<div class="form-group">' . 
                                    form_label('Tipo / Espécie', 'type') . form_input(array('name' => 'type', 'value' => $character[0]->type, 'id' => 'type', 'placeholder' => 'Espécie do personagem', 'class' => 'form-control', 'maxlength' => 20)) . 
                                '</div>' .
                                '<div class="form-group">' .
                                    form_label('Pontos de vida', 'health') . form_input(array('name' => 'health', 'value' => $character[0]->health, 'id' => 'health', 'placeholder' => 'Pontos de vida do personagem', 'class' => 'form-control', 'maxlength' => 3)) . 
                                '</div>' .
                                '<div class="form-group">' . 
                                    form_label('Força:', 'power') . form_input(array('name' => 'power', 'value' => $character[0]->power, 'id' => 'power', 'placeholder' => 'Força do personagem', 'class' => 'form-control', 'maxlength' => 3)) . 
                                '</div>' .
                                '<div class="form-group">' . 
                                    form_label('Agilidade:', 'agility') . form_input(array('name' => 'agility', 'value' => $character[0]->agility, 'id' => 'agility', 'placeholder' => 'Força do personagem', 'class' => 'form-control', 'maxlength' => 3)) . 
                                '</div>' .
                                '<div class="form-group">' . 
                                    form_label('Armamento', 'weapon_id') . form_dropdown('weapon_id', $weapons, $character[0]->weapon_id, array('name' => 'weapon_id', 'id' => 'weapon_id', 'class' => 'form-control')) . 
                                '</div>' .
                                form_submit(array('value' => 'Enviar', 'name' => 'btn_enviar', 'type' => 'submit', 'class' => 'btn btn-default pull-right')) .
                            form_close();
                        ?>
                    </div>
                
                    <div class="col-lg-6"></div>
                    
                </div>
                
            </div>
