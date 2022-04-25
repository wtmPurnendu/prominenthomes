<?php 
/**
 * Template Name: Home Plan
 * 
 */ 

get_header();

//Order By
if($_GET['sortby']=='DESC'){
   $short = 'DESC';
}else if($_GET['sortby']==''){
    $short = 'DESC';
}else{
   $short = 'ASC';
}
?>
<!------- inner banner area start -------->
<section class="inner-banner-area">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <ul class="pagger">
            <li><a href="<?php echo home_url();?>">Home</a></li>
            <li><?php the_title(); ?></li>
        </ul>
    </div>
</section>
<!------- inner banner area stop -------->

<!------- Home Plan start -------->
   <section class="inner-home-plan-section">
    <div class="container">
             <div class="row">
      <div class="col-lg-3">
        <h3>Product Categories</h3>
        <ul class="nav nav-tabs" role="tablist">
      <?php 
      $wcatTerms = get_terms('property_types', array('hide_empty' => 0, 'order' =>'DESC', 'parent' =>0));
      $p=1;
      foreach($wcatTerms as $wcatTerm) : 
      $catImage = get_field('pcimage',$wcatTerm);
      ?>
            <li class="nav-item"> 
             <a class="nav-link <?php if($p==1){?>active<?php } ?>" data-toggle="tab" href="#tabs-<?php echo $wcatTerm->term_id; ?>" role="tab"><?php echo $wcatTerm->name; ?>
                <img src="<?php echo $catImage['url'];?>" alt="<?php echo $catImage['alt'];?>"> 
               </a> 
            </li>
      <?php $p++; endforeach;  ?>
         
        </ul>
      </div>
      <div class="col-lg-9">
          <div class="list-property-hd">
          <h3>List of property</h3>
              <ul class="list-inline">
               <li>Short by :</li>
                  <li>
                  <select name="sortby">
            	      <option value="">Select</option>
                     <option <?php if($short=='DESC') {?> selected <?php } ?> value="DESC">Latest</option>
                     <option <?php if($short=='ASC') {?> selected <?php } ?> value="ASC">Oldest</option>
               </select>
                  </li>
              </ul>
           </div>
        <div class="tab-content">

        <?php 
$wcatTerms = get_terms(
'property_types', array('hide_empty' => 0,  'order' =>'DESC', 'parent' =>0));
$pp=1;
        foreach($wcatTerms as $wcatTerm) : 
    ?>



          <div class="tab-pane <?php if($pp==1){?>active<?php } ?>" id="tabs-<?php echo $wcatTerm->term_id; ?>" role="tabpanel">
               
            <?php
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;   
            $args = array(
            'post_type' => 'property',
            'order' => $short,
            'paged' => $paged,
            'tax_query' => array(
               array(
                  'taxonomy' => 'property_types',
                  'field' => 'slug',
                  'terms' => $wcatTerm->slug,
               )
            ),
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
			   
			   <div class="main-list-property-box">
                   <div class="row">
                     <div class="col-lg-9">
                        <div class="list-property-main">
                           <div class="list-property-img-bx">
               <?php if($imgurl){?>
               <img src="<?php echo $imgurl;?>" alt="<?php echo $image_alt;?>">
            <?php } else{?>
               <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/12/placeholder.png" alt="<?php echo $image_alt;?>">
               <?php } ?>
            </div>
                          
                            <div class="list-property-description">
                     <h4><a href="<?php the_permalink();?>"><?php echo $title;?></a></h4>
                               <?php if($bathrooms){?>
                                <h6><?php echo $bathrooms;?> Bathrooms</h6>
                                <?php } ?>
                                <?php if($address){?>
                                <p><?php echo $address;?></p>
                                <?php } ?>
                                <?php if($property_price){?>
                                <h5>Starting from <span><?php echo $property_price;?></span></h5>
                                <?php } ?>
                                
                                <a href="<?php the_permalink();?>" class="inn-list-po-btn">View More</a>
                            </div>
                         </div>
                       </div>
                       
<div class="col-lg-3">
   <div class="list-property-option-box">
         <?php if($bedrooms){?>
         <div class="list-pro-option-bx">
            <img src="<?php echo get_template_directory_uri(); ?>/images/list-pro-icon1.png" alt=""> 
            <span><?php echo $bedrooms;?> Bedrooms</span>
         </div>
         <?php } ?>
         <?php if($bathrooms){?>
         <div class="list-pro-option-bx">
            <img src="<?php echo get_template_directory_uri(); ?>/images/list-pro-icon2.png" alt="">
             <span><?php echo $bathrooms;?> Bathrooms</span>
         </div>
         <?php } ?>
         <?php if($area){?>
         <div class="list-pro-option-bx">
            <img src="<?php echo get_template_directory_uri(); ?>/images/list-pro-icon3.png" alt=""> 
            <span><?php echo $area;?> ft</span>
         </div>
         <?php } ?>
         <?php if($car_garages){?>
         <div class="list-pro-option-bx">
            <img src="<?php echo get_template_directory_uri(); ?>/images/list-pro-icon4.png" alt=""> 
            <span><?php echo $car_garages;?> Car Garage</span>
         </div>
         <?php } ?>
   </div>
   
</div>
                   </div>
              </div>
              <?php endwhile; wp_reset_postdata(); ?> 
			  
			  
			
			  
			  
			  
              <!-- <img src="<?php echo get_template_directory_uri(); ?>/images/pagination.png" class="img-fluid pagination-img" alt=""> -->
          </div>
       <?php $pp++; endforeach;  ?>



       <ul class="pagination">
        	<?php 
                    $big = 999999999; // need an unlikely integer
                    $pages = paginate_links( array(
                                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                            'format' => '?paged=%#%',
                                            'current' => max( 1, get_query_var('paged') ),
                                            'total' => $loop->max_num_pages,
                                            'prev_next' => true,
                                            'prev_text'          => __('<'),
                                            'next_text'          => __('>'),
                                            'type' => 'array'
                                        ) );
                    if( is_array( $pages ) ) {					
                        $i = 1;
                        foreach ( $pages as $page ) {
                            echo '<li>'.$page.'</li>';
                            $i++;
                        }
                    }
                ?>
            
            </ul>
		  
		  
          
        </div>
      </div>
    </div>
       
    </div>
    </section>
<!------- Home Plan end -------->
<?php get_footer(); ?>
<script type="text/javascript">
   jQuery('select').on('change', function() {
   var aa=  this.value;
   window.location.href ="<?php echo site_url(); ?>/home-plan/?sortby="+aa;
   });

</script>