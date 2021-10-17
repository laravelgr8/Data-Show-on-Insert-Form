<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <title>Home</title>
</head>
<body> 
    <div class="container">
        <div class="col-xl-6">
            <form method="post" action="/login">
                @csrf
                <div class="form-group">
                    <label>User Name : </label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password : </label>
                    <input type="text" name="password" class="form-control">
                </div>
                <input type="submit" value="Login" class="btn btn-info">
            </form>
        </div>
    </div>
</body>
</html>