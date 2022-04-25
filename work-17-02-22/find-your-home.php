<?php 
/**
 * Template Name: Find Your Home
 * 
 */ 

get_header(); 
error_reporting(E_ERROR | E_PARSE);
?>
<?php 
 $communities = $_GET['com'];
  $home = $_GET['ho'];
  $ht = $_GET['ht'];
?>
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
             
               
               <form method="get" action="<?php echo site_url(); ?>/find-your-home/">

               <?php 
                  //$dement = $_GET['department'];
                ?>
                  <div class="find-home-search-input-bx">
                     <select class="form-control " name="com">
                     <option value="">Select a Communities</option>
                     <?php 
                      $args = array( 
                          'post_type' => 'communities',
                          'orderby' => 'ID',
                          'posts_per_page' =>-1
                        );
                      $loop = new WP_Query( $args );      
                      $uniqArray = array();    
                      while ( $loop->have_posts() ) : $loop->the_post();  
                    
                        $community = get_the_title();
                        $slug = $loop->post->post_name;
                    
                    ?>
                       <option <?php if(get_the_ID()==$communities) {?> selected <?php } ?> value="<?php echo get_the_ID();?>"><?php echo $community; ?></option>
                    <?php endwhile; wp_reset_postdata(); ?>
                      </select>
                   </div>


                   <div class="find-home-search-input-bx">
                     <select class="form-control" name="ho">
                     <option value="">Select Home</option>
                     <?php 
$wcatTerms = get_terms(
'property_types', array('hide_empty' => 0, 'order' =>'asc', 'parent' =>0));
        foreach($wcatTerms as $wcatTerm) : 
    ?>
                      <option <?php if($home ==$wcatTerm->term_id) { ?> selected <?php } ?> value="<?php echo $wcatTerm->term_id; ?>"><?php echo $wcatTerm->name; ?></option>
                       <?php endforeach;  ?>
                      </select>
                   </div>
                   <div class="find-home-search-input-bx">
                     <select class="form-control " name="ht">
                     <option value="">Home Type</option>
                     <?php 
                      $args = array( 
                          'post_type' => 'property',
                          'orderby' => 'ID',
                          'posts_per_page' =>-1
                        );
                      $loop = new WP_Query( $args );      
                      $uniqArray = array();    
                      while ( $loop->have_posts() ) : $loop->the_post();  
                    
                        $dent = get_field('home_types');
                        //var_dump($dent);
                    if(!in_array($dent, $uniqArray)){
                      array_push($uniqArray, $dent);
                    ?>
                       <option <?php if(!empty($dent==$ht)) {?> selected <?php } ?> value="<?php echo $dent;?>"><?php echo $dent; ?></option>
                       <?php  }
   endwhile; wp_reset_postdata(); ?>
                      </select>
                   </div>
                   <div class="find-home-advnce-src-bx" data-toggle="modal" data-target="#myModal">
                       Advance  Search
                   </div>
                   
                   <div class="find-home-search-input-bx2">
                       <button class="btn btn-submit" type="submit">Submit</button>
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
$tax_query=[];
$meta_query=[];
if ($home) {
   $tax_query[]=['taxonomy' => 'property_types','field' => 'id','terms' =>$home];
}
if($communities){
  $meta_query[] = ['key'=> 'communities_choose','value'=>$communities,'compare' => 'LIKE',];
}
if($ht){
  $meta_query[] = ['key'=> 'home_types','value'=>$ht,'compare' => 'LIKE',];
}
if (!empty($tax_query) || !empty($meta_query)) {
  //var_dump($tax_query);//die();
  $args_tax_query = ['relation' => 'AND', $tax_query];
  $args_meta_query = ['relation' => 'OR', $meta_query];
  $property_args = array(
     'post_type' => 'property',
     'posts_per_page'=>'-1',
     'tax_query' => $args_tax_query,
     'meta_query'=>$args_meta_query
 
  );
}else{
  $property_args = array(
     'post_type' => 'property',
     'posts_per_page'=>'-1',
 
  );
}
            $loop = new WP_Query( $property_args );
            while ( $loop->have_posts() ) : $loop->the_post();
            $communities_choose = get_field('communities_choose');
            //print_r($communities_choose);
            //if(in_array($communities, $communities_choose)){ 
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
    <h5><a href="<?php echo the_permalink();  ?>"><?php echo $title; ?></a></h5>
   <ul class="list-inline plan-rivercrest-inn-option">
      <li>From <?php echo $property_price;?></li>
      <li><?php echo $bedrooms;?> Bed</li>
      <li><?php echo $bathrooms;?> Bath</li>
      <li><?php echo $area;?></li>
   </ul>
    </div>
   
