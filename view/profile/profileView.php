
        <!-- page content -->
        <div class="col-md-9">
          <div class="pageContent">

          	<div class="row">
          		<div class="col-md-12">
          			<h3><i class="fa fa-user"></i> User Profile</h3>
          		</div>
          	</div>

          	<hr>

          	<div class="row">
          		<div class="col-md-3">
          			Username
          		</div>
          		<div class="col-md-9">
          			<?php print $row['username']; ?>
          		</div>
          	</div>

          	<div class="row">
          		<div class="col-md-3">
          			Name
          		</div>
          		<div class="col-md-9">
          			<?php print $row['first_name'] . ' ' . $row['last_name']; ?>
          		</div>
          	</div>

          	<div class="row">
          		<div class="col-md-3">
          			Email
          		</div>
          		<div class="col-md-9">
          			<?php print $row['email']; ?>
          		</div>
          	</div>

          </div>
        </div>
        <!-- end page content -->
