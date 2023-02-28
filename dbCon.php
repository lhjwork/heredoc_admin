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




	/** 
	 * 	selectbox 에서 값을 비교해 selected를 출력.
	 * @param string $form_value 현재 select > option의 value
	 * @param string|arrary  $db_value DB에 저장된 값 혹은 값들의 배열
	 * @param boolean $default 이게 true면, $db_value가 빈 값일 때 selected를 출력
	 * @return boolean
	 */

	function attr_selected($form_value,$db_value, $default=false) {
		// 빈 배열에서 최초 하나 선택했을 경우
		if($default and empty($db_value)){
			echo " selected";
		// 빈 배열이 아닌 경우에서 값이 있을 경우 return boolean 
		}else if(is_equal_or_in($form_value,$db_value)){
			echo " selected";
		}
	
	}

	/**
	 * input:checkbox, input:radio, select 에서, 현재 값을 표시해 줄 때, 현재 값이 저장된 값과 같은지 
	 * 혹은 저장된 값들 중에 포함돼 있는지(checkbox의 경우) 확인하는 함수.
	 * HTML 길이를 줄이기 위해 만든 거다.
	 * @param  string       $form_value 현재 input의 value
	 * @param  string|array $db_value DB에 저장된 값 혹은 값들의 배열
	 * @return boolean
	 */
	function is_equal_or_in($form_value, $db_value){
		if(is_array($db_value)){
			// php에서 특정 배열안에 내가 찾고자 하는 값이 있는지 확인하고 싶을 때 in_array 함수 사용
			return in_array($form_value, $db_value);
		}else{
			return $form_value == $db_value;
		}
	}


	
?>