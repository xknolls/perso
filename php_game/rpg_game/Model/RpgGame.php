<?php
namespace Model;

// On aurait pu simplifier le code
//use \Entity\Player;

/**
 * Le but de la classe RpgGame est de centraliser au maximum tout ce qui concerne le jeu "RPG"
 * (dont le plateau de jeu)
 * final = empêche l'héritage de la classe (non obligatoire)
 * extends = hérite des propriétés publics/protégées (UN SEUL HERITAGE POSSIBLE)
 */
final class RpgGame extends AbstractGame
{
    // On précise les dimensions
    protected const SIZE_X = 25;
    protected const SIZE_Y = 25;

    /** @var array */
	protected $monsters = [];

    /**
     * @param Player $oPlayer
     * @param int $x
     * @param int $y
     *
     * @return bool
     */
    public function selectCell(\Entity\Player $oPlayer, int $x, int $y): array
    {
        $aData = [
            'moves' => [],
        ];

        // Coordonnées invalides, on sort
        if (!$this->isValidXY($x, $y)) {
            return $aData;
        }

        // On récupère le "pion" du joueur
        $oCharacter = $oPlayer->getCharacter();

        // Obtention des déplacements valide
        $aData['moves'] = $this->getValidMoves($oCharacter);

        // Déplacement autorisé ?
        if (in_array([$x, $y], $aData['moves'])) {
            if ($oCharacter->getHealth() > 0) {
                $this->moveXY($x, $y, $oCharacter);
                $oCharacter->setHealth($oCharacter->getHealth() - 1);
            }

            $this->getValidAttck($oCharacter);
            
            //Obtention des déplacements réactualisé
            $aData['moves'] = $this->getValidMoves($oCharacter);

            return $aData;
        }

        return $aData;
    }

    public function lifeTime() : void
    {
        $this->moveMonsters();
    }

    public function fillBoard() : void
    {
        $aMonstersTypes = [Zombie::class, Vampire::class, Dragon::class];

        foreach($aMonstersTypes as $aMonsterType) {
            for($i=0; $i < $aMonsterType::NB_MONSTERS ; $i++) {
                $oMonster = new $aMonsterType;
    
                $this->moveXY(
                    rand(0, self::SIZE_X-1), 
                    rand(0, self::SIZE_Y-1), 
                    $oMonster
                );
    
                $this->monsters[] = $oMonster;
            }
        }
    }
    
    private function getValidMoves($oPawn)
    {
        $aValidMoves = [];

        // Récupèrer les positions "envisagées" par le pion
        $aMoves = $oPawn->getMoves();
        if (!$aMoves) {
            return [];
        }

        if (is_int($aMoves[0][0])) {
            // Cas "Coordonnées séparées"
            // Pour chaque coordonnées, tester si la position est valide (= libre et existante)
            foreach ($aMoves as $aCoords) {
                // Condition de sortie : case invalide ou non vide
                if (!$this->isValidXY($aCoords[0], $aCoords[1]) || !$this->isEmptyXY($aCoords[0], $aCoords[1])) {
                    // On arrête le traitement de cette valeur = on passe à la valeur suivante
                    continue;
                }

                // Traitement standard, on autorise la coordonnée
                $aValidMoves[] = $aCoords;
            }
        } else {
            // Case "Coordonnées liées"

            // Pour chacune des directions
            foreach ($aMoves as $aDirections) {
                // Pour chaque coordonnées, tester si la position est valide (= libre et existante)
                foreach ($aDirections as $aCoords) {
                    // Condition de sortie : case invalide ou non vide
                    if (!$this->isValidXY($aCoords[0], $aCoords[1]) || (!$this->isEmptyXY($aCoords[0], $aCoords[1]))) {
                        // On arrête le traitement de cette direction
                        break;
                    }

                    // Traitement standard, on autorise la coordonnée
                    $aValidMoves[] = $aCoords;

                    // Cas spécial : si pion ennemi on arrête le traitement de cette direction
                    if (!$this->isEmptyXY($aCoords[0], $aCoords[1]) 
                                && ($this->getXY($aCoords[0], $aCoords[1])->getPlayer() !== $oPawn->getPlayer())) {
                        break;
                    }

                }
            }
        }

        // Retourner les positions valides
        return $aValidMoves;
    }

    public function addPlayer(\Entity\Player $player) : void
    {
        parent::addPlayer($player);

        $iRandX = rand(0, self::SIZE_X-1);
        $iRandY = rand(0, self::SIZE_Y-1);
        
        $player->getCharacter()->setPosition($iRandX, $iRandY);

        $this->setXY($iRandX, $iRandY, $player->getCharacter());
    }

    public function moveMonsters()
    {
        foreach($this->monsters as $oMonster) {            
            // Obtention des déplacements valide
            $aMoves = $this->getValidMoves($oMonster);
            if ($aMoves) {
                $aMove = $aMoves[array_rand($aMoves)];
                
                $this->moveXY( $aMove[0], $aMove[1], $oMonster);
            }
        }
    }

	/**
	 * Get the value of monsters
	 */
	public function getMonsters()
	{
		return $this->monsters;
	}

	/**
	 * Set the value of monsters
	 *
	 * @return self
	 */
	public function setMonsters($monsters) : self
	{
		$this->monsters = $monsters;

		return $this;
	}

    public function getValidAttck($oPlayer)
    {
        $aValidAttack = [];

        // Récupèrer les positions "envisagées" par le pion
        $aAttackCells = $oPlayer->getAttackCells();
        if (!$aAttackCells) {
            return [];
        }

        foreach($aAttackCells as $aAttack) {
            if ($this->isValidXY($aAttack[0], $aAttack[1]) && !$this->isEmptyXY($aAttack[0], $aAttack[1])) {
                $this->getXY($aAttack[0], $aAttack[1])->setHealth($oPlayer->getHealth());
            }
        }
    }
}