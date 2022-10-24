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

    $connection = new mysqli ("localhost","root","","batch05_php");

    $stm = "SELECT * FROM  tbl_student";
    $data = $connection->query($stm);

    return $data;

}