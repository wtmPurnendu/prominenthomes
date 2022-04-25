<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>

<!-- header area stop --> 
<!------- inner banner area start -------->
<section class="inner-banner-area">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <ul class="pagger">
            <li><a href="<?php echo home_url(); ?>">Home</a></li>
            <li><a href="<?php echo home_url('/community/'); ?>">Communities </a></li>
            <li><?php the_title(); ?></li>
        </ul>
    </div>
</section>
<?php
$id = get_the_ID(); 
$imgurl = get_the_post_thumbnail_url($id, 'full' );
$image_id = get_post_thumbnail_id();
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
$image_title = get_the_title($image_id);
//Acf
$community_logo = get_field('community_logo');
 ?>
<!------- inner banner area stop -------->
<section class="main-area project-area communities-inner-section">
    <div class="container">
        <div class="project-body">
            <div class="image-box"><img src="<?php echo $imgurl;?>" alt="<?php echo $image_alt; ?>" title="<?php echo $image_title; ?>"></div>
            <div class="project-contain-box">
                <img src="<?php echo $community_logo['url'];?>" class="communities-details-logo" alt="<?php echo $community_logo['alt'];?>">
        <?php echo the_content(); ?>
            </div>
        </div>
   
    </div>
</section>
   <?php 
        $rivercrest_title = get_field('rivercrest_title');
        $rivercrest_content = get_field('rivercrest_content');
        
    ?> 
    
   <section class="inner-rivercrest-showhome">
   <div class="container">
      <div class="heading-box text-center">
        <?php if ($rivercrest_title): ?>
            <h3 class="h3"><?php echo $rivercrest_title; ?></h3>
        <?php else: ?>
            <h3 class="h3">Rivercrest Showhome</h3>
        <?php endif ?>
        <?php if ($rivercrest_content): ?>
            <p><?php echo $rivercrest_content; ?></p>
        <?php endif ?>
         <h6><?php if(get_field('timing_1_mm')) { ?> 
            <?php echo 'Timing 1 &nbsp;'.get_field('timing_1_mm'); ?>
         <?php } ?>
         <?php if(get_field('timing_2_mm')) { ?> 
            <?php echo 'Timing 2 &nbsp;'.get_field('timing_2_mm'); ?>
         <?php } ?>
         <?php if(get_field('timing_3_mm')) { ?> 
            <?php echo 'Timing 3 &nbsp;'.get_field('timing_3_mm'); ?>
         <?php } ?></h6>
      </div>

         
      

<?php 
    $rivercrest_post = get_field('rivercrest_post');
    //echo '<pre>';
    //print_r($rivercrest_post);
    $id2 = $rivercrest_post->ID;
    $imgurl2 = get_the_post_thumbnail_url($id2, 'full' );
    $image_id = get_post_thumbnail_id();
    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
    $image_title = get_the_title($image_id);
    //acf value
    $bathrooms = get_field('bathrooms',$id2);
    $address = get_field('address',$id2);
    $property_price = get_field('property_price_text',$id2);
    $bedrooms = get_field('bedrooms',$id2);
    $area = get_field('area',$id2);
    $car_garages = get_field('car_garages',$id2);
    $home_types = get_field('home_types',$id2);
    $short_description = get_field('short_description',$id2);
 ?>      
      <div class="rivercrest-showhome-the-bow">
         <div class="row">

         <?php if($rivercrest_post !="") { ?> 
            <div class="col-lg-7">
               <div class="rivercrest-showhome-bow-box">
                  <div class="media">
                     <img src="<?php echo $imgurl2;?>" alt="">
<div class="media-body">
<h4><?php echo $rivercrest_post->post_title; ?></h4>
<h6><?php echo $bathrooms;?> Bathrooms</h6>
<h5><?php echo $property_price;?></h5>
<div class="list-pro-option-bx">
    <img src="<?php echo get_template_directory_uri(); ?>/images/list-pro-icon1.png" alt="">
     <span><?php echo $bedrooms;?> Bed</span>
 </div>

<!-- <div class="list-pro-option-bx">
    <img src="<?php echo get_template_directory_uri(); ?>/images/list-pro-icon2.png" alt=""> 
    <span><?php echo $bathrooms;?> Bath</span>
</div> -->

<div class="list-pro-option-bx">
    <img src="<?php echo get_template_directory_uri(); ?>/images/list-pro-icon3.png" alt=""> 
    <span><?php echo $area;?></span>
</div>
<div class="list-pro-option-bx">
    <img src="<?php echo get_template_directory_uri(); ?>/images/list-pro-icon4.png" alt="">
     <span><?php echo $car_garages; ?> Car</span>
</div>
<a href="<?php echo get_the_permalink($id2);?>" class="showhome-bow-btn">View More</a>
</div>
                  </div>
               </div>
            </div>
            <?php } else{?>
               <div class="col-lg-7">
               <div class="rivercrest-showhome-bow-box">
                  <div class="media">
                  <div class="list-pro-option-bx">
                        <span>Not Found!</span>
                     </div>
                  </div>
               </div>
               </div>
            <?php } ?>
            <?php 
                
                $managers = get_field('manager_se',$id);
                $imgurl3 = get_the_post_thumbnail_url($managers, 'full' );

             ?>
            <div class="col-lg-5">
               <div class="rivercrest-showhome-bow-user-information-bx">
                  <div class="media">
                     <img src="<?php echo $imgurl3;?>" alt="">
                     <div class="media-body">
                        <h5><?php echo $managers->post_title; ?></h5>
                        <p><?php echo $managers->post_content; ?></p>
                     </div>
                  </div>
<ul class="list-unstyled rivercrest-showhome-bow-contact-box">
 <li><img src="<?php echo get_template_directory_uri(); ?>/images/contact-icon1.png" alt=""> 
    <span><a href="tel:<?php echo get_field('phone',$managers); ?>" target="_blank"><?php echo get_field('phone',$managers); ?></a></span>
