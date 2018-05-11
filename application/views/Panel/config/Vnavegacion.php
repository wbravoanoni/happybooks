<ul id="elem_config" class="nav nav-pills nav-stacked">
		<li class="pais" role="presentation"><a href="<?php echo base_url()?>Cconfig/pais">Paises</a></li>
		<li class="ciudades" role="presentation"><a href="<?php echo base_url()?>Cconfig/ciudades">Ciudades</a></li>
		<li class="autores" role="presentation"><a href="<?php echo base_url()?>Cconfig/autores">Autores</a></li>
		<li class="genero" role="presentation"><a href="<?php echo base_url()?>Cconfig/genero">Generos</a></li>
		<li role="presentation" class="disabled"><a href="#">Correo</a></li>
</ul>

<?php
if($this->uri->segment(1)=='Cconfig' && $this->uri->segment(2)=='pais'){?>
<script>
	$("#elem_config>li").removeClass("active");
	$("#elem_config>li.pais").addClass("active");
</script>
<?php
}
?>

<?php
if($this->uri->segment(1)=='Cconfig' && $this->uri->segment(2)=='ciudades'){?>
<script>
	$("#elem_config>li").removeClass("active");
	$("#elem_config>li.ciudades").addClass("active");
</script>
<?php
}
?>

<?php
if($this->uri->segment(1)=='Cconfig' && $this->uri->segment(2)=='autores'){?>
<script>
	$("#elem_config>li").removeClass("active");
	$("#elem_config>li.autores").addClass("active");
</script>
<?php
}
?>

<?php
if($this->uri->segment(1)=='Cconfig' && $this->uri->segment(2)=='genero'){?>
<script>
	$("#elem_config>li").removeClass("active");
	$("#elem_config>li.genero").addClass("active");
</script>
<?php
}
?>

