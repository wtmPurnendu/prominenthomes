<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
 <!-- header area start -->
    <header class="header_area">
 
        <div class="container">

            <div class="logo"> 
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_field('header_logo','option')['url'];?>" alt="<?php echo get_field('header_logo','option')['alt'];?>"></a> </div>
            <div class="header_right">
                <nav id="navigation1" class="navigation">
                    <div class="nav-header">
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="nav-menus-wrapper">
                        <ul class="nav-menu align-to-right">
                            <?php
                            if ( has_nav_menu( 'primary' ) ) {

                                wp_nav_menu(
                                    array(
                                        'container'  => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'primary',
                                    )
                                );

                            } 
                            ?>
                            
                        </ul>
                    </div>
                </nav>
                <ul class="phon-call">
                    <?php if (get_field('h_phone_number','option')): ?>
                    <li><img src="<?php echo get_field('phone_logo','option')['url'];?>" alt="<?php echo get_field('phone_logo','option')['alt'];?>"></li>
                    <li><a target="_blank" href="tel:<?php echo get_field('h_phone_number','option');?>"><?php echo get_field('h_phone_number','option');?></a></li>
                    <?php endif ?>
                   
                </ul>
            </div>
        </div>
    </header>
     <div class="sidebar"> <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
            <label for="openSidebarMenu" class="sidebarIconToggle">
                <div class="spinner diagonal part-1"></div>
                <div class="spinner horizontal"></div>
                <div class="spinner diagonal part-2"></div>
            </label>
            <div id="sidebarMenu">
                <ul class="sidebarMenuInner">
                    <label for="openSidebarMenu" class="sidebarIconToggle">
                        <div class="spinner diagonal part-3"></div>
                        <div class="spinner diagonal part-4"></div>
                    </label>
                    <div class="sidebar-logo">
                        <a href="<?php echo home_url(); ?>"><img src="<?php echo get_field('header_logo','option')['url'];?>" alt="<?php echo get_field('header_logo','option')['alt'];?>"></a>
                    </div>
                    <li><a href=""><i class="fas fa-home"></i> MOVE-IN READY</a></li>


                    <li class="clearfix"> <a href="" class="nav-item nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"><i class="fas fa-search"></i> FIND YOUR HOME</a>
                        <div class="dropdown-menu">
                            <a class="" href="#">Link 1</a>
                            <a class="" href="#">Link 2</a>

                        </div>

                    </li>

                    <li class="clearfix"> <a href="" class="nav-item nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"><i class="fas fa-map-marker-alt"></i> WHERE WE BUILD</a>
                        <div class="dropdown-menu">
                            <a class="" href="#">Link 1</a>
                            <a class="" href="#">Link 2</a>

                        </div>

                    </li>
                    <li><a href=""><i class="fas fa-key"></i> RENTALS</a></li>
                    

                    <li class="clearfix"> <a href="" class="nav-item nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"><i class="fas fa-shield-alt"></i> WHY TRUMAN?</a>
                        <div class="dropdown-menu">
                            <a class="" href="#">Link 1</a>
                            <a class="" href="#">Link 2</a>

                        </div>

                    </li>



                    <li class="clearfix"> <a href="" class="nav-item nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"><i class="fas fa-tools"></i> SERVICE & SUPPORT</a>
                        <div class="dropdown-menu">
                            <a class="" href="#">Link 1</a>
                            <a class="" href="#">Link 2</a>

                        </div>

                    </li>

                    <div class="hold-us-menu-txt">
                        <a href="">Hold Us to Higher Standards</a>
                    </div>
                </ul>
            </div>
        </div>

    <!-- header area stop -->