<?php
/**

* @package WordPress
* @subpackage IBGH
* @since IBGH 1.0
*/

/** Adiciona funções UNIDADES **/
require_once 'functions/hma.php';
require_once 'functions/heelj.php';
require_once 'functions/upa-macapa.php';
require_once 'functions/upa-araguaina.php';

/** Configuração MENU **/
require_once 'functions/menu.php';

// habilita o tema para gerar feed
add_theme_support('automatic-feed-links');

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
add_filter('wp_nav_menu_items', 'add_search_box_to_menu', 10, 2);
function add_search_box_to_menu($items, $args)
{
if ($args->theme_location == 'menu_topo_ibgh')
				return $items . "<li class='menu-header-search'><a href='https://www.facebook.com/ibgh.os/?fref=ts' target='_blank'><span class='fa fa-facebook'></span></a></li><li class='menu-item menu-item-type-custom menu-item-object-custom menu-item-31'><form role='search' method='get' class='search-form' action='" . esc_url(home_url('/')) . "'><div class='box box-header'>  <div class='container-2'><span class='icon'><i class='fa fa-search'></i></span><input type='search' id='search' placeholder='pesquisar...' value='" . get_search_query() . "' name='s' /></div></div></form></li>";
return $items;
}

// Enable the use of shortcodes in text widgets.
add_filter('widget_text', 'do_shortcode');

