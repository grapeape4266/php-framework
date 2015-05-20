
        <!-- page content -->
        <div class="col-md-9">
          <div class="pageContent">

          	<div class="row">
            	<div class="col-md-6">

            		<?php if (true === $error) { ?>
					      	<div class="row alert alert-danger" role="alert">
					            <?php print $errorMessage; ?>
					      	</div>				       
					     	<?php } elseif (true === $success) { ?>
                  <div class="row alert alert-info" role="alert">
                      Password update successfully.
                  </div>               
                <?php } ?>

                <form method="post" action="<?php echo APP_DOC_ROOT; ?>/profile/password">
             
		              <div class="form-group">
		                  <label for="currentPassword">Current Password</label>
		                  <div class="input-group">
		                      <div class="input-group-addon"><i class="fa fa-key"></i></div>
		                      <input
		                          type="password"
		                          class="form-control"
		                          id="currentPassword"
		                          name="currentPassword"
		                          placeholder="Current Password"
		                          required
		                          oninvalid="this.setCustomValidity('Current Password is required.')"
		                          onchange="this.setCustomValidity('')"
		                      >
		                  </div>
		              </div>

                  <div class="form-group">
                      <label for="newPassword">New Password</label>
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-key"></i></div>
                          <input
                              type="password"
                              class="form-control"
                              id="newPassword"
                              name="newPassword"
                              placeholder="Enter new Password"
                              required
                              oninvalid="this.setCustomValidity('Password is required.')"
                              onchange="this.setCustomValidity('')"
                          >
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="confirmPassword">Confirm Password</label>
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-key"></i></div>
                          <input
                              type="password"
                              class="form-control"
                              id="confirmPassword"
                              name="confirmPassword"
                              placeholder="Enter Password Confirmation"
                              required
                              oninvalid="this.setCustomValidity('Password Confirmation is required.')"
                              onchange="this.setCustomValidity('')"
                          >
                      </div>
                  </div>
                 
                  <button
                      type="submit"
                      class="btn btn-primary pull-right"
                      id="passwordButton"
                      name="passwordButton"
                  >Change Password</button>
                       
              	</form>
            	</div>
          	</div>

          </div>
        </div>
        <!-- end page content -->
