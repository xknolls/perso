<?php

namespace Entity;

use \Manager;

/**
 * final = empêche l'héritage de la classe (non obligatoire)
 */
final class Player implements Manager\DbManagerInterface
{
    // Propriétés / Attributs
    /** @var int */
    private ?int $id;

    /** @var string */
    private string $name;

    /** @var int */
    private ?int $score;

    /** @var string */
    private string $team;

    public static function loadAll(): array
    {
        $oPdo = Manager\DbManager::getDb();
        $query = $oPdo->prepare('
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
        $oPdo = Manager\DbManager::getDb();
        $query = $oPdo->prepare('
            SELECT
                score,
                name,
                id
            FROM players

            WHERE id = :id
        ');

        $query->bindValue(':id', $iId, \PDO::PARAM_INT);
        $query->execute();

        // On récupère les infos de notre joueurs
        $aData = $query->fetch();
        if (empty($aData)) {
            return null;
        }
        $oPlayer = new Player($aData['name'], '');
        $oPlayer->setScore($aData['score']);

        return $oPlayer;
    }

    public static function getByName(string $sName)
    {
        $oPdo = Manager\DbManager::getDb();
        $query = $oPdo->prepare('
            SELECT
                score,
                name
            FROM players

            WHERE name = :name
        ');

        $query->bindValue(':name', $sName, \PDO::PARAM_STR);
        $query->execute();

        // On récupère les infos de notre joueurs
        $aData = $query->fetch();
        if (empty($aData)) {
            return null;
        }
        $oPlayer = new Player($aData['name'], '');
        $oPlayer->setId($aData['id']);
        $oPlayer->setScore($aData['score']);

        return $oPlayer;
    }

    public function save(): void
    {
        $oPdo = Manager\DbManager::getDb();
        if ($this->getId()) {

            $query = $oPdo->prepare('
            UPDATE players 
                SET score = :score
                WHERE id = :id 
        ');
        $query->bindValue(':id', $this->id, \PDO::PARAM_INT);
        $query->bindValue(':score', $this->score, \PDO::PARAM_INT);
        $query->execute();

        } else {

            $query = $oPdo->prepare('
            INSERT INTO players 
                (`name`, `score`) 
            VALUES 
                (:name, :score )
        ');
        $query->bindValue(':name', $this->name, \PDO::PARAM_STR);
        $query->bindValue(':score', $this->score, \PDO::PARAM_INT);
        $query->execute();

        $this->setId($oPdo->lastInsertId());
        }
        return;
    }

    public function delete(): void
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
        $this->id = null;
        $this->score = 0;
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
    public function getScore(): int
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
    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
}
