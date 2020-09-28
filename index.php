<?php include_once'functions.php'; ?>
<!doctype html>
<html>
  <head>
    <title>Contrôle de température</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="logo.png" />
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="script.js"></script>
  </head>
  <body>
    <h1 class="titrePrincipal">Contrôle de température</h1>
    <div class="temperature">
      <?php 
      $json = file_get_contents("valeurs.json");
      $content = json_decode($json, true);
      ?> <select class="maliste" > <?php
      foreach ($content['data'] as $mydata)
      {
        ?>
        <option value ="<?php echo $mydata['id']; ?>" class="listeOption">
          <?php echo $mydata['name']; ?>
        </option>
        <?php
      }
      ?>
    </select>
    <?php
    foreach ($content['data'] as $mydata)
      {
        ?>
        <div class="<?php echo $mydata['id']; ?> msg">
          <p>Nom : <?php echo $mydata['name']; ?></p>
          <p>Date de naissance : <?php echo $mydata['dateNaissance']; ?></p>
          <p>Température : <?php echo $mydata['temperature']; ?>°C</p>
      </div>
        <?php
      }
      ?>
    </div>
  </body>
</html>