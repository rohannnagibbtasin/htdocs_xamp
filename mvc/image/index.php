<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="" method="POST" id="sumit_form">
		<input type="file" name="file" id="upload_file">
		<input type="submit" value="Submit" name="submit" id="upload_btn">

	</form>

	<div id="image_preview"></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		jQuery(document).ready(()=>{
			$("#sumit_form").on("submit",(e)=>{
				e.preventDefault();
				let data = new FormData(this);
				$.ajax({
					url:"upload.php",
					method:"POST",
					data:data,
					contentType:"multipart/form-data",
					processData:false,
					success:(data)=>{
						$("#image_preview").html(data);
						$("#upload_file").val('');
					}
				}) 
			})
		})

	</script>
</body>
</html>