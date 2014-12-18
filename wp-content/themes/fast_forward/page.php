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
<section id="banner">
    <div class="container"  style="background-image:url('<?php echo $bannerImg; ?>');">

    </div>
</section>

<!--main-->
<div id="main" role="main">
    <div class="container"> 
        <section id="page-name">


            <?php
            if (have_posts()):
                while (have_posts()) : the_post();
                    ?>
                    <header class="section-header left"><h2><?php the_title(); ?></h2></header>


                    <?php
                    the_content();

                endwhile;
            endif;
            ?>
            <div class="divide"><div></div></div>
        </section>
    </div>
</div>

<?php get_footer() ?>
