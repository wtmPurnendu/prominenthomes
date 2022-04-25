<?php 
/**
 * Template Name: Find Your Home
 * 
 */ 

get_header(); ?>
<!------- inner banner area start -------->
<section class="inner-banner-area">
    <div class="container">
        <h1><?php echo the_title(); ?></h1>
        <ul class="pagger">
            <li><a href="<?php echo home_url(); ?>">Home</a></li>
            <li><?php echo the_title(); ?></li>
        </ul>
    </div>
</section>

    
    <section class="home-plan-rivercrest-inner find-your-home-inner-new-section">
      <div class="container">
           <div class="inner-find-home-search-section">
               <form>
                  <div class="find-home-search-input-bx">
                     <select class="form-control ">
                       <option>Select Community</option>
                      </select>
                   </div>
                   <div class="find-home-search-input-bx">
                     <select class="form-control ">
                       <option>Select Home</option>
                      </select>
                   </div>
                   <div class="find-home-search-input-bx">
                     <select class="form-control ">
                       <option>Home Type</option>
                      </select>
                   </div>
                   <div class="find-home-advnce-src-bx" data-toggle="modal" data-target="#myModal">
                       Advance  Search
                   </div>
                   <div class="find-home-search-input-bx2">
                       <button class="btn btn-submit">Submit</button>
                   </div>
               </form>
          </div>
          
          
          <div class="find-home-search-result-bx">
             <p>10 Search results</p>
              <ul class="list-inline home-search-result-short">
                 <li><i class="fas fa-sort-amount-down-alt"></i> Short by :</li>
                  <li>
                      <select>
                      <option>Price</option>
                      </select>
                  </li>
                  <li><a href="" class="home-change-view-btn "><i class="fas fa-list"></i></a></li>
                  <li><a href="" class="home-change-view-btn active-change-view-btn"><i class="fas fa-th-large"></i></a></li>
              </ul>
          </div>
       
           <div class="row">



<?php
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;   
            $args = array(
            'post_type' => 'property',
            'order' => 'DESC',
            'paged' => $paged,
            'posts_per_page' => -1
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

<div class="col-sm-6 col-lg-4">
<div class="home-box">
      <a href="<?php echo the_permalink();  ?>">
    <div class="img-box">
            <?php if($imgurl){?>
               <img src="<?php echo $imgurl;?>" alt="<?php echo $image_alt;?>">
            <?php } else{?>
               <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/12/placeholder.png" alt="<?php echo $image_alt;?>">
               <?php } ?>
       <ul class="list-inline home-plan-rivercrest-icon-bx">
         <li><a href=""><i class="fas fa-link"></i></a></li>
         <li><a href=""><i class="fas fa-video"></i></a></li>
         <li><a href=""><i class="far fa-image"></i></a></li>
        </ul>
    </div>
     </a>
   <div class="plan-rivercrest-inn-caption">
    <h5><?php echo $title; ?></h5>
   <ul class="list-inline plan-rivercrest-inn-option">
      <li>From <?php echo $property_price;?></li>
      <li><?php echo $bedrooms;?> Bed</li>
      <li><?php echo $bathrooms;?> Bath</li>
      <li><?php echo $area;?></li>
   </ul>
    </div>
   
</div>
</div>
<?php endwhile; wp_reset_postdata(); ?> 



               



          </div>
          
          <!-- <img src="<?php echo get_template_directory_uri(); ?>/images/pagination.png" class="img-fluid pagination-img" alt=""> -->
        </div>
       <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form>
              <div class="row">
               <div class="col-lg-4">
                    <select class="form-control ">
                       <option>Property Status</option>
                      </select>
                  </div>
                  <div class="col-lg-4">
                    <select class="form-control ">
                       <option>Bedrooms</option>
                      </select>
                  </div>
                  <div class="col-lg-4">
                    <select class="form-control ">
                       <option>Bathrooms</option>
                      </select>
                  </div>
                  
                  <div class="col-lg-4">
                    <h5>Area Size</h5>
                      <div class="row pl-1 pr-1">
    <div class="col-sm-12">
      <div id="slider-range"></div>
    </div>
  </div>
  <div class="row slider-labels d-block pl-3 pr-3">
    <div class="d-flex justify-content-between">
        <div class="col-xs-6 caption">
      <strong>Min:</strong> <span id="slider-range-value1"></span>
    </div>
    <div class="col-xs-6 text-right caption">
      <strong>Max:</strong> <span id="slider-range-value2"></span>
    </div>

    </div>
    
  </div>
  <div class="row">
    <div class="col-sm-12">
      <form>
        <input type="hidden" name="min-value" value="">
        <input type="hidden" name="max-value" value="">
      </form>
    </div>
  </div>
                  </div>
                  <div class="col-lg-4">
                    <h5>Price Range</h5>
                      <img src="images/price-range2.png" alt="">
                  </div>
              </div>
            </form>
        </div>
        
      </div>
      
    </div>
  </div>
    </section>

<?php get_footer(); ?>

