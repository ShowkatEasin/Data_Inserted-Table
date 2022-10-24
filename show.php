<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-Operation</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

<body>


    
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-16" offset-md-5>
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
              include "functions.php";
              $data = show();
             while( $array = $data-> fetch_assoc()){
                echo "<tr>

                <td>".$array["student_id"]."</td>
                <td>".$array["studentName"]."</td>
                <td>".$array["fName"]."</td>
                <td>".$array["mName"]."</td>
                <td>".$array["email"]."</td>
                <td>".$array["status"]."</td>
                <td><a href='edit.php?id=".$array["student_id"]." class='btn btn-info btn-sm'><i class='fa-sharp fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='edit.php?id=".$array["student_id"]." class='btn btn-danger btn-sm'><i class='fa-sharp fa-solid fa-trash'></i></a></td>

                </tr>";  
             }
             

              ?>

            </table>
            </div>
        </div>
    </div>


</body>
</html