</li>
 <li><img src="<?php echo get_template_directory_uri(); ?>/images/contact-icon2.png" alt=""> 
    <span><a href="mailto:<?php echo get_field('email',$managers); ?>" target="_blank"><?php echo get_field('email',$managers); ?></a></span>
</li>
 <li><img src="<?php echo get_template_directory_uri(); ?>/images/contact-icon3.png" alt=""> 
    <span><a href=""><?php echo get_field('address_manager',$managers); ?></a></span>
</li>
</ul>
<?php if (get_field('book_appointment_url',$managers)): ?>
 <a href="<?php echo get_field('book_appointment_url',$managers);?>" class="showhome-bow-btn">Book Appointment</a>   
<?php endif ?>

               </div>
            </div>


         </div>
      </div>
   </div>
</section>
<?php 
    $community_of_rivercrest_title = get_field('community_of_rivercrest_title',$id);
    $community_of_rivercrest_content = get_field('community_of_rivercrest_content',$id);
 ?>
<section class="community-of-rivercrest-new-sec">
   <div class="container">
      <div class="new-hd-heading-box">
         <?php if ($community_of_rivercrest_title): ?>
            <h3><?php echo $community_of_rivercrest_title; ?></h3>
         <?php endif ?>
         <?php if ($community_of_rivercrest_content): ?>
            <p><?php echo $community_of_rivercrest_content; ?></p>
         <?php endif ?>
         
      </div>
      <div class="panel with-nav-tabs panel-default">
         <div class="panel-heading">
<ul class="nav nav-tabs">
   <li><a href="#tab1default" data-toggle="tab" role="tab" class="nav-item nav-link active">
    <?php if (get_field('lot_map_level',$id)): ?>
        <?php echo get_field('lot_map_level',$id); ?>
    <?php else: ?>
        Lot Map
    <?php endif ?>
</a></li>
   <li><a href="#tab2default" data-toggle="tab" role="tab" class="nav-item nav-link">
   
   <?php if (get_field('amenities_level',$id)): ?>
        <?php echo get_field('amenities_level',$id); ?>
    <?php else: ?>
        Amenities
    <?php endif ?>
</a></li>
</ul>
         </div>
         <div class="panel-body">
            <div class="tab-content">

               <div class="tab-pane fade show active" id="tab1default">
                  <div class="community-rivercrest-tab-content-box ">
                     <?php if (get_field('lot_map_level',$id)): ?>
                        <h3><?php echo get_field('lot_map_level',$id); ?> :</h3>
                     <?php else: ?>
                        <h3>Lot Map :</h3>
                     <?php endif ?>
                     <?php echo do_shortcode(get_field('lot_map_shortcode',$id)); ?>
                  </div>
               </div>

               <div class="tab-pane fade" id="tab2default">
                  <div class="community-rivercrest-tab-content-box ">
                     <?php if (get_field('amenities_level',$id)): ?>
                        <h3><?php echo get_field('amenities_level',$id); ?> :</h3>
                     <?php else: ?>
                        <h3>Amenities :</h3>
                     <?php endif ?>
                     <?php echo get_field('latitude_comm',$id); ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php 
    $home_plans_title = get_field('home_plans_title',$id);
    $home_plans_content = get_field('home_plans_content',$id);
    $home_plans = get_field('home_plans');
 ?>
<section class="home-plan-rivercrest-inner">
   <div class="container">
      <div class="heading-box text-center">
         <h3 class="h3"><?php echo $home_plans_title; ?></h3>
         <p><?php echo $home_plans_content; ?></p>
      </div>
      <div class="row">


        <?php if ($home_plans): ?>
            <?php foreach ($home_plans as $post): 
                setup_postdata($post); 
                //$permalink = get_permalink($post->ID );
                $permalink = home_url('/find-your-home/');
                $title = get_the_title($post->ID );
                $img = get_the_post_thumbnail_url($post->ID, 'full' );
                $bedrooms = get_field('bedrooms',$post);
                $bathrooms = get_field('bathrooms',$post);
                $area = get_field('area',$post);
                $property_price = get_field('property_price_text',$post);
                ?>
            <div class="col-sm-4">
            <div class="home-box">
               <a href="<?php echo $permalink; ?>">
                  <div class="img-box">
                     <?php if($img){?>
                        <img src="<?php echo $img;?>" alt="<?php echo $image_alt;?>">
                        <?php } else{?>
                        <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/12/placeholder.png" alt="<?php echo $image_alt;?>">
                        <?php } ?>
                    
               </div>
               </a>
                <ul class="list-inline home-plan-rivercrest-icon-bx">
                        <li>
               <a href=""><i class="fas fa-link"></i></a></li>
               <li><a href=""><i class="fas fa-video"></i></a></li>
               <li><a href=""><i class="far fa-image"></i></a></li>
               </ul>
               <div class="plan-rivercrest-inn-caption">
                  <h5><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h5>
                  <ul class="list-inline plan-rivercrest-inn-option">
                     <li><?php echo $property_price; ?></li>
                     <li><?php echo $bedrooms; ?> Bed</li>
                     <li><?php echo $bathrooms; ?> Bath</li>
                     <li><?php echo $area; ?> Sq.ft</li>
                    </ul>
                    </div>
                </div>
            </div>           
            <?php endforeach ?>  
             <?php wp_reset_postdata(); ?>          
        <?php endif ?>


        


         


      </div>
      <div class="plan-rivercrest-all-home-btn">
         <a href="<?php echo home_url('/home-plan/'); ?>" class="btn">View All Homes</a>
      </div>
   </div>
</section>

<?php

get_footer();
