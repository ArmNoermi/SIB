<!-- <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/dist/img/Dokumen.ico" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/custom.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/iCheck/square/blue.css">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-box-body">
            <form action="<?= site_url('auth/process'); ?>" method="post">
                <h1>
                    <center><img src="<?= base_url(); ?>assets/dist/img/logoSI.png" width="100px"> </center>
                </h1>
                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    
                    <input type="text" class="form-control" name="username" placeholder="Username..." required autofocus>
                </div>
                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                   
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <button type="submit" name="login" class="btn">Sign In</button>
            </form>
        </div>
    </div>
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url(); ?>assets/index2.html"><b>Berkas</b>DTI</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Silakan ketik Username dan Password</p>

            <form action="<?= site_url('auth/process'); ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" placeholder="Username..." required autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8"></div>
                    <div class="col-xs-4">
                        <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
   

   
    <script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  
    <script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  
    <script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
    <!-- <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/login/images/icons/favicon.ico"/> -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/dist/img/Dokumen.ico" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?= base_url(); ?>assets/login/images/9.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
            <center><img src="<?= base_url(); ?>assets/dist/img/silverSI.png" width="220px"></center>
				<span class="login100-form-title p-b-20">
					BERKAS DTI
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="<?= site_url('auth/process'); ?>" method="post">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username..." required>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password..." required>
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="submit" name="login">
							Sign in
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="<?= base_url(); ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url(); ?>assets/login/vendor/animsition/js/animsition.min.js"></script>
	<script src="<?= base_url(); ?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url(); ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/login/vendor/select2/select2.min.js"></script>
	<script src="<?= base_url(); ?>assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url(); ?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="<?= base_url(); ?>assets/login/vendor/countdowntime/countdowntime.js"></script>
	<script src="<?= base_url(); ?>assets/login/js/main.js"></script>

</body>
</html>