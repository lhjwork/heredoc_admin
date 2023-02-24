<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
</html>

<? 

@session_start(); 
@session_unset();   
@session_destroy();  

 echo"
 <script>
	 alert('로그아웃되었습니다');
	 location.replace('login.php');
 </script>
 ";
 
?>