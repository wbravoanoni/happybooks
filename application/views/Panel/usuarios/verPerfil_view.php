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

<div class="container">
	<div class="row">
		<h1 class="text-center">Modificar perfil</h1>
		<div class="col-lg-12">
			<div class="img-perfil col-lg-3">
				<img class="img-fluid" src="https://avatars2.githubusercontent.com/u/20047732?s=460&v=4gosanchezdelacruz.com/wp-content/uploads/2016/12/wv4nnerI-200x200.png" width="200" alt="">

				<span class="mi-archivo">
					<input type="file" name="mi-archivo" id="mi-archivo">
				</span>	
				<label class="btn btn-default btn-block" for="mi-archivo">
					<span>Subir nueva foto</span>
				</label>
		
		
			</div>
			<div class="col-lg-7">
				<form action="">
					<div class="form-group">
						<label for="">Nombre</label>
						<input class="form-control" type="text" placeholder="Winston">
					</div>

					<div class="form-group">
						<label for="">Apellido paterno</label>
						<input class="form-control" type="text" placeholder="Bravo">
					</div>

					<div class="form-group">
						<label for="">Apellido materno</label>
						<input class="form-control" type="text" placeholder="Anoni">
					</div>

					<div class="form-group">
						<label for="">Fecha nacimiento</label>
						<input class="form-control" type="date">
					</div>

					<div class="form-group">
						<label for="">Pais</label>
						<select  class="form-control" name="" id="">
							<option value="">Chile</option>
						</select>
					</div>

					<div class="form-group">
						<label for="">Ciudad</label>
						<select  class="form-control" name="" id="">
							<option value="">Santiago</option>
						</select>
					</div>

					<div class="form-group">
						<label for="">Email</label>
						<input class="form-control" type="text" placeholder="wbravoanoni@gmail.com">
					</div>

					<div class="form-group">
						<label for="">Contraseña</label>
						<input class="form-control" type="text" placeholder="****">
					</div>

					<div class="form-group">
						<label for="">Repetir contraseña</label>
						<input class="form-control" type="text" placeholder="****">
					</div>

					<div class="form-group">
						<label for="">Tipo</label>
						<select  class="form-control" name="" id="">
							<option value="">Maestro</option>
						</select>
					</div>

					<button class="btn btn-success">Guardar</button>


				</form>
			</div>
		</div>
	</div>
</div>