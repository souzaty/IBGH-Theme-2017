<?php
/**

* @package WordPress
* @subpackage IBGH
* @since IBGH 1.0
*/
/*--------------------------------------------------------------
>>> TABLE OF CONTENTS:
----------------------------------------------------------------
# Menu
# Normalize
# Theme Suport
  ## Feed Links
  ## Pagination
  ## Thumbnails Sizes
  ## HTML 5 Support
  ## Post Formats
  ## Remove Meta Generator
# Widgets
# Admin Page
# CPT Custom Post Types
  ## CPT Diretoria
  ## CPT Unidades
  ## CPT Indicadores
  ## CPT Transparencia
# Shortcodes
  ## Cards Home
  ## Carrouseel membros
  ## Unidades Footer
  ## Pesquisa Sidebar
  ## Indicadores Sidebar
  ## Missao Visao
  ## Principios
  ## Indicadores full
# Script button upload
# Excerpt
# WP-login Customization
--------------------------------------------------------------*/

// ========== Start Menu
register_nav_menus(array(
				'menu_topo_ibgh' => __('Menu topo IBGH', 'ibgh'),
				'menu_principal_ibgh' => __('Menu principal IBGH', 'ibgh'),
				'menu_principal_modal_oibgh_c1' => __('Menu principal modal O IBGH col 1', 'ibgh'),
				'menu_principal_modal_oibgh_c2' => __('Menu principal modal O IBGH col 2', 'ibgh'),
				'menu_principal_modal_oibgh_c3' => __('Menu principal modal O IBGH col 3', 'ibgh'),
				'menu_principal_modal_unidades' => __('Menu principal modal Unidades', 'ibgh'),
));

// ========== Start Theme Suport

// Generate Feed Links
add_theme_support('automatic-feed-links');

// Paginação
require_once('wp_bootstrap_pagination.php');

// Configura os tamanhos
add_theme_support('post-thumbnails');
add_filter('jpeg_quality', create_function('', 'return 100;'));
set_post_thumbnail_size(825, 510, true);
add_image_size('membros-conselho', 283, 250, true);
add_image_size('unidades', 110, 56, true);
add_image_size('servicos-heelj', 80, 80, true);
add_image_size('noticias-home-heelj', 366, 232, true);
add_image_size('corpo-clinico', 115, 115, true);

// Adiciona suporte a html 5
add_theme_support('html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
));

// Adicona suporte a vários tipos de posts
add_theme_support('post-formats', array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'status',
				'audio',
				'chat'
));
// Remove Meta Generator
remove_action('wp_head', 'wp_generator');


add_filter('wp_nav_menu_items', 'add_search_box_to_menu', 10, 2);
function add_search_box_to_menu($items, $args)
{
if ($args->theme_location == 'menu_topo_ibgh')
				return $items . "<li class='menu-header-search'><a href='https://www.facebook.com/ibgh.os/?fref=ts' target='_blank'><span class='fa fa-facebook'></span></a></li><li class='menu-item menu-item-type-custom menu-item-object-custom menu-item-31'><form role='search' method='get' class='search-form' action='" . esc_url(home_url('/')) . "'><div class='box box-header'>  <div class='container-2'><span class='icon'><i class='fa fa-search'></i></span><input type='search' id='search' placeholder='pesquisar...' value='" . get_search_query() . "' name='s' /></div></div></form></li>";
return $items;
}

// ========== Start Widgets

register_sidebar(array(
	'name' => 'Footer Sidebar 1',
	'id' => 'ibgh-footer-sidebar-1',
	'description' => 'Aparece na área de rodapé',
	'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'Footer Sidebar 2',
	'id' => 'ibgh-footer-sidebar-2',
	'description' => 'Aparece na área de rodapé',
	'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'Footer Sidebar 3',
	'id' => 'ibgh-footer-sidebar-3',
	'description' => 'Aparece na área de rodapé',
	'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'Footer Sidebar 4',
	'id' => 'ibgh-footer-sidebar-4',
	'description' => 'Aparece na área de rodapé',
	'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'Blog',
	'id' => 'blog-ibgh',
	'description' => 'Aparece na área de Blog',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'Eventos e Treinamentos',
	'id' => 'eventos-treinamentos-ibgh',
	'description' => 'Aparece na área na barra lateral da página de Eventos e Treinamentos',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'Sala de Imprensa',
	'id' => 'sala-impresa',
	'description' => 'Aparece na área na barra lateral da página de Sala de Imprensa',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));

// ========== Start Admin Page

function ibgh_add_admin_page() {

    // Generate IBGH Admin Page
    add_menu_page( 'IBGH Theme Options', 'IBGH', 'manage_options', 'alecaddd_ibgh', 'ibgh_theme_create_page', get_template_directory_uri() . '/img/ibgh-icon.png', 110 );

    // Generate IBGH Admin Page
    add_submenu_page( 'alecaddd_ibgh', 'IBGH Theme Options', 'Informações de Contato', 'manage_options', 'alecaddd_ibgh', 'ibgh_theme_create_page' );

    add_submenu_page( 'alecaddd_ibgh', 'IBGH CSS Options', 'Custom CSS', 'manage_options', 'alecaddd_ibgh_css', 'ibgh_theme_settings_page' );

    // Activate custom settings
    add_action ( 'admin_init', 'ibgh_custom_settings' );
}
add_action( 'admin_menu', 'ibgh_add_admin_page' );

function ibgh_custom_settings() {
    register_setting( 'ibgh-settings-group', 'first_name' );
    add_settings_section( 'ibgh-sidebar-options', 'Sidebar Options', 'ibgh_sidebar_options', 'alecaddd_ibgh' );
    add_settings_field( 'sidebar-name', 'First Name', 'ibgh_sidebar_name', 'alecaddd_ibgh', 'ibgh-sidebar-options' );
}

function ibgh_sidebar_options() {
    echo 'customize your page';
}
function ibgh_sidebar_name() {
    echo '<input type="text" name="first_name" value="" /> ';
}

function ibgh_theme_create_page() {
    require_once( get_template_directory() . '/inc/templates/ibgh-admin.php' );
}

function ibgh_theme_settings_page() {
    echo '<h1> Custom CSS</h1>';
}

// ========== Start CPT - Custom Post Types

