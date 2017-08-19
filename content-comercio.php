<?php
/**Obtener todos los datos del comercio**/
//Rubro (taxonomy)
$rubro = get_the_terms($post->ID, 'rubro_comercio');

//Servicios (taxonomy)
$servicios = get_the_terms($post->ID, 'servicio');

//Información general (custom fields)
$info = get_post_custom($post->ID);

//$info_detallada = array();

//$colapsar = false;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

    <header class="article-header">

        <p class="byline vcard gc-cat">
            <?php if(($rubro)&&(!is_wp_error( $rubro ))){
                echo $rubro[0]->name;
            }  ?>

        </p>

        <h1 class="h4 entry-title"><?php the_title(); ?></h1>
    </header>

    <section class="entry-content">

        <?php if ( has_post_thumbnail() ) : // check if the post has a Post Thumbnail assigned to it.

                $factor = 1;
                $ancho_th = 200;
                $alto_th = $ancho_th/$factor; ?>

        <div class="row cf info-rapida">

            <figure class="col-xs-4 col-sm-3">
                <?php the_post_thumbnail(array( $ancho_th, $alto_th, 'bfi_thumb' => true, 'crop' => true, 'class' => " img-responsive logo-comercio" )); ?>
            </figure>

            <div class="info-comercio col-xs-8 col-sm-9">

        <?php else : ?>
        <div class="row cf info-rapida">
            <div class="info-comercio col-xs-12">

        <?php endif; ?>


                <?php if(isset($info['domicilio'][0]) && $info['domicilio'][0] !=''): ?>
                    <p class="domicilio_comercio h6"><strong class="text-uppercase"><?php echo $info['domicilio'][0]; ?></strong>
                        <?php echo ((isset($info['localidad'][0]) && $info['localidad'][0] !='') ? '<span>, '. $info['localidad'][0].'</span>' : '');?></p>
                <?php endif ?>
                <dl class="dl-horizontal dl-contacto_comercio">
                <?php if(isset($info['telefono'][0]) && $info['telefono'][0] !=''): ?>
                    <dt class="telefono">Teléfono:</dt> <dd><span><?php echo $info['telefono'][0]; ?></span></dd>
                <?php endif ?>
                <?php if(isset($info['e-mail'][0]) && $info['e-mail'][0] !=''): ?>
                    <dt class="email">E-mail:</dt> <dd><a class="web-link" href="mailto:<?php echo $info['e-mail'][0]; ?>" target="_blank"><?php echo $info['e-mail'][0]; ?></a></dd>

                <?php endif ?>
                <?php if(isset($info['web'][0]) && $info['web'][0] !=''): ?>
                    <dt class="web">Web:</dt> <dd><a class="web-link" href="<?php echo addhttp($info['web'][0]); ?>" target="_blank"><?php echo $info['web'][0]; ?></a></dd>
                <?php endif ?>
                <?php
                if( isset($info['facebook'][0]) && $info['facebook'][0] !='' ){ $facebook = $info['facebook'][0];} else {$facebook = false;}
                if( isset($info['twitter'][0]) && $info['twitter'][0] !=''){ $twitter = $info['twitter'][0];} else {$twitter = false;}
                if( isset($info['you_tube'][0]) && $info['you_tube'][0] !=''){ $youtube = $info['you_tube'][0];} else {$youtube = false;}

                 ?>

                <?php if( $facebook || $twitter || $youtube) : ?>
                    <dt class="social">Redes sociales:</dt>
                    <dd class="social-link">
                        <?php if ($facebook) :?> <a href="<?php echo addhttp($facebook); ?>" class="facebook-link" target="_blank" ><span class="sr-only">Facebook: <?php echo $facebook; ?></span></a> <?php endif; ?>
                        <?php if ($twitter) :?> <a href="<?php echo addhttp($twitter); ?>" class="twitter-link" target="_blank" ><span class="sr-only">Twitter: <?php echo $twitter; ?></span></a> <?php endif; ?>
                        <?php if ($youtube) :?> <a href="<?php echo addhttp($youtube); ?>" class="youtube-link" target="_blank" ><span class="sr-only">Youtube: <?php echo $youtube; ?></span></a> <?php endif; ?>
                    </dd>
                <?php endif ?>

                </dl>

            </div> <!--/.info-comercio-->
        </div> <!--/.info-rapida-->

                <?php if (($servicios) && (!is_wp_error($servicios))) : ?>
                    <div class="servicios">
                        <h6>Servicios</h6>
                        <ul class="list-inline">
                            <?php foreach ($servicios as $servicio) {
                                echo '<li><i class="fa fa-dot-circle-o"></i>' . $servicio->name . '</li>';
                            } ?>
                        </ul>
                    </div>
                <?php endif; ?>

        <?php

        $info_detallada = '';

        if (isset($info['descripcion'][0]) && $info['descripcion'][0] != '') {
            $info_detallada .= '<div class="descripcion"><h6>Descripción</h6>';
            //$info_detallada .= apply_filters('the_content', $info['descripcion'][0]);
            $info_detallada .= wpautop($info['descripcion'][0]);
            $info_detallada .= '</div>';
        }

        if (isset($info['horario_atencion'][0]) && $info['horario_atencion'][0] != '') {
            $info_detallada .= '<div class="horario"><h6>Horarios de atención</h6>';
            $info_detallada .= $info['horario_atencion'][0];
            $info_detallada .= '</div>';
        }

//        if ($info_detallada != '' && shortcode_exists( 'su_spoiler' )) {
//            //echo '<div class="info-detallada">';
//            echo do_shortcode('[su_spoiler title="Ver más información" open="no" style="default" icon="plus-circle" anchor="" class="comercio-mas-info"]'.$info_detallada.'[/su_spoiler]');
//            //echo '</div>';
//        }

        if($info_detallada):?>

                <div class="colapse-container comercio-mas-info">
                    <input type="checkbox" class="check-colapse" id="checkColapse-<?php the_ID(); ?>" />
                    <label for="checkColapse-<?php the_ID(); ?>" class="colapse-title su-spoiler-title">Ver más información</label>
                    <div class="colapse-body su-spoiler-content"> <?php echo $info_detallada; ?> </div>
                </div>

        <?php endif;?>


    </section>

</article>