</div>
</div>
<?php 
//} 
endwhile; wp_reset_postdata(); ?> 



               



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
               <!-- <div class="col-lg-4">
                    <select class="form-control ">
                       <option>Property Status</option>
                      </select>
                  </div> -->
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
                        <div class="col-sm-12"><div id="slider-range"></div></div>
                    </div>
                    <div class="row slider-labels d-block pl-3 pr-3">
                        <div class="d-flex justify-content-between">
                            <div class="col-xs-6 caption">
                                <strong>Sqf:</strong> <span id="slider-range-value1"></span>
                            </div>
                            <div class="col-xs-6 text-right caption">
                                <strong>Sqf:</strong> <span id="slider-range-value2"></span>
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
                    <div class="row pl-1 pr-1">
                        <div class="col-sm-12"><div id="slider-range2"></div></div>
                    </div>
                    <div class="row slider-labels d-block pl-3 pr-3">
                        <div class="d-flex justify-content-between">
                            <div class="col-xs-6 caption">
                                <strong>Min Price:</strong> <span id="slider-range-value3"></span>
                            </div>
                            <div class="col-xs-6 text-right caption">
                                <strong>Max Price:</strong> <span id="slider-range-value4"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                          <form>
                            <input type="hidden" name="min-value3" value="">
                            <input type="hidden" name="max-value4" value="">
                          </form>
                        </div>
                    </div>
                  </div>
              </div>
            </form>
        </div>
        
      </div>
      
    </div>
  </div>
    </section>

<?php get_footer(); ?>

<script>
  // renge slider one

  jQuery(document).ready(function() {
    jQuery('.noUi-handle').on('click', function() {
      jQuery(this).width(50);
      });
      var rangeSlider = document.getElementById('slider-range');
      var moneyFormat = wNumb({
        decimals: 0,
        thousand: ',',
      });
      noUiSlider.create(rangeSlider, {
        start: [500000, 1000000],
        step: 1,
        range: {
          'min': [100000],
          'max': [1000000]
        },
        format: moneyFormat,
        connect: true
      });
      
      // Set visual min and max values and also update value hidden form inputs
      rangeSlider.noUiSlider.on('update', function(values, handle) {
        document.getElementById('slider-range-value1').innerHTML = values[0];
        document.getElementById('slider-range-value2').innerHTML = values[1];
        document.getElementsByName('min-value').value = moneyFormat.from(values[0]);
        document.getElementsByName('max-value').value = moneyFormat.from(values[1]);
      });
    });

    // renge slider two

    jQuery(document).ready(function() {
      jQuery('.noUi-handle').on('click', function() {
        jQuery(this).width(50);
      });
      var rangeSlider = document.getElementById('slider-range2');
      var moneyFormat = wNumb({
        decimals: 0,
        thousand: ',',
      });
      noUiSlider.create(rangeSlider, {
        start: [500000, 1000000],
        step: 1,
        range: {
          'min': [100000],
          'max': [1000000]
        },
        format: moneyFormat,
        connect: true
      });
      
      // Set visual min and max values and also update value hidden form inputs
      rangeSlider.noUiSlider.on('update', function(values, handle) {
        document.getElementById('slider-range-value3').innerHTML = values[0];
        document.getElementById('slider-range-value4').innerHTML = values[1];
        document.getElementsByName('min-value3').value = moneyFormat.from(values[0]);
        document.getElementsByName('max-value4').value = moneyFormat.from(values[1]);
      });
    });
</script>