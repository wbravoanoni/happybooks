<!DOCTYPE html>
<html lang="es">
<head>
<title>Happy|Books</title>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="icon" type="image/png" href="<?php echo base_url();?>imagenes/favicon.ico"/>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-88076544-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-88076544-1');
</script>

<style>
	footer {
    padding: 1em;
    color: white;
    background-color: dimgray;
    clear: left;
    text-align: center;
    }

    .navbar-nav {
    float:none;
    margin:0 auto;
    display: block;
    text-align: center;
   }

.navbar-nav > li {
    display: inline-block;
    float:none;
}

.imgLibros{
width:350px !important;
height:500px !important;
}

/* INICIO Estilo de las estrellas  */
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

/* FIN Estilo de las estrellas  */

.resumenTextos{
text-align: justify;
}
/*    Seccion Proximamente*/

/*
.imagen{
  margin: 0 40px 40px 0;
  width: 200px;
  height: 300px;
}
.titProx{
text-align: center;
font-weight:bolder
}
*/

.homePaginacion{
  display:table;
  margin:0 auto;
}

</style>

	
</head>
<body>
