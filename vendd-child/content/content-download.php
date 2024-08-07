<?php

/**
 * The default template for download page content
 *
 * @package Vendd
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header>
    <div class="ft-entry-content-featured-image">
        <?php
        //Get the video embed code from post meta
        $video_embed = get_post_meta(get_the_ID(), '_video_embed', true);
        if ($video_embed) :
            //Display the video embed if available
        ?>
            <div class="video-embed">
                <?php echo $video_embed; ?>
            </div>
            <?php
        elseif (1 == get_theme_mod('vendd_product_featured_image', 1)) :
            //Display the featured image if no video embed
            if (has_post_thumbnail()) :
                $product_image = apply_filters('vendd_crop_product_image', true) ? 'vendd_product_image' : 'full';
                the_post_thumbnail("full", array('class' => 'featured-img'));
            elseif (get_theme_mod('vendd_product_image_upload') && get_theme_mod('vendd_product_image')) :
            ?>
                <img class="featured-img" src="<?php echo get_theme_mod('vendd_product_image_upload'); ?>" alt="<?php echo esc_attr(get_the_title(get_the_ID())); ?>">
        <?php
            endif;
        endif;
        ?>
    </div>
    <div class="entry-content">
        <?php the_content();    ?>
    </div>
</article>