<?
	
	include_once('../common.php');
	include_once('../connect.php');
		
	$connect = connect();
	
	$t_no = $_GET['t_no'];
	
?>

<div class="modal-body">
			  
		<input type="hidden" id="content_no" name="content_no" value="<?echo $t_no; ?>"/>
		
		<div class="bootstrap-timepicker" align="center">
		
			<div class="form-group">
			
				<div class="input-group">
						  	
					<input type="text" class="form-control" name="content_name" id="content_name" style="width: 300px" placeholder="수정할 이름작성">
					  	
				</div>
		
			</div>
	  	
		</div>
		
	</div>

    <div class="modal-footer">
		<button type="button" class="btn btn-default pull-left" data-dismiss="modal">닫기</button>
		<a href="javascript:name_update()" class="btn btn-primary">저장</a>
	</div>


    <script>
        
    </script>
	