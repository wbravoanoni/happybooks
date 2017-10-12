$.post(baseurl+"Cciudad/getCiudadC",

	{
	sitReg: 1
	},

function(data)
{
var obj=JSON.parse(data);
output='';
var estilo='width:100px;height:100px;-moz-border-radius:50%;-webkit-border-radius:50%;border-radius:50%;background:#5cb85c;';

$.each(obj,function(i,item){
output+='<li>'+
'<div class="clsCiudad" style="'+estilo+'"></div>'+
'<input type="text" style="width:100px;" value="'+item.ciudad+'" class="clsNombreCiudad">'+
'<a class="users-list-name" href="#">'+item.ciudad+'</a>'+
'<span class="users-list-date">'+item.idCiudad+'</span>'+
'</li>';

});

$('#listCiudades').html(output);

$('#listCiudades .clsCiudad').click(function(){

var i=$('.clsCiudad').index(this);
var nc=$('.clsNombreCiudad:eq('+i+')').val();

alert(nc);
});

$('#btnGrabarMesa').click(function(){

var i=0;
$('#listCiudades .clsNombreCiudad').each(function(){
var nc=$('.clsNombreCiudad:eq('+i+')').val();

i++;

alert(nc);
});


});

});


//Busqueda con like

$('#txtBuscarCiudad').keyup(function(){

	$('#exampleTableLike tbody').html('');

	var text   = $('#txtBuscarCiudad').val();
	var length = $('#txtBuscarCiudad').val().length;

if(length>=3)

	{
		$.post(baseurl+"Cciudad/getCiudadConLike",
			{
				parametro: text
			},

		function(data){
		//alert(data);

		var p =JSON.parse(data);
		$.each(p,function(i,item){
		$('#exampleTableLike').append(
		'<tr>'+
		'<td>'+item.idCiudad+'</td>'+
		'<td>'+item.ciudad+'</td>'+
		'<td>'+item.habitantes+'</td>'+
		'<td>'+item.activo+'</td>'+
		'</tr>'
			);

		});

		});

	}

});




