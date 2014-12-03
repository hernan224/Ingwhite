<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

    <header class="article-header">

        <p class="byline vcard">
            <?php
            $agenda_post_type = 'tribe_events';
           if ( $agenda_post_type == get_post_type() ){
              echo '<a class="categoria-noticia" href="'.site_url( "/agenda" ).'">Agenda</a>';
           }else{
                $category = get_the_category();
                if($category[0]){
                    echo '<a class="categoria-noticia" href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
                }

           }  ?>

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

</article>
