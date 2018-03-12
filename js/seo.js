function cargarSeo(){

//$('#cboGenero').html('');

$.post(baseurl+"Seo_controller/getSeoController",
	{
		//activo: 1
	},
	function(data){
var c = JSON.parse(data);
$.each(c,function(i,item){



if(item.cbo==0){
$('#'+item.nombre+'').attr("value",item.descripcion);
}else if(item.cbo==1){
	if(item.nombre=="rating"){
		if(item.descripcion=="General"){
			$('#rating').append('<option selected value='+item.descripcion+'>'+item.descripcion+'</option>');
			$('#rating').append('<option value="Mature">Mature</option>');
			$('#rating').append('<option value="Restricted">Restricted</option>');
		}
		else if(item.descripcion=="Mature"){
			$('#rating').append('<option value="General">General</option>');
			$('#rating').append('<option selected value='+item.descripcion+'>'+item.descripcion+'</option>');
			$('#rating').append('<option value="Restricted">Restricted</option>');
		}
		else if(item.descripcion=="Restricted"){
			$('#rating').append('<option value="General">General</option>');	
			$('#rating').append('<option value="Mature">Mature</option>');
			$('#rating').append('<option selected value='+item.descripcion+'>'+item.descripcion+'</option>');
		}else{
			$('#rating').append('<option selected disabled value="">No disponible</option>');
		}	
	}else if(item.nombre=="distribution"){
		if(item.descripcion=="Local"){
			$('#distribution').append('<option selected value='+item.descripcion+'>'+item.descripcion+'</option>');
			$('#distribution').append('<option value="Global">Global</option>');
		}else if(item.descripcion=="Global"){
			$('#distribution').append('<option value="Local">Local</option>');
			$('#distribution').append('<option selected value='+item.descripcion+'>'+item.descripcion+'</option>');
		}else{
			$('#distribution').append('<option selected disabled value="">No disponible</option>');
		}

	}else if(item.nombre=="Robots"){
		if(item.descripcion=="INDEX, FOLLOW"){
			$('#Robots').append('<option selected value="'+item.descripcion+'">'+item.descripcion+'</option>');
			$('#Robots').append('<option value="INDEX, NOFOLLOW">INDEX, NOFOLLOW</option>');
			$('#Robots').append('<option value="NOINDEX, FOLLOW">NOINDEX, FOLLOW</option>');
			$('#Robots').append('<option value="NOINDEX, NOFOLLOW">NOINDEX, NOFOLLOW</option>');
		}else if(item.descripcion=="INDEX, NOFOLLOW"){
			$('#Robots').append('<option value="INDEX, FOLLOW">INDEX, FOLLOW</option>');
		    $('#Robots').append('<option selected value="'+item.descripcion+'">'+item.descripcion+'</option>');
			$('#Robots').append('<option value="NOINDEX, FOLLOW">NOINDEX, FOLLOW</option>');
			$('#Robots').append('<option value="NOINDEX, NOFOLLOW">NOINDEX, NOFOLLOW</option>');
		}else if(item.descripcion=="NOINDEX, FOLLOW"){
			$('#Robots').append('<option value="INDEX, FOLLOW">INDEX, FOLLOW</option>');
			$('#Robots').append('<option value="INDEX, NOFOLLOW">INDEX, NOFOLLOW</option>');
		    $('#Robots').append('<option selected value="'+item.descripcion+'">'+item.descripcion+'</option>');
			$('#Robots').append('<option value="NOINDEX, NOFOLLOW">NOINDEX, NOFOLLOW</option>');
		}else if(item.descripcion=="NOINDEX, NOFOLLOW"){
			$('#Robots').append('<option value="INDEX, FOLLOW">INDEX, FOLLOW</option>');
			$('#Robots').append('<option value="INDEX, NOFOLLOW">INDEX, NOFOLLOW</option>');
			$('#Robots').append('<option value="NOINDEX, FOLLOW">NOINDEX, FOLLOW</option>');
			$('#Robots').append('<option selected value="'+item.descripcion+'">'+item.descripcion+'</option>');
		}else{
			$('#Robots').append('<option selected disabled value="">No disponible</option>');
		}
	}else if(item.nombre=="Revisit after"){
		if(item.descripcion=="1 Day"){
			$('#Revisit_after').append('<option selected value="'+item.descripcion+'">'+item.descripcion+'</option>');
			$('#Revisit_after').append('<option value="7 Days">7 Days</option>');
			$('#Revisit_after').append('<option value="31 Days">31 Days</option>');
			$('#Revisit_after').append('<option value="180 Days">180 Days</option>');
			$('#Revisit_after').append('<option value="365 Days">365 Days</option>');
		}else if(item.descripcion=="7 Days"){
			$('#Revisit_after').append('<option value="1 Day">1 Day</option>');
		    $('#Revisit_after').append('<option selected value="'+item.descripcion+'">'+item.descripcion+'</option>');
			$('#Revisit_after').append('<option value="31 Days">31 Days</option>');
			$('#Revisit_after').append('<option value="180 Days">180 Days</option>');
			$('#Revisit_after').append('<option value="365 Days">365 Days</option>');
		}else if(item.descripcion=="31 Days"){
			$('#Revisit_after').append('<option value="1 Day">1 Day</option>');
			$('#Revisit_after').append('<option value="7 Days">7 Days</option>');
		    $('#Revisit_after').append('<option selected value="'+item.descripcion+'">'+item.descripcion+'</option>');
			$('#Revisit_after').append('<option value="180 Days">180 Days</option>');
			$('#Revisit_after').append('<option value="365 Days">365 Days</option>');
		}else if(item.descripcion=="180 Days"){
			$('#Revisit_after').append('<option value="1 Day">1 Day</option>');
			$('#Revisit_after').append('<option value="7 Days">7 Days</option>');
			$('#Revisit_after').append('<option value="31 Days">31 Days</option>');
			$('#Revisit_after').append('<option selected value="'+item.descripcion+'">'+item.descripcion+'</option>');
			$('#Revisit_after').append('<option value="365 Days">365 Days</option>');
		}else if(item.descripcion=="365 Days"){
			$('#Revisit_after').append('<option value="1 Day">1 Day</option>');
			$('#Revisit_after').append('<option value="7 Days">7 Days</option>');
			$('#Revisit_after').append('<option value="31 Days">31 Days</option>');
			$('#Revisit_after').append('<option value="180 Days">180 Days</option>');
			$('#Revisit_after').append('<option selected value="'+item.descripcion+'">'+item.descripcion+'</option>');
		}else{
			$('#Revisit_after').append('<option selected disabled value="">No disponible</option>');
		}
		
	}
}else if(item.cbo==2){
			$('#'+item.nombre+'').val(item.descripcion);
		}

});
});
}


cargarSeo();



$("#formularioSeo").submit(function(event)

{
event.preventDefault();

	$.ajax({
		beforeSend:function(){
		//$("#caja").show();
		},
			url:$("#formularioSeo").attr("action"),
			type:$("#formularioSeo").attr("method"),
			data:$("#formularioSeo").serialize(),
			success:function(respuesta)
		{
			if(respuesta!=2){
			alert("Actualizado Con exito");
			}else{
				$('#alertaCorreo2').css('display','block').fadeOut(8000);
			}

		},
			error:function(){
			alert("ERROR GENERAL DEL SISTEMA, INTENTE NUEVAMENTE");
	}

	});

});