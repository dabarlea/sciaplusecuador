<?php 
if ( ! function_exists('cpt_tickets') ) {

// Register Custom Post Type
function cpt_tickets() {

	$labels = array(
		'name'                  => _x( 'Tickets', 'Post Type General Name', 'tickets' ),
		'singular_name'         => _x( 'Ticket', 'Post Type Singular Name', 'tickets' ),
		'menu_name'             => __( 'Tickets', 'tickets' ),
		'name_admin_bar'        => __( 'Ticket', 'tickets' ),
		'archives'              => __( 'Archivos de Ticket', 'tickets' ),
		'attributes'            => __( 'Atributos del Ticket', 'tickets' ),
		'parent_item_colon'     => __( 'Ticket Padre:', 'tickets' ),
		'all_items'             => __( 'Todos los Tickets', 'tickets' ),
		'add_new_item'          => __( 'Agregar Nuevo Ticket', 'tickets' ),
		'add_new'               => __( 'Agregar Nuevo', 'tickets' ),
		'new_item'              => __( 'Nuevo Ticket', 'tickets' ),
		'edit_item'             => __( 'Editar Ticket', 'tickets' ),
		'update_item'           => __( 'Actualizar Ticket', 'tickets' ),
		'view_item'             => __( 'Consultar Ticket', 'tickets' ),
		'view_items'            => __( 'Consultar Tickets', 'tickets' ),
		'search_items'          => __( 'Buscar Ticket', 'tickets' ),
		'not_found'             => __( 'No encontrado', 'tickets' ),
		'not_found_in_trash'    => __( 'No encontrado en la basura', 'tickets' ),
		'featured_image'        => __( 'Imágen Destacada', 'tickets' ),
		'set_featured_image'    => __( 'Establecer Imágen Destacada', 'tickets' ),
		'remove_featured_image' => __( 'Eliminar Imágen Destacada', 'tickets' ),
		'use_featured_image'    => __( 'Usar como Imágen Destacada', 'tickets' ),
		'insert_into_item'      => __( 'Insertar en Ticket', 'tickets' ),
		'uploaded_to_this_item' => __( 'Cargado a este Ticket', 'tickets' ),
		'items_list'            => __( 'Lista de Tickets', 'tickets' ),
		'items_list_navigation' => __( 'Navegación en lista de Tickets', 'tickets' ),
		'filter_items_list'     => __( 'Lista de posiciones de filtro', 'tickets' ),
	);
	$args = array(
		'label'                 => __( 'Ticket', 'tickets' ),
		'description'           => __( 'Tickets de la empresa', 'tickets' ),
		'labels'                => $labels,
		'supports'              => array( 'title','thumbnail' ),
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
		'rest_base'             => 'ticketsrest',
	);
	register_post_type( 'ticket', $args );

}
add_action( 'init', 'cpt_tickets', 0 );

}
