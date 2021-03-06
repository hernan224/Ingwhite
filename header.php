<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head <?php do_action( 'add_head_attributes' ); ?>>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(' - '); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10&appId=879897482081350";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

		<div id="container">
			
			<div id="top-header" class="hidden-xs">
				<div class="wrap cf">
					
					<?php // Show the date
                    $dias = array(
                       'Sunday'    =>  'Domingo',
                       'Monday'    =>  'Lunes',
                       'Tuesday'   =>  'Martes',
                       'Wednesday' =>  'Miércoles',
                       'Thursday'  =>  'Jueves',
                       'Friday'    =>  'Viernes',
                       'Saturday'  =>  'Sábado'
                    );

                    $meses = array(
                        'January'   => 'Enero',
                        'February'  => 'Febrero',
                        'March'     => 'Marzo',
                        'April'     => 'Abril',
                        'May'       => 'Mayo',
                        'June'      => 'Junio',
                        'July'      => 'Julio',
                        'August'    => 'Agosto',
                        'September' => 'Septiembre',
                        'October'   => 'Octubre',
                        'November'  => 'Noviembre',
                        'December'  => 'Diciembre'
                    );
					
					date_default_timezone_set('America/Argentina/Buenos_Aires');

                    $day = date('l');
                    $numero_dia = date('j');
                    $month = date('F');
                    $year = date('Y');

                    ?>
					<span class="header-date">
                        <?php echo "$dias[$day] $numero_dia de $meses[$month] de $year"; ?>
            						<!--Viernes 22 de Septiembre de 2017-->
                    </span>

                    <span id="radio-feeling" class="radio-stream" style="padding-right: 1em;">
                      <a href="http://www.feelingsradiopuerto.com/" target="_bank" onclick="window.open(this.href, this.target, 'width=380,height=350'); return false;">
                        Escuchá online Feelings Radio Puerto 
                        <i class="fa fa-lg fa-play-circle" style="margin-left: 0.5em;"></i>
											</a>
                    <!-- BEGINS: AUTO-GENERATED MUSES RADIO PLAYER CODE 
<script type="text/javascript" src="https://hosted.muses.org/mrp.js"></script>
<script type="text/javascript">
    MRP.insert({
        'url':'http://www.genexproducciones.net:8218/;',
        'lang':'es',
        'codec':'aac',
        'volume':70,
        'autoplay':false,
        'buffering':5,
        'title':'Feeling Radio',
        'wmode':'transparent',
        'skin':'player-stm',
        'width':128,
        'height':30
    });
