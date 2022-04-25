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
            <li><a href="#">Communities </a></li>
            <li><?php the_title(); ?></li>
        </ul>
    </div>
</section>
<?php
$id = get_the_ID(); 
$imgurl = get_the_post_thumbnail_url($id, 'full' );
 ?>
<!------- inner banner area stop -------->
<section class="main-area project-area communities-inner-section">
    <div class="container">
        <div class="project-body">
            <div class="image-box"><img src="<?php echo $imgurl;?>" alt="#" title=""></div>
            <div class="project-contain-box">
                <img src="<?php echo get_template_directory_uri(); ?>/images/communities-logo1.png" class="communities-details-logo" alt="">
        <?php echo the_content(); ?>
            </div>
        </div>
   
    </div>
</section>
    
    
    <section class="inner-rivercrest-showhome">
       <div class="container">
            <div class="heading-box text-center">
                <h3 class="h3">Rivercrest Showhome</h3>
                <p>Prominent Homes is a leading Alberta New Home Builder with offices in Calgary and Edmonton. With a long and rich history of quality craftsmanship.</p>
            </div>
           <div class="rivercrest-showhome-the-bow">
            <div class="row">
                <div class="col-lg-7">
                    
                     <div class="rivercrest-showhome-bow-box">
                        <div class="media">
  <img src="<?php echo get_template_directory_uri(); ?>/images/bow-img.jpg" alt="">
  <div class="media-body">
    <h4>The Bow</h4>
    <h5>Starting from $410s</h5>
  
                                   <div class="list-pro-option-bx"><img src="<?php echo get_template_directory_uri(); ?>/images/list-pro-icon1.png" alt=""> <span>3 Bed</span></div>
                                  <div class="list-pro-option-bx"><img src="<?php echo get_template_directory_uri(); ?>/images/list-pro-icon2.png" alt=""> <span>3 Bath</span></div>
                                  <div class="list-pro-option-bx"><img src="<?php echo get_template_directory_uri(); ?>/images/list-pro-icon3.png" alt=""> <span>3061</span></div>
                                  <div class="list-pro-option-bx"><img src="<?php echo get_template_directory_uri(); ?>/images/list-pro-icon4.png" alt=""> <span>2 Car</span></div>
                       <a href="" class="showhome-bow-btn">View More</a>
  </div>
