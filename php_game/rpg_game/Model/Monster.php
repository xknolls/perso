<?php
namespace Model;


/**
 * Warrior
 */
final class Monster extends Character
{
    /**@var string */
    protected const SYMBOL = '🧟';

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