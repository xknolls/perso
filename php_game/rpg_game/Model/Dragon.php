<?php
namespace Model;

/*
 * Référentiel de la classe Warrior
 */
final class Dragon extends Monster
{
	
	public const NB_MONSTERS	 = 1;

	/** @var string */
   protected const SYMBOL = '🐉';

	/* -------------------------------- fonctions ------------------------------- */

	public function __construct()
	{
		parent::__construct();
		$this->strength = 50;
		$this->health = 200;
		$this->maxHealth = $this->getHealth();
	}

	function getMoves(): array
	{
		$aMoves = [];

		return $aMoves;
  }
}