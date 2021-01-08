<!DOCTYPE html>
<head>
    <title>Login</title>
<meta charset="utf-8">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
body {
  margin: 0;
  padding: 0;
  background-color: #81aa66;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}

#login-box{
    border-radius: 20px;
}

.btn-info {
color: #fff;
background-color: #81aa66;
border-color: #81aa66;
}

.text-info {
    color: #81aa66!important;
}

</style>


</head>


<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{ url('login') }}" method="POST">
                        @csrf
                            <h3 class="text-center text-info">Login</h3>
                           
                            <div class="form-group">
                            <label for="username" class="text-info">Your UserName</label><br>
                                <div class="cols-sm-10">
								<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
								</div>
							</div>
                            </div>
                            <div class="form-group">
                            <label for="password" class="text-info">Password</label><br>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="/register" class="text-info">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
