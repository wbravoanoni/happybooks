console.log("Usuarios perfil");

function cargarPaises(idPais,idCiudad){
$.post(baseurl+"Cusuarios/getUsuariosPaisesController",
	{
		sitReg: 1
	},
	function(data){
var c = JSON.parse(data);
$.each(c,function(i,item){

	if(idPais==item.idPais)
	{
	$('#pais_view').append('<option selected value='+item.idPais+'>'+item.nombrePais+'</option>');
	}
	else
	{
	$('#pais_view').append('<option value='+item.idPais+'>'+item.nombrePais+'</option>');
	}
});
idPais2=$('#pais_view option:selected').val();
cargarCiudades(idPais2,idCiudad);
});


}

function cargarCiudades(idPais2,idCiudad)
	{
	$('#ciudad_view').html('');
	$.post(baseurl+"Cusuarios/getUsuariosCiudadesController",
		{
			sitReg: 1,
			pais: idPais2
		},
		function(data){
		var c = JSON.parse(data);
		$.each(c,function(i,item)

		{

		if(idCiudad==item.idCiudad)
			{
			$('#ciudad_view').append('<option selected value='+item.idCiudad+'>'+item.ciudad+'</option>');
			}
			else
			{
			$('#ciudad_view').append('<option value='+item.idCiudad+'>'+item.ciudad+'</option>');
			}

		});

	});

	}

	function cargarTipo(idTipo){

var obj = {
	"1": "Maestro",
	"2": "Administrador",
	"3": "Usuario",
	"4": "Invitado"
};
$.each( obj, function( i, item ) {


if(idTipo==i)
	{
	$('#tipo_view').append('<option selected value='+i+'>'+item+'</option>');
	}
	else
	{
	$('#tipo_view').append('<option value='+i+'>'+item+'</option>');
	}

});

	}


function cargarPerfil(){

$.post(baseurl+"Cusuarios/cargarPerfilController",
	{
	},
	function(data){
var c = JSON.parse(data);
$.each(c,function(i,item){

	$("#nombre_view").attr("value",item.nombre);
	$("#appaterno_view").attr("value",item.appaterno);
	$("#apmaterno_view").attr("value",item.apmaterno);
	$("#nacimiento_view").attr("value",item.fecnac);
	$("#img_view").attr("src",item.foto);
	$("#email_view").attr("value",item.correo);
	$("#pass_view").attr("value","****");
	$("#pass2_view").attr("value","****");

	cargarPaises(item.idPais,item.idCiudad);
	cargarTipo(item.tipo);

});
});

}

cargarPerfil();

/* --- Inicio Actualizar Ciudad ---*/

$('#pais_view').change(function(){

$('#pais_view option:selected').each(function(){
id=$('#pais_view').val();
});
//rellenar Combobox con Ciudades
$('#ciudad_view').html('');
$.post(baseurl+"Cusuarios/getUsuariosCiudadesController",
	{
		sitReg: 1,
		pais: id
	},
	function(data){
var c = JSON.parse(data);
$.each(c,function(i,item){
	$('#ciudad_view').append('<option value='+item.idCiudad+'>'+item.ciudad+'</option>');
});
});

});

/* --- Fin Actualizar Ciudad ---*/

//Actualizar Usuarios


/* -- INICIO ACTUALIZAR USUARIOS--- */

/*
$("#actualizar_view2").submit(function(event)

{
event.preventDefault();

	$.ajax({
		beforeSend:function(){
		//$("#caja").show();
		},
			url:$("#actualizar_view").attr("action"),
			type:$("#actualizar_view").attr("method"),
			data:$("#actualizar_view").serialize(),
			success:function(respuesta)
		{
			if(respuesta!=2){

			//alert(respuesta);
			alert("Actualizado Con exito");
			$('#mbtnCerrarModalUpdate').click();
			location.reload();

			}else{

				$('#alertaCorreo2').css('display','block').fadeOut(8000);
			}

		},
			error:function(){
			alert("ERROR GENERAL DEL SISTEMA, INTENTE NUEVAMENTE");
	}

	});

});
*/
/* --- FIN ACTUALIZAR USUARIOS --- */

/*
$('#actualizar_view2').submit(function(e){

//e.preventDefault();
console.log("me ejecute");
var nombre    = $('#nombre_view').val();
var appaterno = $('#appaterno_view').val();
var apmaterno = $('#apmaterno_view').val();
var nacimiento= $('#nacimiento_view').val();
var pais      = $('#pais_view').val();
var ciudad    = $('#ciudad_view').val();
var email     = $('#email_view').val();
var pass1     = $('#pass_view').val();
var pass2     = $('#pass2_view').val();
var tipo      = $('#tipo_view').val();
var archivo   = $('#mi-archivo').val();


$.post(baseurl+"Cusuarios/actualizarUsuarioView",

{
nombre_view:nombre,
appaterno_view:appaterno,
apmaterno_view:apmaterno,
nacimiento_view:nacimiento,
pais_view:pais,
ciudad_view:ciudad,
email_view:email,
pass_view:pass1,
pass2_view:pass2,
mi_archivo:archivo,
tipo_view:tipo,
}

,function(data){
if(data=="contrasena"){
	alert("contraseñas no coinciden");
}else if(data=="correcto"){
	alert("Se guardo correctamente");
location.href(baseurl+"Cusuarios/verPerfil");	
}else{
	alert(data);
	console.log(data);
}
});



});
*/
