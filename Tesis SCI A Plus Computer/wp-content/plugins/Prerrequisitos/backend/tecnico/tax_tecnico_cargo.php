<?php
if ( ! function_exists( 'sciaplus_tecnico_tax_cargo' ) ) {

// Register Custom Taxonomy
function sciaplus_tecnico_tax_cargo() {

	$labels = array(
		'name'                       => _x( 'Cargos', 'Taxonomy General Name', 'sciaplus' ),
		'singular_name'              => _x( 'Cargo', 'Taxonomy Singular Name', 'sciaplus' ),
		'menu_name'                  => __( 'Cargo', 'sciaplus' ),
		'all_items'                  => __( 'Todos los Cargos', 'sciaplus' ),
		'parent_item'                => __( 'Cargo Padre', 'sciaplus' ),
		'parent_item_colon'          => __( 'Cargo Padre:', 'sciaplus' ),
		'new_item_name'              => __( 'Nuevo Cargo', 'sciaplus' ),
		'add_new_item'               => __( 'Agregar Cargo', 'sciaplus' ),
		'edit_item'                  => __( 'Editar Cargo', 'sciaplus' ),
		'update_item'                => __( 'Actualizar Cargo', 'sciaplus' ),
		'view_item'                  => __( 'Ver Cargo', 'sciaplus' ),
		'separate_items_with_commas' => __( 'Separar Cargos con comas', 'sciaplus' ),
		'add_or_remove_items'        => __( 'Agregar o Remover Cargos', 'sciaplus' ),
		'choose_from_most_used'      => __( 'Seleccionar del más usado', 'sciaplus' ),
		'popular_items'              => __( 'Cargos Populares', 'sciaplus' ),
		'search_items'               => __( 'Buscar Cargo', 'sciaplus' ),
		'not_found'                  => __( 'No existe', 'sciaplus' ),
		'no_terms'                   => __( 'No hay Cargos', 'sciaplus' ),
		'items_list'                 => __( 'Lista de Cargos', 'sciaplus' ),
		'items_list_navigation'      => __( 'Navegación de Cargos', 'sciaplus' ),
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
		'rest_base'                  => 'cargosrest',
	);
	register_taxonomy( 'cargo', array( 'tecnico' ), $args );

}
add_action( 'init', 'sciaplus_tecnico_tax_cargo', 0 );

}