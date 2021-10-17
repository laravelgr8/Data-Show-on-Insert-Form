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
	<div class="row">
		<div class="col-xl-12"><a href="/empform" class="btn btn-info" style="float: right;">Emp Form</a></div>
	</div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th><th>Name</th><th>Address</th><th>Gender</th><th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $list)
			<tr>
				<td>{{$list->eid}}</td>
				<td>{{$list->name}}</td>
				<td>{{$list->address}}</td>
				<td>{{$list->gender}}</td>
				<td><a href="/empform/{{$list->eid}}" class="btn btn-info">View</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</body>
</html>