<?php
namespace Model\Chess;

final class Peon extends \Model\Pawn 
{
    /**@var string */
    protected const SYMBOL = '&#9817;';

/* -------------------------------- fonctions ------------------------------- */

    public function getMoves () : array
    {
        $aMoves = [];

        switch ($this->getPlayer()->getTeam()) {
            case \Model\ChessGame::TEAMS[0]:
                if($this->y === 6) {
                    $aMoves[0][] = [$this->x, $this->y - 2];
                }
                $aMoves[0][] = [$this->x, $this->y - 1];
            break;

            case \Model\ChessGame::TEAMS[1]:
                if($this->y === 1) {
                    $aMoves[0][] = [$this->x, $this->y + 2];
                }
                $aMoves[0][] = [$this->x, $this->y + 1];
            break;
        }

        return $aMoves;
    }
}