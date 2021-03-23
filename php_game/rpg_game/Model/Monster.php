<?php
namespace Model;


/**
 * Warrior
 */
class Monster
{
    use Positionable;

    /** @var string */
    protected const SYMBOL = '';

    /** @var int */
    public const NB_MONSTER = 10;

    /** @var int */
    protected int $health;

    /** @var int */
    protected int $strength;

    /* -------------------------------- Fonctions ------------------------------- */
    public function __construct()
    {
        $this->symbol = static::SYMBOL;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->symbol;
    }

    /**
     * Get the value of health
     *
     * @return int
     */
    public function getHealth() : int 
    {
        return $this->health;
    }

    /**
     * Set the value of health
     *
     * @param int $health
     *
     * @return self
     */
    public function setHealth(int $health) : self
    {
        $this->health = $health;

        return $this;
    }

    /**
     * Get the value of strength
     *
     * @return int
     */
    public function getStrength() : int 
    {
        return $this->strength;
    }

    /**
     * Set the value of strength
     *
     * @param int $strength
     *
     * @return self
     */
    public function setStrength(int $strength) : self
    {
        $this->strength = $strength;

        return $this;
    }
}