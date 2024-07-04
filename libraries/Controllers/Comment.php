<?php
namespace libraries\Controllers;
use \libraries\Models\Comment as ModelsComment; 
use \libraries\Models\Article as ModelsArticle;

class Comment extends Controller{
protected $controllerName= modelsComment::class;


    function __construct()
    {

            $this->Model = new modelsComment();
    }

    function save()
    {
            /**
         * CE FICHIER DOIT ENREGISTRER UN NOUVEAU COMMENTAIRE EST REDIRIGER SUR L'ARTICLE !
        */

        $author = $_POST['author'] ?? null;
        $content = $_POST['content'] ?? null;
        $article_id = $_POST['article_id'] ?? null;

        // Vérification finale des infos envoyées dans le formulaire (donc dans le POST)

        if (!$author || !$article_id || !$content) {
            die("Votre formulaire a été mal rempli !");
        }

        $content = htmlspecialchars($content);



        $modelArticle=new modelsArticle();


        // Vérification de l'existence de l'article


        $articleExists  = $modelArticle ->find($article_id);
        if (!$articleExists) {
            die("Ho ! L'article $article_id n'existe pas boloss !");
        }

        $this->Model -> insert($author,$content,$article_id);
        // Redirection vers l'article en question
        \libraries\Http::redirect('index.php?controller=article&task=show&id=' . $article_id);

    }

    function delete()
    {
        /**
         * 1. Récupération du paramètre "id" en GET
         */
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === null || $id === false) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        }

        /**
         * 2. Connexion à la base de données avec PDO
         */



        $modelArticle=new modelsArticle();

        /**
         * 3. Récupération de l'identifiant de l'article avant la suppression du commentaire
         */
        echo $article_id = $modelArticle -> find_id($id);

        /**
         * 4. Suppression réelle du commentaire
         */
        $this->Model -> delete($id);

        /**
         * 5. Affichage de l'identifiant de l'article
         */

        if (!$article_id) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }

        /**
         * 4. Redirection vers l'article en question
         */

         \libraries\Http::redirect("index.php?controller=article&task=show&id=$article_id");

    }
}