<?php

// json datei entkoden
$json = file_get_contents('http://api.openweathermap.org/data/2.5/forecast?id=2950159&APPID=86c9b430a4eba0da5e2d87ea48c60d62');
$array = json_decode($json,true);

// Pfadweg Array in json Datei

$min_temp= $array['list'][0]['main']['temp_min'];
$max_temp=$array['list'][0]['main']['temp_max'];
$bewoelkt=$array['list'][0]['weather'][0]['main'];
// Einheiten in Celsius umwandeln
echo $bewoelkt;
$Celsius=273;

$Total_min=$min_temp - $Celsius;
$Total_max=$max_temp - $Celsius;

// echo $array['list'][0]['main']['temp_min'];
?>



<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Nicht so tolle Wetter App</title>
    <style media="screen">

    body{
      background: black;
      margin:0;
      padding: 0;
    }
      .header{
        color:white;
        height: 30px;
        width: auto;
      }
.temperatur{
  /* height: 50%;
  width: 50%; */
display: flex;
justify-content: space-around;
color:white;
}

.min{
  color: white;
  background: blue;
}
.max{
  color:white;
  background:yellow;
}

    </style>
  </head>
  <body>
    <header>
      <div class="header">
        <h1>Wetter</h1>
        <p>Berlin</p>
        <?php
        $timestamp = time();
        $datum = date("d.m.Y - H:i", $timestamp);
        echo $datum;
        ?>
      </div>
    </header>
  </body>
  <main>
    <div class="temperatur">
      <div class="min">
        <?php
        echo "Minimale Temperatur: $Total_min °";
         ?>
         <div class="max">

         </div>
           <?php
           echo "Maximale Temperatur: $Total_max °";

            ?>

          </div class="temperatur">
            <?php
            echo "Bewölkt: $bewoelkt";

             ?>

      </div>
    </div>
  </main>
</html>
