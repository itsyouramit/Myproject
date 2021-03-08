<?php
session_start();
include "db_connection.php";
$q1 = "SELECT * FROM `department_table`";
$result = mysqli_query($conn,$q1);
$rowcount = mysqli_num_rows($result);

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
                        <h1 class="mt-4" style="text-align:center;">All Department</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Department List</li>
                        </ol>


							<table class="table">
							  <thead >
								<tr>
								  <th scope="col">Serial No</th>
								  <th scope="col">Department Name</th>
								  <th scope="col">Update</th>
								  <th scope="col">Delete</th>								  
								</tr>
							  </thead>
							  <tbody>
							     <?php
									$count=1;
									for($i=1; $i<=$rowcount; $i++){
									$rows = mysqli_fetch_array($result); ?>
										<tr>
											<td><?php echo $count;?></td>
											<td><?php echo $rows["department"]?></td>
										<td ><btn><a  class="btn btn-primary" href="update_dep.php?id=<?php echo $rows["id"];?>&dep=<?php echo $rows["department"]?>">Update</a></btn></td>							
										
										<td ><btn><a  class="btn btn-danger" href="delete_dep.php?id=<?php echo $rows["id"];?>"onclick="conf_delete()">Delete</btn></td>
											
										</tr>
										
									<?php 
									$count++;
										} 
									?>
							  </tbody>
							</table>

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
