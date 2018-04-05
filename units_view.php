	<?php

		$currDir=dirname(__FILE__);
		include("$currDir/defaultLang.php");
		include("$currDir/language.php");
		include("$currDir/lib.php");
		@include("$currDir/hooks/units.php");
		include("$currDir/units_dml.php");

		if($render) $x->Render();

		// hook: units_header
		$headerCode='';
		if(function_exists('units_header')){
			$args=array();
			$headerCode=units_header($x->ContentType, getMemberInfo(), $args);
		}  
		if(!$headerCode){
			include_once("$currDir/header.php"); 
		}else{
			ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
			echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
		}
		
	?>

	<html>
	<body>

	<br>
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Complains</button>
	<br>
	
	
	<div id="modalEdit">
	
	
	</div>
	
	
	
	
	
	
	
	<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
	  
		  <!-- Modal content-->
		<div class="modal-content">
		 <div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">Complains</h4>
		</div>
		  
	<div class="modal-body">
	  <form action="units_view.php" method="POST" enctype="multipart/form-data">
	      <input type="hidden" name="size" value="1000000">
		<div class="form-group">
		  <label for="name">Complainant Full Name:</label>
		  <input type="name" class="form-control" id="fullname" placeholder="Enter fullname" name="fullname" required>
		</div>
		<div class="form-group">
		  <label for="mobile">Mobile:</label>
		  <input type="mobile" class="form-control" id="mobile" placeholder="Enter mobile" name="mobile" required>
		</div>
			<div class="form-group">
		  <label for="address">Address:</label>
		  <input type="address" class="form-control" id="address" placeholder="Enter address" name="address" required>
		</div>
		
		<div class="form-group">
		  <label for="name">Age:</label>
		  <input type="name" class="form-control" id="age" placeholder="Age" name="age">
		</div>

		<div class="form-group">
		  <label for="name">Type of complain:</label>
		  <input type="name" class="form-control" id="complain" placeholder="Type of complain" name="complain">
		</div>
		
		<div class="form-group">
		  <label for="name">Time:</label>
		  <input type="name" class="form-control" id="time" placeholder="Time" name="time" required>
		</div>

			<div class="form-group">
		  <label for="address">Witness</label>
		  <input type="address" class="form-control" id="witness" placeholder="Witness" name="witness" required>
		</div>
		
		<div class="form-group">
		  <label for="name">Brgy Official Duty:</label>
		  <input type="name" class="form-control" id="duty" placeholder="Name of official" name="duty">
		</div>
		
		<div class="form-group">
		  <label for="name">Complainee Full Name:</label>
		  <input type="name" class="form-control" id="fullname2" placeholder="Enter fullname" name="fullname2" required>
		</div>
		 <div class="form-group">
		  <label for="mobile">Mobile:</label>
		  <input type="mobile" class="form-control" id="mobile2" placeholder="Enter mobile" name="mobile2" required>
		</div>
			<div class="form-group">
		  <label for="address">Address:</label>
		  <input type="address" class="form-control" id="address2" placeholder="Enter address" name="address2" required>
		</div>
		<div class="form-group">
		  <label for="name">Age:</label>
		  <input type="name" class="form-control" id="age2" placeholder="Age" name="age2">
		</div>
		
		 <div>Select Image <input type="file" name="image"></div>
		 </div>	
		<div>
		<button type="submit" class="btn btn-default" id="submit" name="submit2">Submit</button>
		</div>
		</form>
		</div>
		</div>
		</div>
		
		<link href="js/bootstrap.min.css" rel="stylesheet">


		  <div class="container" style="margin-top:35px">
			<div class="form-group">
				<select name="state" id="maxRows" class="form-control" style="width:150px;">
					<option value="5000">Show All</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="50">50</option>
					<option value="75">75</option>
					<option value="100">100</option>
				</select>
			</div>
			
			
			<?php

			include ('connection.php');
			$show = mysqli_query($conn,"SELECT * FROM tbl_complain");        
					
			if(mysqli_num_rows($show)>0){
			
			echo "<form method='POST' action='units_view.php'>";
			echo "<table id='mytable' class='table table-bordered table-striped'>";
			echo "<thead>";
							echo "<tr>";
							echo "<th>Complainant Full Name</th>";
							echo "<th>Mobile</th>";
							echo "<th>Address</th>";
							echo "<th>Age</th>";
							echo "<th>Type of complain</th>";
							echo "<th>Time</th>";
							echo "<th>Witness</th>";
							echo "<th>Brgy Official Duty</th>";
							echo "<th>Complainee Full Name</th>";
							echo "<th>Mobile</th>";
							echo "<th>Address</th>";
							echo "<th>Age</th>";
							echo "<th>Upload</th>";
							echo "<th>Actions</th>";
							echo "</tr>";
			echo "</thead>";
			echo "<tbody>";	
			
			
							while($row=mysqli_fetch_array($show)){
								echo "<tr>";
								echo "<td>".$row[1]."</td>";
								echo "<td>".$row[2]."</td>";
								echo "<td>".$row[3]."</td>";
								echo "<td>".$row[4]."</td>";
								echo "<td>".$row[5]."</td>";
								echo "<td>".$row[6]."</td>";
								echo "<td>".$row[7]."</td>";
								echo "<td>".$row[8]."</td>";
								echo "<td>".$row[9]."</td>";
								echo "<td>".$row[10]."</td>";
								echo "<td>".$row[11]."</td>";
								echo "<td>".$row[12]."</td>";
								echo "<td><img src='upload/".$row['images']."' height='42' width='42'></td>";
								$userid = $row[0];
								echo "<td><input type='submit' value='View' name='btnview".$userid."'>&nbsp<input type='submit' value='Delete' name='btndelete".$userid."'>&nbsp<input type='submit' value='Edit' name='btnedit".$userid."'></td>";
								echo "</tr>";
							}
			  echo "</tbody>";
				echo "</form>";
			echo "</table>";

							
		}


					else{
						echo "No records found";
					}
					
					
	
	
					
	if(isset($_POST['btndelete'.$userid])){
		
					
				   
				echo "<script type='text/javascript'>";
				
				echo "var r = confirm('Are you sure you want to delete?');";
				
				
				echo "var userid='".$userid."';";
				echo "if (r == true) {";
				
				echo "$.post('deleteUnit.php',{userid:userid},function(data){"
					."alert(data);"
					."window.location='units_view.php';"
				."});";
					
				echo "} else {";
					//echo "alert('You pressed Cancel!');";
				echo "}";
					
					
				
				//alert('Item deleted!');
				//echo "window.location='units_view.php';";
				echo "</script>";
				return false;
	}
	
	
	if(isset($_POST['btnedit'.$userid])){
		echo "<script type='text/javascript'>";
		echo "var userid='".$userid."';";
		echo "$.post('edit.php',{userid:userid},function(data){"
					."$('#modalEdit').html(data);"
					."$('#myModal2').modal('show');"
				."});";
		echo "</script>";
	}
	
