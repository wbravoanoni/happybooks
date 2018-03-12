<style>
textarea{
	 resize: none;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<form id="formularioSeo" action="<?php echo base_url()?>Seo_controller/actualizarSeoController" method="POST">
			
<h1 class="text-center">Configuracion SEO</h1>

<div class="col-lg-6 col-lg-offset-3">

	<h3>Meta Tag</h3>

	<div class="form-group">
		<label for="copyright">Copyright</label>
		<input id="copyright" name="copyright" type="text" class="form-control">	
	</div>

	<div class="form-group">
		<label for="Author">Autor</label>
		<input id="Author" name="Author" type="text" class="form-control">	
	</div>

	<div class="form-group">
		<label for="Publisher">Empresa</label>
		<input id="Publisher" name="Publisher" type="text" class="form-control">	
	</div>

	<div class="form-group">
	<label for="rating">Rating</label>
		<p>Sirve para indicar el tipo de contenido</p>
			<div class="">
				<select id="rating" name="rating" class="form-control">		
				</select>
			</div>

<div class="panel panel-info" style="margin-top: 20px"> 
	<div class="panel-body">
	<ol>
		<li><b>General</b> es para contenido que van dirigidos a todo tipo de gente</li>
		<li><b>Mature</b> es para los contenidos que muestran desnudos</li>
		<li><b>Restricted</b> es para los contenidos que pueden atemorizar o traumatizar a cierto tipo de gente</li>
	</ol>
	</div> 
</div>		
	</div>	


<h3>Distribution</h3>
<p>Es una etiqueta que nos indica el destino del contenido.</p>

<select name="distribution" id="distribution" class="form-control">
</select>

<div class="panel panel-info" style="margin-top: 20px"> 
	<div class="panel-body">
	<ol>
		<p><b>Local: </b>distribuido de manera local</p>
		<p><b>Gobal: </b>distribuido de manera Global</p>
	</ol>
	</div> 
</div>

<h3>Robots</h3>

<p>Indica a los spiders o robots de los motores de bùsqueda qué privilegios tienen con el contenido y los enlaces que hay dentro de la página</p>

<select name="Robots" id="Robots" class="form-control"></select>


<div class="panel panel-info" style="margin-top: 20px"> 
	<div class="panel-body">
	<ol>
		<li><b>INDEX, FOLLOW</b> indica que todo el contenido será indexado y los links podrán ser seguidos.</li>

		<li><b>INDEX, NOFOLLOW</b> indica que los contenidos serán indexados pero los links no serán seguidos.</li>

		<li><b>NOINDEX, FOLLOW</b> quiere decir que los contenidos no se mostrarán, pero que los enlaces o links podrán verse por todo el internet. De esta forma es en la que trabajan las páginas empresariales que Facebook ofrece.</li>

		<li><b>NOINDEX, NOFOLLOW</b> se utiliza para informes que pueden ser públicos, pero en su caso se restringen a los motores de búsqueda.</li>
	</ol>
	</div> 
</div>	

<h3>Lenguaje</h3>
<input id="language" name="language" type="text">

<h3>Revisit-after</h3>
<p>Esta etiqueta le hace saber a los motores de busqueda cada cuanto tiempo pueden los robots o spiders regresar al sitio para indexar el contenido en el motor de búsquedas</p>

<select name="Revisit_after" id="Revisit_after" class="form-control"></select>


<div class="panel panel-info" style="margin-top: 20px"> 
	<div class="panel-body">
<ol>
	<li><b>1 Day</b> (De forma diaria)</li>
	<li><b>7 Days</b> (De forma semanal)</li>
	<li><b>31 Days</b> (De forma mensual)</li>
	<li><b>180 Days</b> (De forma semestral)</li>
	<li><b>365 Days</b> (De forma anual)</li>
</ol>
	</div> 
</div>	



<h3>Código Google analytics</h3>
<textarea name="analytic" id="analytic" cols="86" rows="8"></textarea>

	<div class="form-group">
		<label for="Keywords">Keywords</label>
		<input id="Keywords" name="Keywords" type="text" class="form-control">	
	</div>

<button class="btn btn-danger">Guardar</button>

</div><!--END col-lg-6-->
		</form>
		</div><!--END COL-LG-12-->
	</div><!--END ROW-->
</div><!--END CONTAINER-->

<script>var baseurl='<?php echo base_url()?>'</script>
<script src="<?php echo base_url()?>js/seo.js"></script>
