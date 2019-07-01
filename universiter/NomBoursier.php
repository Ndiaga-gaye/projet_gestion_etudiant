<?php
//require 'site/conect.php';
//Autoload::register();
class NomBoursier extends Etudiant{
    private $adresse;
    public function __construct($Nom = "", $Prenom = "", $Tel= "",$Email= "", $datenaissance= "",$adresse= "")
    {
      parent::__construct($Nom,$Prenom,$Tel,$Email, $datenaissance);
      $this->adresse=$adresse;
    }

    public function getAdresse()
    {
        return $this->adresse;
  }
  public function setAdresse($adresse)
  {
      $this->adresse = $adresse;
  }
}
?>