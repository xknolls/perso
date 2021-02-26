<?php
namespace Entity;

use \Manager;

/**
 * final = empêche l'héritage de la classe (non obligatoire)
 */
final class Player implements Manager\DbManagerInterface
{
    // Propriétés / Attributs
    /** @var string */
    private string $name;

    /** @var int */
    private int $score;

    /** @var string */
    private string $team;

    public static function loadAll(): array
    {
        $oPdo = Manager\DbManager::getDb();
        $query = $oPdo-> prepare('
            SELECT
                score,
                name
            FROM players
        ');

        $query->execute();
        $aPlayers = [];
        while ($aData = $query->fetch()) {
            $oPlayer = new Player($aData['name'], '');
            $oPlayer->setScore($aData['score']);
            $aPlayers[] = $oPlayer;
        }

        return $aPlayers;
    }

    public static function get(int $iId): object
    {
        return new Player('TODOO', 'TODOO');
    }

    public function save(object $oObject): void
    {
        
    }

    public function delete(object $oObject): void
    {
        
    }
        
    /**
     * __construct
     *
     * @param  string $sName
     * @param  string $sTeam
     * @return void
     */
    public function __construct(string $sName, string $sTeam)
    {
        $this->name = $sName;
        $this->team = $sTeam;
    }
    
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    // Comportements / Fonctions

    /**
     * Get the value of team
     */ 
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set the value of team
     *
     * @return  self
     */ 
    public function setTeam($team)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of score
     *
     * @return int
     */
    public function getScore() : int 
    {
        return $this->score;
    }

    /**
     * Set the value of score
     *
     * @param int $score
     *
     * @return self
     */
    public function setScore(int $score) : self
    {
        $this->score = $score;

        return $this;
    }
}