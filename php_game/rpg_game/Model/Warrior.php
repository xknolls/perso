<?php
namespace Model;


/**
 * Warrior
 */
final class Warrior extends Character
{
    /**@var string */
    protected const SYMBOL = '&#127947';

    public function getMoves () : array
    {
        $aMoves = [];

        $aMoves[] = [$this->x, $this->y+1];
        $aMoves[] = [$this->x+1, $this->y];
        $aMoves[] = [$this->x, $this->y-1];
        $aMoves[] = [$this->x-1, $this->y];

        return $aMoves;
    }

}