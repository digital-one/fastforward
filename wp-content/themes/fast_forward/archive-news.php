<?php
/* Template Name: Archive News */
?>
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


<!--main-->
<div id="main" role="main">
 <div class="container"> 
<section id="archive-news">
<header class="section-header left"><h1><?php the_title(); ?></h1></header>
<?php
 $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'DESC'
    );

    $loop_query = new WP_Query($args);
if ($loop_query->have_posts()):
  ?>
<div id="latest-news">
<ul>
  <?php
                    while ($loop_query->have_posts()) : $loop_query->the_post();
                        $feat_image = get_post_thumbnail_id($post->ID);
                        $featureUrl = wp_get_attachment_image_src($feat_image, 'large');
                         $featureImage = aq_resize($featureUrl[0], 309, 206, true);
                        $readMorelink= get_field('read_more_link',$post->ID);
                        if($featureImage!='')
                        {
                            $class="has-feature";
                        }
 else {
     $class="";
 }
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


<?php /*
<article class="<?php echo $class; ?>">
  <div class="wrap">
     
  <div class="alpha">
 <h2><a href="<?php echo $readMorelink; ?>"><?php the_title(); ?></a></h2>
<small><time datetime="<?php the_time(' jS F  Y'); ?>"><?php the_time(' jS F  Y'); ?></time></small>
<?php the_content(); ?>
</div>
<?php if($featureImage!=''): ?>
   <div class="beta"><figure><a href="<?php echo $readMorelink; ?>"><img src="<?php echo $featureImage; ?>" /></a></figure></div>
 <?php endif ?>
</div>
  <div class="divide"><div></div></div>
</article>

*/ ?>


<?php
                        endwhile;
                        ?>
                      </ul></div>
                      <?php
                    endif;

?>



</section>
</div> <!-- /container -->
</div>

<!-- /testimonials slider -->
<?php get_footer() ?>