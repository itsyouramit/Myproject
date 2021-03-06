<?php 
session_start();
include_once "db_connection.php";
//include_once "function.php";


error_reporting(0);
if(!isset($_SESSION["ROLE"])){
	header("location:login.php");
    die();
	}
	
	
// fetching data from department table

$Q1 = "SELECT * FROM `department_table`";
$result1 = mysqli_query($conn,$Q1);
$count1 = mysqli_num_rows($result1);

// fetching data from role table 

$Q2 = "SELECT * FROM `role_table`";
$result2 = mysqli_query($conn,$Q2);
$count2 = mysqli_num_rows($result2);



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



if(isset($_POST["submit"])){
	
	$first_name 	= 	validatation(ucwords($_POST["first_name"]),text);
    $last_name		= 	validatation(ucwords($_POST["last_name"]),text);
    $joining_date 	= 	validatation($_POST["joining_date"],text);
    $emp_id 		= 	validatation($_POST["emp_id"],text);
    $dob 			= 	validatation($_POST["dob"],text);
    $department 	= 	validatation($_POST["department"],text);
    $role 			= 	validatation($_POST["role"],);
    $email 			= 	validatation($_POST["email"],'email');
    $password1 		= 	validatation($_POST["password1"],'password');
    $password2		= 	validatation($_POST["password2"],'password');  
         
	
	$pwd = password_hash($password1, PASSWORD_BCRYPT);
	$cpwd = password_hash($password1, PASSWORD_BCRYPT);	
	
	/*
	if(!empty($first_name) && !empty($last_name) && !empty($joining_date) && !empty($emp_id) && !empty($dob) && !empty($department) 
	&& !empty($role) && !empty($email) && !empty($pwd) && !empty($cpwd) )
	
	{
	
	}else{
			$ErrorMsg = "All fields are required"; 	
			}  */
			
			
			
	
		  
	if($password1 === $password2){
		
	$q1 = "INSERT INTO `employee_table` (`firstname`, `lastname`, `joining_date`, `emp_id`, `dob`, `department`, `role`, `email`, `password1`, `password2`) 
	VALUES ('$first_name','$last_name','$joining_date','$emp_id','$dob','$department','$role','$email','$pwd','$cpwd')";
	$q2 = mysqli_query($conn, $q1);
	
		if($q2){
		echo '<script>alert("Department Created Successfully ")</script>'; 	
		}
		
	} else{
		$passErr = "passwords not matched";
		echo '<script>alert("Failed to create  ")</script>';
		}
	
}	


	
 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>WizeBrain Family</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">
        <!-- navigation bar -->
        <?php include "navbar.php"; ?>
        
        <!-- sidenav-->
        <div id="layoutSidenav">
           <?php include "leftsidenav.php"; ?>  
			<!-- sidecontent-->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">

					<div class="container" style="margin-top:40px;">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-3">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-2">Create New Employee</h3></div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">First Name</label>
                                                           
                                                        <input class="form-control py-2" id="inputFirstName" type="text" 
                                                        placeholder="Enter first name" name="first_name" />
                                                     
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Last Name</label>
                                                        
                                                        <input class="form-control py-2" id="inputLastName" type="text" 
                                                        placeholder="Last Name" name="last_name" />
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Date of joining *</label>
                                                        
                                                        <input class="form-control py-2" id="inputFirstName" type="Date" 
                                                        name="joining_date" />
                                                         
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Employee ID*</label>
                                                        
                                                        <input class="form-control py-2" id="inputLastName" type="text" 
                                                        placeholder="Employee ID" name="emp_id"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Date of Birth*</label>
                                                       
                                                        <input class="form-control" id="inputFirstName" type="Date" 
                                                         name="dob" />
                                                    </div>
                                                </div>
                                             
                                             <div class="col-md-4">
												<div class="form-group">
													<label class="small mb-1" for="inputLastName">Department*</label>
													
													<select class="form-control" name="department" required >
														department:
														<option class="hidden"  selected disabled>Department</option>														

														<?php for($i=1;$i<=$count1;$i++){
															$data = mysqli_fetch_assoc($result1);?>
														
														<option name="catagory" value="<?php echo $data["id"];?>"><?php echo $data["department"];?></option>
														<?php } ?>
														
													</select>
												</div>
                                             </div>
                                             
                                             <div class="col-md-4">
												<div class="form-group">
													<label class="small mb-1" for="inputLastName">Select Role*</label>
													
													<select class="form-control" name="role" required>
														role:
														<option class="hidden"  selected disabled>Role</option>
														
														<?php for($j=1;$j<=$count2;$j++){
															$data2 = mysqli_fetch_assoc($result2);
															?>														
															<option name="catagory" value="<?php echo $data2["id"];?>" ><?php echo $data2["role"]; ?></option>
															<?php } ?>
														
													</select>
												</div>
                                             </div>
                                      
                                            </div>

                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email*</label>
                                                
                                                <input class="form-control py-2" id="inputEmailAddress" type="email" aria-describedby="emailHelp" 
                                                placeholder="Enter email address" name="email" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Password*</label>
                                                       
                                                        <input class="form-control py-2" id="inputPassword" type="password" 
                                                        placeholder="Enter password" name="password1"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password*</label>
                                                        
                                                        <input class="form-control py-2" id="inputConfirmPassword" type="password" 
                                                        placeholder="Confirm password" name="password2"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-2 mb-2">
												<div class="col-md-12">
													<input type="submit" value="Create Employee" class="btn btn-primary btn-block" name="submit">												
												</div>
												
                                            </div>
                                        </form>
                                      
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                </main>
                  <div>
					<?php echo $ErrorMsg;?><br>
					<?php echo $nameErr1;?><br>
					<?php echo $nameErr2;?><br>
					<?php echo $dateErr; ?><br>
					
					<?php echo $idErr;?><br>
					<?php echo $dobErr;?><br>
					<?php echo $depErr; ?><br>
					<?php echo $rolErr;?><br>
					<?php echo $emailErr;?><br>
					<?php echo $passErr;?>
				</div>
                <!-- footer start  -->
                <?php include "footer.php"; ?> 

            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
