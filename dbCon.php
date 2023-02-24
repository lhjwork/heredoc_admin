<?

	function connect()
	{
		$myhost = "localhost";
		$myuser = "heredoc";
		$mypwd = "myuuniv123!!";
		$mydb = "heredoc";
		   
		$con = mysqli_connect($myhost,$myuser,$mypwd,$mydb);
		
		return $con;
	}

    
	
?>