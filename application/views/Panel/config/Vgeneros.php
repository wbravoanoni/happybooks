<div class="container">
	<div class="row">
		<h1 class="text-center">Configuración Generos</h1>
		<div class="col-lg-3" style="display: flex;justify-content: center;">

			<?php
				require_once("Vnavegacion.php");
			?>
		</div>

		<div class="col-lg-6">
			<button id="botonModalCiudades" data-toggle="modal" data-target="#config-agrega-genero" style="padding: 10px; float: right;" class="btn btn-danger" title="Agregar Generos">
			<i class="glyphicon glyphicon-plus"></i>
			</button>

		  <table id="tablaGeneros" class="table table-bordered">
			<thead>
				<tr>
				 	<th style="width: 5%">#</th>
					<th>Genero</th>
					<th style="width: 5%">Estado</th>
					<th style="width: 5%">Opción</th>
				</tr>
			</thead>
		   </table> 
		</div>
	</div>
</div>	



<div class="modal fade" id="config-agrega-genero" tabindex="-1" role="dialog" aria-labelleby="fm-modal" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<form id="agregarGeneroConfig" action="<?php echo base_url()?>Cconfig/insertGeneroConfigControler" method="POST">
			<div class="modal-header">
					<button id="btnCerrarModaloGenero" class="close" data-dismiss="modal" aria-label="cerrar"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title text-center" id="">Ingresar nueva ciudad</h3>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row" style="display: flex;justify-content: center;">
						<div class="col-6 col-md-6">
						<div class="form-group">
							<label for="">Nombre Genero</label>
							<input type="text" class="form-control" id="nombreConfigGenero" name="nombreConfigGenero">
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


<div class="modal fade" id="config-actualizar-genero" tabindex="-1" role="dialog" aria-labelleby="fm-modal" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
					<button id="btnCerrarModalGenero" class="close" data-dismiss="modal" aria-label="cerrar"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title text-center" id="">Ingresar nueva ciudad</h3>
					<button id="btnEliminarGenero" class="btn btn-danger pull-right" data-toggle="modal"
						data-target="#eliminarGeneroConfig">Eliminar
					</button>
			</div>
			<div class="modal-body">
				<form id="actualizarGenerosConfig" action="<?php echo base_url()?>Cconfig/actualizarGeneroConfigControler" method="POST">
				<div class="container-fluid">
					<div class="row" style="display: flex;justify-content: center;">
						<div class="col-6 col-md-6">
							<label>Id:[<span id="llaveGenero" name="llaveGenero"></span>]</label>
							<input type="hidden" id="llaveGenero2" name="llaveGenero2">
						<div class="form-group">
							<input id="idGenero" name="idGenero" type="text" style="display: none;">
							<label for="">Nombre Genero</label>
							<input type="text" class="form-control" id="uNombreConfigGenero" name="uNombreConfigGenero">
						</div>

						<div class="form-group">
							<label for="">Estado</label>
							<select name="uConfigEstadoGenero" id="uConfigEstadoGenero" class="form-control">
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

<div class="modal fade" id="eliminarGeneroConfig" tabindex="-1" role="dialog" aria-labelleby="fm-modal" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<form id="eliminarGenero" action="<?php echo base_url()?>Cconfig/eliminarGenerosConfigControler" method="POST">
				<div class="modal-header">
					<h5 class="modal-title" id="">Eliminar Registro</h5>
					<button id="btnEliminarGenero" class="close" data-dismiss="modal" aria-label="cerrar"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">				
						<div class="container-fluid">
							<div class="row">
								<div class="col-12">
									<input type="hidden" id="flagGenero" name="flagGenero">
									<p class="text-center">¿Realmente desea eliminar este registro?</p>
									<p id="UnombreGenero" class="text-center"></p>
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

