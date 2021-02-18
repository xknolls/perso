<?php



/**
 * createBoard
 *
 * @return array
 */
function createBoard(): array
{
    $aBoard = [];

    for ($y = 0; $y < SIZE_Y; $y++) {
        $aBoard[$y] = [];
        for ($x = 0; $x < SIZE_X; $x++) {
            $aBoard[$y][$x] = $x . ';' . $y;
        }
    }

    return $aBoard;
}


/**
 * display_board
 *
 * @param  array $aBoard
 * @return void
 */
function displayBoard(array $aBoard): void
{
    for ($y = 0; $y < SIZE_Y; $y++) {
        for ($x = 0; $x < SIZE_X; $x++) {
            echo ' [   ] ';
        }
        echo PHP_EOL . PHP_EOL;
    }
    echo PHP_EOL;

    return;
}
