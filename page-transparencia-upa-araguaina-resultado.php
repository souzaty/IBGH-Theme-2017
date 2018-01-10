<?php
	/* Template Name: TRANSPARENCIA UPA ARAGUAINA RESULTADO */
?>
<?php get_header(); ?>
<div id="transparencia-upa-a">
	<header>
		<div class="intro-heading">
			<div class="container">
				<div class="row campo-pesquisa">
					<div class="col-lg-12">
						<form class="busca-transparencia" role="search" id="busca-transparencia" method="get" action="<?php echo get_site_url(); ?>/transparencia-resultado/">
							<div class="input-group">
								<div class="input-group-btn">
									<?php
										$busca_unidade_id  = get_categories('post_type=transparencia&parent=0&hide_empty=0&value_field=slug&taxonomy=Tipo+documento&orderby=taxonomy_slug=Tipo+documento&hierarchical=1&depth=1&order=ASC');
										$busca_unidade_id = wp_list_pluck($busca_unidade_id,'slug');
										$busca_unidade_id =  implode(",", $busca_unidade_id);
										$select  = wp_dropdown_categories('show_option_none=Unidades&option_none_value='.$busca_unidade_id.'&hide_empty=0&echo=0&id=unidadeSelect&name=unidadeSelect&class=btn btn-default dropdown-toggle filtro-label&post_type=transparencia&value_field=slug&taxonomy=Tipo+documento&orderby=taxonomy_slug=Tipo+documento&hierarchical=1&depth=1&order=ASC');
										$replace = "<select$1 onchange='alteraAction(this.value)' class='btn btn-default dropdown-toggle filtro-label'>";
										$select  = preg_replace( '#<select([^>]*)>#', $replace, $select );
										echo $select;
										?>
								</div>
								<div class="input-group-btn">
									<?php
										$busca_ano_id  = get_categories('post_type=transparencia&parent=0&hide_empty=0&value_field=slug&taxonomy=Ano&orderby=taxonomy_slug=Ano&hierarchical=1&depth=1&order=ASC');
										$busca_ano_id = wp_list_pluck($busca_ano_id,'slug');
										$busca_ano_id =  implode(",", $busca_ano_id);
										$select  = wp_dropdown_categories('show_option_none=Periodo&option_none_value='.$busca_ano_id.'&hide_empty=0&echo=0&id=anoSelect&name=anoSelect&class=btn btn-default dropdown-toggle filtro-label periodo&post_type=transparencia&value_field=slug&taxonomy=Ano&orderby=taxonomy_slug=Ano=1&depth=1&order=ASC');
										$replace = "<select$1 onchange='alteraAction(this.value)' class='btn btn-default dropdown-toggle filtro-label'>";
										$select  = preg_replace( '#<select([^>]*)>#', $replace, $select );
										echo $select;
										?>
								</div>
								<!-- /btn-group -->
								<input type="text" class="form-control input-label" aria-label="..." type="search" name="pesquisa_transparencia" id="pesquisa_transparencia">
								<span class="input-group-btn">
								<button class="btn btn-default pesquisa-label" type="submit">Pesquisar</button>
								</span>
							</div>
						</form>
						<!-- /input-group -->
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Section Numeros full width -->
	<section id="numeros-full ghost">
		<div class="container">
			<div class="row gutter-0">
				<?php
					global $post;
					$wp_query = new WP_Query();
					$wp_query->query('post_type=indicadores-ibgh&posts_per_page=1&orderby=title&order=ASC');
					$count = 0;
					?>
				<?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();?>
				<div class="col-md-2">
					<!-- Leitos -->
					<table class="numeros-tabela numeros-tabela-firt" style="border-left:2px solid #c8c8c8">
						<tr>
							<td>
								<p class="right"><img src="<?php echo get_template_directory_uri(); ?>/img/icon_001.png" alt=""></p>
							</td>
							<td>
								<h1 class="number-counter">
									<?php $value_indicador_ibgh_1 = get_post_meta($post->ID, 'value_indicador_ibgh_1', true); ?>
									<?php echo $value_indicador_ibgh_1; ?>
								</h1>
								<p class="text-counter">
									<?php $label_indicador_ibgh_1 = get_post_meta($post->ID, 'label_indicador_ibgh_1', true); ?>
									<?php echo $label_indicador_ibgh_1; ?>
								</p>
							</td>
						</tr>
					</table>
				</div>
				<div class="col-md-2">
					<!-- Centros cirurgicos -->
					<table class="numeros-tabela">
						<tr>
							<td>
								<p class="right"><img src="<?php echo get_template_directory_uri(); ?>/img/icon_002.png" alt=""></p>
							</td>
							<td>
								<h1 class="number-counter">
									<?php $value_indicador_ibgh_2 = get_post_meta($post->ID, 'value_indicador_ibgh_2', true); ?>
									<?php echo $value_indicador_ibgh_2; ?>
								</h1>
								<p class="text-counter">
									<?php $label_indicador_ibgh_2 = get_post_meta($post->ID, 'label_indicador_ibgh_2', true); ?>
									<?php echo $label_indicador_ibgh_2; ?>
								</p>
							</td>
						</tr>
					</table>
				</div>
				<div class="col-md-2">
					<!-- Centros colaboradores -->
					<table class="numeros-tabela">
						<tr>
							<td>
								<p class="right"><img src="<?php echo get_template_directory_uri(); ?>/img/icon_003.png" alt=""></p>
							</td>
							<td>
								<h1 class="number-counter">
									<?php $value_indicador_ibgh_3 = get_post_meta($post->ID, 'value_indicador_ibgh_3', true); ?>
									<?php echo $value_indicador_ibgh_3; ?>
								</h1>
								<p class="text-counter">
									<?php $label_indicador_ibgh_3 = get_post_meta($post->ID, 'label_indicador_ibgh_3', true); ?>
									<?php echo $label_indicador_ibgh_3; ?>
								</p>
							</td>
						</tr>
					</table>
				</div>
				<div class="col-md-2">
					<!-- procedimentos -->
					<table class="numeros-tabela">
						<tr>
							<td>
								<p class="right"><img src="<?php echo get_template_directory_uri(); ?>/img/icon_004.png" alt=""></p>
							</td>
							<td>
								<h1 class="number-counter">
									<?php $value_indicador_ibgh_4 = get_post_meta($post->ID, 'value_indicador_ibgh_4', true); ?>
									<?php echo $value_indicador_ibgh_4; ?>
								</h1>
								<p class="text-counter">
									<?php $label_indicador_ibgh_4 = get_post_meta($post->ID, 'label_indicador_ibgh_4', true); ?>
									<?php echo $label_indicador_ibgh_4; ?>
								</p>
							</td>
						</tr>
					</table>
				</div>
				<!-- especialidades -->
				<div class="col-md-2">
					<table class="numeros-tabela">
						<tr>
							<td>
								<p class="right"><img src="<?php echo get_template_directory_uri(); ?>/img/icon_005.png" alt=""></p>
							</td>
							<td>
								<h1 class="number-counter">
									<?php $value_indicador_ibgh_5 = get_post_meta($post->ID, 'value_indicador_ibgh_5', true); ?>
									<?php echo $value_indicador_ibgh_5; ?>
								</h1>
								<p class="text-counter">
									<?php $label_indicador_ibgh_5 = get_post_meta($post->ID, 'label_indicador_ibgh_5', true); ?>
									<?php echo $label_indicador_ibgh_5; ?>
								</p>
							</td>
						</tr>
					</table>
				</div>
				<div class="col-md-2">
					<!-- horario -->
					<table class="numeros-tabela">
						<tr>
							<td>
								<p class="right"><img src="<?php echo get_template_directory_uri(); ?>/img/icon_006.png" alt=""></p>
							</td>
							<td>
								<h1 class="number-counter">
									<?php $value_indicador_ibgh_6 = get_post_meta($post->ID, 'value_indicador_ibgh_6', true); ?>
									<?php echo $value_indicador_ibgh_6; ?>
								</h1>
								<p class="text-counter">
									<?php $label_indicador_ibgh_6 = get_post_meta($post->ID, 'label_indicador_ibgh_6', true); ?>
									<?php echo $label_indicador_ibgh_6; ?>
								</p>
							</td>
						</tr>
					</table>
				</div>
				<?php endwhile; endif; ?><?php wp_reset_query(); ?>
			</div>
		</div>
	</section>
	<section id="transparencia">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-12">
					<h1 style="font-style: italic; margin-bottom: 10px">Resultados da pesquisa</h1>
					<?php
						$pesquisa_transparencia = trim($_GET['pesquisa_transparencia']);
						$unidadeSelectSlug = preg_split('/,/', trim($_GET['unidadeSelect']));
						$anoSelect = preg_split('/,/', trim($_GET['anoSelect']));
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$busca_transparencia = array(
								'post_type' => 'transparencia',
								'posts_per_page' => -1,
								's' => $pesquisa_transparencia,
								'tax_query' => array(
										array(
												'taxonomy' => 'Tipo documento',
												'field'    => 'slug',
												'terms'    => $unidadeSelectSlug,
												'operator' 		=> 'IN'
										),
										array(
												'taxonomy' => 'Ano',
												'field'    => 'slug',
												'terms'    => $anoSelect,
												'operator' 		=> 'IN'
										),
								),
								'paged' => $paged
						);
						$wp_query_busca_transparencia = new WP_Query( $busca_transparencia );

						//$wp_query->query('s='.$pesquisa_transparencia.'&post_type=transparencia&posts_per_page=-1&paged=' . $paged);
						$count_transparencia = $wp_query_busca_transparencia->post_count;
						 ?>
					<p style="font-style: italic; font-size: 1.1em;"><?php echo $count_transparencia; ?> resultados encontrados para o(s) termo(s) <span style="color:#0072a4"><b>"<?php  echo $_GET['pesquisa_transparencia']; ?>"</b></span> em <?php  echo str_replace("-", " ", ucwords($_GET['unidadeSelect'])); echo ', '; echo $_GET['anoSelect']; ?>.</p>
					<div class="result-arrow"></div>
					<?php if ($wp_query_busca_transparencia->have_posts()) : ?>
					<?php while ($wp_query_busca_transparencia->have_posts()) : $wp_query_busca_transparencia->the_post(); ?>
					<!-- Resultado 001 -->
					<div class="resultado">
						<p class="result-post-date"><span class="clock"></span><?php the_time('j/m/Y'); ?> <span class="tag"></span>
							<?php
								$terms = get_the_terms( $post->ID, 'Ano' );
								if ( $terms && ! is_wp_error( $terms ) ) :
								$vehicle_details = array();
								foreach ( $terms as $term ) {
								$vehicle_details[] = $term->name;
								}
								$vehicle_detail = join( ", ", $vehicle_details);
								echo $vehicle_detail;
								endif;
								echo ", ";
								$terms = get_the_terms( $post->ID, 'Tipo documento' );
								if ( $terms && ! is_wp_error( $terms ) ) :
								$vehicle_details = array();
								foreach ( $terms as $term ) {
								$vehicle_details[] = $term->name;
								}
								$vehicle_detail = join( ", ", $vehicle_details);
								echo $vehicle_detail;
								endif;
								?>
						</p>
						<?php $upload_documento_transparencia = get_post_meta($post->ID, 'upload_documento_transparencia', true); ?>
						<p class="result-post-title"><a href="<?php echo $upload_documento_transparencia; ?>" target="_blank"><?php the_title(); ?></a></p>
					</div>
					<?php endwhile;?><?php endif; ?><?php wp_reset_query(); ?>
				</div>
				<!-- contact form -->
				<div class="col-md-3 col-sm-12">
					<div class="conteiner-transparencia-form">
						<h4>N&atilde;o encontrou o que procura?</h4>
						<p>Valorizamos uma gest&atilde;o transparente. Preencha os dados abaixo e solicite.</p>
						<?php echo do_shortcode("[gravityform id=3 title=false description=false ajax=true tabindex=49]"); ?>
					</div>
					<p class="procurar-indicador-sidebar center">
						ou ligue para (62) 3000-0000
					</p>
					<p class="procurar-indicador-sidebar center">
						<a href="mailto:contato@ibgh.org.br">contato@ibgh.org.br</a>
					</p>
				</div>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>
