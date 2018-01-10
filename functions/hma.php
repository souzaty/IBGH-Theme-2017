<?php
/*  Unidade FUNÇÕES UNIDADE HMA */
/**
 * @package WordPress
 * @subpackage IBGH
 * @since IBGH 1.3
 */

// INÍCIO CUSTOM CORPO CLINICO HMA
add_action('init', 'corpo_clinico_hma_register');
function corpo_clinico_hma_register()
{
				$labels = array(
								'name' => __('Corpo Cl&iacute;nico HMA', 'Tipo de post para incluir os profissionais do HMA.'),
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
				register_post_type('corpo_clinico_hma', $args);
				flush_rewrite_rules();
}
register_taxonomy("Especialidades HMA", array(
				"corpo_clinico_hma"
), array(
				"hierarchical" => true,
				"label" => "Especialidades HMA",
				"singular_label" => "especialidade",
				"rewrite" => array(
								'slug' => 'especialidade'
				),
				"public" => true,
				"show_ui" => true,
				"_builtin" => true
));
add_action("admin_init", "campos_personalizados_corpo_clinico_hma");
function campos_personalizados_corpo_clinico_hma()
{
				add_meta_box("corpo_crm_hma", "Informe o CRM", "corpo_crm_hma", "corpo_clinico_hma", "normal", "low");
}
function corpo_crm_hma()
{
				global $post;
				$custom        = get_post_meta($post->ID);
				$corpo_crm_hma = $custom["corpo_crm_hma"][0];
?>
  <input type="text" name="corpo_crm_hma" value='<?php
				echo $corpo_crm_hma;
?>' /></p>
<?php
}
add_action('save_post_corpo_clinico_hma', 'save_details_post_corpo_clinico_hma');
function save_details_post_corpo_clinico_hma()
{
				global $post;
				update_post_meta($post->ID, "corpo_crm_hma", $_POST["corpo_crm_hma"]);
}
// FIM CUSTOM CORPO CLINICO HMA
 // INÍCIO CUSTOM POST SERVIÇOS HMA
add_action('init', 'servicos_hma');
function servicos_hma()
{
				$labels = array(
								'name' => __('Servi&ccedil;os HMA', 'Tipo de post para incluir os servi&ccedil;os do HMA.'),
								'singular_name' => __('Servi&ccedil;os HMA', 'post type singular name'),
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
				register_post_type('servicos-hma', $args);
				flush_rewrite_rules();
}
add_action("admin_init", "campos_personalizados_servicos_hma");
function campos_personalizados_servicos_hma()
{
				add_meta_box("botao_servico_hma", "Informe label para o bot&atilde;o", "botao_servico_hma", "servicos-hma", "normal", "low");
				add_meta_box("link_botao_servico_hma", "Informe o link para o bot&atilde;o", "link_botao_servico_hma", "servicos-hma", "normal", "low");
				add_meta_box("info_servico_hma", "Informe o texto de informa&ccedil;&atilde;o", "info_servico_hma", "servicos-hma", "normal", "low");
				add_meta_box("link_info_servico_hma", "Informe o link para que leva a informa&ccedil;&atilde;o", "link_info_servico_hma", "servicos-hma", "normal", "low");
}
function botao_servico_hma()
{
				global $post;
				$custom            = get_post_meta($post->ID);
				$botao_servico_hma = $custom["botao_servico_hma"][0];
?>
			<input type="text" name="botao_servico_hma" value="<?php
				echo $botao_servico_hma;
?>" />
		<?php
}
function link_botao_servico_hma()
{
				global $post;
				$custom                 = get_post_meta($post->ID);
				$link_botao_servico_hma = $custom["link_botao_servico_hma"][0];
?>
			<input type="text" name="link_botao_servico_hma" value="<?php
				echo $link_botao_servico_hma;
?>" />
		<?php
}
function info_servico_hma()
{
				global $post;
				$custom           = get_post_meta($post->ID);
				$info_servico_hma = $custom["info_servico_hma"][0];
?>
			<input type="text" name="info_servico_hma" value="<?php
				echo $info_servico_hma;
?>" />
		<?php
}
function link_info_servico_hma()
{
				global $post;
				$custom                = get_post_meta($post->ID);
				$link_info_servico_hma = $custom["link_info_servico_hma"][0];
?>
			<input type="text" name="link_info_servico_hma" value="<?php
				echo $link_info_servico_hma;
?>" />
		<?php
}
add_action('save_post_servicos-hma', 'save_details_post_servicos_hma');
function save_details_post_servicos_hma()
{
				global $post;
				update_post_meta($post->ID, "botao_servico_hma", $_POST["botao_servico_hma"]);
				update_post_meta($post->ID, "link_botao_servico_hma", $_POST["link_botao_servico_hma"]);
				update_post_meta($post->ID, "info_servico_hma", $_POST["info_servico_hma"]);
				update_post_meta($post->ID, "link_info_servico_hma", $_POST["link_info_servico_hma"]);
}
// FIM CUSTOM POST SERVIÇOS HMA
//INICIO SHORTCODE SERVIÇOS HMA
function servicos_hma_short($atts)
{
				ob_start();
?>

				<!-- Section serviços -->
			   <section id="services">
			      <div class="container">
			      <div class="row gutter-0">

			         <div class="col-md-3">
			            <ul class="nav nav-pills nav-stacked">

			            <?php
				global $post;
				$wp_query = new WP_Query();
				$wp_query->query('post_type=servicos-hma&posts_per_page=-1&orderby=title&order=ASC');
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
?>"><a data-toggle="tab" href="#tab<?php
												echo $count;
?>" aria-expanded="true"><?php
												the_title();
?></a></li>
			            <?php
								endwhile;
				endif;
?>
			            </ul>
			         </div>
			         <div class="col-md-9">
			            <div class="tab-content">

			            <?php
				global $post;
				$wp_query = new WP_Query();
				$wp_query->query('post_type=servicos-hma&posts_per_page=-1&orderby=title&order=ASC');
				$count = 0;
?>
					 	<?php
				if ($wp_query->have_posts()):
								while ($wp_query->have_posts()):
												$wp_query->the_post();
												$count++;
?>

			               <!-- #################### Conteúdo Urgência e Emergência #################### -->
			               <div id="tab<?php
												echo $count;
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
		                        <h3 style="color:#0072a4"><?php
												the_title();
?></h3>
		                     </div>
		                  </div>
		                  <div class="row box-content">
		                     <div class="col-md-12">
		                        <p><?php
												the_excerpt();
?></p>
		                     </div>
		                     <div class="col-md-3">
			             <?php
												$link_botao_servico_hma = get_post_meta($post->ID, 'link_botao_servico_hma', true);
?>
		                     <a href="<?php
												echo $link_botao_servico_hma;
?>" >
		                        <button type="button" class="btn btn-default btn-blue" aria-label="Left Align">

		                        <?php
												$botao_servico_hma = get_post_meta($post->ID, 'botao_servico_hma', true);
?>
		                        <?php
												echo $botao_servico_hma;
?>

		                        </button></a>
		                     </div>
		                     <div class="col-md-9">
		                        <p style="margin-top:25px; text-decoration: underline; color: #c6c6c6; font-size: 14px; margin-left: 20px;">
		                        <?php
												$link_info_servico_hma = get_post_meta($post->ID, 'link_info_servico_hma', true);
?>
		                        <span class="glyphicon glyphicon-info-sign"></span>
		                        <?php
												$info_servico_hma = get_post_meta($post->ID, 'info_servico_hma', true);
?>
		                        <?php
												echo $info_servico_hma;
?>
		                        </p>

			                     </div>
			                  </div>
			               </div>
			               <?php
								endwhile;
				endif;
?>
			               <!-- Fim Emergencia -->

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
add_shortcode('servicos_hma', 'servicos_hma_short');
//FIM SHORTCODE SERVIÇOS HMA
//INICIO SHORTCODE INDICADORES HMA
function indicadores_hma_short($atts)
{
				ob_start();
?>
						<section id="numeros-hospital" class="ghost">
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
					               <h2>
					               		<?php
												$frase_hma = get_post_meta($post->ID, 'frase_hma', true);
?>
					               		<?php
												echo $frase_hma;
?>
					               </h2>
					            </div>
					         </div>
					         <div class="row counter-area" style="padding-top: 20px;">
					            <div class="col-md-6"></div>
					            <!-- leitos -->
					            <div class="col-md-2 margin-right margin-bottom bloco-indicadores">
					               <div class="col-md-4">
					                  <p class="right"><img src="<?php
												echo esc_url(get_template_directory_uri());
?>/img/icon_001.png" alt=""></p>
					               </div>
					               <div class="col-md-8 gutter-0">
					                  <h1 class="number-counter">
					                    <?php
												$value_indicador_hma_1 = get_post_meta($post->ID, 'value_indicador_hma_1', true);
?>
					               		<?php
												echo $value_indicador_hma_1;
?>
					                  </h1>
					                  <p class="text-counter">
					                  	<?php
												$label_indicador_hma_1 = get_post_meta($post->ID, 'label_indicador_hma_1', true);
?>
					               		<?php
												echo $label_indicador_hma_1;
?>
					                  </p>
					               </div>
					            </div>
					            <!-- Centros cirurgicos -->
					            <div class="col-md-2 margin-right margin-bottom bloco-indicadores">
					               <div class="col-md-4">
					                  <p class="right"><img src="<?php
												echo esc_url(get_template_directory_uri());
?>/img/icon_002.png" alt=""></p>
					               </div>
					               <div class="col-md-8">
					                  <h1 class="number-counter">
					                    <?php
												$value_indicador_hma_2 = get_post_meta($post->ID, 'value_indicador_hma_2', true);
?>
					               		<?php
												echo $value_indicador_hma_2;
?>
					               	  </h1>
					                  <p class="text-counter">
					                    <?php
												$label_indicador_hma_2 = get_post_meta($post->ID, 'label_indicador_hma_2', true);
?>
					               		<?php
												echo $label_indicador_hma_2;
?>
					                  </p>
					               </div>
					            </div>
					            <!-- Centros colaboradores -->
					            <div class="col-md-2 margin-bottom bloco-indicadores">
					               <div class="col-md-4">
					                  <p class="right"><img src="<?php
												echo esc_url(get_template_directory_uri());
?>/img/icon_003.png" alt=""></p>
					               </div>
					               <div class="col-md-8">
					                  <h1 class="number-counter">
					                  	<?php
												$value_indicador_hma_3 = get_post_meta($post->ID, 'value_indicador_hma_3', true);
?>
					               		<?php
												echo $value_indicador_hma_3;
?>
					                  </h1>
					                  <p class="text-counter">
					                  	<?php
												$label_indicador_hma_3 = get_post_meta($post->ID, 'label_indicador_hma_3', true);
?>
					               		<?php
												echo $label_indicador_hma_3;
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
												$value_indicador_hma_4 = get_post_meta($post->ID, 'value_indicador_hma_4', true);
?>
					               		<?php
												echo $value_indicador_hma_4;
?>
					                  </h1>
					                  <p class="text-counter">
					                  	<?php
												$label_indicador_hma_4 = get_post_meta($post->ID, 'label_indicador_hma_4', true);
?>
					               		<?php
												echo $label_indicador_hma_4;
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
												$value_indicador_hma_5 = get_post_meta($post->ID, 'value_indicador_hma_5', true);
?>
					               		<?php
												echo $value_indicador_hma_5;
?>
					               	  </h1>
					                  <p class="text-counter">
					                  	<?php
												$label_indicador_hma_5 = get_post_meta($post->ID, 'label_indicador_hma_5', true);
?>
					               		<?php
												echo $label_indicador_hma_5;
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
												$value_indicador_hma_6 = get_post_meta($post->ID, 'value_indicador_hma_6', true);
?>
					               		<?php
												echo $value_indicador_hma_6;
?>
					                  </h1>
					                  <p class="text-counter">
					                    <?php
												$label_indicador_hma_6 = get_post_meta($post->ID, 'label_indicador_hma_6', true);
?>
					               		<?php
												echo $label_indicador_hma_6;
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
				$data_acumulado_hma = get_post_meta($post->ID, 'data_acumulado_hma', true);
?>

					            <p style="font-style: italic; font-size: 1em;"><span class="glyphicon glyphicon-info-sign"></span> O n&uacute;mero de procedimentos realizados &eacute; o valor acumulado desde <?php
				echo $data_acumulado_hma;
?></p>
					         </div>
					      </div>
					   </section>

						<?php
				$content = ob_get_contents();
				ob_end_clean();
				return $content;
}
add_shortcode('indicadores_hma', 'indicadores_hma_short');
//FIM SHORTCODE INDICADORES HMA
//INICIO SHORTCODE NOTICIAS HOME HMA
function noticias_home_hma_short($atts)
{
				ob_start();
?>
									<section id="noticias">
										<div class="container">
											<div class="row">

											<?php
				global $post;
				$wp_query = new WP_Query();
				$wp_query->query('post_type=post&category_name=hma&posts_per_page=3&orderby=date&order=DESC');
				$count = 0;
?>
											<?php
				if ($wp_query->have_posts()):
								while ($wp_query->have_posts()):
												$wp_query->the_post();
?>
							          			<div class="col-md-4">
													<a href="<?php echo get_permalink(); ?>"><?php
												the_post_thumbnail('noticias-home-hma');
?></a>
													<div class="borda-meio">
									<p class="category-news center upa-em-acao"><span>HMA em A&ccedil;&atilde;o</span></p>
								</div>
													<h2 class="title-news"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
													<p class="resume-news"><?php
												the_excerpt_lenght('', '', 'true', 140);
?></p>
													<a href="<?php
												echo get_permalink();
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
add_shortcode('noticias_home_hma', 'noticias_home_hma_short');
//FIM SHORTCODE NOTICIAS HOME HMA
/* INÍCIO SIDEBAR FOOTER HMA */
register_sidebar(array(
				'name' => 'HMA Footer Sidebar 1',
				'id' => 'hma-footer-sidebar-1',
				'description' => 'Appears in the footer area',
				'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
				'after_widget' => '</aside>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4>'
));
register_sidebar(array(
				'name' => 'HMA Footer Sidebar 2',
				'id' => 'hma-footer-sidebar-2',
				'description' => 'Appears in the footer area',
				'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
				'after_widget' => '</aside>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4>'
));
register_sidebar(array(
				'name' => 'HMA Footer Sidebar 3',
				'id' => 'hma-footer-sidebar-3',
				'description' => 'Appears in the footer area',
				'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
				'after_widget' => '</aside>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4>'
));
register_sidebar(array(
				'name' => 'HMA Footer Sidebar 4',
				'id' => 'hma-footer-sidebar-4',
				'description' => 'Appears in the footer area',
				'before_widget' => '<aside id="%1$s" class="widget %2$s footer-menu">',
				'after_widget' => '</aside>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4>'
));
/* FIM SIDEBAR FOOTER HMA */
