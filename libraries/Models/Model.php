<?php
namespace libraries\Models;
use \libraries\Database;
abstract class Model{
protected $pdo;
protected $table;

public function __construct(){
  $this -> pdo = Database::getPdo();
}



function find($id){


$query = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
$query->execute(['id' => $id]);
$article = $query->fetch();

return $article;
}


function delete($id) : void{


$query = $this->pdo->prepare("DELETE FROM $this->table WHERE id = :id");
$query->execute(['id' => $id]);

}

}