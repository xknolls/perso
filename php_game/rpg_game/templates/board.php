<?php 
foreach ($oGame->getBoard() as $iY => $aLineY) : ?>

    <div class="row justify-content-center">
        <?php foreach ($aLineY as $iX => $mColX) : 
            $bCellMov =  isset($aGameInfo['moves']) && in_array([$iX,$iY], $aGameInfo['moves']);
            ?>
        
            <div class="col-auto border text-center cell <?= $bCellMov ? 'cell-selected' : '' ?>" data-x="<?= $iX; ?>" data-y="<?= $iY; ?>">
                <?php
                if ($mColX instanceof \Model\Pawn) {
                    echo '<span class="player">' . $mColX . '</span>';
                }
                elseif ($mColX instanceof \Model\Zombie) {
                    echo '<span class="monster">' .  $mColX . '</span>';
                } else {
                    echo $mColX;
                }
                ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>

