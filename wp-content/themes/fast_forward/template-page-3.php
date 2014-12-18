<?php
/* Template Name: Previous Books */
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
<section id="banner">
    <div class="container"  style="background-image:url('<?php echo $bannerImg; ?>')">
        <aside><h1><?php echo get_field('banner_content'); ?></h1>
            <ul>
                <?php while (have_rows('banner_description')) : the_row(); ?>

                    <li><?php echo get_sub_field('description'); ?> </li>


                    <?php
                endwhile;
                ?> 

            </ul>
        </aside>
    </div>
</section>

<!--main-->
<div id="main" role="main">
    <div class="container"> 
        <section id="previous-books">
            <header class="section-header left"><h2> <?php the_title(); ?> </h2></header>
            <?php
            $args = array(
                'post_type' => 'post_book',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'order' => 'ASC'
            );

            $book_query = new WP_Query($args);

            if ($book_query->have_posts()) :

                while ($book_query->have_posts()) : $book_query->the_post();
                    $feat_image = get_post_thumbnail_id($post->ID);
                    $featureUrl = wp_get_attachment_image_src($feat_image, 'large');
                    $featureImage = aq_resize($featureUrl[0], 181, 272, true);
                    ?>

                    <article>
                        <div class="wrap">
                            <figure><img src="<?php echo $featureImage; ?>" /></figure>
                            <div class="alpha">
                                <div class="bullet-list">
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                </div>
                                <ul class="retailers"><li><a href="<?php echo get_field('amzon_co_uk_link'); ?>" class="amazon-uk">
                                            <img src="<?php echo get_template_directory_uri() ?>/images/amazon-uk-black.svg" /></a>
                                    </li>
                                    <li><a href="<?php echo get_field('amzon_com_link'); ?>" class="amazon-com"><img src="<?php echo get_template_directory_uri() ?>/images/amazon-com-black.svg" />
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="divide"><div></div></div>
                    </article>
                    <?php
                endwhile;
                ;
            endif;
            ?>

        </section>
    </div> <!-- /container -->
</div>

<?php get_footer() ?>
