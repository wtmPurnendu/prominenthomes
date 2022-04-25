<?php get_header(); ?>

        <div class="int_content_wraapper int_content_left">

            <div class="banner-social-call-email">
                <ul class="list-unstyled ban-social">
                    <?php
                    $socials = get_field('social','option');

                    if ($socials) {
                        foreach ($socials as $social) { 
                        ?>

                    <li><a href="<?php echo $social['social_link']; ?>"><i class="fab fa-<?php echo $social['social_logo']; ?>"></i></a></li>

                    <?php
                        // code...
                    }
                        
                    }
                    ?>
                   
                    
<ul class="list-inline ban-call">
    <li><img src="<?php echo get_template_directory_uri(); ?>/images/call.png"> Call: <a href="tel:<?php echo get_field('h_phone_number','option'); ?>" target="_blank"><?php echo get_field('h_phone_number','option'); ?></a></li>
</ul>
<ul class="list-inline ban-email">
    <li><img src="<?php echo get_template_directory_uri(); ?>/images/email.png"> <a href="mailto:<?php echo get_field('header_mail_address','option'); ?>" target="_blank"><?php echo get_field('header_mail_address','option'); ?></a></li>
</ul>
            </div>

            <!--===Start Revolution Slider===-->
            <div class="int_banner_slider">
                <div class="banner_box_wrapper">
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-6 col-lg-4 col-md-5 align-self-center">
                                <div class="main_contentblock">
                                    <div class="swiper-container" data-aos="fade-right">
                                        <div class="swiper-wrapper">


<?php
            
