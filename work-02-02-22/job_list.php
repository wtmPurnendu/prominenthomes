<?php 
/**
 * Template Name: Jobs List
 */ 
get_header(); ?>

<?php 
  $search = $_GET['search'];
 ?>

<?php
while ( have_posts() ) : the_post();
$image=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full'); 
?>
    <!------------ inner banner area start ----------->
    <section
      class="inner_banner_area"
      style="background-image: url(<?php echo $image[0];?>)"
    ></section>
    <!------------ inner banner area stop ----------->
<?php endwhile;  ?>
<!------------ inner banner area stop ----------->
<!-------- about area start --------->
<section class="about_area">
   <div class="container">
      <div class="heading_area">
         <nav aria-label="breadcrumb">
            <ol  class="breadcrumb wow fadeInDown" data-wow-duration="2s"data-wow-delay=".2s">
               <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">carrer</li>
            </ol>
         </nav>
         <h1 class="wow fadeInDown" data-wow-duration="3s" data-wow-delay=".3s" >
            Search Job
         </h1>
      </div>
      <div class="search-job-and-department-section">
         <div class="row">
            <div  class="col-lg-8 wow fadeInLeft" data-wow-duration="2s"data-wow-delay=".2s">
               <form method="get" action="<?php echo site_url(); ?>/jobs-list">
               <div class="input-group">
                  <input type="text" required class="form-control" value="<?php echo $search; ?>" name="search" placeholder="Search here" />
                  <div class="input-group-append">
                     <button class="btn btn-secondary" type="submit">
                     <img src="<?php echo get_template_directory_uri(); ?>/images/search.png" alt="" />
                     </button>
                  </div>
               </div>
               </form>
            </div>
            <div class="col-lg-4 wow fadeInRight" data-wow-duration="2s" data-wow-delay=".2s" >

<?php 
   $dement = $_GET['department'];
 ?>
               <select name="department" id="department">
                   <option value="">Select a Department</option>
<?php 
   $args = array( 
      'post_type' => 'jobs',
      'orderby' => 'ID',
      'posts_per_page' =>-1
    );
   $loop = new WP_Query( $args );      
   $uniqArray = array();    
   while ( $loop->have_posts() ) : $loop->the_post();  
 
    $dent = get_field('department');
if(!in_array($dent, $uniqArray)){
   array_push($uniqArray, $dent);
?>


Single-Family
Bungalow
Duplex
Townhouse

   <?php  }
   endwhile; wp_reset_postdata(); ?>
               </select>
            </div>
         </div>
      </div>
<?php

   //Order By
    if($_GET['sortby']=='DESC'){
        $short = 'DESC';
    }else if($_GET['sortby']==''){
         $short = 'DESC';
    }else{
        $short = 'ASC';
    }

    //Post par page
    if($_GET['items'] =='6'){
      $item = '6';
    }elseif ($_GET['items'] =='10') {
       $item = '10';
    }elseif ($_GET['items'] =='20') {
       $item = '20';
    }elseif ($_GET['items'] =='30') {
       $item = '30';
    }else{
       $item = '6';
    }



?>
<?php 
   $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;   
   
