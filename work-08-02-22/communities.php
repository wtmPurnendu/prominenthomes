<?php 
/**
 * Template Name: Communities
 * 
 */ 

get_header(); ?>
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
<section class="main-area project-area communities-inner-section">
    <div class="container">
       
    <?php 
	$args = array( 'post_type' => 'communities','orderby' => 'ID', 'order' => 'ASC','posts_per_page' => -1 );
	$loop = new WP_Query( $args );			 
	while ( $loop->have_posts() ) : $loop->the_post();							
	$imgurl = get_the_post_thumbnail_url( get_the_ID(), 'full' );
    $content = get_the_content();
    $title = get_the_title();
    $community_logo = get_field('community_logo');
	
    $image_id = get_post_thumbnail_id();
    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
    $image_title = get_the_title($image_id);
?>   
    <div class="project-body">
            <div class="image-box">
             <?php if($imgurl){?>
               <img src="<?php echo $imgurl;?>" alt="<?php echo $image_alt;?>">
            <?php } else{?>
               <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/12/placeholder.png" alt="<?php echo $image_alt;?>">
               <?php } ?></div>
                <div class="project-contain-box">

                <?php if($community_logo){?>
                <img src="<?php echo $community_logo;?>" class="communities-logo-right" alt="">
                <?php } else{?>
                    <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/12/placeholder.png" class="communities-logo-right" alt="">
                <?php } ?>
                <h3 class="h3"><strong><?php echo $title;?></strong></h3>
                <p><?php echo substr($content,0,200);?></p>
                <a href="<?php the_permalink(); ?>" class="btn">Learn More</a>
            </div>
        </div>

        <?php endwhile; wp_reset_postdata(); ?>
        

    </div>
</section>
<?php get_footer(); ?>