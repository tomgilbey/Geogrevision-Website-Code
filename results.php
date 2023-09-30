<?php include_once('includes/header.php'); ?>
<?php require_once("includes/database.php"); ?>
<?php
session_start();
if(isset($_SESSION['login'])){
	$username= $_SESSION['username'];
} else { 
	header("location:login.php");
}
?>

</head>

<?php include_once("includes/navigation.php");?>

<div class="container">
<h1>Quiz Results</h1>


<?php
    
$correctans = 0;
$sql_query = "SELECT * FROM questions WHERE qtopic LIKE '".$_GET['quiz_name']."'";
$quizlist = mysqli_query($link, $sql_query);
$numquestions = mysqli_num_rows($quizlist);

foreach ($_GET as $key => $value){
    
	$row = mysqli_fetch_array($quizlist);
	if ($row['correctanswer'] == $value){
		$correctans = $correctans + 1;
		}
	if ($value !== $_GET['quiz_name']){    
	    echo "<h5 style='padding:10px; margin:10px; border: solid 1px #888;'>".$row['question']."</span></h5>";
	    echo "<p><span style='text-decoration:underline;'>You answered</span>: ".$value."</p>";
	    echo "<p><span style='color:red;'>Correct Answer: ".$row['correctanswer']."</span></p>";
	    echo "<br>";
	}
}

$quiz_name = $_GET['quiz_name'];

$sql_query_two = "SELECT * FROM leaderboard WHERE username='$username' AND quiz_name='$quiz_name'";
$results = mysqli_query($link, $sql_query_two);
$row = mysqli_fetch_array($results);
$num_row = mysqli_num_rows($results);

if($num_row<1){
	$link->query("INSERT INTO leaderboard (username, quiz_name, score, highscore) VALUES ('$username','$quiz_name','$correctans','$correctans')");
}else{
	if ($correctans > $row['highscore']){
		$link->query("UPDATE leaderboard SET highscore='$correctans' WHERE username='$username'");
	}
}

?>

<p>You achieved a total of <span style="font-size:26px;"><?php echo $correctans ?></span> correct answers out of <span style="font-size:26px;"><?php echo $numquestions ?></span> possible questions.</p>

    

    
<div class="row"></div>
    
    <ul>
        <div>
        <li><a href="leaderboard.php?quiz=q%25" class="btn btn-primary list" style="width:100%">See my scores for all quizzes</a></li>
        </div><div>
            <li><a href="leaderboard.php?quiz=questionstopic1" class="btn btn-primary list" style="width:100%">See my scores for The Coast and wider Littoral Zone</a></li>
        </div><div>
            <li><a href="leaderboard.php?quiz=questionstopic2" class="btn btn-primary list" style="width:100%">See my scores for all Influence of geological structures on the development of coastal landscapes</a></li>  
        </div><div>
            <li><a href="leaderboard.php?quiz=questionstopic3" class="btn btn-primary list" style="width:100%">See my scores for Rates of coastal recession</a></li>   
        </div><div>
            <li><a href="leaderboard.php?quiz=questionstopic4" class="btn btn-primary list" style="width:100%">See my scores for Marine erosion and coastal landforms/landscapes</a></li>  
        </div><div>
            <li><a href="leaderboard.php?quiz=questionstopic5" class="btn btn-primary list" style="width:100%">See my scores for Sediment transportation and deposition create landforms</a></li>
        </div><div>
            <li><a href="leaderboard.php?quiz=questionstopic6" class="btn btn-primary list" style="width:100%">See my scores for Mass movement/weathering contribute to landscapes/landforms</a></li>
        </div><div>
            <li><a href="leaderboard.php?quiz=questionstopic7" class="btn btn-primary list" style="width:100%">See my scores for Sea level change and it's effects</a></li>   
        </div><div>
            <li><a href="leaderboard.php?quiz=questionstopic8" class="btn btn-primary list" style="width:100%">See my scores for Dangers of rapid coastal retreat</a></li>
        </div><div>
            <li><a href="leaderboard.php?quiz=questionstopic9" class="btn btn-primary list" style="width:100%">See my scores for Coastal flooding and the risks</a></li>
        </div><div>
            <li><a href="leaderboard.php?quiz=questionstopic10" class="btn btn-primary list" style="width:100%">See my scores for Increasing risks of coastal recession and flooding on communities</a></li>
        </div><div>
            <li><a href="leaderboard.php?quiz=questionstopic11" class="btn btn-primary list" style="width:100%">Managing risks of coastal recession and flooding</a></li>
        </div><div>
            <li><a href="leaderboard.php?quiz=questionstopic12" class="btn btn-primary list" style="width:100%">See my scores for Holistic Integrated Coastal Zone Management (ICZM)</a></li>          
        </div>    
        </ul>    
    
    


</div>


