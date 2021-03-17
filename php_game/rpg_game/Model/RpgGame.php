<?php
namespace Model;

use Entity\Player;

// On aurait pu simplifier le code
//use \Entity\Player;

/**
 * Le but de la classe RpgGame est de centraliser au maximum tout ce qui concerne le jeu "Chess"
 * (dont le plateau de jeu)
 * final = empêche l'héritage de la classe (non obligatoire)
 */
final class RpgGame extends AbstractGame
{
    // On précise les équipes
    public const TEAMS = ['White', 'Black'];

    // On précise les dimensions
    protected const SIZE_X = 25;
    protected const SIZE_Y = 25;

    
    /**
     * selectCell
     *
     * @param  int $x
     * @param  int $y
     * @return bool
     */
    public function selectCell(\Entity\Player $oPlayer, int $x, int $y): array
    {

        $aData = [
            'moves'           => [],
        ];
        // Coordonnées invalides, on sort
        if (!$this->isValidXY($x, $y)) {
            return $aData;
        }

        // On récupère le "pion" du joueur
        $oCharacter = $oPlayer->getCharacter();  
        
        // Validation des déplacements par RpgGame
        $aData['moves'] = $this->getValidMoves($oCharacter);

        // Est-ce que je déplace un pion?
        if (in_array([$x, $y], $this->getValidMoves($oCharacter)) ) {
            
            // Mémoriser la case de départ
            $aPosInit = $oCharacter->getPosition();


            // Déplacer le pion
            $this->setXY($x, $y, $oCharacter);
            $oCharacter->setPosition($x, $y);


            // Effacer l'ancien pion
            $this->board[$aPosInit['y']][$aPosInit['x']] = ' ';

            $aData['moves'] = $this->getValidMoves($oCharacter);

            return $aData;
        }
        return $aData;
    }


    public function fillBoard() : void
    {
        
    }

    private function getValidMoves(Pawn $oPawn)
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
                if (!$this->isValidXY($aCoords[0], $aCoords[1]) 
                        || (!$this->isEmptyXY($aCoords[0], $aCoords[1])
                && $this->getXY($aCoords[0], $aCoords[1])->getPlayer() === $oPawn->getPlayer())) {
                    // On arrête le traitement de cette valeur = on passe à la valeur suivante
                    continue;
                }

                // Traitement standard, on autorise la coordonnée
                $aValidMoves[] = $aCoords;
            }
        }
        else {
            // Case "Coordonnées liées"

            // Pour chacune des directions
            foreach ($aMoves as $aDirections) {
                // Pour chaque coordonnées, tester si la position est valide (= libre et existante)
                foreach ($aDirections as $aCoords) {
                    // Condition de sortie : case invalide ou non vide
                    if (!$this->isValidXY($aCoords[0], $aCoords[1]) 
                            || (!$this->isEmptyXY($aCoords[0], $aCoords[1]) 
                                    && $this->getXY($aCoords[0], $aCoords[1])->getPlayer() === $oPawn->getPlayer())) {
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
    public function addPlayer(Player $player): void
    {
        parent::addPlayer($player);
        $iRandX = rand(0, self::SIZE_X-1);
        $iRandY = rand(0, self::SIZE_Y-1);

        $this->setXY($iRandX, $iRandY, $player->getcharacter()->setPosition($iRandX, $iRandY));

    }
}