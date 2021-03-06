<?php 

//function to find all rows of department
function AllDepartment($conn,$query){  
	 
	$result = mysqli_query ($conn,$query);
	$count = 0;
	   $data = array();
	   while ( $row = mysqli_fetch_array($result)){
	       $data[$count] = $row;
		$count++;
	   }
	   return $data;	
}

//function to find all rows of Role
function AllRole($conn,$query){  
	 
	$result = mysqli_query($conn,$query);
	$count = 0;
	   $data = array();
	   while ( $row = mysqli_fetch_array($result)){
	       $data[$count] = $row;
		$count++;
	   }
	   return $data;	
}


// convert illegal input value to ligal value formate
function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}



function validation($data){
	
$valid = $fnameErr = $lnameErr = $emailErr = $passErr = $cpassErr = '';
$set_firstName = $set_lastName = $set_email = '';  



   $validName="/^[a-zA-Z ]*$/";
   $validEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
   $uppercasePassword = "/(?=.*?[A-Z])/";
   $lowercasePassword = "/(?=.*?[a-z])/";
   $digitPassword = "/(?=.*?[0-9])/";
   $spacesPassword = "/^$|\s+/";
   $symbolPassword = "/(?=.*?[#?!@$%^&*-])/";
   $minEightPassword = "/.{8,}/";
	
	
	
	//  First Name Validation
	if(empty($_POST["first_name"])){
	   $fnameErr="First Name is Required"; 
	}
	else if (!preg_match($validName,$_POST["first_name"])) {
	   $fnameErr="Digits are not allowed";
	}else{
	   $fnameErr=true;
	}
	
	
	//  Last Name Validation
	if(empty($_POST["last_name"])){
	   $lnameErr="Last Name is Required"; 
	}
	else if (!preg_match($validName,$_POST["last_name"])) {
	   $lnameErr="Digits are not allowed";
	}
	else{
	   $lnameErr=true;
	}
	
	
	//Email Address Validation
	if(empty($_POST["email"])){
	  $emailErr="Email is Required"; 
	}
	else if (!preg_match($validEmail,$_POST["email"])) {
	  $emailErr="Invalid Email Address";
	}
	else{
	  $emailErr=true;
	}	
	
	//Joining date validation
	if(empty($_POST["joining_date"])){
		$dateErr = "Joining date is required";
	}else{
		$dateErr=true;
		}


	if (empty($_POST["emp_id"])) {
		$idErr = " Employee Id is required";
	  }	else{
			$idErr=true;
		  }
		  
		  

	if (empty($_POST["dob"])) {
		$dobErr = "Date of Birth is required";
	  }	else{
			$dob=true;
		  }
		  
	if (empty($_POST["department"])) {
		$depErr = "Select Department";
	  }	else{
			$department=true;
		  }
		  
	if (empty($_POST["role"])) {
		$rolErr = "Select role";
	  }	else{
			$role=true;
		  }

		  	
	
	// password validation 
	if(empty($_POST["password1"])){
	  $passErr="Password is Required"; 
	} 
	elseif (!preg_match($uppercasePassword,$password1) || !preg_match($lowercasePassword,$password1) || !preg_match($digitPassword,$password1) || !preg_match($symbolPassword,$password1) || !preg_match($minEightPassword,$password1) || preg_match($spacesPassword,$password1)) {
	  $passErr="Password must be at least one uppercase letter, lowercase letter, digit, a special character with no spaces and minimum 8 length";
	}
	else{
	   $passErr=true;
	}
	
	
	// form validation for confirm password
	if($_POST["password2"]!=$_POST["password1"]){
	   $cpassErr="Confirm Password doest Matched";
	}
	else{
	   $cpassErr=true;
	}
	
}


?>
