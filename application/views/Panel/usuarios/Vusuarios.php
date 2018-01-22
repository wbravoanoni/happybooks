<style>
#modalBorrar {
	z-index: 1080 !important;
}
</style>

<h1 style="padding: 20px 0 20px 20px">Administrar Usuarios</h1>

<div class="col-sm-10 col-lg-10 box box-primary" style="padding-top: 10px">
<div class="">

<button data-toggle="modal" data-target="#modalAgregarUsuario" style="padding: 10px; float: right;" class="btn btn-danger" title="Agregar Usuario" >
	<i class="glyphicon glyphicon-plus"></i>
</button>

<br>

  <table id="tablaUsuarios" class="table table-bordered">
	<thead>
		<tr>
		 	<th style="width: 5%">#</th>
			<th>Nombre</th>
			<th>Ciudad</th>
			<th>Email</th>
			<th>Estado</th>
			<th>Opción</th>
		</tr>
	</thead>
   </table> 
</div>  
</div>

<div class="col-sm-2"><span class="label label-warning" id="spSuma"></span></div>

<!-- Modal Agregar Usuarios -->
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="width: 350px;">

      <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span><i class="glyphicon glyphicon-remove-circle"></i></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
      </div>

      <div class="modal-body">
	      <form id="agregarUsuarios" class="form-horizontal" action="<?php echo base_url()?>Cusuarios/guardarUsuarios" method="POST">
	      	
			<div class="box-body">
		        <div class="form-group">
		            <label for="txtNombre" class="col-sm-3 control-label">Nombre</label>
		            <div class="col-sm-9"> 
		              <input id="txtNombre" class="form-control" name="txtNombre" type="text" placeholder="" minlength="3" maxlength="20" required="required">
		            </div>
		        </div>

		        <div class="form-group">
		            <label for="txtApPaterno" class="col-sm-3 control-label">Ap.Paterno</label>
		            <div class="col-sm-9"> 
		              <input id="txtApPaterno" class="form-control" name="txtApPaterno" type="text" value="" minlength="3" maxlength="20" required="required">
		            </div>
		        </div>

		        <div class="form-group">
		            <label for="txtApMaterno" class="col-sm-3 control-label">Ap.Materno</label>
		            <div class="col-sm-9"> 
		              <input id="txtApMaterno" class="form-control" name="txtApMaterno" type="text"   minlength="3" maxlength="20" required="required">
		            </div>
		        </div>

		        <div class="form-group">
				    <label for="txtNacimiento" class="col-sm-3 control-label">Fecha Nacimiento</label>
				    <div class="col-sm-9"> 
				      <input id="txtNacimiento" class="form-control" name="txtNacimiento" type="date" required="required">
				    </div>
				</div>

		        <div class="form-group">
		            <label for="cboPaises" class="col-sm-3 control-label">Pais</label>
		            <div class="col-sm-9">
		            	<select id="cboPaises" class="form-control" name="cboPaises" required="required">
		            		<option value="">:: Elija</option>
		            	</select>
		            </div>
		        </div>

		        <div class="form-group">
		            <label for="cboCiudades" class="col-sm-3 control-label">Ciudad</label>
		            <div class="col-sm-9">
		            	<select  id="cboCiudades" class="form-control" name="cboCiudades" required="required">
		            		<option value="">:: Elija</option>
		            	</select>
		            </div>
		        </div>

		         <div class="form-group">
		            <label for="mtxtEmail" class="col-sm-3 control-label">Email</label>
		            <div class="col-sm-9"> 
		              <input id="mtxtEmail" class="form-control" name="mtxtEmail" type="email" minlength="8" maxlength="40" required="required">
		            </div>
		        </div>

		         <div class="form-group">
		            <label for="txtpass" class="col-sm-3 control-label">Contraseña</label>
		            <div class="col-sm-9"> 
		              <input id="txtpass" class="form-control" name="txtpass" type="password" minlength="6" maxlength="12" required="required">
		            </div>
		        </div>


		         <div class="form-group">
		            <label for="txtpass2" class="col-sm-3 control-label">Repita Contraseña</label>
		            <div class="col-sm-9"> 
		              <input id="txtpass2" class="form-control" name="txtpass2" type="password" minlength="6" maxlength="12" required="required">
		            </div>
		        </div>


				<div class="form-group">
				    <label for="cboTipo" class="col-sm-3 control-label">Tipo</label>
				    <div class="col-sm-9">
				    	<select id="cboTipo" class="form-control" name="cboTipo" required="required">
				    		<option value="">:: Elija</option>
				    	</select>
				    </div>
				</div>

				<div class="form-group">
		            <label for="cboEstado" class="col-sm-3 control-label">Estado</label>
		            <div class="col-sm-9">
		            	<select id="cboEstado" class="form-control" name="cboEstado" required="required">
		            		<option value="1">Activo</option>
		            		<option value="0">Desactivado</option>
		            	</select>
		            </div>
		        </div>

		        
				<div id="alertaCorreo" style="display:none" class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					<span class="sr-only">Error:</span>
					El correo ya se encuentra registrado
				</div>

				<div id="alertaAgregar" style="display:none" class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					<span class="sr-only">Error:</span>
					<span class="textoAlerta"></span>
				</div>
			</div>

      <div class="modal-footer">
