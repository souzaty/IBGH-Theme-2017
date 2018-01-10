<div id="menuibghescondido" class="collapse">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<?php if(is_active_sidebar('ibgh-menu-topo-heelj-1')){

						dynamic_sidebar('ibgh-menu-topo-heelj-1');
					}
				?>
			</div>
			<div class="col-md-3">
				<?php if(is_active_sidebar('ibgh-menu-topo-heelj-2')){

						dynamic_sidebar('ibgh-menu-topo-heelj-2');
					}
				?>
			</div>
			<div class="col-md-5">
				<?php if(is_active_sidebar('ibgh-menu-topo-heelj-3')){

						dynamic_sidebar('ibgh-menu-topo-heelj-3');
					}
				?>
			</div>
		</div>
	</div>
</div>
<!-- ### Menu Principal ### -->
<div class="container-fluid clearHeader">
	<div class="row" style="margin: 0;">
		<!-- ### Menu Principal ### -->
		<nav id="mainNav" class="navbar navbar-default navbar-custom-hma">
			<div class="container gutter-0">
				<div class="row gutter-0">
					<div class="col-md-5">
						<div class="navbar-header hma-header" style="width:100%">
							<button type="button" class="navbar-toggle collapsed navbar-toggle-hma" data-toggle="collapse" data-target="#bs-example-navbar-collapse-3" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>Menu <i class="fa fa-bars"></i>
							</button>
							<span class="navbar-brand" >
							<a class="" href="http://ibgh.org.br/unidades/hospital-municipal-de-araguaina/"><span class="logo-hma"></span></a>
							</span>
						</div>
					</div>
					<div class="col-md-7">
						<?php wp_nav_menu ( array (

							'menu' => 'menu_principal_hma',

							'theme_location' => 'menu_principal_hma',

							'container' => 'div',

							'container_class' => 'collapse navbar-collapse',

							'container_id' => 'bs-example-navbar-collapse-3',

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
			</div>
		</nav>
		<!-- Modal 3 -->
		<div class="modal fade bg-modal-menu" id="modal4" tabindex="-1" role="dialog"
			aria-labelledby="modal4" aria-hidden="true">
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
									<h1>O Hospital</h1>
								</div>
								<div class="col-md-4 separator">
									<?php wp_nav_menu ( array (

										'menu' => 'menu_principal_modal_ohospital_hma_c1',

										'theme_location' => 'menu_principal_modal_ohospital_hma_c1',

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
								<div class="col-md-4 separator-duplo">
									<?php wp_nav_menu ( array (

										'menu' => 'menu_principal_modal_ohospital_hma_c2',

										'theme_location' => 'menu_principal_modal_ohospital_hma_c2',

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

										'menu' => 'menu_principal_modal_ohospital_hma_c3',

										'theme_location' => 'menu_principal_modal_ohospital_hma_c3',

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
		</div>
		<!-- End Modal 3 -->
	</div>
</div>
