<?php
/* Registra os menus para template */

/**
 * @package WordPress
 * @subpackage IBGH
 * @since IBGH 1.3
 */

register_nav_menus(array(
				'menu_topo_ibgh' => __('Menu topo IBGH', 'ibgh'),
				'menu_principal_ibgh' => __('Menu principal IBGH', 'ibgh'),
				'menu_principal_modal_oibgh_c1' => __('Menu principal modal O IBGH col 1', 'ibgh'),
				'menu_principal_modal_oibgh_c2' => __('Menu principal modal O IBGH col 2', 'ibgh'),
				'menu_principal_modal_oibgh_c3' => __('Menu principal modal O IBGH col 3', 'ibgh'),
				'menu_principal_modal_unidades' => __('Menu principal modal Unidades', 'ibgh'),
));
