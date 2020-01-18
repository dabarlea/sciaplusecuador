<?php 
if ( ! function_exists('cpt_articulos') ) {

// Register Custom Post Type
function cpt_articulos() {

	$labels = array(
		'name'                  => _x( 'Artículos', 'Post Type General Name', 'articulos' ),
		'singular_name'         => _x( 'Artículo', 'Post Type Singular Name', 'articulos' ),
		'menu_name'             => __( 'Artículos', 'articulos' ),
		'name_admin_bar'        => __( 'Artículo', 'articulos' ),
		'archives'              => __( 'Archivos de Artículo', 'articulos' ),
		'attributes'            => __( 'Atributos del  Artículo', 'articulos' ),
		'parent_item_colon'     => __( 'Artículo Padre:', 'articulos' ),
		'all_items'             => __( 'Todos los Artículos', 'articulos' ),
		'add_new_item'          => __( 'Agregar Nuevo Artículo', 'articulos' ),
		'add_new'               => __( 'Agregar Nuevo', 'articulos' ),
		'new_item'              => __( 'Nuevo Artículo', 'articulos' ),
		'edit_item'             => __( 'Editar Artículo', 'articulos' ),
		'update_item'           => __( 'Actualizar Artículo', 'articulos' ),
		'view_item'             => __( 'Consultar Artículo', 'articulos' ),
		'view_items'            => __( 'Consultar Artículos', 'articulos' ),
		'search_items'          => __( 'Buscar Artículo', 'articulos' ),
		'not_found'             => __( 'No encontrado', 'articulos' ),
		'not_found_in_trash'    => __( 'No encontrado en la basura', 'articulos' ),
		'featured_image'        => __( 'Imágen Destacada', 'articulos' ),
		'set_featured_image'    => __( 'Establecer Imágen Destacada', 'articulos' ),
		'remove_featured_image' => __( 'Eliminar Imágen Destacada', 'articulos' ),
		'use_featured_image'    => __( 'Usar como Imagen Destacada', 'articulos' ),
		'insert_into_item'      => __( 'Insertar en Artículo', 'articulos' ),
		'uploaded_to_this_item' => __( 'Cargado a este Artículo', 'articulos' ),
		'items_list'            => __( 'Lista de Artículos', 'articulos' ),
		'items_list_navigation' => __( 'Navegación en lista de Artículos', 'articulos' ),
		'filter_items_list'     => __( 'Lista de posiciones de filtro', 'articulos' ),
	);
	$args = array(
		'label'                 => __( 'Artículo', 'articulos' ),
		'description'           => __( 'Artículos de la empresa', 'articulos' ),
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
		'rest_base'             => 'articulosrest',
	);
	register_post_type( 'articulo', $args );

}
add_action( 'init', 'cpt_articulos', 0 );

}
