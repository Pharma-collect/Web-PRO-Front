<!DOCTYPE html>
<head>
<meta charset="utf-8">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
body {
  margin: 0;
  padding: 0;
  background-color: #81aa66;
  height: 100vh;
}
#register .container #register-row #register-column #register-box {
  margin-top: 120px;
  max-width: 600px;
  height: 600px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#register .container #register-row #register-column #register-box #register-form {
  padding: 20px;
}
#register .container #register-row #register-column #register-box #register-form #register-link {
  margin-top: -85px;
}

#register-box{
    border-radius: 5%;
}

.btn {
color: #fff;
background-color: #81aa66;
border-color: #81aa66;
width: 10em;
}

#position {
    display: flex;
align-items: center;
justify-content: center;
}

.text-info {
    color: #81aa66!important;
}

</style>
</head>



<body>
    <div id="register">
        <div class="container">
            <div id="register-row" class="row justify-content-center align-items-center">
                <div id="register-column" class="col-md-6">
                    <div id="register-box" class="col-md-12">
                        <form id="register-form" class="form" action="{{ url('register') }}" method="POST">
                        @csrf
                            <h3 class="text-center text-info">Register</h3>
                            
                            <div class="form-group">
                                <label for="firstname" class="text-info">Your FirstName</label><br>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								        <input type="text" class="form-control" name="firstname" id="firstname"  placeholder="Enter your FirstName"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lastname" class="text-info">Your LastName</label><br>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								        <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Enter your LastName"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="text-info">Your Email</label><br>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
							            <input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                                     </div> 
                                </div>
                            </div>
                            

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
                                <label for="confirm-password" class="text-info">Confirm Password</label><br>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Confirm your Password">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="position">
                                <div class="form-group">
                                
                                    <input type="submit" name="submit" class="btn" value="submit">
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
</body>
</html>