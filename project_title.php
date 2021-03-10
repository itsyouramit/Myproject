<?php 
session_start();
if(!isset($_SESSION["ROLE"])){
	header("location:login.php");
    die();
	}
	
	
include_once "function.php";	

if(isset($_POST["login"])){
	
	if($insert_project = insert_project($conn)){
	echo '<script>alert ("Data Inserted sucessfully")</script>';
	}else{
		echo '<script>alert ("failed")</script>';
		}
	
	}
	

?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<!--header script-->
	<?php include "header_script.php"; ?>
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
                        
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Project Details</li>
                        </ol>
					<div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-3">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-2">Project Details</h3></div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Project Name</label>
                                                        <input class="form-control py-2" id="inputFirstName" type="text" 
                                                        placeholder="should be in drop down" name="project_name" />   
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Client Name</label>
                                                        <input class="form-control py-2" id="inputLastName" type="text" 
                                                        placeholder="client name" name="client_name" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Start Date</label>
                                                        <input class="form-control py-2" id="inputFirstName" type="Date" 
                                                        name="start_date" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Upwork ID</label>

                                                        <input class="form-control py-2" id="inputLastName" type="text" 
                                                       value="<?php echo $id_count; ?>" placeholder="Upwork Id" 
                                                       name="upwork_id" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Hired By</label>
                                                        <input class="form-control py-2" id="inputFirstName" type="text" 
                                                        placeholder="Enter first name" name="hired_by" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Biding Department</label>
                                                        <select name="bid_dep" class="form-control py-2">
                                                            <option value="">Department</option>
                                                                <option value="PHP">PHP</option>
                                                                <option value=".NET">.NET</option>
                                                                <option value="iOS">iOS</option>
                                                               
      
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName" >Country</label>
														<input class="form-control py-2" id="inputFirstName" type="text" 
                                                        placeholder="country" name="country" />                                                      
                                                    </div>
                                                </div>    

                                            </div>

                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Project Manager</label>
                                                <input class="form-control py-2" id="inputEmailAddress" type="text" aria-describedby="emailHelp" 
                                                placeholder="Project Manager" name="project_manager" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Team Leader</label>
                                                        <input class="form-control py-2" id="inputPassword" type="text" 
                                                        placeholder="Team Leader" name="team_leder" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Site URL</label>
                                                        <input class="form-control py-2" id="inputConfirmPassword" type="text" 
                                                        placeholder="URL" name="url" />
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" name="submit" value="Login" class="btn btn-primary btn-block">
                                    <div>
                                        <?php echo $nameError; ?>
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
			<!-- footer start  -->
			<?php include_once "footer_script.php"; ?> 
    </body>
</html>
