function cargarPaises(){

$("#tablaPaises").dataTable().fnDestroy();
	
$('#tablaPaises').DataTable({

'paging':true,
'info':true,
'filter':true,
'staveSave':true,

'ajax':{
		"url":baseurl+"Cconfig/getPaisesConfigControler",
		"type":"POST",
		//"data":{
		//"p1":p1,
		//"p2":p2
		// }
		dataSrc:''
		},
	'columns':[
		{data:'nombrePais'},
		{data:'activo'},
		{"orderable":true,
	render:function(data, type, row){

return '<a href="#" class="btn btn-block btn-primary btn-sm" style="width:80%;" data-toggle="modal" data-target="#config-actualiza-pais" onclick="selPais(\''+row.idPais+'\',\''+row.nombrePais+'\',\''+row.gentilicio+'\',\''+row.activo+'\')"> <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></a>';

	
	}
}
],
//Inicio extra
"columnDefs":[
	{
		"targets": [1],
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
		"targets": [0],
		"data": "nombre",
		"render":function(data, type, row){
		return "<span style='color:#006699;'><i class='fa fa-book'></i> &nbsp;"+row.nombrePais+"</span>";
	}
	}

],
//Fin extra
"order":[[0, "asc" ]], // Nº de Columna que ordena
});

}
cargarPaises();


//Agregar Libros
$("#agregarPaisesConfig").submit(function(event)

{
event.preventDefault();

	$.ajax({
		beforeSend:function(){

			popCarga(1);
		},
			url:$("#agregarPaisesConfig").attr("action"),
			type:$("#agregarPaisesConfig").attr("method"),
			data:$("#agregarPaisesConfig").serialize(),
			success:function(respuesta)
		{
			if(respuesta!="El registro ya existe"){

			alert("Agregado con exito");
			$('#configPais').val("");
			$('#configGentilicio').val("");
			
			$('#btnCerrarModaloPais').click();

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

//Actualizar Libros
$("#actualizarPaisesConfig").submit(function(event)

{
event.preventDefault();

	$.ajax({
		beforeSend:function(){
			popCarga(1);
		},
			url:$("#actualizarPaisesConfig").attr("action"),
			type:$("#actualizarPaisesConfig").attr("method"),
			data:$("#actualizarPaisesConfig").serialize(),
			success:function(respuesta)
		{

			if(respuesta=="correcto"){
			popCarga(0);
					
			alert("Actualizado con exito");
			
			$('#btnUpdateCerrarModaloPais').click();

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


//Eliminar Paises
$("#eliminarPaisesConfig").submit(function(event)

{
event.preventDefault();

	$.ajax({
		beforeSend:function(){
		popCarga(1);
		},
			url:$("#eliminarPaisesConfig").attr("action"),
			type:$("#eliminarPaisesConfig").attr("method"),
			data:$("#eliminarPaisesConfig").serialize(),
			success:function(respuesta)
		{

			if(respuesta=="correcto"){
			popCarga(0);
			alert("Eliminado con exito");
			
			$('#btnEliminarPais').click();
			$('#btnUpdateCerrarModaloPais').click();
			
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


selPais=function(idPais,nombrePais,gentilicio,activo)

	{
		$('#uConfigPais').val(nombrePais);
		$('#uConfigGentilicio').val(gentilicio);
		$("#uConfigEstado").val(activo);
		$("#llave").html(idPais);
		$("#flag").val(idPais);
		
}

$("#btnEliminarPais").on("click",function(){
	id     = $("#flag").val();
	nombre = $("#uConfigPais").val();

	$("#UnombrePais").html(nombre);
	$("#flag2").val(id);
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

