
<div id="logoPagina" style="margin: 8px;">
    <img src="<?php echo base_url()?>imagenes/home/books-bannr.jpg" width="100%" height="400px">
</div>


    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Pagina Principal</a></li>
            <li><a href="#about">Archivos</a></li>
            <li><a href="#contact">Sobre mí</a></li>
             <li><a href="<?php echo base_url()?>login">Configuración</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="container">

<?php
$query = $this->db->query("SELECT nombre,autor,puntaje,resumen,imagen FROM libros");

$contador=0;
foreach ($query->result() as $row)
{      
   
?>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img class="imgLibros" src="<?php echo base_url().$row->imagen;?>" alt="...">
      <div class="caption">
        <h3><?php echo $row->nombre;?></h3>
         <h4><?php echo $row->autor;?></h4>

         <?php $array=valorizacion($row->puntaje);
                $cadena=$array[0];
                $titulo=$array[1];
         ?>
         <fieldset class="val-fieldset"><span class="<?php echo $cadena;?>" title="<?php echo $titulo;?>"></span></fieldset><hr>
         <p><?php echo $row->resumen;?></p>
        <p><a href="#" class="btn btn-primary" role="button">Leer más</a></p>
      </div>
    </div>
  </div>

<?php

}
?>
</div>
</div>

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



?>





