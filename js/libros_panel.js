/*=============================================
=            Section slider de puntos         =
=============================================*/

var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
output.innerHTML = this.value;
$("#myRange").attr("value",this.value);
}

/*
var sliderUpte = document.getElementById("uMyRange");
var outputUpte = document.getElementById("uDemo");
outputUpte.innerHTML = sliderUpte.value; // Display the default slider value

sliderUpte.oninput = function() {
outputUpte.innerHTML = this.value;
$("#uMyRange").attr("value",this.value);
}
*/
/*=====  End of Section slider de puntos    ======*/

cargarLibros();
cargarGeneros();
cargarUsuariosLibros();
cargarAutoresLibros();





function cargarLibros(){

	$("#tablaLibros").dataTable().fnDestroy();
	
$('#tablaLibros').DataTable({

'paging':true,
'info':true,
'filter':true,
'staveSave':true,

'ajax':{
		"url":baseurl+"Clibros/listarLibrosPanel",
		"type":"POST",
		//"data":{
		//"p1":p1,
		//"p2":p2
		// }
		dataSrc:''
		},
	'columns':[
		{data:'idLibros','sClass':'dt-body-center'},
		{data:'nombre'},
		{data:'autor'},
		{data:'genero'},
		{data:'activo'},
		{"orderable":true,
	render:function(data, type, row){

		var nombre      = row.nombre.replace(/\r\n/g,' ');
		var resumen     = row.resumen.replace(/\r\n/g,' ');
		var descripcion = row.descripcion.replace(/\r\n/g,' ');

return '<a href="#" class="btn btn-block btn-primary btn-sm" style="width:80%;" data-toggle="modal" data-target="#modalActualizarLibro" onclick="selLibros(\''+row.idLibros+'\',\''+row.llave+'\',\''+nombre+'\',\''+row.autor+'\',\''+resumen+'\',\''+descripcion+'\',\''+row.puntaje+'\',\''+row.imagen+'\',\''+row.fechaCreacion+'\',\''+row.usuario+'\',\''+row.genero+'\',\''+row.paginas+'\',\''+row.activo+'\')"> <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></a>';

	
	}
}
],
//Inicio extra
"columnDefs":[
	{
		"targets": [4],
		"data": "activo",
		"render":function(data, type, row){

		if(data==0){
		return "<span class='btn btn-block btn-default btn-sm'>Inactivo</span>";
		}else if(data==1){
		return "<span class='btn btn-block btn-success btn-sm'>Activo</span>";
		}

	}
	},

	{
		"targets": [1],
		"data": "nombre",
		"render":function(data, type, row){
		return "<span style='color:#006699;'><i class='fa fa-book'></i> &nbsp;"+row.nombre+"</span><br>"+
		"<span><i class='fa fa-calendar'></i>&nbsp&nbsp;"+row.fechaCreacion+"</span>";
	}
	},

	{
	"targets": [2],
	"data": "autor",
	"render":function(data, type, row){
	return "<span style='color:#006699;'><i class='fa fa-user-circle'></i> &nbsp;"+row.autor+"</span><br>"+
	"<span><i class='glyphicon glyphicon-record'></i>&nbsp&nbsp;"+row.genero+"</span>";
	}
	},

	{
	"targets": [3],
	"data": "usuario",
	"render":function(data, type, row){
	return "<span '<i class='fa fa-paperclip'></i> &nbsp;"+row.usuario+"</span>";
	}
	}


],
//Fin extra
"order":[[1, "asc" ]], // Nº de Columna que ordena
});

selLibros=function(idLibros,llave ,nombre, autor, resumen, descripcion,puntaje,imagen,fechaCreacion,usuario,genero,paginas,activo)

	{

$("#cajaPuntos").find("div").html("");
var enlaceI=$('<input  type="range" min="0" max="50" value="'+puntaje+'" class="slider" id="uMyRange" name="uMyRange">');
$("#cajaPuntos").find("div").html(enlaceI);

		$('#LtxtNombre').val(idLibros);
		$("#key").attr("value",llave).hide();
		$('#uNombreLibro').val(nombre);
		$('#uAutorLibro').val(autor);
		$('#uResumenLibro').val(resumen);
		$('#uDescripcionLibro').val(descripcion);
		$('#utxtEmail2').val(puntaje);
		$('#uImagenLibro').val(imagen);
		$("#uIdLibro").attr("value",idLibros).hide();
   		$("#uDemo").html(puntaje);
   		$("#uMyRange").attr("value",puntaje);
   		$("#uNPaginas").attr("value",paginas);

   		


		buscarUsuarioLibro(usuario);
		buscarGeneroLibro(genero);
		libroActivo(activo);
		buscarAutoresLibro(autor);

var sliderUpte = document.getElementById("uMyRange");
sliderUpte.oninput = function(){
$("#uDemo").html(this.value);
$("#uMyRange").attr("value",this.value);
}

$("#uMyRange").attr("value",puntaje);





	};
}


function cargarGeneros(){

$('#cboGenero').html('');

$.post(baseurl+"Clibros/listarGeneros",
	{
		activo: 1
	},
	function(data){
var c = JSON.parse(data);
$.each(c,function(i,item){
	$('#cboGenero').append('<option value='+item.idGenero+'>'+item.nombre+'</option>');
});
});
}

