<?php
   class Etudiant {
    //private $Matricule;
    private $Nom;
    private $Prenom;
    private $Tel;
    private $Email;
    private $datenaissance;
    public function __construct($Nom = "", $Prenom = "", $Tel= "",$Email= "", $datenaissance= ""){
      $this->Nom=$Nom;
      $this->Prenom=$Prenom;
      $this->Tel=$Tel;
      $this->Email=$Email;
      $this->datenaissance=$datenaissance;
    }
    public function getNom (){
      return $this->Nom;
    }
    public function getPrenom (){
      return $this->Prenom;
    }
    public function getTel (){
      return $this->Tel;
    }

    public function getEmail (){
      return $this->Email;
    }
    public function getdatenaissance (){
      return $this->datenaissance;
    }
  public function setNom($Nom)
  {
    $this->Nom = $Nom;

}
  public function setPrenom($Prenom)
  {
   $this->Prenom=$Prenom; 
  }
  public function setTel($Tel)
  {
   $this->Tel=$Tel; 
  }
  public function setEmail($Email)
  {
   $this->Email=$Email; 
  }
  public function setdatenaissance($datenaissance)
  {
   $this->datenaissance=$datenaissance; 
  }

  






   }
?>