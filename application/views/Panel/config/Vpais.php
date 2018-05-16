<div class="container">
	<div class="row">
		<h1 class="text-center">Configuración paises</h1>
		<div class="col-lg-3" style="display: flex;justify-content: center;">
			<?php
				require_once("Vnavegacion.php");
			?>
		</div>

		<div class="col-lg-6">
			<button data-toggle="modal" data-target="#config-agrega-pais" style="padding: 10px; float: right;" class="btn btn-danger" title="Agregar Pais">
			<i class="glyphicon glyphicon-plus"></i>
			</button>

		  <table id="tablaPaises" class="table table-bordered">
			<thead>
				<tr>
					<th>Nombre</th>
					<th style="width: 5%">Estado</th>
					<th style="width: 5%">Opción</th>
				</tr>
			</thead>
		   </table> 
		</div>
	</div>
</div>

<div class="modal fade" id="config-agrega-pais" tabindex="-1" role="dialog" aria-labelleby="fm-modal" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<form id="agregarPaisesConfig" action="<?php echo base_url()?>Cconfig/insertPaisesConfigControler" method="POST">
			<div class="modal-header">
					<button id="btnCerrarModaloPais" class="close" data-dismiss="modal" aria-label="cerrar"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title text-center" id="">Ingresar nuevo país</h3>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row" style="display: flex;justify-content: center;">
						<div class="col-6 col-md-6">
						<div class="form-group">
							<label for="">Nombre Pais</label>
							<input type="text" class="form-control" id="configPais" name="configPais">
						</div>

						<div class="form-group">
							<label for="">Gentilicio</label>
							<input type="text" class="form-control" id="configGentilicio" name="configGentilicio">
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

<div class="modal fade" id="config-actualiza-pais" tabindex="-1" role="dialog" aria-labelleby="fm-modal" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
					<button id="btnUpdateCerrarModaloPais" class="close" data-dismiss="modal" aria-label="cerrar"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title text-center" id="">Actualizar país</h3>
						<button id="btnEliminarPais" class="btn btn-danger pull-right" data-toggle="modal"
						data-target="#eliminarCiudadConfig">Eliminar
						</button>
			</div>
			<div class="modal-body">
				<form id="actualizarPaisesConfig" action="<?php echo base_url()?>Cconfig/actualizarPaisesConfigControler" method="POST">
				<div class="container-fluid">
					<div class="row" style="display: flex;justify-content: center;">
						<div class="col-6 col-md-6">
							<label>Id:[<span id="llave" name="llave"></span>]</label>
							<input type="text" id="flag" name="flag" style="display: none">
						<div class="form-group">
							<label for="">Nombre Pais</label>
							<input type="text" class="form-control" id="uConfigPais" name="configPais">
						</div>

						<div class="form-group">
							<label for="">Gentilicio</label>
							<input type="text" class="form-control" id="uConfigGentilicio" name="configGentilicio">
						</div>

						<div class="form-group">
							<label for="">Estado</label>
							<select name="uConfigEstado" id="uConfigEstado" class="form-control">
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
			<form id="eliminarPaisesConfig" action="<?php echo base_url()?>Cconfig/eliminarPaisesConfigControler" method="POST">
				<div class="modal-header">
					<h5 class="modal-title" id="">Eliminar Registro</h5>
					<button id="btnEliminarPais" class="close" data-dismiss="modal" aria-label="cerrar"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">				
						<div class="container-fluid">
							<div class="row">
								<div class="col-12">
									<input type="text" id="flag2" name="flag2" style="display: none">
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

