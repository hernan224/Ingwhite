			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap cf">

                    <div class="row between-sm">
                    	
                        <div class="source-org">
                        	
                        	<a class="footer-logo" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/footer-logo.png" alt="Ingeniero White" /></a>
                            <p class="copyright">
                            	Todos los derechos reservados &copy; <?php echo date( 'Y' ); ?>. Por <a target="_blank" rel="nofollow" href="http://imotionconsulting.com.ar/">Imotion Consulting</a>
<!--                            	<br />-->
<!--                            	Datos meteorológicos por: <a target="_blank" rel="nofollow" href="http://meteobahia.com.ar/">&copy; Carlos Zotelo (CERZOS/CONICET)</a>-->
                            </p>
                            
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <ul class="social-footer">
                                <li><a title="Facebook" target="_blank" href="https://www.facebook.com/IngenieroWhiteOficial"><i class="fa fa-lg fa-facebook"></i></a></li>
                                <li><a title="Twitter" target="_blank" href="https://twitter.com/IWOficial"><i class="fa fa-lg fa-twitter"></i></a></li>
                                <li><a title="Flickr" target="_blank" href="https://www.flickr.com/photos/128423552@N08"><i class="fa fa-lg fa-flickr"></i></a></li>
                                <li><a title="Youtube" target="_blank" href="https://www.youtube.com/channel/UCqRlBKULtbYGe-dCTvj8k6w"><i class="fa fa-lg fa-youtube"></i></a></li>
                                <!--<li><a title="Vimeo" target="_blank" href="https://vimeo.com/ingenierowhite"><i class="fa fa-lg fa-vimeo-square"></i></a></li>-->
                                <li><a title="RSS Feed" target="_blank" href="<?php bloginfo('rdf_url'); ?>"><i class="fa fa-lg fa-rss"></i></a></li>
                                <li><a title="Contacto" href="mailto:contacto@ingenierowhite.com"><i class="fa fa-lg fa-envelope"></i></a></li>
                            </ul>
                        </div>
                        
                        <nav role="navigation">
							<?php wp_nav_menu(array(
	    					'container' => '',                              // remove nav container
	    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
	    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
	    					'menu_class' => 'footer-nav cf',                // adding custom nav class
	    					'theme_location' => 'footer-links',             // where it's located in the theme
	    					'before' => '',                                 // before the menu
		        			'after' => '',                                  // after the menu
	    	    			'link_before' => '',                            // before each link
	        				'link_after' => '',                             // after each link
	        				'depth' => 0,                                   // limit the depth of the nav
	    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
							)); ?>
						</nav>
                        
                    </div>
                    
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
