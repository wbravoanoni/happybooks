<style>
#modalBorrar {
	z-index: 1080 !important;
}
.modal {
  text-align: center;
  padding: 0!important;
}

.modal:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px; /* Adjusts for spacing */
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}
</style>



<h1 style="padding: 20px 0 20px 20px">Administrar Libros</h1>

<div class="col-sm-10 col-lg-10 box box-primary" style="padding-top: 10px">
<div class="">

<button data-toggle="modal" data-target="#modalAgregarLibros" style="padding: 10px; float: right;" class="btn btn-danger" title="Agregar Usuario" >
	<i class="glyphicon glyphicon-plus"></i>
</button>

<button id="reload" type="button" class="btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
</button>

<br>

  <table id="tablaLibros" class="table table-bordered">
	<thead>
		<tr>
		 	<th style="width: 5%">#</th>
			<th>Nombre</th>
			<th>Autor</th>
			<th>Creado por</th>
			<th>Estado</th>
			<th>Opción</th>
		</tr>
	</thead>
   </table> 


</div>  
</div>

<!-- Modal Agregar Libros -->
<div class="modal fade" id="modalAgregarLibros" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="width: 350px;">

      <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span><i class="glyphicon glyphicon-remove-circle"></i></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Libros</h4>
      </div>

      <div class="modal-body">
	      <form id="formularioAgregarLibro" class="form-horizontal" action="<?php echo base_url()?>Clibros/agregarLibros" method="POST">
	      	
			<div class="box-body">

		        <div class="form-group">
		            <label for="nombreLibro" class="col-sm-3 control-label">Nombre</label>
		            <div class="col-sm-9"> 
		              <input id="nombreLibro" class="form-control" name="nombreLibro" type="text" placeholder="" minlength="3" maxlength="20" required="required">
		            </div>
		        </div>

		        <div class="form-group">
		            <label for="autorLibro" class="col-sm-3 control-label">Autor</label>
		            <div class="col-sm-9">
		            	<select  id="cboautorLibro" class="form-control" name="cboautorLibro" required="required">
		            		<option value="">:: Elija</option>
		            	</select>
		            </div>
		        </div>

		        <div class="form-group">
		            <label for="resumenLibro" class="col-sm-3 control-label">Resumen</label>
		            <div class="col-sm-9"> 
		             <textarea class="form-control" name="resumenLibro" id="resumenLibro" cols="10" rows="2"></textarea>
		            </div>
		        </div>

		         <div class="form-group">
		            <label for="descripcionLibro" class="col-sm-3 control-label">Descripción</label>
		            <div class="col-sm-9"> 
		             <textarea class="form-control" name="descripcionLibro" id="descripcionLibro" cols="10" rows="6"></textarea>
		            </div>
		        </div>

				<div class="form-group">
					<label for="myRange" class="col-sm-3 control-label">Puntaje</label>
				<div class="col-sm-9"> 
					<div class="slidecontainer form-control">
					<input  type="range" min="0" max="50" value="0" class="slider" id="myRange" name="myRange">
					</div>
					<div style="text-align: center;" id="demo">Numero</div>	
				</div>
				</div>

		        <div class="form-group">
		            <label for="imagenLibro" class="col-sm-3 control-label">Imagen</label>
		            <div class="col-sm-9"> 
		              <input id="imagenLibro" class="form-control" name="imagenLibro" type="text" placeholder="" minlength="3" maxlength="20" required="required">
    
				<input type="radio" id="radioInterno"
				name="imgExterna" value="0" checked="checked">
				<label for="radioInterno">&nbsp;Interno</label>

				<input style="margin-left: 20px" type="radio" id="radioExterno"
				name="imgExterna" value="1">
				<label for="radioExterno">&nbsp;Externo</label>

		            </div>
		        </div>

		          <div class="form-group">
		            <label for="nPaginas" class="col-sm-3 control-label">Paginas</label>
		            <div class="col-sm-9"> 
		              <input id="nPaginas" class="form-control" name="nPaginas" type="number" placeholder="" min="0" max="2000" required="required">
		            </div>
		        </div>



		        <div class="form-group">
		            <label for="cboUsuariosLibro" class="col-sm-3 control-label">Usuario</label>
		            <div class="col-sm-9">
		            	<select  id="cboUsuariosLibro" class="form-control" name="cboUsuariosLibro" required="required">
		            		<option value="">:: Elija</option>
		            	</select>
		            </div>
		        </div>

		        <div class="form-group">
		            <label for="cboGenero" class="col-sm-3 control-label">Genero</label>
		            <div class="col-sm-9">
		            	<select  id="cboGenero" class="form-control" name="cboGenero" required="required">
		            		<option value="">:: Elija</option>
		            	</select>
		            </div>
		        </div>

				<div class="form-group">
		            <label for="estadoLibro" class="col-sm-3 control-label">Estado</label>
		            <div class="col-sm-9">
		            	<select id="estadoLibro" class="form-control" name="estadoLibro" required="required">
		            		<option value="1">Activo</option>
		            		<option value="0">Desactivado</option>
		            	</select>
		            </div>
		        </div>


			</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-default" id="btnCerrarModalLibros" data-dismiss="modal">Cancelar</button>
		<button type="submit" class="btn btn-success" id="btnAgregarLibros">Agregar</button>
		</div>
		</form>


	</div>