</script>
 ENDS: AUTO-GENERATED MUSES RADIO PLAYER CODE -->
                    </span>

						
				</div>
					
			</div>

            <?php
                $bg_num = rand(1, 3);

                if (isset($bg_num)){
                    $clase_header = "bg-$bg_num";
                }else{
                    $clase_header = 'bg-0';
                }
            ?>

			<header class="header bg-foto <?php echo $clase_header ?>" role="banner">

				<div id="inner-header" class="wrap cf">

                    <div class="row around-xs">
                        <div class="col-xs-9 col-sm-8">
                          <!-- LOGO NORMAL -->
                            <a id="logo" href="<?php echo home_url(); ?>" rel="nofollow">Ingenierowhite.com</a>
                          
                          <!-- LOGO NAVIDAD -->
                          <!--<a id="logo" href="<?php //echo home_url(); ?>" rel="nofollow" style="background: transparent url('http://ingenierowhite.com/sitio_core/wp-content/themes/Ingwhite/library/images/header-logo-navidad.png') no-repeat center center; background-size: contain; height: 90px; margin-top: 1rem;">Ingenierowhite.com</a>-->
                        </div>  <!--end of #logo -->
                        
                        <div class="col-xs-3 col-sm-4">

                            <?php
                            /** Obtener el zip y extraer XML con la informacion del clima **/
                            $urlClima = 'http://ingenierowhite.com/clima/';
                            $zipNombre = 'AccuWheaterGlobalCurrent_16453.zip';
                            $copiaZip = 'ClimaActual.zip';
                            $pathXML = '/library/clima/';
                            $xmlNombre = 'AccuWheaterGlobalCurrent_16453.xml';



                            $rutaDestino = realpath(get_template_directory().$pathXML.$copiaZip);
                            //echo $rutaDestino;
                            //if (copy('http://ingenierowhite.com/clima/AccuWheaterGlobalCurrent_16453.zip', $rutaDestino)){
                            if (!@copy('http://ingenierowhite.com/clima/AccuWheaterGlobalCurrent_16453.zip', $rutaDestino)):

                                echo '<p class="clima-sin-datos text-center">No hay información meteorológica disponible. <br/> Para conocer el estado del tiempo <a class="clima-link" target="_blank" rel="nofollow" href="http://www.accuweather.com/es/ar/ingeniero-white/7702/weather-forecast/7702">haga click aquí</a>.</p>';

                            else:
                                $stringXML = file_get_contents('zip://'.$rutaDestino.'#'.$xmlNombre);

                                libxml_use_internal_errors(true);
                                $clima_ob = simplexml_load_string($stringXML);

                                ?>
                                <div class="clima-container hidden-xs">
                                <?php if($clima_ob === FALSE) : ?>
                                    <p class="clima-sin-datos text-center">No hay información meteorológica disponible. <br/> Para conocer el estado del tiempo <a class="clima-link" target="_blank" rel="nofollow" href="http://www.accuweather.com/es/ar/ingeniero-white/7702/weather-forecast/7702">haga click aquí</a>.</p>

                                <?php else : ?>
                                    <?php
                                        $iconoClima = array(
                                            1=>'wi-day-sunny',
                                            2=>'wi-day-sunny-overcast',
                                            3=>'wi-day-cloudy',
                                            4=>'wi-day-cloudy',
                                            5=>'wi-day-haze',
                                            6=>'wi-day-cloudy-high',
                                            7=>'wi-cloud',
                                            8=>'wi-cloudy',
                                            11=>'wi-fog',
                                            12=>'wi-showers',
                                            13=>'wi-day-showers',
                                            14=>'wi-day-showers',
                                            15=>'wi-thunderstorm',
                                            16=>'wi-day-thunderstorm',
                                            17=>'wi-day-storm-showers',
                                            18=>'wi-rain',
                                            19=>'wi-snow-wind',
                                            20=>'wi-day-snow-wind',
                                            21=>'wi-day-snow-wind',
                                            22=>'wi-snow',
                                            23=>'wi-day-snow',
                                            24=>'wi-hail',
                                            25=>'wi-sleet',
                                            26=>'wi-rain-mix',
                                            29=>'wi-rain-mix',
                                            30=>'wi-hot',
                                            31=>'wi-snowflake-cold',
                                            32=>'wi-strong-wind',
                                            33=>'wi-night-clear',
                                            34=>'wi-night-alt-partly-cloudy',
                                            35=>'wi-night-alt-cloudy',
                                            36=>'wi-night-alt-cloudy',
                                            37=>'wi-night-fog',
                                            38=>'wi-night-alt-cloudy-high',
                                            39=>'wi-night-alt-showers',
                                            40=>'wi-night-alt-rain',
                                            41=>'wi-night-alt-storm-showers',
                                            42=>'wi-night-alt-thunderstorm',
                                            43=>'wi-night-alt-snow',
                                            44=>'wi-night-alt-snow-wind'
                                        );

                                        $numeroIcono = $clima_ob->location->icon;
                                    ?>

                                    <div class="clima-estado-general">



                                        <i class="clima-icono wi <?php echo $iconoClima[intval($numeroIcono)]; ?>"></i>

                                        <?php $temperatura = $clima_ob->location->temp;
                                        if ($temperatura != '') :  ?>
                                        <span class="clima-temp"><?php echo $temperatura ?>°C</span>
                                        <?php endif ?>
                                        <?php $condicion = $clima_ob->location->SPL;
                                            if ($condicion != '') :  ?>
                                        <p class="estado-descripcion"><?php echo $condicion ?></p>
                                         <?php endif; ?>
                                        <!--<a class="clima-btn" target="_blank" rel="nofollow" href="http://www.accuweather.com/es/ar/ingeniero-white/7702/weather-forecast/7702">Ver pronóstico extendido  <i class="fa fa-chevron-right"></i></a>-->
                                      <a class="clima-btn" href="http://ingenierowhite.com/pronostico-clima/">Ver pronóstico extendido  <i class="fa fa-chevron-right"></i></a>
                                    </div>
                                    <div class="clima-detalle">
                                        <?php $st = $clima_ob->location->real_feel;
                                        if ($st != '') :  ?>
                                        <span class="clima-st"><i class="wi wi-thermometer"></i> &nbsp;<?php echo $temperatura ?>°C</span>
                                        <?php endif; ?>

                                        <?php
                                        $viento_ang = strtolower($clima_ob->location->wind_dir);
                                        $viento_vel = $clima_ob->location->windspeed;
                                        $viento_dir = str_replace('W', 'O', $clima_ob->location->wind_dir);
                                        if ($viento_vel != '' && $viento_dir != '') :  ?>
                                            <span class="clima-viento"><i class="<?php echo 'wi wi-wind-direction wi-towards-'.$viento_ang ?>"></i>&nbsp;<?php echo $viento_vel .'&nbsp;'. $clima_ob->location->windspeed['unit'] .'&nbsp;' . $viento_dir ?></span>
                                        <?php endif; ?>
                                        <br class="clima-separador"/>
                                        <?php $humedad = $clima_ob->location->rhumid;
                                        if ($humedad != '') :  ?>
                                        <span class="clima-humedad"><i class="wi wi-humidity"></i>&nbsp;<?php echo $humedad ?>%</span>
                                        <?php endif; ?>

                                        <?php $presion = $clima_ob->location->pres;
                                        if ($presion != '') :  ?>
                                        <span class="clima-pres"><i class="wi wi-barometer"></i>&nbsp;<?php echo ($presion*10) ?>&nbsp;HPa</span>
                                        <?php endif; ?>

                                    </div>


                                <?php endif; ?>
                                </div>
                            <?php endif; ?>





