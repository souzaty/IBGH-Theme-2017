<?php
	/* Template Name: PAGINA PADRAO IBGH */
?>
<?php get_header(); ?>
<section class="interna-ibgh title-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</section>
<?php
	while ( have_posts() ) : the_post();
		the_content();
	endwhile; // End of the loop.
	?>
<?php get_footer(); ?>
