<?php
/**
 * @package WordPress
 * @subpackage IBGH
 * @since IBGH 1.0
*/

get_header(); ?>

<section id="posts">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
             <?php while ( have_posts() ) : the_post();
             	the_content();
             	endwhile; // End of the loop.
             	?>
         </div>
     </div>
 </div>
</section>

<?php get_footer(); ?>
