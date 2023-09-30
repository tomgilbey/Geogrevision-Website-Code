<?php include_once("includes/header.php"); ?>
<?php include_once("includes/database.php"); ?>
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

<p>
<form name="selectquiz" action="" method="GET">
<label for="quiz">Select a quiz:</label>

<select name="quiz">
	<option value="" disabled selected>Please select the topic you wish to be tested on!</option>
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

<?php

//I now need to create a form. I will start the form here and then within the form run a loop to output the results of the query



$sqlQuery = "SELECT * FROM questions WHERE qtopic LIKE '".$_GET['quiz']."'";
$quizlist = mysqli_query($link, $sqlQuery);


echo "<form action = 'results.php'>";

//now that the form has started I need to output the question and answers from each row of the query
//The questions will be displayed in a heading tag and the answers will be labels on radio buttons.
//Each set of radio buttons must have the same name (but be different for each question) so that only one option can be chosen in a single question

while($row = mysqli_fetch_array($quizlist)){
	echo "<h4>".$row['question']."</h4>";
	
	echo "<input type='radio' name='".$row['question']."' value='".$row['answera']."'>";
	echo "<label for='".$row['answera']."'>".$row['answera']."</label><br>";
	
	echo "<input type='radio' name='".$row['question']."' value='".$row['answerb']."'>";
	echo "<label for='".$row['answerb']."'>".$row['answerb']."</label><br>";
	
	echo "<input type='radio' name='".$row['question']."' value='".$row['answerc']."'>";
	echo "<label for='".$row['answerc']."'>".$row['answerc']."</label><br>";
	
	echo "<input type='radio' name='".$row['question']."' value='".$row['answerd']."'>";
	echo "<label for='".$row['answerd']."'>".$row['answerd']."</label><br>";
    
};	
echo "<input type='hidden' name='quiz_name' value='".$_GET['quiz']."'>";

echo "<br><input type='submit' value='Submit my answers'><br>";
echo "</form>"


	


?>

<br><br><br>
<?php include_once("includes/footer.php"); ?>
