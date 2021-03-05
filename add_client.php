<?php 
session_start();
include_once "db_connection.php";
include_once "function.php";


if(!isset($_SESSION["ROLE"])){
	header("location:login.php");
    die();
	}
	
	
// fetching data from department table

$Q1 = "SELECT * FROM `department_table`";
$result1 = mysqli_query($conn,$Q1);
$count1 = mysqli_num_rows($result1);



$Q3 = "SELECT * FROM `employee_table`";
$result3 = mysqli_query($conn,$Q3);
$count3 = mysqli_num_rows($result3);

$count4 =$count3+1;



if ($_SERVER["REQUEST_METHOD"] == "POST"){

	$first_name 	= 	$_POST["first_name"];
    $last_name		= 	$_POST["last_name"];
    $joining_date 	= 	$_POST["joining_date"];
    $age_name 		= 	$_POST["age_name"];
    $contact 		= 	$_POST["contact"];
    $department 	= 	$_POST["department"];
    $country 		= 	$_POST["country"];
    $email 			= 	$_POST["email"];
   	
	
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
					

		
		//email
		if (empty($_POST["email"])) {
		$error[] = "Email is required";
		} 
		if($sql = "SELECT * FROM employee_table WHERE email ='$email'")
			$result =mysqli_query ($conn,$sql);

			if(mysqli_num_rows($result)> 0){
			$error[]= 'email is used';
		}
		else {
		$email = test_input($_POST["email"]);
		}			


		//join
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

				  
	
		if(sizeOf($error)<=0)
		{
			
		$q1 = "INSERT INTO `client_table`(`first_name`, `last_name`, `joining_date`, `age_name`, `contact`, `department`, `country`, `email`) 
		VALUES ('$first_name','$last_name','$joining_date','$age_name','$contact','$department','$country','$email')";
		$q2 = mysqli_query($conn, $q1);
			
			if($q2){
				echo '<script>alert ("Data Inserted sucessfully")</script>';
				}else{
					echo '<script>alert ("failed to register")</script>';
					}	
			
		} 
		else{
			$error[]="Error".mysqli_error($conn);
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
									
							<?php if(isset($error) && sizeOf($error)>0){ ?>
							<div class="error"> 
							<?php foreach($error as $error_message){ 
							echo $error_message."<br>";
							} ?>

							</div>
							<?php } ?>
									
									
                                    <div class="card-header"><h3 class="text-center font-weight-light my-2">Add Client</h3></div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">First Name</label>
                                                           
                                                        <input class="form-control py-2" id="inputFirstName" type="text" 
                                                        placeholder="Enter first name" name="first_name"  value="<?php echo $first_name;?>"/>
                                                     
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Last Name</label>
                                                        
                                                        <input class="form-control py-2" id="inputLastName" type="text" 
                                                        placeholder="Last Name" name="last_name"  value="<?php echo $last_name;?>"/>
                                                        
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
                                                        <label class="small mb-1" for="inputLastName">Agency Name*</label>
                                                        
                                                        <input class="form-control py-2" id="inputLastName" type="text" 
                                                        placeholder="Agency Name"   name="age_name" value="<?php echo $age_name;?>"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Contact*</label>
                                                       
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Contact" name="contact" 
                                                        value="<?php echo $contact;?>"/>
                                                    </div>
                                                </div>
                                             
                                             <div class="col-md-4">
												<div class="form-group">
													<label class="small mb-1" for="inputLastName">Department*</label>
													
													<select class="form-control" name="department" >
														department:
														<option class="hidden" value="">Department</option>														

														<?php for($i=1;$i<=$count1;$i++){
															$data = mysqli_fetch_assoc($result1);?>
														
														<option name="catagory" value="<?php echo $data["department"];?>"><?php echo $data["department"];?></option>
														<?php } ?>
														
													</select>
												</div>
                                             </div>
                                             
                                             <div class="col-md-4">
												<div class="form-group">
													<label class="small mb-1" for="inputLastName">Country*</label>
													
													<input class="form-control py-2" id="inputLastName" type="text" 
                                                        placeholder="Country Name"   name="country" value="<?php echo $country;?>"/>
												</div>
                                             </div>
                                      
                                            </div>

                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email*</label>
                                                
                                                <input class="form-control py-2" id="inputEmailAddress" type="email" aria-describedby="emailHelp" 
                                                placeholder="Enter email address" name="email" value="<?php echo $email;?>"/>
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







