<div id="body">
    <div class="row">
        <div class="col-lg-6">
            <?php
                echo heading('Adicionar novo armamento:', 2);
                
                $attr = array('name' => 'form_add_weapon', 'id' => 'form_add_weapon');

                echo form_open(base_url('battle/addweapon'), $attr) . 
                        '<div class="form-group">' . 
                            form_label('Nome do armamento', 'name') . form_input(array('name' => 'name', 'id' => 'name', 'placeholder' => 'Nome', 'class' => 'form-control', 'maxlength' => 20)) . 
                        '</div>' .
                        '<div class="form-group">' . 
                            form_label('Tipo de armamento', 'type') . form_input(array('name' => 'type', 'id' => 'type', 'placeholder' => 'Tipo', 'class' => 'form-control', 'maxlength' => 20)) . 
                        '</div>' .
                        '<div class="form-group">' . 
                            form_label('Força de ataque', 'attack') . form_input(array('name' => 'attack', 'id' => 'attack', 'placeholder' => 'Força', 'class' => 'form-control', 'maxlength' => 3)) . 
                        '</div>' .
                        '<div class="form-group">' . 
                            form_label('Força de defesa', 'defense') . form_input(array('name' => 'defense', 'id' => 'defense', 'placeholder' => 'Defesa', 'class' => 'form-control', 'maxlength' => 3)) . 
                        '</div>' .
                        '<div class="form-group">' . 
                            form_label('Dano', 'damage') . form_input(array('name' => 'damage', 'id' => 'damage', 'placeholder' => 'Quantidade de dados', 'class' => 'form-control', 'maxlength' => 3)) . 
                        '</div>' .
                        '<div class="form-group">' . 
                            form_label('Faces', 'damage_amount') . form_input(array('name' => 'damage_amount', 'id' => 'damage_amount', 'placeholder' => 'Quantidade faces do dado', 'class' => 'form-control', 'maxlength' => 3)) . 
                        '</div>' .
                        form_submit(array('value' => 'Enviar', 'name' => 'btn_enviar', 'type' => 'submit', 'class' => 'btn btn-default pull-right')) .
                        form_close();
            ?>

        </div>

    </div>

</div>
