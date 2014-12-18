<?php get_header() ?>
<!--/nav-->

<?php
$banner_image = get_field('banner_image');
$bannerUrl = wp_get_attachment_image_src($banner_image, 'large');
$bannerImg = aq_resize($bannerUrl[0], 974, 312, true);

if ($bannerImg == '') {
    $bannerImg = get_template_directory_uri() . '/images/the-authors-banner.jpg';
}
?> 
<section id="banner">
    <div class="container"  style="background-image:url('<?php echo $bannerImg; ?>');">
    </div>
</section>

<!--main-->
<div id="main" role="main">
    <div class="container"> 
        <?php if (have_posts()):
            while (have_posts()) : the_post();
                ?>
                <article id="single-news">
                    <header>
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <p><small><time datetime="the_time(' jS F  Y');"><?php the_time(' jS F  Y'); ?></time></small></p>
                    </header>

                    <?php
                    the_content();
                    ?>

                    <footer class="divide"><div><a href="<?php echo esc_url( home_url( '/' ) ); ?>/latest-news" class="more">Back to latest news</a></div></footer>
                </article>
            <?php
            endwhile;
        endif;
        ?>
        </section>
    </div> <!-- /container -->
</div>
<!-- testimonials slider -->

<!-- /testimonials slider -->
<?php get_footer() ?>