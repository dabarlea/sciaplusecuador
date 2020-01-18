<?php 
if ( ! function_exists('cpt_facturas') ) {

// Register Custom Post Type
function cpt_facturas() {

	$labels = array(
		'name'                  => _x( 'Facturas', 'Post Type General Name', 'facturas' ), //cadena de traducción
		'singular_name'         => _x( 'Factura', 'Post Type Singular Name', 'facturas' ),
		'menu_name'             => __( 'Facturas', 'facturas' ),
		'name_admin_bar'        => __( 'Factura', 'facturas' ),
		'archives'              => __( 'Archivos de Factura', 'facturas' ),
		'attributes'            => __( 'Atributos de Factura', 'facturas' ),
		'parent_item_colon'     => __( 'Factura Padre:', 'facturas' ),
		'all_items'             => __( 'Todas las Facturas', 'facturas' ),
		'add_new_item'          => __( 'Agregar Nuevo Factura', 'facturas' ),
		'add_new'               => __( 'Agregar Nuevo', 'facturas' ),
		'new_item'              => __( 'Nuevo Factura', 'facturas' ),
		'edit_item'             => __( 'Editar Factura', 'facturas' ),
		'update_item'           => __( 'Actualizar Factura', 'facturas' ),
		'view_item'             => __( 'Consultar Factura', 'facturas' ),
		'view_items'            => __( 'Consultar Facturas', 'facturas' ),
		'search_items'          => __( 'Buscar Factura', 'facturas' ),
		'not_found'             => __( 'No encontrado', 'facturas' ),
		'not_found_in_trash'    => __( 'No encontrado en la basura', 'facturas' ),
		'featured_image'        => __( 'Imágen Destacada', 'facturas' ),
		'set_featured_image'    => __( 'Establecer Imágen Destacada', 'facturas' ),
		'remove_featured_image' => __( 'Eliminar Imágen Destacada', 'facturas' ),
		'use_featured_image'    => __( 'Usar como Imágen Destacada', 'facturas' ),
		'insert_into_item'      => __( 'Insertar en Factura', 'facturas' ),
		'uploaded_to_this_item' => __( 'Cargado a esta Factura', 'facturas' ),
		'items_list'            => __( 'Lista de Facturas', 'facturas' ),
		'items_list_navigation' => __( 'Navegación en lista de Facturas', 'facturas' ),
		'filter_items_list'     => __( 'Lista de posiciones de filtro', 'facturas' ),
	);
	$args = array(
		'label'                 => __( 'Factura', 'facturas' ),
		'description'           => __( 'Facturas de la empresa', 'facturas' ),
		'labels'                => $labels,
		'supports'              => array('title','thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 26,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rest_base'             => 'facturasrest',
	);
	register_post_type( 'factura', $args );

}
add_action( 'init', 'cpt_facturas', 0 );

}