<button type="button" class="btn btn-default" id="mbtnCerrarModal" data-dismiss="modal">Cancelar</button>
<button type="submit" class="btn btn-success" id="btnAgregarPersona">Agregar</button>
      </div>

	<div id="alertNombre"  style="display: none" class="list-group-item-danger" role="alert">...</div>
	<div id="alertPaterno" style="display: none" class="list-group-item-danger" role="alert">...</div>
	<div id="alertMaterno" style="display: none" class="list-group-item-danger" role="alert">...</div>
	<div id="alertEmail" style="display: none" class="list-group-item-danger" role="alert">...</div>
	<div id="alertPass" style="display: none" class="list-group-item-danger" role="alert">...</div>
	<div id="alertPass2" style="display: none" class="list-group-item-danger" role="alert">...</div>
	<div id="alertNacimiento" style="display: none" class="list-group-item-danger" role="alert">...</div>
	<div id="alertPais" style="display: none" class="list-group-item-danger" role="alert">...</div>
	<div id="alertTipo" style="display: none" class="list-group-item-danger" role="alert">...</div>

		  </form>
      </div>


    </div>
  </div>
</div>

<!--Fin modal Actualizar usuarios-->


<!-- Modal Actualizar Usuarios -->
<div style="overflow-y: scroll;" class="modal fade" id="modalActualizarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="width: 350px;">

      <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span><i class="glyphicon glyphicon-remove-circle"></i></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Usuarios ble</h4>
      </div>

      <div class="modal-body">
	      <form id="actualizarUsuarios" class="form-horizontal" action="<?php echo base_url()?>Cusuarios/actualizarUsuarios" method="POST" autocomplete="off">

	      	      	<!-- parametros ocultos -->
	      	<input type="hidden" id="mhdnIdPersona" name="mhdnIdPersona">
	      	
			<div class="box-body">
		        <div class="form-group">
		            <label for="utxtNombre" class="col-sm-3 control-label">Nombre</label>
		            <div class="col-sm-9"> 
		              <input id="utxtNombre" class="form-control" name="utxtNombre" type="text" placeholder="" minlength="3" maxlength="20" required="required">
		            </div>
		        </div>

		        <div class="form-group">
		            <label for="utxtApPaterno" class="col-sm-3 control-label">Ap.Paterno</label>
		            <div class="col-sm-9"> 
		              <input id="utxtApPaterno" class="form-control" name="utxtApPaterno" type="text" value="" minlength="3" maxlength="20" required="required">
		            </div>
		        </div>

		        <div class="form-group">
		            <label for="utxtApMaterno" class="col-sm-3 control-label">Ap.Materno</label>
		            <div class="col-sm-9"> 
		              <input id="utxtApMaterno" class="form-control" name="utxtApMaterno" type="text" minlength="3" maxlength="20" required="required">
		            </div>
		        </div>

		        <div class="form-group">
				    <label for="utxtNacimiento" class="col-sm-3 control-label">Fecha Nacimiento</label>
				    <div class="col-sm-9"> 
				      <input id="utxtNacimiento" class="form-control" name="utxtNacimiento" type="date" required="required">
				    </div>
				</div>

		        <div class="form-group">
		            <label for="cboPaises2" class="col-sm-3 control-label">Pais</label>
		            <div class="col-sm-9">
		            	<select id="cboPaises2" class="form-control" name="cboPaises2" required="required">
		            	</select>
		            </div>
		        </div>

		        <div class="form-group">
		            <label for="cboCiudades2" class="col-sm-3 control-label">Ciudad</label>
		            <div class="col-sm-9">
		            	<select id="cboCiudades2" class="form-control" name="cboCiudades2" required="required">
		            	</select>
		            </div>
		        </div>

		         <div class="form-group">
		            <label for="utxtEmail" class="col-sm-3 control-label">Email</label>
		            <div class="col-sm-9">
		             <input id="utxtEmail2" name="utxtEmail2" type="hidden" readonly>
		              <input id="utxtEmail" class="form-control" name="utxtEmail" type="email" minlength="8" maxlength="40" required="required">
		            </div>
		        </div>

		         <div class="form-group">
		            <label for="utxtpass" class="col-sm-3 control-label">Contraseña</label>
		            <div class="col-sm-9"> 
		              <input id="utxtpass" class="form-control" name="utxtpass" type="password" minlength="6" maxlength="12" required="required">
		            </div>
		        </div>

		         <div class="form-group">
		            <label for="utxtpass2" class="col-sm-3 control-label">Repita Contraseña</label>
		            <div class="col-sm-9"> 
		              <input id="utxtpass2" class="form-control" name="utxtpass2" type="password" minlength="6" maxlength="12" required="required">
		            </div>
		        </div>

				<div class="form-group">
				    <label for="ucboTipo" class="col-sm-3 control-label">Tipo</label>
				    <div class="col-sm-9">
				    	<select id="ucboTipo" class="form-control" name="ucboTipo" required="required">
				    	</select>
				    </div>
				</div>

				<div class="form-group">
		            <label for="ucboEstado" class="col-sm-3 control-label">Estado</label>
		            <div class="col-sm-9">
		            	<select id="ucboEstado" class="form-control" name="ucboEstado" required="required">
		            		<option value="1">Activo</option>
		            		<option value="0">Desactivado</option>
		            	</select>
		            </div>
		        </div>

		        <div id="alertaCorreo2" style="display:none" class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					<span class="sr-only">Error:</span>
					El correo ya se encuentra registrado
				</div>


			</div>

      <div class="modal-footer">
      	 <button onclick="enviaCorreo($('#utxtEmail').val())" data-toggle="modal" data-target="#modalBorrar" title="Eliminar" type="button" class="btn btn-danger" id="mbtnEliminarUsuario" data-dismiss="modal"><i class="glyphicon glyphicon-trash"></i></button>
        <button type="button" class="btn btn-default" id="mbtnCerrarModalUpdate" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-info" id="mbtnUpdPersona">Actualizar</button>
      </div>


     <div id="ualertNombre" style="display: none" class="list-group-item-danger" role="alert">...</div>
	<div id="ualertPaterno" style="display: none" class="list-group-item-danger" role="alert">...</div>
	<div id="ualertMaterno" style="display: none" class="list-group-item-danger" role="alert">...</div>
	<div id="ualertEmail" style="display: none" class="list-group-item-danger" role="alert">...</div>
	<div id="ualertPass" style="display: none" class="list-group-item-danger" role="alert">...</div>
	<div id="ualertPass2" style="display: none" class="list-group-item-danger" role="alert">...</div>
	<div id="ualertNacimiento" style="display: none" class="list-group-item-danger" role="alert">...</div>
	<div id="ualertPais" style="display: none" class="list-group-item-danger" role="alert">...</div>
	<div id="ualertTipo" style="display: none" class="list-group-item-danger" role="alert">...</div>

		  </form>
      </div>


    </div>
  </div>