// Start CPT Diretoria
add_action('init', 'diretoria_conselho');
function diretoria_conselho()
{
				$labels = array(
								'name' => __('Diretoria e Conselho', 'Tipo de post para incluir os membros da diretoria e do conselho.'),
								'singular_name' => __('Diretoria e Conselho', 'post type singular name'),
								'all_items' => __('Todos os membros'),
								'add_new' => _x('Novo Membro', 'Novo membro'),
								'add_new_item' => __('Add novo membro'),
								'edit_item' => __('Editar membro'),
								'new_item' => __('Novo Membro Item'),
								'view_item' => __('Ver item do membro'),
								'search_items' => __('Procurar Membro'),
								'not_found' => __('Nenhum membro encontrado'),
								'not_found_in_trash' => __('Nenhum membro encontrado na lixeira'),
								'parent_item_colon' => ''
				);
				$args   = array(
								'labels' => $labels,
								'public' => true,
								'publicly_queryable' => true,
								'show_ui' => true,
								'query_var' => true,
								'menu_icon' => 'dashicons-businessman',
								'rewrite' => array(
												'slug' => 'membros/%Sessao%',
												'with_front' => false
								),
								'capability_type' => 'post',
								'hierarchical' => false,
								'menu_position' => 6,
								'taxonomies' => array(
												'post_tag'
								),
								'supports' => array(
												'title',
												'thumbnail',
												'editor'
								)
				);
				register_post_type('membros', $args);
				flush_rewrite_rules();
}
register_taxonomy("Sessao", array(
				"membros"
), array(
				"hierarchical" => true,
				"label" => "Sess&atilde;o",
				"singular_label" => "Sessao",
				"rewrite" => array(
								'slug' => 'membros'
				),
				"public" => true,
				"show_ui" => true,
				"_builtin" => true
));
// Filter to change the permalink
add_filter('post_link', 'sessao_permalink', 1, 3);
add_filter('post_type_link', 'sessao_permalink', 1, 3);
function sessao_permalink($permalink, $post_id, $leavename)
{
				//con %brand% catturo il rewrite del Custom Post Type
				if (strpos($permalink, '%Sessao%') === FALSE)
								return $permalink;
				// Get post
				$post = get_post($post_id);
				if (!$post)
								return $permalink;
				// Get taxonomy terms
				$terms = wp_get_object_terms($post->ID, 'Sessao');
				if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
								$taxonomy_slug = $terms[0]->slug;
				else
								$taxonomy_slug = 'no-brand';
				return str_replace('%Sessao%', $taxonomy_slug, $permalink);
}
add_action("admin_init", "campos_personalizados_membros");
function campos_personalizados_membros()
{
				add_meta_box("cargo_membro", "Informe o cargo do membro", "cargo_membro", "membros", "normal", "low");
				add_meta_box("sub_cargo_membro", "Informe o subcargo do membro", "sub_cargo_membro", "membros", "normal", "low");
}
function cargo_membro()
{
				global $post;
				$custom       = get_post_meta($post->ID);
				$cargo_membro = $custom["cargo_membro"][0];
?>
	  <input type="text" name="cargo_membro" value="<?php
				echo $cargo_membro;
?>" />
	  <?php
}
function sub_cargo_membro()
{
				global $post;
				$custom           = get_post_meta($post->ID);
				$sub_cargo_membro = $custom["sub_cargo_membro"][0];
?>
	  <input type="text" name="sub_cargo_membro" value="<?php
				echo $sub_cargo_membro;
?>" />
	  <?php
}
add_action('save_post_membros', 'save_details_post_membros');
function save_details_post_membros()
{
				global $post;
				update_post_meta($post->ID, "cargo_membro", $_POST["cargo_membro"]);
				update_post_meta($post->ID, "sub_cargo_membro", $_POST["sub_cargo_membro"]);
}
add_filter("manage_edit-membros_columns", "membros_edit_columns");
function membros_edit_columns($columns)
{
				$columns = array(
								"cb" => "<input type=\"checkbox\" />",
								"title" => "Membro",
								"sessao" => "Sess&atilde;o"
				);
				return $columns;
}
add_action("manage_posts_custom_column", "membros_custom_columns");
function membros_custom_columns($column)
{
				global $post;
				switch ($column) {
								case "title":
												the_title();
												break;
								case "sessao":
												echo get_the_term_list($post->ID, 'Sessao', '', ', ', '');
												break;
				}
}
// End CPT Diretoria

// Start CPT Unidades
add_action('init', 'unidades_register');
function unidades_register()
{
				$product_permalink = 'unidades/%Formato%/';
				$labels            = array(
								'name' => __('Unidades', 'Tipo de post para incluir as unidades.'),
								'singular_name' => __('Lista de unidades', 'post type singular name'),
								'all_items' => __('Todos unidades'),
								'add_new' => _x('Nova unidade', 'Nova unidade'),
								'add_new_item' => __('Adicionar nova unidade'),
								'edit_item' => __('Editar unidade'),
								'new_item' => __('Nova unidade Item'),
								'view_item' => __('Ver item da unidade'),
								'search_items' => __('Procurar unidade'),
								'not_found' => __('Nenhum unidade encontrado'),
								'not_found_in_trash' => __('Nenhum unidade encontrado na lixeira'),
								'parent_item_colon' => ''
				);
				$args              = array(
								'labels' => $labels,
								'public' => true,
								'publicly_queryable' => true,
								'show_ui' => true,
								'query_var' => true,
								'menu_icon' => 'dashicons-groups',
								'rewrite' => array(
												'slug' => 'unidades/%Formato%',
												'with_front' => false
								),
								'capability_type' => 'post',
								'hierarchical' => false,
								'menu_position' => 7,
								'supports' => array(
												'title',
												'thumbnail'
								)
				);
				register_post_type('unidades', $args);
				flush_rewrite_rules();
}
// Filter to change the permalink
add_filter('post_link', 'unidades_permalink', 1, 3);
add_filter('post_type_link', 'unidades_permalink', 1, 3);
function unidades_permalink($permalink, $post_id, $leavename)
{
				//con %brand% catturo il rewrite del Custom Post Type
				if (strpos($permalink, '%unidades%') === FALSE)
								return $permalink;
				// Get post
				$post = get_post($post_id);
				if (!$post)
								return $permalink;
				// Get taxonomy terms
				$terms = wp_get_object_terms($post->ID, 'Formato');
				if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
								$taxonomy_slug = $terms[0]->slug;
				else
								$taxonomy_slug = 'no-brand';
				return str_replace('%unidades%', $taxonomy_slug, $permalink);
}
add_action("admin_init", "unidades_init");
function unidades_init()
{
				add_meta_box("link_unidade", "Link do unidade", "link_unidade", "unidades", "normal", "low");
}
function link_unidade()
{
				global $post;
				$custom       = get_post_meta($post->ID);
				$link_unidade = $custom["link_unidade"][0];
?>

	  <p><label>Informe o link:</label><br />

	  <input type="text" name="link_unidade" value="<?php
				echo $link_unidade;
?>" /></p>

	<?php
}
add_action('save_post_unidades', 'save_details_post_unidades');
function save_details_post_unidades()
{
				global $post;
				update_post_meta($post->ID, "link_unidade", $_POST["link_unidade"]);
}
// End CPT Unidades

