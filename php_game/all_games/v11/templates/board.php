<?php
$playing = $oGame->getCurrentPlayer();
echo '<h2 style="color: ' . $playing . ';">' . $playing . ' à toi de jouer !</h2>'; ?>
<div class="row justify-content-center">
    <?php $aAlph = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h']; ?>
    <div class="col-auto nb"></div>
    <?php foreach ($aAlph as $iA) : ?>
        <div class="col-auto letter"><?php echo  $iA; ?></div>
    <?php endforeach; ?>
</div>
<?php foreach ($oGame->getBoard() as $iY => $aLineY) : ?>
    <div class="row justify-content-center">
        <div class="col-auto nb"><?php echo count($aLineY) - $iY ?></div>
        <?php foreach ($aLineY as $iX => $mColX) :
            $bCellMovable = $aGameInfo && in_array([$iX, $iY], $aGameInfo['moves']);
        ?>
            <div class="col-auto cell border <?= $bCellMovable ? 'cell-movable' : ''; ?>"
            data-x="<?= $iX; ?>" data-y="<?= $iY; ?>">
                <?php
                if ($mColX instanceof \Model\Pawn) {
                    $bSelected = $aGameInfo && ($mColX === $aGameInfo['selected_pawn']);
                    echo '<span class="' . ($bSelected ? 'selected_pawn' : '') . '" 
                                style="color: ' . $mColX->getPlayer()->getTeam() . ';"
                              >';
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