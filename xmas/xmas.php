<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Buncar
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="yandex-verification" content="bb8de64438dc8756" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="<? bloginfo('template_directory'); ?>/images/favicon.png" type="images/png">
  <link rel="stylesheet" type="text/css" href="<? bloginfo('template_directory'); ?>/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="<? bloginfo('template_directory'); ?>/css/style.css">
  <link rel="stylesheet" type="text/css" href="<? bloginfo('template_directory'); ?>/css/responsive.css">
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

  <?
    $phone1 = get_field('phone_number', 'options');  
    $phone2 = get_field('phone_number2', 'options');  
    $place1 = get_field('place_main', 'options');  
    $hours1 = get_field('work_time', 'options');   
    $sc_icon = get_field('social_links_icon', 'options');   
    $sc_links = get_field('social_links_link', 'options');  
    $social_links = get_field('social_links', 'options');  
  ?>
	<header class="header">
  	 <div class="top_header">
  	   <div class="container">    
          <div class="row row-menu">
            <div class="col-lg-5 col-md-3 col-sm-3 col-menu"> 
              <div class="head-logo">
                <a href="<?php echo home_url(); ?>/">
                  <img src="<? bloginfo('template_directory'); ?>/images/logo1.png" alt="logo">
                </a> 
                <div class="logo-text">
                  <?=$place1; ?>
                </div>
              </div>
            </div>

            <div class="col-lg-7 col-md-9 col-sm-9 col-social"> 
              <div class="top-social">
                <ul>
                  <? foreach($social_links as $social_link){ ?>
                    <li><a href="<?=$social_link['social_links_link']; ?>" target="_blank">
                      <img src="<?=$social_link['social_links_icon']; ?>" alt="">
                    </a></li>
                  <? } ?>
                </ul>
              </div>
              <div class="head-phone">
                <a href="tel:<?php echo preg_replace('/[^0-9\+]/', '', $phone1); ?>" class="phone"><?=$phone1; ?></a>
                <a href="tel:<?php echo preg_replace('/[^0-9\+]/', '', $phone2); ?>" class="phone"><?=$phone2; ?></a>
                </div>
                <div class="head-enter">
                  <button class="btn btn-order" onClick="tModalForm.show('call');" id="call-order">Заказать звонок</button>
                </div>
              </div>
          </div>
        </div>
  	  </div>

       <div class="bottom_header">
         <div class="container">    
            <div class="row">
               <div class="col-md-12  col-xs-12"> 
	               <?php
                    wp_nav_menu( array(
                      'menu'            => 'main-menu',          
                      'container'       => 'nav',          
                      'container_class' => '',             
                      'container_id'    => 'cssmenu',              
                      'menu_class'      => '',          
                      'menu_id'         => 'main-menu',          
                      'echo'            => true,           
                      'fallback_cb'     => 'wp_page_menu',  
                      'depth'           => 0,                
                      'theme_location'  => 'top'              
                    ) );
	                ?>
                    <div class="nav-bar">
                      <a href=""> <div class="button"></div></a>
                    </div>

                <nav id="menu-mob">
	               <?php
	                    wp_nav_menu( array(
	                      'menu'            => 'mobile-menu',          
	                      'container'       => 'nav',                  
	                      'menu_id'         => 'mobile-menu',          
	                      'echo'            => true,           
	                      'fallback_cb'     => 'wp_page_menu',           
	                      'depth'           => 0,               
	                      'theme_location'  => 'mobile'              
	                    ) );
	                ?>
                   <div class="mob-menu-info">
                    <div class="head-phone">
                <a href="tel:<?php echo preg_replace('/[^0-9\+]/', '', $phone1); ?>" class="phone"><?=$phone1; ?></a>
                <a href="tel:<?php echo preg_replace('/[^0-9\+]/', '', $phone2); ?>" class="phone"><?=$phone2; ?></a>
                      </div>
                      <div class="top-social">
                        <ul>
                          <? foreach($social_links as $social_link){ ?>
                            <li><a href="<?=$social_link['social_links_link']; ?>" target="_blank">
                              <img src="<?=$social_link['social_links_icon']; ?>" alt="">
                            </a></li>
                          <? } ?>
                        </ul>
                      </div>
                        <div class="head-enter">
                          <button class="btn btn-order" onClick="tModalForm.show('call');" >Заказать звонок</button>
                        </div>
                  </div>  

                </nav>

              </div>
            </div>
          </div>
        </div>

  <script>
  jQuery(document).ready(function() {
    if ( $("#mobile-menu > li > ul").hasClass("sub-menu") ) {
     $('#menu-mob .current-page-ancestor > a').after($('<img src="<? bloginfo('template_directory'); ?>/images/menu-arrow.png" alt="">'));
    }
    var all_spans = $('#mobile-menu li ul').hide();
    $('#mobile-menu img').click(function(e){
         $( this ).toggleClass( "toggl" );
        var thisSpan = $(this).parent().find('ul'),
            isShowing = thisSpan.is(":visible");
        all_spans.hide('slow');
        if (!isShowing) {
            thisSpan.show('slow');
        }
        e.preventDefault();
    });
  });
  </script>
  </header>

	<div id="content" class="site-content">
