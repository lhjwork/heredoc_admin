<? 
 include_once('../../dbCon.php');

 $t_status = $_POST['t_status'];
 $current_status = $_GET['status'];


 $sql_insert = "INSERT INTO adm_status_$current_status (t_status) values('$t_status')";
 $rs = mysqli_query($connect, $sql_insert);
 
 echo '200';

?>