<!DOCTYPE html>
<html>
<head>
<base href="{{asset('public/layout/backend')}}/">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng ký</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
#navbar{
	margin-top:50px;}
#tbl-first-row{
	font-weight:bold;}
#logout{
	padding-right:30px;}		
</style>
</head>
<body>

<div class="container">
 
<div class="container">
    <div class="row">
    	<div class="col-xs-4 col-xs-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
        	<form method="POST">
                @csrf
                <fieldset>
                    @include('error.note')
                    <legend>Register</legend>
            	<div class="form-group">
                	<label>Username</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Fullname" required />
                </div>
                <div class="form-group">
                	<label>Email</label>
                    <input type="text" name="mail" class="form-control" placeholder="Email" required />
                </div>
                <div class="form-group">
                	<label>Mật khẩu</label>
                    <input type="password" name="pass" class="form-control" placeholder="Password" required />
                </div>
                <div class="form-group">
                	<label>Nhập lại mật khẩu</label>
                    <input type="password" name="re_pass" class="form-control" placeholder="Password" required />
                </div>
                <div class="form-group">
                    <p class="small tp">Đăng ký đồng nghĩa với bạn đã đống ý Điều Khoản dịch vụ & Và Chính Sách Bảo Mật Của Chúng Tôi</p>
                </div>
                <input type="submit" name="submit" value="Đăng ký" class="btn btn-primary" />
            </fieldset>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
