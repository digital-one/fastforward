<?php
/* Template Name: About The Book */
?>
<?php get_header() ?>
<!--/nav-->
<!-- slider  -->
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

        <section id="chapter-overview">
            <header class="section-header left"><h3><?php echo get_field('chapter_overview_title'); ?> </h3></header>
            <?php
            $counter = 1;
            while (have_rows('chapter_overview')) : the_row();
                ?>
                <dl>
                    <dt class="chapter-<?php echo $counter; ?>"><em><?php echo get_sub_field('page_no'); ?></em>
                    <span><?php echo get_sub_field('page_title'); ?></span></dt>
                    <dd><?php echo get_sub_field('page_description'); ?>
                    </dd>
                </dl>
                <?php
                $counter++;
            endwhile;
            ?> 

            <footer class="divide"><div></div></footer>
        </section>


    </div> <!-- /container -->
</div>

<?php get_footer() ?>