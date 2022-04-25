<?php get_header(); 

$categories_name = get_the_category(get_the_ID()); 

$term_id = $categories_name[0]->term_id;
$id = get_the_ID();
$imgurl = get_the_post_thumbnail_url( $id, 'full' );

$image_id = get_post_thumbnail_id();
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
$image_title = get_the_title($image_id);
?>
<?php $options = get_option('nz_business_traveller'); ?>
<!------- airport area start --------->
<section class="main_area reviewbg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="airport_area">
		      <div class="story_video review_video"> 
            <?php if(get_field('video_shortcode')){ ?>
              <?php the_field('video_shortcode'); ?>
         <?php } else {?>
            <img src="<?php echo $imgurl;?>" alt="<?php echo $image_alt; ?>" title="<?php echo $image_title; ?>"> 
          <?php } ?>
          </div>
          


          <div class="review_heading_area">
            <div class="d-flex justify-content-between">
              <div class="heading_box">
                <div class="tag_box"><?php echo $categories_name[0]->cat_name; ?></div>
                <h1><?php echo get_the_title($id);?></h1>
                <p><i class="far fa-clock"></i> <?php echo the_time( 'g:i a' ); ?></p>
              </div>
              <div class="review_box">
    <?php if (get_field('review_point')): ?>
         <div class="review"><?php echo get_field('review_point'); ?> <i class="fas fa-star"></i></div>
      <?php else: ?>
        <div class="review">4.5 <i class="fas fa-star"></i></div>
    <?php endif ?>
               

               <?php if (get_field('total_rating')): ?>
                 <p><?php echo get_field('total_rating'); ?></p>
                  <?php else: ?>
                  <p>6250 Rating</p>
               <?php endif ?>
               

              </div>


            </div>
          </div>
          <div class="review_box_two">
            <?php if (get_field('review_text')): ?>
              <h3><?php echo get_field('review_text');?></h3>
            <?php else: ?>
              <h3>Review :</h3>
            <?php endif ?>
            

            <div class="d-flex justify-content-between">
              <div class="ratingBox">
                <?php if (get_field('total_out_of_review')): ?>
                  <h5><?php echo get_field('total_out_of_review');?></h5>
                <?php else: ?>
                  <h5>4.5/5</h5>
                <?php endif ?>
                
                <div class="star">

                  <?php 
                  $star = get_field('total_star');
                  if($star){
                    for($i=0; $i<$star; $i++){
                   ?>
                  <i class="fas fa-star"></i>

                <?php } }else{?>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i> 
                <?php } ?>

                </div>
                <p>Avarage Ratings</p>
              </div>
              <div class="ratingBoxTWO">
                <?php if (get_field('average_ratings')): ?>
                  <h4><?php echo get_field('average_ratings'); ?></h4>
                <?php else: ?>
                  <h4>4.5 out of 5</h4>
                <?php endif ?>
                
                <ul class="list">
                  <?php 

                    $star = get_field('location_ratings');
                    $rest_star = 5 - $star;

                ?>
                  <li>
                    <div class="number"><?php echo get_field('location_ratings',$id); ?></div>
                   <?php if(get_field('rating_title_1')) { the_field('rating_title_1'); } else { echo 'Location';} ?>
                  </li>
                  <?php 
                    $star = get_field('first_impressions_ratings');
                    $rest_star = 5 - $star;
                  ?>
                  <li>
                    <div class="number"><?php echo get_field('first_impressions_ratings',$id); ?></div>
                   <?php if(get_field('rating_title_2')) { the_field('rating_title_2'); } else { echo 'First Impressions';} ?> </li>
                  <?php 
                    $star = get_field('meals');
                    $rest_star = 5 - $star;
                ?>
                  <li>
                    <div class="number"><?php echo get_field('meals',$id); ?></div>
                    <?php if(get_field('rating_title_3')) { the_field('rating_title_3'); } else { echo 'Meals';} ?> </li>
                  <?php 
                    $star = get_field('overall');
                    $rest_star = 5 - $star;
                ?>
                  <li>
                    <div class="number"><?php echo get_field('overall',$id); ?></div>
                    <?php if(get_field('rating_title_4')) { the_field('rating_title_4'); } else { echo 'OVERALL';} ?> </li>
                </ul>

              </div>
            </div>
          </div>
          <div class="review_box_two">
            <?php if (get_field('laveltl',$id)): ?>
              <h3><?php echo get_field('laveltl',$id); ?></h3>
            <?php else: ?>
              <h3>Top Line :</h3>
            <?php endif ?>
            <div class="d-flex justify-content-between">
              <ul class="lineBOX">
                <li>Route  : <?php echo get_field('route',$id); ?></li>
                <li>Airline : <?php echo get_field('airline',$id); ?></li>
                <li>Wifi <i class="fa fa-wifi" aria-hidden="true"></i> : </strong><?php the_field('wifi'); ?></li>
              </ul>
              <ul class="lineBOX">
                <li>Cabin Class : <?php echo get_field('cabin_class',$id); ?></li>
                <li>Aircraft Type : <?php echo get_field('aircraft_type',$id); ?></li>
              </ul>
              <ul class="lineBOX">
                <li>Flight : <?php echo get_field('flight',$id); ?></li>
                <li>Seat : <?php echo get_field('seat',$id); ?></li>
              </ul>
            </div>
          </div>
          <div class="review_box_two">
            <h3>Description :</h3>
            <div class="faq-section">
              <div id="accordion">
