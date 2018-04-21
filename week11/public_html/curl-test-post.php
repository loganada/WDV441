<?php

$curlSession = curl_init();

if ($curlSession)
{
    //$url = "https://visionary.com";
    //$url = "http://dmaccportfolioday.com";

    $url = "http://localhost/WDV441/week11/public_html/user-edit.php";

    /*
    $dataArray = array
    (
        "username" => "",
        "password" => "",
        "user_level" => "",
        "user_id" => "",
        "Save" => ""
    );
    */

    $dataArray = array
    (
        "username" => "testcurl",
        "password" => "test1",
        "user_level" => "100",
        "user_id" => "",
        "Save" => ""
    );

    curl_setopt($curlSession, CURLOPT_URL, $url);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($curlSession, CURLOPT_POST, true);
    curl_setopt($curlSession, CURLOPT_POSTFIELDS, $dataArray);

    $pageText = curl_exec($curlSession);

    var_dump(curl_error($curlSession));

    curl_close($curlSession);

    var_dump($pageText);

}
?>
