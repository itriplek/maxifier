<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package maxifier
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            while ( have_posts() ) : the_post();

                echo '<div class="post-main">';
                get_template_part( 'template-parts/content-single', get_post_format() );

                the_post_navigation();

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
                </div>
                <div class="post-info">
                    <span class="post_author">
                        <span class="fa-stack">
                          <i class="fa fa-circle-o fa-stack-2x"></i>
                          <i class="fa fa-user fa-stack-1x"></i>
                        </span>
                        <?php echo post_author(); ?>
                    </span>
                    <span class="post_date">
                        <span class="fa-stack">
                          <i class="fa fa-circle-o fa-stack-2x"></i>
                          <i class="fa fa-calendar fa-stack-1x"></i>
                        </span>
                        <?php echo post_date(); ?>
                    </span>
                    <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
                    <span class="post_comments">
                        <span class="fa-stack">
                          <i class="fa fa-circle-o fa-stack-2x"></i>
                          <i class="fa fa-comment fa-stack-1x"></i>
                        </span>
                        <?php post_comments(); ?>
                    </span>
                    <?php endif; ?>
                    <?php if(post_category() != false): ?>
                    <span class="post_cat">
                        <span class="fa-stack">
                          <i class="fa fa-circle-o fa-stack-2x"></i>
                          <i class="fa fa-th fa-stack-1x"></i>
                        </span>
                        <?php echo post_category(); ?>
                    </span>
                    <?php endif; ?>
                    <span class="post_tags">
                        <h2>Tags</h2>
                        <?php echo post_tags(); ?>
                    </span>

                </div>

                <?php
            endwhile; // End of the loop.
            ?>
            <p class="clear" />
        </main><!-- #main -->
    </div><!-- #primary -->
    <div id="kSidr" class="sidr">
        <?php get_sidebar(); ?>
	</div>
	<a id="left-menu" title="<?php echo __('click to toggle the side bar', 'maxifier'); ?>" href="#sidr"><i class="fa fa-angle-double-right"></i></a>
<?php
get_footer();
