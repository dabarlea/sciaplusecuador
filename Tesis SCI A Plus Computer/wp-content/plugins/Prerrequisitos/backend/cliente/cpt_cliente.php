<?php 
if ( ! function_exists('cpt_clientes') ) {

// Register Custom Post Type
function cpt_clientes() {

	$labels = array(
		'name'                  => _x( 'Clientes', 'Post Type General Name', 'clientes' ),
		'singular_name'         => _x( 'Cliente', 'Post Type Singular Name', 'clientes' ),
		'menu_name'             => __( 'Clientes', 'clientes' ),
		'name_admin_bar'        => __( 'Cliente', 'clientes' ),
		'archives'              => __( 'Archivos de Cliente', 'clientes' ),
		'attributes'            => __( 'Atributos del Cliente', 'clientes' ),
		'parent_item_colon'     => __( 'Cliente Padre:', 'clientes' ),
		'all_items'             => __( 'Todos los Clientes', 'clientes' ),
		'add_new_item'          => __( 'Agregar Nuevo Cliente', 'clientes' ),
		'add_new'               => __( 'Agregar Nuevo', 'clientes' ),
		'new_item'              => __( 'Nuevo Cliente', 'clientes' ),
		'edit_item'             => __( 'Editar Cliente', 'clientes' ),
		'update_item'           => __( 'Actualizar Cliente', 'clientes' ),
		'view_item'             => __( 'Consultar Cliente', 'clientes' ),
		'view_items'            => __( 'Consultar Clientes', 'clientes' ),
		'search_items'          => __( 'Buscar Cliente', 'clientes' ),
		'not_found'             => __( 'No encontrado', 'clientes' ),
		'not_found_in_trash'    => __( 'No encontrado en la basura', 'clientes' ),
		'featured_image'        => __( 'Imágen Destacada', 'clientes' ),
		'set_featured_image'    => __( 'Establecer Imagen Destacada', 'clientes' ),
		'remove_featured_image' => __( 'Eliminar Imágen Destacada', 'clientes' ),
		'use_featured_image'    => __( 'Usar como Imágen Destacada', 'clientes' ),
		'insert_into_item'      => __( 'Insertar en Cliente', 'clientes' ),
		'uploaded_to_this_item' => __( 'Cargado a este Cliente', 'clientes' ),
		'items_list'            => __( 'Lista de Clientes', 'clientes' ),
		'items_list_navigation' => __( 'Navegación en lista de Clientes', 'clientes' ),
		'filter_items_list'     => __( 'Lista de posiciones de filtro', 'clientes' ),
	);
	$args = array(
		'label'                 => __( 'Cliente', 'clientes' ),
		'description'           => __( 'Clientes de la empresa', 'clientes' ),
		'labels'                => $labels,
		'supports'              => array( 'thumbnail' ),
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
		'rest_base'             => 'clientesrest',
	);
	register_post_type( 'cliente', $args );

}
add_action( 'init', 'cpt_clientes', 0 );

}
