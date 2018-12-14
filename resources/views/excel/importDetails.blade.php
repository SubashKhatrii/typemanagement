<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
</head>
<body>
	<form action="postImport" method="post" enctype="multipart/form-data">
		 @csrf
		<input type="file" name="details">
		<input type="submit" value="import">
		



	</form>

</body>
</html>