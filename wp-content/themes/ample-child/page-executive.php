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
      <div >
               <?php while ( have_posts() ) : the_post(); 
                  
                  $args = array(
   'post_type' => 'attachment',
   'numberposts' => -1,
   'post_status' => null,
   'post_parent' => $post->ID
  );
   $counter_image=0;
   echo "<div id='circle-executive' class='container text-center'><div class='row'>";
  $attachments = get_posts( $args );
     if ( $attachments ) {
        foreach ( $attachments as $attachment ) {
            
            if($counter_image%4==0){
               ?>
               </div>
               <div class="row">
               
               <?php
            }
            $counter_image++;
            ?>
            <div class="col-md-3 col-sm-6">

            <?php
            $custom_attr_addition = array(
            'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
            'class' => 'img-circle',
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href' => get_permalink( $attachment->ID ),
            'src' => $attachment->guid,
            'title' => $attachment->post_title
         );
           echo '';
           echo wp_get_attachment_image( $attachment->ID, 'full',1,$custom_attr_addition );
           echo '<p>';
           echo apply_filters( 'the_title', $attachment->post_title );
           echo "<br/>".apply_filters('the_caption',$attachment->post_excerpt);
           echo '</p></div>';

          }
     }
     endwhile; ?>
         </div></div>
         <style type="text/css">
            #circle-executive img{
               max-width: 200px;
               height: 200px;
            }
         </style>
                <br/>
                <br/>
                <br/>
      </div><!-- .inner-wrap -->
   </div><!-- .single-page -->

   <?php do_action( 'ample_after_body_content' );
get_footer(); ?>