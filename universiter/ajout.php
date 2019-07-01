

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf_8">
        
      
    <link rel="stylesheet" href="fond.css">
    <link rel="stylsheet" href="mode-modules/bootstrap/dist/css/bootstrap.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div align="center">
        <div class="container">
<h1>Ajout des Etudiants</h1>  
<div class="col-sm-6 hidden-xs animation animated-item-4">
        <form action="traitementAjout.php" method="POST">
          
        <div>
          <label for="Nom"></label>
          <input type="Nom" id="Nom" class="form-control" name="Nom"  placeholder="Nom">
        </div>
        <div>
          <label for="Prenom" ></label>
          <input type="text" id="Prenom" class="form-control" name="Prenom" placeholder="Prenom">
        </div>
        <div>
          <label for="Tel"></label>
          <input type="" id="Tel" class="form-control" name="Tel" placeholder="Tel">
        </div><div>
          <label for="Email"></label>
          <input type="text" id="Email" class="form-control" name="Email" placeholder="Email">
        </div>
        <div>
          <label for="datenaissance"></label>
          <input type="date" id="datenaissance"class="form-control" name="datenaissance" placeholder="Date De Naissance">
        </div>
        <div>
            <br>
            <p style="text-align=center">Type Etudiant</p>
            <div>
        <input type="radio" name="opt_rad" id="Nonboursier" value="nonboursier" onclick="showHideNonboursier();">Nonboursier
        <input type="radio" name="opt_rad" id="Boursier" value="boursier" onclick="showHideBoursier();">Boursier
        <input type="radio" name="opt_rad" id="loger" value="loger" onclick="showHideLoger();" />Loger
        </div>

        <div>
        <fieldset id="infoNonboursier">
          <label for="Adresse"></label>
          <input type="text" id="Adresse" class="form-control" name="Adresse" placeholder="Adresse">
          </fieldset>
         </div>
        <div>
        <fieldset id="infoBoursier">
            <label for="libeller"></label>
            <select name="type" id="type"  id="bourse" class="form-control">
              <option value="typebourse" disabled >Type de bourse</option>
              <option value="demi_bourse">demi_bourse</option>
              <option value="bourse_entier">bourse_entier</option>
            </select>
            </fieldset>
         </div> 
         <fieldset id="infologer">

         <label for="N-chambre">Numero Batimat</label>
         <select name="N_batimat" id="batimat" class="form-control">
         <option value="typebbatimat" disabled >Numéro Batimat</option>
          <?php 
         /* include_once('EtudiantService.php');
          $bd=getconnexion();
          $sql="SELECT N_batimat from Batimat";
          $req=$bd->query($sql);
          while($batimat=$req->fetch(PDO::FETCH_ASSOC)){
            $listbatimat=[];
            $listbatimat[]=$batimat['N_batimat'];
            //return $listChambre;
          }
          //var_dump($listbatimat);
         //die();
          
        
          $i=0;
          foreach ($listbatimat as $key) {
           echo '<option value="'.$key[$i].'">'.$key[$i].'</option>';
           $i++;
          }
        */
          ?>
            </select>
          <label for="N-chambre">Numero chambre</label>
          <?php 
          include_once('EtudiantService.php');
          $bd=getconnexion();
          $sql="SELECT N_chambre from chambre";
          $req=$bd->query($sql);
          while($chambres=$req->fetch(PDO::FETCH_ASSOC)){
            $listChambre=[];
            $listChambre[]=$chambres['N_chambre'];
            //return $listChambre;
          }
          //var_dump($listChambre);
         //die();
          
          echo "<select name=\"N_chambre\" id=\"chambre\"class=\"form-control\">Numero_chambre";
          $i=0;
          foreach ($listChambre as $key) {
           echo '<option value="'.$key[$i].'">'.$key[$i].'</option>';
           $i++;
          }
          echo "</select>";
          ?>
        </div>
        </fieldset>
        <button type="submit" class="btn btn-danger" name="ajouter">Ajouter</button>
      </form>
     <p style="font-size: 30px"> <a href="index.html">RETOUR</a></p>
      
  
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

<?php

?>
    </body>
    
   
</html> 

