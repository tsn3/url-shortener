<?php

class Database
{
    protected $pdo;
    protected static $instance;

    protected function __construct()
    {
        $db = [
            'dsn' => 'mysql:host=localhost;dbname=ck27434_mvc;charset=utf8',
            'user' => 'ck27434_mvc',
            'pass' => 'mvcmvc',
        ];
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            ];
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $options);
    }

    public static function instance() {
        if (self::$instance == null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function execute($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $res  = $stmt->execute($params);
        if ($res !== false) {
            return $stmt->fetchAll();
        }
        return [];
    }
}