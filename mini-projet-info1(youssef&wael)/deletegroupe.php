<?php
  include("./auth-php-mysql/connexion.php");
  if(isset($_GET['deleteid'])){
      $id=$_GET['deleteid'];
      $req="delete from groupe where id_groupe=$id";
      $reponse = $pdo->query($req);
      if($reponse){
         header('location:affichergroupe.php');
         // echo"delete successfully";
      }else
      echo"error";

  }



 ?>