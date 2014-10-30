<?php get_header(); ?>

<?php
//Array con los ids de los posts que ya se mostraron
global $posts_excluidos;

//Mostrar noticias destacadas unicamente en el Home
/*if ( $paged < 2 ){*/
    //get_template_part( 'content', 'destacadas_home' );
/*}*/

/* Preparar query para noticias destacadas */

$post_por_pagina = 1;
$args_destacados = array(
    'post_type' => 'post',
    //'articulo_destacado' => 'articulo-destacado',
    'tax_query' => array(
        array(
            'taxonomy' => 'articulo_destacado',
            'field'    => 'slug',
            'terms'    => 'articulo-destacado',
        ),
    ),
    'posts_per_page' => $post_por_pagina,
    'fields' => 'ids'
);

$id_noticias_destacadas = get_posts( $args_destacados );


?>


            <section id="content">

				<div class="wrap row between-md">

                    <div id="main" class="col-xs-12 col-md-8" role="main">

                        <?php if (count($id_noticias_destacadas) == $post_por_pagina) : ?>

                        <section class="noticias_destacadas">

                            <?php $id_post = $id_noticias_destacadas[0]; //primer elemento ?>

                            <article id="post-<?php echo $id_post; ?> cf" class="nota--destacada destacada--principal" role="article">




                                <section class="entry-content cf">

                                    <h1 class="h2 entry-title"><a href="<?php echo get_the_permalink($id_post) ?>" rel="bookmark" title="<?php the_title_attribute(array('post'=> $id_post)); ?>"><?php echo get_the_title($id_post); ?></a></h1>

                                    <?php if ( has_post_thumbnail($id_post) ) :  ?>

                                        <figure>
                                            <a href="<?php echo get_permalink($id_post) ?>" rel="bookmark" title="<?php the_title_attribute(array('post'=> $id_post)); ?>">
                                                <?php

                                                $factor = 1.7;
                                                $ancho_th = 750;
                                                $alto_th = $ancho_th/$factor;
                                                echo get_the_post_thumbnail($id_post, array( $ancho_th, $alto_th, 'bfi_thumb' => true, 'crop' => true, 'class' => " img-responsive" ));

                                                ?>

                                            </a>
                                        </figure>

                                    <?php endif; ?>

                                    <p class="byline vcard">
                                        <?php
                                        $category = get_the_category($id_post);
                                        if($category[0]){
                                            echo '<a class="categoria-noticia" href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
                                        }
                                        ?>

                                        <span class="fecha-noticias"> <?php echo get_the_time('d/m/Y', $id_post) ?> </span>

                                        <?php //printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time('d/m/Y'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
                                    </p>


                                    <?php //the_excerpt();
                                        //echo get_the_excerpt($id_post);
                                        echo white_excerpt_by_id($id_post, 150);
                                    ?>

                                </section>
                            </article>

                        </section> <!--/noticias destacadas-->

                        <?php endif;
                        $posts_excluidos = array_merge($posts_excluidos, $id_noticias_destacadas);
                        //print_r($posts_excluidos);
                        wp_reset_postdata();?>

                        <!--Widget para publicidad ancho de contenido-->

                        <?php get_sidebar('publi_ac'); ?>

                        <!--Fin widget publicidad ancho contenido-->


                            <div id="masonry" class="masonry">

                                <div class="sizer masonry--sizer"></div>
                                <div class="sizer gutter--sizer"></div>

                            <?php

                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $modificar_query['paged'] = $paged;
                            //$modificar_query['post_type'] = 'post';
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
