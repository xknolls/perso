<?php
namespace Model;

/*
 * Référentiel de la classe Warrior
 */
final class Spider extends Monster
{
	
	public const NB_SPIDERS = 10;

	/** @var string */
   protected const SYMBOL = '🕷️';

/* -------------------------------- fonctions ------------------------------- */

	function getMoves(): array
	{
		$aMoves = [];

		$aMoves[] = [$this->x, $this->y+1];
		$aMoves[] = [$this->x+1, $this->y+1];
		$aMoves[] = [$this->x+1, $this->y];
		$aMoves[] = [$this->x+1, $this->y-1];
		$aMoves[] = [$this->x, $this->y-1];
		$aMoves[] = [$this->x-1, $this->y-1];
		$aMoves[] = [$this->x-1, $this->y];
		$aMoves[] = [$this->x-1, $this->y+1];

		return $aMoves;
  }
}