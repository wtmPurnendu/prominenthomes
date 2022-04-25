<?php 
/**
 * Template Name: Gallery
 * 
 */ 

get_header(); ?>
<!------- inner banner area start -------->
<section class="inner-banner-area">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <ul class="pagger">
            <li><a href="<?php echo home_url(); ?>">Home</a></li>
            <li><a href="#">Resources</a></li>
            <li><?php the_title(); ?></li>
        </ul>
    </div>
</section>
<!------- inner banner area stop -------->

<!--------- gallery area start ---------->
<section class="main-area gallery-area">
    <div class="container">
        <h3 class="h3">Gallery and  <strong>Virtual Tours</strong></h3>
        <div class="gallery-menu">
            <ul>
                <li class="active" data-filter="*">All</li>
                <?php $wcatTerms = get_terms('gallery_cat', array('hide_empty' => 0, 'order' =>'asc', 'parent' =>0));
                    foreach($wcatTerms as $wcatTerm) : ?>
                <li data-filter=".filter-<?php echo $wcatTerm->term_id; ?>"><?php echo $wcatTerm->name; ?></li>
                 <?php endforeach;  ?>
            </ul>
        </div>

<?php 
$wcatTerms1 = get_terms(
'gallery_cat', array('hide_empty' => 0,  'order' =>'asc', 'parent' =>0));
        foreach($wcatTerms1 as $wcatTerm1) : 
    ?>

    <?php
                    $args = array(
                        'post_type' => 'galleries',
                        'order' => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'gallery_cat',
                                'field' => 'slug',
                                'terms' => $wcatTerm1->slug,
                            )
                        ),
                        'posts_per_page' => 1
                    );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                    $imgurl = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                    $title=get_the_title($post->ID);
                ?>

        <div class="row row-12 gallery-item">
            <div class="col-lg-4 col-6 filter-<?php echo $wcatTerm1->term_id; ?>">
                <div class="gallery-box">
                    <img src="<?php echo $imgurl;?>" alt="#" title="">
                    <a href="javascript:void(0);" data-fancybox="single" data-src="<?php echo $imgurl;?>" class="image-zoom"><i class="zmdi zmdi-search"></i></a>
                </div>
            </div>

<?php endwhile; wp_reset_postdata(); ?> 
     <?php endforeach;  ?>
            


        </div>
    </div>
</section>
<!--------- gallery area stop ---------->

<?php get_footer(); ?>