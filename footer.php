<?php
/**
 * @package WordPress
 * @subpackage IBGH
 * @since IBGH 1.0
*/
?>
<footer>


<?php 
	global $post;
	$url = get_permalink($post->ID);
	

	$sel_header = 'unidades/hospital-estadual-ernestina-lopes-jaime/'; 
	$sel_head = 'heelj';
	$sel_header1 = 'unidades/hospital-municipal-de-araguaina/';
	$sel_head1 = 'hma';
	$sel_header2 = 'unidades/upa-araguaina/';
	$sel_head2 = 'upa-araguaina';
	$sel_header3 = 'unidades/upa-goianesia/';
	$sel_head3 = 'upa-goianesia';
	$sel_header4 = 'unidades/upa-macapa/';
	$sel_head4 = 'upa-macapa';

		if(strpos("[".$url."]", "$sel_header") || strpos("[".$url."]", "$sel_head"))
	    {
		    get_template_part( 'footers/footer', 'heelj' );
	    }
		else if (strpos("[".$url."]", "$sel_header1") || strpos("[".$url."]", "$sel_head1"))
	    {
		    get_template_part( 'footers/footer', 'hma' );
	    }else if (strpos("[".$url."]", "$sel_header2") || strpos("[".$url."]", "$sel_head2"))
	    {
		    get_template_part( 'footers/footer', 'upa-araguaina' );
	    }else if (strpos("[".$url."]", "$sel_header3") || strpos("[".$url."]", "$sel_head3"))
	    {
		    get_template_part( 'footers/footer', 'upa-goianesia' );
	    }else if (strpos("[".$url."]", "$sel_header4") || strpos("[".$url."]", "$sel_head4"))
	    {
	    	get_template_part( 'footers/footer', 'upa-macapa' );
	    }else
	    {
		    get_template_part( 'footers/footer', 'ibgh' );
	    }

?>

</footer>
  
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
      <script src='<?php echo esc_url( get_template_directory_uri() ); ?>/js/listnav.js'></script>
      
      
      <!-- Script para função do carrousel dos parceiros -->
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
		
		<script>
				function alterar_div() {
					jQuery(document).ready(function($) {
	
						var data = {
							'action': 'buscaTransparencia',
							'ano_busca': $('#ano_busca').val()
						};
	
						// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
						jQuery.post('<?php echo get_site_url(); ?>/wp-admin/admin-ajax.php', data, function(response) {
							//alert('Got this from the server: ' + response);
							$('#content-transparencia').html(response);
						});
					});

				}
		</script>
		
		<script>
		function alteraAction(valor) { 

			if (valor == "ibgh") {
       			 $('#busca-transparencia').attr('action', 'http://ibgh.org.br/transparencia-resultado/');
    		}else if (valor == "heelj") {
       			 $('#busca-transparencia').attr('action', 'http://ibgh.org.br/unidades/hospital-estadual-ernestina-lopes-jaime/transparencia-heelj-resultado/');
    		}else if (valor == "hma") {
       			 $('#busca-transparencia').attr('action', 'http://ibgh.org.br/unidades/hospital-municipal-de-araguaina/transparencia-hma-resultado/');
    		}else if (valor == "upa-goianesia") {
       			 $('#busca-transparencia').attr('action', 'http://ibgh.org.br/unidades/upa-goianesia/transparencia-upa-goianesia-resultado/');
    		}else if (valor == "upa-araguaina") {
       			 $('#busca-transparencia').attr('action', 'http://ibgh.org.br/unidades/upa-araguaina/transparencia-upa-araguaina-resultado/');
    		}
    		
		}
		</script>
		
		<script>
		function alteraActionImpresa(valor) { 

			if (valor == "ibgh") {
       			 $('#busca-transparencia').attr('action', 'http://ibgh.org.br/sala-de-imprensa/');
    		}else if (valor == "heelj") {
       			 $('#busca-transparencia').attr('action', 'http://ibgh.org.br/unidades/hospital-estadual-ernestina-lopes-jaime/sala-de-imprensa/');
    		}else if (valor == "hma") {
       			 $('#busca-transparencia').attr('action', 'http://ibgh.org.br/unidades/hospital-municipal-de-araguaina/sala-de-imprensa/');
    		}else if (valor == "upa-goianesia") {
       			 $('#busca-transparencia').attr('action', 'http://ibgh.org.br/unidades/upa-araguaina/sala-de-imprensa/');
    		}else if (valor == "upa-araguaina") {
       			 $('#busca-transparencia').attr('action', 'http://ibgh.org.br/unidades/upa-goianesia/sala-de-imprensa/');
    		}
    		
		}
		</script>

      	<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58e2f40f3b47d4fd"></script> 

      <?php wp_footer(); ?>
      
   </body>
</html>
