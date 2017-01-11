<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>DevOOPS</title>
		<meta name="description" content="description">
		<meta name="author" content="Evgeniya">
		<meta name="keyword" content="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?php echo base_url() ?>statics/plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<link href="<?php echo base_url() ?>statics/css/style_v1.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
<div class="container-fluid">
	<div id="page-login" class="row">
		<form name="frmlogin" method="post" action="users-login">
			<div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
				<div class="box">
					<div class="box-content">
						<div class="text-center">
							<h3 class="page-header">Login Page</h3>
						</div>
						<div class="form-group">
							<label class="control-label">Username</label>
							<input type="text" class="form-control" name="username" />
						</div>
						<div class="form-group">
							<label class="control-label">Password</label>
							<input type="password" class="form-control" name="password" />
						</div>
						<div class="text-center">
							<!--<a href="users-login" class="btn btn-primary">Sign in</a>-->
							<input type="submit" name="login" value="Sign in" class="btn btn-primary">
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</script>
</body>
</html>