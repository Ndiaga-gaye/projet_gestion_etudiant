<?php
if(isset($_POST['search'])){
}
else{
$query= "SELECT *FROM Etudiant ";
$search_result=filterTable($query);
}
function filterTable($query) {
   $connect= mysqli_connect("localhost", "bamba", "18531927", "Universiter");
    $filter_Result=mysqli_query($connect,$query );
    return $filter_Result;
}

?>
<!DOCTYPE html>
<html >


<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="fond.css">
  <title>l'Aplication</title>
  <style >
     table{width:90%;border-collapse:collapse;margin:55px;}
		table tr,table th,table td{border:2px solid black;}
		table tr td{text-align:center;padding:1em;}
  </style>

</head>

<body>
<p  style="text-align:center; font-size:30px; color:violet" >LISTE DES ETUDIANTS</p>
         
        <table style="margin:55px;">
            <tr>
            <th bgcolor="#669999">Matricule</th>
            <th bgcolor="#669999">Nom</th>
            <TH bgcolor="#669999">Prenom</TH>
            <th bgcolor="#669999">Tel</th>
            <th bgcolor="#669999">Email</th>
            <th bgcolor="#669999" >Datenaissance</th>
        </tr>
        <?php while($row=mysqli_fetch_array($search_result)):?>
     <tr>
         <td bgcolor="#CCCCCC"> <?php echo $row['Matricule'];?></td>
         <td bgcolor="#CCCCCC"> <?php echo $row['Nom'];?></td>
         <td bgcolor="#CCCCCC"> <?php echo $row['Prenom'];?></td>
         <td bgcolor="#CCCCCC"> <?php echo $row['Tel'];?></td>
         <td bgcolor="#CCCCCC"> <?php echo $row['Email'];?></td>
         <td bgcolor="#CCCCCC"> <?php echo $row['Datenaissance'];?></td>
     </tr>
<?php endwhile; ?>

        </table> 
        <p style="font-size: 30px ; text-align:center"> <a href="index.html">RETOUR</a></p>
</body>
</html>
