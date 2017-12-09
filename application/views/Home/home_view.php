
<div id="logoPagina" style="margin: 8px;">
    <img src="<?php echo base_url()?>imagenes/home/books-bannr.jpg" width="100%" height="400px">
</div>


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

<div class="text-xs-center homePaginacion">
  <?echo $pagination;?>
</div>


<!--=====================================
=         Section Proximamente          =
======================================-->
<!--
<div class="col-md-offset-2 col-xs-8">
<p class="titProx">Próximamente</p>
<marquee scrolldelay="5" direction="left" onmouseover="stop()" onmouseout="start()" scrollamount="5">

<div class="row">

<a href="#"><img class="imagen" src="<?php echo base_url()?>imagenes/home/king.jpg"/>
</a>

<a href="#"><img class="imagen" src="<?php echo base_url()?>imagenes/home/king.jpg"/>
</a>

<a href="#"><img class="imagen" src="<?php echo base_url()?>imagenes/home/king.jpg"/>
</a>

</div>
</marquee>
</div>
-->
<!--====  End of Section Proximamente  ====-->





