
<?php
require 'site/conect.php';
Autoloader::register();
if(isset ($_POST['Matricule']) && $_POST['Nom'] && $_POST['Prenom'] && $_POST['Tel'] && $_POST['Email'] && $_POST['datenaissance']){
  $Service= new EtudiantService();
  $etudiant=new Boursier($_POST['Matricule'],$_POST['Nom'],$_POST['Prenom'],$_POST['Tel'],$_POST['Email'],$_POST['datenaissance']);
  $Service->add($etudiant);
}
?>