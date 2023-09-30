<?php include_once('includes/header.php'); ?>
<?php include_once('includes/database.php'); ?>

<?php

session_start();
if(isset($_SESSION['login'])){
	$username = $_SESSION['username'];
} else {
	header("location:login.php");
}
?>


</head>

<?php include_once('includes/navigation.php'); ?>

<div class="container">

<h1>Leaderboard</h1>

<p>
<form name="filter" action="" method="GET">
<label for="quiz">Select a quiz:</label>

<select name="quiz" id="quiz">
  <option value="q%">All</option>
  <option value="questionstopic1">The Coast and wider Littoral Zone</option>
	<option value="questionstopic2">Influence of geological structures on the development of coastal landscapes</option>
	<option value="questionstopic2">Rates of coastal recession</option>
	<option value="questionstopic3">Marine erosion and coastal landforms/landscapes</option>
	<option value="questionstopic4">Sediment transportation and deposition create landforms</option>
	<option value="questionstopic5">Mass movement/weathering contribute to landscapes/landforms</option>
	<option value="questionstopic6">Sea level change and it's effects</option>
	<option value="questionstopic7">Dangers of rapid coastal retreat</option>
	<option value="questionstopic8">Coastal flooding and the risks</option>
	<option value="questionstopic9">Increasing risks of coastal recession and flooding on communities</option>
	<option value="questionstopic10">Managing risks of coastal recession and flooding</option>
	<option value="questionstopic11">Holistic Integrated Coastal Zone Management (ICZM)</option>
  
</select>
<input type="submit" value="Filter">
</form>
</p>

<table class="table table-striped table-hover">
  <thead>
  	<tr>
  		<th scope="col">Quiz Name</th>
  		<th scope="col">User</th>
  		<th scope="col">First Score</th>
  		<th scope="col">High Score</th>
  	</tr>
  </thead>
  <tbody>
  	<?php
  	
	$sql_query = "SELECT * FROM leaderboard WHERE quiz_name LIKE'".$_GET['quiz']."'ORDER BY score DESC";
	$score_list = mysqli_query($link, $sql_query);

	while($row = mysqli_fetch_array($score_list))
	{
		echo "<tr>";
		echo "<td>".$row['quiz_name']."</td>";
		echo "<td>".$row['username']."</td>";
		echo "<td>".$row['score']."</td>";
		echo "<td>".$row['highscore']."</td>";

		echo "</tr>";
  	};
  	?>
  </tbody> 
</table>



</div>



<?php include_once('includes/footer.php'); ?>