</div>

<!--Fin modal agregar usuarios-->



<!-- Mini Modal Borrar-->
<div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="width: 350px;">

      <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span><i class="glyphicon glyphicon-remove-circle"></i></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Usuario</h4>
      </div>

      <div class="modal-body">
	      <form id="eliminarUsuarios" class="form-horizontal" action="<?php echo base_url()?>Cusuarios/eliminarUsuariosController" method="POST" autocomplete="off">
	      	
			<div class="box-body">
 				<h5>¿Está seguro de que desea eliminar permanentemente al siguiente usuario?</h5>
 	  <input id="emailEliminar" name="emailEliminar" type="text" readonly style="width: 300px;
    border: 0;">
			</div>
		

      <div class="modal-footer">
<button type="button" class="btn btn-default" id="mbtnCerrarModaEliminarl" data-dismiss="modal">Cancelar</button>
<button type="submit" class="btn btn-success" id="btnEliminarPersona">Eliminar</button>
      </div>

		  </form>
      </div>


    </div>
  </div>
</div>
<!--Fin Mini Modal Borrar-->
        
<script>
$('#mbtnCerrarModaEliminarl').click(function(){
	//$('#modalActualizarUsuario').css("position","absolute");
	$('#modalActualizarUsuario').modal('toggle');
});
</script>




<script type="text/javascript">
var baseurl="<?php echo base_url();?>";
</script>