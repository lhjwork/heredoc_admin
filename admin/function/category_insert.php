<? 

include_once("../../dbCon.php");

 $t_no = $_GET['t_no'];
 $t_name = $_GET['t_name'];

 $sql_update = "update adm_category set t_name = '$t_name' where t_no = '$t_no'";
 $result = mysqli_query($connect,$sql_update);

if($result === true) {
    echo "200";
}else{
    echo "404";
}


?>