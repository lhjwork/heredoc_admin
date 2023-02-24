
<? 

	@session_start(); 

?>

<html lang="ko">
	<head>
		<meta charset="UTF-8">
		<script type="text/javascript">
			
			function fail() {
				alert('제대로 된 아이디/비밀번호를 입력해주세요.');
				history.go(-1);
			}
			
		</script>

	</head>
</html>

<?

	include('../dbCon.php');
	
	$connect = connect();
	
    // 어디서 전달 되는지 모르겟슴
	$url = $_POST['url'];
    
	$t_id = $_POST['t_id'];
	$t_pw = $_POST['t_pw'];
	
	$today_detail = date("Y-m-d H:i:s");
	
	$select_id = "SELECT t_id FROM adm_member WHERE t_id = '$t_id'";
	$result = mysqli_query($connect, $select_id);
	$row = mysqli_fetch_array($result);
		
	if ($row['t_id'] == '') {
		
		echo("<script language='javascript'>fail();</script>"); 
		
	}else{
		
		$select_pw = "SELECT t_pw FROM adm_member WHERE t_id = '$t_id'";
		$result = mysqli_query($connect, $select_pw);
		$row = mysqli_fetch_array($result);

		if ($row['t_pw'] == $t_pw) {
				
			$_SESSION['t_id'] = $t_id;
			
			$update = "update adm_member set t_login_date = '$today_detail', t_ip = '{$_SERVER["REMOTE_ADDR"]}' WHERE t_id = '$t_id'";
			mysqli_query($connect, $update);
			
			if($url == ''){
				
				echo "<script>window.location.replace('../index.php');</script>";
			
			}else{
			
				echo "<script>window.location.replace('".$url."');</script>";
			
			}
				
		} else {
			
			echo("<script language='javascript'>fail();</script>"); 
			
		}
	
	}


?>