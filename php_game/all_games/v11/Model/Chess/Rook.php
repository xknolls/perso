<?php
namespace Model\Chess;

final class Rook extends \Model\Pawn 
{
    /**@var string */
    protected const SYMBOL = '&#9820;';

/* -------------------------------- fonctions ------------------------------- */

public function getMoves () : array
    {
        $aMoves = [
            0=>[],
            1=>[],
            2=>[],
            3=>[],
        ];

        for($i=1; $i<8; $i++) {
            $aMoves[0][] = [$this->x+$i, $this->y];
            $aMoves[1][] = [$this->x-$i, $this->y];
            $aMoves[2][] = [$this->x, $this->y+$i];
            $aMoves[3][] = [$this->x, $this->y-$i];
        }
        return $aMoves;
    }
}