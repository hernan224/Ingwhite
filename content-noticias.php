<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

    <header class="article-header">

        <p class="byline vcard">
            <?php
            $category = get_the_category();
            if($category[0]){
                echo '<a class="categoria-noticia" href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
            }
            ?>

            <span class="fecha-noticias"> <?php echo get_the_time('d/m/Y') ?> </span>

            <?php //printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time('d/m/Y'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
        </p>

    </header>

    <section class="entry-content cf">

        <?php if ( has_post_thumbnail() ) : // check if the post has a Post Thumbnail assigned to it.

            $factor = 1.7;
            $ancho_th = 480;
            $alto_th = $ancho_th/$factor; ?>

        <figure>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail(array( $ancho_th, $alto_th, 'bfi_thumb' => true, 'crop' => true, 'class' => " img-responsive" )); ?>
            </a>
        </figure>

       <?php endif; ?>

        <h1 class="h3 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

        <?php the_excerpt(); ?>

    </section>

    <!--                                        <footer class="article-footer cf">-->
    <!--                                            <p class="footer-comment-count">-->
    <!--                                                --><?php //comments_number( __( '<span>No</span> Comments', 'bonestheme' ), __( '<span>One</span> Comment', 'bonestheme' ), __( '<span>%</span> Comments', 'bonestheme' ) );?>
    <!--                                            </p>-->
    <!---->
    <!---->
    <!--                            --><?php //printf( '<p class="footer-category">' . __('filed under', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>
    <!---->
    <!--                          --><?php //the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>
    <!---->
    <!---->
    <!--                                        </footer>-->

</article>
