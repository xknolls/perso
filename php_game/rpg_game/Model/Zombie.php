<?php

namespace Model;

/*
 * Référentiel de la classe Warrior
 */

final class Zombie extends Monster
{

	public const NB_MONSTERS = 10;

	/** @var string */
	protected const SYMBOL = '🧟';

	/* -------------------------------- fonctions ------------------------------- */

	public function __construct()
	{
		parent::__construct();
		$this->maxHealth = $this->health = 10;
		$this->strength = 10;
	}

	function getMoves(): array
	{
		$aMoves = [];

		$aMoves[] = [$this->x, $this->y + 1];
		$aMoves[] = [$this->x + 1, $this->y + 1];
		$aMoves[] = [$this->x + 1, $this->y];
		$aMoves[] = [$this->x + 1, $this->y - 1];
		$aMoves[] = [$this->x, $this->y - 1];
		$aMoves[] = [$this->x - 1, $this->y - 1];
		$aMoves[] = [$this->x - 1, $this->y];
		$aMoves[] = [$this->x - 1, $this->y + 1];

		return $aMoves;
	}
}
