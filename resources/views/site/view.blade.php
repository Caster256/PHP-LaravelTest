@extends('site.layouts.default')

@section('content')
		<h1>{{$posts->title}}</h1>
		<label>{{$posts->content}}</label><br>
		<a href="../post">回上一頁</a>
@stop