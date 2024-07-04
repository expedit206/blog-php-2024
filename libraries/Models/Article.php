<?php
namespace libraries\Models;



class Article extends Model{

protected $table='articles';

function find_id($id){
$query = $this->pdo->prepare('SELECT article_id FROM comments WHERE id = :id');
$query->execute(['id' => $id]);
$article_id = $query->fetchColumn();

return $article_id;
}


function findAll(){

    $sql="SELECT * FROM articles";

  $resultats = $this->pdo->query($sql);
  $articles = $resultats?->fetchAll();


  return $articles;
}


function insert(string $title,string  $slug, string $introduction, string $content) : void{


    $query = $this->pdo->prepare('INSERT INTO articles (title, slug, introduction, content, created_at) VALUES (?, ?, ?, ?, NOW())');

        $query->execute([$title, $slug, $introduction, $content]);

}


function edit(array $data) : void{


  $query = $this->pdo->prepare('UPDATE articles SET title = :title, slug = :slug, introduction = :introduction, content = :content WHERE id = :articleId');

    $query->execute($data);


    \libraries\Http::redirect('index.php');
}
}