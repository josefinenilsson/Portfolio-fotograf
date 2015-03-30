<?php
get_header();
?>
<article>
    <p class="album_name"><?php single_cat_title( '', true ); ?></p>
    <div class="Collage">
<?php
/*$categories = get_the_category();
var_dump($cat);
//get_the_category_by_ID( $cat_ID ); 
$category_id = $categories[0]->cat_ID;*/
$args = array( 'post_type' => 'photo', 'posts_per_page' => 99, 'category__in' => $cat );
$loop = new WP_Query( $args );

if($loop->have_posts()): while($loop->have_posts()): $loop->the_post(); ?>
        <a href="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"class="flipLightBox">
            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" /><span><?php the_excerpt(); ?></span>
        </a>
<?php endwhile;endif; ?>
    </div>    
</article>
<?php
get_footer();
?>