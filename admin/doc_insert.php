<? 
	include_once('../head.php');
	include_once('../menu.php'); 

    $subject = '병원 등록';

    // 서치
    $find = (isset($_GET['find'])) && $_GET['find'] ? $_GET['find'] : 1;
    
    
    // 타입
    $type = (isset($_GET['type'])) && $_GET['find'] ? $_GET['type'] : 1;

    //페이지 넘버 
    $page_num = (isset($_GET['page'])) && $_GET['page'] ? $_GET['page'] : 1;

    // 페이지 리스트 갯수
    $list_num  = (isset($_GET['list'])) && $_GET['list'] ? $_GET['list'] : 10;

    // list 상 시작 위치
    $s_point = ($page_num -1) * $list_num;

    // 블럭에 나타날 페이지 번호 갯수
    $block_num = 5;

    // 현재 리스트의 블럭 구하기
    $block = ceil($page_num / $block_num);

    // 현재 블럭에서 시작 페이지 번호
    $block_start_page = (($block -1) * $block_num) + 1;
    
    // 현재 블럭에서 마지막 페이지 번호
    $block_end_page = $block_start_page + $block_num - 1;

    if($find == 1){
        $sql = "";
    }

    $total_count = "SELECT count(t_no) FROM adm_doc $sql";
    // object 로 반환
    $total_count = mysqli_query($connect, $total_count);
    // mysqli_error($connect);

    // array = key : value
    $total_count = mysqli_fetch_array($total_count);
    $total_count = $total_count[0];

    //  총 페이지 수 
    $total_page = ceil($total_count / $list_num);

  	
	if ($block_end_page > $total_page) 
        $block_end_page = $total_page;
    

?>

<script type="text/javascript">
function doc_insert() {

    if (document.getElementById("t_name").value == "") {

        alert("병원명 입력해주세요");
        return false;

    } else {

        document.insert.submit();

    }
}

function doc_update(t_no) {

    var t_name = document.getElementById('t_name_' + t_no).value;
    var t_team = document.getElementById('t_team_' + t_no).value;

    if (confirm("수정 처리하시겠습니까?") == true) {

        $.get("<?echo $host;?>/admin/function/doc_update.php?t_no=" + t_no + "&t_name=" + t_name + "&t_team=" + t_team,
            function(data, status) {

                if (data == 200) {

                    alert('수정되었습니다.');
                    window.location.reload();

                }
            });

    }

}


function doc_check(t_no) {

    if (document.getElementById('t_check_' + t_no).checked == true) {

        var result = confirm("On 하시겠습니까?");

        if (result) {

            $.ajax({

                url: '<?echo $host;?>/admin/function/doc_check_update.php',
                dataType: 'json',
                type: 'POST',
                data: {
                    't_no': t_no,
                    't_check': 'Y'
                },

                success: function(result) {
                    if (result == 200) {

                        alert('수정되었습니다.');

                    }
                }
            });

        } else {

            document.getElementById('t_check_' + t_no).checked = false;

        }

    } else {

        var result = confirm("Off 하시겠습니까?");

        if (result) {

            $.ajax({

                url: '<?echo $host;?>/admin/function/doc_check_update.php',
                dataType: 'json',
                type: 'POST',
                data: {
                    't_no': t_no,
                    't_check': ''
                },

                success: function(result) {
                    if (result == 200) {

                        alert('수정되었습니다.');

                    }
                }
            });

        } else {

            document.getElementById('t_check_' + t_no).checked = false;

        }

    }
}
</script>

<style>
.switch {
    position: relative;
    display: inline-block;
    width: 30px;
    height: 18px;
    float: center;
}

.switch input {
    display: none;
}

/* The slider */
.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 13px;
    width: 13px;
    left: 2px;
    bottom: 3px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input.default:checked+.slider {
    background-color: #444;
}

input.primary:checked+.slider {
    background-color: #2196F3;
}

input.success:checked+.slider {
    background-color: #8bc34a;
}

input.info:checked+.slider {
    background-color: #3de0f5;
}

input.warning:checked+.slider {
    background-color: #FFC107;
}

input.danger:checked+.slider {
    background-color: #f44336;
}

input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
}

input:checked+.slider:before {
    -webkit-transform: translateX(13px);
    -ms-transform: translateX(13px);
    transform: translateX(13px);
}

/* Rounded sliders */
.slider.round {
    border-radius: 18px;
}

.slider.round:before {
    border-radius: 50%;
}
</style>

