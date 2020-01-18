console.log('OK');

jQuery(document).ready(function(){
	jQuery('#sciaplus_factura_id_cliente').on('change',function(){
		jQuery.ajax({
			url: sciaplus_object.ajax_url,
			data: {
				action: 'buscar_tickets',
				client_id: jQuery('#sciaplus_factura_id_cliente').val()
			},
			success: function(response){
				jQuery('#ticket_list_input').empty();
				jQuery('#ticket_list').html('');
				var option = '';
				option += option += '<option>Selecione</option>';
				jQuery.each( JSON.parse(response), function(index,value){
					option += '<option value="' + value.id + '">' + value.value + '</option>';
				});
				jQuery('#ticket_list_input').append(option);
			},
			error: function(response){
				console.log(response);
			}
		});
	});


	jQuery('#ticket_list_input').on('change',function(){
		console.log('cargando los datos del ticket');
		var itemdetail = '';
		jQuery('#ticket_list').html('');
		jQuery.ajax({
			url: sciaplus_object.ajax_url,
			data: {
				action: 'buscar_datos_de_ticket',
				ticket_id: jQuery(this).val()
			},
			success: function(response){
				console.log(response);
				var listaItems = JSON.parse(response);
				itemdetail ='<div id="ticket-'+ listaItems.id +'"><h3>'+ listaItems.nombre +'</h3><button id="agregarTicket" type="button">Agregar</button><ul>';		

				jQuery.each( listaItems.elementos, function(index,value){
					console.log(value);
					itemdetail += '<li class="single-item" data-id="'+value.id+'"><strong>' + value.nombre + '</strong> | <span><input name="precio" type="number" step="0,01" value="'+ value.precio +'"></span> | <span><input name="cantidad" type="number" value="'+ value.cantidad +'"></span></li>';
				});
				itemdetail += '</ul></div>';
				
				jQuery('#ticket_list').append(itemdetail);
			},
			error: function(response){
				console.log(response);
			}
		});
	});

})