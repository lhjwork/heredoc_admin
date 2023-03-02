<?
	
	header('Content-Type: text/html; charset=UTF-8');
	
	include_once('../../dbCon.php');
	
	$connect = connect();
	
	$t_id = $_POST['t_id'];
	$t_pw = $_POST['t_pw'];
	$t_name = $_POST['t_name'];
    $t_phone = (isset($_POST['t_phone'])) && $_POST['t_phone'] ? $_POST['t_phone'] : ''; //
	$t_rank = $_POST['t_rank'];
	$t_access = $_POST['t_access'];
	
	$today_detail = date("Y-m-d H:i:s");


	$select_id = "SELECT t_id FROM adm_member WHERE t_id = '$t_id'";
	$result = mysqli_query($connect, $select_id);
	$row = mysqli_fetch_array($result);
    // $test = var_dump($row);
	if (is_null($row)) {
		
		$insert = "INSERT INTO adm_member(t_id, t_pw, t_name, t_phone, t_rank, t_access, t_team, t_date, t_ip) VALUES ('$t_id', '$t_pw', '$t_name', '$t_phone', '$t_rank', '$t_access','', '$today_detail', '');";
	    $result = mysqlI_query($connect, $insert);	


        if($result){
            echo "<script>alert('가입되었습니다.');window.location.replace('../member_insert.php');</script>";
		
        }else{
            echo "<script>alert(mysqli_connect_error(););window.location.replace('../member_insert.php');</script>";
		
        }
		
		
	}else{
		
		echo "<script>alert('이미 가입된 아이디입니다.');window.location.replace('../member_insert.php');</script>";
		
	}

	
	
?>