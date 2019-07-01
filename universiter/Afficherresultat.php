
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="fond.css">
	<title>Recherche</title>
	<style>
		table{width:90%;border-collapse:collapse;margin:55px;}
		table tr,table th,table td{border:2px solid black;}
		table tr td{text-align:center;padding:1em;}
	</style>
</head>
<body>
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
    ?>

<h1 align="center">Rechercher un Etudiant</h1>
<br/>
Rechercher:<br/>
	<form method='post'>
		<input type='text' placeholder='recherche' name="recherche_valeur"/>
		<input type='submit' value="Rechercher"/>
	</form>
	<table>
		<thead>
            <tr>
                <th  bgcolor="#669999">Matricule</th>
                <th  bgcolor="#669999">Nom</th>
                <th  bgcolor="#669999">Prenom</th>
                <th  bgcolor="#669999">Tel</th>
                <th  bgcolor="#669999">Email</th>
                <th  bgcolor="#669999">Datenaissance</th>
            </tr>
            
		</thead>
		<tbody>
            <?php
            $con=getconnexion();
				
            $sql='select * from Etudiant';
            $params=[];
            if(isset($_POST['recherche_valeur'])){
                $sql=' select * from Etudiant where Prenom like :Prenom';
                $params[':Prenom']="%".addcslashes($_POST['recherche_valeur'],'_')."%";
            }
            $resultats=$con->prepare(' select * from Etudiant where Prenom like :Prenom');
            //$resultats->execute($params);
				$resultats=$con->prepare('select * from Etudiant where Prenom like :Prenom');
				$resultats->execute($params);
				if($resultats->rowCount()>0){
					while($d=$resultats->fetch(PDO::FETCH_ASSOC)){
					?>
						<tr>
                            <td bgcolor="#CCCCCC"><?=$d['Matricule']?></td>
                            <td bgcolor="#CCCCCC"><?=$d['Nom']?></td>
                            <td bgcolor="#CCCCCC"><?=$d['Prenom']?></td> 
                            <td bgcolor="#CCCCCC"><?=$d['Tel']?></td> 
                            <td bgcolor="#CCCCCC"><?=$d['Email']?></td> 
                            <td bgcolor="#CCCCCC"><?=$d['Datenaissance']?></td>
                        </tr>
					<?php   
					}
					$resultats->closeCursor();
				}
				else echo '<tr><td colspan=6>aucun résultat trouvé</td></tr>'.
				$con=null;
            ?>
            
		</tbody>
    </table>
    <p style="font-size: 30px ; text-align:center"> <a href="index.html">RETOUR</a></p>
</body>
</html>
<?php
/*
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
//inclusion de tous ce que tu veut d'utilise pour la connection au sgbd (mysql ici)
$con=getconnexion();
if (isset($_POST['recherche'])) {
if (!empty($_POST['recherche'])|| ($_POST['recherche']==='0')){
$requete =$con->prepare('SELECT Matricule,Nom,Prenom,Tel,Email,Datenaissance, from Etudiant where  Matricule="" OR Nom="" OR Prenom="" OR Tel="" OR Email="" OR Datenaissance="" order by Nom asc');
$req = $requete->fetchAll();
if ($req === false) {
echo 'erreur SQL : '.$req.'<br />'.$requete.'<br />';
}
else { 
while($result=$requete->fetchAll())
if (mysql_num_rows($req)!=0){
echo("<table border=\"1\" width=\"714\">
    <tr>
        <td width=\"704\">
            <table border=\"0\" width=\"712\">
                <tr>
                    <td width=\"164\">

                        <p><b>Matricule:</b></p>
                    </td>
                    <td width=\"538\"><font color=\"blue\">".$result->Matricule."</font></td>
                </tr>
                <tr>
                <td width=\"164\">

                    <p><b>Nom:</b></p>
                </td>
                <td width=\"538\"><font color=\"blue\">".$result->Nom."</font></td>
            </tr>
                <tr>
                    <td width=\"164\" height=\"24\">
                        <p><b>Prenom:</b></p>
                    </td>
                    <td width=\"538\" height=\"24\"><font color=\"blue\">".$result->Prenom."</font></td>
                </tr>
                <tr>
                    <td width=\"164\" height=\"27\">
                        <p><b>Tel :</b></p>
                    </td>
                    <td width=\"538\" height=\"27\"><font color=\"blue\">".$result->Tel."</font></td>
                </tr>
                <tr>
                    <td width=\"164\" height=\"27\">
                        <p><b>Email:</b></p>
                    </td>
                    <td width=\"538\" height=\"27\"><font color=\"blue\">".$result->Email."</font></td>
                </tr>
                <tr>
                    <td width=\"164\" height=\"27\">
                        <p><b> Datenaissance :</b></p>
                    </td>
                    <td width=\"538\" height=\"27\"><font color=\"blue\"><a href=\"mailto:".$result->Datenaissance."\">".$result->Datenaissance."</a></font></td>
                </tr>
               
            </table>
        </td>
    </tr>
</table><br> \n") ;
}
else {
echo('<br><br><br><center><b><font color="blue">Votre recherche pour "'); echo($recherche); echo('" n\'a retourner aucun résultat.</font><br><a href="javascript:window.history.go(-1);">Revenir a la page de recherche</a>');
}
}
}
else {
echo('<br><br><br><center><b><font color="blue">Merci de saisir un nom, un prénom, un numéro de téléphonne ou une adresse email avant de lancer la recherche.</font><br><a href="javascript:window.history.go(-1);">Revenir a la page de recherche</a>');
}
}
?>*/