<div class="container">
			<h1 class="text-center">Configuración Ciudades</h1>
	<br>
	<div class="row" style="display: flex;justify-content: center;">
		<div class="col-lg-4">
			<select name="" class="form-control" id="comboPaisesConfig"></select>
		</div>

		<div class="col-lg-2">
			<button id="botonModalCiudades" data-toggle="modal" data-target="#config-agrega-ciudad" style="padding: 10px; float: right;" class="btn btn-danger" title="Agregar Pais">
			<i class="glyphicon glyphicon-plus"></i>
			</button>
		</div>

	</div>
<br>
	<div class="row">
		<div class="col-lg-3" style="display: flex;justify-content: center;">
			<?php
				require_once("Vnavegacion.php");
			?>
		</div>

		<div class="col-lg-6">
		  <table id="tablaCiudades" class="table table-bordered">
			<thead>
				<tr>
				 	<th style="width: 5%">#</th>
					<th>Nombre</th>
					<th style="width: 5%">Estado</th>
					<th style="width: 5%">Opción</th>
				</tr>
			</thead>
		   </table> 
		</div>
	</div>
</div>	


<div class="modal fade" id="config-agrega-ciudad" tabindex="-1" role="dialog" aria-labelleby="fm-modal" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<form id="agregarCiudadesConfig" action="<?php echo base_url()?>Cconfig/insertCiudadesConfigControler" method="POST">
			<div class="modal-header">
					<button id="btnCerrarModaloCiudad" class="close" data-dismiss="modal" aria-label="cerrar"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title text-center" id="">Ingresar nueva ciudad</h3>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row" style="display: flex;justify-content: center;">
						<div class="col-6 col-md-6">
						<div class="form-group">
							<input id="idPais" name="idPais" type="text" style="display: none;">
							<label for="">Nombre Ciudad</label>
							<input type="text" class="form-control" id="nombreConfigCiudad" name="nombreConfigCiudad">
						</div>						
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success">Aceptar</button>
				<button data-dismiss="modal" class="btn btn-secondary">Cerrar</button>
			</div>
			</form>
		</div>
	</div>	
</div>

<div class="modal fade" id="config-modificar-ciudad" tabindex="-1" role="dialog" aria-labelleby="fm-modal" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
					<button id="btnUpdateCerrarModaloCiudad" class="close" data-dismiss="modal" aria-label="cerrar"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title text-center" id="">Actualizar ciudad</h3>
						<button id="btnEliminarCiudad" class="btn btn-danger pull-right" data-toggle="modal"
						data-target="#eliminarCiudadConfig">Eliminar
						</button>
			</div>
			<div class="modal-body">
				<form id="actualizarCiudadesConfig" action="<?php echo base_url()?>Cconfig/actualizarCiudadesConfigControler" method="POST">
				<div class="container-fluid">
					<div class="row" style="display: flex;justify-content: center;">
						<div class="col-6 col-md-6">
							<label>Id:[<span id="llave" name="llave"></span>]</label>
							<input type="text" id="flagCiudad" name="flagCiudad" style="display: none">
							<input type="text" id="idCiudadConfig" name="idCiudadConfig" style="display: none">
						<div class="form-group">
							<label for="">Nombre País</label>
							<select name="uComboidPaisesConfig" class="form-control" id="uComboidPaisesConfig"></select>
						</div>

						<div class="form-group">
							<label for="">Nombre Ciudad</label>
							<input type="text" class="form-control" id="uConfigNomCiudad" name="uConfigNomCiudad">
						</div>

						<div class="form-group">
							<label for="">Estado</label>
							<select name="uConfigEstadoCiudad" id="uConfigEstadoCiudad" class="form-control">
								<option value="1">Activo</option>
								<option value="0">Desactivado</option>
							</select>
						</div>
				
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success">Aceptar</button>
				<button data-dismiss="modal" class="btn btn-secondary">Cerrar</button>
			</div>
			</form>
		</div>
	</div>	
</div>


<div class="modal fade" id="eliminarCiudadConfig" tabindex="-1" role="dialog" aria-labelleby="fm-modal" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<form id="eliminarCiudadesConfig" action="<?php echo base_url()?>Cconfig/eliminarCiudadesConfigControler" method="POST">
				<div class="modal-header">
					<h5 class="modal-title" id="">Eliminar Registro</h5>
					<button id="btnEliminarCiudadesModal" class="close" data-dismiss="modal" aria-label="cerrar"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">				
						<div class="container-fluid">
							<div class="row">
								<div class="col-12">
									<input type="hidden" id="flagCiudades" name="flagCiudades">
									<p class="text-center">¿Realmente desea eliminar este registro?</p>
									<p id="UnombrePais" class="text-center"></p>
								</div>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success">Aceptar</button>
					<button data-dismiss="modal" class="btn btn-secondary">Cerrar</button>
				</div>
			</form>
		</div>
	</div>	
</div>	

<script type="text/javascript">
var baseurl="<?php echo base_url();?>";
</script>

