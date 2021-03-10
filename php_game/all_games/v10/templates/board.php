<?php foreach ($oGame->getBoard() as $iY => $aLineY) : ?>
    <div class="flex justify-content-center">
        <?php foreach ($aLineY as $iX => $mColX) : ?>
            <div class="col-auto cell" 
                data-x="<?= $iX; ?>" 
                data-y="<?= $iY; ?>">
                <?php
                    if ($mColX instanceof \Model\Pawn) {
                        $sClass = '';
                        if ($aGameInfos && ($mColX === $aGameInfos['selected_pawn'])) {
                            $sClass = 'selected_pawn';
                        }
                        echo '<span 
                        class = "' . $sClass .'"
                        style="color: '. $mColX->getPlayer()->getTeam() .' ">';
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