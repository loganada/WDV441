<html>
<head>

<style>
#container{
  width: 355px;
  background: linear-gradient(to bottom right, #33ccff 0%, #ffcc66 100%);
  border-radius: 50px;
  padding: 30px;
}
#tempInfo{
float: right;
color: white;
}
#iconInfo{
color: white;
}
#weatherDesc{
color: white;
}
#desc{
  font-weight: bold;
  font-size: 30px;
color: white;
}

</style>

</head>
<body>
<div id="container">
  <div id="tempInfo">
    <img src="images/<?php echo $icon; ?>"/>
    <span id="desc"><?php echo $description; ?></span>
<h1>Current: <?php echo " ".$temperatureF . " &deg"; ?></h1>
<h2>Feels Like: <?php echo " ".$feelsLikeF . " &deg"; ?></h2>
<h3>West Des Moines, IA</h3>
<h5>Latitude: <?php echo " ".$lat."  /  " ?> Longitude: <?php echo " ".$lon." " ?></h5>
</div>
<div id="iconInfo">
<h5>Cloud Cover: <?php echo " ". $cloudCoverPct . "%"; ?></h5>
  <h5>Visibility: <?php echo " ". $visibility . " mi"; ?></h5>
</div>
<div id="weatherDesc">
  <h5>Dewpoint: <?php echo " ".$dewpoint . " &deg"; ?></h5>
  <h5>Humidity: <?php echo " ".$humidty . " %"; ?></h5>
  <h5>Altitude: <?php echo " ".$altitude . " ft"; ?></h5>
  <h5>Wind Speed:<?php echo " ".$windSpeed. " mph"; ?></h5>
  <h5>Wind Direction:<?php echo " ".$windDirection; ?></h5>
</div>
</div>
</body>
</html>
