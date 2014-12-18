
<section id="testimonials-slider">

    <?php
    $args = array(
        'post_type' => 'post_testimonials',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'DESC'
    );

    $book_query = new WP_Query($args);

    if ($book_query->have_posts()) :

        while ($book_query->have_posts()) : $book_query->the_post();
            ?>
            <div class="slide"><blockquote>
                    <?php the_content(); ?>
                    <footer>
                        <strong><?php the_title(); ?></strong>
                        <br /><?php echo get_field('sub_title', $post->ID) ?>
                    </footer>
                </blockquote>
            </div>

            <?php
        endwhile;
        ;
    endif;
    ?>

</section> 





<footer id="footer">
    <?php
    $siteLogo = get_option('upload_image');
    $twitterUrl = get_option('Twitter');
    $vimeoUrl = get_option('Vimeo');
    $facebookUrl = get_option('facebook');
    $footerText = get_option('copyright');
    $amzonLink = get_option('AmzonUkLink');
    ?>



    <section id="footer-top">
        <div class="container">
            <div class="alpha"><h4>Twitter</h4>
<div id="twitter-feed"></div>
<?php //dynamic_sidebar('sidebar-2'); ?> 
            </div>

            <div class="beta"><h4>Buy on Amazon</h4><ul class="retailers"><li><a href="<?php echo $amzonLink; ?>"><img src="<?php echo get_template_directory_uri() ?>/images/amazon-co-uk.svg" /></a></li></ul></div>
<div class="gamma">
    <h4>SIGN UP TO OUR NEWSLETTER</h4>
<?php echo do_shortcode('[gravityform id="3" title="false" name="Please complete your details" ajax="true"]') ?>

</div>


    </section>
    <div id="footer-anchor"><div class="container"><a href="" id="anchor-top">Top</a></div></div>
    <section id="footer-bottom">
        <div class="container">
            <div class="alpha"><span><?php echo $footerText; ?></span><a href="" class="fruitful"><img src="<?php bloginfo('template_directory') ?>/images/fruitful.svg" /></a></div>
            <div class="beta">
                <nav class="social"><ul>
                        <li><a href="<?php echo $twitterUrl; ?>" target="_blank">Twitter</a></li>
                        <li><a href="<?php echo $facebookUrl; ?>" target="_blank" class="fb">Facebook</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
</footer>
<script src="<?php bloginfo('template_directory') ?>/js/owl.carousel.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/js/jquery.selectbox.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/js/slick/slick.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/js/jquery.easing.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/js/jquery.scrollTo.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/js/twitter-fetcher.js"></script>
<script src="<?php bloginfo('template_directory') ?>/js/scripts.js"></script>
<script>
    $(document).ready(function () {

        /*
         $('#slider').owlCarousel({
         dots:true,
         slideSpeed : 300,
         paginationSpeed : 400,
         items:1,
         loop:true,
         autoplay:true,
         dotsContainer: '.carousel-nav'
         });
         */
    })
</script>
<?php wp_footer(); ?> 
</body>
</html>

