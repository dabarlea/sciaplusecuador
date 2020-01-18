<?php 
if ( ! function_exists('cpt_tecnicos') ) {

// Register Custom Post Type
function cpt_tecnicos() {

	$labels = array(
		'name'                  => _x( 'Técnicos', 'Post Type General Name', 'tecnicos' ),
		'singular_name'         => _x( 'Técnico', 'Post Type Singular Name', 'tecnicos' ),
		'menu_name'             => __( 'Técnicos', 'tecnicos' ),
		'name_admin_bar'        => __( 'Técnico', 'tecnicos' ),
		'archives'              => __( 'Archivos de Técnico', 'tecnicos' ),
		'attributes'            => __( 'Atributos del Técnico', 'tecnicos' ),
		'parent_item_colon'     => __( 'Técnico Padre:', 'tecnicos' ),
		'all_items'             => __( 'Todos los Técnicos', 'tecnicos' ),
		'add_new_item'          => __( 'Agregar Nuevo Técnico', 'tecnicos' ),
		'add_new'               => __( 'Agregar Nuevo', 'tecnicos' ),
		'new_item'              => __( 'Nuevo Técnico', 'tecnicos' ),
		'edit_item'             => __( 'Editar Técnico', 'tecnicos' ),
		'update_item'           => __( 'Actualizar Técnico', 'tecnicos' ),
		'view_item'             => __( 'Consultar Técnico', 'tecnicos' ),
		'view_items'            => __( 'Consultar Técnicos', 'tecnicos' ),
		'search_items'          => __( 'BuscarTécnico', 'tecnicos' ),
		'not_found'             => __( 'No encontrado', 'tecnicos' ),
		'not_found_in_trash'    => __( 'No encontrado en la basura', 'tecnicos' ),
		'featured_image'        => __( 'Imágen Destacada', 'tecnicos' ),
		'set_featured_image'    => __( 'Establecer Imágen Destacada', 'tecnicos' ),
		'remove_featured_image' => __( 'Eliminar Imágen Destacada', 'tecnicos' ),
		'use_featured_image'    => __( 'Usar como Imágen Destacada', 'tecnicos' ),
		'insert_into_item'      => __( 'Insertar en Técnico', 'tecnicos' ),
		'uploaded_to_this_item' => __( 'Cargado en Técnico', 'tecnicos' ),
		'items_list'            => __( 'Lista de Técnicos', 'tecnicos' ),
		'items_list_navigation' => __( 'Navegación en lista de Técnicos', 'tecnicos' ),
		'filter_items_list'     => __( 'Lista de posiciones de filtro', 'tecnicos' ),
	);
	$args = array(
		'label'                 => __( 'Técnico', 'tecnicos' ),
		'description'           => __( 'Técnicos de la empresa', 'tecnicos' ),
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
		'rest_base'             => 'tecnicosrest',
	);
	register_post_type( 'tecnico', $args );

}
add_action( 'init', 'cpt_tecnicos', 0 );

}
