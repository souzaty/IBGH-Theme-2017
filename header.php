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
        <div class="container ghost">
        	<!-- ### Menu topo ### -->
        	<nav class="navbar navbar-default navbar-custom-top">
        		<div class="container">
        			<div class="container-fluid">
        				<!-- Brand and toggle get grouped for better mobile display -->
        				<!-- Collect the nav links, forms, and other content for toggling -->
        				<div class="col-md-3">
        					<div class="navbar-header" style="width:100%;">
        						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        						<span class="sr-only">Toggle navigation</span>
        						<span class="icon-bar"></span>
        						<span class="icon-bar"></span>
        						<span class="icon-bar"></span>
        						</button>
        						<a class="navbar-brand" href="http://ibgh.org.br/">
        						<span class="logo top"></span>
        						</a>
        					</div>
        				</div>
        					<?php wp_nav_menu( array(

        						'menu' => 'menu_topo_ibgh',

        						'theme_location' => 'menu_topo_ibgh',

        						'container' => 'div',

        						'container_class' => 'collapse navbar-collapse',

        						'container_id' => 'bs-example-navbar-collapse-1',

        						'menu_class' => 'nav navbar-nav navbar-right',

        						'echo' => true,

        						'menu_id' => 'id_do_menu',

        						'before' => "",

        						'after' => "",

        						'link_before' => "",

        						'link_after' => "",

        						'depth' => 0,

        						'walker' => "",

        						) );
        					?>
        			<!-- /.navbar-collapse -->
        			</div><!-- /.container-fluid -->
        		</div>
        	</nav>
        </div>
        <div class="container-fluid clearHeader">
        	<div class="row">
        		<!-- ### Menu Principal ### -->
        		<nav id="mainNav" class="navbar navbar-default navbar-custom">
        			<div class="container">
        				<div class="row">
        					<div class="col-md-3">
        						<div class="navbar-header" style="width:100%; margin-top: 20px !important;">
        							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse" aria-expanded="false">
        							<span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
        							</button>
        							<a class="navbar-brand" href="http://ibgh.org.br/">
        							<span class="logo"></span>
        							</a>
        						</div>
        					</div>
        					<div class="col-md-9" style="padding:0;">
        						<?php wp_nav_menu ( array (

        							'menu' => 'menu_principal_ibgh',

        							'theme_location' => 'menu_principal_ibgh',

        							'container' => 'div',

        							'container_class' => 'collapse navbar-collapse',

        							'container_id' => 'bs-example-navbar-collapse',

        							'menu_class' => 'nav navbar-nav navbar-right',

        							'echo' => true,

        							'menu_id' => 'id-menu',

        							'before' => "",

        							'after' => "",

        							'link_before' => "",

        							'link_after' => "",

        							'depth' => 0,

        							'walker' => ""

        							) );
        						?>
        					</div>
        				</div>
        				<!-- Modal1 -->
        				<div class="modal fade bg-modal-menu" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
        					<div class="modal-dialog" role="document">
        						<div class="modal-content">
        							<div class="modal-header">
        								<button type="button" class="close" data-dismiss="modal"
        									aria-label="Close">
        								<span aria-hidden="true">&times;</span>
        								</button>
        							</div>
        							<div class="modal-body">
        								<div class="row row-modal">
        									<div class="container">
        										<div class="col-md-12">
        											<h1>IBGH</h1>
        										</div>
        										<div class="col-md-4 separator">
        											<?php wp_nav_menu ( array (

        												'menu' => 'menu_principal_modal_oibgh_c1',

        												'theme_location' => 'menu_principal_modal_oibgh_c1',

        												'container' => 'div',

        												'container_class' => 'mega-menu',

        												'container_id' => '',

        												'menu_class' => '',

        												'echo' => true,

        												'menu_id' => 'id-menu',

        												'before' => "",

        												'after' => "",

        												'link_before' => "",

        												'link_after' => "",

        												'depth' => 0,

        												'walker' => ""

        												) );
        											?>
        										</div>
        										<!-- coluna 2 -->
        										<div class="col-md-4 separator">
        											<?php wp_nav_menu ( array (

        												'menu' => 'menu_principal_modal_oibgh_c2',

        												'theme_location' => 'menu_principal_modal_oibgh_c2',

        												'container' => 'div',

        												'container_class' => 'mega-menu',

        												'container_id' => '',

        												'menu_class' => '',

        												'echo' => true,

        												'menu_id' => 'id-menu',

        												'before' => "",

        												'after' => "",

        												'link_before' => "",

        												'link_after' => "",

        												'depth' => 0,

        												'walker' => ""

        												) );
        											?>
        										</div>
        										<!-- coluna 3 -->
        										<div class="col-md-4 separator last">
        											<?php wp_nav_menu ( array (

        												'menu' => 'menu_principal_modal_oibgh_c3',

        												'theme_location' => 'menu_principal_modal_oibgh_c3',

        												'container' => 'div',

        												'container_class' => 'mega-menu',

        												'container_id' => '',

        												'menu_class' => '',

        												'echo' => true,

        												'menu_id' => 'id-menu',

        												'before' => "",

        												'after' => "",

        												'link_before' => "",

        												'link_after' => "",

        												'depth' => 0,

        												'walker' => ""

        												) );
        											?>
        										</div>
        									</div>
        								</div>
        							</div>
        						</div>
        					</div>
        				</div><!-- /#Modal1 -->
        				<!-- Modal2 -->
        				<div class="modal fade bg-modal-menu" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal2" aria-hidden="true">
        					<div class="modal-dialog" role="document">
        						<div class="modal-content">
        							<div class="modal-header">
        								<button type="button" class="close" data-dismiss="modal"
        									aria-label="Close">
        								<span aria-hidden="true">&times;</span>
        								</button>
        							</div>
        							<div class="modal-body">
        								<div class="row row-modal">
        									<div class="container">
        										<div class="col-md-12">
        											<h1>UNIDADES</h1>
        										</div>
        										<div class="col-md-12">
        											<?php wp_nav_menu ( array (

        												'menu' => 'menu_principal_modal_unidades',

        												'theme_location' => 'menu_principal_modal_unidades',

        												'container' => 'div',

        												'container_class' => 'mega-menu',

        												'container_id' => '',

        												'menu_class' => '',

        												'echo' => true,

        												'menu_id' => 'id-menu',

        												'before' => "",

        												'after' => "",

        												'link_before' => "",

        												'link_after' => "",

        												'depth' => 0,

        												'walker' => ""

        												) );
        											?>
        										</div>
        									</div>
        								</div>
        							</div>
        						</div>
        					</div>
        				</div><!--/#Modal2 -->
        			</div>
        		</nav>
        	</div>
        </div>
