<?php
/**
 * Be sure to replace all instances of 'sciaplus_' with your project's prefix.
 */

add_action( 'cmb2_admin_init', 'articulo_register_metabox' );

function articulo_register_metabox() {
	$prefix = 'sciaplus_articulo_';

	$cmd_datos_articulo = new_cmb2_box( array(
		'id'            => $prefix . 'datosarticulo',
		'title'         => esc_html__( 'Datos del Artículo', 'sciaplus' ),
		'object_types'  => array( 'articulo' ), // Post type
	) );


	$cmd_datos_articulo->add_field( array(
		'name'       => esc_html__( 'Serial', 'sciaplus' ),
		'desc'       => esc_html__( 'Ej: 123456 ', 'sciaplus' ),
		'id'         => $prefix . 'serial',
		'type'       => 'text_medium',
		'attributes' => array(
			'pattern' => '[0-9]*',
			'min'  => '0100000000',
			'max'  => '2499999999',
			'required'    => 'required',
		),
	) );

	$cmd_datos_articulo->add_field( array(
		'name'     => esc_html__( 'Categoria', 'sciaplus' ),
		'desc'     => esc_html__( 'Seleccinar', 'sciaplus' ),
		'id'       => $prefix . 'categoria',
		'type'     => 'taxonomy_select',
		'taxonomy' => 'categoria', // Taxonomy Slug
	) );

	$cmd_datos_articulo->add_field( array(
		'name'     => esc_html__( 'Marca', 'sciaplus' ),
		'desc'     => esc_html__( 'Seleccinar', 'sciaplus' ),
		'id'       => $prefix . 'marca',
		'type'     => 'taxonomy_select',
		'taxonomy' => 'marca', // Taxonomy Slug
	) );

	$cmd_datos_articulo->add_field( array(
		'name'       => esc_html__( 'Modelo', 'sciaplus' ),
		'desc'       => esc_html__( 'Ej: A1 ', 'sciaplus' ),
		'id'         => $prefix . 'modelo',
		'type'       => 'text_medium',
	) );

	$cmd_datos_articulo->add_field( array(
		'name' => esc_html__( 'Costo Compra', 'sciaplus' ),
		'desc' => esc_html__( 'Ej: $10', 'sciaplus' ),
		'id'   => $prefix . 'costo_compra',
		'type' => 'text_money',
		// 'before_field' => '£', // override '$' symbol if needed
		// 'repeatable' => true,
	) );

	$cmd_datos_articulo->add_field( array(
		'name' => esc_html__( 'Costo Venta', 'sciaplus' ),
		'desc' => esc_html__( 'Ej: $20', 'sciaplus' ),
		'id'   => $prefix . 'costo_venta',
		'type' => 'text_money',
		// 'before_field' => '£', // override '$' symbol if needed
		// 'repeatable' => true,
	) );

	$cmd_datos_articulo->add_field( array(
		'name'       => esc_html__( 'Descripción', 'sciaplus' ),
		'desc'       => esc_html__( 'Ej: 1 Par de parlantes ', 'sciaplus' ),
		'id'         => $prefix . 'descripcion',
		'type'       => 'text_medium',
	) );

}


