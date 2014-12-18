<?php get_header() ?>
archive
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
        <section id="archive-news">
            <header class="section-header left"><h1>Latest News</h1></header>
            <?php if (have_posts()):
                while (have_posts()) : the_post();
                    ?>
                    <?php
                    $feat_image = get_post_thumbnail_id($post->ID);
                    $featureUrl = wp_get_attachment_image_src($feat_image, 'large');
                    $featureImage = aq_resize($featureUrl[0], 309, 206, true);
                    ?>
                    <article class="has-feature">
                        <div class="wrap">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="alpha">

                                <small><time datetime="2014-11-21"><?php echo get_the_date(); ?></time></small>
        <?php the_content(); ?>
                            </div>
                            <div class="beta"><figure><a href="<?php the_permalink(); ?>"><img src="<?php echo $featureImage; ?>" /></a></figure></div>
                        </div>
                        <div class="divide"><div></div></div>
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