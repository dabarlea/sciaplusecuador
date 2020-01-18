<?php
/*
Plugin Name: Tickets SCI A Plus Computer
Plugin URI: http://wordpress.org/
Description: Este plugin contiene la creación de Tickets para la implementación de los módulos del Sistema de Control Interno de A Plus Computer.
Author: David Escobar
Version: 1.1
*/

/* Tickets */

require_once "backend/cpt_ticket.php" ;
require_once "backend/mtx_ticket.php" ;

/* API REST */
//Ticket
add_action( 'rest_api_init', 'ticket_api_rest_post_meta' );

function ticket_api_rest_post_meta() {
	register_rest_field( 'ticket', 
		'post_meta_fields', 
		array(
			'get_callback' => 'callback_ticket_postmeta'
		)
	);
}
function callback_ticket_postmeta( $object ) {
	$post_id = $object['id'];
	return get_post_meta( $post_id );
}