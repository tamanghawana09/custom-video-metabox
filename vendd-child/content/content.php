<?php

/**
 * The default template part for displaying content lists.
 *
 * @package Vendd
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title(sprintf('<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>'); ?>

        <?php if ('post' == get_post_type()) : ?>
        <div class="entry-meta">
            <?php vendd_posted_on(); ?>
        </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php if (is_search() || is_archive() || 1 == get_theme_mod('vendd_post_content', 1)) : ?>
    <div class="entry-summary">
        <?php
            //check for video embed
            $video_embed = get_post_meta(get_the_ID(), '_video_embed', true);
            if ($video_embed) { 
        ?>
        <div class="video-embed">
            <?php  echo $video_embed; ?>
        </div>
        <?php } else if (has_post_thumbnail() && 1 == get_theme_mod('vendd_feed_featured_image', 1)) : ?>
        <a href="<?php the_permalink(); ?>" rel="bookmark">
            <?php the_post_thumbnail('full', array('class' => 'featured-img alignleft')); ?>
        </a>
        <?php
            endif;
            // output the excerpt
            the_excerpt();
            // category/tag information
            vendd_posted_in();
            ?>
    </div><!-- .entry-summary -->
    <?php else : ?>
    <div class="entry-content">
        <?php
            //check for video embed
            $video_embed = get_post_meta(get_the_ID(), '_video_embed', true);
            if ($video_embed) { 
        ?>
        <div class="video-embed">
            <?php $video_embed; ?>
        </div>
        <?php } else if (has_post_thumbnail() && 1 == get_theme_mod('vendd_feed_featured_image', 1)) {
        //Display the featured image if there is no video embed
        ?>
        <a href="<?php the_permalink(); ?>" rel="bookmark">
            <?php the_post_thumbnail('vendd_featured_image', array('class' => 'featured-img')); ?>
        </a>
        <?php
            }
            // output the content
            the_content(get_theme_mod('vendd_read_more', __('Continue reading', 'vendd')) . ' &rarr;');
            // break into pages
            wp_link_pages(array(
                'before' => '<div class="page-links">' . __('Pages:', 'vendd'),
                'after'  => '</div>',
            ));
            // category/tag information
            vendd_posted_in();
            ?>
    </div><!-- .entry-content -->
    <?php endif; ?>
</article><!-- #post-## -->