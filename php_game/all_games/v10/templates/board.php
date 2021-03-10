<?php foreach ($oGame->getBoard() as $iY => $aLineY) : ?>
    <div class="row justify-content-center">
        <?php foreach ($aLineY as $iX => $mColX) : ?>
            <div class="col-auto border cell" 
                data-x="<?= $iX; ?>" 
                data-y="<?= $iY; ?>">
                <?php
                    if ($mColX instanceof \Model\Pawn) {
                        echo '<span style="color: '. $mColX->getPlayer()->getTeam() .' ">';
                    } 

                    echo $mColX;

                    if ($mColX instanceof \Model\Pawn) {
                        echo '</span>';
                    }
                
                ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>