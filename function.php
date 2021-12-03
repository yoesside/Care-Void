<?php 	

function displayBatch($name){
	$connect = mysqli_connect("localhost","root","","carevoid");
	$sql = "SELECT * FROM batch JOIN vaccines ON batch.vaccineID = vaccines.vaccineID";
	$display= mysqli_query($connect,$sql);	

	while ($row = mysqli_fetch_assoc($display)) {
		if($row['centreName'] == $name){
			echo "<tr>";					
			echo "<td scope='col'>".$row['batchNo']."</td>";		
			echo "<td scope='col'>".$row['vaccineName']."</td>";		
			echo "<td scope='col'>".$row['expireDate']."</td>";			
			echo "<td scope='col'>".$row['quantityAdministered']."</td>";
			echo "<td scope='col'>
			<form action='#' method='post'>
			<input type='date' name='vid' value=".$row['vaccineID'].">			
			</form>
			</td>";
			echo "<td scope='col'>
			<button class='btn btn-success' type='submit' name='select'>Select</button></td>";
			echo "</tr>";			
		}
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

?>