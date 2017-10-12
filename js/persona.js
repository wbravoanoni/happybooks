
//rellenar Conbobox con Ciudades
$.post(baseurl+"Cciudad/getCiudadC",
	{
		sitReg: 1
	},
	function(data){
var c = JSON.parse(data);
$.each(c,function(i,item){
	$('#cboCiudad').append('<option value='+item.idCiudad+'>'+item.ciudad+'</option>');
});
});


//ejecuta un alert cuando se selecciona un elemento
$('#cboCiudad').change(function(){

$('#cboCiudad option:selected').each(function(){
var id=$('#cboCiudad').val();
alert(id);
});
});


$('#btnGetPersonas').click(function(){

//reiniciar valores de la tabla
$('#tblPersonas').html(
'<tr>'+
'<th style="width: 10px">#</th>'+
'<th>Nombre</th>'+
'<th>Paterno</th>'+
'<th>Materno</th>'+
'<th>Ciudad</th>'+
'<th>Email</th>'+
'<th>DNI</th>'+
'<th>fecha Nac</th>'+
'</tr>');

//alert("Pulsaste el boton");

$.post(baseurl+"cpersonas/getPersonas",
{},

function(data){
//alert(data);

var p =JSON.parse(data);
$.each(p,function(i,item){
$('#tblPersonas').append(
'<tr>'+
'<td>'+item.idPersona+'</td>'+
'<td>'+item.nombre+'</td>'+
'<td>'+item.appaterno+'</td>'+
'<td>'+item.apmaterno+'</td>'+
'<td>'+item.ciudad+'</td>'+
'<td>'+item.email+'</td>'+
'<td>'+item.dni+'</td>'+
'<td>'+item.fecnac+'</td>'+
'</tr>'
	);


});


});

});





