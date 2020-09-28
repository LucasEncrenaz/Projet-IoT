<?php include_once'functions.php'; ?>
<!doctype html>
<html>
  <head>
    <title>Contrôle de température</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="logo.png" />
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
    <script src="script.js"></script>
  </head>
  <body>
    <h1 class="titrePrincipal">Contrôle de température</h1>
    <a href="addPlayer.php">Ajouter un nouveau joueur</a>
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
          <p class="contenu">Nom : <?php echo $mydata['name']; ?></p>
          <p class="contenu">Date de naissance : <?php echo $mydata['dateNaissance']; ?></p>
          <p class="contenu">Température : <span style="<?php couleurTemperature($mydata['temperature']); ?>"><?php echo $mydata['temperature']; ?>°C</span></p>
          <p class="contenu">Apte à jouer : <?php apteAjouer($mydata['temperature']); ?> </p>
      </div>
        <?php
      }
      ?>
    </div>
    <script type="text/javascript">

    var clientId = 'a:OrgId:projetiot';
    var client = new  Paho.MQTT.Client("y15qu1.messaging.internetofthings.ibmcloud.com", 8883, clientId);

    //Gets  called if the websocket/mqtt connection gets disconnected for any reason
    client.onConnectionLost = function (responseObject) {
        //Depending on your scenario you could implement a reconnect logic here
        alert("connection lost: " + responseObject.errorMessage);
    };

    //Gets called whenever you receive a message for your subscriptions
    client.onMessageArrived = function (message) {
        //Do something with the push message you received
        $('#messages').append('<span>Topic: ' + message.destinationName + '  | ' + message.payloadString + '</span><br/>');
    };

    //Connect Options
    var options = {
        userName: "a-y15qu1-xelz46my3f",
        password: "+qNATNg3Z8cW0Ma9Vq",
        timeout: 3,
        //Gets Called if the connection has sucessfully been established
        onSuccess: function () {
            alert("Connected");    	 
        },
        //Gets Called if the connection could not be established
        onFailure: function (message) {
            alert("Connection failed: " + message.errorMessage);
        }
    };

    //Creates a new Messaging.Message Object and sends it to the HiveMQ MQTT Broker
    var publish = function (payload, topic, qos) {
        //Send your message (also possible to serialize it as JSON or protobuf or just use a string, no limitations)
        var message = new Messaging.Message(payload);
        message.destinationName = topic;
        message.qos = qos;
        client.send(message);
    }
    client.connect(options);
  </script>
  </body>
</html>