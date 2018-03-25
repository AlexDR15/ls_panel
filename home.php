<?php
	session_start();
    require ('steamauth/steamauth.php');  
		
?>
<!DOCTYPE html>
<!-- 
  PANEL DE PERSONALIZACIÓN DE LA PANTALLA DE CARGA DE VENDETTA SERVERS - ALPHA (EN DESARROLLO)
-->
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
  <body style="background-color: #EEE; background: url(img/fondo.jpg);  background-position: center center; background-attachment: fixed;}">
  
  
    <div class="container" style="margin-top: 30px; margin-bottom: 30px; padding-bottom: 10px; background-color: #FFF;">
		<h1>Personalizador de Loading Screen</h1>
		<span class="small pull-left" style="padding-right: 10px;">Panel de Personalización de la Pantalla de Carga de Vendetta Servers según quiera el Usuario (Canciones)</span>
		<hr>

<?php

if(!isset($_SESSION['steamid'])) {
		header( "refresh:0;url=index.php?sesion=falta" );
		
	}  else {
    include ('steamauth/userInfo.php');

	
// © AlexDR15 2016

include 'mysql_conexion.php';

$cero = 0;

//ESTABLECER CONEXIÓN CON MYSQL
$conexion_mysql = new mysqli($host_mysql, $user_mysql, $pass_mysql, $db_mysql);
if ($conexion_mysql->connect_error) {
    die("<h1>Conexión con la base de datos fallida!<br> MYSQL Dice: " . $conexion_mysql->connect_error . "</h1>");
};

//EXTRAER DATOS DB
$mysql_consulta_datos = "SELECT cancion1, cancion2, cancion3, cancion4, cancion5, cancion6, cancion7, cancion8, cancion9, cancion10, volumen FROM ".$tabla_mysql." WHERE steamid=".$steamprofile['steamid'].";";
$extractito_db = $conexion_mysql->query($mysql_consulta_datos);
$canciones_db = $extractito_db->fetch_array(MYSQLI_ASSOC);
		$cansionsita1 = $canciones_db["cancion1"];
		$cansionsita2 = $canciones_db["cancion2"];
		$cansionsita3 = $canciones_db["cancion3"];
		$cansionsita4 = $canciones_db["cancion4"];
		$cansionsita5 = $canciones_db["cancion5"];
		$cansionsita6 = $canciones_db["cancion6"];
		$cansionsita7 = $canciones_db["cancion7"];
		$cansionsita8 = $canciones_db["cancion8"];
		$cansionsita9 = $canciones_db["cancion9"];
		$cansionsita10 = $canciones_db["cancion10"];

//DEFINICIÓN DE VARIABLES PARA QUE APARECZCA LA VALUE
if ($canciones_db["volumen"] == !NULL){		
	$volumen_definido = $canciones_db["volumen"];
}else{
	$volumen_definido = 100;
};

if ($cansionsita1 == !NULL){
	$cansionaca1 = "https://www.youtube.com/watch?v=".$cansionsita1;
	// MOSTRAR NOMBRE DE LA CANCIÓN EN EL PANEL
		//OBTENCIÓN TITULO DE LA CANCIÓN (INTEGRACIÓN API YOUTUBE)
		//Url API Youtube (Integración de la API)
		$yt_api_url_1 = "https://www.googleapis.com/youtube/v3/videos?id=".$cansionsita1."&key=AIzaSyD6y_iIuefYOv78POrkpH7z5NgvaW48bYU&part=snippet";
		//Obtención de Datos de la API (Obtener respuesta a consulta)
		$yt_obtencion_api_1 = file_get_contents($yt_api_url_1);
		//Decodificación JSON de la API
		$yt_decodificado_resultado_1 = json_decode($yt_obtencion_api_1, true);
		//Creando Variable para Titulo de la Canción
		$yt_datos_1 = $yt_decodificado_resultado_1['items'];
		$yt_titulo_1 = $yt_datos_1['0']['snippet']['title'];
		
		$nombre_cancion_1 = "<br>[Canción: ".$yt_titulo_1."]";
	//FIN Integración API de YT (Titulo Canciones)	
};	
	
if ($cansionsita2 == !NULL){
	$cansionaca2 = "https://www.youtube.com/watch?v=".$cansionsita2;
	// MOSTRAR NOMBRE DE LA CANCIÓN EN EL PANEL
		//OBTENCIÓN TITULO DE LA CANCIÓN (INTEGRACIÓN API YOUTUBE)
		//Url API Youtube (Integración de la API)
		$yt_api_url_2 = "https://www.googleapis.com/youtube/v3/videos?id=".$cansionsita2."&key=AIzaSyD6y_iIuefYOv78POrkpH7z5NgvaW48bYU&part=snippet";
		//Obtención de Datos de la API (Obtener respuesta a consulta)
		$yt_obtencion_api_2 = file_get_contents($yt_api_url_2);
		//Decodificación JSON de la API
		$yt_decodificado_resultado_2 = json_decode($yt_obtencion_api_2, true);
		//Creando Variable para Titulo de la Canción
		$yt_datos_2 = $yt_decodificado_resultado_2['items'];
		$yt_titulo_2 = $yt_datos_2['0']['snippet']['title'];
		
		$nombre_cancion_2 = "<br>[Canción: ".$yt_titulo_2."]";
	//FIN Integración API de YT (Titulo Canciones)		
};

if ($cansionsita3 == !NULL){
	$cansionaca3 = "https://www.youtube.com/watch?v=".$cansionsita3;
	// MOSTRAR NOMBRE DE LA CANCIÓN EN EL PANEL
		//OBTENCIÓN TITULO DE LA CANCIÓN (INTEGRACIÓN API YOUTUBE)
		//Url API Youtube (Integración de la API)
		$yt_api_url_3 = "https://www.googleapis.com/youtube/v3/videos?id=".$cansionsita3."&key=AIzaSyD6y_iIuefYOv78POrkpH7z5NgvaW48bYU&part=snippet";
		//Obtención de Datos de la API (Obtener respuesta a consulta)
		$yt_obtencion_api_3 = file_get_contents($yt_api_url_3);
		//Decodificación JSON de la API
		$yt_decodificado_resultado_3 = json_decode($yt_obtencion_api_3, true);
		//Creando Variable para Titulo de la Canción
		$yt_datos_3 = $yt_decodificado_resultado_3['items'];
		$yt_titulo_3 = $yt_datos_3['0']['snippet']['title'];
		
		$nombre_cancion_3 = "<br>[Canción: ".$yt_titulo_3."]";
	//FIN Integración API de YT (Titulo Canciones)	
};

if ($cansionsita4 == !NULL){	
	$cansionaca4 = "https://www.youtube.com/watch?v=".$cansionsita4;	
	// MOSTRAR NOMBRE DE LA CANCIÓN EN EL PANEL
		//OBTENCIÓN TITULO DE LA CANCIÓN (INTEGRACIÓN API YOUTUBE)
		//Url API Youtube (Integración de la API)
		$yt_api_url_4 = "https://www.googleapis.com/youtube/v3/videos?id=".$cansionsita4."&key=AIzaSyD6y_iIuefYOv78POrkpH7z5NgvaW48bYU&part=snippet";
		//Obtención de Datos de la API (Obtener respuesta a consulta)
		$yt_obtencion_api_4 = file_get_contents($yt_api_url_4);
		//Decodificación JSON de la API
		$yt_decodificado_resultado_4 = json_decode($yt_obtencion_api_4, true);
		//Creando Variable para Titulo de la Canción
		$yt_datos_4 = $yt_decodificado_resultado_4['items'];
		$yt_titulo_4 = $yt_datos_4['0']['snippet']['title'];
		
		$nombre_cancion_4 = "<br>[Canción: ".$yt_titulo_4."]";
	//FIN Integración API de YT (Titulo Canciones)	
};		

if ($cansionsita5 == !NULL){	
	$cansionaca5 = "https://www.youtube.com/watch?v=".$cansionsita5;	
	// MOSTRAR NOMBRE DE LA CANCIÓN EN EL PANEL
		//OBTENCIÓN TITULO DE LA CANCIÓN (INTEGRACIÓN API YOUTUBE)
		//Url API Youtube (Integración de la API)
		$yt_api_url_5 = "https://www.googleapis.com/youtube/v3/videos?id=".$cansionsita5."&key=AIzaSyD6y_iIuefYOv78POrkpH7z5NgvaW48bYU&part=snippet";
		//Obtención de Datos de la API (Obtener respuesta a consulta)
		$yt_obtencion_api_5 = file_get_contents($yt_api_url_5);
		//Decodificación JSON de la API
		$yt_decodificado_resultado_5 = json_decode($yt_obtencion_api_5, true);
		//Creando Variable para Titulo de la Canción
		$yt_datos_5 = $yt_decodificado_resultado_5['items'];
		$yt_titulo_5 = $yt_datos_5['0']['snippet']['title'];
		
		$nombre_cancion_5 = "<br>[Canción: ".$yt_titulo_5."]";
	//FIN Integración API de YT (Titulo Canciones)	
};

if ($cansionsita6 == !NULL){	
	$cansionaca6 = "https://www.youtube.com/watch?v=".$cansionsita6;	
	// MOSTRAR NOMBRE DE LA CANCIÓN EN EL PANEL
		//OBTENCIÓN TITULO DE LA CANCIÓN (INTEGRACIÓN API YOUTUBE)
		//Url API Youtube (Integración de la API)
		$yt_api_url_6 = "https://www.googleapis.com/youtube/v3/videos?id=".$cansionsita6."&key=AIzaSyD6y_iIuefYOv78POrkpH7z5NgvaW48bYU&part=snippet";
		//Obtención de Datos de la API (Obtener respuesta a consulta)
		$yt_obtencion_api_6 = file_get_contents($yt_api_url_6);
		//Decodificación JSON de la API
		$yt_decodificado_resultado_6 = json_decode($yt_obtencion_api_6, true);
		//Creando Variable para Titulo de la Canción
		$yt_datos_6 = $yt_decodificado_resultado_6['items'];
		$yt_titulo_6 = $yt_datos_6['0']['snippet']['title'];
		
		$nombre_cancion_6 = "<br>[Canción: ".$yt_titulo_6."]";
	//FIN Integración API de YT (Titulo Canciones)		
};

if ($cansionsita7 == !NULL){	
	$cansionaca7 = "https://www.youtube.com/watch?v=".$cansionsita7;	
	// MOSTRAR NOMBRE DE LA CANCIÓN EN EL PANEL
		//OBTENCIÓN TITULO DE LA CANCIÓN (INTEGRACIÓN API YOUTUBE)
		//Url API Youtube (Integración de la API)
		$yt_api_url_7 = "https://www.googleapis.com/youtube/v3/videos?id=".$cansionsita7."&key=AIzaSyD6y_iIuefYOv78POrkpH7z5NgvaW48bYU&part=snippet";
		//Obtención de Datos de la API (Obtener respuesta a consulta)
		$yt_obtencion_api_7 = file_get_contents($yt_api_url_7);
		//Decodificación JSON de la API
		$yt_decodificado_resultado_7 = json_decode($yt_obtencion_api_7, true);
		//Creando Variable para Titulo de la Canción
		$yt_datos_7 = $yt_decodificado_resultado_7['items'];
		$yt_titulo_7 = $yt_datos_7['0']['snippet']['title'];
		
		$nombre_cancion_7 = "<br>[Canción: ".$yt_titulo_7."]";
	//FIN Integración API de YT (Titulo Canciones)	
};		

if ($cansionsita8 == !NULL){	
	$cansionaca8 = "https://www.youtube.com/watch?v=".$cansionsita8;	
	// MOSTRAR NOMBRE DE LA CANCIÓN EN EL PANEL
		//OBTENCIÓN TITULO DE LA CANCIÓN (INTEGRACIÓN API YOUTUBE)
		//Url API Youtube (Integración de la API)
		$yt_api_url_8 = "https://www.googleapis.com/youtube/v3/videos?id=".$cansionsita8."&key=AIzaSyD6y_iIuefYOv78POrkpH7z5NgvaW48bYU&part=snippet";
		//Obtención de Datos de la API (Obtener respuesta a consulta)
		$yt_obtencion_api_8 = file_get_contents($yt_api_url_8);
		//Decodificación JSON de la API
		$yt_decodificado_resultado_8 = json_decode($yt_obtencion_api_8, true);
		//Creando Variable para Titulo de la Canción
		$yt_datos_8 = $yt_decodificado_resultado_8['items'];
		$yt_titulo_8 = $yt_datos_8['0']['snippet']['title'];
		
		$nombre_cancion_8 = "<br>[Canción: ".$yt_titulo_8."]";
	//FIN Integración API de YT (Titulo Canciones)	
};

if ($cansionsita9 == !NULL){	
	$cansionaca9 = "https://www.youtube.com/watch?v=".$cansionsita9;	
	// MOSTRAR NOMBRE DE LA CANCIÓN EN EL PANEL
		//OBTENCIÓN TITULO DE LA CANCIÓN (INTEGRACIÓN API YOUTUBE)
		//Url API Youtube (Integración de la API)
		$yt_api_url_9 = "https://www.googleapis.com/youtube/v3/videos?id=".$cansionsita9."&key=AIzaSyD6y_iIuefYOv78POrkpH7z5NgvaW48bYU&part=snippet";
		//Obtención de Datos de la API (Obtener respuesta a consulta)
		$yt_obtencion_api_9 = file_get_contents($yt_api_url_9);
		//Decodificación JSON de la API
		$yt_decodificado_resultado_9 = json_decode($yt_obtencion_api_9, true);
		//Creando Variable para Titulo de la Canción
		$yt_datos_9 = $yt_decodificado_resultado_9['items'];
		$yt_titulo_9 = $yt_datos_9['0']['snippet']['title'];
		
		$nombre_cancion_9 = "<br>[Canción: ".$yt_titulo_9."]";
	//FIN Integración API de YT (Titulo Canciones)	
};

if ($cansionsita10 == !NULL){	
	$cansionaca10 = "https://www.youtube.com/watch?v=".$cansionsita10;	
	// MOSTRAR NOMBRE DE LA CANCIÓN EN EL PANEL
		//OBTENCIÓN TITULO DE LA CANCIÓN (INTEGRACIÓN API YOUTUBE)
		//Url API Youtube (Integración de la API)
		$yt_api_url_10 = "https://www.googleapis.com/youtube/v3/videos?id=".$cansionsita10."&key=AIzaSyD6y_iIuefYOv78POrkpH7z5NgvaW48bYU&part=snippet";
		//Obtención de Datos de la API (Obtener respuesta a consulta)
		$yt_obtencion_api_10 = file_get_contents($yt_api_url_10);
		//Decodificación JSON de la API
		$yt_decodificado_resultado_10 = json_decode($yt_obtencion_api_10, true);
		//Creando Variable para Titulo de la Canción
		$yt_datos_10 = $yt_decodificado_resultado_10['items'];
		$yt_titulo_10 = $yt_datos_10['0']['snippet']['title'];
		
		$nombre_cancion_10 = "<br>[Canción: ".$yt_titulo_10."]";
	//FIN Integración API de YT (Titulo Canciones)	
};


	if ($conexion_mysql->connect_error) {
    die("<h1>Conexión con la base de datos fallida!<br> MYSQL Dice: " . $conexion_mysql->connect_error . "</h1>");
};

	?>	
		<div>
			Has entrado en el Sistema como:<br><img src="<?php echo $steamprofile['avatar'];?>" /> <?php echo $steamprofile['personaname'];?> (Steamid: <?php echo $steamprofile['steamid'];?>)<span style='float:right; right:auto;'><?php logoutbutton(); ?></span>
		</div>
		
<hr>
		<center><h4 style='margin-bottom: 3px;'><u>Canciones (YouTube)</u></h4></center>
		Escribe aquí abajo los enlaces de YouTube de las canciones que quieras escuchar en la Pantalla de Carga de Vendetta Servers (Ejemplo: https://www.youtube.com/watch?v=9bZkp7q19f0):<BR><b>- IMPORTANTE</b>: Si no introduces ninguna canción, no escucharas ninguna canción.<br><b>- IMPORTANTE 2</b>: Si no escribes correctamente el enlace de Youtube, aparecerá como que está todo correcto, pero no se guardará esa canción!! (Enlace Correcto Ejemplo: https://www.youtube.com/watch?v=9bZkp7q19f0).
		<form name="envio_urls" action='home_proceso.php' method='POST' >
		<table class='table table-striped'>
			<tr>
				<td>Enlace de la 1ª Canción (YouTube URL):<?php echo $nombre_cancion_1; ?></td>
				<td><input type='text' name='cancion1' placeholder='Ej: https://www.youtube.com/watch?v=9bZkp7q19f0' class='campo_largo' value='<?php echo $cansionaca1; ?>'/>
				</td>
			</tr>
			<tr>
				<td>Enlace de la 2ª Canción (YouTube URL):<?php echo $nombre_cancion_2; ?></td>
				<td><input type='text' name='cancion2' placeholder='Ej: https://www.youtube.com/watch?v=9bZkp7q19f0' class='campo_largo' value='<?php echo $cansionaca2; ?>'/>
				</td>
			</tr>
			<tr>
				<td>Enlace de la 3ª Canción (YouTube URL):<?php echo $nombre_cancion_3; ?></td>
				<td><input type='text' name='cancion3' placeholder='Ej: https://www.youtube.com/watch?v=9bZkp7q19f0' class='campo_largo' value='<?php echo $cansionaca3; ?>'/>
				</td>
			</tr>
			<tr>
				<td>Enlace de la 4ª Canción (YouTube URL):<?php echo $nombre_cancion_4; ?></td>
				<td><input type='text' name='cancion4' placeholder='Ej: https://www.youtube.com/watch?v=9bZkp7q19f0' class='campo_largo' value='<?php echo $cansionaca4; ?>'/>
				</td>
			</tr>
			
			<tr>
				<td>Enlace de la 5ª Canción (YouTube URL):<?php echo $nombre_cancion_5; ?></td>
				<td><input type='text' name='cancion5' placeholder='Ej: https://www.youtube.com/watch?v=9bZkp7q19f0' class='campo_largo' value='<?php echo $cansionaca5; ?>'/>
				</td>
			</tr>
			
			<tr>
				<td>Enlace de la 6ª Canción (YouTube URL):<?php echo $nombre_cancion_6; ?></td>
				<td><input type='text' name='cancion6' placeholder='Ej: https://www.youtube.com/watch?v=9bZkp7q19f0' class='campo_largo' value='<?php echo $cansionaca6; ?>'/>
				</td>
			</tr>
			
			<tr>
				<td>Enlace de la 7ª Canción (YouTube URL):<?php echo $nombre_cancion_7; ?></td>
				<td><input type='text' name='cancion7' placeholder='Ej: https://www.youtube.com/watch?v=9bZkp7q19f0' class='campo_largo' value='<?php echo $cansionaca7; ?>'/>
				</td>
			</tr>
			
			<tr>
				<td>Enlace de la 8ª Canción (YouTube URL):<?php echo $nombre_cancion_8; ?></td>
				<td><input type='text' name='cancion8' placeholder='Ej: https://www.youtube.com/watch?v=9bZkp7q19f0' class='campo_largo' value='<?php echo $cansionaca8; ?>'/>
				</td>
			</tr>
			
			<tr>
				<td>Enlace de la 9ª Canción (YouTube URL):<?php echo $nombre_cancion_9; ?></td>
				<td><input type='text' name='cancion9' placeholder='Ej: https://www.youtube.com/watch?v=9bZkp7q19f0' class='campo_largo' value='<?php echo $cansionaca9; ?>'/>
				</td>
			</tr>
			
			<tr>
				<td>Enlace de la 10ª Canción (YouTube URL):<?php echo $nombre_cancion_10; ?></td>
				<td><input type='text' name='cancion10' placeholder='Ej: https://www.youtube.com/watch?v=9bZkp7q19f0' class='campo_largo' value='<?php echo $cansionaca10; ?>'/>
				</td>
			</tr>
			<tr>
			<script type="text/javascript">
					function updateTextInput(val) {
					document.getElementById('textInput').value=val; 
					}
			</script>
				<td>Volumen de la música (Seleccionado <input type="text" name="porcentaje_volumen" class="volumen_numero" size="number" id="textInput" value="<?php echo $volumen_definido; ?>">%):</td>
				<td><input type="range" name="rangeInput" value="<?php echo $volumen_definido; ?>" min="0" max="100" onchange="updateTextInput(this.value);"><div id="output"></div>
				<!--<input type="range" name="volumen" min="0" max="100" step="any" value="0-100"/>-->
				</td>
			</tr>
		</table>
			<center><button>Guardar Cambios &raquo;</button></center><br>
		</form>
		<form action="home_proceso.php" method="GET" name="eliminar" > 
			<input type="hidden" name="eliminar" value="si"/>
			<center><button>Restablecer Valores Predeterminados (Música de Vendetta) &raquo;</button></center>
		</form>
		<hr>
		<div class="pull-right">
			<i>Log-In gracias a <a href="http://steampowered.com">Steam</a></i>
		</div>
		<i>&copy; <a href="http://www.vendettaservers.es">Vendetta Servers</a> 2016 - Panel de Loading Screen</i>
	</div>
	
  </body>
</html><?php
		}    
		?>