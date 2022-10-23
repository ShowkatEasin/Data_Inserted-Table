<?php

function insert($studentName,$fName,$mName,$email,$status){
    $connection = new mysqli ("localhost","root","","batch05_php");
    $result = $connection->query("INSERT INTO tbl_student(studentName,fName,mName,email,status)
    VALUES('$studentName','$fName','$mName','$email','$status')");
    

    if ($result){
     echo '<div class="alert alert-success"><strong>Success : Data Saved</strong></div>';
    }
    else {
     echo '<div class="alert alert-danger"><strong>Error : Data Not Saved</strong></div>';
    }
}

?>