// Start CPT Indicadores
add_action('init', 'indicadores_ibgh');
function indicadores_ibgh() {
	$labels = array(
		'name' => __('Indicadores IBGH', 'Tipo de post para incluir os indicadores.'),
		'singular_name' => __('Indicadores IBGH', 'post type singular name'),
		'all_items' => __('Indicadores'),
		'add_new' => _x('Novo indicador', 'Novo indicador'),
		'add_new_item' => __('Add novo indicador'),
		'edit_item' => __('Editar indicador'),
		'new_item' => __('Novo indicador Item'),
		'view_item' => __('Ver item do indicador'),
		'search_items' => __('Procurar indicador'),
		'not_found' => __('Nenhum indicador encontrado'),
		'not_found_in_trash' => __('Nenhum indicador encontrado na lixeira'),
		'parent_item_colon' => ''
	);
	$args   = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-chart-pie',
		'rewrite' => array(
						'slug' => 'indicadores',
						'with_front' => false
		),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 6,
		'taxonomies' => array(
						'post_tag'
		),
		'supports' => array(
						'title',
						'revisions'
		)
);
	register_post_type('indicadores-ibgh', $args);
	flush_rewrite_rules();
}
add_action("admin_init", "campos_personalizados_indicadores_ibgh");
function campos_personalizados_indicadores_ibgh() {
	add_meta_box("indicador_ibgh", "Indicadores IBGH", "indicador_ibgh", "indicadores-ibgh", "normal", "low");
}
function indicador_ibgh() {
	global $post;
	$custom                 = get_post_meta($post->ID);
	$label_indicador_ibgh_1 = $custom["label_indicador_ibgh_1"][0];
	$value_indicador_ibgh_1 = $custom["value_indicador_ibgh_1"][0];
	$label_indicador_ibgh_2 = $custom["label_indicador_ibgh_2"][0];
	$value_indicador_ibgh_2 = $custom["value_indicador_ibgh_2"][0];
	$label_indicador_ibgh_3 = $custom["label_indicador_ibgh_3"][0];
	$value_indicador_ibgh_3 = $custom["value_indicador_ibgh_3"][0];
	$label_indicador_ibgh_4 = $custom["label_indicador_ibgh_4"][0];
	$value_indicador_ibgh_4 = $custom["value_indicador_ibgh_4"][0];
	$label_indicador_ibgh_5 = $custom["label_indicador_ibgh_5"][0];
	$value_indicador_ibgh_5 = $custom["value_indicador_ibgh_5"][0];
	$label_indicador_ibgh_6 = $custom["label_indicador_ibgh_6"][0];
	$value_indicador_ibgh_6 = $custom["value_indicador_ibgh_6"][0];
	$data_acumulado_ibgh    = $custom["data_acumulado_ibgh"][0];
	$frase_ibgh             = $custom["frase_ibgh"][0];
?>
	<label>Informe o label IBGH 1</label>
	<input type="text" name="label_indicador_ibgh_1" value="<?php
		echo $label_indicador_ibgh_1;
?>" />
	<label>Informe o conteúdo IBGH 1</label>
	<input type="text" name="value_indicador_ibgh_1" value="<?php
		echo $value_indicador_ibgh_1;
?>" />
	<br />
	<label>Informe o label IBGH 2</label>
	<input type="text" name="label_indicador_ibgh_2" value="<?php
		echo $label_indicador_ibgh_2;
?>" />
	<label>Informe o conteúdo IBGH 2</label>
	<input type="text" name="value_indicador_ibgh_2" value="<?php
		echo $value_indicador_ibgh_2;
?>" />
	<br />
	<label>Informe o label IBGH 3</label>
	<input type="text" name="label_indicador_ibgh_3" value="<?php
		echo $label_indicador_ibgh_3;
?>" />
	<label>Informe o conteúdo IBGH 3</label>
	<input type="text" name="value_indicador_ibgh_3" value="<?php
		echo $value_indicador_ibgh_3;
?>" />
	<br />
	<label>Informe o label IBGH 4</label>
	<input type="text" name="label_indicador_ibgh_4" value="<?php
		echo $label_indicador_ibgh_4;
?>" />
	<label>Informe o conteúdo IBGH 4</label>
	<input type="text" name="value_indicador_ibgh_4" value="<?php
		echo $value_indicador_ibgh_4;
?>" />
	<br />
	<label>Informe o label IBGH 5</label>
	<input type="text" name="label_indicador_ibgh_5" value="<?php
		echo $label_indicador_ibgh_5;
?>" />
	<label>Informe o conteúdo IBGH 5</label>
	<input type="text" name="value_indicador_ibgh_5" value="<?php
		echo $value_indicador_ibgh_5;
?>" />
	<br />
	<label>Informe o label IBGH 6</label>
	<input type="text" name="label_indicador_ibgh_6" value="<?php
		echo $label_indicador_ibgh_6;
?>" />
	<label>Informe o conteúdo IBGH 6</label>
	<input type="text" name="value_indicador_ibgh_6" value="<?php
		echo $value_indicador_ibgh_6;
?>" />
	<br /><br />
	<label>Informe o período acumulado</label>
	<input type="text" name="data_acumulado_ibgh" value="<?php
		echo $data_acumulado_ibgh;
?>" />
	<br />
	<label>Informe o frase principal</label>
	<input type="text" name="frase_ibgh" value="<?php
		echo $frase_ibgh;
?>" />
<?php
}

add_action('save_post_indicadores-ibgh', 'save_details_post_indicadores_ibgh');
function save_details_post_indicadores_ibgh() {
	global $post;
	update_post_meta($post->ID, "label_indicador_ibgh_1", $_POST["label_indicador_ibgh_1"]);
	update_post_meta($post->ID, "value_indicador_ibgh_1", $_POST["value_indicador_ibgh_1"]);
	update_post_meta($post->ID, "label_indicador_ibgh_2", $_POST["label_indicador_ibgh_2"]);
	update_post_meta($post->ID, "value_indicador_ibgh_2", $_POST["value_indicador_ibgh_2"]);
	update_post_meta($post->ID, "label_indicador_ibgh_3", $_POST["label_indicador_ibgh_3"]);
	update_post_meta($post->ID, "value_indicador_ibgh_3", $_POST["value_indicador_ibgh_3"]);
	update_post_meta($post->ID, "label_indicador_ibgh_4", $_POST["label_indicador_ibgh_4"]);
	update_post_meta($post->ID, "value_indicador_ibgh_4", $_POST["value_indicador_ibgh_4"]);
	update_post_meta($post->ID, "label_indicador_ibgh_5", $_POST["label_indicador_ibgh_5"]);
	update_post_meta($post->ID, "value_indicador_ibgh_5", $_POST["value_indicador_ibgh_5"]);
	update_post_meta($post->ID, "label_indicador_ibgh_6", $_POST["label_indicador_ibgh_6"]);
	update_post_meta($post->ID, "value_indicador_ibgh_6", $_POST["value_indicador_ibgh_6"]);
	update_post_meta($post->ID, "data_acumulado_ibgh", $_POST["data_acumulado_ibgh"]);
	update_post_meta($post->ID, "frase_ibgh", $_POST["frase_ibgh"]);
}
// End CPT Indicadores

