<?php 
error_reporting(E_ERROR | E_PARSE);

get_header();?>
<div id="overlay">
  <div class="cv-spinner">
    <span class="spinner1"></span>
  </div>
</div>
<!------- inner banner area start -------->
<section class="inner-banner-area">
        <div class="container">
            <h1><?php the_title(); ?></h1>
            <ul class="pagger">
                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                <li><a href="<?php echo home_url('/home-plan/'); ?>">Home Plan</a></li>
                <li><?php the_title(); ?></li>
            </ul>
        </div>
    </section>
    <!------- inner banner area stop -------->
<?php
    $id = get_the_ID();
    $imgurl = get_the_post_thumbnail_url( $id, 'full' );
    $title=get_the_title($id);
    $image_id = get_post_thumbnail_id();
    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
    $image_title = get_the_title($image_id);
     //Acf field value
     $bathrooms = get_field('bathrooms',$id);
     $address = get_field('address',$id);
     $property_price = get_field('property_price_text',$id);
     $bedrooms = get_field('bedrooms',$id);
     $area = get_field('area',$id);
     $car_garages = get_field('car_garages',$id);
     $home_types = get_field('home_types',$id);
     $short_description = get_field('short_description',$id);
     //Acf tab
     $book_a_tour = get_field('book_a_tour',$id);
     $Label_a_tour = get_field('Label_a_tour',$id);

     $download_brochure = get_field('download_brochure',$id);
     $label_brochure = get_field('label_brochure',$id);

     //Tab 2
     
