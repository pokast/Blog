<?php
class Blog {

    // Declaration des attributs
    private $id;
    private $titre;
    private $date;
    private $commentaire;
    private $photo;


    //Accesseurs

    public function getId()
    {
        return $this->id; // retourne l'identifiant
    }
    public function setId($id)
    {
        $this->id = $id; // Ecrit dans l'attribut id
    }
    public function getTitre()
    {
        return $this->titre;
    }
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }
    public function getCommentaire()
    {
        return $this->commentaire;
    }
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    public function getPhoto()
    {
        return $this->photo;
    }
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }
}