<!--                            Botones sociales para telefono-->
                            <ul class="header-social row show-xs">
                                <!--<li><a href="<?php bloginfo('rss2_url'); ?>" target="_blank" title="RSS Feed"><i class="fa fa-lg fa-rss"></i></a></li>-->
                               <!-- <li><a href="https://www.facebook.com/IngenieroWhiteOficial" target="_blank" title="Facebook"><i class="fa fa-lg fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/IWOficial" target="_blank" title="Twitter"><i class="fa fa-lg fa-twitter"></i></a></li>
                                <li><a href="https://www.flickr.com/photos/128423552@N08" target="_blank" title="Flickr"><i class="fa fa-lg fa-flickr"></i></a></li>
                              	<li><a title="Youtube" target="_blank" href="https://www.youtube.com/channel/UCqRlBKULtbYGe-dCTvj8k6w"><i class="fa fa-lg fa-youtube"></i></a></li>-->
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search fa-lg"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <?php get_search_form(); ?>
                                    </div>
                                </li>
                            </ul>


                        </div> <!-- end of buscador -->
                    </div>
          
          <!-- 

				--------------ESTO ES PARA MOSTAR EL CLIMA Y LA RADIO EN LOS TELÉFONOS------------------

 					--->

          <div class="info-movil row around-xs hidden-sm hidden-md hidden-lg" style="align-items:flex-end;margin:-1em 0 -2em 0;">
          	<div class="col-xs-6">
            	<div class="clima-estado-general text-center" style="color:#fff;">
                <i class="clima-icono wi <?php echo $iconoClima[intval($numeroIcono)]; ?>" style="font-size:1.5em;"></i>

                <?php $temperatura = $clima_ob->location->temp;
                if ($temperatura != '') :  ?>
                <span class="clima-temp" style="font-size:1.5em;"><?php echo $temperatura ?>°C</span>
                <?php endif ?>
                <?php $condicion = $clima_ob->location->SPL;
                  if ($condicion != '') :  ?>
                <p class="estado-descripcion"><?php echo $condicion ?></p>
                <?php endif; ?>
                <a class="clima-btn" href="http://ingenierowhite.com/pronostico-clima/" style="background-color:#fff;padding: 0.5em 1.5em;font-size:0.85em;font-weight:700;text-decoration:none;">Ver más <i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            
            
            <div class="col-xs-6">
              <a href="http://ingenierowhite.com/radio/radio.html" onclick="window.open(this.href, this.target, 'width=400,height=350'); return false;" target="_blank" class="btn--radio radio-movil" style="display:flex; background-color:#FF3D25; color:#fff; padding:0.5em;justify-content: center;align-items: center;text-decoration:none;">
                <i class="fa fa-volume-up fa-2x" aria-hidden="true" style="padding-right: 0.5em"></i>
                <h6 style="margin:0;color:#fff;">Escuchanos en vivo </h6>
              </a>
            </div>
          </div>
                

				</div> <!-- end of #inner-header -->

                <nav id="nav-principal" class="cf" role="navigation">

                    <div class="wrap cf">
                        <div class="row between-xs">
                            <div class="col-xs-12 col-sm-6 col-md-9">
                           <!-- <div class="col-xs-12">-->
                                <?php wp_nav_menu(array(
                                    'container' => false,                           // remove nav container
                                    'container_class' => 'menu cf',                 // class of container (should you choose to use it)
                                    'menu' => __('The Main Menu', 'bonestheme'),    // nav name
                                    'menu_class' => 'nav top-nav cf',               // adding custom nav class
                                    'theme_location' => 'main-nav',                 // where it's located in the theme
                                    'before' => '',                                 // before the menu
                                    'after' => '',                                  // after the menu
                                    'link_before' => '',                            // before each link
                                    'link_after' => '',                             // after each link
                                    'depth' => 0,                                   // limit the depth of the nav
                                    'fallback_cb' => ''                             // fallback function (if there is one)
                                )); ?>

                            </div>
                            <div class="col-sm-6 col-md-3 last-col">
                                <ul class="header-social row">
                                    <!--<li><a href="<?php bloginfo('rss2_url'); ?>" target="_blank" title="RSS Feed"><i class="fa fa-lg fa-rss"></i></a></li>-->
                                    <li><a href="https://www.facebook.com/IngenieroWhiteOficial" target="_blank" title="Facebook"><i class="fa fa-lg fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/IWOficial" target="_blank" title="Twitter"><i class="fa fa-lg fa-twitter"></i></a></li>
                                    <li><a href="https://www.flickr.com/photos/128423552@N08" target="_blank" title="Flickr"><i class="fa fa-lg fa-flickr"></i></a></li>
                                  	<li><a title="Youtube" target="_blank" href="https://www.youtube.com/channel/UCqRlBKULtbYGe-dCTvj8k6w"><i class="fa fa-lg fa-youtube"></i></a></li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search fa-lg"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <?php get_search_form(); ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>

                </nav>

			</header>