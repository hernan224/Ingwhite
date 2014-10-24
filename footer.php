			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap cf">

                    <div class="row between-sm">
                        <div class="col-md-6 col-xs-12">
                            <p class="source-org copyright"><a class="footer-logo" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/footer-logo.png" alt="Ingeniero White" /></a> Todos los derechos reservados &copy; <?php echo date( 'Y' ); ?>.</p>

                            <p class="desarrollo">
                                <strong>Diseño y Desarrollo: <a target="_blank" rel="nofollow" href="http://imotionconsulting.com.ar/">Imotion Consulting</a></strong>
                                <br/>
                                <small>Datos meteorológicos elaborados por: <a target="_blank" rel="nofollow" href="http://meteobahia.com.ar/">(C) Carlos Zotelo (CERZOS/CONICET)</a></small>

                            </p>
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <div class="social-btns footer-btns">
                                <h5>Contactate con nosotos</h5>
                                <a class="btn-social" href="#"><i class="fa fa-lg fa-facebook"></i></a>
                                <a class="btn-social" href="#"><i class="fa fa-lg fa-twitter"></i></a>
                                <a class="btn-social" href="#"><i class="fa fa-lg fa-google-plus"></i></a>
                                <a class="btn-social" href="#"><i class="fa fa-lg fa-youtube"></i></a>
                                <a class="btn-social" href="#"><i class="fa fa-lg fa-vimeo-square"></i></a>
                                <a class="btn-social" href="#"><i class="fa fa-lg fa-rss"></i></a>
                                <a class="btn-social" href="#"><i class="fa fa-lg fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
					


					<!--<nav role="navigation">
						<?php /*wp_nav_menu(array(
    					'container' => '',                              // remove nav container
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					'menu_class' => 'footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
	        			'after' => '',                                  // after the menu
    	    			'link_before' => '',                            // before each link
        				'link_after' => '',                             // after each link
        				'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); */?>
					</nav>-->
                    


				</div>

			</footer>

		</div>

        <div id="outdated">
            <h6>¡Tu navegador web está desactualizado!</h6>
            <p>Por favor, actualizalo para poder navegar esta página correctamente. <a id="btnUpdateBrowser" href="http://outdatedbrowser.com/">Actualizar el navegador ahora </a></p>
            <p class="last"><a href="#" id="btnCloseUpdateBrowser" title="Close">&times;</a></p>
        </div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
