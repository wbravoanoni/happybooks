function cargarCiudades(idPais){

$("#tablaCiudades").dataTable().fnDestroy();
	
$('#tablaCiudades').DataTable({

'paging':true,
'info':true,
'filter':true,
'staveSave':true,

'ajax':{
		"url":baseurl+"Cconfig/getCiudadesConfigControler",
		"type":"POST",
		"data":{
		"idPais":idPais
		 },
		dataSrc:''
		},
	'columns':[
		{data:'idCiudad','sClass':'dt-body-center'},
		{data:'ciudad'},
		{data:'activo'},
		{"orderable":true,
	render:function(data, type, row){

return '<a href="#" class="btn btn-block btn-primary btn-sm" style="width:80%;" data-toggle="modal" data-target="#config-modificar-ciudad" onclick="selCiudades(\''+row.idCiudad+'\',\''+row.idPais+'\',\''+row.ciudad+'\',\''+row.activo+'\')"> <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></a>';

	
	}
}
],
//Inicio extra
"columnDefs":[
	{
		"targets": [2],
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
		"data": "ciudad",
		"render":function(data, type, row){
		return "<span style='color:#006699;'><i class='fa fa-book'></i> &nbsp;"+row.ciudad+"</span>";
	}
	}

],
//Fin extra
"order":[[1, "asc" ]], // Nº de Columna que ordena
});

}

function cargarPaises(){
$("#comboPaisesConfig").html("");

$.post(baseurl+"Cconfig/getPaisesConfigControler",
	{
		sitReg: 1
	},
	function(data){
var c = JSON.parse(data);
$.each(c,function(i,item){


$('#comboPaisesConfig').append('<option value='+item.idPais+'>'+item.nombrePais+'</option>');
});
idPais2=$('#comboPaisesConfig option:selected').val();
cargarCiudades(idPais2);
});

}


$('#comboPaisesConfig').on("change",function(){
var idInmo=$(this).val();
cargarCiudades(idInmo);
})


cargarPaises();


$("#botonModalCiudades").on("click",function(){
$comboPais=$("#comboPaisesConfig").val();
	$("#idPais").val($comboPais);
});




//Agregar Ciudad
$("#agregarCiudadesConfig").submit(function(event)

{
event.preventDefault();

	$.ajax({
		beforeSend:function(){

			popCarga(1);
		},
			url:$("#agregarCiudadesConfig").attr("action"),
			type:$("#agregarCiudadesConfig").attr("method"),
			data:$("#agregarCiudadesConfig").serialize(),
			success:function(respuesta)
		{
			if(respuesta!="El registro ya existe"){

			alert("Agregado con exito");
			$('#nombreConfigCiudad').val("");
			$('#btnCerrarModaloCiudad').click();

			cargarPaises();

			popCarga(0);

			}else{

			popCarga(0);
				alert("El registro ya existe");
				
			}

		},
			error:function(){
			popCarga(0);
			alert("ERROR GENERAL DEL SISTEMA, INTENTE NUEVAMENTE");
	}

	});

});


function cargarCiudadUpdate($idSeleccionado){
$('#uComboidPaisesConfig').html("");
$.post(baseurl+"Cconfig/getPaisesConfigControler",
	{
		sitReg: 1
	},
	function(data){
var c = JSON.parse(data);
$.each(c,function(i,item){

	if(item.idPais==$idSeleccionado){
		$('#uComboidPaisesConfig').append('<option selected value='+item.idPais+'>'+item.nombrePais+'</option>');
	}else{
		$('#uComboidPaisesConfig').append('<option value='+item.idPais+'>'+item.nombrePais+'</option>');
	}
	
});
});
}


//Actualizar Ciudades
$("#actualizarCiudadesConfig").submit(function(event)
{
	event.preventDefault();

		$.ajax({
			beforeSend:function(){
				popCarga(1);
			},
				url:$("#actualizarCiudadesConfig").attr("action"),
				type:$("#actualizarCiudadesConfig").attr("method"),
				data:$("#actualizarCiudadesConfig").serialize(),
				success:function(respuesta)
			{

				if(respuesta=="correcto"){
				popCarga(0);
						
				alert("Actualizado con exito");
				
				$('#btnUpdateCerrarModaloCiudad').click();

				cargarPaises();

				}else{
					popCarga(0);
					alert("El registro ya existe");
				}

			},
				error:function(){
				popCarga(0);
				alert("ERROR GENERAL DEL SISTEMA, INTENTE NUEVAMENTE");
		}

		});
});

selCiudades=function(idCiudad,idPais,ciudad,activo)

	{
		cargarCiudadUpdate(idPais);

		$('#idCiudadConfig').val(idCiudad);
		$('#uConfigNomCiudad').val(ciudad);
		$("#uConfigEstadoCiudad").val(activo);
		$("#llave").html(idCiudad);


		
}

//Eliminar Ciudades
$("#eliminarCiudadesConfig").submit(function(event)
{
	event.preventDefault();

		$.ajax({
			beforeSend:function(){
				popCarga(1);
			},
				url:$("#eliminarCiudadesConfig").attr("action"),
				type:$("#eliminarCiudadesConfig").attr("method"),
				data:$("#eliminarCiudadesConfig").serialize(),
				success:function(respuesta)
			{

				if(respuesta=="correcto"){
				popCarga(0);
						
				alert("Actualizado con exito");
				
				$('#btnUpdateCerrarModaloCiudad').click();
				$('#btnEliminarCiudadesModal').click();
				
				cargarPaises();

				}else{
					popCarga(0);
					alert("El registro ya existe");
				}

			},
				error:function(){
				popCarga(0);
				alert("ERROR GENERAL DEL SISTEMA, INTENTE NUEVAMENTE");
		}

		});
});

function popCarga(val){
    if (val==1){

	    $("body").css("margin",0);

        $("#popCarga").css("position","fixed");
        $("#popCarga").css("width", "100%");
        $("#popCarga").css("height", "100%");
        $("#popCarga").css("top", "0px");
        $("#popCarga").css("display", "table");
        $("#popCarga").css("background", "rgba(0,0,0,0.7)");
        $("#popCarga").css({ opacity: 0});
        $("#popCarga").html('<div><img src=\"'+baseurl+'/imagenes/panel/loader_50b.gif\"></div>');
        $("#popCarga").css("z-index", "100000");
        $("#popCarga").fadeTo(200, 1).css("visibility", "visible");

		$("#popCarga>div>img").css("position","fixed");
		$("#popCarga>div>img").css("position", "absolute");
		$("#popCarga>div>img").css("top", "40%");
		$("#popCarga>div>img").css("left", "50%");
		$("#popCarga>div>img").css("z-index", "10000");

    }else{
        $("#popCarga").fadeOut('fast');
    }
}

$("#btnEliminarCiudad").on("click",function(){
		$("#flagCiudades").val($("#idCiudadConfig").val());
});