// Start CPT Transparência
add_action('init', 'transparencia_register');
function transparencia_register()
{
				$eventos_permalink = 'transparencia';
				$labels            = array(
								'name' => __('Prestação de contass', 'Tipo de post para incluir Prestação de contass.'),
								'singular_name' => __('Prestação de conta', 'post type singular name'),
								'all_items' => __('Todas Prestações de Contas'),
								'add_new' => _x('Nova Prestação de conta', 'Nova Prestação de conta'),
								'add_new_item' => __('Adicionar nova Prestação de conta'),
								'edit_item' => __('Editar Prestação de conta'),
								'new_item' => __('Nova Prestação de conta Item'),
								'view_item' => __('Ver item da Prestação de conta'),
								'search_items' => __('Procurar Prestação de conta'),
								'not_found' => __('Nenhuma Prestação de conta encontrada'),
								'not_found_in_trash' => __('Nenhuma Prestação de conta encontrada na lixeira'),
								'parent_item_colon' => ''
				);
				$args              = array(
								'labels' => $labels,
								'public' => true,
								'publicly_queryable' => true,
								'show_ui' => true,
								'query_var' => true,
								'menu_icon' => 'dashicons-visibility',
								'rewrite' => array(
												'slug' => 'transparencia',
												'with_front' => false
								),
								'capability_type' => 'post',
								'hierarchical' => false,
								'menu_position' => 5,
								'supports' => array(
												'title'
								)
				);
				register_post_type('transparencia', $args);
				flush_rewrite_rules();
}
register_taxonomy("Ano", array(
				"transparencia"
), array(
				"hierarchical" => true,
				"label" => "Ano",
				"singular_label" => "Ano",
				"rewrite" => array(
								'slug' => 'ano'
				),
				"public" => true,
				"show_ui" => true,
				"_builtin" => true
));
register_taxonomy("Tipo documento", array(
				"transparencia"
), array(
				"hierarchical" => true,
				"label" => "Tipo Documento",
				"singular_label" => "tipo-documento",
				"rewrite" => array(
								'slug' => 'tipo-documento'
				),
				"public" => true,
				"show_ui" => true,
				"_builtin" => true
));
// Filter to change the permalink
add_filter('post_link', 'transparencia_permalink', 1, 3);
add_filter('post_type_link', 'transparencia_permalink', 1, 3);
function transparencia_permalink($permalink, $post_id, $leavename)
{
	// con %brand% catturo il rewrite del Custom Post Type
	if (strpos($permalink, '%ano%') === FALSE)
					return $permalink;
	// Get post
	$post = get_post($post_id);
	if (!$post)
					return $permalink;
	// Get taxonomy terms
	$terms = wp_get_object_terms($post->ID, 'Ano');
	if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
					$taxonomy_slug = $terms[0]->slug;
	else
					$taxonomy_slug = 'no-brand';
	return str_replace('%Ano%', $taxonomy_slug, $permalink);
}
add_action("admin_init", "campos_personalizados_transparencia");
function campos_personalizados_transparencia()
{
				add_meta_box("upload_documento_transparencia", "Fa&ccedil;a o upload do documento", "upload_documento_transparencia", "transparencia", "normal", "low");
}
function upload_documento_transparencia()
{
				global $post;
				// Procura o valor da chave 'upload_file'
				$upload_documento_transparencia = get_post_meta($post->ID, 'upload_documento_transparencia', true);
?>

		<p>Clique no botão para fazer o upload de um documento. Após
			o término do upload, clique em <em>Inserir no post</em>.</p>
		<p>
			<input id="upload_image" type="text" size="80"
				name="upload_documento_transparencia" style="width: 85%;"
				value="<?php
				if (!empty($upload_documento_transparencia))
								echo $upload_documento_transparencia;
?>" />

			<input id="upload_image_button" type="button" class="button"
				value="Fazer upload" />
		</p>
		<?php
}
add_action('save_post_transparencia', 'save_details_post_transparencia');
function save_details_post_transparencia()
{
				global $post;
				update_post_meta($post->ID, "upload_documento_transparencia", $_POST["upload_documento_transparencia"]);
}
function buscaTransparencia()
{
				global $post;
				$ano = $_POST['ano_busca'];
?>
		<div class="tab-pane active" id="financeiro">

			<?php
				$wp_query = new WP_Query();
				$wp_query->query('post_type=transparencia&ano=' . $ano . '&tipo-documento=relacao-de-gestores-recursos-humanos-ibgh&posts_per_page=100');
				$count = 0;
?>
			<?php
				if ($wp_query->have_posts()):
								while ($wp_query->have_posts()):
												$wp_query->the_post();
?>
			<?php
												$upload_documento_transparencia = get_post_meta($post->ID, 'upload_documento_transparencia', true);
?>


			<a href="<?php
												echo $upload_documento_transparencia;
?>"
				target="_blank"><i class="fa fa-arrow-circle-o-down"
				aria-hidden="true"></i> <?php
												the_title();
?></a>

				<?php
								endwhile;
				endif;
?>

									</div>

		<div class="tab-pane" id="processo-de-aquisicao">

										<?php
				$wp_query = new WP_Query();
				$wp_query->query('post_type=transparencia&ano=' . $ano . '&meta_key=tipo_pretacao_conta&meta_value=heelj-processo-de-aquisicao&posts_per_page=100');
?>

									    <?php
				if ($wp_query->have_posts()):
								while ($wp_query->have_posts()):
												$wp_query->the_post();
?>
											<?php
												$upload_documento_transparencia = get_post_meta($post->ID, 'upload_documento_transparencia', true);
?>
											<a href="<?php
												echo $upload_documento_transparencia;
?>"
				target="_blank"><i class="fa fa-arrow-circle-o-down"
				aria-hidden="true"></i> <?php
												the_title();
?></a>
										<?php
								endwhile;
				endif;
?>

									</div>

		<div class="tab-pane" id="demonstrativo">

										<?php
				$wp_query = new WP_Query();
				$wp_query->query('post_type=transparencia&ano=' . $ano . '&meta_key=tipo_pretacao_conta&meta_value=demonstrativo&posts_per_page=100');
?>

									    <?php
				if ($wp_query->have_posts()):
								while ($wp_query->have_posts()):
												$wp_query->the_post();
?>
											<?php
												$upload_documento_transparencia = get_post_meta($post->ID, 'upload_documento_transparencia', true);
?>
											<a href="<?php
												echo $upload_documento_transparencia;
?>"
				target="_blank"><i class="fa fa-arrow-circle-o-down"
				aria-hidden="true"></i> <?php
												the_title();
?></a>

										<?php
								endwhile;
				endif;
?>

									</div>
		<?php
				// doSomeStuff
				die(); // Lembre sempre de finalizar a execução pois, caso contrario o wordpress retornará 0.
}
// Adiciona a funcao extra votos aos hooks ajax do WordPress.
add_action('wp_ajax_buscaTransparencia', 'buscaTransparencia');
add_action('wp_ajax_nopriv_buscaTransparencia', 'buscaTransparencia');
// Endt CPT Transparencia

