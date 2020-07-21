<!DOCTYPE html>
<html>
<head>
	<title>Railway Enquiry Platform</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main1.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.html"><Strong>R.E.P.</Strong></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="pnr.php"><Strong>PNR Status</Strong></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="traininfo.php"><Strong>Train No. Information</Strong></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="fare.php"><Strong>Train Fare</Strong></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="trainbetweenstations.php"><Strong>Trains Between Stations</Strong></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="traininfo.php"><Strong>Coach Position</Strong></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="alltrainsonstation.php"><Strong>All Trains On Station</Strong></a>
      </li>
    </ul>
  </div>
</nav>
</body>
</head>
</html>

 //session start

<?php
	$from = $_GET['from'];
	$to = $_GET['to'];

	$url = "http://indianrailapi.com/api/v2/TrainBetweenStation/apikey/0e2379e71fc32b38f699887104fe8cd5/From/".$from."/To/".$to."";

	$data = file_get_contents($url);
	$json = json_decode($data,true);

	echo "<table border=2><tr><td>No.of Trains</td></tr>";
	echo "<tr><td>".$json['TotalTrains']."</td></tr>";
	echo "</table>";

	echo "<br>";
	echo "THE TRAINS ARE LISTED BELOW:";
	echo "<br>";
	

	echo "<table border=2><tr><td>Serial No.</td><td>Train No.</td><td>Train Name</td><td>Source</td><td>Destination</td><td>Departure Time</td><td>Arrival Time</td><td>Travel Time</td><td>Train Type</td></tr>";
	$i=0;
	while(isset($json['Trains'][$i]['TrainName']))
	{
		$num = $i+1;
		echo "<tr><td>".$num."</td>";
		echo "<td>".$json['Trains'][$i]['TrainNo']."</td>";
		echo "<td>".$json['Trains'][$i]['TrainName']."</td>";
		echo "<td>".$json['Trains'][$i]['Source']."</td>";
		echo "<td>".$json['Trains'][$i]['Destination']."</td>";
		echo "<td>".$json['Trains'][$i]['DepartureTime']."</td>";
		echo "<td>".$json['Trains'][$i]['ArrivalTime']."</td>";
		echo "<td>".$json['Trains'][$i]['TravelTime']."</td>";
		echo "<td>".$json['Trains'][$i]['TrainType']."</td></tr>";
		$i++;

	}
	echo "</table>";

?>