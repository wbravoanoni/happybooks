<?php
$numero=$_GET["estrellas"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

<style>
	
.val-fieldset {
width:100px;
border:none;
font-weight:bold;
font-size:12px;
}
.valoracion {
width: 100px;
height: 21px;
display: block;
background:url(http://lh5.googleusercontent.com/-Sp-iHFztZdc/UVD89O9oM1I/AAAAAAAAEU0/Xh-FBDaWyJY/s000/estrellas.png) 0 0 no-repeat;
}
.val-0 {background-position: -100px -0;}
.val-5 {background-position: -81px -21px;}
.val-10 {background-position: -81px 0;}
.val-15 {background-position: -61px -21px;}
.val-20 {background-position: -60px 0;}
.val-25 {background-position: -40px -21px;}
.val-30 {background-position: -40px 0;}
.val-35 {background-position: -21px -21px;}
.val-40 {background-position: -21px 0;} 
.val-45 {background-position: 0 -21px;}
.val-50 {background-position: 0 0;}

</style>

</head>
<body>
<?php
echo $numero;

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

?>



	<fieldset class="val-fieldset"><legend>Calificación:</legend><span class="<?php echo $cadena;?>"></span></fieldset>
	
</body>
</html>