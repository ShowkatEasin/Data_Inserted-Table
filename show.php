<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
	

<div class="container">
        <div class="row mt-5">
           
		

				<?php 
					include "functions.php";
					if (isset($_GET['id'])) {
						$id =$_GET['id'];
						deleteData($id);
					}

					if (isset($_GET['active'])) {
						$id =$_GET['active'];
						Active($id);
					}
					if (isset($_GET['inactive'])) {
						$id =$_GET['inactive'];
						Inactive($id);
					}

				?>

          <a href="index.php"class=" mb-3 btn btn-info"> Add Data</a>
            <table class="table" border ="1">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Student Name</th>
                        <th>Fathers Name</th>
                        <th>Mothers Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
					<?php 
						
						$data = show();
						$sl=1;

						while ($array = $data->fetch_assoc()) {
							if ($array["status"]==1) {
								$status ="<a href='show.php?inactive=".$array["student_id"]."' class='btn btn-success btn-sm'>Active</a>";	
							}
							else{
								$status ="<a href='show.php?active=".$array["student_id"]."' class='btn btn-warning btn-sm'>Inactive</a>";
							}
							echo "<tr>
								<td>".$sl."</td>
								<td>".$array["studentName"]."</td>
								<td>".$array["fName"]."</td>
								<td>".$array["mName"]."</td>
								<td>".$array["email"]."</td>
								<td>".$status."</td>
								
								<td><a href='edit.php?id=".$array["student_id"]."' class='btn btn-info btn-sm'><i class='fa fa-edit'></i></a></td>
								<td><button class='btn-sm btn btn-danger' data-bs-toggle='modal' data-bs-target='#delete".$array['student_id']."'><i class='fa fa-trash'></i></button></td>
							</tr>"; ?>


							<!-- Modal -->
<div class="modal fade" id="delete<?php echo $array["student_id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure want to delete this Data ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a href="show.php?id=<?php echo $array["student_id"]; ?>" type="button" class="btn btn-primary">Confirm</a>
      </div>
    </div>
  </div>
</div>
					<?php $sl++;	}
					?>
				</table>	
			
		</div>
	</div>




	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
</body>
</html>	