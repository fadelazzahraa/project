<?php
    include 'dbconnect.php';

    function fetchAllUser(){
        $pdo = pdo_connect();
        $stmt = $pdo->prepare('SELECT * FROM user');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function fetchUser($id){
        $pdo = pdo_connect();
        $stmt = $pdo->prepare('SELECT * FROM user WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    function switchRoleUser($id){
        $pdo = pdo_connect();
        $user = fetchUser($id);
        if ($user['role'] == 'admin'){
            $stmt = $pdo->prepare('UPDATE user SET role = "user" WHERE id = ?');
        } else {
            $stmt = $pdo->prepare('UPDATE user SET role = "admin" WHERE id = ?');
        }
        $stmt->execute([$id]);
    }

    function deleteUser($id){
        $pdo = pdo_connect();
        $stmt = $pdo->prepare('DELETE FROM user WHERE id = ?');
        $stmt->execute([$id]);
    }
?>