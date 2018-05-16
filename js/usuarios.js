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
		$('#utxtEmail2').val(email);
		
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
	$('#uComboPaisesConfig').append('<option value='+item.idPais+'>'+item.nombrePais+'</option>');
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

//Agregar Usuarios
$("#agregarUsuarios").submit(function(event)

{
event.preventDefault();

if(validarEnvio()==true){


	$.ajax({
		beforeSend:function(){
		//$("#caja").show();
		},
			url:$("#agregarUsuarios").attr("action"),
			type:$("#agregarUsuarios").attr("method"),
			data:$("#agregarUsuarios").serialize(),
			success:function(respuesta)
		{
			if(respuesta!=2){

			alert("Agregado con exito");
			$('#mbtnCerrarModal').click();
			recargarTabla();
			//location.reload();

			}else{

				$('#alertaCorreo').css('display','block');
			}

		},
			error:function(){
			alert("ERROR GENERAL DEL SISTEMA, INTENTE NUEVAMENTE");
	}

	});
}

});


//Actualizar Usuarios


$("#actualizar_view").submit(function(event)

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
/*
$('#mtxtEmail').keyup(function(){

	data=$('#mtxtEmail').val();

	console.log("Presiono");

//rellenar combo Tipo Actualizar
$.post(baseurl+"Cusuarios/existeCorreoController2",
	{
		data:data
	},

		function(data){
		var c = JSON.parse(data);
		$.each(c,function(i,item)

		{

		if(item.correo)
			{
		console.log("Existe Correo");
			}
			else
			{
			console.log("No Existe Correo");
			}

		});

	});

});

/*=============================================
=            Validar Nombre 	            =
=============================================*/

$('#txtNombre').focusout(function(){
var tamanoNom=$('#txtNombre').val().length;
	

if(tamanoNom<3 ){
$('#txtNombre').css("border-color","red");
$('#alertNombre').css("display","block");
$('#alertNombre').html("El nombre debe tener entre 3 a 20 caracteres.");
}

});

$('#txtNombre').keyup(function(){

var tamanoNom=$('#txtNombre').val().length;
var nombre=$('#txtNombre').val();
var expresion = /^[a-zA-Z0-9]*$/;

if(tamanoNom>20){
$('#txtNombre').css("border-color","red");
$('#alertNombre').css("display","block");
$('#alertNombre').html("El Nombre debe tener entre 3 a 20 caracteres");
}else{

if(!expresion.test(nombre)){
$('#txtNombre').css("border-color","red");
$('#alertNombre').css("display","block");
$('#alertNombre').html("El Nombre no debe tener caracteres especiales");
}else{

$('#txtNombre').css("border-color","#d2d6de");
$('#alertNombre').css("display","none");
}
}


});

/*=====  End of Section Validar Nombre   ======*/


/*=============================================
=            Validar Ap. Paterno 	          =
=============================================*/

$('#txtApPaterno').focusout(function(){
var tamano=$('#txtApPaterno').val().length;


if(tamano<3 ){
$('#txtApPaterno').css("border-color","red");
$('#alertPaterno').css("display","block");
$('#alertPaterno').html("El ap. Paterno debe tener entre 3 a 20 caracteres.");
}

});

$('#txtApPaterno').keyup(function(){
var tamano=$('#txtApPaterno').val().length;
var paterno=$('#txtApPaterno').val();	
var expresion = /^[a-zA-Z0-9]*$/;	

if(tamano>20){
$('#txtApPaterno').css("border-color","red");
$('#alertPaterno').css("display","block");
$('#alertPaterno').html("El A. Paterno debe tener entre 3 a 20 caracteres");
}else{

if(!expresion.test(paterno)){
$('#txtApPaterno').css("border-color","red");
$('#alertPaterno').css("display","block");
$('#alertPaterno').html("El A. Paterno no debe tener caracteres especiales");
}else{

$('#txtApPaterno').css("border-color","#d2d6de");
$('#alertPaterno').css("display","none");
}
}

});

/*=====  End of Section Ap. Paterno    ======*/


/*=============================================
=            Validar Ap. Materno 	          =
=============================================*/

$('#txtApMaterno').focusout(function(){
var tamano=$('#txtApMaterno').val().length;	

if(tamano<3 ){
$('#txtApMaterno').css("border-color","red");
$('#alertMaterno').css("display","block");
$('#alertMaterno').html("El ap. Materno debe tener entre 3 a 20 caracteres.");
}

});

$('#txtApMaterno').keyup(function(){
var tamano=$('#txtApMaterno').val().length;	
var materno=$('#txtApMaterno').val();	
var expresion = /^[a-zA-Z0-9]*$/;	

if(tamano>20){
$('#txtApMaterno').css("border-color","red");
$('#alertMaterno').css("display","block");
$('#alertMaterno').html("El ap. materno debe tener entre 3 a 20 caracteres.");
}else{

if(!expresion.test(materno)){
$('#txtApMaterno').css("border-color","red");
$('#alertMaterno').css("display","block");
$('#alertMaterno').html("El ap. materno no debe tener caracteres especiales.");
}else{

$('#txtApMaterno').css("border-color","#d2d6de");
$('#alertMaterno').css("display","none");
}
}

});


/*=============================================
=            Validar Email	          		 =
=============================================*/

$('#mtxtEmail').focusout(function(){
var tamano=$('#mtxtEmail').val().length;	

if(tamano<8 ){
$('#mtxtEmail').css("border-color","red");
$('#alertEmail').css("display","block");
$('#alertEmail').html("El email debe tener entre 8 a 40 caracteres.");
}

});

$('#mtxtEmail').keyup(function(){
var tamano=$('#mtxtEmail').val().length;	
var email=$('#mtxtEmail').val();	
var expresion =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

if(tamano>40){
$('#mtxtEmail').css("border-color","red");
$('#alertEmail').css("display","block");
$('#alertEmail').html("El ap. materno debe tener entre 8 a 40 caracteres.");
}else{

if(!expresion.test(email)){
$('#mtxtEmail').css("border-color","red");
$('#alertEmail').css("display","block");
$('#alertEmail').html("El formato del email no es el correcto.");
}else{

$('#mtxtEmail').css("border-color","#d2d6de");
$('#alertEmail').css("display","none");
}
}

});

/*===========================================
=            Section contrasenas           =
===========================================*/

$('#txtpass').focusout(function(){
var tamano=$('#txtpass').val().length;	

if(tamano<6 ){
$('#txtpass').css("border-color","red");
$('#alertPass').css("display","block");
$('#alertPass').html("La contraseña debe tener entre 6 a 20 caracteres.");
}

});

$('#txtpass').keyup(function(){
var tamano=$('#txtpass').val().length;	
var pass=$('#txtpass').val();
var pass2=$('#txtpass2').val();
	
var expresion =/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;

if(tamano>12){
$('#txtpass').css("border-color","red");
$('#alertPass').css("display","block");
$('#alertPass').html("La contraseña debe tener entre 6 a 20 caracteres.");
}else{

if(!expresion.test(pass)){
$('#txtpass').css("border-color","red");
$('#alertPass').css("display","block");
$('#alertPass').html("La contraseña debe tener una mayuscula y un número.");
}
else{

$('#txtpass').css("border-color","#d2d6de");
$('#alertPass').css("display","none");
$('#alertPass').html("...");
}
}

});

//Validar Contraseñas iguales

$('#txtpass2').keyup(function(){
var pass=$('#txtpass').val();
var pass2=$('#txtpass2').val();

if(pass!=pass2){
	$('#txtpass2').css("border-color","red");
	$('#alertPass2').css("display","block");
	$('#alertPass2').html("La contraseña deben ser iguales.");
}else{
	$('#txtpass2').css("border-color","#d2d6de");
	$('#alertPass2').css("display","none");
	$('#alertPass2').html("...");

}
});

/*=============================================
=            Section Validar BOX            =
=============================================*/

$('#txtNacimiento').focusout(function(){

	if($(this).val()==""){
	$('#txtNacimiento').css("border-color","red");
	$('#alertNacimiento').css("display","block");
	$('#alertNacimiento').html("Selecione una fecha de nacimiento.");
}else{
	$('#txtNacimiento').css("border-color","#d2d6de");
	$('#alertNacimiento').css("display","none");
	$('#alertNacimiento').html("...");
} 
});

$('#cboPaises').focusout(function(){
	if($(this).val()==""){
	$('#cboPaises').css("border-color","red");
	$('#alertPais').css("display","block");
	$('#alertPais').html("Selecione una pais.");
}else{
	$('#cboPaises').css("border-color","#d2d6de");
	$('#alertPais').css("display","none");
	$('#alertPais').html("...");
} 
});

$('#cboTipo').focusout(function(){
	if($(this).val()==""){
	$('#cboTipo').css("border-color","red");
	$('#alertTipo').css("display","block");
	$('#alertTipo').html("Selecione una tipo");
}else{
	$('#cboTipo').css("border-color","#d2d6de");
	$('#alertTipo').css("display","none");
	$('#alertTipo').html("...");
} 
});

$('#cboEstado').focusout(function(){
	if($(this).val()==""){
	$('#cboEstado').css("border-color","red");
	$('#alertEstado').css("display","block");
	$('#alertEstado').html("selecione una Tipo");
}else{
	$('#cboEstado').css("border-color","#d2d6de");
	$('#alertEstado').css("display","none");
	$('#alertEstado').html("...");
} 
});
/*=====  End of Section comment block  ======*/


/*=============================================
=            VAlidar Envio          =
=============================================*/

function validarEnvio(){

/*=============================================
=            VAlidar Nombre          =
=============================================*/

var tamanoNom=$('#txtNombre').val().length;
	
if(tamanoNom<3 ){
$('#txtNombre').css("border-color","red");
$('#alertNombre').css("display","block");
$('#alertNombre').html("El nombre debe tener entre 3 a 20 caracteres.");
return false;
}

var tamanoNom=$('#txtNombre').val().length;
var nombre=$('#txtNombre').val();
var expresion = /^[a-zA-Z0-9]*$/;

if(tamanoNom>20){
$('#txtNombre').css("border-color","red");
$('#alertNombre').css("display","block");
$('#alertNombre').html("El nombre debe tener entre 3 a 20 caracteres.");
return false;
}else{

if(!expresion.test(nombre)){
$('#txtNombre').css("border-color","red");
$('#alertNombre').css("display","block");
$('#alertNombre').html("El nombre no debe tener caracteres especiales.");
return false;
}else{

$('#txtNombre').css("border-color","#d2d6de");
$('#alertNombre').css("display","none");
$('#alertNombre').html("...");
}
}
/*=====  End of Section Validar Nombre   ======*/


/*=============================================
=            Validar Ap. Paterno 	          =
=============================================*/

var tamano=$('#txtApPaterno').val().length;

if(tamano<3 ){
$('#txtApPaterno').css("border-color","red");
$('#alertPaterno').css("display","block");
$('#alertPaterno').html("El Ap. Paterno debe tener entre 3 a 20 caracteres.");
return false;
}

var tamano=$('#txtApPaterno').val().length;
var paterno=$('#txtApPaterno').val();	
var expresion = /^[a-zA-Z0-9]*$/;	

if(tamano>20){
$('#txtApPaterno').css("border-color","red");
$('#alertPaterno').css("display","block");
$('#alertPaterno').html("El Ap. Paterno debe tener entre 3 a 20 caracteres.");
return false;
}else{

if(!expresion.test(paterno)){
$('#txtApPaterno').css("border-color","red");
$('#alertPaterno').css("display","block");
$('#alertPaterno').html("El Ap. Paterno no debe tener caracteres especiales.");
return false;
}else{
$('#txtApPaterno').css("border-color","#d2d6de");
$('#alertPaterno').css("display","none");
$('#alertPaterno').html("...");
}
}

/*=====  End of Section Ap. Paterno    ======*/

/*=============================================
=            Validar Ap. Materno 	          =
=============================================*/

var tamano=$('#txtApMaterno').val().length;	

if(tamano<3 ){
$('#txtApMaterno').css("border-color","red");
$('#alertMaterno').css("display","block");
$('#alertMaterno').html("El Ap. Materno debe tener entre 3 a 20 caracteres.");
return false;
}

var tamano=$('#txtApMaterno').val().length;	
var materno=$('#txtApMaterno').val();	
var expresion = /^[a-zA-Z0-9]*$/;	

if(tamano>20){
$('#txtApMaterno').css("border-color","red");
$('#alertMaterno').css("display","block");
$('#alertMaterno').html("El Ap. Materno debe tener entre 3 a 20 caracteres.");
return false;
}else{

if(!expresion.test(materno)){
$('#txtApMaterno').css("border-color","red");
$('#alertMaterno').css("display","block");
$('#alertMaterno').html("El Ap. Materno no debe tener caracteres especiales.");
return false;
}else{
$('#txtApMaterno').css("border-color","#d2d6de");
$('#alertMaterno').css("display","none");
$('#alertMaterno').html("...");
}
}
/*=====  End of Section Ap. Materno     ======*/

/*=============================================
=            Validar Email	          		 =
=============================================*/


var tamano=$('#mtxtEmail').val().length;	

if(tamano<8 ){
$('#mtxtEmail').css("border-color","red");
$('#alertEmail').css("display","block");
$('#alertEmail').html("El email debe tener entre 8 a 40 caracteres.");
return false;
}

var tamano=$('#mtxtEmail').val().length;	
var email=$('#mtxtEmail').val();	
var expresion =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

if(tamano>40){
$('#mtxtEmail').css("border-color","red");
$('#alertEmail').css("display","block");
$('#alertEmail').html("El Ap. Materno debe tener entre 8 a 40 caracteres.");
return false;
}else{

if(!expresion.test(email)){
$('#mtxtEmail').css("border-color","red");
$('#alertEmail').css("display","block");
$('#alertEmail').html("El formato del email no es el correcto.");
return false;
}else{

$('#mtxtEmail').css("border-color","#d2d6de");
$('#alertEmail').css("display","none");
$('#alertEmail').html("...");
}
}

/*=====  End of Section Validar Email    ======*/

/*===========================================
=            Section contrasenas           =
===========================================*/

var tamano=$('#txtpass').val().length;	

if(tamano<6 ){
$('#txtpass').css("border-color","red");
$('#alertPass').css("display","block");
$('#alertPass').html("La contraseña debe tener entre 6 a 20 caracteres.");
return false;
}

var tamano=$('#txtpass').val().length;	
var pass=$('#txtpass').val();
var pass2=$('#txtpass2').val();
	
var expresion =/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;

if(tamano>12){
$('#txtpass').css("border-color","red");
$('#alertPass').css("display","block");
$('#alertPass').html("La contraseña debe tener entre 6 a 20 caracteres.");
return false;
}else{

if(!expresion.test(pass)){
$('#txtpass').css("border-color","red");
$('#alertPass').css("display","block");
$('#alertPass').html("La contraseña debe tener una mayuscula y un número.");
return false;
}
else{

$('#txtpass').css("border-color","#d2d6de");
$('#alertPass').css("display","none");
$('#alertPass').html("...");
}
}

/*=====  validar Contraseñas iguales    ======*/

var pass=$('#txtpass').val();
var pass2=$('#txtpass2').val();

if(pass!=pass2){
	$('#txtpass2').css("border-color","red");
	$('#alertPass2').css("display","block");
	$('#alertPass2').html("La contraseña deben se iguales.");
	return false;
}else{
	$('#txtpass2').css("border-color","#d2d6de");
	$('#alertPass2').css("display","none");
	$('#alertPass2').html("...");
}

/*=====  End of Section Contraseñas    ======*/

/*=============================================
=            Section Validar BOX            =
=============================================*/

	if($("#txtNacimiento").val()==""){
	$('#txtNacimiento').css("border-color","red");
	$('#alertNacimiento').css("display","block");
	$('#alertNacimiento').html("Selecione una fecha de nacimiento.");
	return false;
}else{
	$('#txtNacimiento').css("border-color","#d2d6de");
	$('#alertNacimiento').css("display","none");
	$('#alertNacimiento').html("...");
} 

	if($("#cboPaises option:selected").val()==""){
	$('#cboPaises').css("border-color","red");
	$('#alertPais').css("display","block");
	$('#alertPais').html("Selecione una pais.");
	return false;
}else{
	$('#cboPaises').css("border-color","#d2d6de");
	$('#alertPais').css("display","none");
	$('#alertPais').html("...");
} 

	if($("#cboTipo option:selected").val()==""){
	$('#cboTipo').css("border-color","red");
	$('#alertTipo').css("display","block");
	$('#alertTipo').html("Selecione una tipo.");
	return false;
}else{
	$('#cboTipo').css("border-color","#d2d6de");
	$('#alertTipo').css("display","none");
	$('#alertTipo').html("...");
}
	if($('#cboEstado option:selected').val()==""){
	$('#cboEstado').css("border-color","red");
	$('#alertEstado').css("display","block");
	$('#alertEstado').html("Selecione un tipo");
	return false;
}else{
	$('#cboEstado option:selected').css("border-color","#d2d6de");
	$('#alertEstado').css("display","none");
	$('#alertEstado').html("...");
}

return true;

}
/*=====  End of Section Validar Envio ======*/

/*==================================================
=            Recargar Tabla de usuarios            =
==================================================*/

function recargarTabla(){

$("#tablaUsuarios").dataTable().fnDestroy();

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

}

/*=====  End of Section comment block  ======*/




/*===================================================================================================
=         							 Validar Actualizaciones    							       =
===================================================================================================*/

/*=============================================
=            Validar Nombre 	            =
=============================================*/

$('#utxtNombre').focusout(function(){
var tamanoNom=$('#utxtNombre').val().length;
	

if(tamanoNom<3 ){
$('#utxtNombre').css("border-color","red");
$('#ualertNombre').css("display","block");
$('#ualertNombre').html("El nombre debe tener entre 3 a 20 caracteres.");
}

});

$('#utxtNombre').keyup(function(){

var tamanoNom=$('#utxtNombre').val().length;
var nombre=$('#utxtNombre').val();
var expresion = /^[a-zA-Z0-9]*$/;

if(tamanoNom>20){
$('#utxtNombre').css("border-color","red");
$('#ualertNombre').css("display","block");
$('#ualertNombre').html("El Nombre debe tener entre 3 a 20 caracteres");
}else{

if(!expresion.test(nombre)){
$('#utxtNombre').css("border-color","red");
$('#ualertNombre').css("display","block");
$('#ualertNombre').html("El Nombre no debe tener caracteres especiales");
}else{

$('#utxtNombre').css("border-color","#d2d6de");
$('#ualertNombre').css("display","none");
}
}


});

/*=====  End of Section Validar Nombre   ======*/


/*=============================================
=            Validar Ap. Paterno 	          =
=============================================*/

$('#utxtApPaterno').focusout(function(){
var tamano=$('#utxtApPaterno').val().length;


if(tamano<3 ){
$('#utxtApPaterno').css("border-color","red");
$('#ualertPaterno').css("display","block");
$('#ualertPaterno').html("El ap. Paterno debe tener entre 3 a 20 caracteres.");
}

});

$('#utxtApPaterno').keyup(function(){
var tamano=$('#txtApPaterno').val().length;
var paterno=$('#txtApPaterno').val();	
var expresion = /^[a-zA-Z0-9]*$/;	

if(tamano>20){
$('#utxtApPaterno').css("border-color","red");
$('#ualertPaterno').css("display","block");
$('#ualertPaterno').html("El A. Paterno debe tener entre 3 a 20 caracteres");
}else{

if(!expresion.test(paterno)){
$('#utxtApPaterno').css("border-color","red");
$('#ualertPaterno').css("display","block");
$('#ualertPaterno').html("El A. Paterno no debe tener caracteres especiales");
}else{

$('#utxtApPaterno').css("border-color","#d2d6de");
$('#ualertPaterno').css("display","none");
}
}

});

/*=====  End of Section Ap. Paterno    ======*/


/*=============================================
=            Validar Ap. Materno 	          =
=============================================*/

$('#utxtApMaterno').focusout(function(){
var tamano=$('#utxtApMaterno').val().length;	

if(tamano<3 ){
$('#utxtApMaterno').css("border-color","red");
$('#ualertMaterno').css("display","block");
$('#ualertMaterno').html("El ap. Materno debe tener entre 3 a 20 caracteres.");
}

});

$('#utxtApMaterno').keyup(function(){
var tamano=$('#utxtApMaterno').val().length;	
var materno=$('#utxtApMaterno').val();	
var expresion = /^[a-zA-Z0-9]*$/;	

if(tamano>20){
$('#utxtApMaterno').css("border-color","red");
$('#ualertMaterno').css("display","block");
$('#ualertMaterno').html("El ap. materno debe tener entre 3 a 20 caracteres.");
}else{

if(!expresion.test(materno)){
$('#utxtApMaterno').css("border-color","red");
$('#ualertMaterno').css("display","block");
$('#ualertMaterno').html("El ap. materno no debe tener caracteres especiales.");
}else{

$('#utxtApMaterno').css("border-color","#d2d6de");
$('#ualertMaterno').css("display","none");
}
}

});


/*=============================================
=            Validar Email	          		 =
=============================================*/

$('#utxtEmail').focusout(function(){
var tamano=$('#utxtEmail').val().length;	

if(tamano<8 ){
$('#utxtEmail').css("border-color","red");
$('#ualertEmail').css("display","block");
$('#ualertEmail').html("El email debe tener entre 8 a 40 caracteres.");
}

});

$('#utxtEmail').keyup(function(){
var tamano=$('#utxtEmail').val().length;	
var email=$('#utxtEmail').val();	
var expresion =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

if(tamano>40){
$('#utxtEmail').css("border-color","red");
$('#ualertEmail').css("display","block");
$('#ualertEmail').html("El ap. materno debe tener entre 8 a 40 caracteres.");
}else{

if(!expresion.test(email)){
$('#utxtEmail').css("border-color","red");
$('#ualertEmail').css("display","block");
$('#ualertEmail').html("El formato del email no es el correcto.");
}else{

$('#utxtEmail').css("border-color","#d2d6de");
$('#ualertEmail').css("display","none");
}
}

});

/*===========================================
=            Section contrasenas           =
===========================================*/


$('#utxtpass').focusout(function(){

	if($('#utxtpass').val()!="Nada"){
var tamano=$('#utxtpass').val().length;	

if(tamano<6 ){
$('#utxtpass').css("border-color","red");
$('#ualertPass').css("display","block");
$('#ualertPass').html("La contraseña debe tener entre 6 a 20 caracteres.");
}
}
});

$('#utxtpass').keyup(function(){

if($('#utxtpass').val()!="Nada"){

var tamano=$('#utxtpass').val().length;	
var pass=$('#utxtpass').val();
var pass2=$('#utxtpass2').val();
	
var expresion =/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;

if(tamano>12){
$('#utxtpass').css("border-color","red");
$('#ualertPass').css("display","block");
$('#ualertPass').html("La contraseña debe tener entre 6 a 20 caracteres.");
}else{

if(!expresion.test(pass)){
$('#utxtpass').css("border-color","red");
$('#ualertPass').css("display","block");
$('#ualertPass').html("La contraseña debe tener una mayuscula y un número.");
}
else{

$('#utxtpass').css("border-color","#d2d6de");
$('#ualertPass').css("display","none");
$('#ualertPass').html("...");
}
}

}else{
$('#utxtpass').css("border-color","#d2d6de");
$('#ualertPass').css("display","none");
$('#ualertPass').html("...");
	
}

});

//Validar Contraseñas iguales

$('#utxtpass2').keyup(function(){
var pass=$('#utxtpass').val();
var pass2=$('#utxtpass2').val();

if(pass!=pass2){
	$('#utxtpass2').css("border-color","red");
	$('#ualertPass2').css("display","block");
	$('#ualertPass2').html("La contraseña deben ser iguales.");
}else{
	$('#utxtpass2').css("border-color","#d2d6de");
	$('#ualertPass2').css("display","none");
	$('#ualertPass2').html("...");

}
});

/*=============================================
=            Section Validar BOX            =
=============================================*/

$('#utxtNacimiento').focusout(function(){

	if($(this).val()==""){
	$('#utxtNacimiento').css("border-color","red");
	$('#ualertNacimiento').css("display","block");
	$('#ualertNacimiento').html("Selecione una fecha de nacimiento.");
}else{
	$('#utxtNacimiento').css("border-color","#d2d6de");
	$('#ualertNacimiento').css("display","none");
	$('#ualertNacimiento').html("...");
} 
});

$('#ucboPaises').focusout(function(){
	if($(this).val()==""){
	$('#ucboPaises').css("border-color","red");
	$('#ualertPais').css("display","block");
	$('#ualertPais').html("Selecione una pais.");
}else{
	$('#ucboPaises').css("border-color","#d2d6de");
	$('#ualertPais').css("display","none");
	$('#ualertPais').html("...");
} 
});

$('#ucboTipo').focusout(function(){
	if($(this).val()==""){
	$('#ucboTipo').css("border-color","red");
	$('#ualertTipo').css("display","block");
	$('#ualertTipo').html("Selecione una tipo");
}else{
	$('#ucboTipo').css("border-color","#d2d6de");
	$('#ualertTipo').css("display","none");
	$('#ualertTipo').html("...");
} 
});

$('#ucboEstado').focusout(function(){
	if($(this).val()==""){
	$('#ucboEstado').css("border-color","red");
	$('#ualertEstado').css("display","block");
	$('#ualertEstado').html("selecione una Tipo");
}else{
	$('#ucboEstado').css("border-color","#d2d6de");
	$('#ualertEstado').css("display","none");
	$('#ualertEstado').html("...");
} 
});
/*=====  End of Section comment block  ======*/


/*================= End of Section Validar Actualizaciones    =================*/





