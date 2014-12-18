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
          <?php
            if (have_posts()):
                while (have_posts()) : the_post(); ?>
        <article id="single-news">
            <header>
                <h1><?php the_title(); ?></h1>
                <p><small><time datetime="2014-11-21"><?php echo get_the_date(); ?></time></small></p>
            </header>
          
<?php
                    the_content();
?>

            <footer class="divide"><div><a href="" class="more">Back to latest news</a></div></footer>
        </article>
        
   <?php             endwhile;
            endif;
            ?>
        </section>
    </div> <!-- /container -->
</div>
<!-- testimonials slider -->

<!-- /testimonials slider -->
<?php get_footer() ?>
