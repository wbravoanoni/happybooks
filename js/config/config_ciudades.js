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

return '<a href="#" class="btn btn-block btn-primary btn-sm" style="width:80%;" data-toggle="modal" data-target="#modalActualizarLibro" onclick="selLibros(\''+row.idLibros+'\',\''+row.llave+'\',\''+row.nombre+'\',\''+row.autor+'\',\''+row.resumen+'\',\''+row.descripcion+'\',\''+row.puntaje+'\',\''+row.imagen+'\',\''+row.fechaCreacion+'\',\''+row.usuario+'\',\''+row.genero+'\',\''+row.paginas+'\',\''+row.activo+'\')"> <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></a>';

	
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
$.post(baseurl+"Cusuarios/getUsuariosPaisesController",
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
