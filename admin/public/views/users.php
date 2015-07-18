<div style="margin-top:50px;">            
            <div class="form-group">
                  <h3><div class="text-center" id="Login_header_text">Allow Users &nbsp; <span class="glyphicon glyphicon-refresh" style="cursor:pointer;" onclick="display_allow_user_section()"></span></div></h3>
            </div>

          <div class="row">
          	 <div class="col-sm-11" id="display_search_result">
          	 	<table class="table table-hover table-responsive ">
 					<tr>
 						<th>Name</th>
 						<th>Email</th>
 						<th>Mobile</th>
 						<th>Allow User</th>
 						<th>#</th>
 					</tr>
 						<?php
 							require("../php/sessionv.php");
							require("../php/connect.php");
 							$result1=mysqli_query($mysql,"SELECT * FROM user WHERE `email`='".strip_tags($_SESSION["email"])."' and privileges=1;");
      						if(mysqli_num_rows($result1) > 0){
      							$result=mysqli_query($mysql,"SELECT idverification FROM verification WHERE `verified`= 0;");
      							if(mysqli_num_rows($result) > 0)
      							{
	      							while ($res=mysqli_fetch_assoc($result)) {
	      								$result_sub=mysqli_query($mysql,"SELECT email,name,mobile_no FROM user WHERE `id`= ".$res['idverification'].";");
	      								while ($res_sub=mysqli_fetch_assoc($result_sub)) {
	      									?>

	      									<td><?php echo $res_sub['name']; ?></td>
					 						<td><?php echo $res_sub['email']; ?></td>
					 						<td><?php echo $res_sub['mobile_no']; ?></td>
					 						<td><span class="glyphicon glyphicon-ok" style="color:green;cursor:pointer;" onclick="verify_account('<?php echo $res['idverification']; ?>',this)"></span> &nbsp;&nbsp;
					 							<span class="glyphicon glyphicon-remove" style="color:red;cursor:pointer;" onclick="delete_account('<?php echo $res['idverification']; ?>',this)"></span>
					 						</td>
					 						<td></td>

					 						<?php
	      									break;
	      								}
	      								
	      							}
      							}
      							else
      							{
      								?>
      								<tr><td>All Account Verified</td></tr>
      								<?php
      							}
      						}
 						?>
 					</tr>
				</table>
          	 </div>

          </div>
 </div>