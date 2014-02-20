// funcao para retornar as cidades conforme o combo dos estados

$(function(){

	
	$("select[name=curso]").change(function(){

		curso = $(this).val();
		
		if ( curso === '')
			return false;
		
		resetaCombo('base');
			
		$.getJSON( path + '/coord/cadastro/getBases/' + curso, function (data){
	
			//	console.log(data);
			var option = new Array();
		
			$.each(data, function(i, obj){

		    	option[i] = document.createElement('option');
		    	$( option[i] ).attr( {value : obj.id} );
		 		$( option[i] ).append( obj.nome );

		    	$("select[name='base']").append( option[i] );
		
			});
	
		});
	
	});

});

function resetaCombo( el ) {
   $("select[name='"+el+"']").empty();
   var option = document.createElement('option');                                  
   $( option ).attr( {value : ''} );
   $( option ).append( 'Selecione' );
   $("select[name='"+el+"']").append( option );
}