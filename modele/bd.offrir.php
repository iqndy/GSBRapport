<?php
class Offrir{
    private $idRapport;
    private $idMedicament;
    private $quantite;
   
public function __construct($idRapport, $idMedicament, $quantite) {
    $this->idRapport = $idRapport;
    $this->idMedicament = $idMedicament;
    $this->quantite = $quantite;



}
public function getIdRapport() {
    return $this->idRapport;

}

public function getIdMedicament() {
    return $this->idMedicament;

}

public function getQuantite() {
    return $this->quantite;

}

public function setIdRapport($idRapport) {
    $this->idRapport = $idRapport;

}

public function setIdMedicament($idMedicament) {
    $this->idMedicament = $idMedicament;

}

public function setQuantite($quantite) {
    $this->quantite = $quantite;

}

}