// ========== Start Shortcodes

// Enable the use of shortcodes in text widgets.
add_filter('widget_text', 'do_shortcode');

// Start Shortcode Cards Home
function ibgh_backface($atts, $content = null)
{
				$inicio_tab = '<div class="card">';
				$fim_tab    = '</div>';
				return ($inicio_tab . do_shortcode(wpautop($content)) . $fim_tab);
}
add_shortcode("backface", "ibgh_backface");
function ibgh_backface_front($atts, $content = null)
{
				extract(shortcode_atts(array(
								'class' => 'front',
								'title' => '',
								'content' => '',
								'image' => ''
				), $atts));
				$incio_cont = '<div class="' . $class . '">';
				$meio_cont  = '<img class="card-icons" src="' . $image . '" alt="familias atendidas">
				  <h4 class="enfase-numeros">' . $title . '</h4>
                  <p style="font-size:0.5em; line-height: 2.5em;">' . $content . '</p>
              ';
				$fim_cont   = '</div>';
				return ($incio_cont . $meio_cont . $fim_cont);
}
add_shortcode("backfacefront", "ibgh_backface_front");
function ibgh_backface_back($atts, $content = null)
{
				$inicio_tab = '<div class="back"><span class="glyphicon glyphicon-chevron-up up"></span>';
				$fim_tab    = '</div>';
				return ($inicio_tab . do_shortcode($content) . $fim_tab);
}
add_shortcode("backfaceback", "ibgh_backface_back");

//remove a tag paragrafo das páginas
remove_filter('the_content', 'wpautop');
add_filter('the_content', 'my_custom_formatting');
function my_custom_formatting($content)
{
				if (get_post_type() == 'page') //if it does not work, you may want to pass the current post object to get_post_type
								return $content; //no autop
				else
								return wpautop($content);
}
// End Shortcode Cards Home

// Start Shortcode Carrouseel membros
function carousel_membros_short($atts)
{
				ob_start();
?>
<section id="ibgh">
   <div class="container">

     <div class="row gutter-10">
      <div class="carousel slide membros" data-ride="carousel" data-type="multi" data-interval="10000" id="myCarouselMembros">
		<div class="carousel-inner" >

      <?php
		global $post;
		$wp_query = new WP_Query();
		$wp_query->query('post_type=membros&posts_per_page=-1&orderby=date&order=ASC');
		$count = 0;
?>
      <?php
		if ($wp_query->have_posts()):
						while ($wp_query->have_posts()):
										$wp_query->the_post();
										$count++;
?>

         <div class="item <?php
										if ($count == 1) {
														echo active;
										} else {
										}
?>">
         <div class="col-md-3 <?php
										the_title();
?>">
            <div class="card-office">
            <?php
										$categorias = $categories = get_the_terms($post_id, 'Sessao');
?>
               <h3 class="<?php
										foreach ($categorias as $categoria) {
														echo $categoria->slug;
										}
?>"><?php
										foreach ($categorias as $categoria) {
														echo $categoria->name;
										}
?></h3>
                  <div class="filter">
                  	<?php
										if (has_post_thumbnail()) {
														the_post_thumbnail('membros-diretoria', array(
																		'class' => 'pic-office',
																		'title' => 'Conselho'
														));
										}
?>
                  </div>
                  <h4 class="cargo">

                  	<?php
										$cargo_membro = get_post_meta($post->ID, 'cargo_membro', true);
?>
                  	<?php
										echo $cargo_membro;
?>
                  </h4>

                  <h3 class="nome"><?php
										the_title();
?></h3>
                  <h4 class="civil">
                  	<?php
										$sub_cargo_membro = get_post_meta($post->ID, 'sub_cargo_membro', true);
?>
                  	<?php
										echo $sub_cargo_membro;
?>
                  </h4>
            </div>
            </div>
         </div>
		<?php
						endwhile;
		endif;
		wp_reset_query();
?>
       </div>
	  </div>
	  <div class="col-md-12">
            <div class="control-conselho">
               <a class="conselho-previous left" href="#myCarouselMembros" data-slide="prev"></a>
               <a class="conselho-next right" href="#myCarouselMembros" data-slide="next"></a>
            </div>
         </div>
      </div><!-- End row gutter-10 -->
   </div>
</section>
<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('carousel_membros', 'carousel_membros_short');
// End Shortcode Carrouseel membros

// Start Shortcode Unidades Footer
function carousel_unidades_short($atts) {
	ob_start();
?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div id="carousel-pager" class="carousel slide " data-ride="carousel" data-interval="500000000">
                <!-- Carousel items -->
                <div class="carousel-inner vertical">
	                <?php
						$wp_query = new WP_Query();
						$wp_query->query('post_type=unidades&posts_per_page=-1&orderby=date&order=ASC');
						$count = 0;
					?>
					<?php
						if ($wp_query->have_posts()):
						while ($wp_query->have_posts()):
						$wp_query->the_post();
						$count++;
					?>
					<?php
						$unidades     = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'unidades');
						$link_unidade = get_post_meta($post->ID, 'link_unidade', true);
					?>
					<div class="<?php if ($count == 1) {
                    	echo active;
							}
							?>active item">
                        <a href="<?php echo $link_unidade;
                        	?>" target="_blank">
                        <img src="<?php echo $unidades;
                        	?>" class="img-responsive" data-target="#carousel-main" data-slide-to="<?php echo $count;
                        	?>"></a>
                    </div>
                    <?php
                    	endwhile;
                    	endif;
                    ?>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-pager" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-pager" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
	<?php
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
}
add_shortcode('carousel_unidades', 'carousel_unidades_short');
// End Shortcode Unidades Footer

