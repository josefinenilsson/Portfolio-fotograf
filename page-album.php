<?php
get_header();
?>

<article class="gallery_box">
<?php

$customPostTaxonomies = get_object_taxonomies('photo');

if(count($customPostTaxonomies) > 0)
{
     foreach($customPostTaxonomies as $tax)
     {
	     $args = array(
         	  'orderby' => 'name',
	          'show_count' => 0,
        	  'pad_counts' => 0,
	          'hierarchical' => 1,
        	  'taxonomy' => $tax,
        	  'title_li' => '',
              'show_option_none' => ''
        	);

	     wp_list_categories( $args );
     }
}

?>
    
</article>

<?php
get_footer();
?>


