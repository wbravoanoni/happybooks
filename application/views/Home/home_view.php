<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html>
<head>
    
    <link href="https://fonts.googleapis.com/css?family=Ruthie" rel="stylesheet">
    <link rel="stylesheet" href="font_awesome/css/font-awesome.min.css">
    
  <meta charset="UTF-8">  
<style>
div.container {
    width: 100%;
    border: 1px solid grey;
    background-color: black;
}
 
h1{
    display: inline;
    margin-top: -200px;  
}
    
    .tituloS{
        
        margin-top: 21px;
        text-align: center;
        font-size: 22px; 
        
    }
#navegador ul{
   list-style-type: none;
   text-align: center;
}
#navegador li{
   display: inline;
   text-align: center;
   margin: 0 70px 0 0;
}
#navegador li a {
   padding: 2px 7px 2px 7px;
   color: snow;
   background-color: black;
   border: 0px solid;
   text-decoration: none;
}
#navegador li a: hover{
   background-color: lavenderblush;
   color: linen;
}


article {
    /*margin-left: 170px;*/
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
    clear: left;
}
#tabla {
    text-align: center;
    clear: center;
    border-color: black;    
    }
    
footer {
    padding: 1em;
    color: white;
    background-color: dimgray;
    clear: left;
    text-align: center;
    }
    
.ec-stars-wrapper {
  font-size: 0;
  display: inline-block;
}
.ec-stars-wrapper a {
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  font-size: 1.5rem;
  
  color: #888;
}

.ec-stars-wrapper:hover a {
  color: #F6FC4F;
}

.ec-stars-wrapper > a:hover ~ a {
  color: #D8D8D8;
} 
    
</style>
    
</head>
   <h1>
    <img src="Imagenes/principal.png" width="100%" height="500px">
    </h1> 
    
<body>
<div class="container">
    <div id="navegador">
 <ul>
 <li><b><a href="#">Principal</a></b></li>   
 <li><b><a href="#">Archivos</a></b></li> 
 <li><b><a href="#">Sobre mí</a></b></li>
 <li><b><a href="<?php echo base_url()?>panel">Configuración</a></b></li>
</ul>
</div>
</div>  

    
   <article>
       
 <div style="border-right: 1px solid black;width:200px;height:1200px;float:left">
     <br><center>Próximamente</center><br> 
<marquee scrolldelay="5" direction="left" onmouseover="stop()" onmouseout="start()" scrollamount="5">
<a href="#"><img src="Imagenes/king.jpg" width="200px" height="300px"/>
</a>
</marquee>
     
     <br> <br><center>Encuentranos en: <br><br>
<i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i>
<i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i>
<i class="fa fa-google-plus-official fa-2x" aria-hidden="true"></i>
<i class="fa fa-envelope fa-2x" aria-hidden="true"></i></center>
    
     </div>     
    <div style="margin-left:220px;display:block">  
        
 <h2>Novedades</h2>
    
<div id="tabla">
    <center><table border="0" cellpadding="30" cellspacing="0"> 
     <tr> 
         <td><center><img src="Imagenes/883.jpg" width="200px" height="300px">
  <p><b>El libro del cementerio, Neil Gaiman </b></p>
<div class="ec-stars-wrapper">
  <a href="#" data-value="1" title="1 estrellas">&#9733;</a>
  <a href="#" data-value="2" title="2 estrellas">&#9733;</a>
  <a href="#" data-value="3" title="3 estrellas">&#9733;</a>
  <a href="#" data-value="4" title="4 estrellas">&#9733;</a>
  <a href="#" data-value="5" title="5 estrellas">&#9733;</a>
</div></center> </td> 

<td><center><img src="Imagenes/883.jpg" width="200px" height="300px">
     <p><b>El libro del cementerio, Neil Gaiman </b></p>
<div class="ec-stars-wrapper">
  <a href="#" data-value="1" title="1 estrellas">&#9733;</a>
  <a href="#" data-value="2" title="2 estrellas">&#9733;</a>
  <a href="#" data-value="3" title="3 estrellas">&#9733;</a>
  <a href="#" data-value="4" title="4 estrellas">&#9733;</a>
  <a href="#" data-value="5" title="5 estrellas">&#9733;</a>
</div>
</center>   
</td> 

<td><center><img src="Imagenes/883.jpg" width="200px" height="300px">
     <p><b>El libro del cementerio, Neil Gaiman </b></p>
