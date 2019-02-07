<?php
    /* Unidade FUNÇÕES UNIDADE HEELJ */

/**
 * @package WordPress
 * @subpackage IBGH
 * @since IBGH 1.3
 */

add_filter('wp_nav_menu_items', 'add_search_box_to_menu_heelj', 10, 2);
function add_search_box_to_menu_heelj($items, $args) {
	if ($args->theme_location == 'menu_topo_heelj')
		return $items . "<li class='menu-header-search navbar-custom-hospital clearColor'><a href='https://www.facebook.com/ibgh.os/?fref=ts' target='_blank'><span class='fa fa-facebook'></span></a></li><li class='menu-item menu-item-type-custom menu-item-object-custom menu-item-31 navbar-custom-hospital clearColor'><form role='search' method='get' class='search-form' action='" . esc_url(home_url('/')) . "'><div class='box box-header navbar-custom-hospital clearColor'>  <div class='container-2'><span class='icon'><i class='fa fa-search'></i></span><input class='navbar-custom-hospital clearColor' type='search' id='search' placeholder='pesquisar...' value='" . get_search_query() . "' name='s' /></div></div></form></li>";
	return $items;
}
/* WIDGETS MENU TOPO */
register_sidebar(array(
	'name' => 'Menu topo HEELJ 1',
	'id' => 'ibgh-menu-topo-heelj-1',
	'description' => 'Appears in menu area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'Menu topo HEELJ 2',
	'id' => 'ibgh-menu-topo-heelj-2',
	'description' => 'Appears in menu area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'Menu topo HEELJ 3',
	'id' => 'ibgh-menu-topo-heelj-3',
	'description' => 'Appears in menu area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
/* WIDGETS FOOTER */
register_sidebar(array(
	'name' => 'HEELJ Footer Sidebar 1',
	'id' => 'heelj-footer-sidebar-1',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'HEELJ Footer Sidebar 2',
	'id' => 'heelj-footer-sidebar-2',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'HEELJ Footer Sidebar 3',
	'id' => 'heelj-footer-sidebar-3',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => 'HEELJ Footer Sidebar 4',
	'id' => 'heelj-footer-sidebar-4',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
));
/* FIM WIDGETS */
//INICIO SHORTCODE NOTICIAS HOME
function noticias_home_heelj_short($atts) { ob_start(); ?>
<section id="noticias">
	<div class="container">
		<div class="row">
			<?php
				global $post;
				$wp_query = new WP_Query();
				$wp_query->query('post_type=post&cat=18heelj&posts_per_page=3&orderby=date&order=DESC');
				$count = 0;
			?>
			<?php
				if ($wp_query->have_posts()):
				while ($wp_query->have_posts()):
				$wp_query->the_post();
			?>
  			<div class="col-md-4">
				<a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('noticias-home-heelj'); ?></a>
				<div class="borda-meio">
					<p class="category-news center"><span>HEELJ em A&ccedil;&atilde;o</span></p>
				</div>
				<h2 class="title-news"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="resume-news"><?php the_excerpt_lenght('', '', 'true', 140); ?></p>
					<a href="<?php echo get_permalink();
					?>">
						<button type="button" class="btn btn-default btn-blue" aria-label="Left Align">Leia mais</button>
					</a>
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
add_shortcode('noticias_home_heelj', 'noticias_home_heelj_short');
//FIM SHORTCODE NOTICIAS
//INICIO SHORTCODE CONTATO SIDEBAR
function contato_sidebar_short($atts, $content = null) { $inicio =
	'<section id="destaque-heelj" style="background:transparent;">
	<div class="gutter-0">
		<div class="text-square-heelj">';
			$fim    = '
		</div>
	</div>
	</section>';
	return ($inicio . do_shortcode($content) . $fim);
}
add_shortcode('contato_sidebar', 'contato_sidebar_short');
function contato_sidebar_mapa_short($atts, $content = null) {
	extract(shortcode_atts(array(
		'class' => '',
		'title' => '',
		'link' => ''
		), $atts));
		$incio_cont =
		'<div class="col-md-12 tel-destaque">
            <div class="box">
            	<a href="' . $link . '"><span class="' . $class . '"></span>
            		<p class="text-box"><b>' . $title . '</b><br />'; $fim_cont   = '</p>
            	</a>
            </div>
        </div>';
        return ($incio_cont . $content . $fim_cont);
}
add_shortcode("contato_sidebar_mapa", "contato_sidebar_mapa_short");
function contato_sidebar_telefone_short($atts, $content = null) {
	extract(shortcode_atts(array(
		'class' => '',
		'title' => '',
		'link' => ''
		), $atts));
		$incio_cont =
		'<div class="col-md-12 local-destaque">
			<div class="box">
				<a href="' . $link . '"><span class="' . $class . '"></span>
					<p class="text-box"><b>' . $title . '</b><br />'; $fim_cont   = '</p>
				</a>
            </div>
        </div>';
		return ($incio_cont . $content . $fim_cont);
}
add_shortcode("contato_sidebar_telefone", "contato_sidebar_telefone_short");
function contato_sidebar_atendimento_short($atts, $content = null)
{
extract(shortcode_atts(array(
		'class' => '',
		'title' => '',
		'link' => ''
		), $atts));
		$incio_cont =
		'<div class="col-md-12 atendimento-destaque">
			<div class="box">
				<a href="' . $link . '"><span class="' . $class . '"></span>
					<p class="text-box"><b>' . $title . '</b><br />'; $fim_cont   = '</p>
				</a>
            </div>
        </div>';
        return ($incio_cont . $content . $fim_cont);
}
add_shortcode("contato_sidebar_atendimento", "contato_sidebar_atendimento_short");
//FIM SHORTCODE CONTATO SIDEBAR HEELJ
// INÍCIO CUSTOM CORPO CLINICO HEELJ
add_action('init', 'corpo_clinico_heelj_register');
function corpo_clinico_heelj_register()
{
				$labels = array(
								'name' => __('Corpo Cl&iacute;nico HEELJ', 'Tipo de post para incluir os profissionais do HEELJ.'),
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
				register_post_type('corpo_clinico_heelj', $args);
				flush_rewrite_rules();
}
register_taxonomy("Especialidades", array(
				"corpo_clinico_heelj"
), array(
				"hierarchical" => true,
				"label" => "Especialidades",
				"singular_label" => "edital",
				"rewrite" => array(
								'slug' => 'edital'
				),
				"public" => true,
				"show_ui" => true,
				"_builtin" => true
));
add_action("admin_init", "campos_personalizados_corpo_clinico_heelj");
function campos_personalizados_corpo_clinico_heelj()
{
				add_meta_box("corpo_crm", "Informe o CRM", "corpo_crm", "corpo_clinico_heelj", "normal", "low");
}
function corpo_crm()
{
				global $post;
				$custom    = get_post_meta($post->ID);
				$corpo_crm = $custom["corpo_crm"][0];
?>
  <input type="text" name="corpo_crm" value='<?php
				echo $corpo_crm;
?>' /></p>
<?php
}
add_action('save_post_corpo_clinico_heelj', 'save_details_post_corpo_clinico_heelj');
function save_details_post_corpo_clinico_heelj()
{
				global $post;
				update_post_meta($post->ID, "corpo_crm", $_POST["corpo_crm"]);
}
// FIM CUSTOM CORPO CLINICO HEELJ
//INICIO SHORTCODE CONTATO HOME HEELJ
function contato_home_short($atts, $content = null) {
	$inicio =
	'<section id="destaque-heelj">
		<div class="">
			<div class="row text-square-heelj">';
				$fim    =
			'</div>
		</div>
	</section>';
	return ($inicio . do_shortcode($content) . $fim);
}
add_shortcode('contato_home', 'contato_home_short');
function contato_home_mapa_short($atts, $content = null) {
	extract(shortcode_atts(array(
		'class' => '',
		'title' => '',
		'link' => ''
		), $atts));
		$incio_cont =
		'<div class="col-md-4 tel-destaque">
			<div class="box">
				<a href="' . $link . '"><span class="' . $class . '"></span>
					<p class="text-box"><b>' . $title . '</b><br />';
					$fim_cont   = '</p>
				</a>
			</div>
		</div>';
		return ($incio_cont . $content . $fim_cont);
}
add_shortcode("contato_home_mapa", "contato_home_mapa_short");
function contato_home_telefone_short($atts, $content = null) {
	extract(shortcode_atts(array(
		'class' => '',
		'title' => '',
		'link' => ''
		), $atts));
		$incio_cont =
			'<div class="col-md-4 local-destaque">
				<div class="box">
					<a href="' . $link . '"><span class="' . $class . '"></span>
						<p class="text-box"><b>' . $title . '</b><br />';
						$fim_cont   = '</p>
					</a>
               </div>
            </div>';
            return ($incio_cont . $content . $fim_cont);
}
add_shortcode("contato_home_telefone", "contato_home_telefone_short");
function contato_home_atendimento_short($atts, $content = null) {
	extract(shortcode_atts(array(
		'class' => '',
		'title' => '',
		'link' => ''
		), $atts));
		$incio_cont =
			'<div class="col-md-4 atendimento-destaque">
				<div class="box">
					<a href="' . $link . '"><span class="' . $class . '"></span>
						<p class="text-box"><b>' . $title . '</b><br />';
						$fim_cont   = '</p>
					</a>
				</div>
			</div>';
			return ($incio_cont . $content . $fim_cont);
}
add_shortcode("contato_home_atendimento", "contato_home_atendimento_short");
//FIM SHORTCODE CONTATO HOME HEELJ
// INÍCIO CUSTOM POST SERVIÇOS HEELJ
add_action('init', 'servicos_heelj');
function servicos_heelj() {
	$labels = array(
		'name' => __('Servi&ccedil;os HEELJ', 'Tipo de post para incluir os servi&ccedil;os do HEELJ.'),
		'singular_name' => __('Servi&ccedil;os HEELJ', 'post type singular name'),
		'all_items' => __('Todos os servi&ccedil;os'),
		'add_new' => _x('Novo servi&ccedil;o', 'Novo servi&ccedil;o'),
		'add_new_item' => __('Add novo servi&ccedil;o'),
		'edit_item' => __('Editar servi&ccedil;o'),
		'new_item' => __('Novo Servi&ccedil;o Item'),
		'view_item' => __('Ver item do servi&ccedil;o'),
		'search_items' => __('Procurar servi&ccedil;o'),
		'not_found' => __('Nenhum servi&ccedil;o encontrado'),
		'not_found_in_trash' => __('Nenhum servi&ccedil;o encontrado na lixeira'),
		'parent_item_colon' => ''
	);
	$args   = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-admin-generic',
		'rewrite' => array(
			'slug' => 'servicos%',
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
			'revisions'
		)
	);
	register_post_type('servicos-heelj', $args);
	flush_rewrite_rules();
}
add_action("admin_init", "campos_personalizados_servicos_heelj");
function campos_personalizados_servicos_heelj() {
	add_meta_box("botao_servico_heelj", "Informe label para o bot&atilde;o", "botao_servico_heelj", "servicos-heelj", "normal", "low");
	add_meta_box("link_botao_servico_heelj", "Informe o link para o bot&atilde;o", "link_botao_servico_heelj", "servicos-heelj", "normal", "low");
	add_meta_box("info_servico_heelj", "Informe o texto de informa&ccedil;&atilde;o", "info_servico_heelj", "servicos-heelj", "normal", "low");
	add_meta_box("link_info_servico_heelj", "Informe o link para que leva a informa&ccedil;&atilde;o", "link_info_servico_heelj", "servicos-heelj", "normal", "low");
}
function botao_servico_heelj() {
	global $post;
	$custom              = get_post_meta($post->ID);
	$botao_servico_heelj = $custom["botao_servico_heelj"][0];
?>
	<input type="text" name="botao_servico_heelj" value="<?php echo $botao_servico_heelj;
	?>" />
	<?php
}
function link_botao_servico_heelj() {
	global $post;
	$custom                   = get_post_meta($post->ID);
	$link_botao_servico_heelj = $custom["link_botao_servico_heelj"][0];
?>
	<input type="text" name="link_botao_servico_heelj" value="<?php echo $link_botao_servico_heelj;
	?>" />
	<?php
}
function info_servico_heelj()
{
	global $post;
	$custom             = get_post_meta($post->ID);
	$info_servico_heelj = $custom["info_servico_heelj"][0];
?>
	<input type="text" name="info_servico_heelj" value="<?php echo $info_servico_heelj;
	?>" />
	<?php
}
function link_info_servico_heelj()
{
	global $post;
	$custom                  = get_post_meta($post->ID);
	$link_info_servico_heelj = $custom["link_info_servico_heelj"][0];
?>
	<input type="text" name="link_info_servico_heelj" value="<?php echo $link_info_servico_heelj;
?>" />
	<?php
}
add_action('save_post_servicos-heelj', 'save_details_post_servicos_heelj');
function save_details_post_servicos_heelj()
{
	global $post;
	update_post_meta($post->ID, "botao_servico_heelj", $_POST["botao_servico_heelj"]);
	update_post_meta($post->ID, "link_botao_servico_heelj", $_POST["link_botao_servico_heelj"]);
	update_post_meta($post->ID, "info_servico_heelj", $_POST["info_servico_heelj"]);
	update_post_meta($post->ID, "link_info_servico_heelj", $_POST["link_info_servico_heelj"]);
}
// FIM CUSTOM POST SERVIÇOS HEELJ
//INICIO SHORTCODE SERVIÇOS HEELJ
function servicos_heelj_short($atts) {
	ob_start();
?>
<!-- Section serviços -->
<section id="services">
	<div class="container">
		<div class="row gutter-0">
			<div class="col-md-3 gutter-0">
				<ul class="nav nav-pills nav-stacked">
					<?php
						global $post;
						$wp_query = new WP_Query();
						$wp_query->query('post_type=servicos-heelj&posts_per_page=-1&orderby=title&order=ASC');
						$count = 0;
					?>
				 	<?php
						if ($wp_query->have_posts()):
							while ($wp_query->have_posts()):
							$wp_query->the_post();
							$count++;
					?>
					<li class="<?php
						if ($count == 1) {
							echo active;
						} else {
						}
					?>">
						<a data-toggle="tab" href="#tab<?php echo $count;
						?>" aria-expanded="true"><?php the_title();
						?></a>
					</li>
		            <?php
		            	endwhile;
	            		endif;
					?>
		        </ul>
		    </div>
			<div class="col-md-9 gutter-0">
				<div class="tab-content">
					<?php
						global $post;
						$wp_query = new WP_Query();
						$wp_query->query('post_type=servicos-heelj&posts_per_page=-1&orderby=title&order=ASC');
						$count = 0;
					?>
					<?php
						if ($wp_query->have_posts()):
							while ($wp_query->have_posts()):
								$wp_query->the_post();
								$count++;
					?>
<!-- #### Conteúdo Urgência e Emergência #### -->
					<div id="tab<?php echo $count;
						?>" class="tab-pane fade <?php
						if ($count == 1) {
							echo "active in";
						} else {
						}
					?>">
						<div class="row box-title gutter-0">
							<div class="col-md-2">
								<p class="text-center"><?php
								if (has_post_thumbnail()) {
									the_post_thumbnail('membros-diretoria', array(
										'class' => '',
										'title' => 'Servicos'
									));
								}
								?>
							</div>
							<div class="col-md-10">
								<h3 style="color:#0072a4"><?php the_title(); ?></h3>
							</div>
						</div>
						<div class="row box-content">
							<div class="col-md-12">
								<p><?php the_excerpt(); ?></p>
							</div>
							<div class="col-md-3">
								<?php $link_botao_servico_heelj = get_post_meta($post->ID, 'link_botao_servico_heelj', true); ?>
									<a href="<?php echo $link_botao_servico_heelj;
								?>" >
									<button type="button" class="btn btn-default btn-blue" aria-label="Left Align">
										<?php $botao_servico_heelj = get_post_meta($post->ID, 'botao_servico_heelj', true);
										?>
										<?php echo $botao_servico_heelj;
										?>
									</button></a>
							</div>
							<div class="col-md-9">
								<p style="margin-top:25px; text-decoration: underline; color: #c6c6c6; font-size: 14px; margin-left: 20px;">
									<?php $link_info_servico_heelj = get_post_meta($post->ID, 'link_info_servico_heelj', true);
									?>
								<span class="glyphicon glyphicon-info-sign"></span>
									<?php $info_servico_heelj = get_post_meta($post->ID, 'info_servico_heelj', true);
									?>
									<?php echo $info_servico_heelj;
									?>
								</p>
							</div>
						</div>
					</div>
					<?php
						endwhile;
						endif;
					?><!-- Fim Emergencia -->
				</div>
			</div>
		</div>
	</div>
</section>
		<?php
				$content = ob_get_contents();
				ob_end_clean();
				return $content;
}
add_shortcode('servicos_heelj', 'servicos_heelj_short');
//FIM SHORTCODE SERVIÇOS HEELJ
//INICIO SHORTCODE INDICADORES HEELJ
function indicadores_heelj_short($atts) {
	ob_start();
?>
<section id="numeros-hospital">
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
			<p style="font-style: italic; font-size: 1.2em;">Nossos n&uacute;meros</p>
				<h2><?php $frase_heelj = get_post_meta($post->ID, 'frase_heelj', true);
					?>
					<?php echo $frase_heelj;
					?>
				</h2>
			</div>
		</div>
		<div class="row counter-area" style="padding-top: 20px;">
			<div class="col-md-6"></div>
				<!-- leitos -->
				<div class="col-md-2 margin-right margin-bottom bloco-indicadores">
					<div class="col-md-4">
						<p class="right"><img src="<?php echo esc_url(get_template_directory_uri());
		                  	?>/img/icon_001.png" alt=""></p>
		            </div>
		            <div class="col-md-8 gutter-0">
						<h1 class="number-counter">
						<?php $value_indicador_heelj_1 = get_post_meta($post->ID, 'value_indicador_heelj_1', true); ?>
							<?php echo $value_indicador_heelj_1; ?>
						</h1>
						<p class="text-counter">
							<?php $label_indicador_heelj_1 = get_post_meta($post->ID, 'label_indicador_heelj_1', true); ?>
							<?php echo $label_indicador_heelj_1; ?>
						</p>
					</div>
		            </div>
		            <!-- Centros cirurgicos -->
		            <div class="col-md-2 margin-right margin-bottom bloco-indicadores">
		               <div class="col-md-4">
		               		<p class="right"><img src="<?php echo esc_url(get_template_directory_uri());
		               			?>/img/icon_002.png" alt=""></p>
		               </div>
		               <div class="col-md-8">
		                  <h1 class="number-counter">
		                    <?php $value_indicador_heelj_2 = get_post_meta($post->ID, 'value_indicador_heelj_2', true); ?>
		               		<?php echo $value_indicador_heelj_2; ?>
		               	  </h1>
		                  <p class="text-counter">
		                    <?php $label_indicador_heelj_2 = get_post_meta($post->ID, 'label_indicador_heelj_2', true); ?>
		               		<?php echo $label_indicador_heelj_2; ?>
		                  </p>
		               </div>
		            </div>
		            <!-- Centros colaboradores -->
		            <div class="col-md-2 margin-bottom bloco-indicadores">
		               <div class="col-md-4">
		                  <p class="right"><img src="<?php echo esc_url(get_template_directory_uri());
		                  	?>/img/icon_003.png" alt=""></p>
		               </div>
		               <div class="col-md-8">
		                  <h1 class="number-counter">
		                  	<?php $value_indicador_heelj_3 = get_post_meta($post->ID, 'value_indicador_heelj_3', true);
?>
		               		<?php
												echo $value_indicador_heelj_3;
?>
		                  </h1>
		                  <p class="text-counter">
		                  	<?php
												$label_indicador_heelj_3 = get_post_meta($post->ID, 'label_indicador_heelj_3', true);
?>
		               		<?php
												echo $label_indicador_heelj_3;
?>
		                  </p>
		               </div>
		            </div>
		         </div>
		         <div class="row counter-area">
		            <div class="col-md-6"></div>
		            <!-- procedimentos -->
		            <div class="col-md-2 margin-right bloco-indicadores">
		               <div class="col-md-4">
		                  <p class="right"><img src="<?php
												echo esc_url(get_template_directory_uri());
?>/img/icon_004.png" alt=""></p>
		               </div>
		               <div class="col-md-8">
		                  <h1 class="number-counter">
		                  	<?php
												$value_indicador_heelj_4 = get_post_meta($post->ID, 'value_indicador_heelj_4', true);
?>
		               		<?php
												echo $value_indicador_heelj_4;
?>
		                  </h1>
		                  <p class="text-counter">
		                  	<?php
												$label_indicador_heelj_4 = get_post_meta($post->ID, 'label_indicador_heelj_4', true);
?>
		               		<?php
												echo $label_indicador_heelj_4;
?>
		                  </p>
		               </div>
		            </div>
		            <!-- especialidades -->
		            <div class="col-md-2 margin-right bloco-indicadores">
		               <div class="col-md-4">
		                  <p class="right"><img src="<?php
												echo esc_url(get_template_directory_uri());
?>/img/icon_005.png" alt=""></p>
		               </div>
		               <div class="col-md-8">
		                  <h1 class="number-counter">
		                  	<?php
												$value_indicador_heelj_5 = get_post_meta($post->ID, 'value_indicador_heelj_5', true);
?>
		               		<?php
												echo $value_indicador_heelj_5;
?>
		               	  </h1>
		                  <p class="text-counter">
		                  	<?php
												$label_indicador_heelj_5 = get_post_meta($post->ID, 'label_indicador_heelj_5', true);
?>
		               		<?php
												echo $label_indicador_heelj_5;
?>
		                  </p>
		               </div>
		            </div>
		            <!-- horario -->
		            <div class="col-md-2 bloco-indicadores">
		               <div class="col-md-4">
		                  <p class="right"><img src="<?php
												echo esc_url(get_template_directory_uri());
?>/img/icon_006.png" alt=""></p>
		               </div>
		               <div class="col-md-8">
		                  <h1 class="number-counter">
		                    <?php
												$value_indicador_heelj_6 = get_post_meta($post->ID, 'value_indicador_heelj_6', true);
?>
		               		<?php
												echo $value_indicador_heelj_6;
?>
		                  </h1>
		                  <p class="text-counter">
		                    <?php
												$label_indicador_heelj_6 = get_post_meta($post->ID, 'label_indicador_heelj_6', true);
?>
		               		<?php
												echo $label_indicador_heelj_6;
?>
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
		         <?php
				$data_acumulado_heelj = get_post_meta($post->ID, 'data_acumulado_heelj', true);
?>

		            <p style="font-style: italic; font-size: 1em;"><span class="glyphicon glyphicon-info-sign"></span> O n&uacute;mero de procedimentos realizados &eacute; o valor acumulado desde <?php
				echo $data_acumulado_heelj;
?></p>
		         </div>
		      </div>
		   </section>

			<?php
				$content = ob_get_contents();
				ob_end_clean();
				return $content;
			}
add_shortcode('indicadores_heelj', 'indicadores_heelj_short');