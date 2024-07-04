<?php 
namespace libraries;
class Admin{

    public function find(){
          $query = $pdo->prepare('SELECT * FROM administrators WHERE username = ?');
    $query->execute([$username]);
    $user = $query->fetch();

    }
    
    public function count(){
        $query = $pdo->prepare('SELECT COUNT(*) AS count FROM administrators WHERE role = "admin"');
        $query->execute();
        $result = $query->fetch();
        return $result;  

    }

}