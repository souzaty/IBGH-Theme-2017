<?php
	/* Template Name: TRANSPARENCIA IBGH 2018 */
	?>
<?php get_header(); ?>
<div id="transparencia-ibgh">
	<header>
		<div class="intro-heading">
			<div class="container">
				<div class="row campo-pesquisa">
					<div class="col-lg-12">
						<h1 style="color:#fff; text-align:left;">Transparência</h1>
						<h3 class="subtitulo-transparencia">Conheça nossos numeros</h3>
					</div>

				</div>
			</div>
		</div>
	</header>
</div>
<!-- Section Transparencia -->
<section>
    <div class="container interna-padrao">
    	<div class="row">
            <div class="col-md-9">
                <?php while ( have_posts() ) : the_post();
                	the_content();
                	endwhile; // End of the loop.
                	?>
            </div>
            <!-- End col-md-9 -->
            <div class="col-md-3 col-sm-12">
                <div class="conteiner-transparencia-form">
                  <h4>N&atilde;o encontrou o que procura?</h4>
                  <p>Valorizamos uma gest&atilde;o transparente. Preencha os dados abaixo e solicite.</p>
                  <?php echo do_shortcode("[gravityform id=3 title=false description=false ajax=true tabindex=49]"); ?>
                </div>
                <p class="procurar-indicador-sidebar center">ou ligue para (62) 3998-9600</p>
                <p class="procurar-indicador-sidebar center"><a href="mailto:contato@ibgh.org.br">contato@ibgh.org.br</a></p>
            </div>
    	</div>
    </div>
</section>
<?php get_footer(); ?>
