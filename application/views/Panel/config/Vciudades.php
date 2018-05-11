<div class="container">
			<h1 class="text-center">Configuración Ciudades</h1>
	<br>
	<div class="row" style="display: flex;justify-content: center;">
		<div class="col-lg-4">
			<select name="" class="form-control" id="comboPaisesConfig"></select>
		</div>

		<div class="col-lg-2">
						<button data-toggle="modal" data-target="#modalAgregarUsuario" style="padding: 10px; float: right;" class="btn btn-danger" title="Agregar Usuario">
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

