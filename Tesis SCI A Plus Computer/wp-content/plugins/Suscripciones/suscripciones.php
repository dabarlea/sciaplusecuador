<?php
/*
Plugin Name: Suscripciones SCI A Plus Computer
Plugin URI: http://wordpress.org/
Description: Este plugin contiene la creación de Suscripciones para la implementación de los módulos del Sistema de Control Interno de A Plus Computer.
Author: David Escobar
Version: 1.1
*/


/* Suscripciones */
require_once "backend/cpt_suscripcion.php" ;
require_once "backend/mtx_suscripcion.php" ;


/* API REST */
//Suscripcion
add_action( 'rest_api_init', 'suscripcion_api_rest_post_meta' );

function suscripcion_api_rest_post_meta() {
	register_rest_field( 'suscripcion', 
		'post_meta_fields', 
		array(
			'get_callback' => 'callback_suscripcion_postmeta'
		)
	);
}
function callback_suscripcion_postmeta( $object ) {
	$post_id = $object['id'];
	return get_post_meta( $post_id );
}