?>
    <!------- Home details start -------->
    <section class="home-details-pavana-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="details-pavana-left-section">
                        <div class="details-pavana-big-img">
                        <?php if($imgurl){?>
                        <img src="<?php echo $imgurl;?>" alt="<?php echo $image_alt;?>">
                        <?php } else{?>
                        <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/12/placeholder.png" alt="<?php echo $image_alt;?>">
                        <?php } ?>
                        </div>
                        <div class="details-pavana-left-first">
                            <div class="row">
                                <div class="col-4">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/details-home-icon1.png" alt="">
                                    <h5><a href="">View Floorplan</a></h5>
                                </div>
                                <div class="col-4">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/details-home-icon2.png" alt="">
                                    <h5><a href="">Contact & Location</a></h5>
                                </div>
                                <div class="col-4">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/details-home-icon3.png" alt="">
                                    <h5><a href="#wow-modal-id-2">Mortgage Calculator</a></h5>
                                </div>
                            </div>
                        </div>

                        <div class="details-pavana-features-section">
                            <h4>Features :</h4>
                            <div class="row">


                                <div class="col-lg-12">
                                    <ul class="list-unstyled">
                                        <?php
                                            $term_list = get_the_terms($id, 'property_features');
                                            foreach($term_list as $term_single) {
                                        ?>
                                        <li><span><?php echo $term_single->name;?></span></li>
                                        <?php } ?>
                                      

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php 
                            $floor = get_field('floor_plans_label',$id);
                        ?>
                        <div class="details-pavana-features-section">
                            <h4><?php echo $floor;?></h4>
                            <div class="floor-plan-accordian">
                                <div id="accordion">
                                <?php if( have_rows('floor_plans_images',$id) ): ?>
                                <?php $c=1; while( have_rows('floor_plans_images',$id) ): the_row(); 
                               $fimages = get_sub_field('image');
                                $fplan_dimensions = get_sub_field('plan_dimensions');
                                ?>
                                <div class="card">
                                        <div class="card-header" id="heading-<?php echo $c; ?>">
                                            <h5 class="mb-0">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-<?php echo $c; ?>" aria-expanded="<?php if($c==1){?>true<?php } else{?>false<?php } ?>" aria-controls="collapse-<?php echo $c; ?>">
                                                <?php echo $fplan_dimensions;?>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse-<?php echo $c; ?>" class="collapse <?php if($c==1){?>show<?php } ?>" data-parent="#accordion" aria-labelledby="heading-<?php echo $c; ?>">
                                            <div class="card-body">
                                                <img src="<?php echo $fimages;?>" class="floor-img" alt="">
                                            </div>
                                        </div>
                                </div>
                                <?php $c++; endwhile; ?>
                                <?php endif; ?>      
                                
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            $VirtualTour = get_field('virtual_tour_label',$id);
                            if($VirtualTour){
                        ?>

                        <div class="details-pavana-features-section">
                            <h4><?php echo $VirtualTour; ?></h4>
                            <div class="floor-plan-accordian">
                                <div class="virtual-tour-inn-img-bx">
                                    <?php echo get_field('embed_code_video',$id); ?>
                                </div>
                            </div>
                        </div>
                         <?php } ?>       

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="details-pavana-right-section">
                        <div class="details-pavana-right-first">
                            <h2><?php echo $title; ?></h2>
                            <?php if(get_field('sub_title')) { ?> 
                                <h5> <?php echo get_field('sub_title'); ?></h5>
                            <?php } ?>
                          
                            <div class="row">

                            <?php if($bedrooms){?>
                                <div class="col-6">
                                    <div class="media">
                                        <div class="pavana-basement-icon-box"><img src="<?php echo get_template_directory_uri(); ?>/images/home-detail-icon-new1.png" alt=""></div>
                                        <div class="media-body">
                                            <h5 class="mt-0">Bedrooms</h5>
                                            <h4><?php echo $bedrooms;?></h4>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                                <?php if($car_garages){?>
                                <div class="col-6">
                                    <div class="media">
                                        <div class="pavana-basement-icon-box"><img src="<?php echo get_template_directory_uri(); ?>/images/home-detail-icon-new4.png" alt=""></div>
                                        <div class="media-body">
                                            <h5 class="mt-0">Garage</h5>
                                            <h4><?php echo $car_garages;?></h4>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if($bathrooms){?>
                                 <div class="col-6">
                                    <div class="media">
                                        <div class="pavana-basement-icon-box"><img src="<?php echo get_template_directory_uri(); ?>/images/home-detail-icon-new2.png" alt=""></div>
                                        <div class="media-body">
                                            <h5 class="mt-0">Bathrooms</h5>
                                            <h4><?php echo $bathrooms;?></h4>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="col-6">
                                    <div class="media">
                                        <div class="pavana-basement-icon-box"><img src="<?php echo get_template_directory_uri(); ?>/images/home-detail-icon-new5.png" alt=""></div>
                                        <div class="media-body">
                                            <h5 class="mt-0">Home Type</h5>
                                            <h4><?php echo $home_types;?></h4>
                                        </div>
                                    </div>

                                </div>

                                <?php if($area){?>
                                 <div class="col-6">
                                    <div class="media">
                                        <div class="pavana-basement-icon-box"><img src="<?php echo get_template_directory_uri(); ?>/images/home-detail-icon-new3.png" alt=""></div>
                                        <div class="media-body">
                                            <h5 class="mt-0">Area Space</h5>
                                            <h4><?php echo $area;?> ft</h4>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                               
                                 
                            </div>
                            
                            <div class="details-pavana-right-price-description">
                                <p><span>Price :</span><?php echo $property_price;?></p>
                                <?php if ($short_description) {?>
                                    <p><span>Description :</span> <?php echo $short_description;?></p>
                                <?php
                                    # code...
                                }
                                ?>

                            <?php if (get_field('address')): ?>
                               
                                <p><spen>Address :<?php echo get_field('address'); ?></spen></p> 
                            <?php endif ?>
                                
    <div class="row">
        
    <div class="col-lg-6">
            <a target="_blank" href="<?php echo $book_a_tour; ?>" class="showhome-bow-btn">
            <?php if($Label_a_tour==""){?>
            Book A Tour
            <?php } else{?>
                <?php echo $Label_a_tour;?>
            <?php } ?>
        </a>
        </div>

    <div class="col-lg-6">
            <a href="<?php echo $download_brochure;?>" class="showhome-bow-btn"><?php if($Label_a_tour==""){?>
                Download Floorplan
            <?php } else{?>
                <?php echo $label_brochure;?>
            <?php } ?></a>
    </div>

    <div class="col-lg-12">
            <?php if(get_field('label_mortgage_calculator',$id)){?>
            <a href="<?php echo get_field('mortgage_calculator_url',$id); ?>" class="showhome-bow-btn22" target="_blank"><?php echo get_field('label_mortgage_calculator',$id); ?></a>
        <?php } ?>
    </div>

    </div>
                            </div>
                            

                            


                            <div class="details-pavana-right-tab-box">
                                  <div class="panel with-nav-tabs panel-default">
          <div class="panel-heading">
            <ul class="nav nav-tabs">
              <li><a href="#tab1default" data-toggle="tab" role="tab" class="nav-item nav-link ">Shedule  A Tour</a></li>
              <li><a href="#tab2default" data-toggle="tab" role="tab" class="nav-item nav-link active">Request Info</a></li>
            </ul>
          </div>
          <div class="panel-body">
            <div class="tab-content">
              <div class="tab-pane fade" id="tab1default">
                <div class="details-pavana-right-tab-content-start">
                     <div class="details-pavana-right-tab-user-bx">
                    </div>
                  </div>
              </div>
              <div class="tab-pane fade show active" id="tab2default">
                  <div class="details-pavana-right-tab-content-start">
                     
                            <?php
                                $id = get_the_ID();
                                $communities_choose = get_field('communities_choose',$id);
                                //var_dump($communities_choose);
                                if($communities_choose):
                            ?>
                            <?php $p=1; foreach( $communities_choose as $post ): 
                                setup_postdata($post); 
                                $permalink = get_permalink($post);
                                $title = get_the_title($post);
                                $img = get_the_post_thumbnail_url($post, 'full' );

                                //manager
                                //var_dump($post);
                                //echo 'id'.$post->ID;
                                $managers = get_field('manager_se',$post);
                                //echo 'id'.$managers[0];
                                //echo '<pre>';
                                $m_detals = (array)$managers;
                               
                                $m_id = $m_detals['ID'];
                                
                                if($m_id){ 
                            ?>
                     <div class="details-pavana-right-tab-user-bx" id="foobar">
                           <label class="d-flex" for="radio_<?php echo $p; ?>">
    <input type='radio' class="myid" onchange="my_function('<?php echo get_field('email',$m_id); ?>')" value="<?php echo get_field('email',$m_id); ?>" id='radio_<?php echo $p; ?>' name='type'>
                                 <div class="right-tab-user-img">
                                    <?php if ($img): ?>
                                        <img src="<?php echo $img;?>" alt="">
                                    <?php else: ?>
                                        <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/12/placeholder.png" alt="">
                                    <?php endif ?>
                                 </div>
                                 <div class="right-tab-user-content">
                                    <a href="<?php echo $permalink;?>"><h5><?php echo esc_html($title); ?></h5></a>
                                     <p><?php echo esc_html($managers->post_title); ?></p>
                                     <?php if (get_field('phone',$m_id)): ?>
                                     <p><img src="<?php echo get_template_directory_uri(); ?>/images/contact-icon1.png" alt=""> 
                                        <a target="_blank" href="tel:<?php echo get_field('phone',$m_id);?>"><?php echo get_field('phone',$m_id);?></a></p>
                                    <?php endif ?>
                                    <?php if (get_field('email',$m_id)): ?>
                                       <p><img src="<?php echo get_template_directory_uri(); ?>/images/contact-icon2.png" alt=""> 
                                        <a href="mailto:<?php echo get_field('email',$m_id); ?>" target="_blank"><?php echo get_field('email',$m_id); ?></a></p> 
                                    <?php endif ?>

                                    <?php if (get_field('address_mm',$post)): ?>
                                       <p><i class="fas fa-map-marker-alt"></i> 
                                        <?php echo get_field('address_mm',$post); ?></p> 
                                    <?php endif ?>
                                     
                                 </div>
                           </label>
                      </div>
                      
                      <?php } $p++; endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                            <?php endif; ?>

                      <div class="right-tab-user-form-bx">
                       <form type="post" action="" id="newCustomerForm">
                        <input type="hidden" name="cus_mail" id="myText">
                          <input type="text" required name="name" class="form-control " placeholder="Full Name">
                          <input type="number" required name="phone" class="form-control " placeholder="Phone">
                          <input type="email" required name="email"  class="form-control " placeholder="Email">
                          <textarea type="text" name="message" class="form-control " placeholder="Message"></textarea>
                          <input type="hidden" name="action" value="get_data"/>
                           <button type="submit" id="Identification" name="submit" class="btn btn-submit">Available in</button>
                          </form>


                      </div>
                  </div>
                </div>
              </div>
                </div>
              </div>
                            </div>
                            
                            
                            <div class="details-pavana-features-section">
                            <h4>Gallery :</h4>
                    <div class="detail-pavana-gallery-box">
                                <div class="row">
                         
                                <?php 
                                $images = get_field('additional_images',$id);
                                //print_r($images);
                                if( $images ): ?>
                             <?php foreach( $images as $image ): ?>
                                <div class="col-6">
                                    <div class="project-image-box">
                        <img src="<?php echo esc_url($image['sizes']['medium_large']); ?>" alt="project image" title="">
                        <a href="javascript:void(0);" data-fancybox="single" data-src="<?php echo esc_url($image['sizes']['medium_large']); ?>" class="image-zoom"><i class="zmdi zmdi-search"></i></a>
                    </div>
                                    </div>
                                <?php endforeach; ?>
                             <?php endif; ?>

                                   


                        </div>
                                </div>
                  </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <?php
    $mapstext = get_field('show_home_map_label',$id);
    $home_map_data = get_field('home_map_data',$id);
    $address = get_field('daddress',$id);
    $dfax = get_field('dfax',$id);
    $demail = get_field('demail',$id);
    $opening_hours = get_field('opening_hours',$id);
    //Link
    $book_a_tour_text = get_field('book_a_tour_text',$id);
    $book_a_tour_link = get_field('book_a_tour_link',$id);
 ?>   
    
    <section class="home-details-contact-section">
       <div class="container">
           <h3><?php echo $mapstext; ?></h3>
           <div class="row">
               <div class="col-lg-4">
                  <h4>SALES CENTRE</h4>
                  <?php if ($address) {?>
                   <div class="home-details-cntct-map-bx">
                       <i class="fas fa-map-marker-alt"></i>
                       <p><?php echo $address;?></p>
                   </div>
                <?php } ?>
                   <h4>CLIENT SERVICE SPECIALIST</h4>
                    <?php if ($dfax) {?>
                        <a href="fax:<?php echo $dfax; ?>" target="_blank"><p>F: <?php echo $dfax; ?> </p></a>
                     <?php } ?>
                    <?php if ($demail) {?>
                        <a href="mailto:<?php echo $demail; ?>" target="_blank"><p>E:  <?php echo $demail; ?> </p></a>
                   <?php } ?>
                </div>
               <div class="col-lg-4">
                    <h4>HOURS</h4>
                    <?php if($opening_hours){?>
                   <?php echo $opening_hours;?>
                    <?php } ?>
                    <?php if($book_a_tour_text){?>
                   <a href="<?php echo $book_a_tour_link; ?>" class="showhome-bow-btn"><?php echo $book_a_tour_text; ?></a>
                   <?php } ?>
               </div>
               
               <div class="col-lg-4">
               <?php echo $home_map_data; ?>
               </div>
           </div>
        </div>
     
    </section>

    
    
    
    <section class="communities-featuring-pavanna">
       <div class="container">
           <div class="heading-box text-center">
               <?php if( get_field('communities_featuring_title')) { ?>
                <h3 class="h3"><?php echo get_field('communities_featuring_title'); ?> <?php the_title(); ?></h3>
                <?php } else{?> 
                <h3 class="h3">Communities Featuring <?php the_title(); ?></h3>
                <?php } ?>
                <?php if( get_field('communities_featuring_content')) { ?> 
                    <p><?php echo get_field('communities_featuring_content'); ?></p>
                <?php } else{?>
                    <p>Prominent Homes is a leading Alberta New Home Builder with offices in Calgary and Edmonton.</p> 
                <?php } ?>
                
            </div>
           <div class="communities-featuring-pavanna-main-bx">
           <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel owl-theme south-shore-carousel">
                     
                
                <?php
$featured_posts = get_field('communities_choose',$id);
if( $featured_posts ): ?>

    <?php foreach( $featured_posts as $post ):
        $imgurl = get_the_post_thumbnail_url( $post, 'full' );
        $content = get_the_content( $post);
        $title = get_the_title( $post);
        $community_logo = get_field('community_logo', $post);
        
        $image_id = get_post_thumbnail_id();
        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
        $image_title = get_the_title($image_id);
        $permalink = get_permalink( $post );
    ?>

       
    
    

<div class="item">
<div class="row">
<div class="col-lg-6">
<div class="south-shore-img-bx">
<?php if($imgurl){?>
<img src="<?php echo $imgurl;?>" alt="<?php echo $image_alt;?>">
<?php } else{?>
<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/12/placeholder.png" alt="<?php echo $image_alt;?>">
<?php } ?>
</div>
</div>
<div class="col-lg-6">
<div class="project-contain-box">
<?php if($community_logo){?>
<img src="<?php echo $community_logo;?>" class="communities-logo-left" alt="">
<?php } else{?>
<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/12/placeholder.png" class="communities-logo-right" alt="">
<?php } ?>
<h3 class="h3"><strong><?php echo $title;?></strong></h3>
<p><?php echo $content; ?></p>
<a href="<?php echo $permalink;?>" class="btn">Learn More</a>
</div>
</div>
</div>
</div>

<?php endforeach; ?>
<?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>


            



			   
			   
			   
			   
			   
                </div>
               </div>
			   
               
			   
			   
            </div>
           </div>
        </div>
    </section>
    <?php
    $term = get_the_terms( get_the_ID() , 'property_types');
    $fTerm = $term[0];
     ?>    
    
    <section class="details-similar-home-plan">
      <div class="container">
            <div class="heading-box text-center">
                <h3 class="h3">Similar Home Plans </h3>
                <p>Prominent Homes is a leading Alberta New Home Builder with offices in Calgary and Edmonton.</p>
            </div>
        </div>
    
    </section>
    
    
    <div class="main-details-similar-home-plan">
      <div class="container">
         <div class="row">
           
         <?php
        $args = array(
            'post_type' => 'property',
            'tax_query' => array(
                array(
                    'taxonomy' => 'property_types',
                    'field' => 'slug',
                    'terms' => $fTerm->slug,
                )
            ),
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
            $property_price = get_field('property_price_text');
            $bedrooms = get_field('bedrooms');
            $area = get_field('area');
            $car_garages = get_field('car_garages');
            
    ?>
         <div class="col-lg-4">
                <div class="details-similar-home-plan-bx">
                <a href="<?php the_permalink(); ?>"><h4><?php echo $title;?></h4></a>
                    <h6><?php echo $bathrooms;?> Bathrooms</h6>
                    <div class="details-similar-home-plan-img">
                    <?php if($imgurl){?>
            <a href="<?php the_permalink(); ?>"> <img src="<?php echo $imgurl;?>" alt="<?php echo $image_alt;?>"></a>
            <?php } else{?>
               <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/12/placeholder.png" alt="<?php echo $image_alt;?>">
               <?php } ?>
                    </div>
                        <ul class="list-inline">

                        <?php if($bedrooms){?>
                         <li>
                             <div class="list-pro-option-bx"><img src="<?php echo get_template_directory_uri(); ?>/images/list-pro-icon1.png" alt=""> <span><?php echo $bedrooms;?> Bedrooms</span></div>
                        </li>
                        <?php } ?>
                        <?php if($bathrooms){?>
                         <li>
                             <div class="list-pro-option-bx"><img src="<?php echo get_template_directory_uri(); ?>/images/list-pro-icon2.png" alt=""> <span><?php echo $bathrooms;?> Bathrooms</span></div>
                        </li>
                        <?php } ?>   
                        <?php if($area){?>
                         <li>
                             <div class="list-pro-option-bx"><img src="<?php echo get_template_directory_uri(); ?>/images/list-pro-icon3.png" alt=""> <span><?php echo $area;?>sq.ft.</span></div>
                        </li>
                        <?php } ?>

                        </ul>
                        <div class="details-similar-price">
                         <!-- <h6>Starting </h6> -->
                            <h4><?php echo $property_price;?></h4>
                        </div>
                    
               </div>
             </div>

             <?php endwhile; wp_reset_postdata(); ?>

               


              





          </div>



          
          <div class="btn-new-padding22">
            <a href="<?php echo home_url('/home-plan/');?>" class="btn">View more homes</a>
          </div>
        </div>
    </div>

    <div class="container">
    <div class="home-details-contact-main-box">
        <div class="inner-contact-form-box">
                           <h3 class="h3">Contact Us</h3>
                          
<?php echo do_shortcode('[contact-form-7 id="3373" title="Contact form 1"]');?>
                       </div>
    </div>
        </div>
    <!------- Home details end -------->
<?php get_footer();?>
<script type="text/javascript">
jQuery(document).on('submit', '#newCustomerForm', function(event) {
    event.preventDefault(); 
    var newCustomerForm = jQuery(this).serialize();
    jQuery("#overlay").fadeIn(300);　
 jQuery.ajax({
        type: 'POST',
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        dataType:'json',
        data: newCustomerForm, success: function (result) {

       if(result){
        jQuery("#overlay").fadeOut(300);
        console.log(result);
        swal("Message Send", "", "success", {
  button: "ok",
});
        jQuery('#newCustomerForm')[0].reset();
       }
        },
        error: function () {
            
            swal("Error Message Send", "", "error", {
  button: "ok",
});
        }
    });






});

function my_function(val){
 
 //alert(val);
document.getElementById("myText").value = val;

}  
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style type="text/css">
    #button{
  display:block;
  margin:20px auto;
  padding:10px 30px;
  background-color:#eee;
  border:solid #ccc 1px;
  cursor: pointer;
}
#overlay{   
  position: fixed;
  top: 0;
  z-index: 100;
  width: 100%;
  height:100%;
  display: none;
  background: rgba(0,0,0,0.6);
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner1 {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
.is-hide{
  display:none;
}
</style>