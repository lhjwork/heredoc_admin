<?

include('common.php'); 

?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Manager</title>
	
	<link rel="stylesheet" href="<?echo $host;?>/css/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?echo $host;?>/css/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?echo $host;?>/css/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?echo $host;?>/css/bower_components/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="<?echo $host;?>/css/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?echo $host;?>/css/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<?echo $host;?>/css/bower_components/morris.js/morris.css">
	<link rel="stylesheet" href="<?echo $host;?>/css/bower_components/jvectormap/jquery-jvectormap.css">
	<link rel="stylesheet" href="<?echo $host;?>/css/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?echo $host;?>/css/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="<?echo $host;?>/css/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="<?echo $host;?>/css/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="<?echo $host;?>/css/plugins/iCheck/all.css">
	<link rel="stylesheet" href="<?echo $host;?>/css/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
	<link rel="stylesheet" href="<?echo $host;?>/css/plugins/timepicker/bootstrap-timepicker.min.css">
	<link rel="stylesheet" href="<?echo $host;?>/css/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<?echo $host;?>/css/bower_components/fullcalendar/dist/fullcalendar.min.css">
	<link rel="stylesheet" href="<?echo $host;?>/css/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
	
	
	<script type="text/javascript">
			
		function fail() {
			
			document.location.replace('<?echo $host;?>/login.php?url=<?echo urlencode($host);?>');
			
		}
			
	</script>
	
	<?
		
		@session_start();
			
		if ($_SESSION['t_id'] == '') {
			
			echo("<script language='javascript'>fail();</script>");
		
		}
		
		include('dbCon.php'); 
		
		$connect = connect();
		
		$t_member_id = $_SESSION['t_id'];
		
		$select = "select t_name, t_phone, t_rank, t_access, t_team from adm_member where t_id = '$t_member_id'";
		$rs = mysqlI_query($connect, $select);	
		$row = mysqli_fetch_array($rs);		
		
		$t_member_name = $row['t_name'];
		$t_member_phone = $row['t_phone'];
		$t_member_rank = $row['t_rank'];
		$t_member_access = $row['t_access'];
		$t_member_team = $row['t_team'];
		
			
	?>	
