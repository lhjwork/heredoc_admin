<?
	
	include_once('../../connect.php');
	
	$connect = connect();
	
	$t_name = $_POST['t_name'];

    

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