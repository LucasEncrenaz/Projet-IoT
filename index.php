<?php include_once'functions.php'; ?>
<!doctype html>
<html>
  <head>
    <title>Contrôle de température</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <h1 class="titrePrincipal">Contrôle de température</h1>
    <div class="temperature">
    <?php 
    $json = json_decode (file_get_contents('valeurs.json'), true);
    ?>
    <p class="label">Nom du joueur :</p> <p class="input"><?php echo $json['name']; ?> </p>
    <p class="label">Date de naissance joueur :</p> <p class="input"><?php echo $json['dateNaissance']; ?> </p>
    <p class="label">Température du joueur :</p> <p class="input"><?php echo $json['temperature']; ?>°C </p>
    <p class="label">Joueur apte à jouer :</p>  <p class="input"><?php apteAjouer($json['temperature']); ?> </p>
    </div>
  </body>
</html>