$args = array(
'post_type' => 'property',
'order' => 'DESC',
'orderby' => 'ID',
'posts_per_page' => 3
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
$imgurl = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$title=get_the_title($post->ID);
$image_id = get_post_thumbnail_id();
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
$image_title = get_the_title($image_id);
//Acf field value
$bathrooms = get_field('bathrooms');
$address = get_field('address');
$property_price = get_field('property_price');
$bedrooms = get_field('bedrooms');
$area = get_field('area');
$car_garages = get_field('car_garages');
?>  
<div class="swiper-slide">
    <div class="swiper_imgbox imgbox1">
        <div class="swipper_img">
            <h4>For Sale <span>Estate</span></h4>
            <h2><?php echo $title; ?></h2>
            <h3><?php echo $property_price; ?><span class="banner_span1"></span></h3>
            <?php if ($address): ?>
                <p><i class="fa fa-map-marker mr-3"></i><?php echo $address; ?></p>
            <?php endif ?>
            
            <!-- homes List -->
            <ul class="homes-list clearfix">

                <?php if ($bedrooms): ?>
                <li>
                    <i class="fa fa-bed" aria-hidden="true"></i>
                <span><?php echo $bedrooms; ?></span>
                </li>
                <?php endif ?>
                
                <?php if ($bathrooms): ?>
                <li>
                    <i class="fa fa-bath" aria-hidden="true"></i>
                    <span><?php echo $bathrooms; ?></span>
                </li> 
                <?php endif ?>
                
                <?php if ($area): ?>
                <li>
                    <i class="fa fa-object-group" aria-hidden="true"></i>
                    <span><?php echo $area; ?></span>
                </li>
                <?php endif ?>
                <?php if ($car_garages): ?>
                <li>
                    <i class="fas fa-car"></i>
                    <span><?php echo $car_garages; ?></span>
                </li>
                <?php endif ?>
                
            </ul>
            <a href="<?php echo the_permalink(); ?>" class="int_btn">View Home <span class="btn_caret"><i class="fas fa-caret-right"></i></span></a>
            <h1>Real</h1>
        </div>
    </div>
</div>


 <?php endwhile; wp_reset_postdata(); ?> 


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-lg-8 col-md-7 align-self-center pr-0">
                                <!--=== Swiper ===-->
                                <div class="main_imgblock">
                                    <div class="swiper-container" data-aos="fade-left">
                                        <div class="swiper-wrapper">
                                            

<?php
            
$args = array(
'post_type' => 'property',
'order' => 'DESC',
'orderby' => 'ID',
'posts_per_page' => 3
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
$imgurl = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$title=get_the_title($post->ID);
$image_id = get_post_thumbnail_id();
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
$image_title = get_the_title($image_id);
//Acf field value
$bathrooms = get_field('bathrooms');
$address = get_field('address');
$property_price = get_field('property_price');
$bedrooms = get_field('bedrooms');
$area = get_field('area');
$car_garages = get_field('car_garages');
?> 

<div class="swiper-slide">
    <div class="swiper_contbox">
        <div class="swipper_conntent">
            <?php if ($imgurl): ?>
                <img src="<?php echo $imgurl;?>" class="img-fluid " alt="<?php echo $image_alt;?>" />
            <?php else: ?>
                <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/12/placeholder.png" class="img-fluid " alt="<?php echo $image_alt;?>" />
            <?php endif ?>
        </div>
    </div>
</div>

 <?php endwhile; wp_reset_postdata(); ?> 
                                            


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--=== Add Arrows ===-->
                        <div class="banner_navi">
                            <div class="swiper-button-next">Next</div>
                            <div class="swiper-button-prev">Prev</div>
                        </div>
                    </div>
                    <ul class="list-unstyled ban-srvc-option">
                        <li><a href=""><img src="<?php echo get_template_directory_uri(); ?>/images/ban-icon-1.png" alt=""> Quick Possession</a></li>
                        <li><a href="<?php echo home_url('/community/');?>"><img src="<?php echo get_template_directory_uri(); ?>/images/ban-icon-2.png" alt=""> Community</a></li>
                        <li><a href="<?php echo home_url('/home-plan/');?>"><img src="<?php echo get_template_directory_uri(); ?>/images/ban-icon-3.png" alt=""> New Home Plans</a></li>
                    </ul>
                </div>

            </div>
            <!--===End Revolution Slider===-->
        </div>
    
    

    <!--------- project area start ---------->
    <section class="main-area project-area">
        <img src="<?php echo get_template_directory_uri(); ?>/images/shape-1.png" class="project-shape-1" alt="">
        <img src="<?php echo get_template_directory_uri(); ?>/images/shape-2.png" class="project-shape-2" alt="">
        <img src="<?php echo get_template_directory_uri(); ?>/images/shape-3.png" class="project-shape-3" alt="">
        <div class="container">


<?php if( have_rows('home_property') ): ?>
<?php while( have_rows('home_property') ): the_row(); 
    $home_property_title = get_sub_field('home_property_title');
    $home_property_content = get_sub_field('home_property_content');
    
    $home_property_link_level = get_sub_field('home_property_link_level');
    $home_property_link = get_sub_field('home_property_link');
    //alt title tag value
    $imageID = get_sub_field('home_property_image');
    
    
?>
 <div class="project-body">
    <div class="image-box">
        <img src="<?php echo $imageID['url'];?>" alt="<?php echo $imageID['alt'];?>" title="<?php echo $imageID['name'];?>">
    </div>
    <div class="project-contain-box">
        <h3 class="h3"><?php echo $home_property_title; ?></h3>
        <p><?php echo $home_property_content; ?></p>
        <a href="<?php echo $home_property_link['url']; ?>" class="btn"><?php echo $home_property_link_level; ?></a>
    </div>
</div>      
<?php endwhile; ?>
<?php endif; ?>


        </div>
    </section>
    <!--------- project area stop ---------->

    <!---------- our home area start ----------->
    <section class="main-area our-home-area">
          <img src="<?php echo get_template_directory_uri(); ?>/images/shape-2.png" class="project-shape-2" alt="">
        <div class="container">
            <div class="heading-box text-center">
                <h3 class="h3">Our <strong>Homes</strong></h3>
                <p>Prominent Homes is a leading Alberta New Home Builder with offices in Calgary and Edmonton. With a long and rich history of quality craftsmanship.</p>
            </div>
            <div class="owl-carousel our-home-carousel" id="our_home_slider">
                
<?php
            
$args = array(
'post_type' => 'property',
'order' => 'DESC',
'orderby' => 'ID',
'posts_per_page' => 6
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
$imgurl = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$title = get_the_title($post->ID);
$image_id = get_post_thumbnail_id();
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
$image_title = get_the_title($image_id);
//Acf field value
$bathrooms = get_field('bathrooms');
$address = get_field('address');
$property_price = get_field('property_price');
$bedrooms = get_field('bedrooms');
$area = get_field('area');
$car_garages = get_field('car_garages');
?> 

<div class="home-box">
          <a href="<?php the_permalink(); ?>">
        <div class="img-box">
       <?php if ($imgurl): ?>
        <img src="<?php echo $imgurl;?>" class="img-fluid " alt="<?php echo $image_alt;?>" />
    <?php else: ?>
        <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/12/placeholder.png" class="img-fluid " alt="<?php echo $image_alt;?>" />
    <?php endif ?>
        </div>
         </a>
        <h5><?php echo $title; ?></h5>
        <p> 
            <?php if ($bedrooms): ?>
                <?php echo $bedrooms; ?> Beds | 
            <?php endif ?>
            <?php if ($bathrooms): ?>
                <?php echo $bathrooms; ?> Baths | 
            <?php endif ?>
            <?php if ($area): ?>
                <?php echo $area; ?> 2203 | 
            <?php endif ?>
            
           
            
        </p>
        <p>Starting <?php echo $property_price; ?></p>
</div>
<?php endwhile; wp_reset_postdata(); ?> 
    



                


            </div>
        </div>
    </section>
    <!---------- our home area stop ----------->

    <!--------- We provide area start ----------->
    <section class="main-area we-provide-area">
        <div class="container">
            <div class="heading-box">
                <div class="d-flex justify-content-between">
                    <h3>
                       <?php echo get_field('we_provide_area_title'); ?>
                    </h3>
                    <p><?php echo get_field('we_provide_area_content'); ?></p>
                </div>
            </div>
        </div>
        <div class="we-provide-image-box" style="background-image: url(<?php echo get_field('we_provide_area_image')['url']; ?>);">
            <div class="container"></div>
        </div>
        <div class="container">
            <div class="d-flex justify-content-end">
                <div class="box">
                    <h5><?php echo get_field('we_provide_area_title_copy'); ?></h5>
                    <a href="<?php echo get_field('we_provide_area_link')['url']; ?>" class="btn">view more</a>
                </div>
            </div>
        </div>
    </section>
    <!--------- we provide area stop ----------->
<?php 
    $aboutTitle = get_field('home_about_section');
    $aboutContent = get_field('home_about_content');
    $home_about_image = get_field('home_about_image');
    $home_about_link = get_field('home_about_link');
 ?>
    <!-------- about us area start --------->
    <section class="main-area about-area">
         <img src="<?php echo get_template_directory_uri(); ?>/images/shape-2.png" class="project-shape-2" alt="">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="about-img-box">
                        <img src="<?php echo $home_about_image['url']; ?>" alt="<?php echo $home_about_image['alt']; ?>" title="<?php echo $home_about_image['name']; ?>"></div>
                </div>
                <div class="col-lg-7">
                    <div class="about-contain">
                        <h3 class="h3"><?php echo $aboutTitle; ?></h3>
                        <?php echo $aboutContent; ?>
                        <a href="<?php echo $home_about_link['url']; ?>" class="btn">learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-------- about us area stop --------->
<?php 
    $we_are_ready_title = get_field('we_are_ready_title');
    $we_are_ready_sub_title = get_field('we_are_ready_sub_title');
    $we_are_ready_level = get_field('we_are_ready_level');
    $we_are_ready_link = get_field('we_are_ready_link');
    $we_are_ready_image = get_field('we_are_ready_image');
?>
    <!-------- get help area start ---------->
    <section class="get-help-area" style="background-image: url(<?php echo $we_are_ready_image['url'];?>);">
        <div class="container">
            <div class="get-help-body">
                <h3><?php echo $we_are_ready_title; ?></h3>
                <h4><?php echo $we_are_ready_sub_title; ?></h4>
                <?php if ($we_are_ready_level): ?>
                    <a href="<?php echo $we_are_ready_link['url']; ?>" class="btn-help"><?php echo $we_are_ready_level; ?></a>
                <?php endif ?>
                
            </div>
        </div>
    </section>
    <!-------- get help area stop ---------->
<?php 
    $featured_project_title = get_field('featured_project_title');
    $featured_project_content = get_field('featured_project_content');
 ?>
    <!-------- featured project area start ---------->
    <section class="main-area featured-project-area">
        <div class="container">
            <div class="heading-box text-center">
                <h3 class="h3"><?php echo $featured_project_title; ?></h3>
                <p><?php echo $featured_project_content; ?></p>
            </div>
            <div class="row">
                


                     <?php
                    $args = array(
                        'post_type' => 'galleries',
                        'order' => 'DESC',
                        'posts_per_page' =>6
                    );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                    $imgurl = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                    $title=get_the_title($post->ID);
                    $image_id = get_post_thumbnail_id();
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                    $image_title = get_the_title($image_id);
                ?>
                <div class="col-sm-4">
                    <div class="project-image-box img-one">
                        <img src="<?php echo $imgurl;?>" alt="<?php echo $image_alt; ?>" title="<?php echo $image_title; ?>">
                        <a href="javascript:void(0);" data-fancybox="single" data-src="<?php echo $imgurl;?>" class="image-zoom"><i class="zmdi zmdi-search"></i></a>
                    </div>
                     </div>
                <?php endwhile; wp_reset_postdata(); ?> 
                   <!--  <div class="project-image-box img-two">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/project-image2.jpg" alt="project image" title="">
                        <a href="javascript:void(0);" data-fancybox="single" data-src="<?php echo get_template_directory_uri(); ?>/images/project-image2.jpg" class="image-zoom"><i class="zmdi zmdi-search"></i></a>
                    </div> -->


               


                <!-- <div class="col-sm-4">
                    <div class="project-image-box img-two">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/project-image3.jpg" alt="project image" title="">
                        <a href="javascript:void(0);" data-fancybox="single" data-src="<?php echo get_template_directory_uri(); ?>/images/project-image3.jpg" class="image-zoom"><i class="zmdi zmdi-search"></i></a>
                    </div>
                    <div class="project-image-box img-one">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/project-image4.jpg" alt="project image" title="">
                        <a href="javascript:void(0);" data-fancybox="single" data-src="<?php echo get_template_directory_uri(); ?>/images/project-image4.jpg" class="image-zoom"><i class="zmdi zmdi-search"></i></a>
                    </div>
                </div>


                <div class="col-sm-4">
                    <div class="project-image-box img-one">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/project-image5.jpg" alt="project image" title="">
                        <a href="javascript:void(0);" data-fancybox="single" data-src="<?php echo get_template_directory_uri(); ?>/images/project-image5.jpg" class="image-zoom"><i class="zmdi zmdi-search"></i></a>
                    </div>
                    <div class="project-image-box img-two">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/project-image6.jpg" alt="project image" title="">
                        <a href="javascript:void(0);" data-fancybox="single" data-src="<?php echo get_template_directory_uri(); ?>/images/project-image6.jpg" class="image-zoom"><i class="zmdi zmdi-search"></i></a>
                    </div>
                </div> -->


                <div class="col-lg-12">
                    <div class="view-all">
                        <a href="<?php echo home_url('/gallery/'); ?>" class="btn">view all project</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-------- featured project area stop ---------->

    <!-------- newsletter area start -------->
    <section class="main-area newsletter-area">
        <img src="<?php echo get_template_directory_uri(); ?>/images/shape-2.png" class="project-shape-2" alt="">
        <img src="<?php echo get_template_directory_uri(); ?>/images/shape-3.png" class="project-shape-3" alt="">
        <div class="container">
            <div class="newsletter-body">
                <h4>To get updated subscribe to our</h4>
                <h3>Newsletters</h3>
                <form action="<?php echo site_url();?>/?na=s" method="post">
                    <input type="hidden" name="nlang" value="">
                    <div class="form-group">
                        <input type="email" name="ne" class="form-control" required placeholder="Email address...">
                        <button type="submit" class="btn-submit">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-------- newsletter area stop -------->
<?php get_footer(); ?>