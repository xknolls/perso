<?php
namespace Model;
// On aurait pu simplifier le code
//use \Entity\Player;

/**
 * Le but de la classe MorpionMorpionGame est de centraliser au maximum tout ce qui concerne le jeu
 * (dont le plateau de jeu)
 * final = empêche l'héritage de la classe (non obligatoire)
 */
final class MorpionGame
{
    // On défini les pions directement au sein de MorpionGame
    public const TEAMS = ['X', 'O'];

    // On défini les dimensions directement au sein de MorpionGame
    private const SIZE_X = 3;
    private const SIZE_Y = 3;

    /** @var array */
    private $board = [];

    /** @var array */
    private $players = [];

    /**
     * __construct est appellée automatiquement lors de l'instanciation de l'objet (= new)
     */
    public function __construct()
    {
        $this->createBoard(); 
    }
    
    /**
     * playRound
     *
     * @return bool
     */
    public function playRound() : bool 
    {
        foreach ($this->getPlayers() as $oPlayer) {
            echo $oPlayer.' à vous de jouer !' . PHP_EOL;
        
            do {
                // Obtenir les coordonnées saisies désirées par le joueur
                // readline permet de récupérer une saisie utilisateur
                // explode : permet de scinder une chaîne de caractère en un tableau (plusieurs morceaux)
                $sResponse = readline('>> Quelle case ? ');  
                list($x, $y) = explode(',',  $sResponse);
        
                // On teste si la case est vide ET si les coordonnées sont valides
                $bReplay = !$this->isValidXY($x, $y) || !$this->isEmptyXY($x, $y);
                if ($bReplay) {
                echo 'Case déjà prise OU coordonnées invalides'.PHP_EOL;
                }
                // Condition de "reboucle" : pas valide ou pas vide
            } while ($bReplay);
        
            // On assigne le joueur/pion dans la case
            $oPawn = (new Pawn())
                -> setPlayer($oPlayer)
                -> setSymbol($oPlayer->getTeam());
            $this->setXY($x, $y, $oPawn);
        
            // Affichage plateau après que le joueur est joué
            $this->displayBoard();
        
            // Il faut appeler isWin après le tour de chaque joueur pour arrêter la partie directement en cas de victoire
            $bWin = $this->isWin();
            if ($bWin) {
                break;
            }
        }

        // On retourne la condition de "Peut-on rejouer ?"
        return !$bWin;
    }
        
    /**
     * @param  Player $player
     * @return void
     */
    public function addPlayer(\Entity\Player $player) : void
    {
        $this->players[] = $player;
    }
    
    /**
     * trim = supprime les espaces présents
     * @param  int $x
     * @param  int $y
     * @return bool
     */
    public function isEmptyXY(int $x, int $y) : bool
    {
        return empty(trim($this->board[$y][$x]));
    }

    /**
     * Vérifie si les coordonnées $x, $y sont valides
     *
     * @param  int $x
     * @param  int $y
     * @return bool
     */
    function isValidXY(int $x, int $y) : bool
    {
        return $x >= 0 && $x < self::SIZE_X && $y >= 0 && $y < self::SIZE_Y;
    }

    /**
     * Vérifie si les coordonnées $x, $y sont valides
     *
     * @param  int $x
     * @param  int $y
     * @param  Pawn $oPawn
     * @return void
     */
    function setXY(int $x, int $y, Pawn $oPawn) : void
    {
        $this->board[$y][$x] = $oPawn;
    }

