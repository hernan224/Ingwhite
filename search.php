<?php get_header(); ?>

        <div id="content">

            <div id="inner-content" class="wrap row between-md">

                <div id="main" class="col-xs-12 col-md-8" role="main">
						<h1 class="archive-title"><span><?php _e( 'Search Results for:', 'bonestheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

                    <!--Widget para publicidad ancho de contenido-->
                    <?php get_sidebar('publi_ac'); ?>
                    <!--Fin widget publicidad ancho contenido-->


                    <?php if (have_posts()) : ?>

                        <div id="masonry" class="masonry">

                            <div class="sizer masonry--sizer"></div>
                            <div class="sizer gutter--sizer"></div>

                            <?php while (have_posts()) : the_post(); ?>

                                <div class="item--masonry">

                                    <?php get_template_part( 'content', 'noticias' );	?>

                                </div> <!--/.item--masonry-->

                            <?php endwhile; ?>

                        </div> <!--/#masonry-->

								<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Sorry, No Results.', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Try your search again.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the search.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

                        <div class="col-xs-12 col-md-4">

                            <?php get_sidebar('principal'); ?>

                        </div>

					</div>

			</div>

<?php get_footer(); ?>
