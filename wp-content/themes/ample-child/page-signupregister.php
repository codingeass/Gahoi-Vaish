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
              <?php
               if ( ! is_user_logged_in() ) { // Display WordPress login form:
                $args = array(
                    'redirect' => admin_url(), 
                    'form_id' => 'loginform-custom',
                    'label_username' => __( 'Username custom text' ),
                    'label_password' => __( 'Password custom text' ),
                    'label_remember' => __( 'Remember Me custom text' ),
                    'label_log_in' => __( 'Log In custom text' ),
                    'remember' => true
                );
                wp_login_form( $args );
               } else { // If logged in:
                wp_loginout( home_url() ); // Display "Log Out" link.
                echo " | ";
                wp_register('', ''); // Display "Site Admin" link.
               }
               ?>
            </div>
         </div>

      </div><!-- .inner-wrap -->
   </div><!-- .single-page -->

   <?php do_action( 'ample_after_body_content' );
get_footer(); ?>