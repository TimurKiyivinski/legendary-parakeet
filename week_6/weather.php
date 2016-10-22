<?php
header('Content-type: application/json');

function getWeather()
{
    $xmlFile = "weather.xml";
    $xml = simplexml_load_file($xmlFile);
    return json_decode(json_encode($xml), true)['date'];
}

$weather = getWeather();
echo json_encode($weather);
