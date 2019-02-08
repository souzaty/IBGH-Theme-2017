<?php
/**
 * @package WordPress
 * @subpackage IBGH
 * @since IBGH 1.0
*/
?>
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
