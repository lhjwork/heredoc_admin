<?  
 
 include('../common.php')

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

        function reDirectLoginPage() {


            // 세가지 다 현재 URL 정보를 얻는스크립트입니다.
            // document.URL // document.location  // document.location.href 
            // document.location = "http://daum.net";
            // document.location.href = "http://naver.com";
            // 이 두개는 W3C에 따르면 동일합니다. 입력과 동시에 입력한 주소로 이동하게 됩니다.
            
            document.location.replace('<?echo $host;?>/login.php?url=<?echo urlencode($host);?>');
        }


    </script>


    <?


// session_start() 함수는 세션 아이디가 이미 존재하는지를 확인하고, 존재하지 않으면 새로운 아이디를 만듭니다.
// 만약 이미 존재하는 세션 아이디가 있을 때는 원래 있던 세션 변수를 다시 불러와서 사용할 수 있도록 합니다.

    @session_start();

    // 세션 변수의 등록
    // 이때 세션 변수의 이름이 키값이 되며, 이 내용은 서버 측에 저장됩니다.
    // 등록된 세션 변수는 등록을 해지하지 않는 한 세션이 끝날 때까지 유지됩니다.
    // $_SESSION["city"] = "부산"; // 세션 변수의 등록

    // 세션 변수에 접근하기
    // 생성된 세션 변수는 $_SESSION["세션변수이름"]으로 접근할 수 있습니다.

    // echo "제가 살고 있는 도시는 {$_SESSION['city']}입니다.<br>";
    // print_r($_SESSION); // 모든 세션 변수의 정보를 연관 배열 형태로 보여줌.


    if(isset($_SESSION['t_id']) || $_SESSION['t_id'] == '' ){
         
       echo ("<script language='javascript'>reDirectLoginPage();</script>");
    }else {
        
        include('../connect.php');

        $connect = connect();

        $t_member_id = $_SESSION['t_id'];

        $select = "select t_name, t_phone, t_rank, t_access, t_team, from adm_member where t_id = $t_member_id";
        $result = mysqli_query($connect, $select);
        $row = mysqli_fetch_array($result);

        $t_member_name = $row['t_name'];
		$t_member_phone = $row['t_phone'];
		$t_member_rank = $row['t_rank'];
		$t_member_access = $row['t_access'];
		$t_member_team = $row['t_team'];
		

    }



    ?>