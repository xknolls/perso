<?php
namespace Model;

/*
 * Référentiel de la classe Monster
 * Conventions de code : PascalCase
 * abstract = non instanciable (non obligatoire)
 */
class Monster
{
    use Positionable;

    /**@var string */
    protected const SYMBOL = '';
    
    /** @var int */
    protected int $health;

    /** @var int */
    protected int $maxHealth;

    /** @var int */
    protected int $strength;

    /* -------------------------------- fonctions ------------------------------- */

    public function __construct()
    {
        $this->symbol = static::SYMBOL;
    }

    /**
     * Get the value of symbol
     */ 
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * Set the value of symbol
     *
     * @return  self
     */ 
    public function setSymbol(string $symbol)
    {
        $this->symbol = $symbol;
        
        // fluent setter
        return $this;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->symbol;
    }

    /**
     * @return array
     */
    public function getMoves() : array
    {
        return [];
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

    /**
     * Get the value of maxHealth
     *
     * @return int
     */
    public function getMaxHealth() : int 
    {
        return $this->maxHealth;
    }

    /**
     * Set the value of maxHealth
     *
     * @param int $maxHealth
     *
     * @return self
     */
    public function setMaxHealth(int $maxHealth) : self
    {
        $this->maxHealth = $maxHealth;

        return $this;
    }
}