// Start Shortcode Pesquisa Sidebar
function pesquisa_sidebar_($atts)
{
				ob_start();
?>
			   <div id="imaginary_container">
               <form role="search" method="get" class="search-form" action="<?php
				echo esc_url(home_url('/'));
?>">
                   <div class="input-group stylish-input-group">
                       <input type="text" class="form-control search-widget-text" placeholder="Pesquisar"  value="<?php
				echo get_search_query();
?>" name="s">
                       <span class="input-group-addon">
                           <button type="submit">
                               <span class="glyphicon glyphicon-search"></span>
                           </button>
                       </span>
                   </div>
               </form>
               </div>
				<?php
				$content = ob_get_contents();
				ob_end_clean();
				return $content;
}
add_shortcode('pesquisa_sidebar', 'pesquisa_sidebar_');
// End Shortcode Pesquisa Sidebar

// Start Shortcode Indicadores Sidebar
function indicadores_sidebar_($atts)
{
				extract(shortcode_atts(array(
								'unidade' => ''
				), $atts));
				ob_start();
?>
		 		<div class="widgetContainer gutter-30">
                  <h3 class="widgetTitle">Nossos n&uacute;meros</h3>

                  <?php
				global $post;
				$wp_query = new WP_Query();
				$wp_query->query('post_type=indicadores-ibgh&posts_per_page=1&orderby=title&order=ASC');
?>
				 <?php
				if ($wp_query->have_posts()):
								while ($wp_query->have_posts()):
												$wp_query->the_post();
?>
                  <h2>
                  	<?php
												$frase = get_post_meta($post->ID, 'frase_' . $unidade, true);
?>
		          	<?php
												echo $frase;
?>
                  </h2>

                  <table>
                     <tbody>
                       <tr>
                           <td>
                              <!-- ##### Leitos ##### -->
                              <table class="numeros-tabela-widget">
                                 <tbody>
                                    <tr style="margin-left: 10px;     display: block;">
                                       <td width="56">
                                          <p class="left"><img src="<?php
												echo esc_url(get_template_directory_uri());
?>/img/icon_001.png" alt=""></p>
                                       </td>
                                       <td>
                                          <h1 class="number-counter left">
                                           	<?php
												$value_indicador_1 = get_post_meta($post->ID, 'value_indicador_' . $unidade . '_1', true);
?>
		               					  	<?php
												print_r($value_indicador_1);
?>
                                          </h1>
                                          <p class="text-counter left">
                                          	<?php
												$label_indicador_1 = get_post_meta($post->ID, 'label_indicador_' . $unidade . '_1', true);
?>
		               						<?php
												echo $label_indicador_1;
?>
                                          </p>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <!-- ##### Centros cirurgicos ##### -->
                              <table class="numeros-tabela-widget">
                                 <tbody>
                                    <tr style="margin-left: 10px;     display: block;">
                                       <td width="56">
                                          <p class="left"><img src="<?php
												echo esc_url(get_template_directory_uri());
?>/img/icon_002.png" alt=""></p>
                                       </td>
                                       <td>
                                          <h1 class="number-counter left">
                                           	<?php
												$value_indicador_2 = get_post_meta($post->ID, 'value_indicador_' . $unidade . '_2', true);
?>
		               					  	<?php
												print_r($value_indicador_2);
?>
                                          </h1>
                                          <p class="text-counter left">
                                          	<?php
												$label_indicador_2 = get_post_meta($post->ID, 'label_indicador_' . $unidade . '_2', true);
?>
		               						<?php
												echo $label_indicador_2;
?>
                                          </p>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <!-- ##### Colaboradores ##### -->
                              <table class="numeros-tabela-widget">
                                 <tr style="margin-left: 10px; display: block;">
                                    <td width="56">
                                       <p class="left"><img src="<?php
												echo esc_url(get_template_directory_uri());
?>/img/icon_003.png" alt=""></p>
                                    </td>
                                    <td>
                                       <h1 class="number-counter left">
                                           	<?php
												$value_indicador_3 = get_post_meta($post->ID, 'value_indicador_' . $unidade . '_3', true);
?>
		               					  	<?php
												print_r($value_indicador_3);
?>
                                       </h1>
                                       <p class="text-counter left">
                                          	<?php
												$label_indicador_3 = get_post_meta($post->ID, 'label_indicador_' . $unidade . '_3', true);
?>
		               						<?php
												echo $label_indicador_3;
?>
                                       </p>
                                    </td>
                                 </tr>
                              </table>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <!-- ##### Procedimentos ##### -->
                              <table class="numeros-tabela-widget">
                                 <tbody>
                                    <tr style="margin-left: 10px; display: block;">
                                       <td width="56">
                                          <p class="left"><img src="<?php
												echo esc_url(get_template_directory_uri());
?>/img/icon_004.png" alt=""></p>
                                       </td>
                                       <td>
                                          <h1 class="number-counter left">
                                           	<?php
												$value_indicador_4 = get_post_meta($post->ID, 'value_indicador_' . $unidade . '_4', true);
?>
		               					  	<?php
												print_r($value_indicador_4);
?>
                                       </h1>
                                       <p class="text-counter left">
                                          	<?php
												$label_indicador_4 = get_post_meta($post->ID, 'label_indicador_' . $unidade . '_4', true);
?>
		               						<?php
												echo $label_indicador_4;
?>
                                       </p>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <!-- ##### Especialidades ##### -->
                              <table class="numeros-tabela-widget">
                                 <tbody>
                                    <tr style="margin-left: 10px; display: block;">
                                       <td width="56">
                                          <p class="left"><img src="<?php
												echo esc_url(get_template_directory_uri());
?>/img/icon_005.png" alt=""></p>
                                       </td>
                                       <td>
                                          <h1 class="number-counter left">
                                           	<?php
												$value_indicador_5 = get_post_meta($post->ID, 'value_indicador_' . $unidade . '_5', true);
?>
		               					  	<?php
												print_r($value_indicador_5);
?>
                                       </h1>
                                       <p class="text-counter left">
                                          	<?php
												$label_indicador_5 = get_post_meta($post->ID, 'label_indicador_' . $unidade . '_5', true);
?>
		               						<?php
												echo $label_indicador_5;
?>
                                       </p>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <!-- horario -->
                              <table class="numeros-tabela-widget">
                                 <tbody>
                                    <tr style="margin-left: 10px; display: block;">
                                       <td width="56" >
                                          <p class="left"><img src="<?php
												echo esc_url(get_template_directory_uri());
?>/img/icon_006.png" alt=""></p>
                                       </td>
                                       <td>
                                       <h1 class="number-counter left">
                                           	<?php
												$value_indicador_6 = get_post_meta($post->ID, 'value_indicador_' . $unidade . '_6', true);
?>
		               					  	<?php
												print_r($value_indicador_6);
?>
                                       </h1>
                                       <p class="text-counter left">
                                          	<?php
												$label_indicador_6 = get_post_meta($post->ID, 'label_indicador_' . $unidade . '_6', true);
?>
		               						<?php
												echo $label_indicador_6;
?>
                                       </p>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
			<tr>
                           <td>
                              <!-- horario -->
                              <table class="numeros-tabela-widget">
                                 <tbody>
                                    <tr style="margin-left: 10px; display: block;">
                                       <p class="text-counter periodo left">
                                          	<?php
												$ano = get_post_meta($post->ID, 'data_acumulado_' . $unidade, true);
?>
		          	<i class="fa fa-info-circle" aria-hidden="true"></i> <?php
												echo "O n&uacute;mero de procedimentos realizados &eacute; o valor acumulado desde $ano.";
?>
                                       </p>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                        <?php
								endwhile;
				endif;
				wp_reset_query();
?>
                     </tbody>
                  </table>
               </div><!-- End our numbers widget -->
		 	<?php
				$content = ob_get_contents();
				ob_end_clean();
				return $content;
}
add_shortcode('indicadores_sidebar', 'indicadores_sidebar_');
// End Shortcode Indicadores Sidebar

