<?php
$oCharacter = $oPlayer->getCharacter();

$fPercent = ($oCharacter->getHealth() / $oCharacter->getMaxHealth()) * 100;
$sClassPlayer = getColorClass($fPercent);
?>
<div class="card">
    <div class="card-header">
        <p class="fs-3 m-0"><?= $oCharacter; ?> <?= $oCharacter->getName(); ?></p>
        <p><?= $oCharacter::TYPE ?></p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <p class="fw-bold m-0">Santé</p>
                <div class="progress">
                    <div class="progress-bar <?= $sClassPlayer; ?> progress-bar-striped" role="progressbar" style="width:<?= $fPercent; ?>%" aria-valuenow="<?= $oCharacter->getHealth(); ?>" aria-valuemin="0" aria-valuemax="<?= $oCharacter->getMaxHealth(); ?>"></div>
                </div>
                <p class="fst-italic"><?= $oCharacter->getHealth(); ?> points de vie</p>
            </li>
            <li class="list-group-item">
                <p class="fw-bold m-0">Force</p>
                <div class="progress">
                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width:100%" aria-valuenow="<?= $oCharacter->getStrength(); ?>" aria-valuemin="0" aria-valuemax="<?= $oCharacter->getStrength(); ?>"></div>
                </div>
                <p class="fst-italic"><?= $oCharacter->getStrength(); ?> points de force</p>
            </li>
            <?php if ($oCharacter instanceof Model\Wizard) : ?>
                <li class="list-group-item">
                    <p class="fw-bold m-0">Magie</p>
                    <div class="progress">
                        <div class="progress-bar bg-info progress-bar-striped" role="progressbar" style="width: 100%" aria-valuenow="<?= $oCharacter->getMagic(); ?>" aria-valuemin="0" aria-valuemax="<?= $oCharacter->getMagic(); ?>"></div>
                    </div>
                    <p class="fst-italic"><?= $oCharacter->getMagic(); ?> points de mana</p>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php
foreach ($oGame->getBoard() as $iY => $aLineY) : ?>
    <div class="row justify-content-center">
        <?php foreach ($aLineY as $iX => $mColX) :
            $bCellMovable = isset($aGameInfo['moves']) && in_array([$iX, $iY], $aGameInfo['moves']);
        ?>
            <div class="col-auto border text-center cell <?= $bCellMovable ? 'movable-cell' : ''; ?>" data-x="<?= $iX; ?>" data-y="<?= $iY; ?>">
                <?php
                if ($mColX instanceof \Model\Pawn) {
                    echo '<span class="player ' . $sClassPlayer . '">' . $mColX . '</span>';
                } elseif ($mColX instanceof \Model\Monster) {
                    $fPercentMonster = ($mColX->getHealth() / $mColX->getMaxHealth()) * 100;
                    $sClassMonster = getColorClass($fPercentMonster);
                    echo '<span class="monster ' . $sClassMonster . '">' . $mColX . '</span>';
                } else {
                    echo $mColX;
                }
                ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>