    /**
     * @return bool
     */
    function isWin() : bool
    {
        // Rappel : $board[y][x] !!

        $bLine1 = $this->checkWin ([[0,0], [0,1], [0,2] ]);
        $bLine2 = $this->checkWin ([[1,0], [1,1], [0,2] ]);
        $bLine3 = $this->checkWin ([[2,0], [1,2], [2,2] ]);

        
        $bCol1 = $this->checkWin ([[0,0], [0,1], [0,2] ]);
        $bCol2 = $this->checkWin ([[1,0], [1,1], [0,2] ]);
        $bCol3 = $this->checkWin ([[2,0], [1,2], [2,2] ]);

        if ($bLine1) {
            echo 'Victoire de '. $this->board[0][0]. PHP_EOL;
            return true;
        }

        if ($bLine2) {
            echo 'Victoire de '. $this->board[1][0]. PHP_EOL;
            return true;
        }

        if ($bLine3) {
            echo 'Victoire de '. $this->board[2][0]. PHP_EOL;
            return true;
        }

        if ($bCol1) {
            echo 'Victoire de '. $this->board[0][0]. PHP_EOL;
            return true;
        };

        if ($bCol2) {
            echo 'Victoire de '. $this->board[0][1]. PHP_EOL;
            return true;
        };

        if ($bCol3) {
            echo 'Victoire de '. $this->board[0][2]. PHP_EOL;
            return true;
        };

        $bDiaLR = !empty(trim($this->board[0][0])) && ($this->board[0][0] == $this->board[1][1]) && ($this->board[1][1] == $this->board[2][2]);
        if ($bDiaLR) {
            echo 'Victoire de '. $this->board[0][0]. PHP_EOL;
            return true;
        };
        $bDiaRL = !empty(trim($this->board[0][2])) && ($this->board[0][2] == $this->board[1][1]) && ($this->board[1][1] == $this->board[2][0]);
        if ($bDiaRL) {
            echo 'Victoire de '. $this->board[0][2] . PHP_EOL;
            return true;
        };
        
        $bTie = !empty(trim($this->board[0][0])) && !empty(trim($this->board[0][1])) && !empty(trim($this->board[0][2]))
                && !empty(trim($this->board[1][0])) && !empty(trim($this->board[1][1])) && !empty(trim($this->board[1][2]))
                && !empty(trim($this->board[2][0])) && !empty(trim($this->board[2][1])) && !empty(trim($this->board[2][2]));
        if ($bTie) {
            echo 'Match nul ! :\'('. PHP_EOL;
            return true;
        };

        return false;
    }
    
    /**
     * chckWin
     *
     * @param  array $aListCoords
     * @return bool
     */
    private function chckWin(array $aListCoords):bool
    {
        return !empty(trim($this->board[ $aListCoords[0][0] ][ $aListCoords[0][1] ]))
                && ($this->board[ $aListCoords[0][0] ][ $aListCoords[0][1] ] == $this->board[ $aListCoords[1][0] ][ $aListCoords[1][1] ])
                && ($this->board[0][0] == $this->board[0][2])
            ;
    }

    /**
     * Display the board
     *
     * @return void
     */
    public function displayBoard(): void
    {
        // -- Parcours des lignes
        for ($y = 0; $y < self::SIZE_Y; $y++) {
            // -- Parcours des colonnes
            for ($x = 0; $x < self::SIZE_X; $x++) {
                // Variable intermédiaire pour alléger le code
                $mCell = $this->board[$y][$x];

                // instanceof = est une instance de (= est un objet de la classe)
                if ($mCell instanceof \Entity\Player) {
                    echo '['. $mCell->getSymbol() .']';
                } else {
                    echo '['. $mCell .']';
                }
            }
            echo PHP_EOL;
        }
        echo PHP_EOL;
    }

    /**
     * Create a board
     *
     * @return array
     */
    private function createBoard(): void
    {
        $board = [];

        // -- Initialisation des lignes
        for ($y = 0 ; $y < self::SIZE_Y ; $y++) {
            $board[ $y ] = [];

            // -- Initialisation des colonnes
            for ($x = 0 ; $x < self::SIZE_X ; $x++) {
                $board[ $y ][ $x ] = ' ';
            }
        }

        $this->board = $board;
    }


    /**
     * Get the value of board
     */ 
    public function getBoard()
    {
        return $this->board;
    }

    /**
     * Set the value of board
     *
     * @return  self
     */ 
    public function setBoard($board)
    {
        $this->board = $board;

        return $this;
    }

    /**
     * Get the value of players
     */ 
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * Set the value of players
     *
     * @return  self
     */ 
    public function setPlayers($players)
    {
        $this->players = $players;

        return $this;
    }
}