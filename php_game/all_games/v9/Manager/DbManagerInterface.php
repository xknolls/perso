<?php
namespace Manager;


interface DbManagerInterface 
{    
    /**
     * static = fonction rattaché au référentiel 
     */
    public static function loadAll(): array;
    public static function get(int $iId): object;
    public function save(object $oObject): void;
    public function delete(object $oObject): void;

}