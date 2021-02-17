<?php 
class Warrior {
    private $name;
    private $health;
    private $strength;

    public function __construct(string $sName = 'Guerrier')
    {
        $this->name = $sName;
    }

    /**
     * Fonction spécial qui permet deconvertir votre objet en chaine de caractères (via echo par exemple)
     */
    public function __toString()
    {
        return $this->name;
    }

    public function display()
        {
            print_r($this);
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
}
