<?php 
if ( ! function_exists('cpt_suscripciones') ) {

// Register Custom Post Type
function cpt_suscripciones() {

	$labels = array(
		'name'                  => _x( 'Suscripciones', 'Post Type General Name', 'suscripciones' ),
		'singular_name'         => _x( 'Suscripción', 'Post Type Singular Name', 'suscripciones' ),
		'menu_name'             => __( 'Suscripciones', 'suscripciones' ),
		'name_admin_bar'        => __( 'Suscripción', 'suscripciones' ),
		'archives'              => __( 'Archivos de Suscripción', 'suscripciones' ),
		'attributes'            => __( 'Atributos de la Suscripción', 'suscripciones' ),
		'parent_item_colon'     => __( 'Suscripción Padre:', 'suscripciones' ),
		'all_items'             => __( 'Todas las Suscripciones', 'suscripciones' ),
		'add_new_item'          => __( 'Agregar Nueva Suscripción', 'suscripciones' ),
		'add_new'               => __( 'Agregar Nueva', 'suscripciones' ),
		'new_item'              => __( 'Nueva Suscripción', 'suscripciones' ),
		'edit_item'             => __( 'Editar Suscripción', 'suscripciones' ),
		'update_item'           => __( 'Actualizar Suscripción', 'suscripciones' ),
		'view_item'             => __( 'Consultar Suscripción', 'suscripciones' ),
		'view_items'            => __( 'Consultar Suscripciones', 'suscripciones' ),
		'search_items'          => __( 'Buscar Suscripción', 'suscripciones' ),
		'not_found'             => __( 'No encontrada', 'suscripciones' ),
		'not_found_in_trash'    => __( 'No encontrada en la basura', 'suscripciones' ),
		'featured_image'        => __( 'Imágen Destacada', 'suscripciones' ),
		'set_featured_image'    => __( 'Establecer Imágen Destacada', 'suscripciones' ),
		'remove_featured_image' => __( 'Eliminar Imágen Destacada', 'suscripciones' ),
		'use_featured_image'    => __( 'Usar como Imágen Destacada', 'suscripciones' ),
		'insert_into_item'      => __( 'Insertar en la Suscripción', 'suscripciones' ),
		'uploaded_to_this_item' => __( 'Cargado a esta Suscripción', 'suscripciones' ),
		'items_list'            => __( 'Lista de Suscripciones', 'suscripciones' ),
		'items_list_navigation' => __( 'Navegación en lista de Suscripciones', 'suscripciones' ),
		'filter_items_list'     => __( 'Lista de posiciones de filtro', 'suscripciones' ),
	);
	$args = array(
		'label'                 => __( 'Suscripción', 'suscripciones' ),
		'description'           => __( 'Suscripciones de la empresa', 'suscripciones' ),
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
		'rest_base'             => 'suscripcionesrest',
	);
	register_post_type( 'suscripcion', $args );

}
add_action( 'init', 'cpt_suscripciones', 0 );

}
