<?php 
get_header();
?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<div class="blog_entry">
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <div class="entry_date"><?php the_date('F j, Y'); ?></div>
<?php the_content(); ?>
    </div><!-- .blog_entry -->
<?php endwhile; endif; ?>
<?php
get_footer();
?>
