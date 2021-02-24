<?php
/**
 * Create a board
 *
 * @return array
 */
function createBoard(): array
{
  $board = [];

  // -- Initialisation des lignes
  for ($y = 0 ; $y < SIZE_Y ; $y++) {
      $board[ $y ] = [];

      // -- Initialisation des colonnes
      for ($x = 0 ; $x < SIZE_X ; $x++) {
          $board[ $y ][ $x ] = ' ';
      }
  }

  return $board;
}


/**
 * Display the board
 * @param array $board
 *
 * @return void
 */
function displayBoard(array $board): void
{
    // -- Parcours des lignes
    for ($y = 0; $y < SIZE_Y; $y++) {
        // -- Parcours des colonnes
        for ($x = 0; $x < SIZE_X; $x++) {
            echo '['. $board[$y][$x] .']';
        }
        echo PHP_EOL;
    }
    echo PHP_EOL;
}

/**
 * Vérifie si les coordonnées $x, $y sont valides
 *
 * @param  int $x
 * @param  int $y
 * @return bool
 */
function isValidXY (int $x, int $y) : bool
{
    return $x >= 0 && $x < SIZE_X && $y >= 0 && $x < SIZE_Y;

    /*if (($x >= 0) && ($x < SIZE_X) && ($y >= 0) && ($x < SIZE_Y)) {
        return true;
    } else {
        return false;
    }*/
}

/**
 * @param  array $board
 * @return bool
 */
function isWin (array $aBoard) : bool
{
    // Rappel : $board[y][x] !!

    if (trim($aBoard[0][0]) === trim($aBoard[0][1])  && trim($aBoard[0][1]) === trim($aBoard[0][2]) && !empty(trim($aBoard[0][0]))) {
        echo 'Victoire du joueur : ' . $aBoard[0][0] . PHP_EOL;
        return true;
    }

    if (trim($aBoard[1][0]) === trim($aBoard[1][1]) && trim($aBoard[1][1]) === trim($aBoard[1][2]) && !empty(trim($aBoard[1][1]))) {
        echo 'Victoire du joueur : ' . $aBoard[1][1] . PHP_EOL;
        return true;
    }

    if (trim($aBoard[2][0]) === trim($aBoard[2][1]) && trim($aBoard[2][1]) === trim($aBoard[2][2]) && !empty(trim($aBoard[2][1]))) {
        echo 'Victoire du joueur : ' . $aBoard[2][2] . PHP_EOL;
        return true;
    }

    if (trim($aBoard[0][0]) === trim($aBoard[1][0]) && trim($aBoard[1][0]) === trim($aBoard[2][0]) && !empty(trim($aBoard[2][0]))) {
        echo 'Victoire du joueur : ' . $aBoard[0][0] . PHP_EOL;
        return true;
    }

    if (trim($aBoard[0][1]) === trim($aBoard[1][1]) && trim($aBoard[1][1]) === trim($aBoard[2][1]) && !empty(trim($aBoard[2][1]))) {
        echo 'Victoire du joueur : ' . $aBoard[1][0] . PHP_EOL;
        return true;
    }

    if (trim($aBoard[0][2]) === trim($aBoard[1][2]) && trim($aBoard[1][2]) === trim($aBoard[2][2]) && !empty(trim($aBoard[2][2]))) {
        echo 'Victoire du joueur : ' . $aBoard[0][2] . PHP_EOL;
        return true;
    }

    if (trim($aBoard[2][0]) === trim($aBoard[1][1]) && trim($aBoard[1][1]) === trim($aBoard[0][2]) && !empty(trim($aBoard[0][2]))) {
        echo 'Victoire du joueur : ' . $aBoard[0][2] . PHP_EOL;
        return true;
    }

    if (trim($aBoard[0][0]) === trim($aBoard[1][1]) && trim($aBoard[1][1]) === trim($aBoard[2][2]) && !empty(trim($aBoard[2][2]))) {
        echo 'Victoire du joueur : ' . $aBoard[0][0] . PHP_EOL;
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