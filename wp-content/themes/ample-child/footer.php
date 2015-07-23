<?php
/**
 * Footer Section for our theme.
 *
 * @package ThemeGrill
 * @subpackage Ample
 * @since Ample 0.1
 */
?>
      </div><!-- .main-wrapper -->

      <footer id="colophon">
         <div class="inner-wrap">
            <?php get_sidebar( 'footer' ); ?>

            <div class="footer-bottom clearfix">
               <div class="copyright-info" style="font-size:15px;">
                  Copyright © 2015 Gahoi Vaish Samaj Lucknow. <span class="glyphicon glyphicon-heart"></span> Designed By : <a href="http://amandeepgupta.com">Amandeep Gupta</a>.&nbsp;&nbsp;<a href="mailto:amandeepgupta@rocketmail.com" target="_blank"><span class="glyphicon glyphicon-envelope"></span></a>
               </div>

               <div class="footer-nav">
               <?php
                  if ( has_nav_menu( 'footer' ) ) {
                     wp_nav_menu( array( 'theme_location' => 'footer', 'depth' => -1 ) );
                  }
               ?>
               </div>
            </div>
         </div>
      </footer>
      <a href="#masthead" id="scroll-up"><i class="fa fa-angle-up"></i></a>
   </div><!-- #page -->
   <?php wp_footer(); ?>
</body>
</html>