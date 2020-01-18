<?php
/*
Plugin Name: Prerrequisitos SCI A Plus Computer
Plugin URI: http://wordpress.org/
Description: Este plugin contiene las entidades necesarias para la implementación de los módulos del Sistema de Control Interno de A Plus Computer.
Author: David Escobar
Version: 1.1
*/

/* Clientes */
require_once "backend/cliente/cpt_cliente.php" ;
require_once "backend/cliente/mtx_cliente.php" ;

/* Técnicos */
require_once "backend/tecnico/cpt_tecnico.php" ;
require_once "backend/tecnico/mtx_tecnico.php" ;

require_once "backend/tecnico/tax_tecnico_cargo.php" ;


function remove_post_custofields_tecnico() {
	remove_meta_box( 'cargodiv' , 'tecnico' , 'side' ); 
}
add_action( 'admin_menu' , 'remove_post_custofields_tecnico' );


/* Artículos */
require_once "backend/articulo/cpt_articulo.php" ;
require_once "backend/articulo/mtx_articulo.php" ;

require_once "backend/articulo/tax_articulo_categoria.php" ;
require_once "backend/articulo/tax_articulo_marca.php" ;

function remove_post_custofields_articulo() {
	remove_meta_box( 'categoriadiv' , 'articulo' , 'side' );
	remove_meta_box( 'tagsdiv-marca' , 'articulo' , 'side' ); 
}
add_action( 'admin_menu' , 'remove_post_custofields_articulo' );

/* Dispositivos */
require_once "backend/dispositivo/cpt_dispositivo.php" ;
require_once "backend/dispositivo/mtx_dispositivo.php" ;

require_once "backend/dispositivo/tax_dispositivo_tipo.php" ;
require_once "backend/dispositivo/tax_dispositivo_marca.php" ;
require_once "backend/dispositivo/tax_dispositivo_sistemaoperativo.php" ;

function remove_post_custofields_dispositivo() {
	remove_meta_box( 'tipodiv' , 'dispositivo' , 'side' ); 
	remove_meta_box( 'marcadiv' , 'dispositivo' , 'side' ); 
	remove_meta_box( 'sistemaoperativodiv' , 'dispositivo' , 'side' );
}
add_action( 'admin_menu' , 'remove_post_custofields_dispositivo' );

/* CMB2 */

if ( file_exists( dirname( __FILE__ ) . '/backend/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/backend/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/backend/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/backend/CMB2/init.php';
}


/* Agregando los Post Meta a la REST API : https://decodecms.com/post-meta-desde-la-api-de-wordpress/ */
/* API REST */
//Cliente
add_action( 'rest_api_init', 'cliente_api_rest_post_meta' );

function cliente_api_rest_post_meta() {
	register_rest_field( 'cliente', 
		'post_meta_fields', 
		array(
			'get_callback' => 'callback_cliente_postmeta'
		)
	);
}
function callback_cliente_postmeta( $object ) {
	$post_id = $object['id'];
	return get_post_meta( $post_id );
}
//Técnico
add_action( 'rest_api_init', 'tecnico_api_rest_post_meta' );

function tecnico_api_rest_post_meta() {
	register_rest_field( 'tecnico', 
		'post_meta_fields', 
		array(
			'get_callback' => 'callback_tecnico_postmeta'
		)
	);
}
function callback_tecnico_postmeta( $object ) {
	$post_id = $object['id'];
	return get_post_meta( $post_id );
}
//Artículo
add_action( 'rest_api_init', 'articulo_api_rest_post_meta' );

function articulo_api_rest_post_meta() {
	register_rest_field( 'articulo', 
		'post_meta_fields', 
		array(
			'get_callback' => 'callback_articulo_postmeta'
		)
	);
}
function callback_articulo_postmeta( $object ) {
	$post_id = $object['id'];
	return get_post_meta( $post_id );
}
//Dispositivo
add_action( 'rest_api_init', 'dispositivo_api_rest_post_meta' );

function dispositivo_api_rest_post_meta() {
	register_rest_field( 'dispositivo', 
		'post_meta_fields', 
		array(
			'get_callback' => 'callback_dispositivo_postmeta'
		)
	);
}
function callback_dispositivo_postmeta( $object ) {
	$post_id = $object['id'];
	return get_post_meta( $post_id );
}
/* API REST */


/* Función personalizada para imprimir arreglos */

function mostrar($array, $die=false){
	echo '<pre>';
	var_dump($array);
	echo '</pre>';
	if($die)
	{
		die;
	}
}







/* Jose */
function modify_post_title( $data) {
	if(get_post_type($post_id) == 'cliente')
	{
		$post_id =  get_the_ID();
		$metas= get_post_meta($post_id);

		$post_title = $metas['sciaplus_cliente_cedularuc'][0] . ' - ' . $metas['sciaplus_cliente_nombres'][0];
		$post_slug = $metas['sciaplus_cliente_cedularuc'][0] . '_' . $metas['sciaplus_cliente_nombres'][0];
		$post_slug = str_replace( ' ','_', $post_slug);

		$my_post = array(
			'ID' =>  $post_id,
			'post_title'    => $post_title,
			'post_name' => $post_slug
		);
		remove_action( 'save_post', 'modify_post_title', 99);

		wp_update_post( $my_post );
		add_action( 'save_post', 'modify_post_title',99,1 );

	}
}
add_action( 'save_post', 'modify_post_title', 99, 1);


// Add a custom user role
$result = add_role( 'tecnico', 
					__('Tecnico'),
					array(
						'read' => true, // true allows this capability
						'edit_posts' => true, // Allows user to edit their own posts
						'edit_pages' => true, // Allows user to edit pages
						'edit_others_posts' => true, // Allows user to edit others posts not just their own
						'create_posts' => true, // Allows user to create new posts
						'manage_categories' => true, // Allows user to manage post categories
						'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
						'edit_themes' => false, // false denies this capability. User can’t edit your theme
						'install_plugins' => false, // User cant add new plugins
						'update_plugin' => false, // User can’t update any plugins
						'update_core' => false // user cant perform core updates
					)
				);

