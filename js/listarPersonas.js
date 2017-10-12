//reiniciar valores de la tabla
$('#tblPersonasListas').html(
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
$('#tblPersonasListas').append(
'<tr>'+
'<td>'+item.idPersona+'</td>'+
'<td>'+item.nombre+'</td>'+
'<td>'+item.appaterno+'</td>'+
'<td>'+item.apmaterno+'</td>'+
'<td>'+item.ciudad+'</td>'+
'<td>'+item.email+'</td>'+
'<td>'+item.dni+'</td>'+
'<td>'+item.fecnac+'</td>'+
//'<td><a href="#" class="btn btn-block btn-primary btn-sm" style="width:80%;" data-toggle="modal" data-target="#modalEditPersona" onclick="selPersona(\''+item.idPersona+'\',\''+item.nombre+',\''+item.appaterno+'\',\''+item.apmaterno+'\',\''+item.ciudad+'\',\''+item.email+'\',\''+item.dni+'\',\''+item.fecnac+'\')"></a></td>'+
'<td><a href="#" class="btn btn-block btn-primary btn-sm" style="width:80%;" data-toggle="modal" data-target="#modalEditPersona" onclick="selPersona(\''+item.idPersona+'\',\''+item.nombre+'\',\''+item.appaterno+'\',\''+item.apmaterno+'\',\''+item.email+'\')"></a></td>'+
'</tr>'
	);

	});
		});


selPersona=function(idPersona,nombre,app,apm,email){

$('#mhdnIdPersona').val(idPersona);
$('#mtxtNombre').val(nombre);
$('#mtxtApPaterno').val(app);
$('#mtxtApMaterno').val(apm);
$('#mtxtEmail').val(email);

};


$('#mbtnUpdPersona').click(function(){

var idP  = $('#mhdnIdPersona').val();
var nom  = $('#mtxtNombre').val();
var app  = $('#mtxtApPaterno').val();
var apm  = $('#mtxtApMaterno').val();
var mail = $('#mtxtEmail').val();

$.post(baseurl+"cpersonas/actualizarUsuarioModal",
{
idP1:idP,
nom1:nom,
app1:app,
apm1:apm,
mail1:mail
},

function(data){
	if(data==1){
		$('#mbtnCerrarModal').click();
		location.reload();
		}
	});
});








