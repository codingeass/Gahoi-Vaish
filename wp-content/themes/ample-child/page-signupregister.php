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
                  <div class="container">
      <div class="col-md-2">
      </div>
         <div class="col-md-7" id="form_login">
           <form class="form-horizontal" onsubmit="return false">
               <div class="form-group">
                  <h3><div class="text-center" id="Login_header_text">Login/Register</div></h3>
               </div>
               <hr/>
               <div class="form-group">
                   <label for="email" class="col-sm-3 control-label">Email</label>
                   <div class="col-sm-9">
                     <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                   </div>
                </div>
                
                <div class="form-group">
                   <label for="inputPassword" class="col-sm-3 control-label">Password</label>
                   <div class="col-sm-9">
                     <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                   </div>
                 </div>
                
                <div id="register_group_button" style="display:none;">
                  
                  <div class="form-group">
                      <label for="ConfirmPassword" class="col-sm-3 control-label">Confirm Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputConfirmPassword" placeholder="confirmPassword">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="inputFullName" class="col-sm-3 control-label">Full Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputFullName" placeholder="Full Name">
                      </div>
                    </div>

                  <div class="form-group">
                      <label for="inputMarital" class="col-sm-3 control-label">Marital Status</label>
                      <div class="col-sm-9">
                        <select class="form-control" id="inputMarital">
                          <option>--Select Marital Status--</option>
                          <option>Married</option>
                          <option>Unmarried</option>
                          <option>Widow</option>
                          <option>Divorce</option>
                          <option>Widower</option>
                        </select>
                     </div>
                    </div>              
                  <div class="form-group">
                      <label for="inputMobile" class="col-sm-3 control-label">Mobile No.</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="inputMobile" placeholder="9797521969">
                      </div>
                  </div>

                </div>

                 <div class="form-group text-center">
                   <div class="">
                     <button  class="btn btn-primary btn-lg" onclick="login_back()" id="button_back" style="display:none;">Back</button>
                     <button  class="btn btn-primary btn-lg" onclick="login_register_display()" id="button__register" style="display:inline-block;">Register</button>
                     <button  class="btn btn-primary btn-lg" onclick="login_register()" id="button_register" style="display:none;">Register</button>
                     <button  class="btn btn-primary btn-lg" onclick="login_user()" id="button_sigin_register">Sign in</button>
                   </div>
                 </div>
                 <div class="form-group text-center" id="error_message" style="font-size:18px;color:red;">

                 </div>
            </form>
            <hr/>


            </div>
      </div>

            </div>
         </div>

      </div><!-- .inner-wrap -->
   </div><!-- .single-page -->

   <?php do_action( 'ample_after_body_content' );
get_footer(); ?>