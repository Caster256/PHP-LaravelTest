<!DOCTYPE html>
<html>
<head>
	<title>upload_file_test</title>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		@csrf
		<input type="file" name="file_name" />
		<input type="submit" id="submit" name="submit" value="確認" />
	</form>
	<img src="{{url('storage/app/uploads/test.jpeg')}}" alt="" />
</body>
</html>