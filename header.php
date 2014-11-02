<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

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
                       'Friday'    =>  'Viernes'
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
                    </span>
					
					<?php // Show the weather
                        libxml_use_internal_errors(true);
                       /* Dirección del XML con los datos del clima*/
                       $clima_xml = 'http://meteorologia.cerzos-conicet.gob.ar/mobile/xml/now-bb.xml';
                       /* Objeto con la información del XML*/
                       //$clima_ob = new SimpleXMLElement(file_get_contents($clima_xml));
                       //if ()
                        $clima_ob = simplexml_load_string(file_get_contents($clima_xml));

                    ?>
					<span id="header-weather" class="pull-right">
						<?php

                        if ($clima_ob === FALSE){
                          echo 'No hay información meteorológica disponible. Consulte: <a class="clima-link" target="_blank" rel="nofollow" href="http://meteobahia.com.ar/">Meteobahía</a>' ;
                        }
                        else{
                            /** Preparo string para guardar el texto del clima**/
                            $clima_str = '';

                            /*if ($icono = $clima_ob->cc->icon !== ''){
                                $clima_str .= '<img class="img-responsive" src="http://www.meteorologia.cerzos-conicet.gov.ar/mobile/iconos/'.$icono.'.png" border="0" title="Algo nublado"/>';
                            };*/
                            /* Condición */
                            $condicion = $clima_ob->cc->condition;
                            if ($condicion != ''){
                                $clima_str .= '&nbsp;'.$condicion;
                            };
                            /* Temperatura y Sensación Térmica */
                            $temperatura = $clima_ob->cc->temp;
                            $st = $clima_ob->cc->st;
                            if($temperatura !== ''){
                                $clima_str .= '&nbsp;&nbsp;&#47;&nbsp;&nbsp;'.'<strong> T: </strong>&nbsp; ' . $temperatura . '°' . $clima_ob->cc->Units['temp'];

                                if($st != '' && !($st === $temperatura)){
                                    $clima_str .= '<span class="hidden-sm">&nbsp;&nbsp;&#47;&nbsp;&nbsp;'.'<strong>ST:</strong> &nbsp;' . $st . '°' . $clima_ob->cc->Units['temp'] . '</span>';
                                }
                            };
                            /* Humedad */
                            $humedad = $clima_ob->cc->hmid;
                            if ($humedad != ''){
                                $clima_str .= '<span class="hidden-sm">&nbsp;&nbsp;&#47;&nbsp;&nbsp;'.'<strong>H:</strong>&nbsp;' . $humedad .$clima_ob->cc->Units['hum'] . '</span>';
                            }
                            /* Presión */
                            $presion = $clima_ob->cc->pres;// . ' °'.$clima_ob->cc->Units['pres'];
                            if($presion != ''){
                                $clima_str .= '<span class="hidden-sm">&nbsp;&nbsp;&#47;&nbsp;&nbsp;'.'<strong>P:</strong>&nbsp;' . $presion .'&nbsp;'. $clima_ob->cc->Units['pres'] . '</span>';
                            }
                            /* Velocidad y dirección del viento*/
                            $viento_vel = $clima_ob->cc->wind_sp;
                            $viento_dir = $clima_ob->cc->wind_dir;
                            if ($viento_vel != '' && $viento_dir != ''){
                                $clima_str .= '&nbsp;&nbsp;&#47;&nbsp;&nbsp;'.'  <strong>V:</strong>&nbsp;' . $viento_vel .'&nbsp;'. $clima_ob->cc->Units['wind'] .'&nbsp;' . $viento_dir;
                            }

                            //print_r($clima_ob);
                            /* Muestro el clima */
                            echo $clima_str;
                            //echo ' ';
                            //echo '°'.$clima_ob->cc->Units['temp'];
                        }
                        //else { echo 'ERROR!';}
                        ?>
					</span>
						
				</div>
					
			</div>

            <?php
                $bg_num = rand(1, 6);

                if (isset($bg_num)){
                    $clase_header = "bg-$bg_num";
                }else{
                    $clase_header = 'bg-0';
                }
            ?>

			<header class="header bg-0<?php //echo $clase_header ?>" role="banner">

				<div id="inner-header" class="wrap cf">

                    <div class="row around-sm">
                        <div class="col-xs-12 col-sm-8">
                            <a id="logo" href="<?php echo home_url(); ?>" rel="nofollow">Ingenierowhite.com</a>
                        </div> <!-- end of #logo -->
                        
                        <div class="col-xs-12 col-sm-4">
                            <?php get_search_form(); ?>
                        </div> <!-- end of buscador -->
                    </div>

				</div> <!-- end of #inner-header -->

                <nav id="nav-principal" class="cf" role="navigation">

                    <div class="wrap cf">
                        <div class="row between-xs">
                            <div class="col-xs-8 col-sm-9 col-md-10">
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
                            <div class="col-xs-4 col-sm-3 col-md-2 last-col">
                                <ul class="header-social">
                                    <li><a href="#"><i class="fa fa-lg fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-lg fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>


                    </div>

                </nav>

			</header>