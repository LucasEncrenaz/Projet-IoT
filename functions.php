<?php

function apteAjouer($temperature)
{
    if ($temperature > 38)
        echo "Non";
    else
        echo "Oui";
}

?>