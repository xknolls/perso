<?php
namespace Model;

/*
 * Référentiel de la classe Warrior
 */
final class Warrior extends Character
{
	/**@var string */
   protected const SYMBOL = '🐱‍👤';

   /** @var string */
   public const TYPE = 'Warrior';

/* -------------------------------- fonctions ------------------------------- */

	 /**
     * @param string $sName
     *
     * @return void
     */
    public function __construct(string $sName)
    {
        parent::__construct($sName);
        
        $this->strength = rand(10, 20);
        $this->maxHealth = $this->health = rand(80, 150);
    }

	public function getMoves(): array
	{
		$aMoves = [];

		$aMoves[] = [$this->x, $this->y+1];
		$aMoves[] = [$this->x+1, $this->y];
		$aMoves[] = [$this->x, $this->y-1];
		$aMoves[] = [$this->x-1, $this->y];

		return $aMoves;
    }

    public function getAttackCells() : array
    {
        $aAttack = [];

		$aAttack[] = [$this->x, $this->y + 1];
		$aAttack[] = [$this->x + 1, $this->y + 1];
		$aAttack[] = [$this->x + 1, $this->y];
		$aAttack[] = [$this->x + 1, $this->y - 1];
		$aAttack[] = [$this->x, $this->y - 1];
		$aAttack[] = [$this->x - 1, $this->y - 1];
		$aAttack[] = [$this->x - 1, $this->y];
		$aAttack[] = [$this->x - 1, $this->y + 1];

		return $aAttack;
    }
}