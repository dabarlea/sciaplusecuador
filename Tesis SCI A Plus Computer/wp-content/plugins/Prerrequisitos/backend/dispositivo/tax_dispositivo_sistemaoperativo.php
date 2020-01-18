<?php
if ( ! function_exists( 'sciaplus_tax_sistemaoperativo' ) ) {

// Register Custom Taxonomy
function sciaplus_tax_sistemaoperativo() {

	$labels = array(
		'name'                       => _x( 'Sistemas Operativos', 'Taxonomy General Name', 'sciaplus' ),
		'singular_name'              => _x( 'Sistema Operativo', 'Taxonomy Singular Name', 'sciaplus' ),
		'menu_name'                  => __( 'Sistema Operativo', 'sciaplus' ),
		'all_items'                  => __( 'Todos los Sistemas Operativos', 'sciaplus' ),
		'parent_item'                => __( 'Sistema Operativo Padre', 'sciaplus' ),
		'parent_item_colon'          => __( 'Sistema Operativo Padre:', 'sciaplus' ),
		'new_item_name'              => __( 'Nuevo Sistema Operativo', 'sciaplus' ),
		'add_new_item'               => __( 'Agregar Sistema Operativo', 'sciaplus' ),
		'edit_item'                  => __( 'Editar Sistema Operativo', 'sciaplus' ),
		'update_item'                => __( 'Actualizar Sistema Operativo', 'sciaplus' ),
		'view_item'                  => __( 'Ver Sistema Operativo', 'sciaplus' ),
		'separate_items_with_commas' => __( 'Separar Sistemas Operativos con comas', 'sciaplus' ),
		'add_or_remove_items'        => __( 'Agregar o Remover Sistemas Operativos', 'sciaplus' ),
		'choose_from_most_used'      => __( 'Seleccionar del mas usado', 'sciaplus' ),
		'popular_items'              => __( 'Sistemas Operativos Populares', 'sciaplus' ),
		'search_items'               => __( 'Buscar Sistema Operativo', 'sciaplus' ),
		'not_found'                  => __( 'No Existe', 'sciaplus' ),
		'no_terms'                   => __( 'No hay Sistemas Operativos', 'sciaplus' ),
		'items_list'                 => __( 'Lista de Sistemas Operativos', 'sciaplus' ),
		'items_list_navigation'      => __( 'Navegación de Sistemas Operativos', 'sciaplus' ),
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
		'rest_base'                  => 'sistemasoperativosrest',
	);
	register_taxonomy( 'sistemaoperativo', array( 'dispositivo' ), $args );

}
add_action( 'init', 'sciaplus_tax_sistemaoperativo', 0 );

}