<?php
//require 'site/conect.php';
//Autoload::register();
class Loge extends Boursier {
    private $N_chambre;
    public function __constuct($Nom = "", $Prenom = "", $Tel= "",$Email= "", $datenaissance= "", $montant="",$libelle="", $N_chambre= ""){
parent::__construct($Nom,$Prenom,$Tel,$Email,$datenaissance,$montant,$libelle);
    $this->N_chambre=$N_chambre;
  
    
}

public function getN_chambre(){
    return $this->N_chambre;
}


public function setN_chambre($N_chambre){
    $this->N_chambre = $N_chambre;
}

 }
?>