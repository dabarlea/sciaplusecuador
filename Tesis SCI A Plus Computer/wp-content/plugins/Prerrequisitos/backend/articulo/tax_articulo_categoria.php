<?php
if ( ! function_exists( 'sciaplus_tax_categoria' ) ) {

// Register Custom Taxonomy
function sciaplus_tax_categoria() {

	$labels = array(
		'name'                       => _x( 'Categorías', 'Taxonomy General Name', 'sciaplus' ),
		'singular_name'              => _x( 'Categoría', 'Taxonomy Singular Name', 'sciaplus' ),
		'menu_name'                  => __( 'Categoría', 'sciaplus' ),
		'all_items'                  => __( 'Todos los Categorías', 'sciaplus' ),
		'parent_item'                => __( 'Categoría Padre', 'sciaplus' ),
		'parent_item_colon'          => __( 'Categoría Padre:', 'sciaplus' ),
		'new_item_name'              => __( 'Nuevo Categoría', 'sciaplus' ),
		'add_new_item'               => __( 'Agregar Categoría', 'sciaplus' ),
		'edit_item'                  => __( 'Editar Categoría', 'sciaplus' ),
		'update_item'                => __( 'Actualizar Categoría', 'sciaplus' ),
		'view_item'                  => __( 'Ver Categoría', 'sciaplus' ),
		'separate_items_with_commas' => __( 'Separar Categorías con comas', 'sciaplus' ),
		'add_or_remove_items'        => __( 'Agregar o Remover Categorías', 'sciaplus' ),
		'choose_from_most_used'      => __( 'Seleccionar del mas usado', 'sciaplus' ),
		'popular_items'              => __( 'Categorías Populares', 'sciaplus' ),
		'search_items'               => __( 'Buscar Categoría', 'sciaplus' ),
		'not_found'                  => __( 'No Existe', 'sciaplus' ),
		'no_terms'                   => __( 'No hay Categorías', 'sciaplus' ),
		'items_list'                 => __( 'Lista de Categorías', 'sciaplus' ),
		'items_list_navigation'      => __( 'Navegación de Categorías', 'sciaplus' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
		'rest_base'                  => 'categoriasrest',
	);
	register_taxonomy( 'categoria', array( 'articulo' ), $args );

}
add_action( 'init', 'sciaplus_tax_categoria', 0 );

}