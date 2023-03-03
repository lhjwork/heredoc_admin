<? 


include_once('../../dbCon.php');

$current_status = $_GET['status'];
$t_no = $_GET['t_no'];
$t_name = $_GET['t_name'];

$sql_updqte = "UPDATE adm_statua_$current_status SET t_name = '$t_name' WHERE t_no = '$t_no'";
$rs = mysqli_query($connect,$sql_updqte);

echo "200"

?>