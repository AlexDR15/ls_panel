<?php 






	// MOSTRAR NOMBRE DE LA CANCI�N EN EL PANEL
		//OBTENCI�N TITULO DE LA CANCI�N (INTEGRACI�N API YOUTUBE)
		//Url API Youtube (Integraci�n de la API)
		$yt_api_url_10 = "https://www.googleapis.com/youtube/v3/videos?id=".$cansionsita10."&key=AIzaSyD6y_iIuefYOv78POrkpH7z5NgvaW48bYU&part=snippet";
		//Obtenci�n de Datos de la API (Obtener respuesta a consulta)
		$yt_obtencion_api_10 = file_get_contents($yt_api_url_10);
		//Decodificaci�n JSON de la API
		$yt_decodificado_resultado_10 = json_decode($yt_obtencion_api_10, true);
		//Creando Variable para Titulo de la Canci�n
		$yt_datos_10 = $yt_decodificado_resultado_10['items'];
		$yt_titulo_10 = $yt_datos_10['0']['snippet']['title'];
		
		if (yt_titulo_10 == !NULL){	$nombre_cancion_10 = "Canci�n: ".$yt_titulo_10;	} else {	$nombre_cancion_10 = "No se ha introducido ninguna canci�n aqu�";	};
	//FIN Integraci�n API de YT (Titulo Canciones)	















?>