<?php
/**
 * Be sure to replace all instances of 'sciaplus_' with your project's prefix.
 */


add_action( 'cmb2_admin_init', 'dispositivo_register_metabox' );


function dispositivo_register_metabox() {
	$prefix = 'sciaplus_dispositivo_';


	$arg = array(
		"post_type" => "cliente",
		"posts_per_page" => -1,
	);
	$clientes = new WP_Query($arg);
	$listaclientes = array();
	if($clientes->have_posts())
	{
		while($clientes->have_posts())
		{
			$clientes->the_post();
			$id = get_the_ID(); 
			$listaclientes[$id] = get_the_title(); 
		}
	}


	$cmd_datos_dispositivo = new_cmb2_box( array(
		'id'            => $prefix . 'datosdispositivo',
		'title'         => esc_html__( 'Datos del Dispositivo', 'sciaplus' ),
		'object_types'  => array( 'dispositivo' ), // Post type
	) );

	$cmd_datos_dispositivo->add_field( array(
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

	$cmd_datos_dispositivo->add_field( array(
		'name'     => esc_html__( 'Tipo', 'sciaplus' ),
		'desc'     => esc_html__( 'Seleccinar', 'sciaplus' ),
		'id'       => $prefix . 'tipos',
		'type'     => 'taxonomy_select',
		'taxonomy' => 'tipo', // Taxonomy Slug
	) );

	$cmd_datos_dispositivo->add_field( array(
		'name'     => esc_html__( 'Marca', 'sciaplus' ),
		'desc'     => esc_html__( 'Seleccinar', 'sciaplus' ),
		'id'       => $prefix . 'marca',
		'type'     => 'taxonomy_select',
		'taxonomy' => 'marca', // Taxonomy Slug
	) );

	$cmd_datos_dispositivo->add_field( array(
		'name'       => esc_html__( 'Modelo', 'sciaplus' ),
		'desc'       => esc_html__( 'Ej: Z-Book 15 ', 'sciaplus' ),
		'id'         => $prefix . 'modelo',
		'type'       => 'text_medium',
	) );

	$cmd_datos_dispositivo->add_field( array(
		'name'     => esc_html__( 'Sistema Operativo', 'sciaplus' ),
		'desc'     => esc_html__( 'Seleccinar', 'sciaplus' ),
		'id'       => $prefix . 'sistemaoperativo',
		'type'     => 'taxonomy_select',
		'taxonomy' => 'sistemaoperativo', // Taxonomy Slug
	) );


	$cmd_datos_dispositivo->add_field( array(
		'name'       => esc_html__( 'Mainboard', 'sciaplus' ),
		'desc'       => esc_html__( 'Ej: Asus ', 'sciaplus' ),
		'id'         => $prefix . 'mainboard',
		'type'       => 'text_medium',
	) );
	$cmd_datos_dispositivo->add_field( array(
		'name'       => esc_html__( 'Procesador', 'sciaplus' ),
		'desc'       => esc_html__( 'Ej: Intel Core i5 ', 'sciaplus' ),
		'id'         => $prefix . 'procesador',
		'type'       => 'text_medium',
	) );
	$cmd_datos_dispositivo->add_field( array(
		'name'       => esc_html__( 'RAM', 'sciaplus' ),
		'desc'       => esc_html__( 'Ej: 16 Ram ', 'sciaplus' ),
		'id'         => $prefix . 'ram',
		'type'       => 'text_medium',
	) );
	$cmd_datos_dispositivo->add_field( array(
		'name'       => esc_html__( 'Almacenamiento', 'sciaplus' ),
		'desc'       => esc_html__( 'Ej: 512 GB ', 'sciaplus' ),
		'id'         => $prefix . 'almacenamiento',
		'type'       => 'text_medium',
	) );

	$cmd_datos_dispositivo->add_field( array(
		'name' => esc_html__( 'Fecha de Compra', 'sciaplus' ),
		'desc' => esc_html__( 'Ej: 25-10-2015', 'sciaplus' ),
		'id'   => $prefix . 'fecha_compra',
		'type' => 'text_date',
		'date_format' => 'd-m-Y',
	) );

	$cmd_datos_dispositivo->add_field( array(
		'name' => esc_html__( 'Ultima Modificación', 'sciaplus' ),
		'desc' => esc_html__( 'Ultima ves que intervino A Plus Computer Ej: 25-10-2019', 'sciaplus' ),
		'id'   => $prefix . 'ultima_modificacion',
		'type' => 'text_date',
		'date_format' => 'd-m-Y',
	) );

	$cmd_datos_dispositivo->add_field( array(
		'name'       => esc_html__( 'Persona Contacto', 'sciaplus' ),
		'desc'       => esc_html__( 'Ej: Cristina (Secretaria) ', 'sciaplus' ),
		'id'         => $prefix . 'persona_contacto',
		'type'       => 'text_medium',
	) );


	


	$cmd_datos_cliente = new_cmb2_box( array(
		'id'            => $prefix . 'datoscliente',
		'title'         => esc_html__( 'Datos del Cliente', 'sciaplus' ),
		'object_types'  => array( 'dispositivo' ), // Post type
		'context'    => 'side',
		'priority'   => 'high',
	) );

	$cmd_datos_cliente->add_field( array(
		'name'       => esc_html__( 'Cliente', 'sciaplus' ),
		'desc'       => esc_html__( 'Seleccione ', 'sciaplus' ),
		'id'         => $prefix . 'id_cliente',
		'show_option_none' => true,
		'type'       => 'select',
		'options'	 => $listaclientes,
		'attributes' => array(
			'required'    => 'required',
		),
	) );


}


