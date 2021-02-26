<?php
namespace Entity;

/**
 * final = empêche l'héritage de la classe (non obligatoire)
 */
final class Player
{
    // Propriétés / Attributs
    /** @var string */
    private string $name;

    /** @var string */
    private string $symbol;
        
    /**
     * __construct
     *
     * @param  string $sName
     * @param  string $sSymbol
     * @return void
     */
    public function __construct(string $sName, string $sSymbol)
    {
        $this->name = $sName;
        $this->symbol = $sSymbol;
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
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;

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
}