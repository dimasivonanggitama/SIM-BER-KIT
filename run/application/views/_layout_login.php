<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<?php
 $ip = $this->input->ip_address();
 if($ip == '127.0.0.1'){
 $this->config->set_item('base_url','http://127.0.0.1/run/');
 }else{
 $this->config->set_item('base_url','http://localhost/run/');
 }
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $app_info->app_name;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="<?php echo base_url();?>assets/arrow.ico" type="image/x-icon">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <script type="text/javascript">
var xmlHttp;
function srvTime(){
try {
    //FF, Opera, Safari, Chrome
    xmlHttp = new XMLHttpRequest();
}
catch (err1) {
    //IE
    try {
        xmlHttp = new ActiveXObject('Msxml2.XMLHTTP');
    }
    catch (err2) {
        try {
            xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
        }
        catch (eerr3) {
            //AJAX not supported, use CPU time.
            alert("AJAX not supported");
        }
    }
}
xmlHttp.open('HEAD',window.location.href.toString(),false);
xmlHttp.setRequestHeader("Content-Type", "text/html");
xmlHttp.send('');
return xmlHttp.getResponseHeader("Date");
}
var st = srvTime();
var date = new Date(st);
if(date.getHours() == 24){
  var link = document.createElement('link');
  link.rel = "stylesheet";
  link.href = "<?php echo base_url();?>assets/dist/css/AdminLTE.css";
  document.head.appendChild(link);
}
if(date.getHours() < 2){
  var link = document.createElement('link');
  link.rel = "stylesheet";
  link.href = "<?php echo base_url();?>assets/dist/css/AdminLTE.css";
  document.head.appendChild(link);
}
if(date.getHours() <= 8 && date.getHours() > 1){
  var link = document.createElement('link');
  link.rel = "stylesheet";
  link.href = "<?php echo base_url();?>assets/dist/css/AdminLTE.css";
  document.head.appendChild(link);
}
if(date.getHours() <= 10 && date.getHours() > 8){
  var link = document.createElement('link');
  link.rel = "stylesheet";
  link.href = "<?php echo base_url();?>assets/dist/css/AdminLTE.css";
  document.head.appendChild(link);
}
if(date.getHours() <= 12 && date.getHours() > 10){
  var link = document.createElement('link');
  link.rel = "stylesheet";
  link.href = "<?php echo base_url();?>assets/dist/css/AdminLTE.css";
  document.head.appendChild(link);
}
if(date.getHours() <= 15 && date.getHours() > 12){
  var link = document.createElement('link');
  link.rel = "stylesheet";
  link.href = "<?php echo base_url();?>assets/dist/css/AdminLTE.css";
  document.head.appendChild(link);
}
if(date.getHours() <=18  && date.getHours() > 15){
  var link = document.createElement('link');
  link.rel = "stylesheet";
  link.href = "<?php echo base_url();?>assets/dist/css/AdminLTE.css";
  document.head.appendChild(link);
}
if(date.getHours() <= 24 && date.getHours() > 18){
  var link = document.createElement('link');
  link.rel = "stylesheet";
  link.href = "<?php echo base_url();?>assets/dist/css/AdminLTE.css";
  document.head.appendChild(link);
}
</script>
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<!-- pace -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/pace-theme-corner-indicator.css"/>
</head>
<body class="hold-transition login-page">

<main>
<div id="particles-js"></div>
<?php
 $ip = $this->input->ip_address();
 print_r($ip);
 print_r(base_url());
 ?>
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url();?>"><?php echo $app_info->logo;?></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
	<div class="row">
		<div class="col-md-4 col-sm-6">
		<p class="login-box-msg">Masukkan username dan password untuk memulai session anda</p>
		<?php echo form_open('');?>
        <?php echo validation_errors();?>
        <?php echo !empty($this->session->flashdata('error'))?$this->session->flashdata('error').'<br><br>':'';?>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="username">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password"  name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-md-8">
            	<!-- <a href="<?php echo base_url('forgot_password');?>">I forgot my password</a> -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        <?php echo form_close();?>
		</div>
		<div class="col-md-8 col-sm-6">
			<hr>
				<p align="center">Selamat datang di <b>RUN</b></p>
				<div align="center">
					<img alt="" src="<?php echo base_url('assets/arrow.ico')?>" width="128px">
				</div>
			<hr>
				<div align="right">
					<strong>Copyright &copy; <?php echo date('Y');?> <a href="<?php echo $app_info->copy_right_link;?>"><?php echo $app_info->copy_right;?></a>.</strong> All rights reserved.
				</div>
		</div>
	</div>
  </div>
  <!-- /.login-box-body -->
</div>
</main>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- pace -->
<script src="<?php echo base_url();?>assets/dist/js/pace.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/jquery.ripples.js"></script>
<script>
  $(document).ajaxStart(function() { Pace.restart(); });
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
