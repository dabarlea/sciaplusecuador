<?php
/**
 * Be sure to replace all instances of 'sciaplus_' with your project's prefix.
 */

add_action( 'cmb2_admin_init', 'suscripcion_register_metabox' );


function suscripcion_register_metabox() {
	$prefix = 'sciaplus_suscripcion_';

	$arg = array(
		"post_type" => "dispositivo",
		"posts_per_page" => -1,
	);
	$dispositivos = new WP_Query($arg);
	$listadispositivos = array();
	if($dispositivos->have_posts())
	{
		while($dispositivos->have_posts())
		{
			$dispositivos->the_post();
			$id = get_the_ID(); 
			$listadispositivos[$id] = get_the_title(); 
		}
	}
	$arg = array(
		"post_type" => "articulo",
		"posts_per_page" => -1,
	);
	$articulos = new WP_Query($arg);
	$listaarticulos = array();
	if($articulos->have_posts())
	{
		while($articulos->have_posts())
		{
			$articulos->the_post();
			$id = get_the_ID(); 
			$listaarticulos[$id] = get_the_title(); 
		}
	}



	$cmd_datos_suscripcion = new_cmb2_box( array(
		'id'            => $prefix . 'datossuscripcion',
		'title'         => esc_html__( 'Datos de la Suscripción', 'sciaplus' ),
		'object_types'  => array( 'suscripcion' ), // Post type
	) );

	$cmd_datos_suscripcion->add_field( array(
		'name'       => esc_html__( 'Código', 'sciaplus' ),
		'desc'       => esc_html__( 'Ej: 123456 ', 'sciaplus' ),
		'id'         => $prefix . 'codigo',
		'type'       => 'text_medium',
		'attributes' => array(
			'pattern' => '[0-9]*',
			'min'  => '0100000000',
			'max'  => '2499999999',
			'required'    => 'required',
		),
	) );

	// $cmd_datos_suscripcion->add_field( array(
	// 	'name' => esc_html__( 'ID Cliente', 'sciaplus' ),
	// 	'desc' => esc_html__( 'Ej: 4 Jeosmike', 'sciaplus' ),
	// 	'id'   => $prefix . 'cliente',
	// 	'type' => 'text_medium',
	// ) );

	// $cmd_datos_suscripcion->add_field( array(
	// 	'name' => esc_html__( 'ID Artículo', 'sciaplus' ),
	// 	'desc' => esc_html__( 'Ej: 5 ESET SMART SECURITY', 'sciaplus' ),
	// 	'id'   => $prefix . 'articulo',
	// 	'type' => 'text_medium',
	// ) );

	// $cmd_datos_suscripcion->add_field( array(
	// 	'name' => esc_html__( 'ID Dispositivo', 'sciaplus' ),
	// 	'desc' => esc_html__( 'Ej: 70 HP Z-Book', 'sciaplus' ),
	// 	'id'   => $prefix . 'dispositivo',
	// 	'type' => 'text_medium',
	// ) );

	$cmd_datos_suscripcion->add_field( array(
		'name' => esc_html__( 'Fecha de Activación', 'sciaplus' ),
		'desc' => esc_html__( 'Ej: 20-12-2019', 'sciaplus' ),
		'id'   => $prefix . 'fecha_activacion',
		'type' => 'text_date',
		'date_format' => 'd-m-Y',
	) );

	$cmd_datos_suscripcion->add_field( array(
		'name' => esc_html__( 'Fecha de Caducidad', 'sciaplus' ),
		'desc' => esc_html__( 'Ej: 20-12-2020', 'sciaplus' ),
		'id'   => $prefix . 'fecha_caducidad',
		'type' => 'text_date',
		'date_format' => 'd-m-Y',
	) );

	$cmd_datos_suscripcion->add_field( array(
		'name' => esc_html__( 'Fecha de Notificacion', 'sciaplus' ),
		'desc' => esc_html__( 'Ej: 15-12-2020', 'sciaplus' ),
		'id'   => $prefix . 'fecha_notificacion',
		'type' => 'text_date',
		'date_format' => 'd-m-Y',
	) );

	$cmd_datos_suscripcion->add_field( array(
		'name'       => esc_html__( 'Descripción', 'sciaplus' ),
		'desc'       => esc_html__( 'Ej: Suscripacion anual de Antivirus ', 'sciaplus' ),
		'id'         => $prefix . 'descripcion',
		'type'       => 'text_medium',
	) );



	$cmd_datos_dispositivo = new_cmb2_box( array(
		'id'            => $prefix . 'datosdispositivo',
		'title'         => esc_html__( 'Datos del Dispositivo', 'sciaplus' ),
		'object_types'  => array( 'suscripcion' ), // Post type
		'context'    => 'side',
		'priority'   => 'high',
	) );

	$cmd_datos_dispositivo->add_field( array(
		'name'       => esc_html__( 'Dispositivo', 'sciaplus' ),
		'desc'       => esc_html__( 'Seleccione', 'sciaplus' ),
		'id'         => $prefix . 'id_dispositivo',
		'show_option_none' => true,
		'type'       => 'select',
		'options'	 => $listadispositivos,
		'attributes' => array(
			'required'    => 'required',
		),
	) );

	$cmd_datos_articulo = new_cmb2_box( array(
		'id'            => $prefix . 'datosarticulo',
		'title'         => esc_html__( 'Datos del Artículo', 'sciaplus' ),
		'object_types'  => array( 'suscripcion' ), // Post type
		'context'    => 'side',
		'priority'   => 'high',
	) );

	$cmd_datos_articulo->add_field( array(
		'name'       => esc_html__( 'Artículo', 'sciaplus' ),
		'desc'       => esc_html__( 'Seleccione', 'sciaplus' ),
		'id'         => $prefix . 'id_articulo',
		'show_option_none' => true,
		'type'       => 'select',
		'options'	 => $listaarticulos,
		'attributes' => array(
			'required'    => 'required',
		),
	) );




}


