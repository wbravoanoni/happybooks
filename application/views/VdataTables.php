<h1>Databables</h1>


<div class="col-sm-10 col-lg-10 box box-primary">
<div class="">
  <table id="exampleDataTable" class="table table-bordered">
	<thead>
		<tr>
		 	<th>numero</th>
			<th>Nombre</th>
			<th>Paterno</th>
			<th>Materno</th>
			<th>Ciudad</th>
			<th>Email</th>
			<th>DNI</th>
			<th>fecha Nac</th>
			<th>Estado</th>
			<th>Opción</th>
		</tr>
	</thead>
   </table> 
</div>  
</div>

<div class="col-sm-2"><span class="label label-warning" id="spSuma"></span></div>


<!-- Modal Cierre -->
<div class="modal fade" id="modalActualizardataTable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">

      <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Persona</h4>
      </div>

      <div class="modal-body">
	      <form class="form-horizontal">
	      	<!-- parametros ocultos -->
	      	<input type="hidden" id="mhdnIdPersona">
	      	
			<div class="box-body">
		        <div class="form-group">
		            <label class="col-sm-3 control-label">Nombre</label>
		            <div class="col-sm-9"> 
		              <input type="text" name="mtxtNombre" class="form-control" id="mtxtNombre" placeholder="">
		            </div>
		        </div>

		        <div class="form-group">
		            <label class="col-sm-3 control-label">Ap.Paterno</label>
		            <div class="col-sm-9"> 
		              <input type="text" name="mtxtApPaterno" class="form-control" id="mtxtApPaterno" value="" >
		            </div>
		        </div>

		        <div class="form-group">
		            <label class="col-sm-3 control-label">Ap.Materno</label>
		            <div class="col-sm-9"> 
		              <input type="text" name="mtxtApMaterno" class="form-control" id="mtxtApMaterno">
		            </div>
		        </div>

		        <div class="form-group">
		            <label class="col-sm-3 control-label">Email</label>
		            <div class="col-sm-9"> 
		              <input type="text" name="mtxtEmail" class="form-control" id="mtxtEmail">
		            </div>
		        </div>

		        <div class="form-group">
		            <label class="col-sm-3 control-label">Otro</label>
		            <div class="col-sm-9">
		            	<select class="form-control" id="mcboOtro" name="mcboOtro">
		            		<option value="">:: Elija</option>
		            		<option value="3">1</option>
		            		<option value="5">2</option>
		            		<option value="7">3</option>
		            	</select>
		            </div>
		        </div>
			</div>
		  </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="mbtnCerrarModal" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-info" id="mbtnUpdPersona">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
var baseurl="<?php echo base_url();?>";
</script>