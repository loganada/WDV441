<?php
require_once('curl-weather-list.php');
//echo '<pre>' . print_r($weatherList, true) . '</pre>';

$lat = $weatherList['lat'];
$lon = $weatherList['lon'];
$altitude = round($weatherList['alt_ft']);
$description = $weatherList['wx_desc'];
$icon = $weatherList['wx_icon'];
$temperatureF = round($weatherList['temp_f']);
$feelsLikeF = round($weatherList['feelslike_f']);
$humidty = $weatherList['humid_pct'];
$windSpeed = round($weatherList['windspd_mph']);
$windDirection = $weatherList['winddir_compass'];
$cloudCoverPct = $weatherList['cloudtotal_pct'];
$visibility = round($weatherList['vis_mi']);
$dewpoint = round($weatherList['dewpoint_f']);

require_once('../tpl/weather-widget.tpl.php');
?>