</div>
                    </div>
                </div>
                
                <div class="col-lg-5">
                     <div class="rivercrest-showhome-bow-user-information-bx">
                          <div class="media">
                          <img src="<?php echo get_template_directory_uri(); ?>/images/rivercrest-showhome-bow-user-img.jpg" alt="">
                         <div class="media-body">
                             <h5>Jaclyn Savage</h5>
                             <p>Area Sales Manager</p>
                              </div>
                         </div>
                         <ul class="list-unstyled rivercrest-showhome-bow-contact-box">
                             <li><img src="<?php echo get_template_directory_uri(); ?>/images/contact-icon1.png" alt=""> <span><a href="">403-585-0370</a></span></li>
                             <li><img src="<?php echo get_template_directory_uri(); ?>/images/contact-icon2.png" alt=""> <span><a href="">jaclyn@prominenthomes.ca</a></span></li>
                             <li><img src="<?php echo get_template_directory_uri(); ?>/images/contact-icon3.png" alt=""> <span><a href="">River Heights Drive</a></span></li>
                         </ul>
                          <a href="" class="showhome-bow-btn">Book Appointment</a>
                     </div>
                </div>
               </div>
           </div>
        </div>
    </section>
    
    <section class="community-of-rivercrest-new-sec">
        <div class="container">
            <div class="new-hd-heading-box">
                 <h3>Community of Rivercrest</h3>
                <p>Prominent Homes is a leading Alberta New Home Builder with offices in Calgary and Edmonton. With a long and rich history of quality craftsmanship.</p>
            </div>
            <div class="panel with-nav-tabs panel-default">
          <div class="panel-heading">
            <ul class="nav nav-tabs">
              <li><a href="#tab1default" data-toggle="tab" role="tab" class="nav-item nav-link active">Lot Map</a></li>
              <li><a href="#tab2default" data-toggle="tab" role="tab" class="nav-item nav-link">Amenities</a></li>
            </ul>
          </div>
          <div class="panel-body">
            <div class="tab-content">
              <div class="tab-pane fade show active" id="tab1default">
                  <div class="community-rivercrest-tab-content-box ">
                  <h3>Lot Map :</h3>
                   <img src="<?php echo get_template_directory_uri(); ?>/images/community-rivercrest-inner-img.jpg" alt="">
        
                </div>
              </div>
              <div class="tab-pane fade" id="tab2default">
                <div class="community-rivercrest-tab-content-box ">
                  <h3>Amenities :</h3>
                   <img src="<?php echo get_template_directory_uri(); ?>/images/community-rivercrest-inner-img.jpg" alt="">
        
                </div>
                </div>
              </div>
                </div>
              </div>
        </div>
    </section>
    
    <section class="home-plan-rivercrest-inner">
      <div class="container">
          <div class="heading-box text-center">
                <h3 class="h3">Home Plans in Rivercrest</h3>
                <p>Prominent Homes is a leading Alberta New Home Builder with offices in Calgary and Edmonton. With a long and rich history of quality craftsmanship.</p>
            </div>
           <div class="row">
           <div class="col-sm-4">
               <div class="home-box">
                      <a href="#">
                    <div class="img-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/rivercrest-img1.jpg" alt="#" title="">
                       <ul class="list-inline home-plan-rivercrest-icon-bx">
                         <li><a href=""><i class="fas fa-link"></i></a></li>
                         <li><a href=""><i class="fas fa-video"></i></a></li>
                         <li><a href=""><i class="far fa-image"></i></a></li>
                        </ul>
                    </div>
                     </a>
                   <div class="plan-rivercrest-inn-caption">
                    <h5>The Pavanna III</h5>
                   <ul class="list-inline plan-rivercrest-inn-option">
                      <li>From $580s</li>
                      <li>3 Bed</li>
                      <li>2.5 Bath</li>
                      <li>2021 Sq.ft</li>
                   </ul>
                    </div>
                   
                </div>
               </div>
               <div class="col-sm-4">
               <div class="home-box">
                      <a href="#">
                    <div class="img-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/rivercrest-img2.jpg" alt="#" title="">
                      <ul class="list-inline home-plan-rivercrest-icon-bx">
                         <li><a href=""><i class="fas fa-link"></i></a></li>
                         <li><a href=""><i class="fas fa-video"></i></a></li>
                         <li><a href=""><i class="far fa-image"></i></a></li>
                        </ul>
                    </div>
                     </a>
                    <div class="plan-rivercrest-inn-caption">
                    <h5>The Nawas</h5>
                   <ul class="list-inline plan-rivercrest-inn-option">
                      <li>From $580s</li>
                      <li>3 Bed</li>
                      <li>2.5 Bath</li>
                      <li>2021 Sq.ft</li>
                   </ul>
                    </div>
                   
                </div>
               </div>
               <div class="col-sm-4">
               <div class="home-box">
                      <a href="#">
                    <div class="img-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/rivercrest-img3.jpg" alt="#" title="">
                      <ul class="list-inline home-plan-rivercrest-icon-bx">
                         <li><a href=""><i class="fas fa-link"></i></a></li>
                         <li><a href=""><i class="fas fa-video"></i></a></li>
                         <li><a href=""><i class="far fa-image"></i></a></li>
                        </ul>
                    </div>
                     </a>
                    <div class="plan-rivercrest-inn-caption">
                    <h5>The Bishop</h5>
                   <ul class="list-inline plan-rivercrest-inn-option">
                      <li>From $580s</li>
                      <li>3 Bed</li>
                      <li>2.5 Bath</li>
                      <li>2021 Sq.ft</li>
                   </ul>
                    </div>
                   
                </div>
               </div>
          </div>
          
          <div class="plan-rivercrest-all-home-btn">
          <a href="#" class="btn">View All Homes</a>
          </div>
        </div>
       
    </section>

<?php

get_footer();