function cargarUsuariosLibros(){

$('#cboUsuariosLibro').html('');

$.post(baseurl+"Clibros/listarUsuariosLibros",
	{
		activo: 1
	},
	function(data){
var c = JSON.parse(data);
$.each(c,function(i,item){
	$('#cboUsuariosLibro').append('<option value='+item.idUsuario+'>'+item.usuarios+'</option>');
});
});
}


function cargarAutoresLibros(){

$('#cboautorLibro').html('');

$.post(baseurl+"Clibros/cListarAutoresLibros",
	{
		activo: 1
	},
	function(data){
var c = JSON.parse(data);
$.each(c,function(i,item){
	$('#cboautorLibro').append('<option value='+item.idAutores+'>'+item.autores+'</option>');
});
});
}





//Agregar Libros
$("#formularioAgregarLibro").submit(function(event)

{
event.preventDefault();

	$.ajax({
		beforeSend:function(){
		//$("#caja").show();
		},
			url:$("#formularioAgregarLibro").attr("action"),
			type:$("#formularioAgregarLibro").attr("method"),
			data:$("#formularioAgregarLibro").serialize(),
			success:function(respuesta)
		{
			if(respuesta!=2){

			alert("Agregado con exito");
			$('#btnCerrarModalLibros').click();
			cargarLibros();
			//location.reload();

			}else{

				$('#alertaCorreo').css('display','block');
			}

		},
			error:function(){
			alert("ERROR GENERAL DEL SISTEMA, INTENTE NUEVAMENTE");
	}

	});

});


/*=========================================
=            Actualizar Libros            =
=========================================*/

//Busca al usuario que creo la reseña
function buscarUsuarioLibro(usuario)
	{
	$('#aUsuariosLibro').html('');
	$.post(baseurl+"Clibros/cUsuariosCreadorResena",
		{
			idLibro: usuario
		},
		function(data){
		var c = JSON.parse(data);
		$.each(c,function(i,item)

		{

		if(usuario==item.usuarios && item.activo==0)
			{
			$('#aUsuariosLibro').append('<option selected value='+item.idUsuario+'>'+item.usuarios+' (Desactivado) </option>');
			}
			else if(usuario==item.usuarios && item.activo==1){
			$('#aUsuariosLibro').append('<option selected value='+item.idUsuario+'>'+item.usuarios+'</option>');
			}
			else if(usuario!=item.usuarios && item.activo==0){
			$('#aUsuariosLibro').append('<option value='+item.idUsuario+'>'+item.usuarios+' (Desactivado) </option>');
			}
			else
			{
			$('#aUsuariosLibro').append('<option value='+item.idUsuario+'>'+item.usuarios+'</option>');
			}

		});

	});

	}


	function buscarGeneroLibro(nombreGenero)
	{
	$('#uCboGenero').html('');
	$.post(baseurl+"Clibros/cListarTodosGeneros",
		{
			idLibro: nombreGenero
		},
		function(data){
		var c = JSON.parse(data);
		$.each(c,function(i,item)

		{

		if(nombreGenero==item.nombre)
			{
			$('#uCboGenero').append('<option selected value='+item.idGenero+'>'+item.nombre+'</option>');
			}
			else
			{
			$('#uCboGenero').append('<option value='+item.idGenero+'>'+item.nombre+'</option>');
			}

		});

	});

	}


	function buscarAutoresLibro(nombreAutor)
	{
	$('#uAutorLibro').html('');
	$.post(baseurl+"Clibros/cListarTodosAutores",
		{
	
		},
		function(data){
		var c = JSON.parse(data);
		$.each(c,function(i,item)

		{

		if(nombreAutor==item.autores)
			{
			$('#uAutorLibro').append('<option selected value='+item.idAutores+'>'+item.autores+'</option>');
			}
			else
			{
			$('#uAutorLibro').append('<option value='+item.idAutores+'>'+item.autores+'</option>');
			}

		});

	});

	}



function libroActivo(activo){

$('#uEstadoLibro').html('');
if(activo==1)
{

$('#uEstadoLibro').append('<option selected value="1">Activo</option>');
$('#uEstadoLibro').append('<option value="0">Desactivado</option>');
}
else
{
$('#uEstadoLibro').append('<option value="1">Activo</option>');
$('#uEstadoLibro').append('<option selected value="0">Desactivado</option>');
}
}




//Actualizar Libros

$("#formularioActualizarLibro").submit(function(event)

{
event.preventDefault();

	$.ajax({
		beforeSend:function(){
		//$("#caja").show();
		},
			url:$("#formularioActualizarLibro").attr("action"),
			type:$("#formularioActualizarLibro").attr("method"),
			data:$("#formularioActualizarLibro").serialize(),
			success:function(respuesta)
		{
			if(respuesta!=2){

			alert("Actualizado con exito");
			$('#modalActualizarLibro').click();
			cargarLibros();
			//location.reload();

			}else{

				$('#alertaCorreo').css('display','block');
			}

		},
			error:function(){
			alert("ERROR GENERAL DEL SISTEMA, INTENTE NUEVAMENTE");
	}

	});

});


	$("#reload").click(function(){
		cargarLibros();
		cargarGeneros();
		cargarUsuariosLibros();
		cargarAutoresLibros();
	});



/*=====  End of Actualizar Libros  ======*/




