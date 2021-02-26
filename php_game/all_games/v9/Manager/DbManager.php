<?php

namespace Manager;

class DbManager
{
    private static $pdo;

    public static function getDb()
    {
        if ( is_null(static::$pdo)) {
            try {
                static::$pdo = new \PDO('mysql:host=localhost;dbname=poo', 'root', '');
            } catch (\Exception $e) {
                echo $e->getMessage() . PHP_EOL;
                die;
            }
        }

        return static::$pdo;
    }
}