// Start Shortcode Missão Visão
function ibgh_mv($atts, $content = null)
{
				$inicio_tab = '<section id="missao-visao">
         			<div class="container">
            	<div class="row">';
				$fim_tab    = '</div>
         			</div>
      			</section>';
				return ($inicio_tab . do_shortcode(wpautop($content)) . $fim_tab);
}
add_shortcode("missao-visao", "ibgh_mv");
function ibgh_missao($atts, $content = null)
{
				extract(shortcode_atts(array(
								'title' => ''
				), $atts));
				$incio_cont = '<div class="col-md-6 bg-middle-blue missao gutter-30">';
				$meio_cont  = '<h2 class="white center">' . $title . '</h2>' . do_shortcode($content);
				$fim_cont   = '</div>';
				return ($incio_cont . $meio_cont . $fim_cont);
}
add_shortcode("missao", "ibgh_missao");
function ibgh_visao($atts, $content = null)
{
				extract(shortcode_atts(array(
								'title' => ''
				), $atts));
				$incio_cont = ' <div class="col-md-6 bg-light-blue visao gutter-30">
                  ';
				$meio_cont  = '<h2 class="white center">' . $title . '</h2>' . do_shortcode($content);
				$fim_cont   = '</div>';
				return ($incio_cont . $meio_cont . $fim_cont);
}
add_shortcode("visao", "ibgh_visao");
// End Shortcode Missão Visão

// Start Shortcode Princípios
function ibgh_principios($atts, $content = null)
{
				$inicio_tab = '<section id="valores" class="bg-green">
					         <div class="container bg-green">
					         <div class="row">
					            <div id="myCarousel" class="carousel slide" data-ride="carousel">
					               <!-- Wrapper for slides -->
					               <div class="carousel-inner" role="listbox">';
				$fim_tab    = '</div>
		               <!-- Left and right controls -->
		               <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		               <i class="fa fa-chevron-left" aria-hidden="true"></i>
		               <span class="sr-only">Previous</span>
		               </a>
		               <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		               <i class="fa fa-chevron-right" aria-hidden="true"></i>
		               <span class="sr-only">Next</span>
		               </a>
		            </div>
		         </div>
		      </section>';
				return ($inicio_tab . do_shortcode($content) . $fim_tab);
}
add_shortcode("principios", "ibgh_principios");
function ibgh_principio($atts, $content = null)
{
				extract(shortcode_atts(array(
								'title' => '',
								'class' => ''
				), $atts));
				$incio_cont = '<div class="item ' . $class . '">';
				$meio_cont  = '<h3 class="white center">' . $title . '</h3>' . wpautop($content);
				$fim_cont   = '</div>';
				return ($incio_cont . $meio_cont . $fim_cont);
}
add_shortcode("principio", "ibgh_principio"); // add_filter( 'the_content', 'shortcode_unautop',100 );
// End Shortcode Princípios

