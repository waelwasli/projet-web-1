<?php 
  include("./auth-php-mysql/connexion.php");
   if(isset($_POST['classe'])){
   $classe=$_POST['classe'];
   
   switch($classe){
      case "INFO1-A":
        $req="SELECT * FROM  etudiant WHERE classe= 'INFO1-A'";
        $reponse=$pdo->query($req);
        break;
      case "INFO1-B":
        $req="SELECT * FROM  etudiant WHERE classe= 'INFO1-B'";
        $reponse=$pdo->query($req);
        break;
      case "INFO1-C":
           $req="SELECT * FROM  etudiant WHERE classe= 'INFO1-C'";
          $reponse=$pdo->query($req);
          break;
      case "INFO1-D":
             $req="SELECT * FROM  etudiant WHERE classe= 'INFO1-D'";
            $reponse=$pdo->query($req);
            break;
      case "INFO1-E":
              $req="SELECT * FROM  etudiant WHERE classe= 'INFO1-E'";
              $reponse=$pdo->query($req);
              break; 
      default:
         break;
     }
   }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Etudiants Par CLasse</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">

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
                <a class="nav-link dropdown-toggle" href="index.html" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>              <div class="dropdown-menu" aria-labelledby="dropdown01">
               
                <a class="dropdown-item" href="afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
                <a class="dropdown-item" href="affichergroupe.php">Lister tous les groupes</a>
                
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
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
              <h1 class="display-4">Afficher la liste d'étudiants par groupe</h1>
              <p>Cliquer sur la liste afin de choisir une classe!</p>
            </div>
          </div>

<div class="container">
<form  action="" method="post"> 
<div class="form-group">
<label for="classe">Choisir une classe:</label><br>
<?php
  $req="SELECT distinct nomGroupe FROM  groupe ";
  $groupe=$pdo->query($req);
  echo "<select id='classe' name='classe' class='custom-select custom-select-sm custom-select-lg'>";
  while(($row = $groupe->fetch(PDO::FETCH_ASSOC))){
   echo" <option value='".$row['nomGroupe']."'>".$row['nomGroupe']."</option>";
  }
  echo"</select>";
  ?>
<button  type="submit" class="btn btn-primary btn-block"  name="submit">Afficher</button>
<?php
if(isset($_POST['submit']))
{

echo'<table class="table table-striped table-hover  mt-5">
     <!--Ligne Entete-->
     <tr>
         <th>
             CIN
         </th>
         <th>
             Nom
         </th>
         <th>
             Prénom
         </th>
         <th>
             Email
         </th>
         <th>
          Adresse
         </th>';

while(($row = $reponse->fetch(PDO::FETCH_ASSOC))){
  ?>
          <?php  $cin=$row['cin'];
            $nom=$row['nom'];
            $prenom=$row['prenom'];
            $email=$row['email'];
           // $classe=$row['classe'];
            $adresse=$row['adresse'];
           echo'<tr>
           <td>'
               .$cin.'
           </td>
           <td>'
               .$nom.'
           </td>
           <td>'
               .$prenom.'
           </td>
           <td>'
               .$email.'
           </td>
  
           <td>'
            .$adresse.'
          </td>
          </tr>';
          }
        }
        
        ?>
 </table>       
</div>
</form>
</div>  
</main>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
</footer>
<script>

  
</script>
</body>

</html>