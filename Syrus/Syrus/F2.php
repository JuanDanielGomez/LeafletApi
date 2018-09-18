<?php
$hostname_localhost="samuel.cweptlsnnz8c.us-east-1.rds.amazonaws.com";
$database_localhost="diseno";
$username_localhost="samgj18";
$password_localhost="241612Sa";


$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$sugerencia = $_POST["descripcion"];

		
$insertar = "INSERT INTO sugerencia (nombre, correo, descripcion) VALUES ('$nombre','$correo','$sugerencia')";
$resultado = mysqli_query($conexion,$insertar);
echo "¡Gracias por tu sugerencia!";
mysqli_close($conexion);
?>