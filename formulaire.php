<!DOCTYPE html>
<html>
    <head>
        <title>Page de traitement</title>
        <meta charset="utf-8">
    </head>
    <body>
        <p>Dans le formulaire précédent, vous avez fourni les
        informations suivantes :</p>
        
        <?php
            echo 'Prénom : '.$_POST["name"].'<br>';
            echo 'Email : ' .$_POST["surname"].'<br>';
            echo 'Date de naissance : ' .$_POST["date"].'<br>';
        ?>
    </body>
</html>