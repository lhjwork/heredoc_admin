<?

	include_once('../../dbCon.php');
	
	$connect = connect();
	
	$t_no_array = $_GET['t_no_array'];
	$t_call = $_GET['t_call'];
	
	for($i = 0; $i < count($t_no_array); $i++){
	
		$t_no =  $t_no_array[$i];
			
		$update = "update adm_db set t_call = '$t_call' where t_no = '$t_no'";
		mysqli_query($connect, $update);
			
		
	}
		
	echo '200';
	
?>