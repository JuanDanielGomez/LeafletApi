<?php  
$hostname_localhost="samuel.cweptlsnnz8c.us-east-1.rds.amazonaws.com";
$database_localhost="diseno";
$username_localhost="samgj18";
$password_localhost="241612Sa";

$output=array();
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  

    $opcion = $_POST["opcion"]*1;
	  $conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost); 
      $output = '';  
      $query = "  
           SELECT * FROM diseno2 
           WHERE fecha BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($conexion, $query);
      if ($opcion==0) {
         $output .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">ID</th>  
                     <th width="30%">Latitud</th>  
                     <th width="43%">Longitud</th>    
                     <th width="12%">Fecha</th>  
                </tr>  
        ';
      }
       
      if(mysqli_num_rows($result) > 0)  
      {  
        $count=0;
           while($row = mysqli_fetch_array($result))  
           {  
                if ($opcion==1) {
                  $output[$count]=$row;
                  $count=$count+1;
                }else{
                  $output .= '  
                       <tr>  
                            <td>'. $row["id"] .'</td>   
                            <td>'. $row["latitud"] .'</td>  
                            <td> '. $row["longitud"] .'</td>  
                            <td>'. $row["fecha"] .'</td>  
                       </tr>  
                  ';  
                }
                
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }
      if ($opcion==0) {
          $output .= '</table>';
          echo $output;
      }else{
          echo json_encode($output);
      } 
      
 }  
 ?>
