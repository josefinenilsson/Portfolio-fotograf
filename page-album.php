<?php
get_header();
?>
<article class="gallery_box">
<?php

$albums_tax = 'album';
$albums = get_terms( $albums_tax );
//var_dump($albums);

?>
    
<ul>
<?php foreach( $albums as $album ): ?>
    <?php 
    // Get image url from ACF
    $album_image_id = (function_exists( 'get_field' )) ? get_field( 'featured_image_taxonomy', $albums_tax .'_'. $album->term_id ) : ''; 
    ?>
    <a href="<?php echo esc_url( get_term_link( $album->term_id )); ?>">
        <li class="category">
            <div class="category_image_box">
                <?php echo wp_get_attachment_image( $album_image_id, 'medium', false, array( 'class' => 'category_image' ) ); ?>
            </div>
                <div class="category_info">
                    <h2 class="category_name"><?php echo $album->name; ?></h2>
                    <p class="category_description"><?php echo $album->description; ?></p>
                </div>
        </li>
    </a>
<?php endforeach; ?>
</ul>

        
        
</article>

<?php
get_footer();
?>