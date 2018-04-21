<?php

$curlSession = curl_init();

if ($curlSession)
{
    $url = "http://api.weatherunlocked.com/api/current/us.50265?app_id=4d027a5f&app_key=180f2565ad758dc4d93995e8bdb37719";

    curl_setopt($curlSession, CURLOPT_URL, $url);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, false);

    $pageText = curl_exec($curlSession);

    //var_dump(curl_error($curlSession));

    curl_close($curlSession);

    $weatherList = json_decode($pageText, true);

    //var_dump($weatherList);
}
?>
