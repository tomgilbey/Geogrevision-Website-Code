<?php include_once('includes/header.php'); ?>


	<script type="text/javascript">
 		$(document).ready(function(){
			$("#register").click(function(){ 
				fname = $("#fname").val();
				sname = $("#sname").val();
				email = $("#email").val();
				cusername = $("#cusername").val();
				cpassword = $("#cpassword").val();
                
				
				$.ajax({
					type: "POST",
					url: "includes/adduser.php",
					data: "fname=" + fname + "&sname=" + sname + "&email=" + email + "&cusername=" + cusername + "&cpassword=" + cpassword,
					success: function(outcome){
						if(outcome == 'true'){
							$("#add_err2").html('<div class="alert alert-success"><strong>Registration Successful.&nbsp;</strong>Please login to continue.</div>');
						window.location.href="login.php";

						} else if(outcome== 'emailtaken'){
							$("#add_err2").html('<div class="alert alert-danger"><strong>Email Address</strong> is already registered.</div>');
						} else if(outcome== 'usernametaken'){
							$("#add_err2").html('<div class="alert alert-danger"><strong>Username</strong> is already registered.</div>');
						} else if(outcome== 'fname'){
							$("#add_err2").html('<div class="alert alert-danger"><strong>Forname</strong> is required.</div>');
						} else if(outcome== 'sname'){
							$("#add_err2").html('<div class="alert alert-danger"><strong>Surname</strong> is required.</div>');
						} else if(outcome== 'emailshort'){
							$("#add_err2").html('<div class="alert alert-danger"><strong>Email Address</strong> is required.</div>');
						} else if(outcome== 'username'){
							$("#add_err2").html('<div class="alert alert-danger"><strong>Username</strong> is required.</div>');
						} else if(outcome== 'emailformat'){
							$("#add_err2").html('<div class="alert alert-danger"><strong>Email Address</strong> is not valid.</div>');
						} else if(outcome== 'passwordshort'){
							$("#add_err2").html('<div class="alert alert-danger"><strong>Password</strong> is required, at least 8 characters.</div>');
						} else{
							$("#add_err2").html('<div class="alert alert-danger"><strong>Error</strong>. Please try again later.</div>');
						}
					},
					
				});
				return false;
			});

		});

	</script>



</head>

<?php include_once("includes/navigation.php");?>


<div class="container">


        <div class="col-lg-12">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Register for an account</strong>
                    </h2>
                    <hr>
                    
                  
                    <p>Please complete all fields to register for an account.</p>
					
					<!-- Meesages for form -->
					<div id="add_err2"></div>
					
                    <form role="form">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Forename</label>
                                <input type="text" id="fname" name="fname" maxlength="25" class="form-control">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Surname</label>
                                <input type="text" id="sname" name="sname" maxlength="25" class="form-control">
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Email</label>
                                <input type="email" id="email" name="email" maxlength="50" class="form-control">
                            </div>
							<div class="form-group col-lg-6">
                                <label>Username</label>
                                <input type="text" id="cusername" name="cusername" maxlength="25" class="form-control">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="cpassword">Password</label>
                                <input type="password" id="cpassword" name="cpassword" class="form-control"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                            </div>
                            
                            
                            
                            <div class="form-group col-lg-12">
                            <br>
                                <button type="submit" id="register" name="register" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </form>'
                </div>
            </div>
        </div>

    </div>
<div id="message">
    <h3>Password must contain the following:</h3>
    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
    <p id="number" class="invalid">A <b>number</b></p>
    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div>

<script>
var myInput = document.getElementById("cpassword");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>


<?php include_once('includes/footer.php'); ?>