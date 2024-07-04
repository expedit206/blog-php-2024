<?php
session_start();
/**
 * Création d'un administrateur et authentification
 */

// Connexion à la base de données avec PDO
require_once('libraries/autoload.php');
require_once('./vendor/autoload.php');

$pdo = \libraries\Database::getPdo();
// Vérification si l'administrateur existe déjà
$query = $pdo->prepare('SELECT COUNT(*) AS count FROM administrators WHERE role = "admin"');
$query->execute();
$result = $query->fetch();

if ($result['count'] === 1) {
    // L'administrateur n'existe pas, création du compte
    $username = 'lele'; // Nom d'utilisateur de l'administrateur
    $password = '123'; // Mot de passe de l'administrateur

    // Hashage du mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insertion de l'administrateur dans la base de données
    $query = $pdo->prepare('INSERT INTO administrators (username, password, role) VALUES (?, ?, "admin")');
    $query->execute([$username, $hashedPassword]);

    echo "Le compte administrateur a été créé avec succès !";
}

// Vérification de l'authentification de l'utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Récupération des informations de l'utilisateur depuis la base de données
    $query = $pdo->prepare('SELECT * FROM administrators WHERE username = ?');
    $query->execute([$username]);
    $user = $query->fetch();

    if ($user && password_verify($password, $user['password']) && $user['role'] === 'admin') {
        // Authentification réussie, l'utilisateur est un administrateur
        // Redirection vers la page d'ajout d'article ou effectuer l'opération d'ajout ici
        header("Location: public/index.php?task=add");
        exit();
    } else {
        // Authentification échouée
        echo "<p style='color: #fff;padding:20px; background:#FF6600; width:400px'> Nom d'utilisateur ou mot de passe incorrect ! </p>";
        
    }
}


/**
 *  Affichage
 */
$pageTitle = "Connexion administrateur";


\libraries\Renderer::render("admin/admin-authentication");
