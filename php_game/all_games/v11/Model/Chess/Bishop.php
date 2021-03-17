<?php
namespace Model\Chess;

final class Bishop extends \Model\Pawn 
{
    /**@var string */
    protected const SYMBOL = '&#9821;';

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
            $aMoves[0][] = [$this->x+$i, $this->y+$i];
            $aMoves[1][] = [$this->x-$i, $this->y-$i];
            $aMoves[2][] = [$this->x+$i, $this->y-$i];
            $aMoves[3][] = [$this->x-$i, $this->y+$i];
        }
        return $aMoves;
    }
}