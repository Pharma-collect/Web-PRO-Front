<!DOCTYPE html>
<head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('/')}}/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{url('/')}}/assets/img/favicon.png">
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
            height: 350px;
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
            color: #fff!important;
            background-color: #81aa66!important;
            border-color: #81aa66!important;
            margin-top: 1em;
            margin-bottom: 2em;
            width: 100%;
        }
        .text-info {
            color: #81aa66!important;
        }

        .error-login {
            color: red!important;
        }

        .error-login-container{
            text-align: center;
        }
    </style>


</head>


<body>
<div id="login">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="{{ url('/admin/connexion') }}" method="POST">
                        @csrf
                        <h3 class="text-center text-info">Pharma-Collect</h3>

                        @if(!$success_connect)
                            <div class="error-login-container">
                                <span class="error-login">* Identifiants incorrects</span>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="username" class="text-info">LOGIN</label><br>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon "><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="username" id="username"  />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">MOT DE PASSE</label><br>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon "><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Connexion">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

