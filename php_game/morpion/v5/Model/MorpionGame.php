<?php
namespace Model;

use Entity\Player;
final class MorpionGame
{

    public const PAWNS = ['O', 'X'];
    private const SIZE_X = 3;
    private const SIZE_Y = 3;

    private array $board;
    private array $players = [];

    /**
     * Create a board
     *
     * @return void
     */
    public function __construct()
    {
        $board = [];

        // -- Initialisation des lignes
        for ($y = 0; $y < self::SIZE_Y; $y++) {
            $board[$y] = [];

            // -- Initialisation des colonnes
            for ($x = 0; $x < self::SIZE_X; $x++) {
                $board[$y][$x] = ' ';
            }
        }

        $this->board = $board;
    }

    /**
     * Display the board
     * @param array $board
     *
     * @return void
     */
    public function displayBoard(): void
    {
        // -- Parcours des lignes
        for ($y = 0; $y < self::SIZE_Y; $y++) {
            // -- Parcours des colonnes
            for ($x = 0; $x < self::SIZE_X; $x++) {
                $mCell = $this->board[$y][$x];
                if ($mCell instanceof Player) {
                    echo '[' . $mCell->getPawn() . ']';
                } else {
                    echo '[' . $mCell . ']';
                }
            }
            echo PHP_EOL;
        }
        echo PHP_EOL;
    }

    /**
     * addPlayer
     *
     * @param  Player $oPlayer
     * @return void
     */
    public function addPlayer(Player $oPlayer): void
    {
        $this->players[] = $oPlayer;
    }

    /**
     * Vérifie si les coordonnées $x, $y sont valides
     *
     * @param  int $x
     * @param  int $y
     * @return bool
     */
    public function isValidXY(int $x, int $y): bool
    {
        return $x >= 0 && $x < self::SIZE_X && $y >= 0 && $y < self::SIZE_Y;
    }

    /**
     * @param  array $board
     * @return bool
     */
    public function isWin(): bool
    {
        // Rappel : $board[y][x] !!

        if (trim($this->board[0][0]) === trim($this->board[0][1])  && trim($this->board[0][1]) === trim($this->board[0][2]) && !empty(trim($this->board[0][0]))) {
            echo 'Victoire du joueur : ' . $this->board[0][0] . PHP_EOL . PHP_EOL;
            return true;
        }

        if (trim($this->board[1][0]) === trim($this->board[1][1]) && trim($this->board[1][1]) === trim($this->board[1][2]) && !empty(trim($this->board[1][1]))) {
            echo 'Victoire du joueur : ' . $this->board[1][1] . PHP_EOL . PHP_EOL;
            return true;
        }

        if (trim($this->board[2][0]) === trim($this->board[2][1]) && trim($this->board[2][1]) === trim($this->board[2][2]) && !empty(trim($this->board[2][1]))) {
            echo 'Victoire du joueur : ' . $this->board[2][2] . PHP_EOL . PHP_EOL;
            return true;
        }

        if (trim($this->board[0][0]) === trim($this->board[1][0]) && trim($this->board[1][0]) === trim($this->board[2][0]) && !empty(trim($this->board[2][0]))) {
            echo 'Victoire du joueur : ' . $this->board[0][0] . PHP_EOL . PHP_EOL;
            return true;
        }

        if (trim($this->board[0][1]) === trim($this->board[1][1]) && trim($this->board[1][1]) === trim($this->board[2][1]) && !empty(trim($this->board[2][1]))) {
            echo 'Victoire du joueur : ' . $this->board[1][0] . PHP_EOL . PHP_EOL;
            return true;
        }

        if (trim($this->board[0][2]) === trim($this->board[1][2]) && trim($this->board[1][2]) === trim($this->board[2][2]) && !empty(trim($this->board[2][2]))) {
            echo 'Victoire du joueur : ' . $this->board[0][2] . PHP_EOL . PHP_EOL;
            return true;
        }

        if (trim($this->board[2][0]) === trim($this->board[1][1]) && trim($this->board[1][1]) === trim($this->board[0][2]) && !empty(trim($this->board[0][2]))) {
            echo 'Victoire du joueur : ' . $this->board[0][2] . PHP_EOL . PHP_EOL;
            return true;
        }

        if (trim($this->board[0][0]) === trim($this->board[1][1]) && trim($this->board[1][1]) === trim($this->board[2][2]) && !empty(trim($this->board[2][2]))) {
            echo 'Victoire du joueur : ' . $this->board[0][0] . PHP_EOL . PHP_EOL;
            return true;
        }

        if (
            !empty(trim($this->board[0][0]))
            && !empty(trim($this->board[0][1]))
            && !empty(trim($this->board[0][2]))
            && !empty(trim($this->board[1][0]))
            && !empty(trim($this->board[1][1]))
            && !empty(trim($this->board[1][2]))
            && !empty(trim($this->board[2][0]))
            && !empty(trim($this->board[2][1]))
            && !empty(trim($this->board[2][2]))
        ) {
            echo "il n'y a plus de coups possible" . PHP_EOL;
            echo PHP_EOL . "==== END GAME ====" . PHP_EOL . PHP_EOL;
            return true;
        }

        return false;
    }

    /**
     * @param  int $x
     * @param  int $y
     * @return bool
     */
    public function isEmptyXY(int $x, int $y): bool
    {
        return empty(trim($this->board[$y][$x]));
    }

    /**
     * setXY
     *
     * @param  int $x
     * @param  int $y
     * @param  int $oPlayer
     * @return void
     */
    public function setXY(int $x, int $y, Player $oPlayer): void
    {
        $this->board[$y][$x] = $oPlayer;
    }

    /**
     * Get the value of aBoard
     */
    public function getBoard()
    {
        return $this->board;
    }

    /**
     * Set the value of aBoard
     *
     * @return  self
     */
    public function setBoard($board)
    {
        $this->board = $board;

        return $this;
    }

    /**
     * playRound
     *
     * @return bool
     */
    public function playRound(): bool
    {
        foreach ($this->getPlayers() as $oPlayer) {
            echo $oPlayer . ' à vous de jouer !' . PHP_EOL . PHP_EOL;

            do {
                // Obtenir les coordonnées saisies désirées par le joueur
                $sResponse = readline('>> Quelle case ? ') . PHP_EOL;
                list($x, $y) = explode(',',  $sResponse);
                $x = (int) $x;
                $y = (int) $y;

                // On teste si la case est vide ET si les coordonnées sont valides
                $bReplay = !$this->isValidXY($x, $y) || !$this->isEmptyXY($x, $y);
                if ($bReplay) {
                    echo 'Case déjà prise OU coordonnées invalides' . PHP_EOL;
                }
                // Condition de "reboucle" : pas valide ou pas vide
            } while ($bReplay);

            // On assigne le joueur/pion dans la case
            $this->setXY($x, $y, $oPlayer);

            // Affichage plateau après que le joueur est joué
            $this->displayBoard();

            // Il faut appeler isWin après le tour de chaque joueur pour arrêter la partie directement en cas de victoire
            $bWin = $this->isWin();
            if ($bWin) {
                break;
            }
        }
        
        return !$bWin;
    }

    /**
     * Get the value of Players
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * Set the value of Players
     *
     * @return  self
     */
    public function setPlayers($players)
    {
        $this->players = $players;

        return $this;
    }
}
