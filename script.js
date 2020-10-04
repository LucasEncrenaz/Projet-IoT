$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var val = $(this).attr("value");
            if(val){
                $(".msg").not("." + val).hide();
                $("." + val).show();
            } else{
                $(".msg").hide();
            }
        });
    }).change();
});



function httpGetAsync(theUrl, callback)
      {
          var xmlHttp = new XMLHttpRequest();
          xmlHttp.onreadystatechange = function() {
              if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
                  callback(xmlHttp.responseText);
          }
          xmlHttp.open("GET", theUrl, true); // true for asynchronous
          xmlHttp.send(null);
      }

      var ACCOUNT = "0fbff814-d952-4ee6-b084-6816fee7ec88-bluemix";
      var DATABASE = "iotp_y15qu1_all-data_2020-10-03";
      var DOCUMENT_ID = "e4c0503f-0593-11eb-fed9-78e542b09cb7";

      var lien = 'https://'+ACCOUNT+'.cloudant.com/'+DATABASE+'/'+DOCUMENT_ID+'';
      var test = ''
      // httpGetAsync(lien,function(val){
      //   console.log('aaa');
      // });
      // ajax(lien,{},function(info){
      //   console.log(info);
      // })
      // Changer vos paramètres
      const myOrg = "y15qu1"
      const typeId = "Pycom";
      const deviceId = "4325";

      const clientId  = 'a:'+myOrg+':tvqre63x9o';

      var divTemp = document.querySelector(".wejdene")

      client = new Paho.MQTT.Client(myOrg+".messaging.internetofthings.ibmcloud.com", 443, "", clientId);

      // set callback handlers
      client.onConnectionLost = function (responseObject) {
          console.log("Connection Lost: "+responseObject.errorMessage);
      }

      client.onMessageArrived = function (message) {
          console.log("Message Arrived: "+message.payloadString);

          //RECUPERATION JSON (RES C LE TABLO)
          var res = JSON.parse(message.payloadString)
          // divWejdene.insertAdjacentHTML('beforeend', '<p>'+res.t.concat(' ',res.date)+'</p>');
          divTemp.insertAdjacentHTML('beforeend', 'Température : '+res.t+' °C , Date : '+res.date);
          console.log(res);
      }

      // Topic pour accéder aux données
      const topic = 'iot-2/type/'+typeId+'/id/'+deviceId+'/evt/data/fmt/json';
      console.log(topic);

      // Called when the connection is made
      function onConnect(){
          console.log("Connected!");
          client.subscribe(topic);
      }

      function onConnectF(){
          console.log(" not Connected!");
      }

      // Changer vos paramètres de connexion
      client.connect({
          onSuccess: onConnect,
          onFailure: onConnectF,
          userName: "a-y15qu1-xelz46my3f",
          password: "+qNATNg3Z8cW0Ma9Vq",
          useSSL: true
      });