            <div id="menu">
                <div class="btn-group pull-right" role="group" aria-label="...">
                    <?php
                        foreach ($menu as $item):
                            echo anchor(base_url($item['base_url']), '<span class="'.$item['span_class'].'" aria-hidden="true"></span> '.$item['name'], $item['others']);
                        endforeach;
                    ?>
                </div>
                
                <h1>
                    <?= anchor(base_url('..'), 'Batalha Medieval', array('title' => 'Home Page')); ?>
                </h1>
            </div>