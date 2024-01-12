<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
		include('function.php');
		connexion();
		$sql="delete from produits where ref='".$_GET['reference']."'";
		$reponse = $bdd->query($sql);
		echo "<center> Le produit de référence : <strong>".$_GET['reference']."</strong> est supprimé avec succés</center>";
	?>
</body>
</html>