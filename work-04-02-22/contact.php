<?php 
/**
 * Template Name: Contact
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
<!------- inner banner area stop -------->

<!-- header area stop --> 
   <section class="inner-contact-section">
       <div class="container">
          <div class="row">

<?php if( have_rows('contact_informations') ): ?>
    <?php while( have_rows('contact_informations') ): the_row(); 
        $ctitle = get_sub_field('ctitle');
    ?>
              <div class="col-sm-6 col-lg-3 d-flex align-items-stretch">
                 <div class="inner-contact-information-box-new2">
                    <h4><?php echo $ctitle;?></h4>
                     <div class="contact-new-inform-bx">
                <?php if( have_rows('sdcontact') ): ?>
                <?php while( have_rows('sdcontact') ): the_row(); 
                    $fimage = get_sub_field('fimage');
                    $information = get_sub_field('information');
                ?>     
                    <div class="media">
                      <img src="<?php echo $fimage['url'];?>" alt="<?php echo $fimage['alt'];?>">
                      <div class="media-body">
                        <p><?php echo $information;?></p>
                      </div>
                    </div>
                <?php endwhile; ?>
                <?php endif; ?>


                     </div>
                  </div>
              </div>


<?php endwhile; ?>
<?php endif; ?>
             
           </div>
           
<?php 
//Phone 1
 $phone_num = get_field('cphone_number');
 $phone_lavel = get_field('cphone_number_copy');
 //Email
 $email_add = get_field('email_address');
 $email_lavel = get_field('email_address_copy');
//Address
 $address_con = get_field('contact_address');
 $address_lavel =get_field('contact_address_copy');


 ?>

<div class="contact-inner-get-in-touch-box">
   <div class="row">
      <div class="col-lg-6">
         <div class="inner-contact-img-box">
            <img src="<?php echo get_template_directory_uri(); ?>/images/contact-img.jpg" alt="">
            <div class="contact-img-information-start">
               <?php if ($phone_num): ?>
                <div class="inner-contact-information-box">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/contact-icon1.png" alt="">
                  <?php if ($phone_lavel): ?>
                      <h5><?php echo $phone_lavel; ?></h5>
                  <?php else: ?>
                      <h5>Call Us :</h5>
                  <?php endif ?>
                  <p><a href="tel:<?php echo $phone_num; ?>" target="_blank"><?php echo $phone_num; ?></a></p>
               </div> 
               <?php endif ?>

               
               <?php if ($email_add): ?>
                <div class="inner-contact-information-box">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/contact-icon2.png" alt="">
                  <?php if ($email_lavel): ?>
                      <h5><?php echo $email_lavel; ?></h5>
                  <?php else: ?>
                      <h5>Email Us :</h5>
                  <?php endif ?>
                  <p><a href="mailto:<?php echo $email_add; ?>" target="_blank"><?php echo $email_add; ?></a></p>
               </div>
               <?php endif ?>

               
               <?php if ($address_con): ?>
                <div class="inner-contact-information-box">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/contact-icon3.png" alt="">
                  <?php if ($address_lavel): ?>
                      <h5><?php echo $address_lavel; ?></h5>
                  <?php else: ?>
                      <h5>Head Office :</h5>
                  <?php endif ?>
                  
                  <p><?php echo $address_con; ?></p>
               </div>
               <?php endif ?>

            </div>
         </div>
      </div>
      <div class="col-lg-6">
         <div class="inner-contact-form-box">
            <h3 class="h3"><?php echo get_field('contact_title'); ?></h3>
<p><?php echo get_field('contact_content'); ?></p>
<?php echo do_shortcode('[contact-form-7 id="3425" title="Contact Page"]'); ?>
<!--<form>
<div class="row">
<div class="col-lg-6">
<label>First Name*</label>
<input type="text" class="form-control " placeholder="">
</div>
<div class="col-lg-6">
<label>Last Name*</label>
<input type="text" class="form-control " placeholder="">
</div>
<div class="col-lg-6">
<label>Email*</label>
<input type="text" class="form-control " placeholder="">
</div>
<div class="col-lg-6">
<label>Phone*</label>
<input type="text" class="form-control " placeholder="">
</div>
<div class="col-lg-12">
<label>Select Subject</label>
<select class="form-control">
<option></option>
</select>
</div>
<div class="col-lg-12">
<label>Message</label>
<textarea type="text" class="form-control " placeholder=""></textarea>
</div>
<div class="col-lg-12">
<button class="btn btn-submit" type="submit">Submit</button>
</div>
</div>
</form>-->
         </div>
      </div>
   </div>
</div>
</div>
</section>
    
    <div class="contact-map">
    
       <?php echo get_field('maps') ?>
    </div>
<?php get_footer(); ?>