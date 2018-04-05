<?php
//echo $_POST['userid'];
 include 'connection.php';

					$selectdata = mysqli_query($conn, "SELECT * FROM tbl_complain where cfno = '". $_POST['userid']."'");

					$row = mysqli_fetch_array($selectdata);

					

?>

<div id="myModal2" class="modal fade" role="dialog">
	<div class="modal-dialog">
	  
		  <!-- Modal content-->
	<div class="modal-content">
		 <div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">Edit Complains</h4>
		</div>
		  
	  <form action="units_view.php" method="POST" enctype="multipart/form-data">
	<div class="modal-body">
	      <input type="hidden" name="size" value="1000000">
		  <input name="userid" type="hidden" value="<?php echo $_POST['userid']; ?>">
		<div class="form-group">
		  <label for="name">Complainant Full Name:</label>
		  <input type="name" class="form-control" id="fullname" value="<?php echo $row['cpfname']; ?>" placeholder="Enter fullname" name="fullname" required>
		</div>
		<div class="form-group">
		  <label for="mobile">Mobile:</label>
		  <input type="mobile" class="form-control" value="<?php  echo $row['mobile']; ?>" id="mobile" placeholder="Enter mobile" name="mobile" required>
		</div>
		<div class="form-group">
		  <label for="address">Address:</label>
		  <input type="address" class="form-control" id="address"  value="<?php  echo $row['address']; ?>" placeholder="Enter address" name="address" required>
		</div>
		
		<div class="form-group">
		  <label for="name">Age:</label>
		  <input type="name" class="form-control" id="age" placeholder="Age" value="<?php  echo $row['age']; ?>" name="age">
		</div>

		<div class="form-group">
		  <label for="name">Type of complain:</label>
		  <input type="name" class="form-control" id="complain" placeholder="Type of complain" value="<?php  echo $row['toc']; ?>" name="complain">
		</div>
		
		<div class="form-group">
		  <label for="name">Time:</label>
		  <input type="name" class="form-control" id="time" placeholder="Time" name="time" value="<?php  echo $row['time']; ?>" required>
		</div>

		<div class="form-group">
		  <label for="address">Witness</label>
		  <input type="address" class="form-control" id="witness" placeholder="Witness" value="<?php  echo $row['weatness']; ?>" name="witness" required>
		</div>
		
		<div class="form-group">
		  <label for="name">Brgy Official Duty:</label>
		  <input type="name" class="form-control" id="duty" placeholder="Name of official" value="<?php  echo  $row['bod']; ?>" name="duty">
		</div>
		
		<div class="form-group">
		  <label for="name">Complainee Full Name:</label>
		  <input type="name" class="form-control" id="fullname2" placeholder="Enter fullname" name="fullname2" value="<?php echo  $row['cf']; ?>" required>
		</div>
		<div class="form-group">
		  <label for="mobile">Mobile:</label>
		  <input type="mobile" class="form-control" value="<?php  echo  $row['mobiles']; ?>" id="mobile2" placeholder="Enter mobile" name="mobile2" required>
		</div>
			<div class="form-group">
		  <label for="address">Address:</label>
		  <input type="address" class="form-control" id="address2" value="<?php  echo $row['adds']; ?>" placeholder="Enter address" name="address2" required>
		</div>
		<div class="form-group">
		  <label for="name">Age:</label>
		  <input type="name" class="form-control" id="age2" placeholder="Age" value="<?php  echo $row['ages']; ?>" name="age2">
		</div>
		<div></div>
		<div>Select Image <img src="upload/<?php  echo $row['images']; ?>" width="42px" height="42px" >
		<input type="file" name="image"></div>
	</div>	
	<Br/><br/>
		<div>
			<button type="submit" class="btn btn-default" id="submit" name="btnUpdate">Update</button>
		</div>
		<Br/><br/>
	</form>
	</div>
</div>
		
		</div>