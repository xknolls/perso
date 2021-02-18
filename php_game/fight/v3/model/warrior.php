<?php

include_once('model/character.php');

final class  Warrior extends Character
{

    public function __construct(string $sName = 'Guerrier')
    {
        $this->name = $sName;
    }
}