if ($dement !="" && $search=="") {
  

   $args = array( 
      'post_type' => 'jobs',
      'meta_key' => 'deadline',
      'orderby' => 'meta_value_num',
       'order' => $short,
       'paged' => $paged,
       'meta_query'  => array(
         'relation'     => 'AND',
         array(
            'key'    => 'department',
            'value'     => $dement,
            'compare'   => '='
         )
      ),
       'posts_per_page' =>$item
    );
      }elseif($dement =="" && $search!=""){
         $args = array( 
            'post_type' => 'jobs',
            'meta_key' => 'deadline',
            'orderby' => 'meta_value_num',
            
             'order' => $short,
             'paged' => $paged,
             's' => $search,
             'posts_per_page' =>$item
          );
      }else{
$args = array( 
'post_type' => 'jobs',
'paged' => $paged,
'post_status' => 'publish',

'meta_key' => 'deadline',
'orderby' => 'meta_value_num',
'order' => 'ASC',
'posts_per_page' =>$item
);
      }

   $loop = new WP_Query( $args );
   $count = $loop->found_posts;
   if($loop->have_posts()){      
 ?>
      <div class="job-found-date-posted-box wow fadeInDown" data-wow-duration="2s" data-wow-delay=".2s" >
         <h6><?php echo $count; ?> Jobs found</h6>
         <div class="sort-by-post">
             <form class="form-inline" method="get" action="<?php echo site_url();?>/jobs-list">
            <p>Sort By</p>
            <select name="sortby">
            	 <option value="">Select</option>
                <option <?php if($short=='DESC') {?> selected <?php } ?> value="DESC">Latest</option>
                <option <?php if($short=='ASC') {?> selected <?php } ?> value="ASC">Oldest</option>
            </select>
         </form>
         </div>
      </div>
      <div class="search-job-listing-box-start">
         <table class="table-responsive">
            <tbody>

 


 <?php 
	while ( $loop->have_posts() ) : $loop->the_post();							
	$imgurl = get_the_post_thumbnail_url( get_the_ID(), 'full' );
	$content = get_the_excerpt();
  	$title = get_the_title();
  	//Acf value
  	$department = get_field('department');
  	$location = get_field('location');
	$image_id = get_post_thumbnail_id();
 	$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
  	$image_title = get_the_title($image_id);
   $deadline = get_field('deadline');
   $currentDate = date("j F Y");
?>

               <tr class="wow fadeInDown" data-wow-duration="2s" data-wow-delay=".2s" >
                  <td class="search-job-heading">
                     <h4><?php echo $title; ?></h4>
                  </td>
                  <?php if ($department): ?>
                     <td>
                        <h6>Department</h6>
                        <h5><?php echo $department; ?></h5>
                     </td>
                  <?php endif ?>
                  <td>
                     <h6>Deadline</h6>
                     <h5><?php echo $deadline; ?></h5>
                  </td>
                  <?php if ($location): ?>
                  <td class="search-job-location">
                     <h6>Location</h6>
                     <h5><?php echo $location;  ?></h5>
                  </td>
                  <?php endif ?>
                  <td>
                     <a href="<?php the_permalink(); ?>" class="btn btn-success">View Job</a>
                  </td>
               </tr>

<?php endwhile; wp_reset_postdata(); } else{?>

<tr class="wow fadeInDown" data-wow-duration="2s" data-wow-delay=".2s" >
   <td class="search-job-heading">
      <h4>Not Found!</h4>
   </td>
   
</tr>
<?php } ?>
            </tbody>
         </table>
         <div class="items-per-page-pagination wow fadeInUp"  data-wow-duration="2s"  data-wow-delay=".2s"  >
              <form name="" method="get" action="">
            <div class="sort-by-post">
             
               <p>Items per page</p>
               <select name="items" id="items">
                  <option <?php if($item=='6') {?> selected <?php } ?> value="6">6</option>
                  <option <?php if($item=='10') {?> selected <?php } ?> value="10">10</option>
                  <option <?php if($item=='20') {?> selected <?php } ?> value="20">20</option>
                  <option <?php if($item=='30') {?> selected <?php } ?> value="30">30</option>
               </select>
               
            </div>
            </form>
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
</section>
<!-------- about area stop --------->

<?php get_footer();?>
<script type="text/javascript">
   $('select').on('change', function() {
   var aa=  this.value;
   //window.open(this.href);
   window.location.href ="<?php echo site_url(); ?>/jobs-list/?sortby="+aa;
   });

   $('#items').on('change', function() {
   var bb=  this.value;
   var url      = $(location).attr('href');
   //alert(url);
   //window.open(this.href);
   //window.location.href ="<?php echo site_url(); ?>/jobs-list/?items="+bb;
   window.location.href =url+'/?items='+bb;
   });

   $('#department').on('change', function() {
   var cc=  this.value;
   //window.open(this.href);
   window.location.href ="<?php echo site_url(); ?>/jobs-list/?department="+cc;
   });
</script>