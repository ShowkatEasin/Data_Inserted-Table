<?php 

	$connection = new mysqli("localhost","root","","batch05_CRUD");
		
	function insert($fromData){
		global $connection;
		$studentName = $fromData['studentName'];
		$fName = $fromData['fName'];
		$mName = $fromData['mName'];
		$email = $fromData['email'];
		$status = $fromData['status'];
		if($studentName==""){
			echo '<div class="alert alert-danger"><strong>Error : </strong>Name Field is Empty</div>';
		}
		elseif($fName==""){
			echo '<div class="alert alert-danger"><strong>Error : </strong>Fathers Name Field is Empty</div>';
		}
		elseif($mName==""){
			echo '<div class="alert alert-danger"><strong>Error : </strong>Mothers Name Field is Empty</div>';
		}
		elseif($email==""){
			echo '<div class="alert alert-danger"><strong>Error : </strong>Email Field is Empty</div>';
		}
		elseif($status==""){
			echo '<div class="alert alert-danger"><strong>Error : </strong>Status Field is Empty</div>';
		}
		else{
			
			$emailChecker = checkEmail($email);
			if ($emailChecker == true) {
				echo '<div class="alert alert-warning"><strong>Warning:</strong>This Email already exist</div>';
			}
			else{
				$stm="INSERT INTO tbl_student(studentName,fName,mName,email,status)VALUES('$studentName','$fName','$mName','$email','$status')";

				$result = $connection->query($stm);
				if ($result) {
					echo '<div class="alert alert-success"><strong>Success : </strong>Data Saved</div>';
				}
				else{
					echo '<div class="alert alert-danger"><strong>Error : </strong>Data Not Saved</div>';
				}
			}
			
		}
	}

	function show(){
		global $connection;
		$stm = "SELECT * FROM tbl_student";
		$data = $connection->query($stm);
		return $data;
	}

	function checkEmail($email){
		global $connection;
		$stm = $connection->query("SELECT email FROM tbl_student WHERE email = '$email'");
		
		if ($stm->num_rows > 0) {
		 	return true;
		 } 
		 else{
		 	return false;
		 }
	}

	function findData($id){
		global $connection;
		$stm = $connection->query("SELECT * FROM tbl_student WHERE student_id = '$id'");
		
		return $stm;
	}

	function updateData($id, $formData){
		global $connection;
		$studentName = $formData['studentName'];
		$fName = $formData['fName'];
		$mName = $formData['mName'];
		$email = $formData['email'];
		$status = $formData['status'];

		$stm = $connection->query("UPDATE tbl_student SET studentName='$studentName', fName = '$fName', mName = '$mName', email= '$email', status='$status' WHERE student_id = '$id'");
		if ($stm) {
			header("location: show.php");
		}
		else{
			echo '<div class="alert alert-danger"><strong>Error:</strong>Data Not Updated</div>'; 
		}
	}

	function deleteData($id){
		global $connection;
		$stm = $connection->query("DELETE FROM tbl_student WHERE student_id = '$id'");
		if ($stm) {
			header("location: show.php");
		}
	}

	function Active($id){
		global $connection;
		$stm = $connection->query("UPDATE tbl_student SET status='1' WHERE student_id = '$id'");
		if ($stm) {
			header("location: show.php");
		}
	}
	
	function Inactive($id){
		global $connection;
		$stm = $connection->query("UPDATE tbl_student SET status='2' WHERE student_id = '$id'");
		if ($stm) {
			header("location: show.php");
		}
	}
