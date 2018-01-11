<?php
$names = array("Adam", "Baily", "John", "Hannah", "Frank", "Tania", "Jim", "Leslie", "Carl","Alexandria");
$randNumber = rand(0,20);
if ($randNumber < 10)
{
  $outputName = $names[$randNumber];
  echo("<h1>Random Number: " . $randNumber. "</h1><br> <br>");
  echo("<h2 id = 'outputName'>Hello, " . $outputName . "</h2>");
}
else
{
  $nameList = "Name List";
  echo("<h1>Random Number: " . $randNumber . "</h1><br><br>");
  echo ("<div id = 'listContainer'><h2 id = 'nameList'>" . $nameList  . "</h2><br>");
  for ($i=0; $i < 10; $i++)
  {
    echo("<h3>" . $names[$i] . "</h3>");
  }
  echo ("</div>");
}
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  <title>Page Title</title>
  <style>
  h1, h2, h3{
    text-align: center;
color: white;
  }
  #outputName{
    color: #00e68a;
  }
  #nameList{
    text-decoration: underline;
  }
  #listContainer{
    border: 2px white double;
    border-radius: 30px;
  }
  body{
    background-color: black;
  }
  </style>
  </head>
  <body>
<?php

 ?>
  </body>
  </html>
