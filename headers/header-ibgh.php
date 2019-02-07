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
