<?php


abstract class ModelClass
{
    private static $pdo;

    /**
     * Create a connection to the DB
     */
    private static function setDb(): void {
        $hostname = 'localhost';
        $username = 'root';
        $password = 'root';
        $database = 'charles_cantin';

        self::$pdo = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8",$username,$password);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    /**
     * Connection project to DB
     */
    protected function getDb(): PDO {
        if(self::$pdo === null) {
            self::setDb();
        }
        return self::$pdo;
    }
}