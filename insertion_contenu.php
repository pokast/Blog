<?php

    include('Blog.class.php');
    include('Manager.class.php');
    // Connection à la base de données
    try {
        $base = new PDO('mysql:host=localhost;dbname=Blog', 'root', '');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_FILES['photo']['error']) {
            switch ($_FILES['photo']['error']) {
                case 1: // UPLOAD_ERR_INI_SIZE
                    echo "La taille du fichier est plus grande que la limite autorisée par le formulaire (parametre upload_max_filesize du fichier php.ini).";
                    break;
                case 2: // UPLOAD_ERR_FORM_SIZE
                    echo "La taille du fichier est plus grande que la limite autorisée par le formulaire (parametre post_max_size du fichier php.ini).";
                    break;
                case 3: // UPLOAD_ERR_PARTIAL  
                    echo "L'envoi du fichier à été interrompu pendant le transfert.";
                    break;
                case 4: // UPLOAD_ERR_NO_FILE
                    echo "La taille du fichier que vous avez envoyé est nulle.";
                    break;
            }
        } else {
            // Si il n'y a pas d'erreur alors $_FILES ['nom_du_fichier']
            // ['error'] vaut 0

            echo "Aucune erreur dans le transfert du fichier. <br />";
            if ((isset($_FILES['photo']['name']) && ($_FILES['photo']['error'] == UPLOAD_ERR_OK))) {

                $chemin_destination = 'photos/';

                // Deplacement du fichier du repertoire temporaire (stocké par défaut)
                // Dans le repertoire de destination
                move_uploaded_file($_FILES['photo']['tmp_name'], $chemin_destination.$_FILES['photo']['name']);

                echo "Le fichier ".$_FILES['photo']['name']." a été copié dans le repertoire photos";
            } else {
                echo "Le fichier n'a pas pu être copié dans le repertoire photos.";
            }
        }

        $manager = new Manager($base);

        // Creation d'un objet Blog avec les valeurs de ses attributs
        // Completées par celle recues par $_POST

        $blog = new Blog();
        $blog->setTitre(htmlentities(addslashes($_POST['titre']), ENT_QUOTES));
        $blog->setDate(date("Y-m-d H:i:s"));
        $blog->setCommentaire(htmlentities(addslashes($_POST['commentaire']), ENT_QUOTES));
        $blog->setPhoto($_FILES['photo']['name']);
        $identifiant = $manager->insertionContenu($blog);

        if ($identifiant != 0) {
            echo "<br /> Ajout du commentaire réussi. <br />";
        } else {
            echo "<br /> Le commentaire n'a pas pu être ajouté. <br />";
        }

    } catch (Exception $e) { // Message en cas d'erreur
        die('Erreur : ' . $e->getMessage());
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <a href="formulaire_ajout.php">retour à la page d'insertion</a>
</body>
</html>
