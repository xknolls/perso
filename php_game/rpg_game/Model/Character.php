<?php
namespace Model;

/*
 * Référentiel de la classe Character
 * Conventions de code : PascalCase
 * abstract = non instanciable (non obligatoire)
 */
abstract class Character extends Pawn
{
    /** @var string */
    protected string $name;
    
    /** @var int */
    protected int $maxHealth;

    /** @var int */
    protected int $health;

    /** @var int */
    protected int $strength;

/* -------------------------------- fonctions ------------------------------- */
    
    /**
     * @param string $sName
     *
     * @return void
     */
    public function __construct(string $sName)
    {
        parent::__construct();

        $this->name = $sName;
    }
    
    /**
     * Get /*
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set /*
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of health
     */ 
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * Set the value of health
     *
     * @return  self
     */ 
    public function setHealth($health)
    {
        $this->health = $health;

        return $this;
    }

    /**
     * Get the value of strength
     */ 
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set the value of strength
     *
     * @return  self
     */ 
    public function setStrength($strength)
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