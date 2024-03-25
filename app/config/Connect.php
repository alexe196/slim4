<?php

namespace app\config;

use PDO;
use PDOException;

final class Connect
{
    private static $instance = null;
    private $dbh;
    private static $config = [
        'dsn' => 'mysql:host=localhost;dbname=slim',
        'username' => 'root',
        'password' => 'root'
    ];

    private function __construct()
    {
        try {

            $this->dbh = new PDO(self::$config['dsn'], self::$config['username'], self::$config['password']);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Failed to connect to database: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        } else {

            try {
                self::$instance->dbh->query('SELECT 1');
            } catch (PDOException $e) {

                self::$instance = new self();
            }
        }

        return self::$instance->dbh;
    }

    public function __destruct()
    {
        $this->dbh = null;
    }

    public function __clone()
    {
    }

    public function __wakeup()
    {
    }
}