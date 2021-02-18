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
    echo PHP_EOL;

    foreach ($aCharacters as $Character) {
        
        //sprintf() plus lisible mais plus lourd 
        /*echo sprintf(          
            '%s (%s) est en %s, %s',
                $Character['name'],
                $Character['type']['name'],
                $Character['position']['x'],
                $Character['position']['y'],
        );*/

        echo  substr($Character['name'], 0, 7);
        echo ': ' . '(' . $Character['type']['name'] . ') ';
        echo 'est en ' .  '[' . $Character['position']['x'] . ';' . $Character['position']['y'] . ']';
        echo  PHP_EOL .  PHP_EOL . 'Stats: ' . '[H:' . $Character['health'] . '] [S:' . $Character['strength'] . ']';
        if (isset($Character['magic'])) {
            echo ' [M:' . $Character['magic'] . ']';
        }

        echo PHP_EOL .  PHP_EOL .  PHP_EOL;
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
                echo ' [' . substr($aBoard[$y][$x]['name'], 0, 3) . '] ';
            } else {
                echo ' [' . $aBoard[$y][$x] . '] ';
            }
        }
        echo PHP_EOL . PHP_EOL;
    }
    echo PHP_EOL;
    return;
}


/**
 * buildCaracteristics
 *
 * @param  array $character (passage par REFERENCE de la variable)
 */
function buildCaracteristics(array &$character)
{

    //on peut créer une variable intermédiaire pour rendre le code qui suit plus lisible 
    $aTypeInfo = $character['type'];

    $character['health']  = rand($aTypeInfo['min_health'], $character['type']['max_health']);
    $character['strength']  = rand($aTypeInfo['min_strength'], $character['type']['max_strength']);
    if ($character['type'] == TYPE_WIZARD) {
        $character['magic']  = rand($aTypeInfo['min_magic'], $character['type']['max_magic']);
    }

    $character['position']['x'] = rand(0, SIZE_X - 1);
    $character['position']['y'] = rand(0, SIZE_Y - 1);    

}
