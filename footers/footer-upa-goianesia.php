
<?php
/**
 * @package WordPress
 * @subpackage IBGH
 * @since IBGH 1.0
*/
?>
<div id="hma-foot">
   <div class="container">
      <div class="row">
         <div class="col-md-3">
         	<?php
				if(is_active_sidebar('upa-goianesia-footer-sidebar-1')){
					dynamic_sidebar('upa-goianesia-footer-sidebar-1');
				}
			?>  
         </div>
         <div class="col-md-3">
            <?php
				if(is_active_sidebar('upa-goianesia-footer-sidebar-2')){
					dynamic_sidebar('upa-goianesia-footer-sidebar-2');
				}
			?>
         </div>
         <div class="col-md-3">
           <?php
				if(is_active_sidebar('upa-goianesia-footer-sidebar-3')){
					dynamic_sidebar('upa-goianesia-footer-sidebar-3');
				}
			?>
         </div>
         <div class="col-md-3">
         	<?php
				if(is_active_sidebar('upa-goianesia-footer-sidebar-4')){
					dynamic_sidebar('upa-goianesia-footer-sidebar-4');
				}
			?>
         </div>
      </div>
   </div>
</div>