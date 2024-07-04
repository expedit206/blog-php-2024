<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/icon-128x128.png" type="image/x-icon">
    <link rel="stylesheet" href="/templates/style.css">
    <title>Mon superbe blog - <?= $pageTitle ?></title>
</head>

<body>
<style>
body{
  padding: 30px;
}
    /* Styles pour afficher les articles en 3 colonnes et 2 lignes */
.article-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 20px;
}
.admin{
  display: grid;
  align-items: center;
  justify-content: center;

}
.article {
  background-color: #005599;
  padding: 20px;
  border-radius: 4px;
  color: #FFF;
}
.article.adm{
  background-color: #fff;
  padding-left: 0px;

}
.article h2 {
  font-size: 18px;
  margin-top: 0;
}

.article small {
  font-size: 12px;
}

.article p {
  margin-bottom: 10px;
}

.article a {
  display: inline-block;
  padding: 8px 12px;
  margin-right: 5px;
  color: #FFF;
  background-color: #FF8000;
  border-radius: 4px;
  text-decoration: none;
}

.article a:hover {
  background-color: #FF6600;
}


/* Styles pour l'affichage des articles et des commentaires */
.article-title {
  font-size: 24px;
  color: #0077CC;
  margin-bottom: 10px;
}

.article-date {
  font-size: 12px;
  color: #666;
}

.article-introduction {
  margin-bottom: 20px;
}

.article-content {
  margin-top: 20px;
  margin-bottom: 20px;
}

.comment-section {
  margin-top: 40px;
  margin-bottom: 40px;
}

.comment-section h2 {
  font-size: 18px;
  color: #0077CC;
  margin-bottom: 10px;
}

.comment-section h3 {
  font-size: 16px;
  color: #0077CC;
  margin-bottom: 5px;
}

.comment-section small {
  font-size: 12px;
  color: #666;
  margin-bottom: 10px;
}

.comment-section blockquote {
  font-style: italic;
  margin-bottom: 10px;
}

.comment-section a {
  color: #FF8000;
  text-decoration: none;
  margin-left: 10px;
}

.comment-form {
  margin-top: 40px;
}

.comment-form h3 {
  font-size: 16px;
  color: #0077CC;
  margin-bottom: 10px;
}

.comment-form input[type="text"],
.comment-form textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
}

.comment-form textarea {
  resize: vertical;
}

.comment-form button {
  padding: 8px 16px;
  background-color: #FF8000;
  color: #FFF;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.comment-form button:hover {
  background-color: #FF6600;
}

form {
  margin-top: 20px;
  width: 500px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
}

input[type="submit"] {
    margin-top: 10px;
  padding: 8px 16px;
  background-color: #0077CC;
  color: #FFF;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #005299;
}
    /* Styles généraux */
.pagination {
    margin-top: 20px;
    text-align: center;
  }
  
  .pagination a, .pagination span {
    display: inline-block;
    padding: 8px 12px;
    margin-right: 5px;
    color: #FFF;
    background-color: #0077CC;
    border-radius: 4px;
    text-decoration: none;
  }
  
  .pagination a:hover {
    background-color: #005599;
  }
  
  span.current-page {
    background-color: #FF8000;
  }
  
  /* Styles spécifiques pour les liens "Première page" et "Dernière page" */
  .pagination a:first-child,
  .pagination a:last-child {
    background-color: #FF8000;
  }
  
  .pagination a:first-child:hover,
  .pagination a:last-child:hover {
    background-color: #FF6600;
  }

/* Personnalisation de la boîte de dialogue de confirmation */
.confirm-dialog {
  background-color: #005599;
  color: #FFF;
}

.confirm-dialog button {
  background-color: #FF8000;
}

</style>


    <?= $pageContent ?>
</body>

</html>