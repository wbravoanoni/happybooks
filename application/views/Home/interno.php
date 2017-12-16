    <br><br><br>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title"><?php echo $array['nombre']?></h1>
        <p class="lead blog-description"><?php echo $array['autor']?></p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

<fieldset class='val-fieldset'>
	<?php $array2=valorizacion($array['puntaje']);?>

	<span class='<?php echo $array2["0"]?>' title='<?php echo $array2["1"]?>'></span>
</fieldset>
<hr>

          <div class="blog-post">
            <h2 class="blog-post-title">Resumen y sinópsis de <?php echo $array['nombre']?></h2>
         
            <p class="blog-post-meta"> <?php echo formatoFecha($array['fechaCreacion'])?> by 
<a href="#">
    <?php 
    if(isset($array['usuario'])){
        echo $array['usuario'];
    }else{
          echo "Anonimo";
    }
    ?>
</a>
            </p>
            
<div>
	<?php echo $array['descripcion']?>
</div>

          </div><!-- /.blog-post -->

          <nav>
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </nav>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <img src="<?php echo base_url().$array['imagen']?>" width="300" alt="">
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->
