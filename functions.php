<?php

function apteAjouer($temperature)
{
    if ($temperature > 38)
        echo "Non";
    else
        echo "Oui";
}

function couleurTemperature($temperature)
{
    if ($temperature > 38)
        echo "color: red";
    else
        echo "color: green";
}

?>