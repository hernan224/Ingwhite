<?php get_header(); ?>

<?php
//Array con los ids de los posts que ya se mostraron
global $posts_excluidos;

//Mostrar noticias destacadas unicamente en el Home
/*if ( $paged < 2 ){*/
    get_template_part( 'content', 'destacadas_home' );
/*}*/

?>


            <section class="cuerpo_central--home">

				<div class="wrap row between-md">

						<div id="main" class="col-xs-12 col-md-8" role="main">

                            <!--Widget para publicidad ancho de contenido-->

                            <?php get_sidebar('publi_ac'); ?>

                            <!--Fin widget publicidad ancho contenido-->


                                <div id="masonry" class="masonry">

                                    <div class="sizer masonry--sizer"></div>
                                    <div class="sizer gutter--sizer"></div>

                                <?php

                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                $modificar_query['paged'] = $paged;
                                    /** Preparando Query principal **/
                                if (isset($posts_excluidos) && (count($posts_excluidos) > 0)){
                                    $modificar_query['post__not_in'] = $posts_excluidos;
                                }

                                //$modificar_query['posts_per_page'] = 15;

                                $args = array_merge($wp_query->query_vars, $modificar_query);

                                $home_query = new WP_query($args);

                                ?>

                                <?php if ($home_query->have_posts() && ($paged < 2)) :
                                    $i=1;

                                    while ($home_query->have_posts()) : $home_query->the_post(); ?>

                                        <?php if ($i === 4 /*&& $paged < 2*/) :  //Muestro publi interna 1?>

                                            <?php get_sidebar('publi_i1'); ?>

                                            <div class="item--masonry">

                                                <?php get_template_part( 'content', 'noticias' );	?>

                                            </div> <!--/.item--masonry-->

                                        <?php elseif($i === 7 /*&& $paged < 2*/) : //Muestro publi internar 2?>

                                            <?php get_sidebar('publi_i2'); ?>

                                            <div class="item--masonry">

                                                <?php get_template_part( 'content', 'noticias' );	?>

                                            </div> <!--/.item--masonry-->

                                        <?php else : //Muestro noticia?>

                                            <div class="item--masonry">

                                                <?php get_template_part( 'content', 'noticias' );	?>

                                            </div> <!--/.item--masonry-->

                                        <?php endif; ?>

                                        <?php /*if ($paged < 2) {*/
                                            //array_push($posts_excluidos, get_the_ID());
                                            $posts_actuales[] = $post->ID;
                                        /*}*/ ?>

                                        <?php $i++; ?>

                                    <?php endwhile; ?>

                                </div> <!--/#masonry-->

                                        <?php //bones_page_navi(); ?>

                                <?php else : ?>

                                    <div class="col-xs-12">

                                        <?php get_template_part( 'content', 'sin_noticias' );	?>

                                    </div>

                                <?php endif; ?>

                            <?php
                                if (isset($posts_actuales) && (count($posts_actuales) > 0)){
                                    $posts_excluidos = array_merge($posts_excluidos, $posts_actuales);
                                }

                                wp_reset_postdata();

                            //print_r($posts_excluidos);
                            ?>


						</div>

                    <div class="col-xs-12 col-md-4">

                        <?php get_sidebar('principal'); ?>

                    </div>

				</div>

            </section> <!--/.cuerpo_central--home-->

        <?php

        /* Seccion noticias deportes en Home */
            $categoria_query = 'deportes';
            include(locate_template('content-cat_home.php'));
        ?>

        <?php
            /* Seccion noticias deportes en Home */
            $categoria_query = 'puerto';
            include(locate_template('content-cat_home.php'));
        ?>




<?php get_footer(); ?>
