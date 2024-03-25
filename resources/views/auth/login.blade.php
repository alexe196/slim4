<!DOCTYPE html>
<head>
    <title>Login Two</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">
    <link href="/public/login-layout/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/public/login-layout/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/public/login-layout/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
    <link href="/public/login-layout/css/bootstrap-social.css" rel="stylesheet" type="text/css">
    <link href="/public/login-layout/css/templatemo_style.css" rel="stylesheet" type="text/css">

</head>
<body class="templatemo-bg-image-1">
<div class="container">
    <div class="col-md-12">
        <form class="form-horizontal templatemo-login-form-2" role="form" method="POST" action="/login">
            <div class="row">
                <div class="col-md-12">
                    <h1>Login</h1>
                </div>
            </div>
            <div class="row">
                <div class="templatemo-one-signin col-md-6">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="username" class="control-label">Email</label>
                            <div class="templatemo-input-icon-container">
                                <i class="fa fa-user"></i>
                                <input type="email"
                                       id="email"
                                       class="form-control is-invalid "
                                       name="email"
                                       placeholder="Email Address"
                                       value=""
                                       required
                                       autocomplete="email"
                                />

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="password" class="control-label">Password</label>
                            <div class="templatemo-input-icon-container">
                                <i class="fa fa-lock"></i>
                                <input type="password" id="password" class="form-control is-invalid " name="password" placeholder="Password" required autocomplete="current-password" />

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-warning">Login</button>
                        </div>
                    </div>
                </div>
                <div class="templatemo-other-signin col-md-6">
                    <label class="margin-bottom-15">
                        One-click sign in using other services. Credit goes to <a rel="nofollow" href="http://lipis.github.io/bootstrap-social/">Bootstrap Social</a> for social sign in buttons.
                    </label>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>

