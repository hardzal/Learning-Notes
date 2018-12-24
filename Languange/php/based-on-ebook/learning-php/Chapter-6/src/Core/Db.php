<?php

namespace Bookstore\Core;

use PDO;

class Db {
    private static $instance;

    private static function connect(): PDO {
        $dbConfig = Config::getInstance()->get('db');

        return new PDO('mysql:host=localhost;dbname=bookstore', $dbConfig['user'], $dbConfig['password']);
    }

    public static function getInstance() {
        if(self::$instance==null) {
            self::$instance = self::connect();
        }

        return self::$instance;
    }
}