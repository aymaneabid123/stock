<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <?php   include('function.php') ?>
<form action="chercher.php" method="POST">
<table>
    <tr><th>mot cle:</th><td><input type="text" name="mc"></td></tr>
</table>
<br>
<input type="submit" value="ajouter" >
<input type="reset" value="effacer">
</form>
<?php 
if(isset($_POST['mc'])){
if(!empty($_POST['mc'])){
      connexion();
      $sql1="select * from produits where ref='".$_POST['mc'].
      "' or nom='".$_POST['mc']."' or marque='".$_POST['mc'].
      "' or prix='".$_POST['mc']."' or cat='".$_POST['mc']."'";
      $reponse=$bdd->query($sql1);
      $nblign=$reponse->rowcount();
      echo "<center> <b>Il y a ".$nblign." Produit(s)</b></center>";
      ?>
<table border=1><tr bgcolor="#FF9966"><th>ref</th><th>cat</th><th>nom</th><th>prix</th><th>marque</th></tr>
<?php      
while($donnes=$reponse->fetch()){
         echo "<tr><td>".$donnes['ref']."</td>";
         echo "<td>".$donnes['cat']."</td>";
         echo "<td>".$donnes['nom']."</td>";
         echo "<td>".$donnes['prix']."</td>";
         echo "<td>".$donnes['marque']."</td>";
         echo "<td><a href='modifier.php?reference=".$donnes['ref']."'>Modifier</a> 
         &nbsp;<a href='supprimer.php?reference=".$donnes['ref']."'>Supprimer</a></td>";
         echo "</tr>";
       }



echo "</table>";   
}
else echo"mc est vide";
}

?>

</body>
</html>