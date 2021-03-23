<?php 
namespace Model;

final class Zombie extends Monster {
    
    /** @var string */
    protected const SYMBOL = '🧟';

    /** @var int */
    public const NB_ZOMBIE = 10;

    /* -------------------------------- Fonctions ------------------------------- */

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