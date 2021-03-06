<?php
namespace Model\Chess;

final class King extends \Model\Pawn 
{
    /**@var string */
    protected const SYMBOL = '&#9818;';

/* -------------------------------- fonctions ------------------------------- */

public function getMoves () : array
    {
        $aMoves = [];

        $aMoves[] = [$this->x, $this->y+1];
        $aMoves[] = [$this->x+1, $this->y+1];
        $aMoves[] = [$this->x+1, $this->y];
        $aMoves[] = [$this->x+1, $this->y-1];
        $aMoves[] = [$this->x, $this->y-1];
        $aMoves[] = [$this->x-1, $this->y-1];
        $aMoves[] = [$this->x-1, $this->y];
        $aMoves[] = [$this->x-1, $this->y+1];

        return $aMoves;
    }
}