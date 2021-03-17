<?php
namespace Model\Chess;

final class Knight extends \Model\Pawn 
{
    /**@var string */
    protected const SYMBOL = '&#9822;';

/* -------------------------------- fonctions ------------------------------- */

    public function getMoves () : array
    {
        $aMoves = [];

        $aMoves[] = [$this->x-1, $this->y+2];
        $aMoves[] = [$this->x+1, $this->y+2];
        $aMoves[] = [$this->x-1, $this->y-2];
        $aMoves[] = [$this->x+1, $this->y-2];
        $aMoves[] = [$this->x+2, $this->y-1];
        $aMoves[] = [$this->x+2, $this->y+1];
        $aMoves[] = [$this->x-2, $this->y-1];
        $aMoves[] = [$this->x-2, $this->y+1];

        return $aMoves;
    }
}