</div>

  </div>

</div>


<!--======================================
=            Modificar libros            =
=======================================-->

<div class="modal fade" id="modalActualizarLibro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="width: 550px;">

      <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span><i class="glyphicon glyphicon-remove-circle"></i></button>
        <h4 class="modal-title" id="myModalLabel">Modificar Libros</h4>
      </div>

      <div class="modal-body">
	      <form id="formularioActualizarLibro" class="form-horizontal" action="<?php echo base_url()?>Clibros/cActualizarLibros" method="POST">
	      	
			<div class="box-body">

 <input id="uIdLibro" name="idLibros" class="control-label">
 <input id="key" name="key" class="control-label">

		        <div class="form-group">
		            <label for="uNombreLibro" class="col-sm-3 control-label">Nombre</label>
		            <div class="col-sm-9"> 
		              <input id="uNombreLibro" class="form-control" name="uNombreLibro" type="text" placeholder="" minlength="3" maxlength="20" required="required">
		            </div>
		        </div>

		        <div class="form-group">
		            <label for="uAutorLibro" class="col-sm-3 control-label">Autor</label>
		            <div class="col-sm-9">
		            	<select  id="uAutorLibro" class="form-control" name="uAutorLibro" required="required">
		            		<option value="">:: Elija</option>
		            	</select>
		            </div>
		        </div>


		        <div class="form-group">
		            <label for="uResumenLibro" class="col-sm-3 control-label">Resumen</label>
		            <div class="col-sm-9"> 
		             <textarea class="form-control" name="uResumenLibro" id="uResumenLibro" cols="10" rows="6"></textarea>
		            </div>
		        </div>

		         <div class="form-group">
		            <label for="uDescripcionLibro" class="col-sm-3 control-label">Descripción</label>
		            <div class="col-sm-9"> 
		             <textarea class="form-control" name="uDescripcionLibro" id="uDescripcionLibro" cols="10" rows="10"></textarea>
		            </div>
		        </div>

				<div class="form-group">
					<label for="uMyRange" class="col-sm-3 control-label">Puntaje</label>
				<div class="col-sm-9"> 
					<div id="cajaPuntos" class="slidecontainer form-control">
					<div></div>
					</div>
					<div style="text-align: center;" id="uDemo">Numero</div>	
				</div>
				</div>

		        <div class="form-group">
		            <label for="uImagenLibro" class="col-sm-3 control-label">Imagen</label>
		            <div class="col-sm-9"> 
		              <input id="uImagenLibro" class="form-control" name="uImagenLibro" type="text" placeholder="" minlength="3" maxlength="20" required="required">

				<input type="radio" id="radioInterno"
				name="uImgExterna" value="0" checked="checked">
				<label for="radioInterno">&nbsp;Interno</label>

				<input style="margin-left: 20px" type="radio" id="radioExterno"
				name="uImgExterna" value="1">
				<label for="radioExterno">&nbsp;Externo</label>

		            </div>
		        </div>

		         <div class="form-group">
		            <label for="uNPaginas" class="col-sm-3 control-label">Paginas</label>
		            <div class="col-sm-9"> 
		              <input id="uNPaginas" class="form-control" name="uNPaginas" type="number" placeholder="" min="0" max="2000" required="required">
		            </div>
		        </div>

		        <div class="form-group">
		            <label for="aUsuariosLibro" class="col-sm-3 control-label">Usuario</label>
		            <div class="col-sm-9">
		            	<select  id="aUsuariosLibro" class="form-control" name="aUsuariosLibro" required="required">
		            		<option value="">:: Elija</option>
		            	</select>
		            </div>
		        </div>

		        <div class="form-group">
		            <label for="uCboGenero" class="col-sm-3 control-label">Genero</label>
		            <div class="col-sm-9">
		            	<select  id="uCboGenero" class="form-control" name="uCboGenero" required="required">
		            		<option value="">:: Elija</option>
		            	</select>
		            </div>
		        </div>

				<div class="form-group">
		            <label for="uEstadoLibro" class="col-sm-3 control-label">Estado</label>
		            <div class="col-sm-9">
		            	<select id="uEstadoLibro" class="form-control" name="uEstadoLibro" required="required">
		            	</select>
		            </div>
		        </div>


			</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-default" id="btnCerrarModalLibros" data-dismiss="modal">Cancelar</button>
		<button type="submit" class="btn btn-success" id="btnActualizarLibros">Actualizar</button>
		</div>
		</form>


	</div>
</div>

  </div>

</div>
<!--====  End of Modificar libros  ====-->


<script type="text/javascript">
  var baseurl="<?php echo base_url();?>";
</script>