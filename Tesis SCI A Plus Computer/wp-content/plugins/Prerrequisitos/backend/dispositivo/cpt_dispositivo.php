<?php 
if ( ! function_exists('cpt_dispositivos') ) {

// Register Custom Post Type
function cpt_dispositivos() {

	$labels = array(
		'name'                  => _x( 'Dispositivos', 'Post Type General Name', 'dispositivos' ),
		'singular_name'         => _x( 'Dispositivo', 'Post Type Singular Name', 'dispositivos' ),
		'menu_name'             => __( 'Dispositivos', 'dispositivos' ),
		'name_admin_bar'        => __( 'Dispositivo', 'dispositivos' ),
		'archives'              => __( 'Archivos de Dispositivo', 'dispositivos' ),
		'attributes'            => __( 'Atributos de Dispositivo', 'dispositivos' ),
		'parent_item_colon'     => __( 'Dispositivo Padre:', 'dispositivos' ),
		'all_items'             => __( 'Todos los  Dispositivos', 'dispositivos' ),
		'add_new_item'          => __( 'Agregar Nuevo Dispositivo', 'dispositivos' ),
		'add_new'               => __( 'Agregar Nuevo', 'dispositivos' ),
		'new_item'              => __( 'Nuevo Dispositivo', 'dispositivos' ),
		'edit_item'             => __( 'Editar Dispositivo', 'dispositivos' ),
		'update_item'           => __( 'Actualizar Dispositivo', 'dispositivos' ),
		'view_item'             => __( 'Consultar Dispositivo', 'dispositivos' ),
		'view_items'            => __( 'Consultar Dispositivos', 'dispositivos' ),
		'search_items'          => __( 'Buscar Dispositivo', 'dispositivos' ),
		'not_found'             => __( 'No encontrado', 'dispositivos' ),
		'not_found_in_trash'    => __( 'No encontrado en la basura', 'dispositivos' ),
		'featured_image'        => __( 'Imágen Destacada', 'dispositivos' ),
		'set_featured_image'    => __( 'Establecer Imágen Destacada', 'dispositivos' ),
		'remove_featured_image' => __( 'Eliminar Imágen Destacada', 'dispositivos' ),
		'use_featured_image'    => __( 'Usar como Imágen Destacada', 'dispositivos' ),
		'insert_into_item'      => __( 'Insertar en Dispositivo', 'dispositivos' ),
		'uploaded_to_this_item' => __( 'Cargado en este Dispositivo', 'dispositivos' ),
		'items_list'            => __( 'Lista de Dispositivos', 'dispositivos' ),
		'items_list_navigation' => __( 'Navegación en lista de Dispositivos', 'dispositivos' ),
		'filter_items_list'     => __( 'Lista de posiciones de filtro', 'dispositivos' ),
	);
	$args = array(
		'label'                 => __( 'Dispositivo', 'dispositivos' ),
		'description'           => __( 'Dispositivos de la empresa', 'dispositivos' ),
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
		'rest_base'             => 'dispositivosrest',
	);
	register_post_type( 'dispositivo', $args );

}
add_action( 'init', 'cpt_dispositivos', 0 );

}
