

<h3>Subir imagen</h3>


<form action="<?php echo base_url()?>Cupload/subirImagen" method="POST" enctype="multipart/form-data">
<table>
	<tr>
		<td>Titulo</td>
		<td><input type="text" name="titImagen" class="form-control"></td>
	</tr>
	<tr>
		<td>Imagen</td>
		<td>
			<input type="file" name="fileImagen" class="form-control">
	    </td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="Guardar"></td>
	</tr>
</table>
</form>

<?php 
if(isset($error)){
echo $error;
}
?>

<br><br>

<h3>Subir y descargar Archivos</h3>
<form action="<?php echo base_url()?>Cupload/subirArchivo" method="POST" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Titulo</td>
			<td>
				<input type="text" name="titImagen" class="form-control">
			</td>
			<tr>
				<td>Imagen</td>
			 <td>
			 	<input type="file" name="fileImagen" class="form-control">
			 </td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Guardar"></td>
			</tr>
		</tr>
	</table>
</form>

<?php echo $errorArch;?>
<?php echo $estado;?>

<?php 

if(sizeof($archivo)==0){ ?>

<a href="<?php echo base_url()?>Cupload/downloads/<?php echo $archivo?>">Descargar</a>
<?php } ?>
