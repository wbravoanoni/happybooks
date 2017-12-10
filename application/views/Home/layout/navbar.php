    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Happy | Books</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Archivos</a></li>
            <li><a href="#">Sobre mí</a></li>
            <li><a href="<?php echo base_url()?>login">Configuración</a></li>
          </ul>
<form class="navbar-form navbar-right" method="POST" action="<?php echo base_url()?>Chome/articulos/0">

  <div class="col-lg-12">
    <div class="input-group">
    <input id="buscador" type="text" class="form-control" name="texto" placeholder="Search for..." value="<?php echo $this->session->userdata('busqueda')?>">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Go!</button>
      </span>
    </div><!-- /input-group -->
  </div>
</form>
        </div>
      </div>
    </nav>