if(isset($_POST["btnUpdate"])){
	include ('connection.php');
	$target = "upload/".basename($_FILES['image']['name']);
	$image = $_FILES['image']['name'];
	
	if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
	
	}

	else{
	 echo "<script type='text/javascript'>alert('Cannot upload image.');</script>";
	}
	
	
			$update = mysqli_query($conn,"UPDATE `tbl_complain` SET `cpfname`='".$_POST['fullname']."',`mobile`='".$_POST['mobile']."',`address`='".$_POST['address']."',`age`='".$_POST['age']."',`toc`='".$_POST['complain']."',`time`='".$_POST['time']."',`weatness`='".$_POST['witness']."',`bod`='".$_POST['duty']."',`cf`='".$_POST['fullname2']."',`mobiles`='".$_POST['mobile2']."',`adds`='".$_POST['address2']."',`ages`='".$_POST['age2']."',`images`='".$image."' WHERE cfno = '".$_POST['userid']."'");        
					
	echo"<script>alert('Edited successfully.');window.location='units_view.php';</script>";	
	
	
}
	
	
	
					
	if(isset($_POST["submit2"])){

	$fullname = $_POST["fullname"];
	$mobile = $_POST["mobile"];
	$address = $_POST["address"];
	$age = $_POST["age"];
	$complain = $_POST["complain"];
	$time = $_POST["time"];
	$witness = $_POST["witness"];
	$duty = $_POST["duty"];
	$fullname2 = $_POST["fullname2"];
	$mobile2 = $_POST["mobile2"];
	$address2 = $_POST["address2"];
	$age2 = $_POST["age2"];
		
	$target = "upload/".basename($_FILES['image']['name']);
	$image = $_FILES['image']['name'];
	
	
	/*$show = mysqli_query($conn,"SELECT * FROM tbl_resident");
    while ($row = mysqli_fetch_assoc($show)) {

		
		$namee = mysqli_query($conn,"select concat(fname, ' ', mname, ' ', lname,) as fullname from tbl_resident");
		
		$full = $row['fullname'];
		
		if($full == $fullname2){
			
				$showw = mysqli_query($conn,"UPDATE tbl_resident SET remarks = 1 WHERE remarks = 0");
			
		}
	
}*/
	

	$query = "INSERT INTO tbl_complain(cpfname,mobile,address,age,toc,time,weatness,bod,cf,mobiles,adds,ages,images) VALUES ('$fullname','$mobile','$address','$age','$complain','$time','$witness','$duty','$fullname2','$mobile2','$address2','$age2','$image');";
	

	if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
	$msg = "Added Successfully!";
	}

	else{
	$msg = "There was an error!";
	}

	
	mysqli_query($conn, $query) or die (mysqli_error($conn));

		 echo "<script type='text/javascript'>
				alert('Added successfully!');
				window.location='units_view.php';
				</script>";

	}


	if(isset($_POST['btnview'.$userid])){

				   include 'connection.php';

					$selectdata = mysqli_query($conn, "SELECT * FROM tbl_complain where cfno = '$userid'");

					$row = mysqli_fetch_array($selectdata);
					
			echo "<html>
					<body>
					<div id='printModal' class='modal fade' role='dialog'>
	  <div class='modal-dialog'>
	  
		  <!-- Modal content-->
		<div class='modal-content'>
		  <div class='modal-header'>
			<button type='button' class='close' data-dismiss='modal'>&times;</button>
			<h4 class='modal-title'>Print Preview</h4>
		  </div>
		  <div class='modal-body'>
		
	<table class='table table-bordered'>
	  <thead>
		<tr>
		  <th>Complainant Full Name</th>
		  <th>Address</th>
		  <th>".$row['address']."</th>
		</tr>
	  </thead>
	  <tbody>
		<tr>
		  <td>".$row['cpfname']."</td>
		  <td>Age</td><td>".$row['age']."</td>
		</tr>
		<tr>
		<th scope='row'>Type of complain</th>
		  <td>".$row['toc']."</td>
		  <td scope='row'>Time</td><td>".$row['time']."</td>
		</tr>
		<th>Witness</th>
		<td>".$row['weatness']."</td>
		<th>Brgy official duty</th>
		<td>".$row['bod']."</td>
		<tr>
		<th>Complainee Full Name</th>
		<td>".$row['cf']."</td>
		<th>Mobile</th>
		<td>".$row['mobiles']."</td>
		</tr>
		<th>Witness</th>
		<td>".$row['weatness']."</td>
		<th>Address</th>
		<td>".$row['adds']."</td>
		<tr>
		<th>Age</th>
		<td>".$row['ages']."</td>
		</tr>
		<tr>
		<th>Upload</th>
		</tr>
		<tr>
		<td><img src='upload/".$row['images']."' height='80' width='150'></td>
		</tr>
		</tbody>
		</table>

		</div>
		  <div class='modal-footer'>
			<button type='button' class='btn btn-default' data-dismiss='modal'>Print</button>
		  </div>
		</div>
		</div>
		</div>
		</body>
		</html>
		<script>$('#printModal').modal('show')</script>";			
			}	


				?>
					
	</body>
	</html>