<?php
$curlSession = curl_init();

if($curlSession)
{

  //$url = "https://visionary.com";
$url="http://localhost/wdv441/week10/public_html/user-edit.php";

//   $dataArray = array
//   (
//     "username"=> "",
//     "user_level"=>"",
//     "user_id"=>"",
//     "save"=> ""
// );

    $dataArray = array
    (
      "username"=> "testCurl",
      "password"=> "password",
      "user_level"=>"3",
      "user_id"=>"",
      "save"=> ""
    );
  curl_setopt($curlSession, CURLOPT_URL, $url);
  curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, 1);

  curl_setopt($curlSession, CURLOPT_POST, true);
  curl_setopt($curlSession, CURLOPT_POSTFIELDS, $dataArray);


  $pageText = curl_exec($curlSession);

  curl_close($curlSession);
  $articleList = json_decode;
  var_dump($articleList);
}
