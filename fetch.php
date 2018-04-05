<?php
include 'connection.php';
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "
	SELECT * FROM tbl_residents WHERE resident_fname LIKE '%".$search."%'
	OR resident_address LIKE '%".$search."%' 
	OR resident_number LIKE '%".$search."%' 
	OR resident_mname LIKE '%".$search."%' 
	OR resident_lname LIKE '%".$search."%'
	";
}
else
{
	$query = "SELECT * FROM tbl_residents ORDER BY resident_id";
	$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
						<th>Firstname</th>;
                        <th>Lastname</th>;
                        <th>Address</th>;
                        <th>Mobile</th>;
						<th>Address</th>;
						<th>Age</th>;
						<th>Civil Status</th>;
						<th>Gender</th>;
						<th>Citizenship</th>;
						<th>Place of Birth</th>;
						<th>Occupation</th>;
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row[1].'</td>
				<td>'.$row[2].'</td>
				<td>'.$row[3].'</td>
				<td>'.$row[4].'</td>
				<td>'.$row[5].'</td>
				<td>'.$row[6].'</td>
				<td>'.$row[7].'</td>
				<td>'.$row[8].'</td>
				<td>'.$row[9].'</td>
				<td>'.$row[10].'</td>
				<td>'.$row[11].'</td>
			</tr>
		';
		

	}
}
else
{
	echo 'Data Not Found';
}
}


?>