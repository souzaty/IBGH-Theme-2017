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
	<div class="row">
		<!-- ### Menu Principal ### -->
		<nav id="mainNav" class="navbar navbar-default navbar-custom-heelj">
			<div class="container gutter-0">
				<div class="row gutter-0">
					<div class="col-md-4">
						<div class="navbar-header" style="width: 100%">
							<button type="button" class="navbar-toggle collapsed navbar-toggle-heelj" data-toggle="collapse" data-target="#bs-example-navbar-collapse-3" aria-expanded="false" style="z-index: 9999 !important; right: 25px; top:20px; margin-top:0;">
							<span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
							</button>
							<a class="navbar-brand" href="http://ibgh.org.br/unidades/hospital-estadual-ernestina-lopes-jaime/"><span class="logo-heelj"></span></a>
							</span>
						</div>
					</div>
					<div class="col-md-8">
						<?php wp_nav_menu ( array(

							'menu' => 'menu_principal_heelj',

							'theme_location' => 'menu_principal_heelj',

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
						<!-- /.navbar-collapse -->
					</div>
				</div>
			</div>
		</nav>
		<div class="modal fade bg-modal-menu" id="modal3" tabindex="-1" role="dialog" aria-labelledby="modal3" aria-hidden="true">
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
									<?php wp_nav_menu ( array(

										'menu' => 'menu_principal_modal_ohospital_heelj_c1',

										'theme_location' => 'menu_principal_modal_ohospital_heelj_c1',

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
									<?php wp_nav_menu ( array(

										'menu' => 'menu_principal_modal_ohospital_heelj_c2',

										'theme_location' => 'menu_principal_modal_ohospital_heelj_c2',

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
									<?php wp_nav_menu ( array(

										'menu' => 'menu_principal_modal_ohospital_heelj_c3',

										'theme_location' => 'menu_principal_modal_ohospital_heelj_c3',

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
		</div><!-- /#modal3 -->
</div>
</div>
