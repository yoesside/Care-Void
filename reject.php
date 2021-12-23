<?php 
	
	include 'connection.php';
	include 'function.php';

	$id = $_GET['vid'];

	//echo $id;

	$sql = "UPDATE vaccination SET status = 'Rejected.' WHERE vaccinationID = '$id'";
	$update = mysqli_query($connect,$sql);
	echo "<script>
		window.location.href= 'patientInfo.php';
	</script>";

?>