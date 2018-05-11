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

return '<a href="#" class="btn btn-block btn-primary btn-sm" style="width:80%;" data-toggle="modal" data-target="#modalActualizarLibro" onclick="selLibros(\''+row.idLibros+'\',\''+row.llave+'\',\''+row.nombre+'\',\''+row.autor+'\',\''+row.resumen+'\',\''+row.descripcion+'\',\''+row.puntaje+'\',\''+row.imagen+'\',\''+row.fechaCreacion+'\',\''+row.usuario+'\',\''+row.genero+'\',\''+row.paginas+'\',\''+row.activo+'\')"> <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></a>';

	
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
cargarAutores();


