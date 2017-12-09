
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

foreach ($resultado as $row)
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
         <p class="resumenTextos"><?php echo resumenTextos(150,$row->resumen);?></p>
        <p><a href="#" class="btn btn-primary" role="button">Leer más</a></p>
      </div>
    </div>
  </div>

<?php
}
?>
</div>

<div class="text-xs-center" style="display:table;margin:0 auto;">
  <?echo $pagination;?>
</div>





