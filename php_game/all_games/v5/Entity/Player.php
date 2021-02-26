<?php 
namespace Entity;
final class Player 
{
    private string $name;
    private string $pawn;
    
    /**
     * __construct
     *
     * @param  string $pawn
     * @return void
     */
    public function __construct(string $name, string $pawn)
    {
        $this  ->name = $name;
        $this  ->pawn = $pawn;
    }

    public function __toString()
    {
        return $this->name;
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
     * Get the value of pawn
     */ 
    public function getPawn()
    {
        return $this->pawn;
    }

    /**
     * Set the value of pawn
     *
     * @return  self
     */ 
    public function setPawn($pawn)
    {
        $this->pawn = $pawn;

        return $this;
    }
}