$('#tablaUsuarios').DataTable({

'paging':true,
'info':true,
'filter':true,
'staveSave':true,

'ajax':{
		"url":baseurl+"Cusuarios/getUsuariosController/",
		"type":"POST",
		//"data":{
		//"p1":p1,
		//"p2":p2
		// }
		//dataSrc:''
		"dataSrc":function(data)
			{
			var suma=0;

			for(var i =0; i<= data.length-1;i++)
				{
				suma+=parseFloat(data[i].idPersona);
				}
			$('#spSuma').html(suma);
			return data;
			} 
		},
	'columns':[
		{data:'idPersona','sClass':'dt-body-center'},
		{data:'nombre'},
		{data:'ciudad'},
		{data:'correo'},
		{data:'activo'},
		{"orderable":true,
	render:function(data, type, row){

return '<a href="#" class="btn btn-block btn-primary btn-sm" style="width:80%;" data-toggle="modal" data-target="#modalActualizarUsuario" onclick="selUsuarios(\''+row.idPersona+'\',\''+row.nombre+'\',\''+row.appaterno+'\',\''+row.apmaterno+'\',\''+row.correo+'\',\''+row.fecnac+'\',\''+row.clave+'\',\''+row.idPais+'\',\''+row.idCiudad+'\',\''+row.activo+'\',\''+row.tipo+'\')"> <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></a>';

	
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
		return "<span style='color:#006699;'><i class='fa fa-user'></i> &nbsp;"+data+" "+row.appaterno+"</span><br>"+
		"<span><i class='fa fa-calendar'></i>&nbsp&nbsp;"+row.fecnac+"</span>"
	}
	},

	{
	"targets": [2],
	"data": "ciudad",
	"render":function(data, type, row){
	return "<span style='color:#006699;'><i class='glyphicon glyphicon-flag'></i> &nbsp;"+row.nombrePais+"</span><br>"+
	"<span><i class='glyphicon glyphicon-record'></i>&nbsp&nbsp;"+row.ciudad+"</span>"
	}
	},

	{
	"targets": [3],
	"data": "correo",
	"render":function(data, type, row){
	return "<span style='color:#006699;'<i class='glyphicon glyphicon-envelope'></i> <a href=mailto:"+row.correo+" target='_top'>"+row.correo+"</a></span>"
	}
	}


],
//Fin extra
"order":[[1, "asc" ]], // Nº de Columna que ordena
});


selUsuarios=function(idPersona, nombre, app, apm, email,fecnac,pass,idPais,idCiudad,activo,tipo)

	{
		$('#mhdnIdPersona').val(idPersona);
		$('#utxtNombre').val(nombre);
		$('#utxtApPaterno').val(app);
		$('#utxtApMaterno').val(apm);
		$('#utxtEmail').val(email);
		$('#utxtNacimiento').val(fecnac);
		$('#utxtpass').val("Nada");
		$('#utxtpass2').val("Nada");

		$("#ucboTipo").val(tipo);
		$("#ucboEstado").val(activo);

		$("#cboPaises2").val(idPais);
		cargarPaises(idCiudad);
	};

//rellenar box de paises

//rellenar Combobox con Paises modal Agregar
$.post(baseurl+"Cusuarios/getUsuariosPaisesController",
	{
		sitReg: 1
	},
	function(data){
var c = JSON.parse(data);
$.each(c,function(i,item){
	$('#cboPaises').append('<option value='+item.idPais+'>'+item.nombrePais+'</option>');
});
});

//rellenar Combobox con Paises modal Actualizar
$.post(baseurl+"Cusuarios/getUsuariosPaisesController",
	{
		sitReg: 1
	},
	function(data){
var c = JSON.parse(data);
$.each(c,function(i,item){
	$('#cboPaises2').append('<option value='+item.idPais+'>'+item.nombrePais+'</option>');
});
});


$('#cboPaises').change(function(){

$('#cboPaises option:selected').each(function(){
id=$('#cboPaises').val();
//alert(id);
});
//rellenar Combobox con Ciudades
$('#cboCiudades').html('');
$.post(baseurl+"Cusuarios/getUsuariosCiudadesController",
	{
		sitReg: 1,
		pais: id
	},
	function(data){
var c = JSON.parse(data);
$.each(c,function(i,item){
	$('#cboCiudades').append('<option value='+item.idCiudad+'>'+item.ciudad+'</option>');
});
});

});

$('#cboPaises2').change(function(){

$('#cboPaises2 option:selected').each(function(){
id=$('#cboPaises2').val();
//alert(id);
});
//rellenar Combobox con Ciudades
$('#cboCiudades2').html('');
$.post(baseurl+"Cusuarios/getUsuariosCiudadesController",
	{
		sitReg: 1,
		pais: id
	},
	function(data){
var c = JSON.parse(data);
$.each(c,function(i,item){
	$('#cboCiudades2').append('<option value='+item.idCiudad+'>'+item.ciudad+'</option>');
});
});

});

