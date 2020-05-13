@extends('site.layouts.default')

@section('content')
	<h1>登入</h1>
	<form action="login" method="POST">
		@csrf
		<label>Email</label><br>
		<input type="email" name="email" id="email" required><br>
		<label>Password</label><br>
		<input type="password" name="pwd" id="pwd" required><p>
		<input type="submit" id="submit" value="Login">
	</form>
@stop