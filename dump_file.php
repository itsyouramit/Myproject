<?php


	if(empty($first_name)||empty($last_name)||empty($joining_date)||empty($emp_id)||empty($dob)||empty($department)||
	empty($role)||empty($email)||empty($password1)||empty($password2)||$password1!=$password2)
	{
		$errmsg = "";
		
		if(empty($_POST["first_name"])){
			$errmsg .= "first name can't be empty";
			}
				
		if(empty($_POST["last_name"])){ 
            $errmsg .= "first name can't be empty";
        } 
        
		if(empty($_POST["joining_date"])){ 
            $errmsg .= "joining_date can't be empty";
        }
        
		if(empty($_POST["emp_id"])){ 
            $errmsg .= "emp_id can't be empty";
        }        
        
		if(empty($_POST["dob"])){ 
            $errmsg .= "dob can't be empty";
        } 
        
		if(empty($_POST["department"])){ 
            $errmsg .= "department can't be empty"; 
        }
        
		if(empty($_POST["role"])){ 
            $errmsg .= "role can't be empty";
        }  
              
		if(empty($_POST["email"])){ 
            $errmsg .= "email can't be empty"; 
        }
        
		if(empty($_POST["password1"])){ 
            $errmsg .= "password1 can't be empty"; 
        }  
		if(empty($_POST["password2"])){ 
            $errmsg .= "password2 can't be empty"; 
        }  

        if($_POST["password1"]!=$_POST["password2"]){ 
            $errmsg .= "Passwords don\'t match<br>"; 
        }			
		$errmsg.="<p>";	
			
			
	}else{
	
 			
			
			}
			
			
	if(isset($errmsg)){ 
    echo $errmsg; 
    unset($errmsg); 
	}	
	
		
}
	
	
  if (empty($_POST["first_name"])) {
    $nameErr1 = "first_name is required";
  } else {
    $first_name = test_input($_POST["first_name"]);
   
    if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
      $nameErr1 = "Only letters allowed";
    }
  }
  
  
    if (empty($_POST["last_name"])) {
    $nameErr2 = "last_name is required";
  } else {
    $last_name = test_input($_POST["last_name"]);
   
    if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
      $nameErr2 = "Only letters allowed";
    }
  }
  
  
  if (empty($_POST["joining_date"])) {
		$dateErr = "Joining date is required";
	  }	else{
			$joining_date = test_input($_POST["joining_date"]);
		  }				
			

	if (empty($_POST["emp_id"])) {
		$idErr = " Employee Id is required";
	  }	else{
			$emp_id = test_input($_POST["emp_id"]);
		  }
		  
	if (empty($_POST["dob"])) {
		$dobErr = "Date of Birth is required";
	  }	else{
			$dob = test_input($_POST["dob"]);
		  }
		  
	if (empty($_POST["department"])) {
		$depErr = "Select Department";
	  }	else{
			$department = test_input($_POST["department"]);
		  }
		  
	if (empty($_POST["role"])) {
		$rolErr = "Select role";
	  }	else{
			$role = test_input($_POST["role"]);
		  }
		  
		  
		  
	  if (empty($_POST["email"])) {
		$emailErr = "Email is required";
	  } else {
		$email = test_input($_POST["email"]);
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Invalid email format";
		}
	  }	
	  
	  	  
		  
	if (empty($_POST["password1"])) {
		$passErr = "password is required";
	  }	else{
			$password1 = test_input($_POST["password1"]);
		  }
		  
	if (empty($_POST["password2"])) {
		$cpassErr = "confirm password ";
	  }	else{
			$password2 = test_input($_POST["password2"]);
		  }
		  
  
	?>  