//Cargar Ciudades por defecto actualizar
function cargarPaises(idCiudad)
	{

	id2=$('#cboPaises2').val();
	//rellenar Combobox con Ciudades
	$('#cboCiudades2').html('');
	$.post(baseurl+"Cusuarios/getUsuariosCiudadesController",
		{
			sitReg: 1,
			pais: id2
		},
		function(data){
		var c = JSON.parse(data);
		$.each(c,function(i,item)

		{

		if(idCiudad==item.idCiudad)
			{
			$('#cboCiudades2').append('<option selected value='+item.idCiudad+'>'+item.ciudad+'</option>');
			}
			else
			{
			$('#cboCiudades2').append('<option value='+item.idCiudad+'>'+item.ciudad+'</option>');
			}

		});

	});

	}





//rellenar combo Tipo Agregar
$.post(baseurl+"Cusuarios/getUsuariosTiposController",
	{
	},
	function(data){
var c = JSON.parse(data);
$.each(c,function(i,item){
	$('#cboTipo').append('<option value='+item.idLogin+'>'+item.nombreTipo+'</option>');
});
});

//rellenar combo Tipo Actualizar
$.post(baseurl+"Cusuarios/getUsuariosTiposController",
	{
	},
	function(data){
var c = JSON.parse(data);
$.each(c,function(i,item){
	$('#ucboTipo').append('<option value='+item.idLogin+'>'+item.nombreTipo+'</option>');
});
});


// Actualizar Usuarios

/*
$('#mbtnUpdPersona').click(function(){

var txtNombre     = $('#txtNombre').val();
var txtApPaterno  = $('#txtApPaterno').val();
var txtApMaterno  = $('#txtApMaterno').val();
var txtNacimiento = $('#txtNacimiento').val();
var cboPaises     = $('#cboPaises').val();
var cboCiudades   = $('#cboCiudades').val();

var mtxtEmail     = $('#mtxtEmail').val();
var txtpass  	  = $('#txtpass').val();
var cboTipo   	  = $('#cboTipo').val();
var cboEstado     = $('#cboEstado').val();



$.post(baseurl+"Cusuarios/guardarUsuarios",
{
txtNombre:txtNombre,
txtApPaterno:txtApPaterno,
txtApMaterno:txtApMaterno,
txtNacimiento:txtNacimiento,
cboPaises:cboPaises,
cboCiudades:cboCiudades,

mtxtEmail:mtxtEmail,
txtpass:txtpass,
cboTipo:cboTipo,
cboEstado:cboEstado
},

function(data){
	if(data==1){
		$('#mbtnCerrarModal').click();
		 location.href =baseurl+"Cusuarios";
		//location.reload();
		}
	});
});
*/
// ***********************


//Agregar Usuarios
$("#agregarUsuarios").submit(function(event)

{
event.preventDefault();

	$.ajax({
		beforeSend:function(){
		//$("#caja").show();
		},
			url:$("#agregarUsuarios").attr("action"),
			type:$("#agregarUsuarios").attr("method"),
			data:$("#agregarUsuarios").serialize(),
			success:function(respuesta)
		{
		//alert(respuesta);
		alert("Agregado con exito");
		$('#mbtnCerrarModal').click();
		location.reload();
		},
			error:function(){
			alert("ERROR GENERAL DEL SISTEMA, INTENTE NUEVAMENTE");
	}

	});

});


//Actualizar Usuarios


$("#actualizarUsuarios").submit(function(event)

{
event.preventDefault();

	$.ajax({
		beforeSend:function(){
		//$("#caja").show();
		},
			url:$("#actualizarUsuarios").attr("action"),
			type:$("#actualizarUsuarios").attr("method"),
			data:$("#actualizarUsuarios").serialize(),
			success:function(respuesta)
		{
		//alert(respuesta);
		alert("Actualizado Con exito");
		$('#mbtnCerrarModalUpdate').click();
		location.reload();
		},
			error:function(){
			alert("ERROR GENERAL DEL SISTEMA, INTENTE NUEVAMENTE");
	}

	});

});



/*
$("#mbtnEliminarUsuario").click(function(){

$('#emailEliminar').val("Hola");

});
*/
enviaCorreo=function(email)

	{
	$('#emailEliminar').val(email);
	}


//Eliminar Usuarios

$("#eliminarUsuarios").submit(function(event)

{
event.preventDefault();

	$.ajax({
		beforeSend:function(){
		//$("#caja").show();
		},
			url:$("#eliminarUsuarios").attr("action"),
			type:$("#eliminarUsuarios").attr("method"),
			data:$("#eliminarUsuarios").serialize(),
			success:function(respuesta)
		{
		//alert(respuesta);
		alert("Registro eliminado con exito");
		$('#mbtnCerrarModaEliminarl').click();
		location.reload();
		},
			error:function(){
			alert("ERROR GENERAL DEL SISTEMA, INTENTE NUEVAMENTE");
	}

	});

});






