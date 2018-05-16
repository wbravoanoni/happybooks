function cargarGeneros(){

	$("#tablaGeneros").dataTable().fnDestroy();
	
$('#tablaGeneros').DataTable({

'paging':true,
'info':true,
'filter':true,
'staveSave':true,

'ajax':{
		"url":baseurl+"Cconfig/getGeneroConfigControler",
		"type":"POST",
		//"data":{
		//"p1":p1,
		//"p2":p2
		// }
		dataSrc:''
		},
	'columns':[
		{data:'idGenero','sClass':'dt-body-center'},
		{data:'nombre'},
		{data:'activo'},
		{"orderable":true,
	render:function(data, type, row){

return '<a href="#" class="btn btn-block btn-primary btn-sm" style="width:80%;" data-toggle="modal" data-target="#config-actualizar-genero" onclick="selGenero(\''+row.idGenero+'\',\''+row.nombre+'\',\''+row.activo+'\')"> <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></a>';

	
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
		"data": "nombre",
		"render":function(data, type, row){
		return "<span style='color:#006699;'><i class='fa fa-book'></i> &nbsp;"+row.nombre+"</span>";
	}
	}

],
//Fin extra
"order":[[1, "asc" ]], // Nº de Columna que ordena
});

}
cargarGeneros();


//Agregar Genero
$("#agregarGeneroConfig").submit(function(event)

{
event.preventDefault();

	$.ajax({
		beforeSend:function(){

			popCarga(1);
		},
			url:$("#agregarGeneroConfig").attr("action"),
			type:$("#agregarGeneroConfig").attr("method"),
			data:$("#agregarGeneroConfig").serialize(),
			success:function(respuesta)
		{
			if(respuesta!="El registro ya existe"){

			alert("Agregado con exito");
			$('#nombreConfigGenero').val("");
			$('#btnCerrarModaloGenero').click();
			
			cargarGeneros();

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


//Actualizar Genero
$("#actualizarGenerosConfig").submit(function(event){
	event.preventDefault();

		$.ajax({
			beforeSend:function(){

				popCarga(1);
			},
				url:$("#actualizarGenerosConfig").attr("action"),
				type:$("#actualizarGenerosConfig").attr("method"),
				data:$("#actualizarGenerosConfig").serialize(),
				success:function(respuesta)
			{
				if(respuesta=="correcto"){

				alert("Modificado con exito");
				$('#uNombreConfigGenero').val("");
				$('#btnCerrarModalGenero').click();
				
				cargarGeneros();
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


$("#btnEliminarGenero").on("click",function(){
	id     = $("#llaveGenero2").val();
	nombre = $("#uNombreConfigGenero").val();

	$("#UnombreGenero").html(nombre);
	$("#flagGenero").val(id);
});


//eliminar Genero

$("#eliminarGenero").submit(function(event)

{
event.preventDefault();

	$.ajax({
		beforeSend:function(){

			popCarga(1);
		},
			url:$("#eliminarGenero").attr("action"),
			type:$("#eliminarGenero").attr("method"),
			data:$("#eliminarGenero").serialize(),
			success:function(respuesta)
		{
			if(respuesta=="correcto"){

			alert("Eliminado con exito");
			$('#uNombreConfigGenero').val("");
			
			$('#btnEliminarGenero').click();
			$('#btnCerrarModalGenero').click();

			
			
			cargarGeneros();

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

selGenero=function(idGenero,nombre,activo)

	{
		$("#llaveGenero").html(idGenero);
		$("#llaveGenero2").val(idGenero);
		$('#uNombreConfigGenero').val(nombre);
		$("#uConfigEstado").val(activo);	
}
