<?php
/**
 * @package WordPress
 * @subpackage IBGH
 * @since IBGH 1.0
*/
?>
<footer>
<div id="ibgh-foot">
   <div class="container">
      <div class="row">
         <div class="col-md-3">
         	<?php
				if(is_active_sidebar('ibgh-footer-sidebar-1')){
					dynamic_sidebar('ibgh-footer-sidebar-1');
				}
			?>
         </div>
         <div class="col-md-3">
            <?php
				if(is_active_sidebar('ibgh-footer-sidebar-2')){
					dynamic_sidebar('ibgh-footer-sidebar-2');
				}
			?>
         </div>
         <div class="col-md-3">
           <?php
				if(is_active_sidebar('ibgh-footer-sidebar-3')){
					dynamic_sidebar('ibgh-footer-sidebar-3');
				}
			?>
         </div>
         <div class="col-md-3">
         	<?php
				if(is_active_sidebar('ibgh-footer-sidebar-4')){
					dynamic_sidebar('ibgh-footer-sidebar-4');
				}
			?>
         </div>
      </div>
   </div>
 </div>

 </footer>

       <!-- Include all compiled plugins (below), or include individual files as needed -->
       <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
       <script src='<?php echo esc_url( get_template_directory_uri() ); ?>/js/listnav.js'></script>


       <!-- Script para fun��o do carrousel dos parceiros -->
 		<script type="text/javascript">
 		$('.carousel[data-type="multi"] .item').each(function(){
 			  var next = $(this).next();
 			  if (!next.length) {
 			    next = $(this).siblings(':first');
 			  }
 			  next.children(':first-child').clone().appendTo($(this));

 			  for (var i=0;i<2;i++) {
 			    next=next.next();
 			    if (!next.length) {
 			    	next = $(this).siblings(':first');
 			  	}

 			    next.children(':first-child').clone().appendTo($(this));
 			  }
 			});

 		</script>

       	<script>
       	$('.carousel .vertical .item').each(function(){
       	  var next = $(this).next();
       	  if (!next.length) {
       	    next = $(this).siblings(':first');
       	  }
       	  next.children(':first-child').clone().appendTo($(this));

       	  for (var i=1;i<1;i++) {
       	    next=next.next();
       	    if (!next.length) {
       	    	next = $(this).siblings(':first');
       	  	}

       	    next.children(':first-child').clone().appendTo($(this));
       	  }
       	});
       	</script>

       	<script type="text/javascript">
 		    $(document).ready(function() {
 		    $('#menu-item-227').find('a').attr('data-toggle', 'modal');
 		    $('#menu-item-229').find('a').attr('data-toggle', 'modal');
 		    $('#menu-item-258').find('a').attr('data-toggle', 'modal');
 		    $('#menu-item-307').find('a').attr('data-toggle', 'modal');
 		    $('#menu-item-349').find('a').attr('data-toggle', 'modal');
 		    $('#menu-item-364').find('a').attr('data-toggle', 'modal');
 		    $('#menu-item-2221').find('a').attr('data-toggle', 'modal');
 		    $('#menu-item-2230').find('a').attr('data-toggle', 'modal');
 		    });
 		</script>

 		<script type="text/javascript">
 		    $(document).ready(function() {
 		        $('#menu-item-257').find('a').attr('data-toggle', 'collapse');
 		    });
 		</script>
       	<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58e2f40f3b47d4fd"></script>

       <?php wp_footer(); ?>

    </body>
 </html>
