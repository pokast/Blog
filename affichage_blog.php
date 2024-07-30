<?php

include('Blog.class.php');
include('Manager.class.php');

try {
    // Connexion à la base de données
    $base = new PDO('mysql:host=localhost;dbname=Blog', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $manager = new Manager($base);
    $tableau_retour = $manager->getContenuParDate();
    if (empty($tableau_retour)) {
        echo "Aucun message.";
    } else {
        date_default_timezone_set('Europe/Paris');
        foreach ($tableau_retour as $valeur) { // $valeur contient l'objet Blog
            $dt_debut = date_create_from_format('Y-m-d H:i:s', $valeur->getDate());
            echo "<h3>" . $valeur->getTitre() . "</h3>";
            echo "<h4> Le " . $dt_debut->format('Y-m-d H:i:s') . "</h4>";
            echo "<div style=\"width:400px\">";
            echo $valeur->getCommentaire() . "</div>";

            if ($valeur->getPhoto() != "") {
                echo "<img src='photos/" . $valeur->getPhoto() . "' width='200px' height='200px'/>";
            }
            echo "<hr />";
        }
    }
} catch (Exception $e) {
    // Message en cas d'erreur
    die('Erreur : ' . $e->getMessage());
}

?>

<br />
<a href="formulaire_ajout.php">Retour à la page d'insertion</a>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    
</body>
</html>
