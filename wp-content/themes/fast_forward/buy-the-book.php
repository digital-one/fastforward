<?php
/* Template Name: Buy The Book */
?>

<?php get_header() ?>
<!--/nav-->
<?php
$banner_image = get_field('banner_image');
$bannerUrl = wp_get_attachment_image_src($banner_image, 'large');
$bannerImg = aq_resize($bannerUrl[0], 974, 312, true);

if ($bannerImg == '') {
 $bannerImg = get_template_directory_uri() . '/images/previous-books-banner.jpg';
}
?>


<!--main-->
<div id="main" role="main">
    <div class="container"> 
      
       
              <section id="order">
            <header class="section-header left"><h3><?php the_title(); ?></h3></header>
            <div id="order-form">
<?php if (!isset($_GET['gf_paypal_return'])): ?>
                  

                    <?php echo do_shortcode($post->post_content) ?>
<?php else: ?>
                    <h2>Thank you for pre-ordering Fast Forward: The Technologies and Companies Shaping Our Future.</h2>
                    <div class="big"><p>We will process your order as soon as the book is published, which we expect will be around the end of October.</p>
                        <p><a href="<?php echo home_url() ?>" class="button">Return to homepage</a></p>
<?php endif ?>
                </div>
        </section>
            
     
 <div class="divide"><div></div></div>
      
    </div>
</div>

<?php get_footer() ?>
