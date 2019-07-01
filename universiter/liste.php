

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>l'Aplication</title>
</head>
<body>
<form action="liste.php" method="$_POST"> 
<div>
          <label for="Nom">Recherche Etudiant </label>
          <input type="Nom" id="Nom" class="form-control" name="Nom"  placeholder="Recherche Etudiant">
        </div>
        <button type="submit" class="btn btn-danger">Rechercher</button>
</form>
</body>
</html>
  
<?php


    try{
        $connexion=new PDO('mysql:host=localhost;dbname=Universiter','bamba','18531927');

$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $connexion;
} 

catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
   }

    $requete="SELECT * FROM Etudiant WHERE Prenom ORDER BY Datenaissance" ;
  $connexion->prepare($requete); 
     if($connexion==true){
                    echo "<h1>le Resultat de votre Recherche </h1>";
                $nbEtudiant =$connexion;
                if($nbEtudiant>0){
                    echo "<table border='1'>\n";
                    echo "<tr>\n";
                    echo "<td><strong>Matricule</strong></td>\n";
                    echo "<td><strong>Nom</strong></td>\n";
                    echo "<td><strong>Prenom</strong></td>\n";
                    echo "<td><strong>Tel</strong></td>\n";
                    echo "<td><strong>Email</strong></td>\n";
                    echo "<td><strong>Datenaissance</strong></td>\n";
                    echo "</tr>\n";
                    while($Etudiant=$connexion){
                        echo "<tr>\n";
                        echo "<td>" . $Etudiant["Matricule"] . "</td>\n";
                        echo "<td>" . $Etudiant["Nom"] . "</td>\n";
                        echo "<td>" . $Etudiant["Prenom"] . "</td>\n";
                        echo "<td>"  . $Etudiant["Tel"] . "</td>\n";
                        echo "<td>" . $Etudiant["Email"] . "</td>\n";
                        echo "<td>" . $Etudiant["Datenaissance"] . "</td>\n";
                        echo "</tr>\n";
                    }
                    echo "</table>\n";
                } else{
                    echo "erreur dans l'exécution de la requete ";
                    echo " le message d'erreur est: " . mysql_error($connexion);
                }

    }


 
?>
   <p style="font-size: 30px"> <a href="index.html">RETOUR</a></p>