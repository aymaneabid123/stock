<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php 
include('function.php');
	if(isset($_GET['reference']))
	{
		connexion();
		$sql1="select * from produits where ref='".$_GET['reference']."'";
		$reponse = $bdd->query($sql1);
		$enreg = $reponse->fetch()
		
?>
			<center>
			<h3>Modification du produit : <?php echo $_GET['reference'] ?></h3>
			<form action="modifier.php" method="post">
			<table border="1">
			<tr><td bgcolor="#00FF99">Catégorie</td><td><input type="text" name="categ" value="<?php echo $enreg['cat']; ?>"></td></tr>
			<tr><td bgcolor="#00FF99">Nom</td><td><input type="text" name="nom" value="<?php echo $enreg['nom']; ?>"></td></tr>
			<tr><td bgcolor="#00FF99">Marque</td><td><input type="text" name="marque" value="<?php echo $enreg['marque']; ?>"></td></tr>
			<tr><td bgcolor="#00FF99">Prix</td><td><input type="text" name="prix" value="<?php echo $enreg['prix']; ?>"></td></tr>
			</table>
			<input type="submit" value="Modifier"> &nbsp;&nbsp;<input type="reset" value="Annuler">
			<input type="hidden" name="reference" value="<?php echo $_GET['reference']; ?>">
			</form>
			</center>
<?php
		}
    
	// mise à jour de produit
	if(isset($_POST['nom']) and isset($_POST['marque']) and isset($_POST['prix']))
	{
		connexion();
		$sql="update produits set nom='".$_POST['nom']."', marque='".$_POST['marque']."', prix='".$_POST['prix']."' where ref= '".$_POST['reference']."'";
		$bdd->exec($sql);
		echo '<center> Modification du produit <strong>'.$_POST['nom'].'</strong> effectué avec succés </center>' ; //alerte('Modification du produit'.$_POST['nom'].' effectué avec succés');

	}
?>
</body>
</html>