//reiniciar valores de la tabla post

/*
$('#exampleDataTable tbody').html('');

$.post(baseurl+"cpersonas/getPersonas",
{},

function(data){
//alert(data);

var p =JSON.parse(data);
$.each(p,function(i,item){
$('#exampleDataTable').append(
'<tr>'+
'<td>'+item.idPersona+'</td>'+
'<td>'+item.nombre+'</td>'+
'<td>'+item.appaterno+'</td>'+
'<td>'+item.apmaterno+'</td>'+
'<td>'+item.ciudad+'</td>'+
'<td>'+item.email+'</td>'+
'<td>'+item.dni+'</td>'+
'<td>'+item.fecnac+'</td>'+
'</tr>'
	);


});

});
*/
//$("#exampleDataTable tbody").remove();
$('#exampleDataTable').DataTable({

'paging':true,
'info':true,
'filter':true,
'staveSave':true,

'ajax':{
		"url":baseurl+"cpersonas/getPersonas/",
		"type":"POST",
		//"data":{
		//"p1":p1,
		//"p2":p2
		// }

		//dataSrc:''
		"dataSrc":function(data)
			{
			var suma=0;

			for(var i =0; i<= data.length-1;i++)
				{
				suma+=parseFloat(data[i].idPersona);
				}
			$('#spSuma').html(suma);
			return data;
			} 
		},
	'columns':[
		{data:'idPersona','sClass':'dt-body-center'},
		{data:'nombre'},
		{data:'appaterno'},
		{data:'apmaterno'},
		{data:'ciudad'},
		{data:'email'},
		{data:'dni'},
		{data:'fecnac'},
		{data:'estado'},
		{"orderable":true,
	render:function(data, type, row){

if(row.estado==0){
return '<a href="#" class="btn btn-block btn-primary btn-sm" style="width:80%;" data-toggle="modal" data-target="#modalActualizardataTable" onclick="selPersona(\''+row.idPersona+'\',\''+row.nombre+'\',\''+row.appaterno+'\',\''+row.apmaterno+'\',\''+row.email+'\')"> <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></a>';
}else if(row.estado==1){
return '<a href="#" class="btn btn-block btn-danger btn-sm" style="width:80%;" data-toggle="modal" data-target="#modalActualizardataTable" onclick="selPersona(\''+row.idPersona+'\',\''+row.nombre+'\',\''+row.appaterno+'\',\''+row.apmaterno+'\',\''+row.email+'\')"> <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></a>';
}else if(row.estado==2){
return " <div class='input-group margin'> "+
" <div class='input-group-btn'> "+
" <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>Action"+
" <span class='fa fa-caret-down'></span></button>"+
" <ul class='dropdown-menu'>"+
" <li><a href='#'>Editar</a></li>"+
" <li><a href='#'>Imprimir</a></li>"+
" <li><a href='#'>Something else here</a></li>"+
" <li class='divider'></li>"+
' <a href="#" class="btn btn-block btn-danger btn-sm" style="width:80%;" data-toggle="modal" data-target="#modalActualizardataTable" onclick="selPersona(\''+row.idPersona+'\',\''+row.nombre+'\',\''+row.appaterno+'\',\''+row.apmaterno+'\',\''+row.email+'\')"> <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span></a>'
" </ul>"+
" </div>"+
" </div>"



}

	
	}
}
],
//Inicio extra
"columnDefs":[
	{
		"targets": [8],
		"data": "estado",
		"render":function(data, type, row){

		if(data==0){
		return "<span class='label label-warning'>Pendiente</span>";
		}else if(data==1){
		return "<span class='label label-success'>Aprobado</span>";
		}else if(data==2){
		return "<span class='label label-danger'>Rechazado</span>";
		}

	}
	},

	{
		"targets": [1],
		"data": "nombre",
		"render":function(data, type, row){
		return "<span style='color:#006699;'><i class='fa fa-user'></i> &nbsp;"+data+" "+row.appaterno+"</span><br>"+
		"<span><i class='fa fa-calendar'></i>&nbsp&nbsp;"+row.fecnac+"</span>"
	}
	}


],
//Fin extra
"order":[[1, "asc" ]], // Nº de Columna que ordena
});


selPersona=function(idPersona, nombre, app, apm, email){

$('#mhdnIdPersona').val(idPersona);
$('#mtxtNombre').val(nombre);
$('#mtxtApPaterno').val(app);
$('#mtxtApMaterno').val(apm);
$('#mtxtEmail').val(email);

};