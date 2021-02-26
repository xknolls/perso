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
            $aBoard[$y][$x] = ' ';
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
            echo ' ['. $aBoard[$y][$x] .'] ';
        }
        echo PHP_EOL . PHP_EOL;
    }
    echo PHP_EOL;

    return;
}

/*function testValue(): bool
{
    $x >= 0 && $x < SIZE_X && $y >= 0 && $y < SIZE_X;
}*/