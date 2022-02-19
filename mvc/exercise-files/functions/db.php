<?php
	$conn = mysqli_connect("localhost","root","","login_db");

	function row_count($result){
		return mysqli_num_rows($result);
	}

	function escape($string){
		global $conn;
		return mysqli_real_escape_string($conn,$string);
	}

	function query($query){
		global $conn;
		return mysqli_query($conn,$query);
	}

	function confirm($result){
		global $conn;
		if(!$result){
			die("QUERY FAILED");
		}
	}

	function fetch_array($result){
		global $conn;
		return mysqli_fetch_array($result);
	}

?>