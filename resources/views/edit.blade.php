<!DOCTYPE html>
<html>
	<head>
		<title>{{$title or 'default'}}</title>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>編輯文章</h1>
		<form action="../../post/{{$posts->id}}" method="POST">
			<!--{{ method_field('PUT') }}{{ csrf_field() }}-->
			{{ method_field('PUT') }}
			{{ csrf_field() }}
			<table border="0" style="width:50%;">
				<tr>
					<td><label for="posts_title">標題</label></td>
					<td>
						<input type="text" id="posts_title" name="posts_title" value="{{$posts->title}}" required>
					</td> 				
				</tr>
				<tr>
					<td><label for="content">內容</label></td>
					<td>
						<textarea id="content" name="content" rows="4" cols="25" required>
							{{$posts->content}}
						</textarea>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="儲存">
					</td>
					<td>
						<input type="button" id="delete" value="刪除">
					</td>
				</tr>
			</table>	
		</form>
		<a href="../../post">回上一頁</a>

		<script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript">
			$(function() {
				$("#delete").click(function() {
					document.location.href="../../post/delete/{{$posts->id}}";
				});
			});
		</script>
	</body>
</html>