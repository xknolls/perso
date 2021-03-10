<?php
namespace Manager;


interface DbManagerInterface 
{    
    /**
     * static = fonction rattaché au référentiel 
     */
    public static function loadAll(): array;
    public static function get(int $iId): ?object;

    /**
     *Fonction classique  
     */
    public function save(): void;
    public function delete(): void;

}