<?php
namespace libraries\Models;


class Comment extends Model{
    
    protected $table = 'comments';

/** INSERER UN COMMENTAIRE
 * @param string $title
 * @param string $slug
 * @param string $introduction
 * @param string $content
 * @return void  
 */

function insert($author,$content,$id) : void{

$query = $this->pdo->prepare('INSERT INTO comments SET author  = :author, content = :content, article_id = :id, created_at = NOW()');
$query->execute(compact('author', 'content', 'id'));

}
function findAll($id){

  $sql="SELECT * FROM comments where article_id = $id";

$resultats = $this->pdo->query("$sql");
$articles = $resultats?->fetchAll();


return $articles;
}


}















 

















