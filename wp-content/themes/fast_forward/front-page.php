<?php get_header() ?>

<!--/nav-->

<?php
if (have_rows('slider_image')):
    while (have_rows('slider_image')) : the_row();

        $imageTitle = get_sub_field('slider_image_title');
        $videoIframe = get_sub_field('slider_video_iframe_url');
        $sliderDescription = get_sub_field('slider_description');
        $viewMore = get_sub_field('view_more_link');
        $issuLink = get_sub_field('home_page_iss');
        $sliderImage = get_sub_field('slider_image');
        $sliderSubImageUrl = wp_get_attachment_image_src($sliderImage, 'large');
        $sliderSubImageSrc = aq_resize($sliderSubImageUrl[0], 1351, 450, true);
        ?>
        <section id="slider">
            <div class="slide" style="background-image:url('<?php echo $sliderSubImageSrc; ?>');">
                <div class="container">
                    <h2><?php echo $imageTitle; ?></h2>
                    <figure>
                        <div class="video-wrap">
        <?php echo $videoIframe; ?>
                        </div>
                    </figure>
                </div>
            </div>

        </section>
        <!--slider footer-->
        <footer id="slider-footer">
            <div class="container">
                <a href="<?php echo $issuLink; ?>" title="issuu" class="issuu" target="_blank">
                    <img src="<?php bloginfo('template_directory') ?>/images/issuu.svg" alt="issuu" />
                </a>
                <h3>
                    <span>
        <?php echo $sliderDescription; ?></span>
                </h3>
                <a href="<?php echo $viewMore; ?>" class="button" title="VIEW NOW">VIEW NOW</a>
            </div>
        </footer>



        <?php
    endwhile;
endif;
?> 

<!--/slider footer-->
<!--main-->
<div id="main" role="main">
    <div class="container"> 
        <!-- intro -->
        <section id="intro">
            <h2><?php the_field('welcome_text_title'); ?></h2>
            <div class="alpha"><p><?php the_field('welcome_description_right_section'); ?></p></div>
            <div class="beta"><p><?php the_field('welcome_description_left_section'); ?>
                </p></div>
        </section>
        <!-- /intro -->
        <!-- order form -->
        <section id="order">
            <header class="section-header left"><h3>Order Your Copy Now</h3></header>
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
        <!-- /order form -->
        <!-- latest news -->
        <section id="latest-news">
            <header class="section-header left"><h3>Latest News</h3></header>
            <ul>
                <?php
                $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'order' => 'DESC'
    );
$loop_query = new WP_Query($args);
                
               

                if ($loop_query->have_posts()):
                    while ($loop_query->have_posts()) : $loop_query->the_post();
                        $feat_image = get_post_thumbnail_id($post->ID);
                        $featureUrl = wp_get_attachment_image_src($feat_image, 'large');
                        $featureImage = aq_resize($featureUrl[0], 309, 206, true);
                        ?>
                        <li><a href="<?php the_permalink(); ?>"><figure><img src="<?php echo $featureImage; ?>" /></figure>
                                <header>
                                    <time datetime="<?php echo get_the_date(); ?>"><div>
                                            <span>
                                                <em><?php echo get_the_date(d); ?></em><?php echo strtoupper(get_the_date(M)); ?></span>
                                        </div>
                                    </time><h4><span><?php the_title(); ?></span></h4>
                                </header><?php  echo get_the_content();
  ?><!--<p><span class="read-more">Read more &raquo;</span></p>-->
                            </a>
                        </li>
                        <?php
                    endwhile;
                endif;
                ?>
            </ul>
            <footer class="section-footer divide"><div><a href="<?php echo esc_url( home_url( '/' ) ); ?>/latest-news" class="more">Read all news</a></div></footer>
        </section>

        <!-- /latest news -->
    </div> <!-- /container -->
</div>
<!-- testimonials slider -->



<!-- /testimonials slider -->
<?php get_footer() ?>