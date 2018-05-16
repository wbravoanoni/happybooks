<div class="container">
	<div class="row">
		<h1 class="text-center">Configuración Autores</h1>
		<div class="col-lg-3" style="display: flex;justify-content: center;">
			<?php
				require_once("Vnavegacion.php");
			?>
		</div>

		<div class="col-lg-6">
			<button data-toggle="modal" data-target="#config-agrega-autor" style="padding: 10px; float: right;" class="btn btn-danger" title="Agregar Pais">
			<i class="glyphicon glyphicon-plus"></i>
			</button>

		  <table id="tablaAutores" class="table table-bordered">
			<thead>
				<tr>
				 	<th style="width: 5%">#</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th style="width: 5%">Estado</th>
					<th style="width: 5%">Opción</th>
				</tr>
			</thead>
		   </table> 
		</div>
	</div>
</div>	



<div class="modal fade" id="config-agrega-autor" tabindex="-1" role="dialog" aria-labelleby="fm-modal" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<form id="agregarAutoresConfig" action="<?php echo base_url()?>Cconfig/insertAutoresConfigControler" method="POST">
			<div class="modal-header">
					<button id="btnCerrarModaloAgregarAutores" class="close" data-dismiss="modal" aria-label="cerrar"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title text-center" id="">Ingresar nuevo autor</h3>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row" style="display: flex;justify-content: center;">
						<div class="col-6 col-md-6">
						<div class="form-group">
							<label for="">Nombre</label>
							<input type="text" class="form-control" id="configNombreAutor" name="configNombreAutor">
						</div>

						<div class="form-group">
							<label for="">Apellido</label>
							<input type="text" class="form-control" id="configApellAutor" name="configApellAutor">
						</div>

						<div class="form-group">
							<label for="">Nacionalidad</label>
							<select name="uComboNacionalidadConfig" class="form-control" id="uComboNacionalidadConfig"></select>
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

<div class="modal fade" id="config-actualizar-autor" tabindex="-1" role="dialog" aria-labelleby="fm-modal" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
					<button id="btnCerrarModaloAutores" class="close" data-dismiss="modal" aria-label="cerrar"><span aria-hidden="true">&times;</span>
					</button>
				<h3 class="modal-title text-center" id="">Actualizar autor</h3>
				<button id="btnEliminarAutor" class="btn btn-danger pull-right" data-toggle="modal"
						data-target="#eliminarAutorConfig">Eliminar
					</button>
			</div>
			<div class="modal-body">
							<form id="actualizarAutoresConfig" action="<?php echo base_url()?>Cconfig/actualizarAutoresConfigControler" method="POST">
				<div class="container-fluid">
					<div class="row" style="display: flex;justify-content: center;">
						<div class="col-6 col-md-6">
						<div class="form-group">
							<input id="idAutores" name="idAutores" type="hidden" style="display: none">
							<label for="">Nombre</label>
							<input type="text" class="form-control" id="uConfigNombreAutor" name="uConfigNombreAutor">
						</div>

						<div class="form-group">
							<label for="">Apellido</label>
							<input type="text" class="form-control" id="uConfigApellAutor" name="uConfigApellAutor">
						</div>

						<div class="form-group">
							<label for="">Nacionalidad</label>
							<select name="u2ComboNacionalidadConfig" class="form-control" id="u2ComboNacionalidadConfig"></select>
						</div>

						<div class="form-group">
							<label for="">Estado</label>
							<select name="uConfigEstadoAutor" id="uConfigEstadoAutor" class="form-control">
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


<div class="modal fade" id="eliminarAutorConfig" tabindex="-1" role="dialog" aria-labelleby="fm-modal" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<form id="eliminarAutoresConfig" action="<?php echo base_url()?>Cconfig/eliminarAutoresConfigControler" method="POST">
				<div class="modal-header">
					<h5 class="modal-title" id="">Eliminar Registro</h5>
					<button id="btnEliminarAutoresModal" class="close" data-dismiss="modal" aria-label="cerrar"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">				
						<div class="container-fluid">
							<div class="row">
								<div class="col-12">
									<input type="hidden" id="flagAutores" name="flagAutores">
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


<script>
/*
$("#tablaPaises > tbody > tr").hover(function(){
$(this).css({"background-color":"rgba(255,255,255,.1)"});
},function(){
	$(this).css({"background-color":"rgb(255,255,255)"});
});

$("#elem_config>li[class!='disabled']").click(function(){
	$("#elem_config>li").removeClass("active");
	$(this).addClass("active");
});
*/


</script>

<script type="text/javascript">
var baseurl="<?php echo base_url();?>";
</script>