// Shortecode backface HOME IBGH
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
//FIM SHORTCODE BACKFACE HOME IBGH
// INÍCIO CUSTOM POST DIRETORIA E CONSELHO
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
/*Filtro per modificare il permalink*/
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
// FIM CUSTOM POST DIRETORIA E CONSELHO
// INÍCIO CUSTOM POST UNIDADES
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
/* Filtro modifica permalink */
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
// FIM CUSTOM POST UNIDADES
// INICIO SHORTCODE CARROUSEL MEMBROS E CONSELHO IBGH HOME
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
//FIM SHORTCODE CARROUSEL MEMBROS E CONSELHO IBGH HOME
/* INÍCIO SIDEBAR FOOTER IBGH */
register_sidebar(array(
	'name' => 'IBGH Footer Sidebar 1',
	'id' => 'ibgh-footer-sidebar-1',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'IBGH Footer Sidebar 2',
	'id' => 'ibgh-footer-sidebar-2',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'IBGH Footer Sidebar 3',
	'id' => 'ibgh-footer-sidebar-3',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'IBGH Footer Sidebar 4',
	'id' => 'ibgh-footer-sidebar-4',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
/* FIM SIDEBAR FOOTER IBHG */
/* INICIO WIDGETS DIVERSOS */
register_sidebar(array(
	'name' => 'Blog IBGH',
	'id' => 'blog-ibgh',
	'description' => '',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'Eventos e Treinamentos HEELJ',
	'id' => 'eventos-treinamentos-heelj',
	'description' => '',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'Eventos e Treinamentos IBGH',
	'id' => 'eventos-treinamentos-ibgh',
	'description' => '',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'Eventos e Treinamentos HMA',
	'id' => 'eventos-treinamentos-hma',
	'description' => '',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'Sala de Imprensa',
	'id' => 'sala-impresa',
	'description' => '',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
/* INICIO WIDGETS DIVERSOS */
//INICIO SHORTCODE UNIDADES IBGH FOOTER
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
//FIM SHORTCODE UNIDADES IBGH FOOTER
// INÍCIO CUSTOM POST INDICADORES
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
	add_meta_box("indicador_heelj", "Indicadores HEELJ", "indicador_heelj", "indicadores-ibgh", "normal", "low");
	add_meta_box("indicador_hma", "Indicadores HMA", "indicador_hma", "indicadores-ibgh", "normal", "low");
	add_meta_box("indicador_upa_a", "Indicadores UPA ARAGUAINA", "indicador_upa_a", "indicadores-ibgh", "normal", "low");
	add_meta_box("indicador_upa_macapa", "Indicadores UPA MACAPA", "indicador_upa_macapa", "indicadores-ibgh", "normal", "low");
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
function indicador_heelj() {
	global $post;
	$custom                  = get_post_meta($post->ID);
	$label_indicador_heelj_1 = $custom["label_indicador_heelj_1"][0];
	$value_indicador_heelj_1 = $custom["value_indicador_heelj_1"][0];
	$label_indicador_heelj_2 = $custom["label_indicador_heelj_2"][0];
	$value_indicador_heelj_2 = $custom["value_indicador_heelj_2"][0];
	$label_indicador_heelj_3 = $custom["label_indicador_heelj_3"][0];
	$value_indicador_heelj_3 = $custom["value_indicador_heelj_3"][0];
	$label_indicador_heelj_4 = $custom["label_indicador_heelj_4"][0];
	$value_indicador_heelj_4 = $custom["value_indicador_heelj_4"][0];
	$label_indicador_heelj_5 = $custom["label_indicador_heelj_5"][0];
	$value_indicador_heelj_5 = $custom["value_indicador_heelj_5"][0];
	$label_indicador_heelj_6 = $custom["label_indicador_heelj_6"][0];
	$value_indicador_heelj_6 = $custom["value_indicador_heelj_6"][0];
	$data_acumulado_heelj    = $custom["data_acumulado_heelj"][0];
	$frase_heelj             = $custom["frase_heelj"][0];
?>

	<label>Informe o label HEELJ 1</label>
	<input type="text" name="label_indicador_heelj_1" value="<?php echo $label_indicador_heelj_1;
?>" />
	<label>Informe o conteúdo HEELJ 1</label>
	<input type="text" name="value_indicador_heelj_1" value="<?php echo $value_indicador_heelj_1;
?>" />
	<br />
	<label>Informe o label HEELJ 2</label>
	<input type="text" name="label_indicador_heelj_2" value="<?php echo $label_indicador_heelj_2;
?>" />
	<label>Informe o conteúdo HEELJ 2</label>
	<input type="text" name="value_indicador_heelj_2" value="<?php echo $value_indicador_heelj_2;
?>" />
	<br />
	<label>Informe o label HEELJ 3</label>
	<input type="text" name="label_indicador_heelj_3" value="<?php echo $label_indicador_heelj_3;
?>" />
	<label>Informe o conteúdo HEELJ 3</label>
	<input type="text" name="value_indicador_heelj_3" value="<?php echo $value_indicador_heelj_3;
?>" />
	<br />
	<label>Informe o label HEELJ 4</label>
	<input type="text" name="label_indicador_heelj_4" value="<?php echo $label_indicador_heelj_4;
?>" />
	<label>Informe o conteúdo HEELJ 4</label>
	<input type="text" name="value_indicador_heelj_4" value="<?php echo $value_indicador_heelj_4;
?>" />
	<br />
	<label>Informe o label HEELJ 5</label>
	<input type="text" name="label_indicador_heelj_5" value="<?php echo $label_indicador_heelj_5;
?>" />
	<label>Informe o conteúdo HEELJ 5</label>
	<input type="text" name="value_indicador_heelj_5" value="<?php echo $value_indicador_heelj_5;
?>" />
	<br />
	<label>Informe o label HEELJ 6</label>
	<input type="text" name="label_indicador_heelj_6" value="<?php echo $label_indicador_heelj_6;
?>" />
	<label>Informe o conteúdo HEELJ 6</label>
	<input type="text" name="value_indicador_heelj_6" value="<?php echo $value_indicador_heelj_6;
?>" />
	<br /><br />
	<label>Informe o período acumulado</label>
	<input type="text" name="data_acumulado_heelj" value="<?php echo $data_acumulado_heelj;
?>" />
	<br />
	<label>Informe o frase principal</label>
	<input type="text" name="frase_heelj" value="<?php echo $frase_heelj;
?>" />
					<?php
}
function indicador_hma()
{
	global $post;
	$custom                = get_post_meta($post->ID);
	$label_indicador_hma_1 = $custom["label_indicador_hma_1"][0];
	$value_indicador_hma_1 = $custom["value_indicador_hma_1"][0];
	$label_indicador_hma_2 = $custom["label_indicador_hma_2"][0];
	$value_indicador_hma_2 = $custom["value_indicador_hma_2"][0];
	$label_indicador_hma_3 = $custom["label_indicador_hma_3"][0];
	$value_indicador_hma_3 = $custom["value_indicador_hma_3"][0];
	$label_indicador_hma_4 = $custom["label_indicador_hma_4"][0];
	$value_indicador_hma_4 = $custom["value_indicador_hma_4"][0];
	$label_indicador_hma_5 = $custom["label_indicador_hma_5"][0];
	$value_indicador_hma_5 = $custom["value_indicador_hma_5"][0];
	$label_indicador_hma_6 = $custom["label_indicador_hma_6"][0];
	$value_indicador_hma_6 = $custom["value_indicador_hma_6"][0];
	$data_acumulado_hma    = $custom["data_acumulado_hma"][0];
	$frase_hma             = $custom["frase_hma"][0];
?>
	<label>Informe o label HMA 1</label>
	<input type="text" name="label_indicador_hma_1" value="<?php echo $label_indicador_hma_1;
?>" />
	<label>Informe o conteúdo HMA 1</label>
	<input type="text" name="value_indicador_hma_1" value="<?php echo $value_indicador_hma_1;
?>" />
	<br />
	<label>Informe o label HMA 2</label>
	<input type="text" name="label_indicador_hma_2" value="<?php echo $label_indicador_hma_2;
?>" />
	<label>Informe o conteúdo HMA 2</label>
	<input type="text" name="value_indicador_hma_2" value="<?php echo $value_indicador_hma_2;
?>" />
	<br />
	<label>Informe o label HMA 3</label>
	<input type="text" name="label_indicador_hma_3" value="<?php echo $label_indicador_hma_3;
?>" />
	<label>Informe o conteúdo HMA 3</label>
	<input type="text" name="value_indicador_hma_3" value="<?php echo $value_indicador_hma_3;
?>" />
	<br />
	<label>Informe o label HMA 4</label>
	<input type="text" name="label_indicador_hma_4" value="<?php echo $label_indicador_hma_4;
?>" />
	<label>Informe o conteúdo HMA 4</label>
	<input type="text" name="value_indicador_hma_4" value="<?php echo $value_indicador_hma_4;
?>" />
	<br />
	<label>Informe o label HMA 5</label>
	<input type="text" name="label_indicador_hma_5" value="<?php echo $label_indicador_hma_5;
?>" />
	<label>Informe o conteúdo HMA 5</label>
	<input type="text" name="value_indicador_hma_5" value="<?php echo $value_indicador_hma_5;
?>" />
	<br />
	<label>Informe o label HMA 6</label>
	<input type="text" name="label_indicador_hma_6" value="<?php echo $label_indicador_hma_6;
?>" />
	<label>Informe o conteúdo HMA 6</label>
	<input type="text" name="value_indicador_hma_6" value="<?php echo $value_indicador_hma_6;
?>" />
	<br /><br />
	<label>Informe o período acumulado</label>
	<input type="text" name="data_acumulado_hma" value="<?php echo $data_acumulado_hma;
?>" />
	<br />
	<label>Informe o frase principal</label>
	<input type="text" name="frase_hma" value="<?php echo $frase_hma;
?>" />
	<?php
}
function indicador_upa_a() {
	global $post;
	$custom                  = get_post_meta($post->ID);
	$label_indicador_upa_a_1 = $custom["label_indicador_upa_a_1"][0];
	$value_indicador_upa_a_1 = $custom["value_indicador_upa_a_1"][0];
	$label_indicador_upa_a_2 = $custom["label_indicador_upa_a_2"][0];
	$value_indicador_upa_a_2 = $custom["value_indicador_upa_a_2"][0];
	$label_indicador_upa_a_3 = $custom["label_indicador_upa_a_3"][0];
	$value_indicador_upa_a_3 = $custom["value_indicador_upa_a_3"][0];
	$label_indicador_upa_a_4 = $custom["label_indicador_upa_a_4"][0];
	$value_indicador_upa_a_4 = $custom["value_indicador_upa_a_4"][0];
	$label_indicador_upa_a_5 = $custom["label_indicador_upa_a_5"][0];
	$value_indicador_upa_a_5 = $custom["value_indicador_upa_a_5"][0];
	$label_indicador_upa_a_6 = $custom["label_indicador_upa_a_6"][0];
	$value_indicador_upa_a_6 = $custom["value_indicador_upa_a_6"][0];
	$data_acumulado_upa_a    = $custom["data_acumulado_upa_a"][0];
	$frase_upa_a             = $custom["frase_upa_a"][0];
?>
	<label>Informe o label UPA ARAGUAINA 1</label>
	<input type="text" name="label_indicador_upa_a_1" value="<?php echo $label_indicador_upa_a_1;
?>" />
	<label>Informe o conteúdo UPA ARAGUAINA 1</label>
	<input type="text" name="value_indicador_upa_a_1" value="<?php echo $value_indicador_upa_a_1;
?>" />
	<br />
	<label>Informe o label UPA ARAGUAINA 2</label>
	<input type="text" name="label_indicador_upa_a_2" value="<?php echo $label_indicador_upa_a_2;
?>" />
	<label>Informe o conteúdo UPA ARAGUAINA 2</label>
	<input type="text" name="value_indicador_upa_a_2" value="<?php echo $value_indicador_upa_a_2;
?>" />
	<br />
	<label>Informe o label UPA ARAGUAINA 3</label>
	<input type="text" name="label_indicador_upa_a_3" value="<?php echo $label_indicador_upa_a_3;
?>" />
	<label>Informe o conteúdo UPA ARAGUAINA 3</label>
	<input type="text" name="value_indicador_upa_a_3" value="<?php echo $value_indicador_upa_a_3;
?>" />
	<br />
	<label>Informe o label UPA ARAGUAINA 4</label>
	<input type="text" name="label_indicador_upa_a_4" value="<?php echo $label_indicador_upa_a_4;
?>" />
	<label>Informe o conteúdo UPA ARAGUAINA 4</label>
	<input type="text" name="value_indicador_upa_a_4" value="<?php echo $value_indicador_upa_a_4;
?>" />
	<br />
	<label>Informe o label UPA ARAGUAINA 5</label>
	<input type="text" name="label_indicador_upa_a_5" value="<?php echo $label_indicador_upa_a_5;
?>" />
	<label>Informe o conteúdo UPA ARAGUAINA 5</label>
	<input type="text" name="value_indicador_upa_a_5" value="<?php echo $value_indicador_upa_a_5;
?>" />
	<br />
	<label>Informe o label UPA ARAGUAINA 6</label>
	<input type="text" name="label_indicador_upa_a_6" value="<?php echo $label_indicador_upa_a_6;
?>" />
	<label>Informe o conteúdo UPA ARAGUAINA 6</label>
	<input type="text" name="value_indicador_upa_a_6" value="<?php echo $value_indicador_upa_a_6;
?>" />
	<br /><br />
	<label>Informe o período acumulado</label>
	<input type="text" name="data_acumulado_upa_a" value="<?php echo $data_acumulado_upa_a;
?>" />
	<br />
	<label>Informe a frase principal</label>
	<input type="text" name="frase_upa_a" value="<?php echo $frase_upa_a;
?>" />
	<?php
}
function indicador_upa_macapa()
{
	global $post;
	$custom                  = get_post_meta($post->ID);
	$label_indicador_upa_macapa_1 = $custom["label_indicador_upa_macapa_1"][0];
	$value_indicador_upa_macapa_1 = $custom["value_indicador_upa_macapa_1"][0];
	$label_indicador_upa_macapa_2 = $custom["label_indicador_upa_macapa_2"][0];
	$value_indicador_upa_macapa_2 = $custom["value_indicador_upa_macapa_2"][0];
	$label_indicador_upa_macapa_3 = $custom["label_indicador_upa_macapa_3"][0];
	$value_indicador_upa_macapa_3 = $custom["value_indicador_upa_macapa_3"][0];
	$label_indicador_upa_macapa_4 = $custom["label_indicador_upa_macapa_4"][0];
	$value_indicador_upa_macapa_4 = $custom["value_indicador_upa_macapa_4"][0];
	$label_indicador_upa_macapa_5 = $custom["label_indicador_upa_macapa_5"][0];
	$value_indicador_upa_macapa_5 = $custom["value_indicador_upa_macapa_5"][0];
	$label_indicador_upa_macapa_6 = $custom["label_indicador_upa_macapa_6"][0];
	$value_indicador_upa_macapa_6 = $custom["value_indicador_upa_macapa_6"][0];
	$data_acumulado_upa_macapa    = $custom["data_acumulado_upa_macapa"][0];
	$frase_upa_a             = $custom["frase_upa_macapa"][0];
?>
	<label>Informe o label UPA MACAPA 1</label>
	<input type="text" name="label_indicador_upa_macapa_1" value="<?php echo $label_indicador_upa_macapa_1;
?>" />
	<label>Informe o conteúdo UPA MACAPA 1</label>
	<input type="text" name="value_indicador_upa_macapa_1" value="<?php echo $value_indicador_upa_macapa_1;
?>" />
	<br />
	<label>Informe o label UPA MACAPA 2</label>
	<input type="text" name="label_indicador_upa_macapa_2" value="<?php echo $label_indicador_upa_macapa_2;
?>" />
	<label>Informe o conteúdo UPA MACAPA 2</label>
	<input type="text" name="value_indicador_upa_macapa_2" value="<?php echo $value_indicador_upa_macapa_2;
?>" />
	<br />
	<label>Informe o label UPA MACAPA 3</label>
	<input type="text" name="label_indicador_upa_macapa_3" value="<?php echo $label_indicador_upa_macapa_3;
?>" />
	<label>Informe o conteúdo UPA MACAPA 3</label>
	<input type="text" name="value_indicador_upa_macapa_3" value="<?php echo $value_indicador_upa_macapa_3;
?>" />
	<br />
	<label>Informe o label UPA MACAPA 4</label>
	<input type="text" name="label_indicador_upa_macapa_4" value="<?php echo $label_indicador_upa_macapa_4;
?>" />
	<label>Informe o conteúdo UPA MACAPA 4</label>
	<input type="text" name="value_indicador_upa_macapa_4" value="<?php echo $value_indicador_upa_macapa_4;
?>" />
	<br />
	<label>Informe o label UPA MACAPA 5</label>
	<input type="text" name="label_indicador_upa_macapa_5" value="<?php echo $label_indicador_upa_macapa_5;
?>" />
	<label>Informe o conteúdo UPA MACAPA 5</label>
	<input type="text" name="value_indicador_upa_macapa_5" value="<?php echo $value_indicador_upa_macapa_5;
?>" />
	<br />
	<label>Informe o label UPA MACAPA 6</label>
	<input type="text" name="label_indicador_upa_macapa_6" value="<?php echo $label_indicador_upa_macapa_6;
?>" />
	<label>Informe o conteúdo UPA MACAPA 6</label>
	<input type="text" name="value_indicador_upa_macapa_6" value="<?php echo $value_indicador_upa_macapa_6;
?>" />
	<br /><br />
	<label>Informe o período acumulado</label>
	<input type="text" name="data_acumulado_upa_macapa" value="<?php echo $data_acumulado_upa_macapa;
?>" />
	<br />
	<label>Informe a frase principal</label>
	<input type="text" name="frase_upa_macapa" value="<?php echo $frase_upa_a;
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
	update_post_meta($post->ID, "label_indicador_heelj_1", $_POST["label_indicador_heelj_1"]);
	update_post_meta($post->ID, "value_indicador_heelj_1", $_POST["value_indicador_heelj_1"]);
	update_post_meta($post->ID, "label_indicador_heelj_2", $_POST["label_indicador_heelj_2"]);
	update_post_meta($post->ID, "value_indicador_heelj_2", $_POST["value_indicador_heelj_2"]);
	update_post_meta($post->ID, "label_indicador_heelj_3", $_POST["label_indicador_heelj_3"]);
	update_post_meta($post->ID, "value_indicador_heelj_3", $_POST["value_indicador_heelj_3"]);
	update_post_meta($post->ID, "label_indicador_heelj_4", $_POST["label_indicador_heelj_4"]);
	update_post_meta($post->ID, "value_indicador_heelj_4", $_POST["value_indicador_heelj_4"]);
	update_post_meta($post->ID, "label_indicador_heelj_5", $_POST["label_indicador_heelj_5"]);
	update_post_meta($post->ID, "value_indicador_heelj_5", $_POST["value_indicador_heelj_5"]);
	update_post_meta($post->ID, "label_indicador_heelj_6", $_POST["label_indicador_heelj_6"]);
	update_post_meta($post->ID, "value_indicador_heelj_6", $_POST["value_indicador_heelj_6"]);
	update_post_meta($post->ID, "data_acumulado_heelj", $_POST["data_acumulado_heelj"]);
	update_post_meta($post->ID, "frase_heelj", $_POST["frase_heelj"]);
	update_post_meta($post->ID, "label_indicador_hma_1", $_POST["label_indicador_hma_1"]);
	update_post_meta($post->ID, "value_indicador_hma_1", $_POST["value_indicador_hma_1"]);
	update_post_meta($post->ID, "label_indicador_hma_2", $_POST["label_indicador_hma_2"]);
	update_post_meta($post->ID, "value_indicador_hma_2", $_POST["value_indicador_hma_2"]);
	update_post_meta($post->ID, "label_indicador_hma_3", $_POST["label_indicador_hma_3"]);
	update_post_meta($post->ID, "value_indicador_hma_3", $_POST["value_indicador_hma_3"]);
	update_post_meta($post->ID, "label_indicador_hma_4", $_POST["label_indicador_hma_4"]);
	update_post_meta($post->ID, "value_indicador_hma_4", $_POST["value_indicador_hma_4"]);
	update_post_meta($post->ID, "label_indicador_hma_5", $_POST["label_indicador_hma_5"]);
	update_post_meta($post->ID, "value_indicador_hma_5", $_POST["value_indicador_hma_5"]);
	update_post_meta($post->ID, "label_indicador_hma_6", $_POST["label_indicador_hma_6"]);
	update_post_meta($post->ID, "value_indicador_hma_6", $_POST["value_indicador_hma_6"]);
	update_post_meta($post->ID, "data_acumulado_hma", $_POST["data_acumulado_hma"]);
	update_post_meta($post->ID, "frase_hma", $_POST["frase_hma"]);
	update_post_meta($post->ID, "label_indicador_upa_a_1", $_POST["label_indicador_upa_a_1"]);
	update_post_meta($post->ID, "value_indicador_upa_a_1", $_POST["value_indicador_upa_a_1"]);
	update_post_meta($post->ID, "label_indicador_upa_a_2", $_POST["label_indicador_upa_a_2"]);
	update_post_meta($post->ID, "value_indicador_upa_a_2", $_POST["value_indicador_upa_a_2"]);
	update_post_meta($post->ID, "label_indicador_upa_a_3", $_POST["label_indicador_upa_a_3"]);
	update_post_meta($post->ID, "value_indicador_upa_a_3", $_POST["value_indicador_upa_a_3"]);
	update_post_meta($post->ID, "label_indicador_upa_a_4", $_POST["label_indicador_upa_a_4"]);
	update_post_meta($post->ID, "value_indicador_upa_a_4", $_POST["value_indicador_upa_a_4"]);
	update_post_meta($post->ID, "label_indicador_upa_a_5", $_POST["label_indicador_upa_a_5"]);
	update_post_meta($post->ID, "value_indicador_upa_a_5", $_POST["value_indicador_upa_a_5"]);
	update_post_meta($post->ID, "label_indicador_upa_a_6", $_POST["label_indicador_upa_a_6"]);
	update_post_meta($post->ID, "value_indicador_upa_a_6", $_POST["value_indicador_upa_a_6"]);
	update_post_meta($post->ID, "data_acumulado_upa_a", $_POST["data_acumulado_upa_a"]);
	update_post_meta($post->ID, "frase_upa_a", $_POST["frase_upa_a"]);
	update_post_meta($post->ID, "label_indicador_upa_macapa__1", $_POST["label_indicador_upa_macapa__1"]);
	update_post_meta($post->ID, "value_indicador_upa_macapa__1", $_POST["value_indicador_upa_macapa__1"]);
	update_post_meta($post->ID, "label_indicador_upa_macapa__2", $_POST["label_indicador_upa_macapa__2"]);
	update_post_meta($post->ID, "value_indicador_upa_macapa__2", $_POST["value_indicador_upa_macapa__2"]);
	update_post_meta($post->ID, "label_indicador_upa_macapa__3", $_POST["label_indicador_upa_macapa__3"]);
	update_post_meta($post->ID, "value_indicador_upa_macapa__3", $_POST["value_indicador_upa_macapa__3"]);
	update_post_meta($post->ID, "label_indicador_upa_macapa__4", $_POST["label_indicador_upa_macapa__4"]);
	update_post_meta($post->ID, "value_indicador_upa_macapa__4", $_POST["value_indicador_upa_macapa__4"]);
	update_post_meta($post->ID, "label_indicador_upa_macapa__5", $_POST["label_indicador_upa_macapa__5"]);
	update_post_meta($post->ID, "value_indicador_upa_macapa__5", $_POST["value_indicador_upa_macapa__5"]);
	update_post_meta($post->ID, "label_indicador_upa_macapa__6", $_POST["label_indicador_upa_macapa__6"]);
	update_post_meta($post->ID, "value_indicador_upa_macapa__6", $_POST["value_indicador_upa_macapa__6"]);
	update_post_meta($post->ID, "data_acumulado_upa_macapa", $_POST["data_acumulado_upa_macapa"]);
	update_post_meta($post->ID, "frase_upa_macapa", $_POST["frase_upa_macapa"]);
}
// FIM CUSTOM POST INDICADORES

// INÍCIO CUSTOM POST TRANSPARÊNCIA
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
/* Filtro para modificar permalink */
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
// FIM CUSTOM POST TRANSPARÊNCIA
// INICIO SCRIPT PARA BOTÃO UPLOAD EM ADD META BOX
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
// INICIO SCRIPT PARA BOTÃO UPLOAD EM ADD META BOX

/* PAGINAÇÃO */
require_once('wp_bootstrap_pagination.php');

// INICIO BREADCRUMBS WORDPRESS
function wp_custom_breadcrumbs()
{
				$showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
				$delimiter   = '>'; // delimiter between crumbs
				$home        = 'Voc&ecirc; est&aacute; em'; // text for the 'Home' link
				$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
				$before      = '<span class="current">'; // tag before the current crumb
				$after       = '</span>'; // tag after the current crumb
				global $post;
				$homeLink = get_bloginfo('url');
				if (is_home() || is_front_page()) {
								if ($showOnHome == 1)
												echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
				} else {
								echo '<div id="crumbs">' . $home . ' ';
								if (is_category()) {
												$thisCat = get_category(get_query_var('cat'), false);
												if ($thisCat->parent != 0)
																echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
												echo $before . 'categoria "' . single_cat_title('', false) . '"' . $after;
								} elseif (is_search()) {
												echo $before . 'Resultados encontrados para "' . get_search_query() . '"' . $after;
								} elseif (is_day()) {
												echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
												echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
												echo $before . get_the_time('d') . $after;
								} elseif (is_month()) {
												echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
												echo $before . get_the_time('F') . $after;
								} elseif (is_year()) {
												echo $before . get_the_time('Y') . $after;
								} elseif (is_single() && !is_attachment()) {
												if (get_post_type() != 'post') {
																$post_type = get_post_type_object(get_post_type());
																$slug      = $post_type->rewrite;
																echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
																if ($showCurrent == 1)
																				echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
												} else {
																$cat  = get_the_category();
																$cat  = $cat[0];
																$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
																if ($showCurrent == 0)
																				$cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
																echo $cats;
																if ($showCurrent == 1)
																				echo $before . get_the_title() . $after;
												}
								} elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
												$post_type = get_post_type_object(get_post_type());
												echo $before . $post_type->labels->singular_name . $after;
								} elseif (is_attachment()) {
												$parent = get_post($post->post_parent);
												$cat    = get_the_category($parent->ID);
												$cat    = $cat[0];
												echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
												echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
												if ($showCurrent == 1)
																echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
								} elseif (is_page() && !$post->post_parent) {
												if ($showCurrent == 1)
																echo $before . get_the_title() . $after;
								} elseif (is_page() && $post->post_parent) {
												$parent_id   = $post->post_parent;
												$breadcrumbs = array();
												while ($parent_id) {
																$page          = get_page($parent_id);
																$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
																$parent_id     = $page->post_parent;
												}
												$breadcrumbs = array_reverse($breadcrumbs);
												for ($i = 0; $i < count($breadcrumbs); $i++) {
																echo $breadcrumbs[$i];
																if ($i != count($breadcrumbs) - 1)
																				echo ' ' . $delimiter . ' ';
												}
												if ($showCurrent == 1)
																echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
								} elseif (is_tag()) {
												echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
								} elseif (is_author()) {
												global $author;
												$userdata = get_userdata($author);
												echo $before . 'Articles posted by ' . $userdata->display_name . $after;
								} elseif (is_404()) {
												echo $before . 'Error 404' . $after;
								}
								if (get_query_var('paged')) {
												if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
																echo ' (';
												echo __('Page') . ' ' . get_query_var('paged');
												if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
																echo ')';
								}
								echo '</div>';
				}
}
// FIM BREADCRUMBS WORDPRESS
//INICIO SHORTCODE PESQUISA SIDEBAR
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
//FIM SHORTCODE PESQUISA SIDEBAR
//INICIO SHORTCODE INDICADORES SIDEBAR
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
//FIM SHORTCODE INDICADORES SIDEBAR
// INICIO Shortcode MISSÃO E VISÃO
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
// FIM Shortcode MISSÃO E VISÃO
// INICIO SHORTCODE PRINCIPIOS
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
add_shortcode("principio", "ibgh_principio");
//add_filter( 'the_content', 'shortcode_unautop',100 );
// FIM SHORTCODE PRINCIPIOS
//INICIO SHORTCODE INDICADORES SIDEBAR
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
//FIM SHORTCODE INDICADORES SIDEBAR
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
// INÍCIO CUSTOM POST TRABALHE
add_action('init', 'trabalhe_register');
function trabalhe_register()
{
				$product_permalink = 'trabalhe/%Unidades%/';
				$labels            = array(
								'name' => __('Editais', 'Tipo de post para incluir os cursos da escola.'),
								'singular_name' => __('Editais', 'post type singular name'),
								'all_items' => __('Todos editais'),
								'add_new' => _x('Novo edital', 'Novo edital'),
								'add_new_item' => __('Add novo item ao edital'),
								'edit_item' => __('Editar edital'),
								'new_item' => __('Novo edital Item'),
								'view_item' => __('Ver item do edital'),
								'search_items' => __('Procurar edital'),
								'not_found' => __('Nenhum edital encontrado'),
								'not_found_in_trash' => __('Nenhum edital encontrado na lixeira'),
								'parent_item_colon' => ''
				);
				$args              = array(
								'labels' => $labels,
								'public' => true,
								'publicly_queryable' => true,
								'show_ui' => true,
								'query_var' => true,
								'menu_icon' => 'dashicons-calendar',
								'rewrite' => array(
												'slug' => 'trabalhe/%Unidades%',
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
												'editor',
												'excerpt',
												'tags'
								)
				);
				register_post_type('trabalhe', $args);
				flush_rewrite_rules();
}
register_taxonomy("Unidades", array(
				"trabalhe"
), array(
				"hierarchical" => true,
				"label" => "Unidades",
				"singular_label" => "edital",
				"rewrite" => array(
								'slug' => 'edital'
				),
				"public" => true,
				"show_ui" => true,
				"_builtin" => true
));
/*Filtro per modificare il permalink*/
add_filter('post_link', 'editais_permalink', 1, 3);
add_filter('post_type_link', 'editais_permalink', 1, 3);
function editais_permalink($permalink, $post_id, $leavename)
{
				//con %brand% catturo il rewrite del Custom Post Type
				if (strpos($permalink, '%Unidades%') === FALSE)
								return $permalink;
				// Get post
				$post = get_post($post_id);
				if (!$post)
								return $permalink;
				// Get taxonomy terms
				$terms = wp_get_object_terms($post->ID, 'Unidades');
				if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
								$taxonomy_slug = $terms[0]->slug;
				else
								$taxonomy_slug = 'no-brand';
				return str_replace('%Unidades%', $taxonomy_slug, $permalink);
}
add_action("admin_init", "campos_personalizados_trabalhe");
function campos_personalizados_trabalhe()
{
				add_meta_box("periodo_edital", "período do edital", "periodo_edital", "trabalhe", "normal", "low");
				add_meta_box("disponibilidade_trabalhe", "Informe a disponibilidade do edital", "disponibilidade_trabalhe", "trabalhe", "normal", "low");
				add_meta_box("link_inscricao", "Informe o shortcode do formulario de inscri&ccedil;&atilde;o", "link_inscricao", "trabalhe", "normal", "low");
				add_meta_box(WYSIWYG_META_BOX_ID_DATA, __('Cargos e Sal&aacute;rios', 'wysiwyg'), 'cargos_salarios', 'trabalhe', "normal", "low");
				add_meta_box(WYSIWYG_META_BOX_ID_CARGA, __('Prazos', 'wysiwyg'), 'carga_horaria_trabalhe', 'trabalhe', "normal", "low");
				add_meta_box(WYSIWYG_META_BOX_ID_INVESTIMENTO, __('Convoca&ccedil;&otilde;es', 'wysiwyg'), 'investimento_trabalhe', 'trabalhe', "normal", "low");
}
function periodo_edital()
{
				global $post;
				$custom      = get_post_meta($post->ID);
				$data_inicio = $custom["data_inicio"][0];
				$data_fim    = $custom["data_fim"][0];
?>
  <label>Informe a data in&iacute;cio:</label>
  <input type="date" name="data_inicio" value="<?php
				echo $data_inicio;
?>" />

  <label>Informe a data fim:</label>
  <input type="date" name="data_fim" value="<?php
				echo $data_fim;
?>" />
  <?php
}
function disponibilidade_trabalhe()
{
				global $post;
				$custom         = get_post_custom($post->ID);
				$disponiblidade = $custom["btn-green-fill"][0];
				$indisponivel   = $custom["btn-grey-fill"][0];
?>
		<input type="radio" name="btn-green-fill" value="1" <?php
				if ($disponiblidade == '1')
								echo "checked=1";
?>>Dispon&iacute;vel
		<input type="radio" name="btn-green-fill" value="2" <?php
				if ($disponiblidade == '2')
								echo "checked=2";
?>>Indisponivel

	<?php
}
function data_detalhada()
{
				global $post;
				$content = get_post_meta($post->ID, 'data_detalhada', true);
				wp_editor(htmlspecialchars_decode($content), 'data_detalhada', array(
								"media_buttons" => true,
								"editor_height" => 30
				));
}
function link_inscricao()
{
				global $post;
				$custom         = get_post_meta($post->ID);
				$link_inscricao = $custom["link_inscricao"][0];
?>
  <p><label>Informe o link:</label><br />
  <input type="text" name="link_inscricao" value='<?php
				echo $link_inscricao;
?>' /></p>
<?php
}
function cargos_salarios()
{
				global $post;
				$content = get_post_meta($post->ID, 'cargos_salarios', true);
				wp_editor(htmlspecialchars_decode($content), 'cargos_salarios', array(
								"media_buttons" => true,
								"editor_height" => 30
				));
}
function carga_horaria_trabalhe()
{
				global $post;
				$content = get_post_meta($post->ID, 'carga_horaria_trabalhe', true);
				wp_editor(htmlspecialchars_decode($content), 'carga_horaria_trabalhe', array(
								"media_buttons" => true,
								"editor_height" => 30
				));
}
function investimento_trabalhe()
{
				global $post;
				$content = get_post_meta($post->ID, 'investimento_trabalhe', true);
				wp_editor(htmlspecialchars_decode($content), 'investimento_trabalhe', array(
								"media_buttons" => true,
								"editor_height" => 30
				));
}
add_action('save_post_trabalhe', 'save_details_post_trabalhe');
function save_details_post_trabalhe()
{
				global $post;
				update_post_meta($post->ID, "data_inicio", $_POST["data_inicio"]);
				update_post_meta($post->ID, "data_fim", $_POST["data_fim"]);
				if (!empty($_POST['data_detalhada'])) {
								$data = htmlspecialchars($_POST['data_detalhada']);
								update_post_meta($post->ID, 'data_detalhada', $data);
				}
				update_post_meta($post->ID, "btn-green-fill", $_POST["btn-green-fill"]);
				update_post_meta($post->ID, "link_inscricao", $_POST["link_inscricao"]);
				if (!empty($_POST['cargos_salarios'])) {
								$cargos_salarios = htmlspecialchars($_POST['cargos_salarios']);
								update_post_meta($post->ID, 'cargos_salarios', $cargos_salarios);
				}
				if (!empty($_POST['carga_horaria_trabalhe'])) {
								$data_carga_horaria_trabalhe = htmlspecialchars($_POST['carga_horaria_trabalhe']);
								update_post_meta($post->ID, 'carga_horaria_trabalhe', $data_carga_horaria_trabalhe);
				}
				if (!empty($_POST['investimento_trabalhe'])) {
								$data_investimento_trabalhe = htmlspecialchars($_POST['investimento_trabalhe']);
								update_post_meta($post->ID, 'investimento_trabalhe', $data_investimento_trabalhe);
				}
				update_post_meta($post->ID, "upload_banner_trabalhe", $_POST["upload_banner_trabalhe"]);
}
add_filter("manage_edit-trabalhe_columns", "trabalhe_edit_columns");
function trabalhe_edit_columns($columns)
{
				$columns = array(
								"cb" => "<input type=\"checkbox\" />",
								"title" => "Edital",
								"unidade" => "Unidade",
								"periodo_edital" => "período"
				);
				return $columns;
}
add_action("manage_posts_custom_column", "trabalhe_custom_columns");
function trabalhe_custom_columns($column)
{
				global $post;
				switch ($column) {
								case "title":
												the_title();
												break;
								case "unidade":
												echo get_the_term_list($post->ID, 'Unidades', '', ', ', '');
												break;
								case "periodo_edital":
												$custom      = get_post_meta($post->ID);
												$data_inicio = $custom["data_inicio"][0];
												$data_fim    = $custom["data_fim"][0];
												echo date('d/m/Y', strtotime($data_inicio));
												echo " a ";
												echo date('d/m/Y', strtotime($data_fim));
												break;
				}
}
// FIM CUSTOM POST TRABALHE

// INÍCIO CUSTOM CORPO CLINICO UPA
add_action('init', 'corpo_clinico_upa_register');
function corpo_clinico_upa_register()
{
				$labels = array(
								'name' => __('Corpo Cl&iacute;nico UPA', 'Tipo de post para incluir os profissionais do UPA.'),
								'singular_name' => __('Corpo Cl&iacute;nico', 'post type singular name'),
								'all_items' => __('Todos profissionais'),
								'add_new' => _x('Novo profissional', 'Novo profissional'),
								'add_new_item' => __('Add novo item'),
								'edit_item' => __('Editar profissional'),
								'new_item' => __('Novo profissional Item'),
								'view_item' => __('Ver item do profissional'),
								'search_items' => __('Procurar profissional'),
								'not_found' => __('Nenhum profissional encontrado'),
								'not_found_in_trash' => __('Nenhum profissional encontrado na lixeira'),
								'parent_item_colon' => ''
				);
				$args   = array(
								'labels' => $labels,
								'public' => true,
								'publicly_queryable' => true,
								'show_ui' => true,
								'query_var' => true,
								'menu_icon' => 'dashicons-admin-users',
								'capability_type' => 'post',
								'hierarchical' => false,
								'menu_position' => 6,
								'taxonomies' => array(
												'post_tag'
								),
								'supports' => array(
												'title',
												'thumbnail',
												'tags'
								)
				);
				register_post_type('corpo_clinico_upa', $args);
				flush_rewrite_rules();
}
register_taxonomy("Especialidades UPA", array(
				"corpo_clinico_upa"
), array(
				"hierarchical" => true,
				"label" => "Especialidades UPA",
				"singular_label" => "edital",
				"rewrite" => array(
								'slug' => 'edital'
				),
				"public" => true,
				"show_ui" => true,
				"_builtin" => true
));
add_action("admin_init", "campos_personalizados_corpo_clinico_upa");
function campos_personalizados_corpo_clinico_upa()
{
				add_meta_box("corpo_crm_upa", "Informe o CRM", "corpo_crm_upa", "corpo_clinico_upa", "normal", "low");
}
function corpo_crm_upa()
{
				global $post;
				$custom        = get_post_meta($post->ID);
				$corpo_crm_upa = $custom["corpo_crm_upa"][0];
?>
  <input type="text" name="corpo_crm_upa" value='<?php
				echo $corpo_crm_upa;
?>' /></p>
<?php
}
add_action('save_post_corpo_clinico_upa', 'save_details_post_corpo_clinico_upa');
function save_details_post_corpo_clinico_upa()
{
				global $post;
				update_post_meta($post->ID, "corpo_crm_upa", $_POST["corpo_crm_upa"]);
}
// FIM CUSTOM CORPO CLINICO UPA
