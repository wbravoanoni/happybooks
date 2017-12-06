
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
             <li><a href="#contact">Configuración</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="container">

<?php
$query = $this->db->query("SELECT*FROM libros");

$contador=0;
foreach ($query->result() as $row)
{      
    if($contador==0 or $contador==2){?>     
        <div class="row">
<?php
    }    
?>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img class="imgLibros" src="<?php echo base_url().$row->imagen;?>" alt="...">
      <div class="caption">
        <h3><?php echo $row->nombre;?></h3>
         <h4><?php echo $row->autor;?></h4>
         <p><?php echo $row->resumen;?></p>
        <p><a href="#" class="btn btn-primary" role="button">Leer más</a></p>
      </div>
    </div>
  </div>

<?php
    if($contador==2){
      $contador=-1;?>
      </div>
<?php }?>

<?php 
$contador+=1;
}
?>
</div>
</div>





