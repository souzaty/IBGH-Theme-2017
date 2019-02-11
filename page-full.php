<?php
	/* Template Name: Full Width Page  */
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
<section id="posts">
             <?php while ( have_posts() ) : the_post();
             	the_content();
             	endwhile; // End of the loop.
             	?>
</section>
<?php get_footer(); ?>
