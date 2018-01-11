<!-- ### Menu topo ### -->
<nav class="navbar navbar-default navbar-custom-hospital">
	<div class="container">
		<div class="container-fluid">

			<div class="col-md-3">


            <div class="navbar-header" style="width:100%">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>

               <span class="icon-bar"></span>

               <span class="icon-bar"></span>

               </button>

               <a class="navbar-brand" style="width:100%" href="#"></a>

            </div>

         </div>
			<!-- Brand and toggle get grouped for better mobile display -->

			<!-- Collect the nav links, forms, and other content for toggling -->

			<?php wp_nav_menu( array(



					'menu' => 'menu_topo_upa_goianesia',

					'theme_location' => 'menu_topo_upa_goianesia',

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



		</div>



		<!-- /.container-fluid -->



	</div>

</nav>



<div class="gestao-ibgh">



		 	<i class="fa fa-info" aria-hidden="true"></i>  &nbsp;



		 	<span>Esta UPA &eacute; gerida por uma Organiza&ccedil;&atilde;o Social</span>





</div>




<div id="menuibghescondido" class="collapse">



<div class="container">

  <div class="row">

  	<div class="col-md-4">



  		<?php



			if(is_active_sidebar('ibgh-menu-topo-upa-goianesia-1')){

				dynamic_sidebar('ibgh-menu-topo-upa-goianesia-1');

			}



		?>



  	</div>







  	<div class="col-md-3">



  		<?php

			if(is_active_sidebar('ibgh-menu-topo-upa-goianesia-2')){

				dynamic_sidebar('ibgh-menu-topo-upa-goianesia-2');

			}

		?>



  	</div>



  	<div class="col-md-5">

  		<?php

			if(is_active_sidebar('ibgh-menu-topo-upa-goianesia-3')){

				dynamic_sidebar('ibgh-menu-topo-upa-goianesia-3');



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





   <nav id="mainNav" class="navbar navbar-default navbar-custom-upa upa-araguaina">



      <div class="container gutter-0">



		<div class="row gutter-0">



         <div class="col-md-5">



            <div class="navbar-header" style="width:100%">



               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-3" aria-expanded="false">



               <span class="sr-only">Toggle navigation</span>



               <span class="icon-bar"></span>



               <span class="icon-bar"></span>



               <span class="icon-bar"></span>





               </button>



				<span class="navbar-brand" >

	               	<a class="" href="http://ibgh.org.br/unidades/upa-goianesia/"><span class="logo-upa-header logo-goianesia"></span></a>

				</span>



            </div>



         </div>



         <div class="col-md-7">



         <?php



									wp_nav_menu ( array (



											'menu' => 'menu_principal_upa_goianesia',

											'theme_location' => 'menu_principal_upa_goianesia',

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







   <!-- Modal 3 -->







			<div class="modal fade bg-modal-menu" id="modal6" tabindex="-1" role="dialog"







				aria-labelledby="modal6" aria-hidden="true">







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







										<h1>A UPA</h1>







									</div>







									<div class="col-md-4 separator">







										<?php















											wp_nav_menu ( array (







														'menu' => 'menu_principal_modal_ohospital_upa_goianesia_c1',







														'theme_location' => 'menu_principal_modal_ohospital_upa_goianesia_c1',







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







										<?php















											wp_nav_menu ( array (







														'menu' => 'menu_principal_modal_ohospital_upa_goianesia_c2',







														'theme_location' => 'menu_principal_modal_ohospital_upa_goianesia_c2',







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







										<?php















											wp_nav_menu ( array (







														'menu' => 'menu_principal_modal_ohospital_upa_goianesia_c3',







														'theme_location' => 'menu_principal_modal_ohospital_upa_goianesia_c3',







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