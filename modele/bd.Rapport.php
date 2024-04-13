<?php
class Rapport {
    private $id;
    private $dates;
    private $motif;
    private $bilan;
    private $medecin_id;
    private $visiteur_id;

    public function __construct($id, $dates, $motif, $bilan, $medecin_id, $visiteur_id) {
        $this->id = $id;
        $this->dates = $dates;
        $this->motif = $motif;
        $this->bilan = $bilan;
        $this->medecin_id = $medecin_id;
        $this->visiteur_id = $visiteur_id;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getDates() {
        return $this->dates;
    }

    public function getMotif() {
        return $this->motif;
    }

    public function getBilan() {
        return $this->bilan;
    }

    public function getMedecinId() {
        return $this->medecin_id;
    }

    public function getVisiteurId() {
        return $this->visiteur_id;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setDates($dates) {
        $this->dates = $dates;
    }

    public function setMotif($motif) {
        $this->motif = $motif;
    }

    public function setBilan($bilan) {
        $this->bilan = $bilan;
    }

    public function setMedecinId($medecin_id) {
        $this->medecin_id = $medecin_id;
    }

    public function setVisiteurId($visiteur_id) {
        $this->visiteur_id = $visiteur_id;
    }
}