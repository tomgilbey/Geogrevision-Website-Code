<?php include_once('includes/header.php'); ?>
<?php include_once('includes/database.php'); ?>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#login").click(function(){
				username = $("#username").val();
				password = $("#password").val();
				
				$.ajax({
					type: "POST",
					url: "authenticate.php",
					data: "username=" + username + "&password=" + password,
					success: function(html){
						if(html == 'true'){
							$("#add_err2").html('<div class="alert alert-success"><strong>LOGIN SUCCESSFUL</strong></div>');
							history.back() 						
						} else if(html == 'nouser'){
							$("#add_err2").html('<div class="alert alert-danger"><strong>Username</strong> field empty.</div>');
						} else if(html == 'nopass'){
							$("#add_err2").html('<div class="alert alert-danger"><strong>Password</strong> field empty.</div>');
						} else if(html == 'passfail'){
							$("#add_err2").html('<div class="alert alert-danger"><strong>Password</strong> Incorrect.</div>');
						} else if(html == 'userfail'){
							$("#add_err2").html('<div class="alert alert-danger"><strong>No Such Account</strong> - Please register to login.</div>');
						} else{
							$("#add_err2").html('<div class="alert alert-danger"><strong>Error</strong> processing request. Please try again later.</div>');
						}
					},
					beforeSend: function(){
						$("#add_err2").html("Checking credentials... please wait.");
					}
				});
				return false;
			});

		});
	</script>


</head>

<?php include_once('includes/navigation.php'); ?>

<div class="container">


        <div class="row">
                <div class="col-lg-12">
					
					<div id="add_err2"></div>
							
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Login</strong>
                    </h2>
                    <hr>
                    <p>Please enter your username and password to continue.</p>
					
					<!-- Meesages for form -->
					<div id="add_err2">
					
					<?php if ($loggedin === true) {
    					echo '<div class="alert alert-success"><strong>Hello '. $_SESSION['username'] . '</strong> You are already logged in.</div>';
					} else {
					    echo '<div class="alert alert-info"><strong>Restricted.</strong> Please log in to continue.</div>';
}					?>

					</div>
					
                    <form role="form">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Username</label>
                                <input type="text" id="username" name="username" maxlength="25" class="form-control">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Password</label>
                                <input type="password" id="password" name="password" maxlength="25" class="form-control">
                            </div>
                            <div class="form-group col-lg-12">
                            <br>
                                <button type="submit" id="login" name="login" class="btn btn-primary">Login</button>
								<a href="register.php"><button type="button" class="btn btn-secondary">Register an account</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


<?php include_once('includes/footer.php'); ?>