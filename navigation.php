

</head>
    <body>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        
    

<div class="container bg-nav">
	
	<nav class="navbar navbar-expand-lg navbar-light bg-nav">
        <img src="includes/LogoNoBck.png" class = "navlogo" >
        <h1>Geogrevision</h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto topnav">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="information.php">Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="questions.php">Questions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="leaderboard.php">Leaderboard</a>
                </li>

                <li class="nav-item">
                    <?php if($loggedin === false){
        	echo '<a class="nav-link btn btn-primary text-white" type="button" href="login.php" >Sign In</a>';
        } else {
        	echo '<a href="logout.php" class="nav-link btn btn-primary text-white">Logout</a>';
        }
        ?> 
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-white" type="button" href="register.php" >Register</a>
                </li>
            </ul>
        </div>


            </div>
        </div>
    </div>
            

    </nav>
</div>