<?php

function getconnexion(){

try{
  $bdd=new PDO('mysql:host=localhost;dbname=Universiter','bamba','18531927');

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $bdd;
} 
catch (PDOException $e) {
 print "Erreur !: " . $e->getMessage() . "<br/>";
 die();
} 
}    

class EtudiantService {   
  public function add(Etudiant $etudiant)
  {

  /*if (isset($_POST['submit'])) {
    if (!empty($_POST['Matricule'])) {$Matricule = $_POST['Matricule'];
      }
    if (!empty($_POST['Nom'])) {$Nom = $_POST['nom'];
      }
    if (!empty($_POST['Prenom'])) {$Prenom = $_POST['Prenom'];
      }
    if (!empty($_POST['Tel'])) { $Tel = $_POST['tel'];
      }
    if (!empty($_POST['Email'])) {$Email = $_POST['Email'];
      }
    if (!empty($_POST['Datenaissance'])) {$Datenaissance = $_POST['Datenaissance'];
      }
    if (!empty($_POST['Adresse'])) {$Adresse = $_POST['Adresse'];
      }
      if (!empty($_POST['Type_bourse'])) { $Type_Bourse=$_POST['Type_bourse'];
      }
    if (!empty($_POST['N_chambre'])) {$N_chambre=$_POST['N_chambre'];
      }
  }*/

  $con=getconnexion();
  if (get_class($etudiant)=="NomBoursier"){
    $ins = $con->prepare("INSERT INTO Etudiant(Nom,Prenom,Tel,Email,Datenaissance)
    VALUES(:Nom, :Prenom, :Tel, :Email, :datenaissance)");
   // $ins->bindvalue(':Matricule',$etudiant->getMatricule(), PDO:: PARAM_STR);  
     $ins->bindvalue(':Nom',$etudiant->getNom(), PDO:: PARAM_STR);  
     $ins->bindvalue(':Prenom',$etudiant->getPrenom(), PDO:: PARAM_STR);
     $ins->bindvalue(':Tel',$etudiant->getTel(), PDO:: PARAM_INT );  
     $ins->bindvalue(':Email',$etudiant->getEmail(), PDO:: PARAM_STR );
     $ins->bindvalue(':datenaissance',$etudiant->getdatenaissance()); 
     $ins->execute();
  
     $select = $con->prepare("SELECT max(Matricule) as Matricule FROM Etudiant");
     $select->execute();
     $all_select = $select->fetchAll();
     $ide = $all_select[0]['Matricule'];
     $etudiant->getAdresse();
    $inse = $con->prepare("INSERT INTO nomboursier(Matricule,Adresse)
    VALUES(:Matricule,:Adresse)");
    $inse->bindValue(':Matricule',$ide, PDO:: PARAM_INT);  
    $inse->bindValue(':Adresse',$etudiant->getAdresse(), PDO:: PARAM_STR);  
    $inse->execute();
  
  }
  else if(get_class($etudiant)=="Boursier"){
  
    $inses = $con->prepare("INSERT INTO Etudiant(Nom,Prenom,Tel,Email,Datenaissance)
    VALUES(:Nom, :Prenom, :Tel, :Email, :datenaissance)");
    //$inses->bindvalue(':Matricule',$etudiant->getMatricule(), PDO:: PARAM_INT);  
     $inses->bindvalue(':Nom',$etudiant->getNom(), PDO:: PARAM_STR);  
     $inses->bindvalue(':Prenom',$etudiant->getPrenom(), PDO:: PARAM_STR);
     $inses->bindvalue(':Tel',$etudiant->getTel(), PDO:: PARAM_INT );  
     $inses->bindvalue(':Email',$etudiant->getEmail(), PDO:: PARAM_STR );
     $inses->bindvalue(':datenaissance',$etudiant->getdatenaissance()); 
     $resultat=$inses->execute();
  //recuperation de Matricule et id_bourse
    $select = $con->prepare("SELECT max(Matricule) as Matricule FROM Etudiant");
    $select->execute();
    $all_select = $select->fetchAll();
    $ide = $all_select[0]['Matricule'];

    $libelle=$etudiant->getLibelle();
    $ise=$con->prepare("SELECT id_bourse FROM type_bourse WHERE Libelle='$libelle'");
    $ise->execute();
    $typ=$ise->fetchAll(PDO::FETCH_ASSOC);
    $idt=$typ[0]['id_bourse'];

    //var_dump($typ);
    
    $insees = $con->prepare("INSERT INTO Boursier(Matricule,id_bourse,Montant)
    VALUES(:Matricule,:id_bourse,:Montant)");
     $insees->bindvalue(':Matricule',$ide, PDO:: PARAM_INT);  
     $insees->bindvalue(':id_bourse',$idt, PDO:: PARAM_INT);  
     $insees->bindvalue(':Montant',$etudiant->getMontant(), PDO:: PARAM_INT);  
    $insees->execute();
  }
  //AJOUT DE LOGER
  else if (get_class($etudiant)=='Loge'){
    $insesc = $con->prepare("INSERT INTO Etudiant(Nom,Prenom,Tel,Email,Datenaissance)
    VALUES(:Nom, :Prenom, :Tel, :Email, :datenaissance)");
    //$insesc->bindvalue(':Matricule',$etudiant->getMatricule(), PDO:: PARAM_INT);  
     $insesc->bindvalue(':Nom',$etudiant->getNom(), PDO:: PARAM_STR);  
     $insesc->bindvalue(':Prenom',$etudiant->getPrenom(), PDO:: PARAM_STR);
     $insesc->bindvalue(':Tel',$etudiant->getTel(), PDO:: PARAM_INT );  
     $insesc->bindvalue(':Email',$etudiant->getEmail(), PDO:: PARAM_STR );
     $insesc->bindvalue(':datenaissance',$etudiant->getdatenaissance()); 

      $insesc->execute();
  // recuperation de Matricule et N_chambre
      $lo=$con->prepare("SELECT max(Matricule) as Matricule FROM Boursier");
      $lo->execute(array());
      $log=$lo->fetchAll();
      //var_dump($log);
      die();
      $idee=$log[0]['Matricule'];
      $lo1=$con->prepare("SELECT id_chambre FROM Chambre  WHERE N_chambre=".$etudiant->getN_chambre());
      $lo1->execute();
    $log1=$lo1->fetchAll();
   // var_dump($log1);
    $loge1=$log1[1]['id_chambre'];
  
    //var_dump($loge1);
   // die();
  

    $inseess = $con->prepare("INSERT INTO Etudiantloger(Matricule,id_chambre)
    VALUES(:Matricule,:id_chambre,)");
    $insees->bindvalue(':Matricule',$idee, PDO:: PARAM_INT);  
    $insees->bindvalue(':id_chambre',$loge1, PDO:: PARAM_INT);  
    $inseess->execute();

    }
  }
    }
   /* $con=getconnexion();
    $requet=$con->prepare("INSERT INTO Etudiant(Nom, Prenom, Tel, Email, datenaissance) 
    VALUES ( :Nom, :Prenom, :Tel, :Email, :datenaissance)" );
     $requet->bindvalue(':Nom',$etudiant->getNom(), PDO:: PARAM_STR);  
     $requet->bindvalue(':Prenom',$etudiant->getPrenom(), PDO:: PARAM_STR);
     $requet->bindvalue(':Tel',$etudiant->getTel(), PDO:: PARAM_INT );  
     $requet->bindvalue(':Email',$etudiant->getEmail(), PDO:: PARAM_STR );
     $requet->bindvalue(':datenaissance',$etudiant->getdatenaissance()); 
     $valider = $requet->execute();
     if($valider==true) {
       echo "l'étudiant a été ajouter!!!";
     } 
     else{
       echo "l'étudiant n'est pas ajouter!!!";
     }           
  
    
if(get_class($etudiant)=="Boursier"){
  $stml=$con->prepare("INSERT INTO Boursier(Matricule,id_bourse )
   VALUES (:Matricule, :id_bourse)");
  $Matricule=$etudiant->$valider=$con->fetch();
  $id_bourse=$etudiant->$valider=$con->fetch();
}
else if (get_class($etudiant)=="NomBoursier"){
  $sql=$con->prepare ("INSERT INTO NomBoursier( Matricule, Adresse,) VALUES(Matricule, :Adresse)");
  $sql->execute();
   $Adresse=$etudiant->getAdresse();
}
else if (get_class($etudiant)=='logé'){
  $sql= $con->prepare("INSERT INTO Etudiant_logé (id_chambre ,Id_bourse) VALUES(:id_chambre, :Id_bouse");
  $Etudiant_logé=$etudiant->getEtudiant_loger();
 */  

     /*public function find($Matricule)
    {

      $con=getconnexion();
      $requete="SELECT * FROM Etudiant WHERE id=$Matricule";
      $stmt = $con->query($requete);
      $rows=$con->fetchAll();
      if(!empty($rows)){
        return $rows[0];
      }
    }

    public function findAll()
    {
      $con=getconnexion();
      $requete='SELECT * FROM Etudiant';
      $rows = $con->query($requete);
      return $rows;
      
    }
    public function findBoursier($id_boursier,$Matricule)
    {
      $con=getconnexion();
      $requete="SELECT * FROM Etudiant WHERE id=$Matricule and id=$id_boursier";
      $stml = $con->query($requete);
      $rows=$con->fetchAll();
      if(!empty($rows)){
        return $rows[0];
      }
      
  }
    public function findAllBoursier($id_boursier)
    {

      $con=getconnexion();
      $requete="SELECT * FROM Etudiant WHERE id=$id_boursier";
      $qtml = $con->query($requete);
      $row=$con->fetchAll();
      if(!empty($rows)){
        return $row[0];
      }

    }
    public function findNomboursier($Matricule,$Adresse)
    {

      $con=getconnexion();
      $requete="SELECT * FROM Etudiant WHERE id=$Matricule and id=$Adresse";
      $utml = $con->query($requete);
      $rows=$con->fetchAll();
    }
    public function findAllNomboursier( )
    {

    }
    public function checkStatut($Matricule,$id_boursier,$id_chambre)
    {

     }
	*/
  
?>