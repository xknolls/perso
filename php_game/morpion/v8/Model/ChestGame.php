<?php 

namespace Model;


final class ChessGame extends AbstractGame
{
    // On précises les équipes
    public const TEAMS = ['White', 'Black'];

    // On précise les dimessions
    protected const SIZE_X = 8;
    protected const SIZE_Y = 8;

    /**
     * __construct est appellée automatiquement lors de l'instanciation de l'objet (= new)
     */
    public function __construct()
    {
        $this->createBoard(); 
    }
}