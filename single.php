<?php
/**
 * @package WordPress
 * @subpackage IBGH
 * @since IBGH 1.0
 */
get_header(); ?>
<?php
if ( in_category('ibgh') ) { ?>
	<section class="interna-ibgh title-page">
		<div class="container">
		</div>
	</section>
<?php
	include 'content-single-ibgh.php';
} elseif ( in_category('heelj') ) {
	include 'content-single-heelj.php';
} elseif ( in_category('hma') ) {
	include 'content-single-hma.php';
} elseif ( in_category('upa-araguaina') ) {
	include 'content-single-upa-a.php';
} elseif ( in_category('upa-goianesia') ) {
	include 'content-single-upa-g.php';
} else {
	// Continue with normal Loop
	if ( have_posts() ) : while ( have_posts() ) : the_post();
		the_title();
		the_content();
	endwhile; endif;
}
?>
<?php get_footer(); ?>