<div class="content-wrapper">

    <section class="content-header">

        <h1>
            <? echo $subject; ?>
            <small>
                <? echo $sub_subject; ?>
            </small>
        </h1>

        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> 홈</a></li>
            <li class="active">
                <? echo $subject; ?>
            </li>
        </ol>

    </section>

    <section class="content">

        <div class="row">

            <div class="col-md-6" style="width:100%;">

                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <?echo $subject;?>
                        </h3>
                    </div>

                    <form name="insert" action="<?echo $host;?>/admin/function/doc_insert.php" method="post"
                        enctype="multipart/form-data" autocomplete="off">

                        <div class="box-body">

                            <div class="form-group">
                                <label for="landing_subject">병원명</label>
                                <input type="text" class="form-control" name="t_name" id="t_name" placeholder="병원명">
                            </div>

                        </div>

                        <div class="box-footer" align="right">
                            <a href="javascript:doc_insert()" class="btn btn-primary">등록</a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-xs-12">

                <div class="box">

                    <div class="box-header with-border">

                        <h3 class="box-title">병원 현황</h3>

                    </div>

                    <div class="box-body">

                        <table class="table table-bordered">

                            <tr style="background:#F9F9F9">

                                <td align="center" width="10%">병원 코드</td>
                                <td align="center" width="20%">병원명</td>
                                <td align="center" width="5%">광고여부</td>
                                <td align="center" width="5%">팀체크</td>
                                <td align="center" width="10%">등록일자</td>
                                <td align="center" width="5%">수정</td>

                            </tr>

                            <?
						
								$select= "select * from adm_doc $sql ORDER BY t_no DESC limit $s_point, $list_num";
								$rs = mysqlI_query($connect, $select);
								
								while($row = mysqli_fetch_array($rs)){ 
							
							?>

                            <tr align="center">

                                <td style="vertical-align: middle;">
                                    <? echo $row['t_doc']; ?>
                                </td>
                                <td style="vertical-align: middle;">
                                    <input type="text" id="t_name_<? echo $row['t_no']; ?>"
                                        value="<? echo $row['t_name']; ?>" class="form-control" />
                                </td>
                                <td>

                                    <label class="switch ">

                                        <? if($row['t_check'] == 'Y'){ ?>

                                        <input type="checkbox" onchange="doc_check('<?echo $row['t_no'];?>')"
                                            id="t_check_<?echo $row['t_no'];?>" class="default" checked>

                                        <? }else{ ?>

                                        <input type="checkbox" onchange="doc_check('<?echo $row['t_no'];?>')"
                                            id="t_check_<?echo $row['t_no'];?>" class="default">

                                        <? } ?>

                                        <span class="slider round"></span>

                                    </label>

                                </td>

                                <td>

                                    <select class="form-control select2" id="t_team_<? echo $row['t_no']; ?>"
                                        name="t_team_<? echo $row['t_no']; ?>" style="width:100%">

                                        <option value="">팀을 선택해주세요.</option>
                                        <option value="1팀" <?php attr_selected('1팀', $row['t_team'])?>>1팀</option>
                                        <option value="2팀" <?php attr_selected('2팀', $row['t_team'])?>>2팀</option>
                                        <option value="3팀" <?php attr_selected('3팀', $row['t_team'])?>>3팀</option>
                                        <option value="4팀" <?php attr_selected('4팀', $row['t_team'])?>>4팀</option>

                                    </select>

                                </td>
                                <td style="vertical-align: middle;">
                                    <? echo $row['t_date']; ?>
                                </td>


                                <td style="vertical-align: middle;">

                                    <button value="수정" class="btn btn-primary"
                                        onclick="doc_update('<? echo $row['t_no']; ?>')">수정</button>

                                </td>

                            </tr>

                            <? 
							
								} 
								
							?>

                        </table>

                    </div>

                    <div class="box-footer clearfix">

                        <ul class="pagination pagination-sm no-margin pull-right">

                            <? if($page_num <= 1){ ?>

                            <li><a href="">&laquo;</a></li>

                            <? }else{ ?>

                            <? if($find == 1){ ?>

                            <li><a href="?page=<?=$page_num-1;?>">&laquo;</a></li>

                            <? }else{ ?>


                            <? } ?>

                            <? } ?>

                            <? 
						
								for($j = $block_start_page; $j <=$block_end_page; $j++){
	
									if($page_num == $j){
							
							?>

                            <li class="page-item active"><a href="#"><?=$j?></a></li>

                            <? }else{ ?>

                            <? if($find == 1){?>

                            <li><a href="?page=<?=$j?>"><?=$j?></a></li>

                            <? }else{ ?>

                            <? } ?>

                            <? } ?>

                            <? } ?>

                            <?
							
								$total_block = ceil($total_page/$block_num);
	
								if($block >= $total_block){
	
								}else{   
		
						  	?>

                            <? if($find == 1){?>

                            <li><a href="?page=<?=$block_end_page+1?>">&raquo;</a></li>

                            <? }else{ ?>


                            <? } ?>

                            <? } ?>

                        </ul>

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