<?php
	if (isset($_POST['submmit'])) {
		$img = $_FILES['tasin'];
		echo "<pre>";
		print_r($img);
		echo "</pre>";
	}

?>