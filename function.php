<?php 
include_once "db_connection.php";


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

function AllEmployee($conn,$query){  
	 
	$result = mysqli_query($conn,$query);
	$count = 0;
	   $data = array();
	   while ( $row = mysqli_fetch_array($result)){
	       $data[$count] = $row;
		$count++;
	   }
	   return $data;	
}


function emp_count($conn){
	
	$q1 = "SELECT * FROM employee_table";
	$q2 = mysqli_query($conn,$q1);
	$total_rows = mysqli_num_rows($q2);
	return $total_rows;
	
	}



//function to find all department

function getDepartment($conn){                           
$result=mysqli_query($conn,"SELECT * FROM department_detail WHERE 1=1");	
if(mysqli_num_rows($result)>0)
{	
	while($row=mysqli_fetch_assoc($result)){
 		$role[]=$row;										 
		}
		}	                                                        
	else{
		
		$role[]=0;
		}
	
   return $role;
   
}
	


function Employee($conn,$query){
	$q1 = mysqli_query($conn, $query);
	return $q1;
}




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  if($data!=''){
	  
  }
  return $data;
}


//function to validate department

function validate_dep($conn){

	$department  = $_POST['department'];
	$error=[];

    if(empty($_POST['department'])){
        $error[]="Department Is Required";
        
    }elseif ($sql = "SELECT * FROM department_table WHERE department ='$department'") {
        $result =mysqli_query ($conn,$sql);  
        if(mysqli_num_rows($result)> 0){
           $error[]= 'Department already Exist';   
        } else{
            $department = test_input($_POST["department"]);

            if (!preg_match("/^[a-zA-Z ]*$/",$department)){
            $error[] = "Only letters allowed";
            } 
        } 
    }
    return $error;
}



//function to validate role

function validate_role($conn){

	$role  = $_POST['role'];
	$error=[];

    if(empty($_POST['role'])){
        $error[]="Role Is Required";
        
    }elseif ($sql = "SELECT * FROM role_table WHERE role ='$role'") {
        $result =mysqli_query ($conn,$sql);  
        if(mysqli_num_rows($result)> 0){
           $error[]= 'Role already Exist';   
        } else{
            $role = test_input($_POST["role"]);

            if (!preg_match("/^[a-zA-Z ]*$/",$role)){
            $error[] = "Only letters allowed";
            } 
        } 
    }
    return $error;
}



//Function to validate client

function validate_client($conn){
	
	$error=[];

		if (empty($_POST["first_name"])) {
			$error[] = "First Name is required";
			} else {
			$first_name = test_input($_POST["first_name"]);
			
			if (!preg_match("/^[a-zA-Z]*$/",$first_name)){
			$error[] = "Only letters allowed";
			}
		}	

		
		if (empty($_POST["last_name"])) {
			$error[] = "Last Name is required";
			} else {
			$last_name = test_input($_POST["last_name"]);
			
			if (!preg_match("/^[a-zA-Z]*$/",$last_name)){
			$error[] = "Only letters allowed";
			}
		}
		
		
		if (empty($_POST["age_name"])) {
			$error[] = "Agency Name is required";
			} else {
			$age_name = test_input($_POST["age_name"]);
			
			if (!preg_match("/^[a-zA-Z]*$/",$age_name)){
			$error[] = "Only letters allowed";
			}
		}
		
		
		if (empty($_POST["contact"])) {
			$error[] = "Contact No. is required";
			} else {
			$contact = test_input($_POST["contact"]);

		}
		
		
		if (empty($_POST["country"])) {
			$error[] = "Country Name is required";
			} else {
			$country = test_input($_POST["country"]);
			
			if (!preg_match("/^[a-zA-Z]*$/",$country)){
			$error[] = "Only letters allowed";
			}
		}				
					

		if(empty($_POST["email"])){
			$error[] = "Email is required";
			}elseif($sql = "SELECT * FROM client_table WHERE email ='".$_POST["email"]."'"){
					$result =mysqli_query ($conn,$sql);
					if(mysqli_num_rows($result)> 0){
						$error[]= 'email is used';
						}else{
							$email = test_input($_POST["email"]);
							if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
								$error[] = "Invalid email format";
								}
							}
				}
		


		if (empty($_POST["joining_date"])) {
			$error[] = "joining is required";
			} else {
			$joining_date = test_input($_POST["joining_date"]);
		}
		

		
		if (empty($_POST["department"])) {
			$error[] = "department is required";
			} else {
			$department = test_input($_POST["department"]);
			}		  

		return $error;

	}
	


//function to validate employee

