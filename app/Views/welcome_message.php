
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
		<meta name="generator" content="Hugo 0.88.1">
		<title>Login Page</title>

		<link href="<?php echo base_url(); ?>/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/plugins/thems/style.css" rel="stylesheet">
		<style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
			font-size: 3.5rem;
			}
		}
		.container-login{
			margin:0 auto;
			width: 410px;
			margin-top: 200px;
		}
		</style>
	</head>
  	<body>
		<div class="container-login">
			<?php if($message !='') { ?>
				<div class="alert alert-danger" role="alert">
					<?php echo $message; ?>
				</div>
			<?php } ?>

			<div class="card">
				<div class="card-header">
					Login Form
				</div>
				<div class="card-body">
					<form action="<?php echo site_url('auth/login') ?>" method="POST">
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Username</label>
							<input type="email" name="username" class="form-control">
						</div>
						<div class="mb-3">
							<label for="exampleInputPassword1" class="form-label">Password</label>
							<input type="password" name="password" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary">Login System</button>
					</form>
				</div>
			</div>
		</div>

		<script src="<?php echo base_url(); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	</body>
</html>