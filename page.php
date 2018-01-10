<?php
/**
 * @package WordPress
 * @subpackage IBGH
 * @since IBGH 1.0
*/

get_header(); ?>

<?php
	while ( have_posts() ) : the_post();
	the_content();
	endwhile; // End of the loop.
?>

<?php get_footer(); ?>
