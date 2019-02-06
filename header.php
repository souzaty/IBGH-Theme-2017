<?php
	/**
	 * @package WordPress
	 * @subpackage IBGH
	 * @since IBGH 1.4
	*/
	?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title><?php wp_title(''); ?></title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap -->
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/custom.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,900,900i" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/ie-emulation-modes-warning.js"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<?php wp_head(); ?>
		<!-- Google Analytics track code -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-103366577-1', 'auto');
			ga('send', 'pageview');
		</script>
		<!-- Hotjar Tracking Code for http://ibgh.org.br -->
		<script>
			(function(h,o,t,j,a,r){
			    h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
			    h._hjSettings={hjid:575713,hjsv:5};
			    a=o.getElementsByTagName('head')[0];
			    r=o.createElement('script');r.async=1;
			    r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
			    a.appendChild(r);
			})(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
		</script>
		<!-- Navegg Tracking Code for http://ibgh.org.br -->
		<script type="text/javascript">
			var nvgId = 46704;
			var nvgAsync = false;
			(function() {
			var nvg = document.createElement('script');
			nvg.id="navegg";
			nvg.type = 'text/javascript';
			nvg.async = nvgAsync;
			nvg.src='https://tag.navdmp.com/tm'+nvgId+'.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(nvg, s);
			})();
		</script>
	</head>
	<body <?php body_class(); ?> >
		<?php
			global $post;
			$url = get_permalink($post->ID);

			$sel_header = 'unidades/hospital-estadual-ernestina-lopes-jaime/';
			$sel_head = 'heelj';
			$sel_header1 = 'unidades/hospital-municipal-de-araguaina/';
			$sel_head1 = 'hma';
			$sel_header2 = 'unidades/upa-araguaina/';
			$sel_head2 = 'upa-araguaina';
			$sel_header3 = 'unidades/upa-macapa/';
			$sel_head3 = 'upa-macapa';

			    if(strpos("[".$url."]", "$sel_header") || strpos("[".$url."]", "$sel_head" ))
			    {
				    get_template_part( 'headers/header', 'heelj' );
			    }
			    else if (strpos("[".$url."]", "$sel_header1") || strpos("[".$url."]", "$sel_head1"))
			    {
				    get_template_part( 'headers/header', 'ibgh' );
			    }else if (strpos("[".$url."]", "$sel_header2") || strpos("[".$url."]", "$sel_head2"))
			    {
				    get_template_part( 'headers/header', 'upa-araguaina' );
			    }else if (strpos("[".$url."]", "$sel_header3") || strpos("[".$url."]", "$sel_head3"))
			    {
				    get_template_part( 'headers/header', 'upa-macapa' );
			    }else
			    {
				    get_template_part( 'headers/header', 'ibgh' );
			    }
			?>
