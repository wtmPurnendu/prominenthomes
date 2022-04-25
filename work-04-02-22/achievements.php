<?php 
/**
 * Template Name: Achievements
 * 
 */ 

get_header(); ?>
<!------- inner banner area start -------->
<section class="inner-banner-area">
    <div class="container">
        <h1><?php echo the_title(); ?></h1>
        <ul class="pagger">
            <li><a href="<?php echo home_url(); ?>">Home</a></li>
            <li><a href="<?php echo home_url('/about-us/'); ?>">About</a></li>
            <li><?php echo the_title(); ?></li>
        </ul>
    </div>
</section>
<!------- inner banner area stop -------->
<?php
    $id = get_the_ID();
?>
<!------- our team area start -------->
<section class="main-area our-team-area achivments-area">
    <div class="container">
        <div class="heading-area mb-3 mb-lg-5 text-center">
            <p><?php echo get_the_content($id); ?></p>
        </div>
        <div class="row">
            <?php 
    $args = array( 'post_type' => 'achievement','orderby' => 'ID','order' => 'ASC','posts_per_page' => -1 );
    $loop = new WP_Query( $args );           
    while ( $loop->have_posts() ) : $loop->the_post();                          
    $imgurl = get_the_post_thumbnail_url( get_the_ID(), 'full' );
    $content = get_the_excerpt();
    $title = get_the_title();
  
    
    $image_id = get_post_thumbnail_id();
    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
    $image_title = get_the_title($image_id);
?>
            <div class="col-sm-6 col-lg-4">
                <div class="team-box">
                    <img src="<?php echo $imgurl;?>" alt="<?php echo $image_alt;?>" title="<?php echo $image_alt;?>" />
                    <div class="contain-box"><?php echo $title;?> <br/> <?php echo $content;?></div>
                </div>
            </div>
<?php endwhile; wp_reset_postdata(); ?>

            <!--<div class="col-sm-6 col-lg-4">
                <div class="team-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/achivement-img2.jpg" alt="home" title="" />
                    <div class="contain-box">Winner  - Best New Home <br/>$1,000,000 - $1,499,900</div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="team-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/achivement-img3.jpg" alt="home" title="" />
                    <div class="contain-box">Best Renovation - Private Residence</div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="team-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/achivement-img4.jpg" alt="home" title="" />
                    <div class="contain-box">Awards of Excellence - Award of Merit</div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="team-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/achivement-img5.jpg" alt="home" title="" />
                    <div class="contain-box">Best Home Duplex - 2011 - CHBA National<br/> Awerds - Finalist - Best Home Duplex</div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="team-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/home-image3.jpg" alt="home" title="" />
                    <div class="contain-box">20008 - CHBA Calgary Ragion - Winner - <br/>Best New Home $600,000 - $749,900</div>
                </div>
            </div>-->


        </div>
    </div>    
</section>
<!------- our team area start -------->
<?php get_footer(); ?>