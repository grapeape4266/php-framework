<?php


# Include html header
include( APP_VIEW . '/header.php' );

# Include main navigation
include( APP_VIEW . '/nav.php' );

switch ( $route->getAction() ) {

    case 'password':
    	if (isset($_POST["newPassword"])) {
    		$error = false;
    		if (
    			isset($_POST["currentPassword"]) &&
    			isset($_POST["newPassword"]) &&
    			isset($_POST["confirmPassword"]) &&
    			$_POST["newPassword"] == $_POST["confirmPassword"]
    			) {

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
	                $token = md5( $row["salt"] . $_POST["newPassword"] );

	                $sql = "UPDATE
		                     auth_user
		                    SET
		                     password = ?
		                    WHERE
		                      username = ?";

		            $dbObj = new db();
		            $dbObj->dbPrepare( $sql );
		            $dbObj->dbExecute( array( $token, $_SESSION["username"] ) );
		        }
		        else {
		        	$error = true;
		        }	
    		}
    		else {
    			$error = true;
    		}
    	}
        include( APP_VIEW .'/profile/profileSubNav.php' );
        include( APP_VIEW .'/profile/passwordView.php' );
        break;

    default:
        include( APP_VIEW .'/profile/profileSubNav.php' );
        include( APP_VIEW .'/profile/profileView.php' );
        break;
}


# Include html footer
include( APP_VIEW . '/footer.php' );
