function cargarAutores(){

	$("#tablaAutores").dataTable().fnDestroy();
	
$('#tablaAutores').DataTable({

'paging':true,
'info':true,
'filter':true,
'staveSave':true,

'ajax':{
		"url":baseurl+"Cconfig/getAutoresConfigControler",
		"type":"POST",
		//"data":{
		//"p1":p1,
		//"p2":p2
		// }
		dataSrc:''
		},
	'columns':[
		{data:'idAutores','sClass':'dt-body-center'},
		{data:'nombre'},
		{data:'apellido'},
		{data:'activo'},
		{"orderable":true,
	render:function(data, type, row){

return '<a href="#" class="btn btn-block btn-primary btn-sm" style="width:80%;" data-toggle="modal" data-target="#config-actualizar-autor" onclick="selAutores(\''+row.idAutores+'\',\''+row.nombre+'\',\''+row.apellido+'\',\''+row.nacionalidad+'\',\''+row.activo+'\')"> <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></a>';

	
	}
}
],
//Inicio extra
"columnDefs":[
	{
		"targets": [3],
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
	},
	{
		"targets": [2],
		"data": "apellido",
		"render":function(data, type, row){
		return "<span style='color:#006699;'><i class='fa fa-book'></i> &nbsp;"+row.apellido+"</span>";
	}
	}

],
//Fin extra
"order":[[1, "asc" ]], // Nº de Columna que ordena
});

}

function cargarNacionalidad(){
$("#uComboNacionalidadConfig").html("");

$.post(baseurl+"Cconfig/getNacionalidadConfigControler",
	{
		sitReg: 1
	},
	function(data){
var c = JSON.parse(data);
$.each(c,function(i,item){
$('#uComboNacionalidadConfig').append('<option value='+item.idPais+'>'+item.gentilicio+'</option>');
});
});
}

function buscarNacionalidad($id){
$("#u2ComboNacionalidadConfig").html("");

$.post(baseurl+"Cconfig/getNacionalidadConfigControler",
	{
		sitReg: 1
	},
	function(data){
var c = JSON.parse(data);
$.each(c,function(i,item){

	if(item.idPais==$id){
$('#u2ComboNacionalidadConfig').append('<option selected value='+item.idPais+'>'+item.gentilicio+'</option>');
	}else{
		$('#u2ComboNacionalidadConfig').append('<option value='+item.idPais+'>'+item.gentilicio+'</option>');
	}

});
});
}

cargarAutores();
cargarNacionalidad();


selAutores=function(idAutores,nombre,apellido,nacionalidad,activo)

	{
		
		$('#idAutores').val(idAutores);
		$('#uConfigNombreAutor').val(nombre);
		$('#uConfigApellAutor').val(apellido);
		buscarNacionalidad(nacionalidad);
		$("#uConfigEstadoAutor").val(activo);
}



//agregar Autores
$("#agregarAutoresConfig").submit(function(event)
{
	event.preventDefault();

		$.ajax({
			beforeSend:function(){
				popCarga(1);
			},
				url:$("#agregarAutoresConfig").attr("action"),
				type:$("#agregarAutoresConfig").attr("method"),
				data:$("#agregarAutoresConfig").serialize(),
				success:function(respuesta)
			{

				if(respuesta=="correcto"){
				popCarga(0);
						
				alert("Agregado con exito");
				
				$('#btnCerrarModaloAgregarAutores').click();

				cargarAutores();
				cargarNacionalidad();

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


//Actualizar Autores
$("#actualizarAutoresConfig").submit(function(event)
{
	event.preventDefault();

		$.ajax({
			beforeSend:function(){
				popCarga(1);
			},
				url:$("#actualizarAutoresConfig").attr("action"),
				type:$("#actualizarAutoresConfig").attr("method"),
				data:$("#actualizarAutoresConfig").serialize(),
				success:function(respuesta)
			{

				if(respuesta=="correcto"){
				popCarga(0);
						
				alert("Actualizado con exito");
				
				$('#btnCerrarModaloAutores').click();

				cargarAutores();
				cargarNacionalidad();

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


//Eliminar Autores
$("#eliminarAutoresConfig").submit(function(event)
{
	event.preventDefault();

		$.ajax({
			beforeSend:function(){
				popCarga(1);
			},
				url:$("#eliminarAutoresConfig").attr("action"),
				type:$("#eliminarAutoresConfig").attr("method"),
				data:$("#eliminarAutoresConfig").serialize(),
				success:function(respuesta)
			{

				if(respuesta=="correcto"){
				popCarga(0);
						
				alert("Actualizado con exito");
				
				$('#btnCerrarModaloAutores').click();
				$('#btnEliminarAutoresModal').click();
				

				cargarAutores();
				cargarNacionalidad();

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

$("#btnEliminarAutor").on("click",function(){
		$("#flagAutores").val($("#idAutores").val());

});

