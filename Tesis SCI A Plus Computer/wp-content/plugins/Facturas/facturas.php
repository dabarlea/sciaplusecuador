<?php
/*
Plugin Name: Facturación SCI A Plus Computer
Plugin URI: http://wordpress.org/
Description: Este plugin contiene la creación de Facturas para la implementación de los módulos del Sistema de Control Interno de A Plus Computer.
Author: David Escobar
Version: 1.1
*/

/* Facturas */
require_once "backend/cpt_factura.php" ;
require_once "backend/mtx_factura.php" ;



//sciaplus_factura_id_cliente


add_action( 'admin_enqueue_scripts', 'my_enqueue' );
function my_enqueue($hook) {  
	wp_enqueue_script( 'sciaplus-script', plugins_url( 'Facturas/js/sciaplus-script.js', _FILE_ ), array('jquery') );

	// in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
	wp_localize_script( 'sciaplus-script', 'sciaplus_object',array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ));
}




// Same handler function...
add_action( 'wp_ajax_nopriv_buscar_tickets', 'buscar_tickets' );
add_action( 'wp_ajax_buscar_tickets', 'buscar_tickets' );
function buscar_tickets() {
	global $wpdb;

	//mostrar($_GET['client_id']);

	//$dispositivos = get_post_meta($_GET['client_id']);


	$arg = array(
		"post_type" => "dispositivo",
		"posts_per_page" => -1,
		'meta_key' => 'sciaplus_dispositivo_id_cliente',
		'meta_value' => $_GET['client_id']

	);
	$dispositivos = new WP_Query($arg);
	$listadispositivos = array();
	if($dispositivos->have_posts())
	{
		while($dispositivos->have_posts())
		{
			$dispositivos->the_post();
			$listadispositivos[]= get_the_ID(); 
		}
	}
	//mostrar($listadispositivos);

	$listatickets = array();
	foreach ($listadispositivos as $dispositivo) {
		$arg = array(
			"post_type" => "ticket",
			"posts_per_page" => -1,
			'meta_query' => array( 
				'relation' => 'AND', 
				array( 
					'key' => 'sciaplus_ticket_id_dispositivo', 
					'value' => $dispositivo, 
					'compare' => '=', 
				), 
				array( 
					'key' => 'sciaplus_ticket_estado', 
					'value' => 'finalizado',
					'compare' => '=', 
				), 
			)
		);
		$tickets = new WP_Query($arg);
		if($tickets->have_posts())
		{
			while($tickets->have_posts())
			{
				$tickets->the_post();
				$id = get_the_ID(); 
				$listatickets[] = array(
					'id' => $id,
					'value' => get_post_meta($id, 'sciaplus_ticket_descripcion', true)
				); 
			}
		}
		# code...
	}
	echo json_encode($listatickets);





	//die();

	// $arg = array(
	// 	"post_type" => "ticket",
	// 	'meta_query' => array( 
	// 		'relation' => 'AND', 
	// 		array( 
	// 			'key' => '', 
	// 			'value' => $_GET['client_id'], 
	// 			'compare' => '=', 
	// 		), 
	// 		array( 
	// 			'key' => 'sciaplus_ticket_estado', 
	// 			'value' => 'finalizado',
	// 			'compare' => '=', 
	// 		), 
	// 	),
	// );
	// $tickets = new WP_Query($arg);
	// mostrar($dispositivo);


	wp_die();
}


add_action( 'wp_ajax_nopriv_buscar_datos_de_ticket', 'buscar_datos_de_ticket' );
add_action( 'wp_ajax_buscar_datos_de_ticket', 'buscar_datos_de_ticket' );

function buscar_datos_de_ticket(){
	//mostrar($_GET);
	$ticket	= NULL;
	$elementos_ticket = NULL;
	$ticket = get_post($_GET['ticket_id']);
	$elemento_ticket = NULL;
	$ticket_items = get_post_meta($_GET['ticket_id'], 'sciaplus_ticket_metaboxjff_sections', true);
	foreach($ticket_items as $item){
		$articulo = get_post($item['sciaplus_ticket_id_articulo']);
		$articulo_nombre = $articulo->post_title;
		$articulo_precio = get_post_meta($articulo->ID, 'sciaplus_articulo_costo_venta', true);
		$elementos_ticket[] = array(
			'id' => $articulo->ID,
			'cantidad' => $item['sciaplus_ticket_id_cantidad_articulo'],
			'nombre' => $articulo_nombre,
			'precio' => $articulo_precio
		);
	}
	$elemento_ticket = array(
		'id' => $_GET['ticket_id'],
		'nombre' => $ticket->post_title,
		'elementos' => $elementos_ticket
	);
	echo json_encode($elemento_ticket);
	wp_die();

	//update_post_meta($post_id, 'nombredelmeta', $valor);
}