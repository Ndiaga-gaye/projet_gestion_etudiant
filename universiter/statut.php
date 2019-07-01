
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf_8">
        
      
    <link rel="stylesheet" href="fond.css">
    <link rel="stylsheet" href="mode-modules/bootstrap/dist/css/bootstrap.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    

    <style >
     table{width:90%;border-collapse:collapse;margin:55px;}
		table tr,table th,table td{border:2px solid black;}
		table tr td{text-align:center;padding:1em;}
  </style>
</head>
    <body>
        <div align="center">
        <div class="container">
<h1>Liste des Catégories d'Etudiants</h1>  


<div>
        <input type="radio" name="opt_rad" id="Nonboursier" value="nonboursier" onclick="showHideNonboursier();">liste des Etudiants Nom Boursier
        <input type="radio" name="opt_rad" id="Boursier" value="boursier" onclick="showHideBoursier();">liste des Etudiants Boursier
        <input type="radio" name="opt_rad" id="loger" value="loger" onclick="showHideLoger();" /> liste des Etudiants Loger
 </div>
   
 <?php
if(isset($_POST['search'])){
}
else{
    
$query= "SELECT *FROM Boursier";
$search_result=filterTable($query);

}
function filterTable($query) {
   $connect= mysqli_connect("localhost", "bamba", "18531927", "Universiter");
    $filter_Result=mysqli_query($connect,$query );
    return $filter_Result;
}

?> 
<?php
if(isset($_POST['search'])){
}
else{
    
$query= "SELECT *FROM nomboursier";
$search1_result=filter1Table($query);

}
function filter1Table($query) {
   $connect= mysqli_connect("localhost", "bamba", "18531927", "Universiter");
    $filter_Result=mysqli_query($connect,$query );
    return $filter_Result;
}

?>  

    <?php
if(isset($_POST['search'])){
}
else{
    
$query= "SELECT *FROM Etudiantloger";
$search2_result=filter2Table($query);

}
function filter2Table($query) {
   $connect= mysqli_connect("localhost", "bamba", "18531927", "Universiter");
    $filter_Result=mysqli_query($connect,$query );
    return $filter_Result;
}

?>   
    <div>
     <fieldset id="infoBoursier">
        <table style="margin:55px;">;
            <tr>
            <th bgcolor="#669999">Matricule</th>
            <th bgcolor="#669999" >id_bourse</th>
            <th bgcolor="#669999" >Montant</th>
        </tr>
        <?php while($row=mysqli_fetch_array($search_result)):?>
     <tr>
         <td bgcolor="#CCCCCC"> <?php echo $row['Matricule'];?></td>
         <td bgcolor="#CCCCCC"> <?php echo $row['id_bourse'];?></td>
         <td bgcolor="#CCCCCC"> <?php echo $row['Montant'];?></td>
     </tr>
<?php endwhile; ?>
        </table>
        </fieldset> 
</div> 
  
<div>
     <fieldset id="infoNonboursier"> 
        <table style="margin:55px;">;
            <tr>
            <th bgcolor="#669999">Matricule</th>
            <th bgcolor="#669999" >Adresse</th>
        </tr>
        <?php while($row=mysqli_fetch_array($search1_result)):?>
     <tr>
         <td bgcolor="#CCCCCC"> <?php echo $row['Matricule'];?></td>
      
         <td bgcolor="#CCCCCC"> <?php echo $row['Adresse'];?></td>
     </tr>
<?php endwhile; ?>
    </ul>
        </table>
        </fieldset> 
</div> 

<div>
    <fieldset id="infologer">
        <table style="margin:55px;">;
            <tr>
            <th bgcolor="#669999">Matricule</th>
            <th bgcolor="#669999" >N_chambre</th>
            <th bgcolor="#669999" >id_chambre</th>
            
        </tr>
        <?php while($row=mysqli_fetch_array($search2_result)):?>
     <tr>
         <td bgcolor="#CCCCCC"> <?php echo $row['Matricule'];?></td>
         <td bgcolor="#CCCCCC"> <?php echo $row['N_chambre'];?></td>
         <td bgcolor="#CCCCCC"> <?php echo $row['id_chambre'];?></td>
         
     </tr>
<?php endwhile; ?>
        </table>

</fieldset>    
    </div>
        <p style="font-size: 30px ; text-align:center"> <a href="index.html">RETOUR</a></p>
</body>
</html>

    </body>
    
   
    </html> 
        
  
  <script>
    var nb=document.getElementById('infoNonboursier');
    nb.style.display='none';
    var b=document.getElementById('infoBoursier');
    b.style.display='none';
    var l=document.getElementById('infologer');
    l.style.display='none';

     function showHideNonboursier(){
       nb.style.display='block';
       b.style.display='none';
       l.style.display='none';
    }
    function showHideBoursier(){
      nb.style.display='none';
       b.style.display='block';
       l.style.display='none';
    }
    function showHideLoger(){
      nb.style.display='none';
       b.style.display='none';
       l.style.display='block';

    }

  </script>
