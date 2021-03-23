<?php
namespace Model;



/**
 * Wizard
 */
final class Wizard extends Character
{
    /**@var string */
    protected const SYMBOL = '&#129497';

    private const FIREBALL_COAST = 80;
    private const FIREBALL_DMG = 60;

    private const HEAL = 50;
    private const HEAL_COAST = 50;


    /* 
        Propriétés/Attributs
        Convention de code : camelCase
    */
    
    private $magic;
    
    public function __construct(string $sName)
    {
        parent::__construct($sName);
        $this->magic = 40;
    }

    
    public function heal() : void
    {
        if($this->getMagic() >= self::HEAL_COAST){
            echo $this . ' dit : Soins !!!!' . PHP_EOL;
            $this -> setHealth($this->getHealth() + self::HEAL);
            $this->setMagic($this->getMagic() - self::HEAL_COAST);
        }
        else {
            echo $this . ' dit : Je n\'ai pas assez de mana!' . PHP_EOL;
        }
    }

    public function fireball(Character $playerB) : void
    {
        if ($this->getMagic() >= self::FIREBALL_COAST) {
            echo $this . ' dit : Boule de feu !!!!!' . PHP_EOL;
            $playerB->setHealth($playerB->getHealth() - self::FIREBALL_DMG);
            $this -> setMagic($this->getMagic()- self::FIREBALL_COAST);
        } 
        else {
            echo $this . ' dit : Je n\'ai pas assez de mana!'. PHP_EOL;
        }
    }

    public function display()
    {
        print_r($this);
    }  

    /**
     * Get the value of magic
     */ 
    public function getMagic()
    {
        return $this->magic;
    }

    /**
     * Set the value of magic
     *
     * @return  self
     */ 
    public function setMagic($magic)
    {
        $this->magic = $magic;

        return $this;
    }
}