<?php if( have_rows('tabs') ): ?>
    <?php $pks = 1; while( have_rows('tabs') ): the_row(); 
        $tab_title = get_sub_field('tab_title');
        $tab_content = get_sub_field('tab_content');
        ?>
                <div class="card">
                  <div class="card-header" id="heading-<?php echo $pks; ?>">
                    <h5 class="mb-0"> <a role="button" data-toggle="collapse" href="#collapse-<?php echo $pks; ?>" aria-expanded="<?php if($pks==1){?>true<?php } else{?>false<?php } ?>" aria-controls="collapse-<?php echo $pks; ?>"> <span class="number">0<?php echo $pks; ?>.</span> <?php echo $tab_title;?> </a> </h5>
                  </div>

                  <div id="collapse-<?php echo $pks; ?>" class="collapse <?php if($pks==1){?>show<?php } ?>" data-parent="#accordion" aria-labelledby="heading-<?php echo $pks; ?>">
                    <div class="card-body">
                      <div class="descriptionReview">
                        <div class="descriptionReviewcontainBox">
                         <?php echo $tab_content;?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

<?php $pks++; endwhile; ?>
<?php endif; ?>
<?php if ( comments_open() || get_comments_number() ) : ?>
  <?php comments_template(); ?>
<?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
      <div class="most_popular_area">
          <h6 class="h6"><strong><?php echo $categories_name[0]->cat_name; ?></strong></h6>
           <div class="mostpopularbody">
              

              <?php 
$args = array( 'post_type' => 'post','orderby' => 'ID', 'cat' =>$term_id,'order' => 'DESC','posts_per_page' =>8 );
$loop = new WP_Query( $args );
$ps=1; 			 
while ( $loop->have_posts() ) : $loop->the_post();							
$imgurl = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$content = get_the_excerpt();
$title = get_the_title();

//Seo
$image_id = get_post_thumbnail_id();
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
$image_title = get_the_title($image_id);
?>
 <div class="mostpopularbox">
              <div class="imgBox">
              	<img src="<?php echo $imgurl;?>" alt="<?php echo $image_alt; ?>" title="<?php echo $image_alt; ?>"> 
              </div>
              <div class="w-100">
                <?php
	$cats = get_the_category(get_the_ID());
	foreach ( $cats as $cat ) {
		?>
		<a href="<?php echo get_category_link( $cat );?>">
			<div class="tag bg<?php echo $ps;?>"><?php echo $cat->name;?></div>
		</a>
	<?php } ?>
                <a href="<?php the_permalink(); ?>" class="link"><?php echo $title; ?></a> </div>
            </div>	
<?php $ps++; if($ps==5){$ps=1;} endwhile; wp_reset_postdata(); ?>


            </div>
        </div>
       
     
  
  
		<?php 
    //3
          if (get_field('ads_1_show_hide_copy2')==1): ?>
      <div class="add_img">
         <?php echo do_shortcode(get_field('ads_1_shortcode_copy2')); ?>
       </div>
    <?php endif ?>
	

        <div class="latest_post_area">
            <h5 class="h5"><strong><?php echo $options['latest_post_title']; ?></strong></h5>
            <div>
              <div class="row">
                

                <?php 
$args = array( 'post_type' => 'post','orderby' => 'ID','order' => 'DESC','posts_per_page' =>6 );
$loop = new WP_Query( $args );
$pp=1;			 
while ( $loop->have_posts() ) : $loop->the_post();							
$imgurl = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$content = get_the_excerpt();
$title = get_the_title();

//Seo
$image_id = get_post_thumbnail_id();
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
$image_title = get_the_title($image_id);
?>
              <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="latest_post_box">
                  <div class="imgBox"> 
                  	<img src="<?php echo $imgurl;?>" alt="<?php echo $image_alt; ?>" title="<?php echo $image_alt; ?>"> 
<?php
	$cats = get_the_category(get_the_ID());
	foreach ( $cats as $cat ) {
		?>
		<a href="<?php echo get_category_link( $cat );?>">
			<div class="tag bg<?php echo $pp; ?>"><?php echo $cat->name;?></div>
		</a>
	<?php } ?>
                  </div>
                 <a href="<?php the_permalink(); ?>" class="link"><?php echo $title; ?></a> </div>
              </div>


              


           
<?php $pp++; if($pp==5){$pp=1;} endwhile; wp_reset_postdata(); ?>


              </div>



            </div>
          </div>

        
<?php 
//2
  if (get_field('ads_1_show_hide_copy')==1): ?>
<div class="add_area2">
  <div class="add_body">
	<?php echo do_shortcode(get_field('ads_1_shortcode_copy')); ?>
  </div>
</div>
<?php endif ?>
        

        



      </div>
    </div>
  </div>
</section>
<!----- add area start ------>

 <?php 
 //1
   if (get_field('ads_1_show_hide')==1): 
   
?>
<!----- add area start ------>
<section class="add_area">
  <div class="container">
    <div class="add_body">
      <?php echo do_shortcode(get_field('ads_1_shortcode')); ?>
    </div>
  </div>
</section>
<?php endif ?>
<!----- add area stop ------> 

<?php get_footer();?>