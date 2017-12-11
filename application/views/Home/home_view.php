<div id="logoPagina">
    <img src="<?php echo base_url()?>imagenes/home/books-bannr.jpg" width="100%">
</div>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
   
      </div>
      <div class="col-md-4 col-md-offset-2">
        
      </div>
      
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary" style="border-color: white;">
          <div class="panel-heading" style="background-color: #222;">
            <h4>Listado de Libros</h4>
          </div>
          <div class="panel-body">

<div class="row">              
<div class="col-sm-6 col-xs-12"> 
<strong>Mostrar por : </strong>
<select name="cantidad" id="cantidad">
<option value="6">6</option>
<option value="12">12</option>
</select>
</div>

<div class="col-sm-offset-3 col-sm-3 col-xs-12"> 
<div class="form-group has-feedback has-feedback-left">
<input type="text" class="form-control" name="busqueda" placeholder="Buscar algo" />
<i class="glyphicon glyphicon-search form-control-feedback"></i>
</div>
</div>

</div>
<!--=====================================
=            Section Libros            =
======================================-->
<div id="tbclientes"></div>
<div class="clearfix"></div>
<div class="text-center paginacion"></div>
<!--====  End of Section Libros  ====-->

           
          </div>
        </div>
      </div>
    </div>
  </div>

