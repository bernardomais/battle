            <div id="body">
                
                <div class="row">
                    
                    <div class="col-lg-6">
                        <?php
                            echo heading('Alterar armamento:', 2);

                            $attr = array('name' => 'form_edit_weapon', 'id' => 'form_edit_weapon');

                            echo form_open(base_url('battle/editweapon'), $attr) . 
                                    form_hidden('id', $id).
                                    '<div class="form-group">' . 
                                        form_label('Nome do armamento', 'name') . form_input(array('name' => 'name', 'id' => 'name', 'value' => $weapon[0]->name, 'placeholder' => 'Nome', 'class' => 'form-control')) . 
                                    '</div>' .
                                    '<div class="form-group">' . 
                                        form_label('Tipo de armamento', 'type') . form_input(array('name' => 'type', 'id' => 'type', 'value' => $weapon[0]->type, 'placeholder' => 'Tipo', 'class' => 'form-control')) . 
                                    '</div>' .
                                    '<div class="form-group">' . 
                                        form_label('Força de ataque', 'attack') . form_input(array('name' => 'attack', 'id' => 'attack', 'value' => $weapon[0]->attack, 'placeholder' => 'Força', 'class' => 'form-control')) . 
                                    '</div>' .
                                    '<div class="form-group">' . 
                                        form_label('Força de defesa', 'defense') . form_input(array('name' => 'defense', 'id' => 'defense', 'value' => $weapon[0]->defense, 'placeholder' => 'Defesa', 'class' => 'form-control')) . 
                                    '</div>' .
                                    '<div class="form-group">' . 
                                        form_label('Dano', 'damage') . form_input(array('name' => 'damage', 'id' => 'damage', 'value' => $weapon[0]->damage, 'placeholder' => 'Quantidade de dados', 'class' => 'form-control')) . 
                                    '</div>' .
                                    '<div class="form-group">' . 
                                        form_label('Faces', 'damage_amount') . form_input(array('name' => 'damage_amount', 'id' => 'damage_amount', 'value' => $weapon[0]->damage_amount, 'placeholder' => 'Quantidade faces do dado', 'class' => 'form-control')) . 
                                    '</div>' .
                                    form_submit(array('value' => 'Enviar', 'name' => 'btn_enviar', 'type' => 'submit', 'class' => 'btn btn-default pull-right')) .
                                    form_close();
                        ?>
                        
                    </div>
                
                </div>
                
            </div>
