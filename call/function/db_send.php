<? 
    include_once('../../connect.php');

    $connect = connect();


    $t_doc_array = $_GET['t_doc_array'];
    $t_call = $_GET['t_call'];


    for($i = 0; $i < count($t_doc_array); $i++) {

     $t_doc = $t_doc_array[$i];
     $update = "update adm_db set t_call = '$t_call' where t_doc = '$t_doc' and t_call = ''";
     mysqli_query($connect, $update);

    }
    echo '200';
?>