// Start Shortcodes Indicadores Full
function indicadores_ibgh_($atts)
{
				ob_start();
?>

   <section id="numeros-full">

      <div class="container">

         <div class="row gutter-0">

         <?php
				global $post;
				$wp_query = new WP_Query();
				$wp_query->query('post_type=indicadores-ibgh&posts_per_page=1&orderby=title&order=ASC');
				$count = 0;
?>

		 <?php
				if ($wp_query->have_posts()):
								while ($wp_query->have_posts()):
												$wp_query->the_post();
?>
<div class="col-md-2">
               <!-- Leitos -->
               <table class="numeros-tabela numeros-tabela-firt" style="border-left:2px solid #c8c8c8">
                  <tr>
                     <td style="vertical-align: top; width: 52%;">
                        <p class="center" style="margin-top: 25px;"><img src="<?php
												echo get_template_directory_uri();
?>/img/icon_001.png" alt=""></p>
                     </td>
                     <td>
                        <h1 class="number-counter">
                         <?php
												$value_indicador_ibgh_1 = get_post_meta($post->ID, 'value_indicador_ibgh_1', true);
?>
                         <?php
												echo $value_indicador_ibgh_1;
?>
                        </h1>
                        <p class="text-counter">
                         <?php
												$label_indicador_ibgh_1 = get_post_meta($post->ID, 'label_indicador_ibgh_1', true);
?>
                   <?php
												echo $label_indicador_ibgh_1;
?>
                        </p>
                     </td>
                  </tr>
               </table>
            </div>
            <div class="col-md-2">
               <!-- Centros cirurgicos -->
               <table class="numeros-tabela">
                  <tr>
                     <td style="vertical-align: top; width: 50%;">
                        <p class="center" style="margin-top: 28px;"><img src="<?php
												echo get_template_directory_uri();
?>/img/icon_002.png" alt=""></p>
                     </td>
                     <td>
                        <h1 class="number-counter">
                         <?php
												$value_indicador_ibgh_2 = get_post_meta($post->ID, 'value_indicador_ibgh_2', true);
?>
                         <?php
												echo $value_indicador_ibgh_2;
?>
                        </h1>
                        <p class="text-counter">
                         <?php
												$label_indicador_ibgh_2 = get_post_meta($post->ID, 'label_indicador_ibgh_2', true);
?>
                   <?php
												echo $label_indicador_ibgh_2;
?>
                        </p>
                     </td>
                  </tr>
               </table>
            </div>
            <div class="col-md-2">
               <!-- Centros colaboradores -->
               <table class="numeros-tabela">
                  <tr>
                     <td style="vertical-align: top; width: 39%;">
                        <p class="center" style="margin-top: 29px;"><img src="<?php
												echo get_template_directory_uri();
?>/img/icon_003.png" alt=""></p>
                     </td>
                     <td>
                        <h1 class="number-counter">
                         <?php
												$value_indicador_ibgh_3 = get_post_meta($post->ID, 'value_indicador_ibgh_3', true);
?>
                         <?php
												echo $value_indicador_ibgh_3;
?>
                        </h1>
                        <p class="text-counter">
                         <?php
												$label_indicador_ibgh_3 = get_post_meta($post->ID, 'label_indicador_ibgh_3', true);
?>
                   <?php
												echo $label_indicador_ibgh_3;
?>
                        </p>
                     </td>
                  </tr>
               </table>
            </div>
            <div class="col-md-2">
               <!-- procedimentos -->
               <table class="numeros-tabela">
                  <tr>
                     <td style="vertical-align: top; width: 37%;">
                        <p class="center" style="margin-top: 31px;"><img src="<?php
												echo get_template_directory_uri();
?>/img/icon_004.png" alt=""></p>
                     </td>
                     <td>
                        <h1 class="number-counter">
                         <?php
												$value_indicador_ibgh_4 = get_post_meta($post->ID, 'value_indicador_ibgh_4', true);
?>
                         <?php
												echo $value_indicador_ibgh_4;
?>
                        </h1>
                        <p class="text-counter">
                         <?php
												$label_indicador_ibgh_4 = get_post_meta($post->ID, 'label_indicador_ibgh_4', true);
?>
                   <?php
												echo $label_indicador_ibgh_4;
?>
                        </p>
                     </td>
                  </tr>
               </table>
            </div>
            <!-- especialidades -->
            <div class="col-md-2">
               <table class="numeros-tabela">
                  <tr>
                     <td style="vertical-align: top; width: 38%;">
                        <p class="center" style="margin-top: 35px;"><img src="<?php
												echo get_template_directory_uri();
?>/img/icon_005.png" alt=""></p>
                     </td>
                     <td>
                        <h1 class="number-counter">
                         <?php
												$value_indicador_ibgh_5 = get_post_meta($post->ID, 'value_indicador_ibgh_5', true);
?>
                         <?php
												echo $value_indicador_ibgh_5;
?>
                        </h1>
                        <p class="text-counter">
                         <?php
												$label_indicador_ibgh_5 = get_post_meta($post->ID, 'label_indicador_ibgh_5', true);
?>
                   <?php
												echo $label_indicador_ibgh_5;
?>
                        </p>
                     </td>
                  </tr>
               </table>
            </div>
            <div class="col-md-2">
               <!-- horario -->
               <table class="numeros-tabela">
                  <tr>
                     <td style="vertical-align: top; width: 37%;">
                        <p class="center" style="margin-top: 28px;"><img src="<?php
												echo get_template_directory_uri();
?>/img/icon_006.png" alt=""></p>
                     </td>
                     <td>
                        <h1 class="number-counter">
                         <?php
												$value_indicador_ibgh_6 = get_post_meta($post->ID, 'value_indicador_ibgh_6', true);
?>
                         <?php
												echo $value_indicador_ibgh_6;
?>
                        </h1>
                        <p class="text-counter">
                         <?php
												$label_indicador_ibgh_6 = get_post_meta($post->ID, 'label_indicador_ibgh_6', true);
?>
                   <?php
												echo $label_indicador_ibgh_6;
?>
                  </p>
                     </td>
                  </tr>
               </table>
            </div>
            <?php
								endwhile;
				endif;
?>
         </div>
      </div>
   </section>
		  		 	<?php
				$content = ob_get_contents();
				ob_end_clean();
				return $content;
}
add_shortcode('indicadores_ibgh', 'indicadores_ibgh_');
// End Shortcode Indicadores full

// Start Script add meta box button upload
add_action('admin_head', 'my_meta_uploader_script');
/*
 * O novo media uploader, baseado no post e nas discussões do site abaixo
 * http://www.webmaster-source.com/2010/01/08/using-the-wordpress-uploader-in-your-plugin-or-theme/
 */
function my_meta_uploader_script()
{
?>
			<script type="text/javascript">
				jQuery(document).ready(function() {

					var formfield;
					var header_clicked = false;

					jQuery( '#upload_image_button' ).click( function() {
						formfield = jQuery( '#upload_image' ).attr( 'name' );
						tb_show( '', 'media-upload.php?TB_iframe=true' );
						header_clicked = true;

						return false;
					});

					// Guarda o uploader original
					window.original_send_to_editor = window.send_to_editor;

					// Sobrescreve a função nativa e preenche o campo com a URL
					window.send_to_editor = function( html ) {
						if ( header_clicked ) {
							fileurl = jQuery( html ).attr( 'href' );
							jQuery( '#upload_image' ).val( fileurl );
							header_clicked = false;
							tb_remove();
						}
						else
						{
					  		window.original_send_to_editor( html );
					  	}
					}

				});
		  </script>
		<?php
}
function my_admin_scripts()
{
				wp_enqueue_script('media-upload');
				wp_enqueue_script('thickbox');
				//wp_register_script('my-upload', get_bloginfo('template_url') . '/functions/my-script.js', array('jquery','media-upload','thickbox'));
				wp_enqueue_script('my_meta_uploader_script');
}
function my_admin_styles()
{
				wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');
// End Script add meta box button upload

// Start Excerpt
function the_excerpt_lenght($before = '', $after = '', $echo = true, $length = false)
{
				$excerpt = get_the_excerpt();
				if ($length && is_numeric($length)) {
								$excerpt = substr($excerpt, 0, $length);
				}
				if (strlen($excerpt) > 0) {
								$excerpt = apply_filters('the_excerpt_lenght', $before . $excerpt . $after, $before, $after);
								if ($echo)
												echo $excerpt;
								else
												return $excerpt;
				}
}

// ========== Start Customize wp-login Page

// Start Customize wp-login Page
function login_styles() { ?>
 <style type="text/css">
 body {
     background: #f1f1f1 !important;

 }
 #wp-submit {
     border: none !important;
     box-shadow: none !important;
     background: #21b9eb !important;
     text-shadow: none !important;
     border-radius: 4px !important;
     -webkit-border-radius: 4px !important;
     color: #fff !important;
     display: block;
     width: 100% !important;
     margin: 30px 0 0 0 !important;
     font-size: 16px;
     padding: 5px 0 !important;
     height: auto !important;
     transition: all 0.5s;
 }
 #wp-submit:hover {
     background: #009ee4 !important;
 }
 .login h1 a {
     background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/ibgh-logo-login.png') !important;
     background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/ibgh-logo-login.png') !important;
     background-size: 100% !important;
     background-position: center center !important;
     background-repeat: no-repeat;
     height: 90px !important;
     width: 320px !important;
 }
 </style>
<?php }

add_action('login_enqueue_scripts', 'login_styles', 10);

// URL Logo Login
function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

// Change Alt Attribute
function my_login_logo_url_title() {
    return 'IBGH - Instituto Brasileiro de Gestão Hospitalar.';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
// End Customize wp-login Page
?>
