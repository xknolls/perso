<?php
    foreach ( $oGame->getBoard() as $iY => $aLineY ): ?>
    <div class="row justify-content-center">
        <?php foreach ( $aLineY as $iX => $mColX ):
            $bCellMovable = $aGameInfo && in_array([$iX, $iY], $aGameInfo['moves']);            
            ?>
            <div class="col-auto border text-center cell <?= $bCellMovable ? 'movable-cell' : ''; ?>" 
                 data-x="<?= $iX; ?>" data-y="<?= $iY; ?>">
                <?php
                    if ($mColX instanceof \Model\Pawn) {
                        $bSelected = false;
                        echo '<span class="'. ($bSelected ? 'selected-pawn' : '') .'">';
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