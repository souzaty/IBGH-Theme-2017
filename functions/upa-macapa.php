<?php
/* Unidade FUNÇÕES UNIDADE UPA MACAPA */

/**
 * @package WordPress
 * @subpackage IBGH
 * @since IBGH 1.3
 */
 
add_filter('wp_nav_menu_items', 'add_search_box_to_menu_upa_macapa', 10, 2);
function add_search_box_to_menu_upa_macapa($items, $args) {
	if ($args->theme_location == 'menu_topo_upa_macapa')
		return $items . "<li class='menu-header-search navbar-custom-hospital clearColor'><a href='https://www.facebook.com/ibgh.os/?fref=ts' target='_blank'><span class='fa fa-facebook'></span></a></li><li class='menu-item menu-item-type-custom menu-item-object-custom menu-item-31 navbar-custom-hospital clearColor'><form role='search' method='get' class='search-form' action='" . esc_url(home_url('/')) . "'><div class='box box-header navbar-custom-hospital clearColor'>  <div class='container-2'><span class='icon'><i class='fa fa-search'></i></span><input class='navbar-custom-hospital clearColor' type='search' id='search' placeholder='pesquisar...' value='" . get_search_query() . "' name='s' /></div></div></form></li>";
	return $items;
}
/* WIDGETS MENU TOPO */
register_sidebar(array(
	'name' => 'Menu topo UPA MACAPA 1',
	'id' => 'ibgh-menu-topo-upa-macapa-1',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'Menu topo UPA MACAPA 2',
	'id' => 'ibgh-menu-topo-upa-macapa-2',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'Menu topo UPA MACAPA 3',
	'id' => 'ibgh-menu-topo-upa-macapa-3',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
/* WIDGETS FOOTER */
register_sidebar(array(
	'name' => 'UPA MACAPA Footer Sidebar 1',
	'id' => 'upa-macapa-footer-sidebar-1',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'UPA MACAPA Footer Sidebar 2',
	'id' => 'upa-macapa-footer-sidebar-2',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'UPA MACAPA Footer Sidebar 3',
	'id' => 'upa-macapa-footer-sidebar-3',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'UPA MACAPA Footer Sidebar 4',
	'id' => 'upa-macapa-footer-sidebar-4',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
/* FIM WIDGETS */
/* SIDEBAR UPA */
register_sidebar(array(
	'name' => 'Eventos e Treinamentos UPA MACAPA',
	'id' => 'eventos-treinamentos-upa-macapa',
	'description' => '',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
/* FIM SIDEBAR */
//SHORTCODE INDICADORES UPA MACAPA
function indicadores_upa_macapa_short($atts)
{
ob_start();
?>
<section id="numeros-upa" class="ghost">
	<div class="container gutter-0">
		<div class="row">
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
			<div class="col-md-6"></div>
			<div class="col-md-6">
				<p style="font-style: italic; font-size: 1.2em;">Nossos n&uacute;meros
				</p>
				<h2>
					<?php $frase_upa_macapa = get_post_meta($post->ID, 'frase_upa_macapa', true); ?>
					<?php echo $frase_upa_macapa; ?>
				</h2>
			</div>
		</div>
		<div class="row counter-area" style="padding-top: 20px;">
			<div class="col-md-6"></div>
			<!-- Leitos -->
			<div class="col-md-2 margin-right margin-bottom bloco-indicadores">
				<div class="col-md-4">
					<p class="right">
						<img src="<?php echo esc_url(get_template_directory_uri());
								?>/img/icon_001.png" alt="">
					</p>
				</div>
				<div class="col-md-8 gutter-0">
					<h1 class="number-counter">
						<?php $value_indicador_upa_macapa_1 = get_post_meta($post->ID, 'value_indicador_upa_macapa_1', true); ?>
						<?php echo $value_indicador_upa_macapa_1; ?>
					</h1>
					<p class="text-counter">
						<?php $label_indicador_upa_macapa_1 = get_post_meta($post->ID, 'label_indicador_upa_macapa_1', true); ?>
						<?php echo $label_indicador_upa_macapa_1; ?>
					</p>
				</div>
			</div>
			<!-- Centros cirurgicos -->
			<div class="col-md-2 margin-right margin-bottom bloco-indicadores">
				<div class="col-md-4">
					<p class="right">
						<img src="<?php echo esc_url(get_template_directory_uri());
								?>/img/icon_002.png" alt="">
					</p>
				</div>
				<div class="col-md-8">
					<h1 class="number-counter">
						<?php $value_indicador_upa_macapa_2 = get_post_meta($post->ID, 'value_indicador_upa_macapa_2', true); ?>
						<?php echo $value_indicador_upa_macapa_2; ?>
					</h1>
					<p class="text-counter">
						<?php $label_indicador_upa_macapa_2 = get_post_meta($post->ID, 'label_indicador_upa_macapa_2', true); ?>
						<?php echo $label_indicador_upa_macapa_2; ?>
					</p>
				</div>
			</div>
			<!-- Centros colaboradores -->
			<div class="col-md-2 margin-bottom bloco-indicadores">
				<div class="col-md-4">
					<p class="right">
						<img src="<?php echo esc_url(get_template_directory_uri());
								?>/img/icon_003.png" alt="">
					</p>
				</div>
				<div class="col-md-8">
					<h1 class="number-counter">
						<?php $value_indicador_upa_macapa_3 = get_post_meta($post->ID, 'value_indicador_upa_macapa_3', true); ?>
						<?php echo $value_indicador_upa_macapa_3; ?>
					</h1>
					<p class="text-counter">
						<?php $label_indicador_upa_macapa_3 = get_post_meta($post->ID, 'label_indicador_upa_macapa_3', true); ?>
						<?php echo $label_indicador_upa_macapa_3; ?>
					</p>
				</div>
			</div>
		</div>
		<div class="row counter-area">
			<div class="col-md-6"></div>
			<!-- Procedimentos -->
			<div class="col-md-2 margin-right bloco-indicadores">
				<div class="col-md-4">
					<p class="right">
						<img src="<?php echo esc_url(get_template_directory_uri());
								?>/img/icon_004.png" alt="">
					</p>
				</div>
				<div class="col-md-8">
					<h1 class="number-counter">
						<?php $value_indicador_upa_macapa_4 = get_post_meta($post->ID, 'value_indicador_upa_macapa_4', true); ?>
						<?php echo $value_indicador_upa_macapa_4; ?>
					</h1>
					<p class="text-counter">
						<?php $label_indicador_upa_macapa_4 = get_post_meta($post->ID, 'label_indicador_upa_macapa_4', true); ?>
						<?php echo $label_indicador_upa_macapa_4; ?>
					</p>
				</div>
			</div>
			<!-- Especialidades -->
			<div class="col-md-2 margin-right bloco-indicadores">
				<div class="col-md-4">
					<p class="right">
						<img src="<?php echo esc_url(get_template_directory_uri());
								?>/img/icon_005.png" alt="">
					</p>
				</div>
				<div class="col-md-8">
					<h1 class="number-counter">
						<?php $value_indicador_upa_macapa_5 = get_post_meta($post->ID, 'value_indicador_upa_macapa_5', true); ?>
						<?php echo $value_indicador_upa_macapa_5; ?>
					</h1>
					<p class="text-counter">
						<?php $label_indicador_upa_macapa_5 = get_post_meta($post->ID, 'label_indicador_upa_macapa_5', true); ?>
						<?php echo $label_indicador_upa_macapa_5; ?>
					</p>
				</div>
			</div>
			<!-- Horario -->
			<div class="col-md-2 bloco-indicadores">
				<div class="col-md-4">
					<p class="right">
						<img src="<?php echo esc_url(get_template_directory_uri());
								?>/img/icon_006.png" alt="">
					</p>
				</div>
				<div class="col-md-8">
					<h1 class="number-counter">
						<?php $value_indicador_upa_macapa_6 = get_post_meta($post->ID, 'value_indicador_upa_macapa_6', true); ?>
						<?php echo $value_indicador_upa_macapa_6; ?>
					</h1>
					<p class="text-counter">
						<?php $label_indicador_upa_macapa_6 = get_post_meta($post->ID, 'label_indicador_upa_macapa_6', true); ?>
						<?php echo $label_indicador_upa_macapa_6; ?>
					</p>
				</div>
			</div>
		</div>
		<?php
			endwhile;
			endif;
			?>
	</div>
	<div class="row" style="padding-bottom: 20px;">
		<div class="col-md-6"></div>
		<div class="col-md-6">
			<?php $data_acumulado_upa_macapa = get_post_meta($post->ID, 'data_acumulado_upa_macapa', true); ?>
			<p style="font-style: italic; font-size: 1em;">
				<span class="glyphicon glyphicon-info-sign"></span> O n&uacute;mero de procedimentos realizados &eacute; o valor acumulado desde <?php echo $data_acumulado_upa_macapa; ?>
			</p>
		</div>
	</div>
</section>
<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
	}
	add_shortcode('indicadores_upa_macapa', 'indicadores_upa_macapa_short');
//FIM SHORTCODE INDICADORES
//INICIO SHORTCODE NOTICIAS HOME
	function noticias_home_upa_macapa_short($atts)
	{
	ob_start();
	?>
<section id="noticias">
	<div class="container">
		<div class="row">
			<?php
				global $post;
				$wp_query = new WP_Query();
				$wp_query->query('post_type=post&category_name=upa+macapa&posts_per_page=3&orderby=date&order=DESC');
				$count = 0;
				?>
			<?php
				if ($wp_query->have_posts()):
				while ($wp_query->have_posts()):
				$wp_query->the_post();
				?>
			<div class="col-md-4">
				<a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('noticias-home-macapa'); ?></a>
				<div class="borda-meio">
					<p class="category-news center upa-em-acao"><span>UPA em A&ccedil;&atilde;o</span></p>
				</div>
				<h2 class="title-news"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="resume-news"><?php the_excerpt(); ?></p>
				<a href="<?php echo get_permalink();
					?>"><button type="button" class="btn btn-default btn-blue" aria-label="Left Align">Leia mais</button></a>
			</div>
			<?php
				endwhile;
				endif;
				wp_reset_query();
				?>
		</div>
	</div>
</section>
<?php
$content = ob_get_contents();
ob_end_clean();
return $content;
}
add_shortcode('noticias_home_upa_macapa', 'noticias_home_upa_macapa_short');
//FIM SHORTCODE NOTICIAS
