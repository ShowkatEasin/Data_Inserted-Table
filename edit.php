<?php

include "functions.php";
$id = $_GET['id'];
$data = findData($id);
$allData =$data->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-Operation</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
<body>


    
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8" offset-md-3>

           <a href="show.php" class="btn btn-info"> Show Data</a>

            <form method="POST">

                <div class="form-group mt-3 ">
                    <label for="studentName">Student Name</label>
                    <input id="studentName" type="text" class="form-control" name ="studentName" value="<?php echo $allData["studentName"]?>">
                </div>
                <div class="form-group mt-3">
                    <label for="fName">Father's Name</label>
                    <input id="fName" type="text" class="form-control" name="fName" value="<?php echo $allData["fName"]?>">
                </div>
                <div class="form-group  mt-3">
                    <label for="mName">Mother's Name</label>
                    <input id="mName" type="text" class="form-control" name="mName" value="<?php echo $allData["mName"]?>">
                </div>
                <div class="form-group  mt-3">
                    <label for="email">Email Address</label>
                    <input id="email" type="text" class="form-control" name="email" value="<?php echo $allData["email"]?>">
                </div>

                <div class="form-group  mt-3">
                    <label for="status">Status</label>

                    <select name="status" id="status" class="form-control" >

                        <?Php

                        if($allData["status"]==1){
                            echo  '<option value="1"> Active </option>';
                            
                        }
                        else{
                            echo '<option value="2">Inactive</option>';
                        }
                        
                        ?>
                        <option value="1"> Active </option>
                        <option value="2">Inactive</option>
                        
                    </select>
                </div>
                <button name="send" class="btn btn-success mt-3">Send</button>

                </form>
            </div>
        </div>
    </div>
</body>
</html