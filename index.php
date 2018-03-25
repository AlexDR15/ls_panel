<?php
//SVHAlex CP - Panel de Control de Virtual Hosts de Apache
// © AlexDR15 2016

    require ('steamauth/steamauth.php');
	# You would uncomment the line beneath to make it refresh the data every time the page is loaded
	// unset($_SESSION['steam_uptodate']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>Panel de Personalización de la Pantalla de Carga - Vendetta Servers</title>
    <link rel='stylesheet' href='css/login.css'>
</head>
<body>
	<div class='vid-container'>
		<img id='Video1' class='bgvid back' src='img/fondo.jpg' />
	<div class='inner-container'>
		<img id='Video2' class='bgvid inner' src='http://i.imgur.com/KMUAuYM.png' />
		<div class='box'>
			<img class='logo' src='img/vdt_logo.png' /><br>
<?php
if(!isset($_SESSION['steamid'])) {

    echo "
			<center><h2>Bienvenido al Personalizador de la Pantalla de Carga de Vendetta Servers.<br>Ingrese al Sistema Pulsando Sobre el Botón:</h2>
		";
    loginbutton(); //login button
    echo "</center>";
}  else {
    include ('steamauth/userInfo.php');
	echo "<h1>REDIRECCIONANDO...</h1><br><br><br><br>";
    //Protected content
    //echo "<h3>Bienvenido " . $steamprofile['personaname'] . "</h3>";
    //echo "<h3>Aquí está tu avatar:" . '<img src="'.$steamprofile['avatarmedium'].'" title="" alt="" /></h2><br>'; // Display their avatar!
    header( "refresh:0;url=home.php" );
    //logoutbutton();
}    

$obtener_info_sesion = $_GET['sesion'];
$sesion_cerrada = "cerrada";
$sesion_iniciada = "iniciada";
$sesion_noiniciada = "falta";

if ($obtener_info_sesion == $sesion_iniciada) {
	echo "<div class='verde_cuadro'><white><center>SESIÓN INICIADA CORRECTAMENTE!</center></white></div>";
	
} elseif ($obtener_info_sesion == $sesion_cerrada) {
	echo "<div class='verde_cuadro'><white><center>SESIÓN CERRADA CORRECTAMENTE!</center></white></div>";

} elseif ($obtener_info_sesion == $sesion_noiniciada) {
	echo "<div class='error_cuadro'><white><center>NECESITAS INICIAR SESIÓN!</center></white></div>";

} else {
	echo "<br>";
}
?>  
<h3><i>&copy; Vendetta Servers 2016 - Panel de Loading Screen</i></h3>
		</div>
	</div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='js/index.js'></script>
</body>
</html>