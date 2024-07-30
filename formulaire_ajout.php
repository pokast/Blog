<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <h3>Formulaire d'ajout de contenu au Blog</h3>

    <form action="insertion_contenu.php" method="post" enctype="multipart/form-data">
        <p>Titre: <input type="text" name="titre" /></p>
        <p>Commentaire: <br /><textarea name="commentaire" rows="10" cols="50"></textarea></p>
        <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
        <P>Choisissez une photo avec une taille inférieure à 2 Mo.</P>
        <input type="file" name="photo"> <br />
        <input type="submit" name="ok" value="Envoyer">
    </form>
    <br />
    <a href="affichage_blog.php">page d'affiche du blog</a>
</body>
</html>