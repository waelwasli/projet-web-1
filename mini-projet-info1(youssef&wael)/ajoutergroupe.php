<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
   else
      $bienvenue="Bonsoir et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
?>
<?php
  include("./auth-php-mysql/connexion.php");
  if(isset($_POST['ajouter'])){
    $classe=$_POST['classe'];
    $id=$_POST['id_groupe'];

    $sel=$pdo->prepare("select nomGroupe from groupe where nomGroupe=? limit 1");
    $sel->execute(array($classe));
    $tab=$sel->fetchAll();
    if(count($tab)>0)
       $erreur="NOT OK";// groupe existe déja
    else{
       $req="insert into groupe(id_groupe,nomGroupe) values ($id,'$classe')";
       header('location:affichergroupe.php');
       $reponse = $pdo->exec($req) or die("error");
       $erreur ="OK";
    }  
    echo $erreur;
   
}

    
    
    
  


   ?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Afficher Etudiants</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">
    <!--icon library-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    

</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">SCO-Enicar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
        
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>              <div class="dropdown-menu" aria-labelledby="dropdown01">
                
                <a class="dropdown-item" href="afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
                <a class="dropdown-item" href="affichergroupe.php">Lister tous les groupes</a>
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="ajouterEtudiant.php">Ajouter Etudiant</a>
                <a class="dropdown-item" href="afficherEtudiants.php">Lister tous les étudiants</a>
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Absences</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="gestionabsence.php">faire l'appel</a>
              <a class="dropdown-item" href="saisirAbsence1.php">feuille de présence</a>
              </div>
            </li>
      
            <li class="nav-item active">
              <a class="nav-link" href="login.php">Se Déconnecter <span class="sr-only">(current)</span></a>
            </li>
      
          </ul>
        
      
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Saisir un groupe" aria-label="Chercher un groupe">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher Groupe</button>
          </form>
        </div>
      </nav>
      
<main role="main">
        <div class="jumbotron">
            <div class="container">
              <h1 class="display-4">Ajout des groupes</h1>
              <p>Cliquer sur le bouton afin d'ajouter le groupe!</p>
            </div>
          </div>
 <div class="container">         
 <form action="" method="post">
 <div class="form-group">
     <label for="classe">GROUPE:</label><br>
     <input type="text" id="classe" name="classe" class="form-control" required pattern="INFO[1-3]{1}-[A-E]{1}"
     title="Pattern INFOX-X. Par Exemple: INFO1-A, INFO2-E, INFO3-C">
    </div>

    <div class="form-group">
     <label for="classe">ID:</label><br>
     <input type="text" id="classe" name="id_groupe" class="form-control" required>
    </div>
    <button  type="submit" class="btn btn-primary btn-block"  name="ajouter" >Ajouter</button>
</div>
 </form>         
</main>
<div class="container">
<footer class="container text-center m-5">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
  </div>
</body>
</html>