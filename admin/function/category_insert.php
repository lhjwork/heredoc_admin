<? 
    include_once('../../dbCon.php');

    $t_name = $_POST['t_name'];


    // t_category 중복 확인

    while(1){
        
        $select = "select t_category from adm_category where t_category = '$t_category'";
        $rs = mysqli_query($connect, $select);
        // array : key => value로 변경해줌
        $row = mysqli_fetch_array($rs);


        if($row['t_category'] == '' || is_null($row)){
            break;
        }
        
    }

    // insert 

    $sql_insert = "INSERT INTO adm_category (t_name) VALUES ('$t_name')";
    $result = mysqli_query($connect, $sql_insert);

    echo "<script>window.location.replace('../category_insert.php');</script>";



    // random_num()
    function random_num(){

        $str = "1234567890ABCDEFGHIJKLNMOPQRSTUVWXYZ";
        $code1 = substr(str_shuffle($str),0,1);
        $code2 = substr(str_shuffle($str),0,1);
        $code3 = substr(str_shuffle($str),0,1);
        $code4 = substr(str_shuffle($str),0,1);
        $code5 = substr(str_shuffle($str),0,1);
        $code6 = substr(str_shuffle($str),0,1);
        $code = $code1.$code2.$code3.$code4.$code5.$code6;
        return $code;
    }







?>