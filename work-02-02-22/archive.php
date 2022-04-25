<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

$description = get_the_archive_description();
$term = get_queried_object();
$cat_name = $term->name;
$termid = $term->term_id;
?>
<?php $options = get_option('nz_business_traveller'); ?>
<!------- airport area start --------->
<section class="main_area reviewbg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 pr-4">
        <div class="airport_area">

<?php if ( have_posts() ) : ?>
	<?php $p=1; while ( have_posts() ) : ?>
	<?php the_post(); 
		$imgurl = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		$content = get_the_excerpt();
		$title = get_the_title();
		$image2 = get_field('pimage');
		$image_id = get_post_thumbnail_id();
		$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
		$image_title = get_the_title($image_id);
	?>
	<?php if ($p==1) {?>
<div class="story_video review_video"> 
          	<a href="<?php the_permalink(); ?>"><img src="<?php echo $imgurl;?>" alt="<?php echo $image_alt; ?>" title="<?php echo $image_alt; ?>"> </a>
          </div>
          <div class="review_heading_area">
            <div class="d-flex justify-content-between">
              <div class="heading_box">
           
                <?php
											$cats = get_the_category(get_the_ID());
											foreach ( $cats as $cat ) {
												?>
												<a href="<?php echo get_category_link( $cat );?>">
													<div class="tag_box"><?php echo $cat->name;?></div>
												</a>
											<?php } ?>
                <a href="<?php the_permalink(); ?>" class="link"><h1><?php echo $title; ?></h1></a>
                <!-- <p><i class="far fa-clock"></i> <?php echo the_time( 'g:i a' ); ?></p> -->
              </div>
              
            </div>
          </div>
	<?php } else{?>
<div class="listarea">
  <div class="listing">
    <div class="imgBox">
    	<a href="<?php the_permalink(); ?>"><img src="<?php echo $imgurl;?>" alt="<?php echo $image_alt; ?>" title="<?php echo $image_alt; ?>"> </a>
    </div>
    <div class="w-100">
      <?php
	$cats = get_the_category(get_the_ID());
	foreach ( $cats as $cat ) {
		?>
		<a href="<?php echo get_category_link( $cat );?>">
			<div class="tag5"><?php echo $cat->name;?></div>
		</a>
	<?php } ?>
      <a href="<?php the_permalink(); ?>" class="link"><?php echo $title; ?></a>
      <p><?php echo substr($content,0,100); ?></p>
      <!-- <p><i class="far fa-clock"></i> <?php echo the_time( 'g:i a' ); ?></p> -->
    </div>
  </div>
</div>
	<?php } ?>
		
	<?php $p++; endwhile; ?>
	<?php //twenty_twenty_one_the_posts_navigation(); 
	
	the_posts_pagination( array(
				'prev_text'          => __( 'Previous', 'twentysixteen' ),
				'next_text'          => __( 'Next', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );
	
	?>
<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>
          
        </div>
      </div>
      <div class="col-lg-4 pl-4">
        <div class="most_popular_area">
          <h6 class="h6"><strong><?php echo $cat_name; ?></strong></h6>
          <div class="mostpopularbody">
            

           

<?php 
$args = array( 'post_type' => 'post','orderby' => 'ID', 'cat' =>$termid,'order' => 'DESC','posts_per_page' =>10 );
$loop = new WP_Query( $args );			 
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
              	<a href="<?php the_permalink(); ?>"><img src="<?php echo $imgurl;?>" alt="<?php echo $image_alt; ?>" title="<?php echo $image_alt; ?>"> </a>
              </div>
              <div class="w-100">
                <?php
	$cats = get_the_category(get_the_ID());
	foreach ( $cats as $cat ) {
		?>
		<a href="<?php echo get_category_link( $cat );?>">
			<div class="tag bg2"><?php echo $cat->name;?></div>
		</a>
	<?php } ?>
                <a href="<?php the_permalink(); ?>" class="link"><?php echo $title; ?></a> </div>
            </div>	
<?php endwhile; wp_reset_postdata(); ?>


          </div>
        </div>
        <div class="latest_post_area">
          <h5 class="h5"><strong><?php echo $options['latest_post_title']; ?></strong></h5>
          <div>
           



            <div class="row">
              
            	<?php 
$args = array( 'post_type' => 'post','orderby' => 'ID','order' => 'DESC','posts_per_page' =>12 );
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
                  	<a href="<?php the_permalink(); ?>"><img src="<?php echo $imgurl;?>" alt="<?php echo $image_alt; ?>" title="<?php echo $image_alt; ?>"> </a>
<div class="dtag">					  
<?php
	$cats = get_the_category(get_the_ID());
	foreach ( $cats as $cat ) {
		?>
		<a href="<?php echo get_category_link( $cat );?>">
			<div class="tag bg<?php echo $pp; ?>"><?php echo $cat->name;?></div>
		</a>
	<?php } ?>
					  </div>
                  </div>
                 <a href="<?php the_permalink(); ?>" class="link"><?php echo $title; ?></a> </div>
              </div>


              


           
<?php $pp++; if($pp==5){$pp=1;} endwhile; wp_reset_postdata(); ?>
 </div>

           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!------- airport area stop ---------> 
<?php if($options['opt-wp-editor-ads-archive']){?>

<!----- add area start ------>
<section class="add_area">
  <div class="container">
    <div class="add_body">
    	<?php echo $options['opt-wp-editor-ads-archive']; ?>
    </div>
  </div>
</section>
<!----- add area stop ------> 
<!----- add area stop ------> 
<?php } ?>
<?php get_footer(); ?>
