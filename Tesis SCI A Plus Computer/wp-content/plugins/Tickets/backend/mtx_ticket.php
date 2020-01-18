<?php
/**
 * Be sure to replace all instances of 'sciaplus_' with your project's prefix.
 */

add_action( 'cmb2_admin_init', 'ticket_register_metabox' ); 

function ticket_register_metabox() {
	$prefix = 'sciaplus_ticket_';


	$arg = array(
		"post_type" => "tecnico",
		"posts_per_page" => -1,
	);
	$tecnicos = new WP_Query($arg);
	$listatecnicos = array();
	if($tecnicos->have_posts())
	{
		while($tecnicos->have_posts())
		{
			$tecnicos->the_post();
			$id = get_the_ID(); 
			$listatecnicos[$id] = get_the_title(); 
		}
	}
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
	$arg = array(
		"post_type" => "suscripcion",
		"posts_per_page" => -1,
	);
	$suscripciones = new WP_Query($arg);
	$listasuscripciones = array();
	if($suscripciones->have_posts())
	{
		while($suscripciones->have_posts())
		{
			$suscripciones->the_post();
			$id = get_the_ID(); 
			$listasuscripciones[$id] = get_the_title(); 
		}
	}
	
	

	$cmd_datos_ticket = new_cmb2_box( array(
		'id'            => $prefix . 'datosticket',
		'title'         => esc_html__( 'Datos del Ticket', 'sciaplus' ),
		'object_types'  => array( 'ticket' ), // Post type
	) );


	$cmd_datos_ticket->add_field( array(
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


	// $cmd_datos_ticket->add_field( array(
	// 	'name' => esc_html__( 'ID Tecnico', 'sciaplus' ),
	// 	'desc' => esc_html__( 'Ej: 4 Jeosmike', 'sciaplus' ),
	// 	'id'   => $prefix . 'tecnico',
	// 	'type' => 'text_medium',
	// ) );

	// $cmd_datos_ticket->add_field( array(
	// 	'name' => esc_html__( 'ID Dispositivo', 'sciaplus' ),
	// 	'desc' => esc_html__( 'Ej: 56 Laptop HP Z-Book', 'sciaplus' ),
	// 	'id'   => $prefix . 'dispositivo',
	// 	'type' => 'text_medium',
	// ) );

	// $cmd_datos_ticket->add_field( array(
	// 	'name' => esc_html__( 'ID Artículos Usados', 'sciaplus' ),
	// 	'desc' => esc_html__( 'Ej: 5 Disco duro, 85 Fuente de Poder', 'sciaplus' ),
	// 	'id'   => $prefix . 'articulos_usados',
	// 	'type' => 'text_medium',
	// ) );

	$cmd_datos_ticket->add_field( array(
		'name' => esc_html__( 'Descripción', 'sciaplus' ),
		'desc' => esc_html__( 'Ej: Se desea formatear, cargar programas, cambiar el disco duro y la funete de poder', 'sciaplus' ),
		'id'   => $prefix . 'descripcion',
		'type' => 'textarea',
	) );





	$cmb_repeat_test = new_cmb2_box( array(
		'id'            => $prefix . 'metaboxjff',
		'title'         => __( 'Artículos', 'your-text-domain' ),
        'object_types' => array( 'ticket' ), // post type
        //'show_on'      => array( 'key' => 'page-template', 'value' => 'page-test.php' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );

	$group_repeat_test = $cmb_repeat_test->add_field( array(
		'id'          => $prefix . 'metaboxjff_sections',
		'type'        => 'group',
		'options'     => array(
            'group_title'   => __( 'Artículo', 'your-text-domain' ) . ' {#}', // {#} gets replaced by row number
            'add_button'    => __( 'Agregar otro Artículo', 'your-text-domain' ),
            'remove_button' => __( 'Remover Artículo', 'your-text-domain' ),
            'sortable'      => true, // beta
        ),
	) );
	$cmb_repeat_test->add_group_field( $group_repeat_test, array(
		'name'       => esc_html__( 'Articulo', 'sciaplus' ),
		'desc'       => esc_html__( 'Seleccione', 'sciaplus' ),
		'id'         => $prefix . 'id_articulo',
		'show_option_none' => true,
		'type'       => 'select',
		'options'	 => $listaarticulos,
		// 'attributes' => array(
		// 	'required'    => 'required',
		// ),
	) );
	$cmb_repeat_test->add_group_field( $group_repeat_test, array(
		'name'    => __( 'Cantidad', 'your-text-domain' ),
		'id'      => $prefix . 'id_cantidad_articulo',
		'type'    => 'text',
	) );





	$cmd_estado_ticket = new_cmb2_box( array(
		'id'            => $prefix . 'estadodelticket',
		'title'         => esc_html__( 'Estado', 'sciaplus' ),
		'object_types'  => array( 'ticket' ), // Post type
		'context'    => 'side',
		'priority'   => 'high',
	) );

	$cmd_estado_ticket->add_field( array(
		'name'             => esc_html__( 'Estado', 'sciaplus' ),
		'desc'             => esc_html__( 'Seleccine', 'sciaplus' ),
		'id'               => $prefix . 'estado',
		'type'             => 'select',
		'show_option_none' => false,
		'options'          => array(
			'preceso' => esc_html__( 'En Proceso', 'sciaplus' ),
			'espera'   => esc_html__( 'En Espera', 'sciaplus' ),
			'finalizado'     => esc_html__( 'Finalizado', 'sciaplus' ),
			'cobrado'     => esc_html__( 'Cobrado', 'sciaplus' ),
		),
	) );



	$cmd_datos_tecnico = new_cmb2_box( array(
		'id'            => $prefix . 'datostecnico',
		'title'         => esc_html__( 'Datos del Técnico', 'sciaplus' ),
		'object_types'  => array( 'ticket' ), // Post type
		'context'    => 'side',
		'priority'   => 'high',
	) );

	$cmd_datos_tecnico->add_field( array(
		'name'       => esc_html__( 'Técnico', 'sciaplus' ),
		'desc'       => esc_html__( 'Seleccione', 'sciaplus' ),
		'id'         => $prefix . 'id_tecnico',
		'show_option_none' => true,
		'type'       => 'select',
		'options'	 => $listatecnicos,
		'attributes' => array(
			'required'    => 'required',
		),
	) );

	$cmd_datos_dispositivo = new_cmb2_box( array(
		'id'            => $prefix . 'datosdispositivo',
		'title'         => esc_html__( 'Datos del Dispositivo', 'sciaplus' ),
		'object_types'  => array( 'ticket' ), // Post type
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

	$cmd_datos_suscripcion = new_cmb2_box( array(
		'id'            => $prefix . 'datossuscripcion',
		'title'         => esc_html__( 'Datos de la Suscripiciones', 'sciaplus' ),
		'object_types'  => array( 'ticket' ), // Post type
		'context'    => 'side',
		'priority'   => 'high',
	) );

	$cmd_datos_suscripcion->add_field( array(
		'name'       => esc_html__( 'Suscripción', 'sciaplus' ),
		'desc'       => esc_html__( 'Seleccione', 'sciaplus' ),
		'id'         => $prefix . 'id_suscripcion',
		'show_option_none' => true,
		'type'       => 'select',
		'options'	 => $listasuscripciones,
		// 'attributes' => array(
		// 	'required'    => 'required',
		// ),
	) );

	




}


