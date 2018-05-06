<style>
	    
.container .img-perfil button{

}

.img-perfil img{
  width: 100%;
}

#mi-archivo{
 opacity: 0;
 overflow: hidden;
 z-index: -1;
 }

 label[for='mi-archivos'] {
 font-size: 14px;
 font-weight: 600;
 color: #fff;
 background-color: #106BA0;
 display: inline-block;
 transition: all .5s;
 cursor: pointer;
 text-transform: uppercase;
 width: fit-content;
 text-align: center;
 width: 200px;
 margin-top: 20px;
 }


</style>

<?php
if(isset($_GET["imagen"])){
	if($_GET["imagen"]=="error"){
echo "
<div class=\"alert alert-danger\" role=\"alert\">
  <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
  <span class=\"sr-only\">Error:</span>
  Formato de imagen incorrecto
</div>
";
	}
}
?>
<div class="container">

	<form action="<?php echo base_url()?>Cusuarios/actualizarUsuarioView" id="actualizar_view" method="POST" enctype="multipart/form-data">
		<div class="row">
			<h1 class="text-center">Modificar perfil</h1>
			<div class="col-lg-12">
				<div class="img-perfil col-lg-3">
					<img id="img_view" name="img_view" class="img-fluid" width="200" alt="">

					<span class="mi-archivo">
						<input type="file" name="mi-archivo" id="mi-archivo">
					</span>	
					<label class="btn btn-default btn-block" for="mi-archivo">
						<span>Subir nueva foto</span>
					</label>
			
			
				</div>
				<div class="col-lg-7">
					
						<div class="form-group">
							<label for="">Nombre</label>
							<input class="form-control" type="text" placeholder="" id="nombre_view" name="nombre_view">
						</div>

						<div class="form-group">
							<label for="">Apellido paterno</label>
							<input class="form-control" type="text" placeholder="" id="appaterno_view" name="appaterno_view">
						</div>

						<div class="form-group">
							<label for="">Apellido materno</label>
							<input class="form-control" type="text" placeholder="" id="apmaterno_view" name="apmaterno_view">
						</div>

						<div class="form-group">
							<label for="">Fecha nacimiento</label>
							<input class="form-control" type="date" id="nacimiento_view" name="nacimiento_view">
						</div>

						<div class="form-group">
							<label for="">Pais</label>
							<select  class="form-control" id="pais_view" name="pais_view">
							</select>
						</div>

						<div class="form-group">
							<label for="">Ciudad</label>
							<select  class="form-control" name="ciudad_view" id="ciudad_view">
							</select>
						</div>

						<div class="form-group">
							<label for="">Email</label>
							<input class="form-control" type="text" placeholder="" id="email_view" name="email_view">
						</div>

						<div class="form-group">
							<label for="">Contraseña</label>
							<input class="form-control" type="password" placeholder="" id="pass_view" name="pass_view" autocomplete="off">
						</div>

						<div class="form-group">
							<label for="">Repetir contraseña</label>
							<input class="form-control" type="password" placeholder="" id="pass2_view" name="pass2_view" autocomplete="off">
						</div>

						<div class="form-group">
							<label for="">Tipo</label>
							<select  class="form-control" name="tipo_view" id="tipo_view">
							</select>
						</div>

						<button id="update_view" class="btn btn-success">Guardar</button>
						
				</div>
			</div>
		</div>
	</form>
</div>

	<script type="text/javascript">
				var baseurl="<?php echo base_url();?>";
			</script>