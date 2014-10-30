<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap row between-md">

						<div id="main" class="col-xs-12 col-md-8" role="main">


							<?php if (is_category()) { ?>
								<h1 class="archive-title h2">
									<span><?php //_e( 'Posts Categorized:', 'bonestheme' ); ?></span> <?php single_cat_title(); ?>
								</h1>

							<?php } elseif (is_tag()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Posts Tagged:', 'bonestheme' ); ?></span> <?php single_tag_title(); ?>
								</h1>

							<?php } elseif (is_author()) {
								global $post;
								$author_id = $post->post_author;
							?>
								<h1 class="archive-title h2">

									<span><?php _e( 'Posts By:', 'bonestheme' ); ?></span> <?php the_author_meta('display_name', $author_id); ?>

								</h1>
							<?php } elseif (is_day()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Archivo:', 'bonestheme' ); ?></span> <?php the_time('l, j de F de Y'); ?>
								</h1>

							<?php } elseif (is_month()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e( 'Archivo:', 'bonestheme' ); ?></span> <?php the_time('F Y'); ?>
									</h1>

							<?php } elseif (is_year()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e( 'Archivo:', 'bonestheme' ); ?></span> <?php the_time('Y'); ?>
									</h1>
							<?php } ?>


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



						</div>

                    <div class="col-xs-12 col-md-4">

                        <?php get_sidebar('principal'); ?>

                    </div>

                    <?php else : ?>



                        <?php get_template_part( 'content', 'sin_noticias' );	?>



                    <?php endif; ?>

				</div>

			</div>

<?php get_footer(); ?>
