$('#tblNotas').html(
'<tr>'+
'<th style="width: 10%">#</th>'+
'<th style="width: 40%">Alumno</th>'+
'<th style="width: 10%">1B</th>'+
'<th style="width: 10%">2B</th>'+
'<th style="width: 10%">3B</th>'+
'<th style="width: 10%">4B</th>'+
'<th style="width: 10%">Final</th>'+
'</tr>');

$.post(baseurl+"Cnotas/getNotas",
{},

function(data){

var p =JSON.parse(data);
var estilos='background:transparent;border:0px;outline:none;text-align:centerNwidth:100%;';
$.each(p,function(i,item){
$('#tblNotas').append(
'<tr class="filaNotas">'+
'<td class="alum" id="'+item.idPersona+'">'+item.idPersona+'</td>'+
'<td><input type="text" value="'+item.Alumno+'" style="'+estilos+'" maxlength="100"></td>'+
'<td><input type="text" value="'+item.N1B+'" style="'+estilos+'" maxlength="2" class="nota1"></td>'+
'<td><input type="text" value="'+item.N2B+'" style="'+estilos+'" maxlength="2" class="nota2"></td>'+
'<td><input type="text" value="'+item.N3B+'" style="'+estilos+'" maxlength="2" class="nota3"></td>'+
'<td><input type="text" value="'+item.N4B+'" style="'+estilos+'" maxlength="2" class="nota4"></td>'+
'<td><input type="text" value="'+item.notaFinal+'" style="'+estilos+'" maxlength="2" class="notaFinal"></td>'+
'</tr>'
	);
});

$('input[type=text]').focus(function(){
		$(this).select();
});

$('input[type=text]').focusout(function(){
	if($(this).val()>70){
		$(this).focus();
		$(this).select();
}
});

$( "#tblNotas .nota4" ).keyup(function() {
	var i=$('.nota4').index(this);

	var nota1=$('.nota1:eq('+i+')').val();
	var nota2=$('.nota2:eq('+i+')').val();
	var nota3=$('.nota3:eq('+i+')').val();

var promedio=(parseFloat(nota1)+parseFloat(nota2)+parseFloat(nota3)+parseFloat($(this).val()))/4;

	$('.notaFinal:eq('+i+')').val(promedio);
});


});


$('#btnGrabarNotas').click(function(){

var i=0;
$('#tblNotas .filaNotas').each(function(){

var idPersona=$('.alum:eq('+i+')').attr('id');
var nota1=$('.nota1:eq('+i+')').val();
var nota2=$('.nota2:eq('+i+')').val();
var nota3=$('.nota3:eq('+i+')').val();
var nota4=$('.nota4:eq('+i+')').val();
var notaF=$('.notaFinal:eq('+i+')').val();

$.post(baseurl+"Cnotas/saveNotas",

{
idPersona:idPersona,
n1:nota1,
n2:nota2,
n3:nota3,
n4:nota4,
nf:notaF
}

,function(data){

});

i++;

});
alert("Se guardo correctamente");

});






