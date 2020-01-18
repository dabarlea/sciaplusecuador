<?php
/**
 * Be sure to replace all instances of 'sciaplus_' with your project's prefix.
 */

add_action( 'cmb2_admin_init', 'factura_register_metabox' );

function factura_register_metabox() {
	$prefix = 'sciaplus_factura_';


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

	function yourprefix_render_row_cb( $field_args, $field ) {
		$classes     = $field->row_classes();
		$id          = $field->args( 'id' );
		$label       = $field->args( 'name' );
		$name        = $field->args( '_name' );
		$value       = $field->escaped_value();
		$description = $field->args( 'description' );
		?>
		<div class="custom-field-row <?php echo esc_attr( $classes ); ?>">
			<div class="search_bar">
				<label>Seleccione un Ticket</label>
				<select id="ticket_list_input"></select>
			</div>
			<div id="ticket_list" class="ticket_list"></div>
		</div>
		<?php
	}

	$cmd_datos_tickets = new_cmb2_box( array(
		'id'            => $prefix . 'listadotickets',
		'title'         => esc_html__( 'Tickets', 'sciaplus' ),
		'object_types'  => array( 'factura' ), // Post type
	) );

	$cmd_datos_tickets->add_field( array(
		'name' => esc_html__( 'Custom Rendered Field', 'cmb2' ),
		'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'   => 'yourprefix_demo_render_row_cb',
		'type' => 'text',
		'render_row_cb' => 'yourprefix_render_row_cb',

	) );










	$cmd_datos_factura = new_cmb2_box( array(
		'id'            => $prefix . 'datosfactura',
		'title'         => esc_html__( 'Datos de la Factura', 'sciaplus' ),
		'object_types'  => array( 'factura' ), // Post type
	) );


	$cmd_datos_factura->add_field( array(
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

	// $cmd_datos_factura->add_field( array(
	// 	'name' => esc_html__( 'Empresa', 'sciaplus' ),
	// 	'desc' => esc_html__( 'Ej: A Plus Computer', 'sciaplus' ),
	// 	'id'   => $prefix . 'empresa',
	// 	'type' => 'text_medium',
	// ) );

	$cmd_datos_factura->add_field( array(
		'name' => esc_html__( 'Subtotal', 'sciaplus' ),
		'desc' => esc_html__( 'Ej: $100', 'sciaplus' ),
		'id'   => $prefix . 'subtotal',
		'type' => 'text_money',
	) );

	$cmd_datos_factura->add_field( array(
		'name' => esc_html__( 'Descuento', 'sciaplus' ),
		'desc' => esc_html__( 'Ej: $0', 'sciaplus' ),
		'id'   => $prefix . 'descuento',
		'type' => 'text_money',
	) );

	$cmd_datos_factura->add_field( array(
		'name' => esc_html__( 'IVA', 'sciaplus' ),
		'desc' => esc_html__( 'Ej: 12%', 'sciaplus' ),
		'id'   => $prefix . 'iva',
		'type' => 'text_money',
	) );

	$cmd_datos_factura->add_field( array(
		'name' => esc_html__( 'Total', 'sciaplus' ),
		'desc' => esc_html__( 'Ej: $120', 'sciaplus' ),
		'id'   => $prefix . 'total',
		'type' => 'text_money',
	) );



	$cmd_datos_cliente = new_cmb2_box( array(
		'id'            => $prefix . 'datoscliente',
		'title'         => esc_html__( 'Datos del Cliente', 'sciaplus' ),
		'object_types'  => array( 'factura' ), // Post type
		'context'    => 'side',
		'priority'   => 'high',
	) );

	$cmd_datos_cliente->add_field( array(
		'name'       => esc_html__( 'Cliente', 'sciaplus' ),
		'desc'       => esc_html__( 'Seleccione un cliente', 'sciaplus' ),
		'id'         => $prefix . 'id_cliente',
		'show_option_none' => true,
		'type'       => 'select',
		'options'	 => $listaclientes,
		'attributes' => array(
			'required'    => 'required',
		),
	) );


}


