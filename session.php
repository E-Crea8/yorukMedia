<?php
//before we store information of the user, we need to start first the session
	
	session_start();
	
	//create a new function to check if the session variable user_id is on set
	function logged_in() {
		return isset($_SESSION['user_id']);
        
	}
	//this function if session member is not set then it will be redirected to index.php
	function confirm_logged_in() {
		if (!logged_in()) {
?>
			<script type="text/javascript">
				window.location = "./app-home";
			</script>
<?php
        }
        $id_session=$_SESSION['user_id'];
	}
?>