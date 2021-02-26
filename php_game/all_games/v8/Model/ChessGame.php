<?php 

namespace Model;

final class ChessGame extends AbstractGame
{
    // On précises les équipes
    public const TEAMS = ['White', 'Black'];

    // On précise les dimessions
    protected const SIZE_X = 8;
    protected const SIZE_Y = 8;

    public function __construct()
    {
        parent::__construct();
        $this->fillboard();
    }

    private function fillBoard(): void
    {
        for ($i = 0 ; $i < self::SIZE_X ; $i++) {
            $this->board[1][$i] = new Chess\Peon();
            $this->board[6][$i] = new Chess\Peon();
        }

        $aRook = [[0,0], [7,0], [0,7], [7,7],];
        foreach($aRook as $rook) {
            $this->board[$rook[0]][$rook[1]] = new Chess\Rook();
        }

        $aKnight = [[0,1], [0,6], [7,1], [7,6],];
        foreach($aKnight as $Knight) {
            $this->board[$Knight[0]][$Knight[1]] = new Chess\Knight();
        }

        $aBishop = [[0,2], [0,5], [7,2], [7,5],];
        foreach($aBishop as $Bishop) {
            $this->board[$Bishop[0]][$Bishop[1]] = new Chess\Bishop();
        }

        $this->board[0][3] = new Chess\Queen();
        $this->board[7][3] = new Chess\Queen();
        $this->board[0][4] = new Chess\King();
        $this->board[7][4] = new Chess\King();
    }
    
    /**
     * playerAction
     *
     * @param  Player $oPlayer
     * @return void
     */
    protected function playerAction(\Entity\Player $oPlayer): void
    {
        // TODOO
    }

    protected function isWin(): bool
    {
        return false;
    }
}