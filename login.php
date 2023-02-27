<?

	include('common.php'); 
    // login page 해당 페이지 바로 가도록 url창에 복붙하면 바로 해당 페이지로 가도록 하기 위해서
	$url = $_GET['url'];


	//로그인 페이지
	@session_start();
	
	if (isset($_SESSION['t_id'])) {
			
		echo ("<script language='javascript'>window.location.replace('index.php');</script>");

	}else if (!isset($_SESSION['t_id'])){ 
        echo ('');
    }


	// if ($_SESSION['t_id'] != '') {
			
	// 	echo ("<script language='javascript'>window.location.replace('index.php');</script>");

	// }
		
?>	

<!DOCTYPE html>
<html>

<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Manager</title>
	
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	<link rel="stylesheet" href="<? echo $host;?>/css/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<? echo $host;?>/css/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<? echo $host;?>/css/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<? echo $host;?>/css/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<? echo $host;?>/css/plugins/iCheck/square/blue.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
</head>

<script type="text/javascript">
	
	function login() {
		
		var t_id = $('#t_id').val();
		var t_pw = $('#t_pw').val();
	
		if (!t_id) {
			alert("아이디를 입력해주세요."); return;
		}
		if (!t_pw) {
			alert("패스워드를 입력해주세요."); return;
		}
	
		$('#frm_login').submit();
	}

</script>

<body class="hold-transition login-page">
	
	<div class="login-box">
		
		<div class="login-logo">
			<a href="<?php echo $host;?>/index.php"><b>Manager</b></a>
		</div>
		
		<div class="login-box-body">
			

			<form action="<?echo $host;?>/function/login_action.php" method="post" id="frm_login">
				
				<input type="hidden" id="url" name="url" value="<?echo $url;?>"/>
				
				<div class="form-group has-feedback">
					
					<input type="text"  class="form-control" name="t_id" id="t_id" placeholder="아이디">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				
				</div>
				  
				<div class="form-group has-feedback">
				
					<input type="password" class="form-control" placeholder="비밀번호" name="t_pw" id="t_pw" onkeyup="if(window.event.keyCode==13){login();}">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				
				</div>
				
				<div class="row">
	   
					<div class="col-xs-4" style="width: 100%;">
			<a href="javascript:login();" class="btn btn-primary btn-block btn-flat">로그인</a>
					</div>
				
				</div>
			
			</form>

		</div>
	
	</div>

	<script src="<? echo $host;?>/css/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<? echo $host;?>/css/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<? echo $host;?>/css/plugins/iCheck/icheck.min.js"></script>
	
	<script>
		
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%'
			});
		});
		
	</script>

</body>

</html>