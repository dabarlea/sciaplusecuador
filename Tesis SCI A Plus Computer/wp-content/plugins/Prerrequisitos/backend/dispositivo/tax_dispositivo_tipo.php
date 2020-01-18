<?php
if ( ! function_exists( 'sciaplus_tax_tipo' ) ) {

// Register Custom Taxonomy
function sciaplus_tax_tipo() {

	$labels = array(
		'name'                       => _x( 'Tipos', 'Taxonomy General Name', 'sciaplus' ),
		'singular_name'              => _x( 'Tipo', 'Taxonomy Singular Name', 'sciaplus' ),
		'menu_name'                  => __( 'Tipo', 'sciaplus' ),
		'all_items'                  => __( 'Todos los Tipos', 'sciaplus' ),
		'parent_item'                => __( 'Tipo Padre', 'sciaplus' ),
		'parent_item_colon'          => __( 'Tipo Padre:', 'sciaplus' ),
		'new_item_name'              => __( 'Nuevo Tipo', 'sciaplus' ),
		'add_new_item'               => __( 'Agregar Tipo', 'sciaplus' ),
		'edit_item'                  => __( 'Editar Tipo', 'sciaplus' ),
		'update_item'                => __( 'Actualizar Tipo', 'sciaplus' ),
		'view_item'                  => __( 'Ver Tipo', 'sciaplus' ),
		'separate_items_with_commas' => __( 'Separar Tipos con comas', 'sciaplus' ),
		'add_or_remove_items'        => __( 'Agregar o Remover Tipos', 'sciaplus' ),
		'choose_from_most_used'      => __( 'Seleccionar del mas usado', 'sciaplus' ),
		'popular_items'              => __( 'Tipos Populares', 'sciaplus' ),
		'search_items'               => __( 'Buscar Tipo', 'sciaplus' ),
		'not_found'                  => __( 'No Existe', 'sciaplus' ),
		'no_terms'                   => __( 'No hay Tipos', 'sciaplus' ),
		'items_list'                 => __( 'Lista de Tipos', 'sciaplus' ),
		'items_list_navigation'      => __( 'Navegación de Tipos', 'sciaplus' ),
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
		'rest_base'                  => 'tiposrest',
	);
	register_taxonomy( 'tipo', array( 'dispositivo' ), $args );

}
add_action( 'init', 'sciaplus_tax_tipo', 0 );

}