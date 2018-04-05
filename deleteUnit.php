<?php

include 'connection.php';

					$qry = "DELETE FROM tbl_complain where cfno = ".$_POST['userid'];  
					mysqli_query($conn, $qry)   or die (mysqli_error($conn));

echo "Successfully deleted";

?>