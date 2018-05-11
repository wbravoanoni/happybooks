<div class="container">
	<div class="row">
		<h1 class="text-center">Configuración</h1>
		<div class="col-lg-3" style="display: flex;justify-content: center;">


<ul id="elem_config" class="nav nav-pills nav-stacked">
	<li role="presentation" class="active"><a href="<?php echo base_url()?>/Cconfig/pais">Paises</a></li>
	<li role="presentation"><a href="#">Ciudades</a></li>
	<li role="presentation"><a href="#">Autores</a></li>
	<li role="presentation"><a href="#">Generos</a></li>
	<li role="presentation" class="disabled"><a href="#">Correo</a></li>
</ul>
		
		</div>

		<div class="col-lg-6">

<ul class="list-group">
  <li class="list-group-item">Chile</li>
  <li class="list-group-item">Perú</li>
  <li class="list-group-item">Colombia</li>
  <li class="list-group-item">Paraguay</li>
  <li class="list-group-item">Brazil</li>
  <li class="list-group-item">Argentina</li>
  <li class="list-group-item">Bolivia</li>
  <li class="list-group-item">Venezuela</li>
  <li class="list-group-item">Mexico</li>
  <li class="list-group-item">Panama</li>
</ul>

			<nav aria-label="Page navigation" style="display: flex;justify-content: center;">
			  <ul class="pagination">
			    <li>
			      <a href="#" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    <li><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">4</a></li>
			    <li><a href="#">5</a></li>
			    <li>
			      <a href="#" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			  </ul>
			</nav>
			
		</div>
	</div>
</div>	

<script>

$(".list-group .list-group-item").hover(function(){
$(this).css({"background-color":"rgba(255,255,255,.1)"});
},function(){
	$(this).css({"background-color":"rgb(255,255,255)"});
});

$("#elem_config>li[class!='disabled']").click(function(){
	$("#elem_config>li").removeClass("active");
	$(this).addClass("active");
});



</script>

<script type="text/javascript">
var baseurl="<?php echo base_url();?>";
</script>

