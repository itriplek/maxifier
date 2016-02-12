<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package maxifier
 */

?>

<div class="post-index">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="post-thumbnail">
            <a href="<?php echo get_permalink(); ?>" title="<?php echo __('Read ', 'maxifier') . get_the_title(); ?>" rel="bookmark"><?php echo has_post_thumbnail() ? the_post_thumbnail( 'index-thumb' ) : '<img src="http://placehold.it/350x150" />'; ?></a>
        </div>
       <div class="post-content">
           <header class="entry-header">
               <h2 class="entry-title"><?php echo the_title(); ?></h2>
           </header><!-- .entry-header -->

           <div class="entry-content">
               <?php the_excerpt(); ?>
           </div>

           <footer class="entry-footer">
               <?php maxifier_index_post_footer(); ?>
           </footer><!-- .entry-footer -->
       </div>
    </article><!-- #post-## -->
    <div class="index-post-hover">
        <a href="<?php echo get_permalink(); ?>" title="<?php echo __('read more about<br />', 'maxifier') . get_the_title(); ?>" rel="bookmark"><?php echo __('read more about<br />', 'maxifier') . get_the_title(); ?></a>

        <?php

        edit_post_link(
            sprintf(
            /* translators: %s: Name of current post */
                esc_html__( 'Edit %s', 'maxifier' ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ),
            '<div class="edit-link" style="background-color: rgb(18, 1, 2);">',
            '</div>'
        );
        ?>
    </div>
</div>