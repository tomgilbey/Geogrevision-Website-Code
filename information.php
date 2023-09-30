<?php include_once("includes/header.php"); ?>
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

    <body>
        <div class="container">
        <p>Welcome to the information page, please select the topic you wish to read below.</p>
        <p>
                <h3>Coasts:</h3>
            
                    <ul>
                        <div>    
                        <li><a href="thecoastandlittoralzone.php" class="btn btn-primary list" style="width:100%">The Coast and wider Littoral Zone</a></li>
                        </div><div>    
                        <li><a href="geostructures.php" class="btn btn-primary list" style="width:100%">Influence of geological structures on the development of coastal landscapes</a></li> 
                            </div><div>    
                        <li><a href="recession.php" class="btn btn-primary list" style="width:100%">Rates of coastal recession</a></li>   
                            </div><div>
                        <li><a href="erosion.php" class="btn btn-primary list" style="width:100%">Marine erosion and coastal landforms/landscapes</a></li>   
                            </div><div>
                        <li><a href="sedimentprocesses.php" class="btn btn-primary list" style="width:100%">Sediment transportation and desposition create landforms</a></li>
                            </div><div>
                        <li><a href="massmovement.php" class="btn btn-primary list" style="width:100%">Mass movement/weathering contribute to landscapes/landforms</a></li>
                            </div><div>
                        <li><a href="sealevel.php" class="btn btn-primary list" style="width:100%">Sea Level change and it's effects</a></li>    
                            </div><div>
                        <li><a href="retreat.php" class="btn btn-primary list" style="width:100%">Dangers of rapid coastal retreat</a></li>
                            </div><div>
                        <li><a href="risksofrecession.php" class="btn btn-primary list" style="width:100%">Increasing risks of coastal recession and flooding on communities</a></li>
                            </div><div>
                        <li><a href="managementofrisks.php" class="btn btn-primary list" style="width:100%">Managing risks of coastal recession and flooding</a></li>
                            </div><div>
                        <li><a href="iczm.php" class="btn btn-primary list" style="width:100%">Holistic integrated coastal zone management(ICZM)</a></li>   
                            </div>
                    </ul>
        
        </div>

        </p>
    </body>





<?php include_once("includes/footer.php"); ?>
