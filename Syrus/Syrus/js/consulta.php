<?php
$hostname_localhost="samuel.cweptlsnnz8c.us-east-1.rds.amazonaws.com";
$database_localhost="diseno";
$username_localhost="samgj18";
$password_localhost="241612Sa";


$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
$consulta="SELECT * FROM diseno2 WHERE id=(SELECT MAX(id) FROM diseno2)";
$resultado=mysqli_query($conexion,$consulta);
$registro = mysqli_fetch_array($resultado);
//make drone randomize around specific location
//$lathere = 22;
//$lonhere = 12;

//swap these lines to make drone randomize around a specific location
$lat = $registro[2];
//$lat = $lathere + (abs(1-mt_rand()/mt_rand())) ;

//swap these lines to make drone randomize around a specific location
$lon = $registro[3];
//$lon = $lonhere + (abs(1-mt_rand()/mt_rand())) ;

//the meat and cake for the geo.json format
echo $file =  '{'  . PHP_EOL .  '"geometry" : {'  . PHP_EOL .  '"type" : "Point",'  . PHP_EOL .  '"coordinates" : [' . $lon . ',' . $lat .  ']'  . PHP_EOL .  '},'  . PHP_EOL .  ' "type" : "Feature",'  . PHP_EOL .  ' "properties" : {}'  . PHP_EOL .  '}';

$jsonfile = fopen("geo.json", "w")  or die ("Unable to open file!");
fwrite($jsonfile, $file);
fclose($jsonfile);
?>