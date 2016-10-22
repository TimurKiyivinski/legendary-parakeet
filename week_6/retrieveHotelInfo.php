<?php
header('Content-type: application/json');

function getHotels()
{
    $xmlFile = "hotel.xml";
    $xml = simplexml_load_file($xmlFile);
    $hotels = json_decode(json_encode($xml), true)['hotel'];
    $cities = [];
    foreach ($hotels as $hotel)
    {
        $cities[$hotel['City']][] = $hotel;
    }
    return $cities;
}

$hotels = getHotels();

if (isset($_GET['city']))
{
    if (isset($_GET['type']))
    {
        $userHotels = array_values(array_filter($hotels[$_GET['city']], function ($hotel) { 
            return $hotel['Type'] === $_GET['type'];
        }));
        echo json_encode($userHotels);
    }
    else
    {
        echo json_encode($hotels[$_GET['city']]);
    }
}
else
{
    echo json_encode(array_keys($hotels));
}
?>

