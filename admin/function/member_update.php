<? 

    include_once('../../dbCon.php');

    $connect = connect();

     
    $t_no =$_GET['t_no'];
    $t_pw =$_GET['t_pw'];
    $t_name = $_GET['t_name'];
    $t_phone = $_GET['t_phone'];
    $t_rank = $_GET['t_rank'];
    $t_access = $_GET['t_access'];
    $t_team = $_GET['t_team'];
    
    $update = "update adm_member set t_pw = '$t_pw', t_name = '$t_name', t_phone = '$t_phone', t_rank = '$t_rank', t_access = '$t_access', t_team ='$t_team' where t_no = '$t_no'";

    mysqli_query($connect,$update);

    echo '200'


?>