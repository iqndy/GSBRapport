<?php
class Medecin{
    private $id;
    private $nom;
    private $prenom;
    private $adresse;
    private $tel;
    private $specialiteComplementaire;
    private $departement;

    public function __construct($id, $nom, $prenom, $adresse, $tel, $specialiteComplementaire, $departement) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->tel = $tel;
        $this->specialiteComplementaire = $specialiteComplementaire;
        $this->departement = $departement;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getSpecialiteComplementaire() {
        return $this->specialiteComplementaire;
    }

    public function getDepartement() {
        return $this->departement;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function setSpecialiteComplementaire($specialiteComplementaire) {
        $this->specialiteComplementaire = $specialiteComplementaire;
    }

    public function setDepartement($departement) {
        $this->departement = $departement;
    }
}