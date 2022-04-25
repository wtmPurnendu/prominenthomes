<?php 
/**
 * Template Name: Giving Back
 * 
 */ 

get_header(); ?>
<!------- inner banner area start -------->
<section class="inner-banner-area">
    <div class="container">
        <h1><?php echo the_title(); ?></h1>
        <ul class="pagger">
            <li><a href="<?php echo home_url(); ?>">Home</a></li>
            <li><a href="<?php echo home_url('/about-us/'); ?>">About</a></li>
            <li><?php echo the_title(); ?></li>
        </ul>
    </div>
</section>
<!------- inner banner area stop -------->

<!------- our team area start -------->
<section class="main-area our-team-area achivments-area">
    <div class="container">
        <?php echo the_content(); ?>
<?php if( have_rows('giving-back') ): ?>
    <?php while( have_rows('giving-back') ): the_row(); 
        $giving_back_title = get_sub_field('giving-back-title');
        $giving_back_content = get_sub_field('giving_back_content');
        $giving_back_image = get_sub_field('giving_back_image');
    ?>
        <div class="row giving-back-area">
                <div class="col-lg-6 img-box">
                    <div class="img-box"><img src="<?php echo $giving_back_image['url'];?>" alt="<?php echo $giving_back_image['alt'];?>" title=""></div>
                </div>
                <div class="col-lg-6 contain-main-box">
                    <div class="contain-box">
                        <h3 class="h3"><?php echo $giving_back_title;?></h3>
                        <?php echo $giving_back_content;?>
                    </div>
                </div>
            </div>
    <?php endwhile; ?>
<?php endif; ?>
            <?php if (get_field('click_to_donate_link')): ?>
            <div class="view-all">
                <a href="<?php echo get_field('click_to_donate_link'); ?>" class="btn">
                    <?php if (get_field('click_to_donate_level')): ?>
                        <?php echo get_field('click_to_donate_level'); ?>
                    <?php else: ?>
                         click to donate
                    <?php endif ?>
            </a>
            </div>
            <?php endif ?>
            

    </div>    
</section>
<!------- our team area start -------->

<?php get_footer(); ?>