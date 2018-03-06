            <div id="body">
                
                <div class="row">
                    
                    <div class="col-lg-6">
                        <h2>Detalhes sobre a arma: <?= $weapon[0]->name ?></h2>

                        <ul>
                            <li>Nome completo: <b><?= $weapon[0]->name ?></b></li>
                            <li>Tipo / Modelo: <b><?= $weapon[0]->type ?></b></li>
                            <li>Força de ataque: <b><?= $weapon[0]->attack ?></b></li>
                            <li>Força de defesa: <b><?= $weapon[0]->defense ?></b></li>
                            <li>Faces de dano: <b><?= $weapon[0]->damage.'d'.$weapon[0]->damage_amount ?></b></li>
                        </ul>
                        
                    </div>
                
                </div>
                
            </div>