<div class="ec-stars-wrapper">
  <a href="#" data-value="1" title="1 estrellas">&#9733;</a>
  <a href="#" data-value="2" title="2 estrellas">&#9733;</a>
  <a href="#" data-value="3" title="3 estrellas">&#9733;</a>
  <a href="#" data-value="4" title="4 estrellas">&#9733;</a>
  <a href="#" data-value="5" title="5 estrellas">&#9733;</a>
</div></center>
</td>
     </tr>
        <tr> 
<td><center><img src="Imagenes/Harmony_House-TAPA-ALTA.jpg" width="200px" height="300px">
    <p><b>Harmony House, Nic Sheff </b></p>
<div class="ec-stars-wrapper">
  <a href="#" data-value="1" title="1 estrellas">&#9733;</a>
  <a href="#" data-value="2" title="2 estrellas">&#9733;</a>
  <a href="#" data-value="3" title="3 estrellas">&#9733;</a>
  <a href="#" data-value="4" title="4 estrellas">&#9733;</a>
  <a href="#" data-value="5" title="5 estrellas">&#9733;</a>
</div></center>
</td> 
            
<td><center><img src="Imagenes/Harmony_House-TAPA-ALTA.jpg" width="200px" height="300px">
    <p><b>Harmony House, Nic Sheff </b></p>
<div class="ec-stars-wrapper">
  <a href="#" data-value="1" title="1 estrellas">&#9733;</a>
  <a href="#" data-value="2" title="2 estrellas">&#9733;</a>
  <a href="#" data-value="3" title="3 estrellas">&#9733;</a>
  <a href="#" data-value="4" title="4 estrellas">&#9733;</a>
  <a href="#" data-value="5" title="5 estrellas">&#9733;</a>
</div></center>
</td> 

<td><center><img src="Imagenes/Harmony_House-TAPA-ALTA.jpg" width="200px" height="300px">
    <p><b>Harmony House, Nic Sheff </b></p>
<div class="ec-stars-wrapper">
  <a href="#" data-value="1" title=" 1 estrellas">&#9733;</a>
  <a href="#" data-value="2" title="2 estrellas">&#9733;</a>
  <a href="#" data-value="3" title="3 estrellas">&#9733;</a>
  <a href="#" data-value="4" title="4 estrellas">&#9733;</a>
  <a href="#" data-value="5" title="5 estrellas">&#9733;</a>
</div></center>
</td>
     </tr>
         <tr> 
<td><center><img src="Imagenes/bara.jpg" width="200px" height="300px">
    <p><b>Historia secreta de Chile, Jorge Baradit </b></p>
<div class="ec-stars-wrapper">
  <a href="#" data-value="1" title="1 estrellas">&#9733;</a>
  <a href="#" data-value="2" title="2 estrellas">&#9733;</a>
  <a href="#" data-value="3" title="3 estrellas">&#9733;</a>
  <a href="#" data-value="4" title="4 estrellas">&#9733;</a>
  <a href="#" data-value="5" title="5 estrellas">&#9733;</a>
</div></center>
</td> 

<td><center><img src="Imagenes/bara.jpg" width="200px" height="300px">
    <p><b>Historia secreta de Chile, Jorge Baradit </b></p>
<div class="ec-stars-wrapper">
  <a href="#" data-value="1" title=" 1 estrellas">&#9733;</a>
  <a href="#" data-value="2" title="2 estrellas">&#9733;</a>
  <a href="#" data-value="3" title="3 estrellas">&#9733;</a>
  <a href="#" data-value="4" title="4 estrellas">&#9733;</a>
  <a href="#" data-value="5" title="5 estrellas">&#9733;</a>
</div></center>
</td> 
             
<td><center><img src="Imagenes/bara.jpg" width="200px" height="300px">
    <p><b>Historia secreta de Chile, Jorge Baradit </b></p>
<div class="ec-stars-wrapper">
  <a href="#" data-value="1" title="1 estrellas">&#9733;</a>
  <a href="#" data-value="2" title="2 estrellas">&#9733;</a>
  <a href="#" data-value="3" title="3 estrellas">&#9733;</a>
  <a href="#" data-value="4" title="4 estrellas">&#9733;</a>
  <a href="#" data-value="5" title="5 estrellas">&#9733;</a>
</div></center>
</td>
     </tr>
    
    </table> </center>
</div> 
        </div> 
 </article>  
     
<footer>Copyright &copy; happyReads2017</footer>
</body>
</html>
