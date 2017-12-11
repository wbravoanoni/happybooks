$(document).on("ready", main);

function main(){
	mostrarDatos("",1,6);

	
	$("input[name=busqueda]").keyup(function(){
		textobuscar = $(this).val();
		valoroption = $("#cantidad").val();
		mostrarDatos(textobuscar,1,valoroption);
	});

	$("body").on("click",".paginacion li a",function(e){
		e.preventDefault();
		valorhref = $(this).attr("href");
		valorBuscar = $("input[name=busqueda]").val();
		valoroption = $("#cantidad").val();
		mostrarDatos(valorBuscar,valorhref,valoroption);
	});

	$("#cantidad").change(function(){
		valoroption = $(this).val();
		valorBuscar = $("input[name=busqueda]").val();
		mostrarDatos(valorBuscar,1,valoroption);
	});
}
function mostrarDatos(valorBuscar,pagina,cantidad){
	$.ajax({
		url : baseurl+"Chome/mostrar",
		type: "POST",
		data: {buscar:valorBuscar,nropagina:pagina,cantidad:cantidad},
		dataType:"json",
		success:function(response){
			
			filas = "";
			$.each(response.clientes,function(key,item){
			//	filas+="<tr><td>"+item.idLibros+"</td><td>"+item.nombre+"</td><td>"+item.autor+"</td><td>"+item.resumen+"</td><td>"+item.puntaje+"</td><td>"+item.imagen+"</td><td>"+item.activo+"</td></tr>";

var array=valorizacion(item.puntaje);
console.log(cadena);
var cadena=array[0];
var titulo=array[1];

var resumen=resumenTextos(200,item.resumen);

filas+="<div class='col-sm-6 col-md-4'>";
filas+="<div class='thumbnail'>";
filas+="<img class='imgLibros' src='"+baseurl+item.imagen+"' alt='...''>";
filas+="<div class='caption'>";
filas+="<h3>"+item.nombre+"</h3>";  
filas+="<h4>"+item.autor+"</h4>";    
filas+="<fieldset class='val-fieldset'><span class='"+cadena+"' title='"+titulo+"'></span></fieldset><hr>";
filas+="<p class='resumenTextos'>"+resumen+"</p>";
filas+="<p><a href='#'' class='btn btn-primary' role='button'>Leer más</a></p>";
filas+="</div>";
filas+="</div>";
filas+="</div>";
});




			$("#tbclientes").html(filas);
			linkseleccionado = Number(pagina);
			//total registros
			totalregistros = response.totalregistros;
			//cantidad de registros por pagina
			cantidadregistros = response.cantidad;

			numerolinks = Math.ceil(totalregistros/cantidadregistros);
			paginador = "<ul class='pagination'>";
			if(linkseleccionado>1)
			{
				paginador+="<li><a href='1'>&laquo;</a></li>";
				paginador+="<li><a href='"+(linkseleccionado-1)+"' '>&lsaquo;</a></li>";

			}
			else
			{
				paginador+="<li class='disabled'><a href='#'>&laquo;</a></li>";
				paginador+="<li class='disabled'><a href='#'>&lsaquo;</a></li>";
			}
			//muestro de los enlaces 
			//cantidad de link hacia atras y adelante
 			cant = 2;
 			//inicio de donde se va a mostrar los links
			pagInicio = (linkseleccionado > cant) ? (linkseleccionado - cant) : 1;
			//condicion en la cual establecemos el fin de los links
			if (numerolinks > cant)
			{
				//conocer los links que hay entre el seleccionado y el final
				pagRestantes = numerolinks - linkseleccionado;
				//defino el fin de los links
				pagFin = (pagRestantes > cant) ? (linkseleccionado + cant) :numerolinks;
			}
			else 
			{
				pagFin = numerolinks;
			}

			for (var i = pagInicio; i <= pagFin; i++) {
				if (i == linkseleccionado)
					paginador +="<li class='active'><a href='javascript:void(0)'>"+i+"</a></li>";
				else
					paginador +="<li><a href='"+i+"'>"+i+"</a></li>";
			}
			//condicion para mostrar el boton sigueinte y ultimo
			if(linkseleccionado<numerolinks)
			{
				paginador+="<li><a href='"+(linkseleccionado+1)+"' >&rsaquo;</a></li>";
				paginador+="<li><a href='"+numerolinks+"'>&raquo;</a></li>";

			}
			else
			{
				paginador+="<li class='disabled'><a href='#'>&rsaquo;</a></li>";
				paginador+="<li class='disabled'><a href='#'>&raquo;</a></li>";
			}
			
			paginador +="</ul>";
			$(".paginacion").html(paginador);

		}
	});




function valorizacion(numero){

if(numero>0 && numero<5){
numero=0;

}else if(numero>=5 && numero<10){
numero=5;

}else if(numero>=10 && numero<15){
numero=10;

}else if(numero>=15 && numero<20){
numero=15;

}else if(numero>=20 && numero<25){
numero=20;

}else if(numero>=25 && numero<30){
numero=25;

}else if(numero>=30 && numero<35){
numero=30;

}else if(numero>=35 && numero<40){
numero=35;

}else if(numero>=40 && numero<45){
numero=40;

}else if(numero>=45 && numero<50){
numero=45;

}else if(numero>=50){
numero=50;
}

cadena="valoracion val-"+numero;

numero=numero/10;

array=[cadena,numero];

return (array);
}

function resumenTextos(caracteresMax,texto){

var texto = texto.substr(0, caracteresMax);
texto       += "...";
return texto;
}

}