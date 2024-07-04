<?php
namespace libraries\Controllers;

use libraries\Models\Comment as ModelsComment; 
use libraries\Models\Article as ModelsArticle;
use libraries\Models\User;
// require_once('../libraries/controllers/Controller.php');
class Article extends Controller{
protected $model;

protected $controllerName= ModelsArticle::class;

function index()
{
    // montrer la liste de tois les articles



    $modeleUser=new User();
    // Récupération de tous les articles depuis la base de données
    $articleS= $this ->model -> findAll();

    // Titre de la page
    $pageTitle = "Accueil";
    \libraries\Renderer::render("articles/index");
}

 function show(){
    /**
     * CE FICHIER DOIT AFFICHER UN ARTICLE ET SES COMMENTAIRES !
     
    */
    $article_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    // On peut désormais décider : erreur ou pas ?!
    if ($article_id === null || $article_id === false) {
        die("Vous devez préciser un paramètre `id` valide dans l'URL !");
    }
    /**
     * 2. Connexion à la base de données avec PDO
     
    */  
    $modelComment=new ModelsComment();
     /**
     * 3. Récupération de l'article en question
     */
    $article=$this ->model->find($article_id);

    /**
     * 4. Récupération des commentaires de l'article en question
     */
    $commentaires=$modelComment -> findAll($article_id);

    /**
     * 5. On affiche 
     */
    $pageTitle = $article['title'];

    \libraries\Renderer::render("articles/show",compact('article','commentaires','article_id'));

}
function add(){
        
    
    // Vérification et nettoyage des entrées
    function clean_input($data){
        return htmlspecialchars(stripslashes(trim($data)));
    }
    // Récupération des données du formulaire
    if (isset($_POST['add-article'])) {
        
    // Nettoyage des entrées
    $title = clean_input(filter_input(INPUT_POST, 'title', FILTER_DEFAULT));
    $slug = strtolower(str_replace(' ', '-', $title)); // Mise à jour du slug à partir du titre
    $introduction = clean_input(filter_input(INPUT_POST, 'introduction', FILTER_DEFAULT));
    $content = clean_input(filter_input(INPUT_POST, 'content', FILTER_DEFAULT));

    // Validation des données
    if (empty($title) || empty($slug) || empty($introduction) || empty($content)) {
        $error = "Veuillez remplir tous les champs du formulaire !";
    } else {
        // Connexion à la base de données avec PDO

            // Insertion du nouvel article dans la base de données

    $this  ->model -> insert($title, $slug, $introduction, $content);

        }
    }

    $pageTitle = "Ajouter un article";

    \libraries\Renderer::render("articles/add-article",[]);


}

function edit(){
        
    $message = '';

    echo $message;

    // Récupération des informations d'un article à modifier
    if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {

    $articleId=$_GET['id'];
    var_dump($articleId);
    $article = $this ->model-> find($articleId);

    $title = $article['title'];
    $slug = $article['slug'] ?? "";
    $introduction  = $article['introduction'] ?? "";
    $content = $article['content'] ?? "";
    
    }

    // Vérification et nettoyage des entrées
    function clean_input($data){
    return htmlspecialchars(stripslashes(trim($data)));
    }

    if (isset($_POST['update'])) {

    // Nettoyage des entrées
    $title = clean_input(filter_input(INPUT_POST, 'title', FILTER_DEFAULT));
    $slug = strtolower(str_replace(' ', '-', $title)); // Mise à jour du slug à partir du titre
    $introduction = clean_input(filter_input(INPUT_POST, 'introduction', FILTER_DEFAULT));
    $content = clean_input(filter_input(INPUT_POST, 'content', FILTER_DEFAULT));
    $articleId = clean_input(filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT));

    // Validation des données
    if (empty($title) || empty($slug) || empty($introduction) || empty($content)) {
        $error = "Veuillez remplir tous les champs du formulaire !";
    } else {


        
        // Mise à jour de l'article dans la base de données
        $data = compact('title', 'slug', 'introduction', 'content', 'articleId');
        $this ->model ->edit($data);
        // Redirection vers la page d'adim
    }
    }

    $pageTitle = "Éditer un article";
    \libraries\Renderer::render('articles/edit-article',compact('title','introduction','content','articleId')
    );
}


 function delete(){
    // supprimer un articles

    /**
     * DANS CE FICHIER, ON CHERCHE À SUPPRIMER L'ARTICLE DONT L'ID EST PASSE EN GET
    **/
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if ($id === null || $id === false) {
        die("Ho ?! Tu n'as pas précisé l'id de l'article !");
    }
    /**
     * 2. Connexion à la base de données avec PDO
     */

   
    /**
     * 3. Vérification que l'article existe bel et bien
     */

    $article=$this ->model->find($id);

    if (!$article) {
        die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
    }
    /**
     * 4. Réelle suppression de l'article
     */
    $this ->model -> delete($id);

    /**
     * 5. Redirection vers la page d'accueil
     */

    \libraries\Http::redirect('index.php?task=add');

}



}