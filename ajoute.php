<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
include('function.php'); ?>
<center>
  <form action="ajoute.php" method="post">
  <table>
 <tr><th>cat</th><td><select name="cat" id=""><option value="pc">ordinateur</option><option value="souric">souric</option></select></td></tr>
<tr><th>ref</th><td><input type="text" name="ref"></td></tr>
<tr><th>NOM/</th><td><input type="text" name="nom"></td></tr>
<tr><th>prix</th><td><input type="number" name="prix"></td></tr>
<tr><th>marque</th><td><input type="text" name="marque"></td></tr>
</table>
<br>
<input type="submit" value="ajouter" >
<input type="reset" value="effacer">
  </form>
  </center>
  <?php 
       if(isset($_POST['cat']) and isset($_POST['ref']) and isset($_POST['nom']) and isset($_POST['prix']) and isset($_POST['marque']) ){
      if(!empty($_POST['cat']) and !empty($_POST['ref']) and !empty($_POST['nom']) and !empty($_POST['prix']) and !empty($_POST['marque'])){
       connexion();
       $sql1="select * from produits where ref='".$_POST['ref']."'";
    $reponse=$bdd->query($sql1);
    $donnes=$reponse->fetch();
    if(empty($donnes)){
      $sql2="insert into produits(ref,cat,nom,prix,marque) values('".$_POST['ref']."','".$_POST['cat']."','".$_POST['nom']."','".$_POST['prix']."','".$_POST['marque']."')";
      $bdd->exec($sql2);
      echo "<center> le produit est ajoutee avec succes </center>";
    }
    else
     echo "<center> le produit est deja existe </center>";
      }
 else
 echo "<center> entre les valeurs </center>";

       }
 
 
 
 
 
 
 ?>

</body>
</html>