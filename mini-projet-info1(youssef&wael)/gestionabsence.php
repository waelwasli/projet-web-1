<?php
 include("./auth-php-mysql/connexion.php");
session_start();

if (isset($_POST['classe']))
{
    $classe=$_POST['classe'];
    if($classe=="INFO1-A")
    {
        $req="select * from etudiant where classe ='INFO1-A'";
        $stmt=$pdo->query($req);
    }
    else if($classe=="INFO1-B")
    {
        $req="select * from etudiant where classe ='INFO1-B'";
        $stmt=$pdo->query($req);
    }
    else if($classe=="INFO1-C")
    {
        $req="select * from etudiant where classe ='INFO1-C'";
        $stmt=$pdo->query($req);
    }
    else if($classe=="INFO1-D")
    {
        $req="select * from etudiant where classe ='INFO1-D'";
        $stmt=$pdo->query($req);
    }
    else if($classe=="INFO1-E")
    {
        $req="select * from etudiant where classe ='INFO1-E'";
        $stmt=$pdo->query($req);
    }
    
}
?>

<?php     
          if (isset($_POST['ajouter'])) {
           
          $date = ($_POST['deb']);
          $groupe = ($_POST['classe']);
          $module = ($_POST['module']);
          $desc = ($_POST['desc']);
          $nom = ($_POST['nom1']);
           
          $sql2 = "INSERT INTO absence (date1, module, groupe,nom,desca) values ('$date','$module','$groupe','$nom','$desc')";
          $done = $pdo->query($sql2);
          header("location:saisirAbsence1.php");
          
          if($done)
            echo"inserted succesfully";
          else
            echo"error";  
           
          
        }
       
      
      ?>    







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Saisir Absence</title>
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
              <a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>              <div class="dropdown-menu" aria-labelledby="dropdown01">
               
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
              <h1 class="display-4">Signaler l'absence pour tout un groupe</h1>
              <p>Pour signaler, annuler ou justifier une absence, choisissez d'abord le groupe, le module puis l'étudiant concerné!</p>
            </div>
          </div>

       



          <div class="container">
          <form action="" method="POST" id="myForm">
          <div class="form-group">
            <label for="deb">Choisir une date:</label><br>
            <input type="date" id="deb" name="deb" value="2022-05-01" min="1980-01-01" max="2022-12-31">
          </div>
          
          <div class="form-group">
  <label for="module">Choisir un module:</label><br>
  <select id="module" name="module"  class="custom-select custom-select-sm custom-select-lg">
      <option value="Tech. Web">Tech. Web</option>
      <option value="SGBD">SGBD</option>
  </select>
  </div>
<div class="form-group">
<label for="classe">Choisir un groupe:</label><br>
<?php
      $req="SELECT distinct nomGroupe FROM  groupe ";
      $groupe=$pdo->query($req);
      echo "<select id='classe' name='classe' class='custom-select custom-select-sm custom-select-lg'>";
      while(($row = $groupe->fetch(PDO::FETCH_ASSOC))){
      echo" <option value='".$row['nomGroupe']."'>".$row['nomGroupe']."</option>";
      }
  echo"</select>";
  ?> 
  <button class="btn btn-danger " name="choisir"> choisir</button><br>
  </div> 

 
  
  <label for="nom">Choisir le nom de l'étudiant:</label><br>
            <select id="nom" name="nom1" class="custom-select custom-select-sm custom-select-lg" type="text" placeholder="Nom de l'étudiant">
              <?php
              if(isset($_POST['choisir'])){
               
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?php echo $row['nom']." ".$row['prenom']; ?>">
                  <?php echo $row['nom']." ".$row['prenom']; ?>
                </option>
              <?php }
              }
              ?>
            </select>
            
            <label for="desc">Donner une description :</label><br>
          
            <select name="desc"  class="custom-select custom-select-sm custom-select-lg" type="text" placeholder="description">
           <option value="absent" type="text" class="text-danger">Absent</option>
           <option value="present" type="text" class="text-primary">Present</option>
            </select>
          <button type="submit" name="ajouter" value="ajouter" class="btn btn-primary btn-block mt-5">Valider</button>
          
        </form>
        </div>
   
    </main>
  
</body>
<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</html>