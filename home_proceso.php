<?php
	session_start();
    require ('steamauth/steamauth.php');  

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de Personalización de la Pantalla de Carga - Vendetta Servers</title>
    <link rel='stylesheet' href='css/home.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .table {
            table-layout: fixed;
            word-wrap: break-word;
        }
    </style>
  </head>
  <body style="background-color: #EEE; background: url(img/fondo.jpg);  background-position: center center; background-attachment: fixed;">
  
    <div class="container" style="margin-top: 30px; margin-bottom: 30px; padding-bottom: 10px; background-color: #FFF;">
		<h1>Personalizador de Loading Screen</h1>
		<span class="small pull-left" style="padding-right: 10px;">Panel de Personalización de la Pantalla de Carga de Vendetta Servers según quiera el Usuario (Canciones)</span>
		<hr>

<?php

if(!isset($_SESSION['steamid'])) {
		header( "refresh:0;url=index.php?sesion=falta" );
		
	}  else {
    include ('steamauth/userInfo.php');
	?>	
		<div>
			Has entrado en el Sistema como:<br><img src="<?php echo $steamprofile['avatar'];?>" /> <?php echo $steamprofile['personaname'];?> (Steamid: <?php echo $steamprofile['steamid'];?>)<span style='float:right; right:auto;'><?php logoutbutton(); ?></span>
		</div>
		
<hr>
		<center><h4 style='margin-bottom: 3px;'><u>Canciones (YouTube)</u></h4></center>
		Escribe aquí abajo los enlaces de YouTube de las canciones que quieras escuchar en la Pantalla de Carga de Vendetta Servers (Ejemplo: https://www.youtube.com/watch?v=9bZkp7q19f0):
		<br><br><b>IMPORTANTE</b>: Si no escribes correctamente el enlace de Youtube, aparecerá como que está todo correcto, pero no se guardará esa canción!! (Enlace Correcto Ejemplo: https://www.youtube.com/watch?v=9bZkp7q19f0).
		<table class='table table-striped'>
			<tr>
<td><center>
<?php 
// © AlexDR15 2016

include 'mysql_conexion.php';

//OBTENCIÓN DE DATOS DE ELIMINADO
$estado_eliminar = $_GET['eliminar'];
$si = "si";

//PROCESO DE OBTENCIÓN DE DATOS PARA SUBIR A LA DB
$steam_id_vdt = $steamprofile['steamid'];
$volumen_canciones = $_POST['porcentaje_volumen'];
$inicio_url = "https://www.youtube.com/watch?v=";


/*if (substr($can1['v'], 0, 32) == $incio_url or substr($can2['v'], 0, 32) == $incio_url) {
    echo "<h1>NO SE HAN ESCRITO CORRECTAMENTE LOS ENLACES</h1>Los enlaces introducidos deben ser del tipo: <b>https://www.youtube.com/watch?v=1y6smkh6c-0</b>.<br>Volviendo Al Menú Principal en 7 segundos...";
	header( "refresh:7;url=home.php" );
} else {
	$cancion1 = $can1['v'];
};*/
parse_str( parse_url( $_POST['cancion1'], PHP_URL_QUERY ), $can1 );
$cancion1 = $can1['v'];
parse_str( parse_url( $_POST['cancion2'], PHP_URL_QUERY ), $can2 );
$cancion2 = $can2['v'];
parse_str( parse_url( $_POST['cancion3'], PHP_URL_QUERY ), $can3 );
$cancion3 = $can3['v'];
parse_str( parse_url( $_POST['cancion4'], PHP_URL_QUERY ), $can4 );
$cancion4 = $can4['v'];
parse_str( parse_url( $_POST['cancion5'], PHP_URL_QUERY ), $can5 );
$cancion5 = $can5['v'];
parse_str( parse_url( $_POST['cancion6'], PHP_URL_QUERY ), $can6 );
$cancion6 = $can6['v'];
parse_str( parse_url( $_POST['cancion7'], PHP_URL_QUERY ), $can7 );
$cancion7 = $can7['v'];
parse_str( parse_url( $_POST['cancion8'], PHP_URL_QUERY ), $can8 );
$cancion8 = $can8['v'];
parse_str( parse_url( $_POST['cancion9'], PHP_URL_QUERY ), $can9 );
$cancion9 = $can9['v'];
parse_str( parse_url( $_POST['cancion10'], PHP_URL_QUERY ), $can10 );
$cancion10 = $can10['v'];

//if (substr($_POST['cancion1'], 0, 32) == $inicio_url OR substr($_POST['cancion2'], 0, 32) == $inicio_url or substr($_POST['cancion3'], 0, 32) == $inicio_url or substr($_POST['cancion4'], 0, 32) == $inicio_url or substr($_POST['cancion5'], 0, 32) == $inicio_url or substr($_POST['cancion6'], 0, 32) == $inicio_url or substr($_POST['cancion7'], 0, 32) == $inicio_url or substr($_POST['cancion8'], 0, 32) == $inicio_url or substr($_POST['cancion9'], 0, 32) == $inicio_url or substr($_POST['cancion10'], 0, 32) == $inicio_url){



//ESTABLECER CONEXIÓN CON MYSQL
$conexion_mysql = new mysqli($host_mysql, $user_mysql, $pass_mysql, $db_mysql);
if ($conexion_mysql->connect_error) {
    die("<p style='color: #FF0000; background-color: #E1F5A9'>Conexión con la base de datos fallida!<br> MYSQL Dice: " . $conexion_mysql->connect_error . "</p></fieldset><h4><p>Se ha producido un error que ha impedido finalizar la instalación correctamente. Por Favor, Espere 10 segundos. Si no pasa nada, pulsa aquí: </p><input type='submit' href='install.php' value='Volver Atrás'/></h4></form><center><br><br><br><i>&copy; AlexDR15 2016 - SVHAlex CP Versión: 0.1 (ALPHA)</i></center></body></html>");
};

//COMPROBACIÓN DE SI EL USUARIO EXISTE EN LAS TABLAS
if ($mysql_comprobacion = $conexion_mysql->query("SELECT * FROM ".$tabla_mysql." WHERE steamid=".$steam_id_vdt.""))
{

$afectado = $conexion_mysql->affected_rows;

if ($estado_eliminar == $si){
	$mysql_elimina_datos = "DELETE FROM ".$tabla_mysql." WHERE steamid=".$steam_id_vdt.";";
	if ($conexion_mysql->query($mysql_elimina_datos) === TRUE) {
		echo "<h1>SE HAN BORRADO LAS CANCIONES CORRECTAMENTE</h1>Cuando entres en el servidor sonarán de forma aleatoria las canciones predefinidas.<br>Volviendo Al Menú Principal en 7 segundos...";
		header( "refresh:7;url=home.php" );
	} else {
		echo $conexion_mysql->error;
	};
} else {

if ($afectado == 0){
//echo "NO AFECTADO<br>";
// SI NO EXISTE EL USUARIO EN LA TABLA 

//INSERTAR DATOS EN BASE DE DATOS
$mysql_inserta_datos = "INSERT INTO ".$tabla_mysql." (steamid, cancion1, cancion2, cancion3, cancion4, cancion5, cancion6, cancion7, cancion8, cancion9, cancion10, volumen) VALUES ('".$steam_id_vdt."', '".$cancion1."', '".$cancion2."', '".$cancion3."', '".$cancion4."', '".$cancion5."', '".$cancion6."', '".$cancion7."', '".$cancion8."', '".$cancion9."', '".$cancion10."', '".$volumen_canciones."');";
if ($conexion_mysql->query($mysql_inserta_datos) === TRUE) {
	echo "<h1>SE HAN GUARDADO LAS CANCIONES CORRECTAMENTE</h1>Cuando entres en el servidor sonarán de forma aleatoria las canciones que has introducido.<br>Volviendo Al Menú Principal en 7 segundos...";
	echo "<br><br>Volumen de las canciones: ".$volumen_canciones."%";
	header( "refresh:7;url=home.php" );
} else {
	echo $conexion_mysql->error;
};
} else {
//echo "SI AFECTADO<br>";
// SI EXISTE EL USUARIO EN LA TABLA 

//ACTUALIZAR DATOS EN BASE DE DATOS
$mysql_actualizar_datos = "UPDATE ".$tabla_mysql." SET cancion1='".$cancion1."', cancion2='".$cancion2."', cancion3='".$cancion3."', cancion4='".$cancion4."', cancion5='".$cancion5."', cancion6='".$cancion6."', cancion7='".$cancion7."', cancion8='".$cancion8."', cancion9='".$cancion9."', cancion10='".$cancion10."', volumen='".$volumen_canciones."' WHERE steamid='".$steam_id_vdt."'";
if ($conexion_mysql->query($mysql_actualizar_datos) === TRUE) {
	echo "<h1>SE HAN ACTUALIZADO LAS CANCIONES CORRECTAMENTE</h1>Cuando entres en el servidor sonarán de forma aleatoria las canciones que has introducido.<br>Volviendo Al Menú Principal en 7 segundos...";
	echo "<br><br>Volumen de las canciones: ".$volumen_canciones."%";
	header( "refresh:7;url=home.php" );
} else {
	echo $conexion_mysql->error;
};
};
};
};
/*} else {
	echo "<h1>NO SE HAN ESCRITO CORRECTAMENTE LOS ENLACES</h1>Los enlaces introducidos deben ser del tipo: <b>https://www.youtube.com/watch?v=1y6smkh6c-0</b>.<br>Volviendo Al Menú Principal en 7 segundos...";
	header( "refresh:7;url=home.php" );
};*/

?>
</center></td>
				
			</tr>
		</table>
		</form>
		<hr>
		<div class="pull-right">
			<i>Log-In gracias a <a href="http://steampowered.com">Steam</a></i>
		</div>
		<i>&copy; <a href="http://www.vendettaservers.es">Vendetta Servers</a> 2016 - Panel de Loading Screen</i>
	</div>
	
	<!--Version 3.1.1--> 
  </body>
</html><?php
		}    
		?>