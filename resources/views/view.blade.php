<!DOCTYPE html>
<html>
	<head>
		<title>{{$title or 'default'}}</title>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>{{$posts->title}}</h1>
		<label>{{$posts->content}}</label><br>
		<a href="../post">回上一頁</a>
	</body>
</html>