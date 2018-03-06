            <div id="body">
                
                <div class="row">
                    
                    <div class="col-lg-6">
                        <h2>Detalhes sobre: <?= $character[0]->name ?></h2>

                        <ul>
                            <li>Nome completo: <b><?= $character[0]->name ?></b></li>
                            <li>Tipo / Espécie: <b><?= $character[0]->type ?></b></li>
                            <li>Pontos de vida: <b><?= $character[0]->health ?></b></li>
                            <li>Força: <b><?= $character[0]->power ?></b></li>
                            <li>Agilidade: <b><?= $character[0]->agility ?></b></li>
                            <li>Arma principal: <b><?= $character[0]->weapon_type ?></b></li>
                            <li>Nome da arma: <b><?= $character[0]->weapon_name ?></b></li>
                            <li>Poder de ataque da arma: <b><?= $character[0]->weapon_attack ?></b></li>
                            <li>Poder de defesa da arma: <b><?= $character[0]->weapon_defense ?></b></li>
                            <li>Faces de dano: <b><?= $character[0]->weapon_damage.'d'.$character[0]->weapon_damage_amount ?></b></li>
                        </ul>
                        
                    </div>
                
                </div>
                
            </div>