function validate_emp($conn){
	$error=[];
	

		
		if (empty($_POST["first_name"])) {
			$error[] = "First Name is required";
			} else {
			$first_name = test_input($_POST["first_name"]);
			
			if (!preg_match("/^[a-zA-Z]*$/",$first_name)){
			$error[] = "Only letters allowed";
			}
		}	

		
		if (empty($_POST["last_name"])) {
			$error[] = "Last Name is required";
			} else {
			$last_name = test_input($_POST["last_name"]);
			
			if (!preg_match("/^[a-zA-Z]*$/",$last_name)){
			$error[] = "Only letters allowed";
			}
		}	

		
		if (empty($_POST["joining_date"])) {
			$error[] = "joining is required";
			} else {
			$joining_date = test_input($_POST["joining_date"]);
		}
		
		
		if (empty($_POST["emp_id"])) {
			$error[] = "employee id is required";
			} else {
			$emp_id = test_input($_POST["emp_id"]);
		   }						
			
	
		
		if (empty($_POST["dob"])) {
			$error[] = "DOB is required";
			} else {
			$dob = test_input($_POST["dob"]);
			}

		
		if (empty($_POST["department"])) {
			$error[] = "department is required";
			} else {
			$department = test_input($_POST["department"]);
			}		  

		if (empty($_POST["role"])) {
			$error[] = "Select role";
			} else {
			$role = test_input($_POST["role"]);
			}
			
		

			
		if (empty($_POST["password1"])) {
			$error[] = "Enter password";
			} else {
			$password1 = test_input($_POST["password1"]);
			}
								  
		if (empty($_POST["password2"])) {
			$error[] = "Confirm password";
			} else {
			$password2 = test_input($_POST["password2"]);
			}	
	
		if ($_POST["password1"] !== $_POST["password2"]) {
			$error[] = 'Password or Confirm password should match!';
			}else{
			$password1 = test_input($_POST["password1"]);
			}	
			
			
		if(empty($_POST["email"])){
			$error[] = "Email is required";
			}elseif($sql = "SELECT * FROM employee_table WHERE email ='".$_POST["email"]."'"){
					$result =mysqli_query ($conn,$sql);
					if(mysqli_num_rows($result)> 0){
						$error[]= 'email is used';
						}else{
							$email = test_input($_POST["email"]);
							if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
								$error[] = "Invalid email format";
								}
							}
				}
							
		
		return $error;
	
	}


//function to update employee

function update_emp($conn){
	$error=[];
	

		
		if (empty($_POST["first_name"])) {
			$error[] = "First Name is required";
			} else {
			$first_name = test_input($_POST["first_name"]);
			
			if (!preg_match("/^[a-zA-Z]*$/",$first_name)){
			$error[] = "Only letters allowed";
			}
		}	

		
		if (empty($_POST["last_name"])) {
			$error[] = "Last Name is required";
			} else {
			$last_name = test_input($_POST["last_name"]);
			
			if (!preg_match("/^[a-zA-Z]*$/",$last_name)){
			$error[] = "Only letters allowed";
			}
		}	

		
		if (empty($_POST["joining_date"])) {
			$error[] = "joining is required";
			} else {
			$joining_date = test_input($_POST["joining_date"]);
		}
		
		
		if (empty($_POST["emp_id"])) {
			$error[] = "employee id is required";
			} else {
			$emp_id = test_input($_POST["emp_id"]);
		   }						
			
	
		
		if (empty($_POST["dob"])) {
			$error[] = "DOB is required";
			} else {
			$dob = test_input($_POST["dob"]);
			}

		
		if (empty($_POST["department"])) {
			$error[] = "department is required";
			} else {
			$department = test_input($_POST["department"]);
			}		  

		if (empty($_POST["role"])) {
			$error[] = "Select role";
			} else {
			$role = test_input($_POST["role"]);
			}	
			

				
		if(empty($_POST["email"])){
			$error[] = "Email is required";
			}elseif($sql = "SELECT * FROM employee_table WHERE email ='".$_POST["email"]."'"){
					$result =mysqli_query ($conn,$sql);
					if(mysqli_num_rows($result)> 0){
						$error[]= 'email is used';
						}else{
							$email = test_input($_POST["email"]);
							if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
								$error[] = "Invalid email format";
								}
							}
				}
		
		
				
		return $error;
	
	}


function pagination($conn){
	
	
	$q1 = "SELECT * FROM `employee_table`";
	$result = mysqli_query($conn,$q1);
	$rowcount = mysqli_num_rows($result);

	$record_per_page = 6;
	$all_emp=emp_count($conn);

	$total_page=ceil($all_emp/$record_per_page);

	if(isset($_GET["page"]) && $_GET["page"]!=1)
	{
		$start_no = ($_GET["page"]-1)*$record_per_page;
		}
		else{
			$start_no=0;
		}

	return $start_no;


	}
	
	







?>



