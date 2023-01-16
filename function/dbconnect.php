<?php
    function pdo_connect(){
        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = '';
        $DATABASE_NAME = 'web_project';
        $dsn = 'mysql:dbname='. $DATABASE_NAME . ';port=3368;host=' . $DATABASE_HOST;
        $user = $DATABASE_USER;
        $password = $DATABASE_PASS;
        try {
            return new PDO($dsn, $user, $password);
        } catch (PDOEXCEPTION $exception){
            die('Failed to connect to database!');
        }
    }
?>