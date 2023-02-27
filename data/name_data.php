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


    <!--  -->
    <script>

        function name_update() {

            if (document.getElementById("content_name").value == "" ){
                alert("이름을 입력해주세요.");
                return false;

            }else{
                var t_no = document.getElementById("content_no").value;
                var t_name = document.getElementById("content_name").value;

                $.ajax({
                    url:'<?echo $host?>/function/name_update.php',
                    dataType:'json',
                    type:'POST',
                    data:{'t_no':t_no, 't_name':t_name},

                    success:function(result){
                        if(result == 200){
                            alert('수정되었습니다.');
                            window.location.reload();
                        }
                    }
                });
            }
        }



    </script>
	