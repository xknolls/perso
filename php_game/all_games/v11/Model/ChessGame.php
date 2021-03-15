<?php
namespace Model;

// On aurait pu simplifier le code
//use \Entity\Player;

/**
 * Le but de la classe ChessGame est de centraliser au maximum tout ce qui concerne le jeu "Chess"
 * (dont le plateau de jeu)
 * final = empêche l'héritage de la classe (non obligatoire)
 */
final class ChessGame extends AbstractGame
{
    // On précise les équipes
    public const TEAMS = ['White', 'Grey'];

    // On précise les dimensions
    protected const SIZE_X = 8;
    protected const SIZE_Y = 8;

    /** @var Pawn|null */
    protected ?Pawn $selectedPawn = null;

    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * @param \Entity\Player $oPlayer
     *
     * @return void
     */
    protected function playerAction (\Entity\Player $oPlayer) : void 
    {
        // Joueur, quel pion veux-tu déplacer ? (ex : 1,1)
        do {
            list($x, $y) = explode(',', readline('Quel pion ? '));

            // TEST : coordonnées valides ? case non vide? pion de la bonne couleur ?
            $bReplay = !$this->isValidXY($x, $y) 
                            || $this->isEmptyXY($x, $y) 
                            || ($this->board[$y][$x]->getPlayer() !== $oPlayer);
            if ($bReplay) {
                echo 'Case vide OU coordonnées invalides'.PHP_EOL;
            }
        } while ($bReplay);

        // Joueur, où veux-tu le déplacer ? (ex : 1,2)
        do {
            list($newX, $newY) = explode(',', readline('Quelle destination ? '));

            // TEST : coordonnées valides ?
            $bReplay = !$this->isValidXY($newX, $newY);
            if ($bReplay) {
                echo 'Coordonnées invalides'.PHP_EOL;
            }
        } while ($bReplay);

        // Tout est OK, on effectue le déplacement
        // 1. Je récupère le pion en $x, $y
        $oPawn = $this->board[$y][$x];
        // 2. Je le duplique dans $newX, $newY
        $this->setXY($newX, $newY, $oPawn);
        // 3. On l'efface dans $x, $y
        $this->board[$y][$x] = ' ';
    }
    
    /**
     * @param int $x
     * @param int $y
     *
     * @return bool
     */
    public function selectCell (int $x, $y) : array
    {
        $aData = [
            'selected_pawn' => $this->selectedPawn,
            'current_player' => $this->currentPlayer,   
            'is_win' => $this->isWin(),
            'moves' => [],
        ];

        // Coordonnées invalides, on sort
        if (!$this->isValidXY($x, $y)) {
            return $aData;
        }

        
        
    $oPawn = $this->board[$y][$x];
    // Est-ce que je sélectionne un pion ?
    if ($oPawn instanceof Pawn) {
            // Est-ce que je sélectionne un pion à moi ?
            if ($oPawn->getPlayer() === $this->currentPlayer) {
                $this->selectedPawn = $oPawn;
                
                $aData['selected_pawn'] = $this->selectedPawn;
                $aData['moves']= $this->selectedPawn->getMoves();
                
                return $aData;
            }
        }

        // Est-ce que je déplace un pion ?
        if ($this->selectedPawn && !($oPawn instanceof Pawn)) {
            // Mémoriser la case de départ
            $aPosInit = $this->selectedPawn->getPosition();

            // Déplacer le pion
            $this->setXY($x, $y, $this->selectedPawn);
            $this->selectedPawn->setPosition($x, $y);
                        
            // Effacer l'ancienne case
            $this->board[ $aPosInit[ 'y' ] ][ $aPosInit[ 'x' ] ] = ' ';
            $this->selectedPawn = null;

                                    
            // Joueur suivant !
            $this->nextPlayer();

            return $aData;
        }

        return $aData;
    }

    protected function isWin () : bool 
    {
        // TODO
        
        return false;
    }

    public function fillBoard() : void
    {
        // Others pawns
        $aLines = [
            0 => $this->players[1],
            7 => $this->players[0],
        ];
        foreach ($aLines as $i => $oPlayer) {
            $this->board[$i][0] = (new Chess\Rook())->setPlayer( $oPlayer )->setPosition(0, $i);
            $this->board[$i][1] = (new Chess\Knight())->setPlayer( $oPlayer )->setPosition(1, $i);
            $this->board[$i][2] = (new Chess\Bishop())->setPlayer( $oPlayer )->setPosition(2, $i);
            $this->board[$i][3] = (new Chess\Queen())->setPlayer( $oPlayer )->setPosition(3, $i);
            $this->board[$i][4] = (new Chess\King())->setPlayer( $oPlayer )->setPosition(4, $i);
            $this->board[$i][5] = (new Chess\Bishop())->setPlayer( $oPlayer )->setPosition(5, $i);
            $this->board[$i][6] = (new Chess\Knight())->setPlayer( $oPlayer )->setPosition(6, $i);
            $this->board[$i][7] = (new Chess\Rook())->setPlayer( $oPlayer )->setPosition(7, $i); 
        }

        // Peons
        for ($i = 0 ; $i < self::SIZE_X ; $i++) {
            $this->board[1][$i] = (new Chess\Peon())->setPlayer( $this->players[1] )->setPosition($i, 1);
            $this->board[6][$i] = (new Chess\Peon())->setPlayer( $this->players[0] )->setPosition($i, 6);
        }

        // On défini le premier joueur
        $this->currentPlayer = $this->players[0];
    }

    /**
     * Solution optimisée qui défini les coordonnées pour chaque type de pion
     * Mais la version 3 est meilleure (plus optimisée)
     */
    private function fillBoardVersion2() : void
    {
        $aRocks = [ [0,0], [0,7], [7,0], [7,7]  ];
        foreach ($aRocks as $aCoords) {
            $this->board[ $aCoords[0] ][ $aCoords[1] ] = new Chess\Rook();
        }

        $aQueens = [ [0,3], [7,3] ];
        foreach ($aRocks as $aCoords) {
            $this->board[ $aCoords[0] ][ $aCoords[1] ] = new Chess\Rook();
        }

        // ...
    }

    /**
     * Solution optimisée (++) qui défini les coordonnées pour chaque type de pion
     */
    private function fillBoardVersion3() : void
    {
        $aPawns = [
            Chess\Rook::class => [ [0,0], [0,7], [7,0], [7,7]  ],
            Chess\Queen::class => [ [0,3], [7,3]  ],
            // ...
        ];
        foreach ($aPawns as $sClass => $aListCoords) {
            foreach ($aListCoords as $aCoords) {
                $this->board[ $aCoords[0] ][ $aCoords[1] ] = new $sClass();
            }
        }
    }
}