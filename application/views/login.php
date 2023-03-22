<link href="<?php echo base_url()?>Asset/Css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="<?php echo base_url()?>Asset/Js/bootstrap.min.js"></script>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
    
<head>
	<title>LOGIN APP PENERIMAAN BEASISWA</title>
	<link rel="stylesheet" href="<?php echo base_url()?>Asset/Css//bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="<?php echo base_url()?>Asset/Js/jquery-3.1.0.js"></script>
	<link rel="stylesheet" href="<?php echo base_url()?>Asset/Css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

	<style type="text/css" media="screen">
			body, html {
			margin: 0;
			padding: 0;
			height: 100%;
			background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('Asset/images/logo3.jpg');
			background-size: cover;
			background-repeat: no-repeat;
		}
		.user_card {
			height: 400px;
			width: 350px;
			margin-right: 70%;
			margin-top: auto;
			margin-bottom: auto;
			background-color: rgba(0,0,0,0.4) !important;
			position: relative;
			display: flex;
			justify-content: center;
			flex-direction: column;
			padding: 10px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 5px;

		}
		.brand_logo_container {
			position: absolute;
			height: 170px;
			width: 170px;
			top: -75px;
			border-radius: 50%;
			
			padding: 10px;
			text-align: center;
		}
		.brand_logo {
			height: 150px;
			width: 150px;
			border-radius: 50%;
			
		}
		.form_container {
			margin-top: 100px;
		}
		.login_btn {
			width: 100%;
			background: #c0392b !important;
			color: white !important;
		}
		.login_btn:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.login_container {
			padding: 0 2rem;
		}
		.input-group-text {
			background: #c0392b !important;
			color: white !important;
			border: 0 !important;
			border-radius: 0.25rem 0 0 0.25rem !important;
		}
		.input_user,
		.input_pass:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
			background-color: #c0392b !important;
		}
	</style>
</head>
<!--Coded with love by Mutiullah Samim-->
<body>

	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="<?php echo base_url()?>/Asset/images/logo1.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form   method="post"  action="<?php echo base_url()?>login/proses">
						<div class="input-group mb-2">
							 <?php echo $this->session->flashdata('Pesan'); ?> 
						</div>
						
						<div class="input-group mb-3">
							<div class="input-group-append">
								<!-- <span class="input-group-text"><i class="fas fa-user"></i></span> -->
							</div>
							<input type="text" name="username" required="" class="form-control input_user" value="" placeholder="username">
						</div>

						<!-- <div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<select name="jabatan" required="requreid" class="form-control">
							<option >Jabatan</option>
							<option value="Admin">Admin</option>
							<option value="Staf">Staf</option>
							<option value="BPD">BPD</option>
							</select>
							
						</div> -->


						<div class="input-group mb-2">
							<div class="input-group-append">
								
							</div>
							<input type="password" name="password" required="" class="form-control input_pass" value="" placeholder="password">
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">
							<input type="submit" class="btn btn-success mt-3" name="login" value="SIGN IN">
						</div>
					</form>
				</div>
				
			
			</div>
		</div>
	</div>
</body>
</html>
