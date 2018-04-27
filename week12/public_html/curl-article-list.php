<?php

$curlSession = curl_init();

if ($curlSession)
{
    $url = "http://localhost/WDV441/week11/public_html/rest-article.php";

    curl_setopt($curlSession, CURLOPT_URL, $url);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, false);

    $pageText = curl_exec($curlSession);

    //var_dump(curl_error($curlSession));

    curl_close($curlSession);

    $articleList = json_decode($pageText, true);

    var_dump($articleList);
}
?>
