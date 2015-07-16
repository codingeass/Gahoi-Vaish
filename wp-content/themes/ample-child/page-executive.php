<?php
/**
 * Page Section for our theme.
 *
 * @package ThemeGrill
 * @subpackage Ample
 * @since Ample 0.1
 */
?>

<?php get_header();

   do_action( 'ample_before_body_content' ); ?>

   <div class="single-page clearfix">
      <div class="inner-wrap">
         <div id="primary">
            <div id="content">
               <?php while ( have_posts() ) : the_post(); ?>
                  <?php get_template_part( 'content', 'page' ); ?>
               <?php endwhile; ?>
            </div>
         </div>

      </div><!-- .inner-wrap -->
   </div><!-- .single-page -->

   <?php do_action( 'ample_after_body_content' );
get_footer(); ?>