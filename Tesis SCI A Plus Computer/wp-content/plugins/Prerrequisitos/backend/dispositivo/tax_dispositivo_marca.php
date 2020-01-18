<?php
if ( ! function_exists( 'sciaplus_tax_marca' ) ) {

// Register Custom Taxonomy
function sciaplus_tax_marca() {

	$labels = array(
		'name'                       => _x( 'Marcas', 'Taxonomy General Name', 'sciaplus' ),
		'singular_name'              => _x( 'Marca', 'Taxonomy Singular Name', 'sciaplus' ),
		'menu_name'                  => __( 'Marca', 'sciaplus' ),
		'all_items'                  => __( 'Todos los Marcas', 'sciaplus' ),
		'parent_item'                => __( 'Marca Padre', 'sciaplus' ),
		'parent_item_colon'          => __( 'Marca Padre:', 'sciaplus' ),
		'new_item_name'              => __( 'Nuevo Marca', 'sciaplus' ),
		'add_new_item'               => __( 'Agregar Marca', 'sciaplus' ),
		'edit_item'                  => __( 'Editar Marca', 'sciaplus' ),
		'update_item'                => __( 'Actualizar Marca', 'sciaplus' ),
		'view_item'                  => __( 'Ver Marca', 'sciaplus' ),
		'separate_items_with_commas' => __( 'Separar Marcas con comas', 'sciaplus' ),
		'add_or_remove_items'        => __( 'Agregar o Remover Marcas', 'sciaplus' ),
		'choose_from_most_used'      => __( 'Seleccionar del mas usado', 'sciaplus' ),
		'popular_items'              => __( 'Marcas Populares', 'sciaplus' ),
		'search_items'               => __( 'Buscar Marca', 'sciaplus' ),
		'not_found'                  => __( 'No Existe', 'sciaplus' ),
		'no_terms'                   => __( 'No hay Marcas', 'sciaplus' ),
		'items_list'                 => __( 'Lista de Marcas', 'sciaplus' ),
		'items_list_navigation'      => __( 'Navegación de Marcas', 'sciaplus' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
		'rest_base'                  => 'marcasrest',
	);
	register_taxonomy( 'marca', array( 'dispositivo' ), $args );

}
add_action( 'init', 'sciaplus_tax_marca', 0 );

}