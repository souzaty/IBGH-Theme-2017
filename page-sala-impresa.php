<?php
	/* Template Name: Sala de Imprensa */
?>
<?php get_header(); ?>
<section class="interna-ibgh title-page">
	<div class="container">
		<div class="row">
			<h1 class="white"><?php the_title(); ?></h1>
		</div>
	</div>
</section>
<section id="posts">
	<div class="container gutter-0">
		<div class="">
			<div class="col-md-9">
				<!-- Breadcrumb -->
				<div class="breadcrumb">
					<?php wp_custom_breadcrumbs(); ?>
				</div>
                <!-- End Breadcrumb -->
				<div class="row">
					<div class="col-lg-12">
						<form class="busca-transparencia" role="search" id="busca-transparencia" method="get" action="<?php echo get_site_url(); ?>/transparencia-resultado/">
							<div class="input-group">
								<div class="input-group-btn">
									<?php
										$busca_unidade_id  = get_categories('post_type=post&parent=0&hide_empty=1&hierarchical=1&depth=1&order=ASC');
										$busca_unidade_id = wp_list_pluck($busca_unidade_id,'slug');
										$busca_unidade_id =  implode(",", $busca_unidade_id);
										?>
									<select name="unidadeSelect" id="unidadeSelect" class="btn btn-default dropdown-toggle filtro-label" onchange="alteraActionImpresa(this.value)">
										<option value="ibgh,unidades">Filtrar por</option>
										<option class="level-0" value="ibgh">IBGH</option>
										<option class="level-1" value="heelj">Hospital Estadual Ernestina Lopes Jaime</option>
										<option class="level-1" value="hma">Hospital Municipal de Aragua&iacute;na</option>
										<option class="level-1" value="upa-araguaina">UPA Walter Fernandes de Goian&eacute;sia</option>
										<option class="level-1" value="upa-goianesia">UPA Anat&oacute;lio Dias Carneiro de Aragua&iacute;na</option>
									</select>
								</div>
								<input type="text" class="form-control input-label" aria-label="..." type="search" name="pesquisa_imprensa" id="pesquisa_imprensa">
								<span class="input-group-btn">
								<button class="btn btn-default pesquisa-label" type="submit">Pesquisar</button>
								</span>
							</div>
						</form>
						<!-- /input-group -->
					</div>
				</div>
				<!-- Main Blog Content -->
				<?php
					global $post;
					$pesquisa_imprensa = trim($_GET['pesquisa_imprensa']);
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$wp_query = new WP_Query();
					$wp_query->query('s='. $pesquisa_imprensa.'&post_type=post&cat=90&orderby=date&order=DESC&posts_per_page=8&paged=' . $paged);
					 ?>
				<?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();?>
				<div class="postResume">
					<div class="col-md-12 gutter-30 resultado">
						<div class="postMeta">
							<abbr class="published updated" title="<?php the_time('j/m/Y'); ?>"><span class="clock"></span><?php the_time('j/m/Y'); ?></abbr> <span class="tag"></span>
							<?php the_category( ', ' ); ?>
						</div>
						<h3 class="result-post-title entry-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
					</div>
				</div>
				<?php endwhile; ?>
				<!-- Pagination -->
				<?php
					if ( function_exists('wp_bootstrap_pagination') )
					  wp_bootstrap_pagination();
					?>
				<?php endif; wp_reset_query(); ?>
			</div>
			<!-- End col-md-9 -->
			<div class="col-md-3">
				<?php
					if(is_active_sidebar('sala-impresa')){
						dynamic_sidebar('sala-impresa');
					}
					?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
