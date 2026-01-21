<?php
	require("connection.php");
	
	function validate_image_upload($img){
		//imag validation
		$allowed_image_extension = array("png","jpg","jpeg" );
		// Get image file extension
		$errMsg=true;
    	$file_extension = pathinfo($img["name"], PATHINFO_EXTENSION);
    	// Validate file input to check if is not empty
	    if (!file_exists($img["tmp_name"])) {
            $errMsg="Choose image file to upload.";
	    } // Validate file input to check if is with valid extension
	    elseif (!in_array($file_extension, $allowed_image_extension)) {
            $errMsg="Upload valiid images. Only PNG and JPEG are allowed.";
	    }    // Validate image file size
	    elseif($img["size"] > 2000000) {
	        $errMsg="Image size exceeds 2MB";
	    }
	    return $errMsg;
	}
	
	//update seller profile
	if(isset($_POST['btn_update_seller_profile'])){
		if(!session_start()) session_start();
		$id=$_SESSION['seller_id'];
		
		$name=$_POST['txt_name'];
		$qry="UPDATE seller SET username='$name' WHERE userid=".$id;
		$result=mysqli_query($conn,$qry);

		$pass=$_POST['txt_pass'];
		$cpass=$_POST['txt_cpass'];
		if($pass===$cpass && !empty($pass)){
			$qry="UPDATE seller SET password='$pass' WHERE userid=".$id;
			$result=mysqli_query($conn,$qry);
		}	

		$name=$_POST['txt_lic'];
		$qry="UPDATE seller SET pancardno='$name' WHERE userid=".$id;
		$result=mysqli_query($conn,$qry);

		$name=$_POST['txt_email'];
		$qry="UPDATE seller SET email='$name' WHERE userid=".$id;
		$result=mysqli_query($conn,$qry);		

		$name=$_POST['txt_phone'];
		$qry="UPDATE seller SET mobileno='$name' WHERE userid=".$id;
		$result=mysqli_query($conn,$qry);

		//success
		if($result){
			echo("<script>{ alert('Profile Updated Successfully !!');
				window.location.replace('/project_adi/seller_profile.php');
			} </script>");			
		}
	}

	//update buyer profile
	if(isset($_POST['btn_update_buyer_profile'])){
		if(!session_start()) session_start();
		$id=$_SESSION['buyer_id'];
		
		$name=$_POST['txt_name'];
		$qry="UPDATE buyer SET buyername='$name' WHERE buyerid=".$id;
		$result=mysqli_query($conn,$qry);

		$pass=$_POST['txt_pass'];
		$cpass=$_POST['txt_cpass'];
		if($pass===$cpass && !empty($pass)){
			$qry="UPDATE buyer SET password='$pass' WHERE buyerid=".$id;
			$result=mysqli_query($conn,$qry);
		}	

		$name=$_POST['txt_lic'];
		$qry="UPDATE buyer SET licenseno='$name' WHERE buyerid=".$id;
		$result=mysqli_query($conn,$qry);

		$name=$_POST['txt_email'];
		$qry="UPDATE buyer SET email='$name' WHERE buyerid=".$id;
		$result=mysqli_query($conn,$qry);		

		$name=$_POST['txt_phone'];
		$qry="UPDATE buyer SET mobileno='$name' WHERE buyerid=".$id;
		$result=mysqli_query($conn,$qry);

		//success
		if($result){
			echo("<script>{ alert('Profile Updated Successfully !!');
				window.location.replace('/project_adi/buyer_profile.php');
			} </script>");			
		}
	}

	//when seller accept request
	if(isset($_POST['btn_req_submit'])){
		$id=$_POST['txt_id'];
		$result=updateData('auction','status','accepted',$id);
		if($result){
			echo("<script>{ alert('Bidding Request Accepted !! SMS sent to Customer');
					window.location.replace('/project_adi/seller_bid_request.php');
				} </script>");			
		}
	}	

	//buyer when click/ bid
	if(isset($_POST['btn_buyers_bid'])){
		$proid=$_POST['txt_proid'];
		$old_amt=$_POST['txt_old_rate'];
		$amt=$_POST['txt_bid_amt'];
		date_default_timezone_set("Asia/Kolkata");  //set INDIA TIMEZONE GMT+5:30
		$date=date('d-m-Y h:i:sa');
		if(!session_start()) session_start();
		$b_id=$_SESSION['buyer_id'];
		$status="requested";

		if($amt>$old_amt){
			$qry="INSERT INTO `auction`(`product_id`, `buyer_id`, `bid_amount`, `bid_time`, `status`) 
				VALUES($proid,$b_id,$amt,'$date','$status')";
			///print_r($qry);
		    $result=mysqli_query($conn,$qry);			
			//header("location:/project_adi/buy.php");
			echo("<script>{ alert('Your Bidding Request is Submitted.');
					window.location.replace('/project_adi/buy.php');
				} </script>");
		}else{
			echo("<script>{ alert('Bidding Rate Must have more than Starting Rate');
					window.location.replace('/project_adi/view.php?id=".$proid."');
				} </script>");
		}
	}

	//add product
	if(isset($_POST['btn_add_item'])){
		$name=$_POST['txt_name'];
		$starttime=$_POST['txt_bid_start_time'];
		$endtime=$_POST['txt_bid_end_time'];
		$amt=$_POST['txt_amt'];
		$desc=$_POST['txt_desc'];
		$img1=$_FILES['txt_img_1']['name'];
		$img2=$_FILES['txt_img_2']['name'];
		$img3=$_FILES['txt_img_3']['name'];


		if(!session_start()){session_start();}
		$seller_id=$_SESSION['seller_id'];
			//$seller_id=1;
		date_default_timezone_set("Asia/Kolkata");  //set INDIA TIMEZONE GMT+5:30
		$date=date('d-m-Y h:i:sa');
			
		$errMsg='';
		
		if(empty($name)||empty($starttime)||empty($endtime)||empty($amt)||empty($desc)){
			$errMsg="Please Fill All Fields !!"; 	
		}elseif(!preg_match("/^[a-zA-Z0-9 ]*$/",$name)) {
		  $errMsg = "Name Only have letters and white space"; 
		}
		elseif($starttime==$endtime){
			$errMsg="Both Time can't have same value";
		}
		elseif(validate_image_upload($_FILES['txt_img_1']) && validate_image_upload($_FILES['txt_img_2']) 
			&& validate_image_upload($_FILES['txt_img_3'] )) 
		{

			 $target = "assets/img/products/".basename($_FILES['txt_img_1']['name']);
	         move_uploaded_file($_FILES['txt_img_1']["tmp_name"], $target);
	         $target = "assets/img/products/".basename($_FILES['txt_img_2']['name']);
	         move_uploaded_file($_FILES['txt_img_2']["tmp_name"], $target);
	         $target = "assets/img/products/".basename($_FILES['txt_img_3']['name']);
	         move_uploaded_file($_FILES['txt_img_3']["tmp_name"], $target);

			//query
			$qry="INSERT INTO `product`(`proname`,`starttime`,`endtime`,`bidamnt`,`descr`,`img_1`,`img_2`,`img_3`,`seller_id`,`add_date`) VALUES ('$name','$starttime','$endtime',$amt,'$desc','$img1','$img2','$img3',$seller_id,'$date')";
	        // $qry="insert into product(name) values($name)";
			//require("connection.php");
			$result=mysqli_query($conn,$qry);
			if($result==true){	$errMsg="Product Added Successfully !!";	}
			else{	$errMsg="Insertion FAIL";	
				print_r($qry);
				//print_r(E_ALL);
			}
	    }else{
	    	$errMsg="Image Upload Fail";
	    }
	    
		echo("<script>{ alert('".$errMsg."');
					window.location.replace('/project_adi/sell.php');
				} </script>");	
	}

	//contact message
	if(isset($_POST['btn_contact'])){
		$name=$_POST['txt_name'];
		$email=$_POST['txt_email'];
		$phone=$_POST['txt_phone'];
		$msg=$_POST['txt_msg'];

		//query
		$qry="INSERT INTO `contact`(`name`, `email`, `phone`, `msg`) VALUES ('$name','$email','$phone','$msg')";
		$result=mysqli_query($conn,$qry);
		if($result==true)
			echo("<script>{ alert('Message sent successfully');
					window.location.replace('/project_adi/index.php');
				} </script>");	
	}

	//function for update
	function updateData($table,$col,$val,$id){
		//echo $val;
		$qry="UPDATE $table SET $col='".$val."' WHERE id=$id";
		require("connection.php");
		//print_r($qry);
		return mysqli_query($conn,$qry);			
	}

	//update admin profile
	if(isset($_POST['btn_update_admin_profile'])){
		$uname=$_POST['txt_name'];
		$pass=$_POST['txt_pass'];
		$cpass=$_POST['txt_cpass'];
		session_start();

		//update admin username	
		if($uname!=''){
			if(updateData('admin','username',$uname,$_SESSION['admin_id'])==true){
				$errMsg='Username Updated Successfully !!';
				$_SESSION['admin_username']=$uname;				
			}else{
				$errMsg='Username Updation FAIL !!';
			}
		}else{
			$errMsg='Please Enter Username';		
		}

		//update admin password
		if($pass!==$cpass){
			$errMsg='Password Not Matched !!';
		}else{
			//query
			if(updateData('admin','password',$pass,$_SESSION['admin_id'])==true){
				$errMsg='Password Updated Successfully !!';
				$_SESSION['admin_password']=$pass;
			}else{
				$errMsg='password Updation FAIL !!';
			}
		}

		page_redirect('admin/profile.php',$errMsg);		
	}
	
	//function alert & redirect
	function page_redirect($page_link,$msg){
		echo("<script>{ alert('".$msg."');
				window.location.replace('/project_adi/".$page_link."');
			} </script>");
	}

	//admin login
	if(isset($_POST['btn_login'])){
		$email=$_POST['txt_email'];
		$pass=$_POST['txt_pass'];

		//query
		$qry="SELECT * FROM `admin` WHERE username='$email' and password='$pass'";
		//print_r($qry);
		$result=mysqli_query($conn,$qry);
		if(mysqli_num_rows($result)>0){
			foreach ($result as $row) {
				session_start();
				$_SESSION['admin_id']=$row['id'];
				$_SESSION['admin_username']=$row['username'];
				$_SESSION['admin_password']=$row['password'];
			}
			echo("<script>{ alert('Login Success');
					window.location.replace('/project_adi/admin/dashboard.php');
			} </script>");	
		}else{
			echo("<script>{ alert('Invalid Email/Password');
					window.location.replace('/project_adi/admin/login.php');
				} </script>");	
		}
	}

	//seller login 
	if(isset($_POST['btn_seller_login'])){
		$uname=$_POST['txt_username'];
		$pass=$_POST['txt_pass'];

		//query
		$qry="SELECT * FROM `seller` WHERE (username='$uname' or email='$uname') and password='$pass'";
		//print_r($qry);
		$result=mysqli_query($conn,$qry);
		if(mysqli_num_rows($result)>0){
			foreach ($result as $row) {
				session_start();
				$_SESSION['seller_id']=$row['userid'];
				$_SESSION['seller_username']=$row['username'];
				$_SESSION['seller_password']=$row['password'];
			}
			echo("<script>{ alert('Welcome to Online Auction,');
					window.location.replace('/project_adi/sell.php');
			} </script>");	
		}else{
			echo("<script>{ alert('Invalid Email/Password');
					window.location.replace('/project_adi/login_signup/login_seller.php');
				} </script>");	
		}
	}

	//buyer login 
	if(isset($_POST['btn_buyer_login'])){
		$uname=$_POST['txt_username'];
		$pass=$_POST['txt_pass'];

		//query
		$qry="SELECT * FROM `buyer` WHERE (buyername='$uname' or email='$uname') and password='$pass'";
		//print_r($qry);
		$result=mysqli_query($conn,$qry);
		if(mysqli_num_rows($result)>0){
			foreach ($result as $row) {
				session_start();
				$_SESSION['buyer_id']=$row['buyerid'];
				$_SESSION['buyer_username']=$row['buyername'];
				$_SESSION['buyer_password']=$row['password'];
			}
			echo("<script>{ alert('Welcome to Online Auction,');
					window.location.replace('/project_adi/buy.php');
			} </script>");	
		}else{
			echo("<script>{ alert('Invalid Email/Password');
					window.location.replace('/project_adi/login_signup/login_buyer.php');
				} </script>");	
		}
	}

	//buyer signup 
	if(isset($_POST['btn_buyer_signup'])){
		$uname=$_POST['txt_username'];
		$lic=$_POST['txt_licenseno'];
		$email=$_POST['txt_email'];
		$phone=$_POST['txt_phone'];
		$pass=$_POST['txt_pass'];
		$cpass=$_POST['txt_cpass'];


		$errMsg="";
		if(empty($uname)||empty($lic)||empty($email)||empty($phone)||empty($pass)||empty($cpass)){
			$errMsg="Please Fill All fields";
		}elseif(!preg_match("/^[a-zA-Z0-9 ]*$/",$name)){
			$errMsg="Name must have letters and spaces";
		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $errMsg = "Invalid email format"; 
		}elseif(!preg_match("/^[0-9]*$/",$phone)){
			$errMsg="Please Enter 10 digit Mobile Number";
		}elseif($pass===$cpass){
			//query
			$qry="INSERT INTO `buyer`(`buyername`, `password`, `email`, `licenseno`, `mobileno`) 
				VALUES ('$uname','$pass','$email','$lic','$phone')";
		    $result=mysqli_query($conn,$qry);
			if($result==true){	
				$errMsg="Account Created Successfully !! Please Login..";	
				echo("<script>{ alert('".$errMsg."');
					window.location.replace('/project_adi/login_signup/login_buyer.php');
					} </script>");	
			}else{	
				$errMsg="Insertion FAIL";	
			}
		}else{
			$errMsg="Password Not Matched";
		}
		
		echo("<script>{ alert('".$errMsg."');
				window.location.replace('/project_adi/login_signup/signup_buyer.php');
				} </script>");	
	}

	//seller signup 
	if(isset($_POST['btn_seller_signup'])){
		$uname=$_POST['txt_username'];
		$pan=$_POST['txt_panno'];
		$email=$_POST['txt_email'];
		$phone=$_POST['txt_phone'];
		$pass=$_POST['txt_pass'];
		$cpass=$_POST['txt_cpass'];


		$errMsg="";
		if(empty($uname)||empty($pan)||empty($email)||empty($phone)||empty($pass)||empty($cpass)){
			$errMsg="Please Fill All fields";
		}elseif(!preg_match("/^[a-zA-Z0-9 ]*$/",$uname)){
			$errMsg="Name must have letters and spaces";
		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $errMsg = "Invalid email format"; 
		}elseif(!preg_match("/^[0-9]*$/",$phone)){
			$errMsg="Please Enter 10 digit Mobile Number";
		}elseif($pass===$cpass){
			//query
			$qry="INSERT INTO `seller`(`username`, `password`, `email`, `pancardno`, `mobileno`) 
				VALUES ('$uname','$pass','$email','$pan','$phone')";
		    $result=mysqli_query($conn,$qry);
			if($result==true){	
				$errMsg="Account Created Successfully !! Please Login..";	
				echo("<script>{ alert('".$errMsg."');
					window.location.replace('/project_adi/login_signup/login_seller.php');
					} </script>");	
			}else{	
				$errMsg="Insertion FAIL";	
			}
		}else{
			$errMsg="Password Not Matched";
		}
		
		echo("<script>{ alert('".$errMsg."');
				window.location.replace('/project_adi/login_signup/signup_seller.php');
				} </script>");	
	}

	//forgot buyer login 
	if(isset($_POST['btn_buyer_forgot'])){
		$uname=$_POST['txt_username'];
		//$pass=$_POST['txt_pass'];

		//query
		$qry="SELECT * FROM `buyer` WHERE buyername='$uname' or email='$uname'";
		//print_r($qry);
		$result=mysqli_query($conn,$qry);
		if(mysqli_num_rows($result)>0){
			foreach ($result as $row) {
				session_start();
				$otp=generate_otp();
				$_SESSION['forgot_id']=$row['buyerid'];
				$_SESSION['forgot_table']='buyer';
				$mobile=$row['mobileno'];
			}
			echo("<script>{ alert('OTP : ".$otp." sent to ".$mobile.". Valid till 10 MINUTES');
					sessionStorage.setItem('otp', '".$otp."');
					window.location.replace('/project_adi/login_signup/new_password.php');
			} </script>");	
		}else{
			echo("<script>{ alert('Invalid Email/Username');
					window.location.replace('/project_adi/login_signup/forgot_buyer.php');
				} </script>");	
		}
	}

	//forgot seller login 
	if(isset($_POST['btn_seller_forgot'])){
		$uname=$_POST['txt_username'];
		//$pass=$_POST['txt_pass'];

		//query
		$qry="SELECT * FROM `seller` WHERE username='$uname' or email='$uname'";
		//print_r($qry);
		$result=mysqli_query($conn,$qry);
		if(mysqli_num_rows($result)>0){
			foreach ($result as $row) {
				session_start();
				$otp=generate_otp();
				$_SESSION['forgot_id']=$row['userid'];
				$_SESSION['forgot_table']='seller';
				$mobile=$row['mobileno'];
			}
			echo("<script>{ alert('OTP : ".$otp." sent to ".$mobile.". Valid till 10 MINUTES');
					sessionStorage.setItem('otp', '".$otp."');
					window.location.replace('/project_adi/login_signup/new_password.php');
			} </script>");	
		}else{
			echo("<script>{ alert('Invalid Email/Username');
					window.location.replace('/project_adi/login_signup/forgot_seller.php');
				} </script>");	
		}
	}

	//generate otp
	function generate_otp(){
		$otp=rand(1000,10000);
		$_SESSION['otp']=$otp;
		return $otp;
	}

	//verify pass
	if(isset($_POST['btn_new_pass'])){
		$id=$_POST['txt_id'];
		$otp=$_POST['txt_otp'];
		$pass=$_POST['txt_pass'];
		$cpass=$_POST['txt_cpass'];
		$errMsg="";
		if(!session_start()) session_start();
		if($_SESSION['otp']==$otp){
			if($pass===$cpass){
				$table=$_SESSION['forgot_table'];
				if($table=='buyer')
					$qry="UPDATE $table SET password='".$pass."' WHERE buyerid=".$id;
				else
					$qry="UPDATE $table SET password='".$pass."' WHERE userid=".$id;
				//require("connection.php");
				//print_r($qry);
				if(mysqli_query($conn,$qry)){
					//echo $id."-".$otp."-".$pass."-".$cpass;
					$errMsg="Password Changed Successfully !!";
					if($table=='buyer'){
						echo("<script>{ alert('".$errMsg."');
							window.location.replace('/project_adi/login_signup/login_buyer.php');
						} </script>");		
					}elseif($table=='seller'){
						echo("<script>{ alert('".$errMsg."');
							window.location.replace('/project_adi/login_signup/login_seller.php');
						} </script>");		
					}			
				}else 
					$errMsg="password not Changed";			
			}else{
				$errMsg="Password Not Matched !!";
			}
		}else{
			$errMsg="Invalid OTP !!";
		}
		echo("<script>{ alert('".$errMsg."');
					window.location.replace('/project_adi/login_signup/new_password.php');
				} </script>");	
	}
?>