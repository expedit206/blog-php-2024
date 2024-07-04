
<?php

// Configuration
$articlesPerPage = 6; // Nombre d'articles par page

// Utilisation de filter_input pour une meilleure sécurité
$page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT) ?: 1;

// Récupération des articles depuis votre source de données
$allArticles = getAllArticles(); // Fonction pour récupérer tous les articles
$totalArticles = count($allArticles); // Nombre total d'articles

// Calcul du nombre total de pages
$totalPages = ceil($totalArticles / $articlesPerPage);

// Vérification de la validité de la page demandée
$page = max(1, min($page, $totalPages));

// Calcul des indices de début des articles à afficher
$startIndex = ($page - 1) * $articlesPerPage;

// Récupération des articles à afficher pour la page actuelle
$articles = array_slice($allArticles, $startIndex, $articlesPerPage);

// Affichage des articles
echo "<h1>Nos articles</h1>";
echo "<p>Il y a " . count($allArticles) . " articles.</p>";
echo '<div class="article-grid">';
foreach ($articles as $article) {
    echo '<div class="article">';
        echo '<h2>' . htmlspecialchars($article['title']) . '</h2>';
        echo '<small>Ecrit le ' . htmlspecialchars($article['created_at']) . '</small>';
        echo '<p>' . htmlspecialchars($article['introduction']) . '</p>';
        echo '<a href="index?controller=article&task=show&id=' . urlencode($article['id']) . '">Lire la suite</a>';
    echo '</div>';
}
echo '</div>';

// Affichage des liens de pagination
echo "<div class='pagination'>";
if ($totalPages > 1) {
    echo $page > 1 ? "<a href='index?page=1'>Première page</a> <a href='index?page=" . ($page - 1) . "'>Page précédente</a> " : '';
    for ($i = 1; $i <= $totalPages; $i++) {
        echo $i == $page ? "<span class='current-page'>$i</span> " : "<a href='index?page=$i'>$i</a> ";
    }
    echo $page < $totalPages ? "<a href='index?page=" . ($page + 1) . "'>Page suivante</a> <a href='index?page=$totalPages'>Dernière page</a> " : '';
}
echo "</div>";

// Fonction pour récupérer tous les articles
function getAllArticles()
{
    $pdo = new PDO('mysql:host=localhost;dbname=blog-php-2024;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $query = "SELECT * FROM articles ORDER BY created_at DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
}


echo '<a href="../admin-authenticationerfzeh44554.php">Se connecter</a>';
?>
