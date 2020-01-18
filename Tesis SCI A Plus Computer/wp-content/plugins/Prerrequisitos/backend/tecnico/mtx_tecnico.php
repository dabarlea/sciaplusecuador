<?php
/**
 * Be sure to replace all instances of 'sciaplus_' with your project's prefix.
 */

add_action( 'cmb2_admin_init', 'tecnico_register_metabox' );


function tecnico_register_metabox() {
	$prefix = 'sciaplus_tecnico_';

	$cmd_datos_tecnico = new_cmb2_box( array(
		'id'            => $prefix . 'datospersonales',
		'title'         => esc_html__( 'Datos del Técnico', 'sciaplus' ),
		'object_types'  => array( 'tecnico' ), // Post type
	) );

	$cmd_datos_tecnico->add_field( array(
		'name'       => esc_html__( 'Cédula', 'sciaplus' ),
		'desc'       => esc_html__( 'Ej: 1715925614 ', 'sciaplus' ),
		'id'         => $prefix . 'cedularuc',
		'type'       => 'text_medium',
		'attributes' => array(
			'pattern' => '[0-9]*',
			'min'  => '0100000000',
			'max'  => '2499999999',
			'required'    => 'required',
		),
	) );

	$cmd_datos_tecnico->add_field( array(
		'name' => esc_html__( 'Nombre', 'sciaplus' ),
		'desc' => esc_html__( 'Ej: Marco', 'sciaplus' ),
		'id'   => $prefix . 'nombres',
		'type' => 'text_medium',
	) );

	$cmd_datos_tecnico->add_field( array(
		'name' => esc_html__( 'Dirección', 'sciaplus' ),
		'desc' => esc_html__( 'Ej: Av. Shyris N45-95 y Av. 6 de Diciembre', 'sciaplus' ),
		'id'   => $prefix . 'direccion',
		'type' => 'text_medium',
	) );

	$cmd_datos_tecnico->add_field( array(
		'name'       => esc_html__( 'Teléfono', 'sciaplus' ),
		'desc'       => esc_html__( 'Ej: 2462468', 'sciaplus' ),
		'id'         => $prefix . 'telefono',
		'type'       => 'text_medium',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
	) );
	$cmd_datos_tecnico->add_field( array(
		'name'       => esc_html__( 'Celular', 'sciaplus' ),
		'desc'       => esc_html__( 'Ej: 0999476855', 'sciaplus' ),
		'id'         => $prefix . 'celular',
		'type'       => 'text_medium',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
	) );

	$cmd_datos_tecnico->add_field( array(
		'name' => esc_html__( 'Fecha Nacimiento', 'sciaplus' ),
		'desc' => esc_html__( 'Ej: 25-10-2019', 'sciaplus' ),
		'id'   => $prefix . 'fecha_nacimiento',
		'type' => 'text_date',
		'date_format' => 'd-m-Y',
	) );

	$cmd_datos_tecnico->add_field( array(
		'name' => esc_html__( 'Correo Electrónico', 'sciaplus' ),
		'desc' => esc_html__( 'Ej: aplus@aplusecuador.com', 'sciaplus' ),
		'id'   => $prefix . 'email',
		'type' => 'text_email',
		// 'repeatable' => true,
	) );


	$cmd_datos_tecnico->add_field( array(
		'name'     => esc_html__( 'Cargo', 'sciaplus' ),
		'desc'     => esc_html__( 'Seleccinar', 'sciaplus' ),
		'id'       => $prefix . 'cargo',
		'type'     => 'taxonomy_select',
		'taxonomy' => 'cargo', // Taxonomy Slug
	) );

}