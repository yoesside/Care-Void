<?php 	

function displayBatch($name){	
	$connect = mysqli_connect("localhost","root","","carevoid");
	$sql = "SELECT * FROM batch JOIN vaccines ON batch.vaccineID = vaccines.vaccineID WHERE batch.centreName = '$name'";
	$display= mysqli_query($connect,$sql);			

	$empty = true;
	while($row = mysqli_fetch_assoc($display)){
		$empty=false;

		echo "<tr>";					
		echo "<td scope='col'>".$row['batchNo']."</td>";		
		echo "<td scope='col'>".$row['vaccineName']."</td>";		
		echo "<td scope='col'>".$row['expireDate']."</td>";					
		echo "<td scope='col'>".$row['quantityAdministered']."</td>";
		echo "<td scope='col'>
		<form action='appointment.php' method='post'>
			<input type='date' name='pdate'>					
			<input type='hidden' name='expireDate' value='".$row['expireDate']."'>				
			<input type='hidden' name='batchNo' value='".$row['batchNo']."'>					
			<input type='hidden' name='vaccineName' value='".$row['vaccineName']."'>			
			<input type='hidden' name='hc' value='".$name."'>			
		</td>";
		echo "<td scope='col'>
			<button class='btn btn-success' type='submit' name='choose'>Choose</button>
		</td>
		</form>";
		echo "</tr>";
	}
	
	if($empty){
		echo "<td colspan='12 scope='row'>
		<h2>No Batch Added.</h2>
		</td>";
	}
	
	
}

function displayVac(){
	$connect = mysqli_connect("localhost","root","","carevoid");
	$sql = "SELECT * FROM vaccines";
	$display = mysqli_query($connect,$sql);

	while($row = mysqli_fetch_assoc($display)){				
		echo "<tr>";
		echo "<td scope='col'>".$row['vaccineID']."</td>";		
		echo "<td scope='col'>".$row['vaccineName']."</td>";
		echo "<td scope='col'>".$row['manufacturer']."</td>";				
		echo "<td scope='col'>
		<form action='recordVac.php' method='post'>
		<input type='hidden' name='vid' value=".$row['vaccineID'].">
		<button class='btn btn-success' type='submit' name='select'>Select</button>
		</form>
		</td>";
		echo "</tr>";
	}
}

function displayHC(){	
	$connect = mysqli_connect("localhost","root","","carevoid");
	$sql = "SELECT * FROM administrator";
	$display = mysqli_query($connect,$sql);
	$no =1;

	while($row = mysqli_fetch_assoc($display)){						
		echo "<tr>";
		echo "<td scope='col'>".$no++."</td>";				
		echo "<td scope='col'>".$row['centreName']."</td>";		
		echo "<td scope='col'>".$row['address']."</td>";				
		echo "<td scope='col'>
		<form action='vaccine.php' method='post'>
		<input type='hidden' name='vid' value=".$row['staffID'].">
		<button class='btn btn-success' type='submit' name='select'>Select</button>
		</form>
		</td>";
		echo "</tr>";
	}	
}

function displayVaccination($name){
	$connect = mysqli_connect("localhost","root","","carevoid");
	$sql = "SELECT * FROM vaccination JOIN batch ON batch.batchNo = vaccination.batchNo WHERE batch.centreName = '$name'";
	$query = mysqli_query($connect, $sql);	
	
	$empty = true;
	
	while($row = mysqli_fetch_assoc($query)){			
		$empty = false;
		echo "<tr>";
		echo "
		<td scope='col'>".$row['vaccinationID']."</td>		
		<td scope='col'>".$row['batchNo']."</td>				
		<td scope='col'>".$row['patientName']."</td>
		<td scope='col'>".$row['appointmentDate']."</td>		
		<td scope='col'>".$row['remarks']."</td>		
		";		
		
		if ($row['status'] == 'Confirmed.') {
			echo "<td scope='col' class ='bg-success'>".$row['status']."</td>";		
		}

		else if ($row['status'] == 'Waiting for Confirmation ✅') {
			$vid = $row['vaccinationID'];
			$quantity = $row['quantityAdministered'];
			$bno = $row['batchNo'];
			echo "
			<td scope='col' class ='bg-warning'>".$row['status']."</td>
			<td scope='col-12'>
			<a href='accept.php?vid=".$vid."' class='btn btn-success'>Accept</a>
			<a href='reject.php?vid=".$vid."' class='btn btn-danger'>Reject</a>
			</td>
			";

		}

		else if ($row['status'] == 'Rejected.'){
			echo "<td scope='col' class ='bg-danger'>".$row['status']."</td>";
		}

		echo "</tr>";	
	}

	if ($empty) {
		echo "<tr>";
		echo "<td colspan='6'>";
		echo "<h2>No request yet. Please wait ya!</h2>";
		echo "</td>";
		echo "</tr>";	
	}
	
}

function dateFormat($date){
	return date('d-m-Y',strtotime($date));
}

?>