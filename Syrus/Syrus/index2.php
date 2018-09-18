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
	<link rel="stylesheet" href="Estilos/Estilo2.css">
	<title>Syrus Desk</title>
	<script language="JavaScript" type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css"  data-require="leaflet@0.7.3" data-semver="0.7.3" />
    <link rel="stylesheet" href="map/style.css" />
    <link rel="stylesheet" href="map/jquery.datetimepicker.min.css">
    <script src="js/jquery.datetimepicker.full.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   	

<body>
	<section class="Encuentra la posición de la ruta">
		
			<div class="contenedor">
				<h2 class="posicion">

					
					<div class="contenedor" id="mapa">
						<div id="map" style="width:98.9vw; height:85vh;"></div>
						<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js" data-require="leaflet@0.7.3" data-semver="0.7.3"></script>
						<script type="text/javascript" src="http://www.liedman.net/leaflet-realtime/dist/leaflet-realtime.js"></script>
					 	<script type="text/javascript" src="js/script.js"></script>
					</div>	
					<div class="Datos1">

						<input type="text" placeholder="Fecha" id="Fecha" value="Fecha:" disabled />
						<input type="text" id="Latitud" placeholder="Latitud" value="Latitud:" disabled/>
						<input type="text" id="Longitud" placeholder="Longitud" value="Longitud:" disabled/>
			
					</div>
					<div class="Datos">

						<input type="text" placeholder="Fecha" id="FechaV" value="<?=$registro[1]?>" disabled />
						<input type="text" id="LatitudV" placeholder="Latitud" value="<?=$registro[2]?>" disabled/>
						<input type="text" id="LongitudV" placeholder="Longitud" value="<?=$registro[3]?>" disabled/>
					
					</div>
				</h2>
				
			</div>
		</section>
		<section class="datetime">
			<div class="container"> 

			
			     <h2 align="center">Seleccione una fecha</h2>  
			       
			     <div class="col-md-3">  
			          <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date"/>  
			     </div>  
			     <div class="col-md-3">  
			          <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
			     </div>  
			     <div class="col-md-4">  
			          <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" onclick="consultH();" />  
			     </div>  
			     <div style="clear:both"></div>                 
			     <br />  
			     <div id="order_table">  
			          <table class="table table-bordered">  
			               <tr>  
			                    <th width="5%">ID</th>  
			                    <th width="30%">Fecha</th>  
			                    <th width="43%">Latitud</th>  
			                    <th width="12%">Longitud</th>  
			               </tr>  
			          <?php  
			          while($row = mysqli_fetch_array($resultado))  
			          {  
			          ?>  
			               <tr>  
			                    <td><?php echo $row["id"]; ?></td>  
			                    <td><?php echo $row["fecha"]; ?></td>  
			                    <td><?php echo $row["latitud"]; ?></td>  
			                    <td><?php echo $row["longitud"]; ?></td>
			               </tr>  
			          <?php  
			          }  
			          ?>  
			          </table>  
			     </div>  
			</div> 
		</section>

</body>
</html>