<?php
/* Template Name: Authors */
?>
<?php get_header() ?>

<!--/nav-->
<?php
$banner_image = get_field('banner_image');
$bannerUrl = wp_get_attachment_image_src($banner_image, 'large');
$bannerImg = aq_resize($bannerUrl[0], 1351, 350, true);

if ($bannerImg == '') {
    $bannerImg = get_template_directory_uri() . '/images/the-authors-banner.jpg';
}
?>

<section id="slider">
    <div class="slide" style="background-image:url('<?php echo $bannerImg; ?>');">
        <div class="container"></div>
    </div>
</section>
<!--slider footer-->
<footer id="slider-footer"><div class="container">
        <?php
        $ssuuLink = get_field('issuu_link');
        $bannerDes = get_field('banner_description');
        $viewLink = get_field('view_more_link');
        ?>
        <a href="<?php echo $ssuuLink; ?>" title="issuu" class="issuu" target="_blank"><img src="<?php bloginfo('template_directory') ?>/images/issuu.svg" alt="issuu" /></a>
        <h3><span><?php echo $bannerDes; ?></span></h3>
        <a href="<?php echo $viewLink; ?>" class="button" title="VIEW NOW">VIEW NOW</a></div></footer>
<!--/slider footer-->
<!--main-->
<div id="main" role="main">
    <div class="container"> 
        <section id="authors">
            <header class="section-header left"><h1><?php the_title(); ?></h1></header>


            <?php
            $args = array(
                'post_type' => 'post_author',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'order' => 'ASC'
            );

            $author_query = new WP_Query($args);

            if ($author_query->have_posts()) :
                while ($author_query->have_posts()) : $author_query->the_post();
                    ?>

                    <article>
                        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
                        <div class="divide"><div></div></div>
                    </article>

        <?php
    endwhile;
endif;
?>
        </section>
    </div> <!-- /container -->
</div>

<?php get_footer() ?>