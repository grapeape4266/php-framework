<?php


# Include html header
include( APP_VIEW . '/header.php' );

# Include main navigation
include( APP_VIEW . '/nav.php' );

switch ( $route->getAction() ) {

    case 'password':
    	$error        = false;
    	$errorMessage = '';
    	$success      = false;
    	if (isset($_POST["newPassword"])) {

    		// Make sure all three fields are completed
    		if (
    			!isset($_POST["currentPassword"]) ||
    			!isset($_POST["newPassword"]) ||
    			!isset($_POST["confirmPassword"])
    			) {
    			$error = true;
    			$errorMessage .= 'All three fields are required<br>';
    		}

    		// Make sure password and confirm password match
    		if ($_POST["newPassword"] != $_POST["confirmPassword"]) {
    			$error = true;
    			$errorMessage .= 'Password and Confirm Password must match<br>';
    		}

    		if (false === $error) {

    			// Proccess Change
    			$sql = "SELECT
	                      *
	                    FROM
	                      auth_user
	                    WHERE
	                      username = ?";

	            $dbObj = new db();
	            $dbObj->dbPrepare( $sql );
	            $dbObj->dbExecute( array( $_SESSION["username"] ) );

	            $row = $dbObj->dbFetch( 'assoc' );

	            if ( isset($row['username']) ) {

	            	$curToken = md5( $row["salt"] . $_POST["currentPassword"] );
	                $newToken = md5( $row["salt"] . $_POST["newPassword"] );

	                if ($curToken != $row['password']) {
	                	$error = true;
		        		$errorMessage .= 'Current Password does not match.<br>';
	                }
	                else {
		                $sql = "UPDATE
			                     auth_user
			                    SET
			                     password = ?
			                    WHERE
			                      username = ?";

			            $dbObj = new db();
			            $dbObj->dbPrepare( $sql );
			            $dbObj->dbExecute( array( $newToken, $_SESSION["username"] ) );
			            $success      = true;
			        }
		        }
		        else {
		        	$error = true;
		        	$errorMessage .= 'User not found.<br>';
		        }	
    		}
    	}
        include( APP_VIEW .'/profile/profileSubNav.php' );
        include( APP_VIEW .'/profile/passwordView.php' );
        break;

    default:

    	$sql = "SELECT
                  *
                FROM
                  auth_user
                WHERE
                  username = ?";

        $dbObj = new db();
        $dbObj->dbPrepare( $sql );
        $dbObj->dbExecute( array( $_SESSION["username"] ) );

        $row = $dbObj->dbFetch( 'assoc' );

        include( APP_VIEW .'/profile/profileSubNav.php' );
        include( APP_VIEW .'/profile/profileView.php' );
        break;
}


# Include html footer
include( APP_VIEW . '/footer.php' );
