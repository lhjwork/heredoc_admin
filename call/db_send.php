<?
	
	include_once('../head.php');
	include_once('../menu.php'); 
	
	$t_team = $_GET['team'];
	
	$subject = $t_team.'별 배당 처리하기';
	
		
?>

?>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.js"></script>
<script type="text/javascript">
function all_db_update() {

    var t_doc_array = Array();
    var send_cnt = 0;
    var chkbox = $(".checkSelect");

    for (i = 0; i < chkbox.length; i++) {
        if (chkbox[i].checked == true) {
            t_doc_array[send_cnt] = chkbox[i].value;
            // 여기서 코드는 왜 이렇게 짜셨는지 조금 이해가 안간다.
            send_cnt++;
        }

    }


    var all_data = {
        "t_doc_array": t_doc_array,
        "t_call": document.getElementById("call_select").value
    };

    if (t_doc_array == '') {
        alert('배분할 병원을 선택해주세요.');
    } else {
        $.ajax({
            url: "<? echo $host; ?>/call/function/db_send.php",
            type: "GET",
            data: all_data,
            success: function(data) {
                if (data == "200") {
                    alert("배분완료 했습니다.");
                    window.location.reload();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("에러가 발생했습니다. \n" + textStatus + " : " + errorThrown);
                self.close();
            }

        })
    }
}
</script>




<div class="content-wrapper">

    <section class="content-header">

        <h1>
            <? echo $subject;?>
            <small>
                <? echo $subject;?>
            </small>
        </h1>

        <ol class="breadcrumb">

            <li><a href=""><i class="fa fa-dashboard"></i> 홈</a></li>
            <li class="active">
                <? echo $subject;?>
            </li>

        </ol>

    </section>


    <section class="content">

        <div class="row">

            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header with-border">

                        <h3 class="box-title">
                            <? echo $subject;?>
                        </h3>

                    </div>

                    <div class="box-body">

                        <? 
                    // adm_doc 의 t_name, t_doc, adm_db에서 t_call이 배정 받지 않은 count 가져오기 해당팀의
                    $select= "select t_name, t_doc, (select count(t_no) from adm_db as A where A.t_call = '' and A.t_doc = B.t_doc) as cnt_1 from adm_doc as B where t_team = '$t_team' ORDER BY t_no DESC";

                    $rs = mysqlI_query($connect, $select);

                    while($row = mysqlI_fetch_array($rs)) {
                        $t_name = $row['t_name'];
                        $t_doc = $row['t_doc'];
                        $new_count = $row['cnt_1'];

                        if($new_count != 0){
									
                    ?>


                        <input type="checkbox" name="checkbox_1[]" id="check_num" value="<? echo $t_doc; ?>"
                            class="checkSelect" />


                        &nbsp;&nbsp;&nbsp;
                        <? echo $t_name;?> &nbsp;신규 &nbsp;
                        <? echo $new_count; ?> &nbsp;개<br><br>




                        <? 
                        	    }
								
							}
						 ?>

                        <div style="float: left; width: 200px;">
                            <select class="form-control select2" name="call_select" id="call_select">


                                <? 
                                $doc_select = "select t_id, t_name from adm_member where t_access like '%call%'";
                                $doc_rs = mysqli_query($connect, $doc_select);

                                while($doc_row = mysqli_fetch_array($doc_rs)){
                        
                                ?>
                                <option value="<? echo $doc_row['t_id']; ?>">
                                    <? echo $doc_row['t_name']; ?>
                                </option>

                                <? } ?>
                            </select>

                        </div>
                        <div style="float: left; width: 100px;margin-left: 2px">

                            <button onclick="javascript:all_db_update()" class="btn btn-primary"
                                style="width: 100px; margin-left: 2px">배당하기</button>
                        </div>




                    </div>

                </div>
            </div>

        </div>

    </section>



    <script src="<?echo $host;?>/css/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?echo $host;?>/css/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?echo $host;?>/css/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?echo $host;?>/css/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?echo $host;?>/css/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script src="<?echo $host;?>/css/bower_components/moment/min/moment.min.js"></script>
    <script src="<?echo $host;?>/css/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?echo $host;?>/css/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
    </script>
    <script src="<?echo $host;?>/css/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js">
    </script>
    <script src="<?echo $host;?>/css/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?echo $host;?>/css/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?echo $host;?>/css/plugins/iCheck/icheck.min.js"></script>
    <script src="<?echo $host;?>/css/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="<?echo $host;?>/css/dist/js/adminlte.min.js"></script>
    <script src="<?echo $host;?>/css/dist/js/demo.js"></script>
    <script src="<?echo $host;?>/css/bower_components/select2/dist/js/select2.full.min.js"></script>

    <script>
    $(function() {

        $('.select2').select2()

    })
    </script>

    <?
		
		include_once('../tail.php');
		
	?>