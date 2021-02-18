<?php

include_once('model/character.php');



final class Wizard extends Character
{

    public const FIREBALL_DAMAGE = 60;
    public const FIREBALL_COST = 80;

    public const HEAL_DAMAGE = 50;
    public const HEAL_COST = 50;

    private $magic;

    public function __construct(string $sName = 'Guerrier')
    {
        $this->name = $sName;
    }

    /**
     * fireball
     *
     * @param  Character $b
     * 
     * @return void
     */
    function fireball(Character $b): void
    {
        echo $this . " attaque " . $b . " avec fireball " . PHP_EOL;
        if ($this->getMagic() < Wizard::FIREBALL_COST) {
            echo PHP_EOL . "Malheureusement " . $this . " possède trop peu de mana";
            return;
        }

        $b->setHealth($b->getHealth() - Wizard::FIREBALL_DAMAGE);
        $this->setMagic($this->getMagic() - self::FIREBALL_COST);
    }

    /**
     * popo_de_heal
     *
     * @return void
     */
    function popo_de_heal(): void
    {
        echo $this . " utlise une popo heal" . PHP_EOL;
        if ($this->getMagic() < Wizard::HEAL_COST) {
            echo PHP_EOL . "Malheureusement " . $this . " possède trop peu de mana";
            return;
        }
        $this->setHealth($this->getHealth() + Wizard::HEAL_DAMAGE);
        $this->setMagic($this->getMagic() - Wizard::HEAL_COST);
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
