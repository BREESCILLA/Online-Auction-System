<?php
	require("connection.php");
	$table=$_REQUEST['table'];
	$id=$_REQUEST['id'];

	if($table=='auction' || $table=='contact')
		$qry="DELETE FROM $table WHERE id=".$id;
	elseif($table=='product')
		$qry="DELETE FROM $table WHERE proid=".$id;
	elseif($table=='buyer')
		$qry="DELETE FROM $table WHERE buyerid=".$id;
	elseif($table=='seller')
		$qry="DELETE FROM $table WHERE userid=".$id;
	

	$result=mysqli_query($conn,$qry);
	if($result){	
		$errMsg="Record Deleted Successfully !!";	
		if($table=='auction'){
			echo("<script>{ alert('".$errMsg."');
					window.location.replace('/project_adi/admin/view_auction.php');
				} </script>");
		}elseif($table=='buyer'){
			echo("<script>{ alert('".$errMsg."');
					window.location.replace('/project_adi/admin/manage_buyers.php');
				} </script>");
		}elseif($table=='seller'){
			echo("<script>{ alert('".$errMsg."');
					window.location.replace('/project_adi/admin/manage_sellers.php');
				} </script>");
		}elseif($table=='product'){
			echo("<script>{ alert('".$errMsg."');
					window.history.back();
					//window.location.replace('/project_adi/admin/manage_products.php');
				} </script>");
		}
	}
	else{	
		$errMsg="Deletion FAIL";
		echo("<script>{ alert('".$errMsg."');
					window.location.replace('/project_adi/admin/dashboard.php');
				} </script>");	
	}	
?>