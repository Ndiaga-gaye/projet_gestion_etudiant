<?php
//require 'site/conect.php';
//Autoload::register();
class Boursier extends Etudiant{
    private $montant;
    private $libelle;
    public function __construct($Nom = "", $Prenom = "", $Tel= "",$Email= "", $datenaissance= "",$montant="",$libelle=""){
        parent::__construct($Nom,$Prenom,$Tel,$Email,$datenaissance);
      $this->montant=$montant;
      $this->libelle=$libelle;
    }
public function setMontant($montant){
  $this->montant=$montant;
}
public function getMontant(){
  return $this->montant;
}
public function setLibelle($libelle){
  $this->libelle=$libelle;
}
public function getLibelle(){
  return $this->libelle;
}

  }
?>