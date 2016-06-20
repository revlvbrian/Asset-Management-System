<?php

    $dsn = 'mysql: host=localhost; dbname=asset';
    $user = 'root';
    $password = 'P@ssw0rd';
    try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    }
    require_once('lib.php');

    class Index
    {
        public function __construct($pdo)
        {

        }
        public function fetchAllTodo($pdo)
        {
            $stmt = $pdo->query('SELECT * FROM assets');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    $ams = new Index($pdo);
    $ams->fetchAllTodo($pdo);
?>