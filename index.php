<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
<body>


    
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6" offset-md-3>

            <?php

            include "functions.php";

     if(isset($_POST["send"])){

        
        $studentName = $_POST['studentName'];
        $fName = $_POST['fName'];
        $mName = $_POST['mName'];
        $email = $_POST['email'];
        $status = $_POST['status'];

        if( $studentName ==""){
            echo '<div class="alert alert-success"><strong>Success : Data Saved</strong></div>';
        }
        

       /*  $insert = "INSERT INTO tbl_student(studentName,fName,mName,email,status)
        VALUES('$studentName','$fName','$mName','$email','$status')";
 */
      /*  $statements = "INSERT INTO tbl_student(studentName,fName,mName,email,status)VALUES('$studentName','$fName','$mName','$email','$status')";
 */   

       if($studentName==""){

        echo '<div class="alert alert-danger"><strong>Name Field is Empty</strong></div>';
       }
       elseif ($fName==""){
        echo '<div class="alert alert-danger"><strong>Fathers Name is Empty</strong></div>';
       }
       elseif ($mName==""){
        echo '<div class="alert alert-danger"><strong>Mothers Name is Empty</strong></div>';
       }
       elseif ($email==""){
        echo '<div class="alert alert-danger"><strong>Email field is Empty</strong></div>';
       }
       elseif ($status==""){
        echo '<div class="alert alert-danger"><strong>Select Status</strong></div>';
       }
       else
       {
        insert($studentName,$fName,$mName,$email,$status);
    }

     }

    ?>



            <form method="POST">

                <div class="form-group ">
                    <label for="studentName">Student Name</label>
                    <input id="studentName" type="text" class="form-control" name="studentName">
                </div>
                <div class="form-group mt-3">
                    <label for="fName">Father's Name</label>
                    <input id="fName" type="text" class="form-control" name="fName">
                </div>
                <div class="form-group  mt-3">
                    <label for="mName">Mother's Name</label>
                    <input id="mName" type="text" class="form-control" name="mName">
                </div>
                <div class="form-group  mt-3">
                    <label for="email">Email Address</label>
                    <input id="email" type="text" class="form-control" name="email">
                </div>

                <div class="form-group  mt-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">--Select Status--</option>
                        <option value="1">Active</option>
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