<?php


/**
 * display_players
 *
 * @param  array $aCharacters
 * @return void
 */
function display_players(array $aCharacters): void
{
    echo '====Players====' . PHP_EOL;

    foreach ($aCharacters as $Character) {
        echo  substr($Character['name'], 0, 7) . ': [H:' . $Character['health'] . '] [S:' . $Character['strength'] . ']';
        if (isset($Character['magic'])) {
            echo ' [M:' . $Character['magic'] . ']';
        }

        echo PHP_EOL .  PHP_EOL;
    }
    return;
}

/**
 * display_board
 *
 * @param  array $aBoard
 * @return void
 */
function display_board(array $aBoard): void
{
    for ($y = 0; $y < SIZE_Y; $y++) {

        for ($x = 0; $x < SIZE_X; $x++) {
            if (is_array($aBoard[$y][$x])) {
                echo ' [' . substr($aBoard[$y][$x]['name'], 0, 7) . '] ';
            } else {
                echo ' [' . $aBoard[$y][$x] . '] ';
            }
        }
        echo PHP_EOL . PHP_EOL;
    }
    echo PHP_EOL;
    return;
}
