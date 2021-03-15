<?php
namespace Model\Chess;

final class Peon extends \Model\Pawn 
{
    /**@var string */
    protected const SYMBOL = '&#9817;';

    /* --------------------------------- Fontions -------------------------------- */

    public function getMoves() : array
    {
        $currentXY = $this->getPosition();

        $canMove['y'] = $currentXY['y']-1; 
        $canMove['x'] = $currentXY['x'];

        /*if () {
            $canMove['y'] = $currentXY['y']-2; 
            $canMove['x'] = $currentXY['x'];
        }*/
        return [
            [$canMove['x'], $canMove['y']],
            [$canMove['x'], $canMove['y']-1]
        ];
    }

}