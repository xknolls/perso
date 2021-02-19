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

/**
 * testValue of $x and $y
 *
 * @param  string $x
 * @param  string $y
 * 
 * @return bool
 */
function testValue($x, $y): bool
{
    return ($x >= 0 && $x < SIZE_X && $y >= 0 && $y < SIZE_X);

}

/**
 * endGame
 * 
 * @param array $aBoard
 *
 * @return bool
 */
function endGame($aBoard): bool
{
    /* Tester toutes les combinaisons pour lesquelles il y a un alignement de 3 X ou 3 O
       Tester également si toutes les cases on était remplis

       ... ... ...    ... ... ...    X   X   X

       ... ... ...     X   X   X    ... ... ...

        X   X   X     ... ... ...   ... ... ...



        X  ... ...    ...  X  ...   ... ...  X

        X  ... ...    ...  X  ...   ... ...  X

        X  ... ...    ...  X  ...   ... ...  X




        X  ... ...    ... ...  X 

       ...  X  ...    ...  X  ...

       ... ...  X      X  ... ...




       ... ... ...    ... ... ...    O   O   O

       ... ... ...     O   O   O    ... ... ...

        O   O   O     ... ... ...   ... ... ...



        O  ... ...    ...  O  ...   ... ...  O

        O  ... ...    ...  O  ...   ... ...  O

        O  ... ...    ...  O  ...   ... ...  O




        O  ... ...    ... ...  O 

       ...  O  ...    ...  O  ...

       ... ...  O      O  ... ...

    */

    if (trim($aBoard[0][0]) === trim($aBoard[0][1])  && trim($aBoard[0][1]) === trim($aBoard[0][2]) && !empty(trim($aBoard[0][0]))) {
        echo "Victoire du joueur : " . $aBoard[0][0] . PHP_EOL;
        return true;
    }

    if (trim($aBoard[1][0]) === trim($aBoard[1][1]) && trim($aBoard[1][1]) === trim($aBoard[1][2]) && !empty(trim($aBoard[1][1]))) {
        echo "Victoire du joueur : " . $aBoard[1][1] . PHP_EOL;
        return true;
    }

    if (trim($aBoard[2][0]) === trim($aBoard[2][1]) && trim($aBoard[2][1]) === trim($aBoard[2][2]) && !empty(trim($aBoard[2][1]))) {
        echo "Victoire du joueur : " . $aBoard[2][2] . PHP_EOL;
        return true;
    }

    if (trim($aBoard[0][0]) === trim($aBoard[1][0]) && trim($aBoard[1][0]) === trim($aBoard[2][0]) && !empty(trim($aBoard[2][0]))) {
        echo "Victoire du joueur : " . $aBoard[0][0] . PHP_EOL;
        return true;
    }

    if (trim($aBoard[1][0]) === trim($aBoard[1][1]) && trim($aBoard[1][1]) === trim($aBoard[2][1]) && !empty(trim($aBoard[2][1]))) {
        echo "Victoire du joueur : " . $aBoard[1][0] . PHP_EOL;
        return true;
    }

    if (trim($aBoard[0][2]) === trim($aBoard[1][2]) && trim($aBoard[1][2]) === trim($aBoard[2][2]) && !empty(trim($aBoard[2][2]))) {
        echo "Victoire du joueur : " . $aBoard[0][2] . PHP_EOL;
        return true;
    }

    if (trim($aBoard[2][0]) === trim($aBoard[1][1]) && trim($aBoard[1][1]) === trim($aBoard[0][2]) && !empty(trim($aBoard[0][2]))) {
        echo "Victoire du joueur : " . $aBoard[0][2] . PHP_EOL;
        return true;
    }

    if (trim($aBoard[0][0]) === trim($aBoard[1][1]) && trim($aBoard[1][1]) === trim($aBoard[2][2]) && !empty(trim($aBoard[2][2]))) {
        echo "Victoire du joueur : " . $aBoard[0][0] . PHP_EOL;
        return true;
    }
    
    if 
    ( 
        !empty(trim($aBoard[0][0])) 
        && !empty(trim($aBoard[0][1])) 
        && !empty(trim($aBoard[0][2])) 
        && !empty(trim($aBoard[1][0]))
        && !empty(trim($aBoard[1][1]))
        && !empty(trim($aBoard[1][2]))
        && !empty(trim($aBoard[2][0]))
        && !empty(trim($aBoard[2][1]))
        && !empty(trim($aBoard[2][2]))) {
        echo "il n'y a plus de coups possible" . PHP_EOL; 
        echo PHP_EOL . "==== END GAME ====" . PHP_EOL . PHP_EOL;
        return true;
    }

    return false;

}