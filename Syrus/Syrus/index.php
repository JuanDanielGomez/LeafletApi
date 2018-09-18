<?php
$hostname_localhost="samuel.cweptlsnnz8c.us-east-1.rds.amazonaws.com";
$database_localhost="diseno";
$username_localhost="samgj18";
$password_localhost="241612Sa";

$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
		
$consulta="SELECT * FROM diseno2 WHERE id=(SELECT MAX(id) FROM diseno2)";
$resultado=mysqli_query($conexion,$consulta);
$registro = mysqli_fetch_array($resultado);
mysqli_close($conexion);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<link rel="stylesheet" href="Estilos/Estilo.css">
	<title>Quienes Somos</title>
	
	
	

<body>
	
	<header>
		<div class="textos" >
			<h1 class="titulo">Electronic Design</h1>
			<blockquote cite="http://example.com/facts" class="subtitulo">
				<i><p>No tengo talentos especiales, pero sí soy profundamente curioso.</p> </i>
			</blockquote>
		
		<div class="sesgo-abajo"></div>
		</div>
	</header>
	<main>
		<section class="acerca-de">
			<section class ="contenedor">
				<div>
				<h2 class="sobre-nosotros">
					
					<h3 class="slogan">Diseño Electrónico</h3>
					<p class="parrafo">
						Andrée, yo no quería venirme a vivir a su departamento de la calle Suipacha. No tanto por los conejitos, más bien porque me duele ingresar en un orden cerrado, construido ya hasta en las más finas mallas del aire, esas que en su casa preservan la música de la lavanda, el aletear de un cisne con polvos, el juego del violín y la viola en el cuarteto de Rará.
					</p class="parrafo">
						Me es amargo entrar en un ámbito donde alguien que vive bellamente lo ha dispuesto todo como una reiteración visible de su alma, aquí los libros (de un lado en español, del otro en francés e inglés), allí los almohadones verdes, en este preciso sitio de la mesita el cenicero de cristal que parece el corte de una pompa de jabón, y siempre un perfume, un sonido, un crecer de plantas, una fotografía del amigo muerto, ritual de bandejas con té y tenacillas de azúcar… Ah, querida Andrée, qué difícil oponerse, aun aceptándolo con entera sumisión del propio ser, al orden minucioso que una mujer instaura en su liviana residencia. 
					</p>
					<a href="mailto:samuelgomez@uninorte.edu.co" class="boton">Escríbenos</a>
				</h2>
				</div>
			</section>
		</section>
		<section class="galeria">
			<div class="sesgo-arriba"></div>
			<div class="imagenes">
				<img src="Imagenes/3.jpg"alt="">
			</div>
			<div class="imagenes">
				<img src="Imagenes/2.jpg"alt="">
			</div>	
			<div class="imagenes">
				<img src="Imagenes/1.jpg"alt="">
				<div class="encima">
					<h2>
						Electronic Design
					</h2>
				</div>
			</div>
			<div class="imagenes">
				<img src="Imagenes/4.jpg"alt="">
			</div>
			<div class="imagenes">
				<img src="Imagenes/5.jpg"alt="">
			</div>
		
		</section>
		
	<footer>

		<div class="footer">
			<h2 class="titulo-footer">
				No olvides contactarnos para cualquier sugerencia.
			</h2>
			<h3 class="subtitulo-footer">
				¡Lo apreciaríamos mucho!
			</h3>
			<div class="subtitulo-footer">
				<form action="F2.php" method="post" >
					<input class="sugerencia" type="text" name="nombre" placeholder="Nombre">					
					<input class="sugerencia" type="text" name="correo" id="correo" placeholder="Email">				
					<textarea class="sugerencia"name="descripcion" cols="30" rows="10"></textarea>
					<input type="submit" name="boton" value="Submit" placeholder="Ingrese su mensaje">
				</form>			
			</div>
		</div>
	</footer>

</body>
</html>