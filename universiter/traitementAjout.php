<?php
require 'site/conect.php';
 Autoloader::register();
 if(isset ($_POST['ajouter'])) {
   echo $_POST['N_chambre'];
    $Service= new EtudiantService();
  if($_POST['type']=="demi_bourse"){
    $montant=20000;
  }
  else{
    $montant=40000;
  }
  
  if($_POST['opt_rad']=="boursier"){
    $etudiant=new Boursier($_POST['Nom'],$_POST['Prenom'],$_POST['Tel'],$_POST['Email'],$_POST['datenaissance'],$montant,$_POST['type']);
  $resultat=$Service->add($etudiant);
  echo "étudiant ajouté";
  }
  else if($_POST['opt_rad']=="nonboursier"){
    $etudiant=new NomBoursier($_POST['Nom'],$_POST['Prenom'],$_POST['Tel'],$_POST['Email'],$_POST['datenaissance'],$_POST['Adresse']);
    $Service->add($etudiant);
    echo "étudiant ajouté";
    
  }
 else if($_POST['opt_rad']=="loger"){
  $etudiant=new Loge($_POST['Nom'],$_POST['Prenom'],$_POST['Tel'],$_POST['Email'],$_POST['datenaissance'],$montant,$_POST['type'],$_POST['N_chambre']);
  $Service->add($etudiant);
  echo "étudiant ajouté";
 }
}

?>
<p style="font-size: 30px ; text-align:center"> <a href="ajout.php">Ajouter un Autre</a></p>