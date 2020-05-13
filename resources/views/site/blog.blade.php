<!DOCTYPE html>
<html>
	<head>
		<title>{{ $title or 'Default' }}</title>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap-theme.min.css">
		<style type="text/css">
			#title {
				text-align: center;
				font-size: 50px;
			}
			.li {
				font-size:25px;
			}
			#posts_tab {
				width: 100%;
			}
			#header_posts {
				text-align: center;
				font-size: 25px;
			}
			#insert_post {
				width:50%;
				height:145px;
				overflow:auto;
				border:0px silver solid;
			}
		</style>
	</head>
	<body>
		<div id="title">{{ $title }}</div>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">新增文章</button>
		<div id="insert_post">	
			@if (isset($posts))
				<ol id="ol">
				@foreach ($posts as $item)
					<li class="li">
						<a href="post/{{$item->id}}">{{$item->title}}</a>
						<a href="post/{{$item->id}}/edit">(編輯)</a>
					</li>
				@endforeach
				</ol>
			@endif
		</div>

		<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		  	<div class="modal-dialog modal-sm" role="document">		  		
		    	<div class="modal-content">
		    		<!--<form action="post" method="POST" id="posts_form">-->
		    		<form action="" method="POST" id="posts_form">
		    			{{ csrf_field() }}
		    			 <!--<input type="hidden" name="_token" value="{{ csrf_token() }}"> CSRF令牌 -->
			      		<div class="modal-header">
				  			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  			<div id = header_posts><label>新增文章</label></div>
				  		</div>
				  		<div class="modal-body">					    	
					    	<table id="posts_tab" class="table" border="0">
					    		<tr>
					    			<td width="25%"><label for="posts_title">標題</label></td>
					    			<td>
					    				<input type="text" id="posts_title" name="title" required>
					    			</td> 				
					    		</tr>
					    		<tr>
					    			<td><label for="content">內容</label></td>
					    			<td>
					    				<textarea id="content" name="content" rows="4" cols="25" required>
					    				</textarea>
					    			</td>
					    		</tr>
					    	</table>					    	
					    </div>
					    <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        <button type="button" id="submit" class="btn btn-primary">儲存文章</button>
					    </div>
					</form>
			    </div>
		    		
			</div>
		</div>
		<hr>
		<div id="posts_view"></div>
		<div class="alert alert-danger error" hidden="true">
		    <ul id="err_info">
		    </ul>
		</div>

		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		{{--<script type="text/javascript" src="js/jquery.validate.min.js"></script>--}}
		<script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(function() {
				$('#submit').click(function () {
					let values = {};
					$('#posts_form :input').not(":submit").each(function() {
						let $input = $(this);
						let name = $input.attr('name');
						let value = $input.val();
						values[name] = value;
					});
					$.ajax({
					   	type:'POST',
					    url:"{{asset('post/post_ajax')}}",
					    data:{values:values},
					    dataType:'json',
					    headers: {
				           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				        },
					    success:function(data) {
					    	if(data.status === 'success') {
					    		let li = '';
					    		$('.error').attr('hidden',true);
					    		$('#err_info').empty();
					    		li += '<li class="li">';
					    		li += '<a href="post/' + data.id + '">' + data.title + '</a>';
					    		li += '<a href="post/' + data.id + '/edit"> (編輯)</a>';
					    		li += '</li>';
					    		$('#ol').append(li);
					    		$('.modal').modal('hide');
					    	}
					    },
					    error:function(data) {
					    	let errors = data.responseJSON;
        					//console.log(errors);
        					let list = errors.errors;
        					$.each(list, function(index,array) {
        						//console.log(array);
        						$('#err_info').append('<li>' + array + '</li>')
        					});
        					$('.error').attr('hidden',false);
        					$('.modal').modal('hide');
					    }
					});
				});
			});
		</script>
	</body>
</html>