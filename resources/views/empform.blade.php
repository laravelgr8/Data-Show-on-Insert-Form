<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
</head>
<body>
<div class="container"><br><br>
	<div class="col-xl-6">
		<h3>Employee Form</h3>
		@if(Session::has('msg'))
		{{Session('msg')}}
		@endif
		<form method="post" action="/formsubmit">
			@csrf
			<div class="form-group">
				<label>Name : </label>
				<input type="text" name="name" @if(!empty($data[0]->name)) value='{{$data[0]->name}}' @endif class="form-control">
			</div>
			<div class="form-group">
				<label>Address : </label>
				<input type="text" name="address" @if(!empty($data[0]->address)) value='{{$data[0]->address}}' @endif class="form-control">
			</div>
			<div class="form-group">
				<label>Gender :  </label>
				<input type="radio" name="gender" value="Male" @if(!empty($data[0]->gender=='Male')) {{'checked'}} @endif > Male
				<input type="radio" name="gender" value="Female" @if(!empty($data[0]->gender=='Female')) {{'checked'}} @endif> Female
			</div>
			<div class="form-group">
				<label>Department : </label>
				<select name="department[]" multiple class="form-control">
					@foreach($department as $dep)
					<option value="{{$dep->id}}" {{@in_array($dep->id,$list)? 'selected':'' }}>{{$dep->depart}}</option>
					@endforeach
				</select>
			</div>
			<input type="submit" class="btn btn-success">
		</form>
	</div>
</div>
</body>
</html>