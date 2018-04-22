<?php

function valorizacion($numero){

if($numero>0 and $numero<5){
$numero=0;

}elseif($numero>=5 and $numero<10){
$numero=5;

}elseif($numero>=10 and $numero<15){
$numero=10;

}elseif($numero>=15 and $numero<20){
$numero=15;

}elseif($numero>=20 and $numero<25){
$numero=20;

}elseif($numero>=25 and $numero<30){
$numero=25;

}elseif($numero>=30 and $numero<35){
$numero=30;

}elseif($numero>=35 and $numero<40){
$numero=35;

}elseif($numero>=40 and $numero<45){
$numero=40;

}elseif($numero>=45 and $numero<50){
$numero=45;

}elseif($numero>=50){
$numero=50;
}

$cadena="valoracion val-".$numero;

$numero=$numero/10;

$array=[$cadena,$numero];

return $array;
}

function resumenTextos($caracteresMax,$texto){

$texto         = substr($texto, 0,$caracteresMax);
//$index         = strrpos($texto, " ");
//$texto         = substr($texto, 0,$index); 
$texto        .= "...";

return $texto;
}

function formatoFecha($fecha)
{
	if(isset($fecha))

	{

	//Eliminar Hora
	$fecha=explode(" ",$fecha);
	
	list($anio, $mes, $dia) = explode("-",$fecha[0]);
	$mesTexto=obtenerMes($mes);
	$cadena=$mesTexto." ".$dia.", ".$anio;

	return $cadena;
	}else{

		return "Sin fecha";
	}
}

function obtenerMes($mes){

switch($mes){

case 1:
return "Enero";

case 2:
return "Febrero";

case 3:
return "Marzo";

case 4:
return "Abril";

case 5:
return "Mayo";

case 6:
return "Junio";

case 7:
return "Julio";

case 8:
return "Agosto";

case 9:
return "Septiembre";

case 10:
return "Octubre";

case 11:
return "Noviembre";

case 12:
return "Diciembre";
}
}

function limpiaTexto($input){
// Permite <p> y <a>
//echo strip_tags($text, '<br><p><a>');

return strip_tags($input);
}




?>