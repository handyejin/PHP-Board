<?php

class PdoConn {
    private $info = array(
    'db_driver' => 'mysql',
    'db_host'=> '127.0.0.1',
    'db_user' => 'root',
    'db_password' => '123456',
    'db_database' => 'dbBoard'
    );

    private $pdo;
    static private $instance = NULL;

    private function __construct() {
        $this->pdo = new PDO("mysql:host={$this->info['db_host']};dbname={$this->info['db_database']}", $this->info['db_user'], $this->info['db_password']);
        $this->pdo->exec("SET CHARACTER SET utf8");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (NULL == self::$instance ){
            self::$instance = new PdoConn();
        }
        return self::$instance;
    }

    function getConnection() {
        return $this->pdo;
    }
}




