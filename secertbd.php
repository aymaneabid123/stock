<?php 
   try
   {
       global $bdd;
       $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

   }
   catch (Exception $e)
   {
           die('Erreur : ' . $e->getMessage());
   }
   
   $sql1="select * from clients";
   $reponse=$bdd->query($sql1);
   $authentification=false;
  while ($donnes=$reponse->fetch()){
 if($_POST['login'] == $donnes['nom'] AND $_POST['mdp'] == $donnes['password']){
       $authentification=true; 
      
        ?>
       
       <h1>le code d'acces est </h1>
       <p>gh-123-gh-525</p>
       <?php 
       
    }
    }
    if($authentification==false){
        echo "ce compte ne disponible pas";
    
    }
    
    
    ?>