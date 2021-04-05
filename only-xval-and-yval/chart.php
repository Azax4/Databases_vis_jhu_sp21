<?php
$dataPoints = array();

$con=mysqli_connect("dbase.cs.jhu.edu","20sp_akejriw2","******","20sp_akejriw2_db"); //mysqli_connect("host","username","password","db"); - Refer https://www.w3schools.com/php/func_mysqli_connect.asp for more info

if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql="SELECT xval, yval from datapoints;";
if ($result=mysqli_query($con,$sql)){	  
	foreach($result as $row){
		array_push($dataPoints, array("x"=> $row["xval"], "y"=> $row["yval"]));
		//echo $row["yval"];
	}
}
//echo json_encode($dataPoints);
mysqli_close($con);
//echo "here";
?>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () { 
	var chart = new CanvasJS.Chart("chartContainer", {
		animationEnabled: false,
		exportEnabled: true,
		theme: "light1", // "light1", "light2", "dark1", "dark2"
		title:{
			text: "PHP Column Chart from Database - MySQLi"
		},
		data: [{
			type: "line", //change type to column, bar, line, area, pie, etc  
			dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chart.render(); 
}
</script>
</head>
<body>
	<div id="chartContainer" style="height: 400px; width: 100%;"></div>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
