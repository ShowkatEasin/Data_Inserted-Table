<?php

function insert($fromData){
    $connection = new mysqli ("localhost","root","","batch05_php");
    
    $studentName = $fromData["studentName"];
    $fName = $fromData['fName'];
    $mName = $fromData['mName'];
    $email = $fromData['email'];
    $status= $fromData['status'];
    
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



    $emailChecker = checkEmail($email);
    if($emailChecker == true){
        echo '<div class="alert alert-warning"><strong>This Email already exist</strong></div>';
    }

        else{

        $stm = "INSERT INTO tbl_student(studentName,fName,mName,email,status)
         VALUES('$studentName','$fName','$mName','$email','$status')";
   

            $result = $connection->query($stm);

    if ($result){
     echo '<div class="alert alert-success"><strong>Success : Data Saved</strong></div>';
    }
    else {
     echo '<div class="alert alert-danger"><strong>Error : Data Not Saved</strong></div>';
    }

   }
}








function show(){

    global $connection;
    $connection = new mysqli ("localhost","root","","batch05_php");
    $stm = "SELECT * FROM  tbl_student";
    $data = $connection->query($stm);

    return $data;

}

function checkEmail($email){
    global $connection;
    $connection = new mysqli ("localhost","root","","batch05_php");
    $stm = $connection->query("SELECT email FROM  tbl_student WHERE email ='$email'");
    if($stm ->num_rows > 0)
    {
    return true;
   }
   else{
    false;
   }
}

   function findData($id){
    global $connection;
    $connection = new mysqli ("localhost","root","","batch05_php");

    $stm = $connection->query("SELECT * FROM  tbl_student WHERE student_id ='$id'");

 return $stm;
}

function findName($sName){
    global $connection;
    $connection = new mysqli ("localhost","root","","batch05_php");

    $stm = $connection->query("SELECT * FROM  tbl_student WHERE studentName ='$sName'");

 return $stm;
}

function updateData($id, $formData){
    global $connection;
    $studentName = $formData["studentName"];
    $fName = $formData['fName'];
    $mName = $formData['mName'];
    $email = $formData['email'];
    $status= $formData['status'];

     // UPDATE tbl_student SET field name = value WHERE id =value 

      /* $stm = $connection-> query 
      ("UPDATE tbl_student SET studentName='$studentName',
      fName='$fName',mName='$mName', email='$email' status='$status' WHERE student_id = '$id'"); 
 */
      $stm = $connection->query
      ("UPDATE tbl_student SET studentName='$studentName',
      fName ='$fName',mName ='$mName', email= '$email', status='$status' WHERE student_id = '$id'");


    if($stm){
        header("location: show.php");
    }
    else{

        echo '<div class="alert alert-danger"><strong>Error : Data Not Update</strong></div>';
    }

  
}
