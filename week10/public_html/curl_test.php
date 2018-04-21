<?php
$curlSession = curl_init();

if($curlSession)
{
  $url = "https://visionary.com";
  curl_setopt($curlSession, CURLOPT_URL, $url);
  curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, 1);

  $pageText = curl_exec($curlSession);

  curl_close($curlSession);
}
var_dump($pageText);
 ?>
