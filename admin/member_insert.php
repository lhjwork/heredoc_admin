<?php

    include_once('../head.php');
    include_once('../menu.php'); 

    $subject = '멤버 등록';

    //서치
    // $find = ($_GET['find']) ? $_GET['find'] : 1;
    $find = (isset($_GET['find'])) && $_GET['find'] ? $_GET['find'] : 1;

    //타입 
    // $type = $_GET['type'] ? $_GET['type'] : 1;
    $type = (isset($_GET['type'])) && $_GET['type'] ? $_GET['type'] : 1;

    // 페이지 넘버
    // $page_num = $_GET['page'] ? $_GET['page'] : 1;
    $page_num = (isset($_GET['page'])) && $_GET['page'] ? $_GET['page'] : 1;

    // 페이지 리스트 갯수
    // $list_num = $_GET['list'] ? $_GET['list'] : 10;
    $list_num  = (isset($_GET['list'])) && $_GET['list'] ? $_GET['list'] :10;

    // 보여주고자 하는 시작 index위치 db상의
    $s_point = ($page_num - 1) * $list_num;

    // 블럭에 나타낼 페이지 번호 갯수
    $block_num = 5;

    // 현재 리스트의 블럭 구하기 ceil : 올림
    // block_num의 배수
    $block = ceil($page_num / $block_num);

    //현재 블럭에서 시작페이지 번호
    $block_start_page = (($block -1) * $block_num) + 1;

    // 현재 블럭에서 마지막 페이지 번호
    $block_end_page = $block_start_page + $block_num - 1;

    if($find ==1){

        $sql = "where t_id != 'admin'";

    }else{
        
    }

    $total_count = "SELECT count(t_no) FROM adm_member $sql";
    $total_count = mysqli_query($connect, $total_count);
    $total_count = mysqli_fetch_array($total_count);

    $total_count = $total_count[0];

    // 총 페이지 수 = 전체 카운트 / 페이지 리스트 갯수 
    $total_page =  ceil($total_count/$list_num); 


	
	if ($block_end_page > $total_page)
        $block_end_page = $total_page;
    
	

?>

<script type="text/javascript">
function member_insert() {
    if (document.getElementById("t_id").value == "" || document.getElementById("t_pw").value == "" || document
        .getElementById("t_name").value == "" || document.getElementById("t_rank").value == "" || document
        .getElementById("t_access").value == "") {

        alert("입력 안된 곳이 있습니다.");
        return false;

    } else {

        document.insert.submit();

    }
}


function member_update(t_no) {

    console.log(t_no);
    var t_pw = document.getElementById('t_pw_' + t_no).value;
    var t_name = document.getElementById('t_name_' + t_no).value;
    var t_phone = document.getElementById('t_phone_' + t_no).value;
    var t_rank = document.getElementById('t_rank_' + t_no).value;
    var t_access = document.getElementById('t_access_' + t_no).value;
    var t_team = document.getElementById('t_team_' + t_no).value;
    if (confirm("수정 처리하시겠습니까?") == true) {

        $.get("<?echo $host;?>/admin/function/member_update.php?t_no=" + t_no + "&t_pw=" + t_pw + "&t_name=" + t_name +
            "&t_phone=" + t_phone + "&t_rank=" + t_rank + "&t_access=" + t_access + "&t_team=" + t_team,
            function(data, status) {
                if (data == 200) {
                    alert('수정되었습니다.');
                    window.location.reload();
                }

            });

    }


}
</script>

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
                    <!-- autocomplete 속성값을 on으로 명시하면, 브라우저는 사용자가 이전에 입력했던 값들을 기반으로 사용자가 입력한 값과 비슷한 값들을 드롭다운 옵션으로 보여줍니다. -->
                    <form name="insert" action="<? echo $host;?>/admin/function/member_insert.php" method="post"
                        enctype="multipart/form-data" autocomplete="off">
                        <div class="box-body">
                            <div class="form-group">
                                <!-- <label> 태그는 <input> 태그를 도와주는 역할입니다. <input> 태그가 디자인 하기 힘들 때 <label> 태그로 연결해서 쉽게 디자인하거나 클릭 편의성을 높일 수 있습니다 -->
                                <label for="t_id">아이디</label>
                                <!-- 태그의 name 값이 키(Key)로 해서 값(Value)가 전송된다 -->
                                <input type="text" class="form-control" name="t_id" id="t_id" placeholder="아이디" />
                            </div>
                            <div class="form-group">
                                <label for="t_pw">비밀번호</label>
                                <input type="password" class="form-control" name="t_pw" id="t_pw" placeholder="비밀번호" />
                            </div>
                            <div class="form-group">
                                <label for="t_name">이름</label>
                                <input type="text" class="form-control" name="t_name" id="t_name" placeholder="이름">
                            </div>

                            <div class="form-group">
                                <label for="landing_subject">직급</label>
                                <select class="form-control select2" id="t_rank" name="t_rank" style="width:100%">

                                    <option value="">직급 선택해주세요.</option>
                                    <option value="사원">사원</option>
                                    <option value="주임">주임</option>
                                    <option value="대리">대리</option>
                                    <option value="과장">과장</option>
                                    <option value="부장">부장</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="landing_subject">권한</label>
                                <select class="form-control select2" id="t_access" name="t_access" style="width:100%">

                                    <option value="">권한을 선택해주세요.</option>
                                    <option value="ad">광고팀</option>
                                    <option value="ad_pm">광고팀장</option>
                                    <option value="call">콜팀</option>
                                    <option value="call_pm">콜팀장</option>

                                </select>
                            </div>

                        </div>

                        <div class="box-footer" align="right">
                            <a href="javascript:member_insert()" class="btn btn-primary">등록</a>

                        </div>

                    </form>


                </div>

            </div>

        </div>

        <div class="row">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">멤버 현황</h3>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr style="background:#F9F9F9">
                        <td class="center" width="10%">아이디</td>
                        <td class="center" width="10%">비밀번호</td>
                        <td class="center" width="10%">이름</td>
                        <td class="center" width="10%">전화번호</td>
                        <td class="center" width="10%">직급</td>
                        <td class="center" width="10%">권한</td>
                        <td class="center" width="10%">팀별</td>
                        <td class="center" width="10%">등록일자</td>
                        <td class="center" width="10%">로그인일자</td>
                        <td class="center" width="10%">수정</td>
                    </tr>

                    <?php 
                    // list_num = 페이지 리스트 갯수
                    // $s_point = ($page_num - 1) * $list_num;
                    // desc limit 2,3 -->  3번째 부터, 3개의 자료만을 보여준다. (주의) 0부터 시작하므로 3번쨰는 2입니다. 
                        $select = "select * from adm_member $sql ORDER BY t_no DESC limit $s_point, $list_num";
                        $rs = mysqli_query($connect, $select);
                        
                        while($row = mysqli_fetch_array($rs)){

                        
                    ?>
                    <tr align="center">
                        <td style="vertical-align: middle;">
                            <? echo $row['t_id'] ?>
                        </td>
                        <td style="vertical-align: middle;">
                            <input type="text" id="t_pw_<?echo $row['t_no']?>" value="<? echo $row['t_pw']?>"
                                class="form-control">
                        </td>

                        <td style="vertical-align: middle;">
                            <input type="password" id="t_name_<?echo $row['t_no']?>" value="<? echo $row['t_name']?>"
                                class="form-control">
                        </td>
                        <td style="vertical-align: middle;">
                            <input type="text" id="t_phone_<?echo $row['t_no']?>" value="<? echo $row['t_phone']?>"
                                class="form-control">
                        </td>
                        <td style="vertical-align: middle;">
                            <select class="form-control select2" name="t_rank_<?echo $row['t_no']; ?>"
                                id="t_rank_<?echo $row['t_no']?>" style="width:100%">
                                <option value="">직급 선택헤주세요.</option>
                                <option value="사원" <?php attr_selected('사원', $row['t_rank'])?>>사원</option>
                                <option value="사원" <?php attr_selected('주임', $row['t_rank'])?>>주임</option>
                                <option value="사원" <?php attr_selected('대리', $row['t_rank'])?>>대리</option>
                                <option value="사원" <?php attr_selected('과장', $row['t_rank'])?>>과장</option>
                                <option value="사원" <?php attr_selected('부장', $row['t_rank'])?>>부장</option>
                            </select>
                        </td>
                        <td style="vertical-align: middle;">
                            <select class="form-control select2" name="t_access_<? echo $row['t_no'];?>"
                                id="t_access_<? echo $row['t_no'];?>" style="width:100%">

                                <option value="">권한을 선택해주세요.</option>
                                <option value="" <?php attr_selected('ad',$row['t_access'])?>>광고팀</option>
                                <option value="" <?php attr_selected('ad_pm',$row['t_access'])?>>광고팀장</option>
                                <option value="" <?php attr_selected('call',$row['t_access'])?>>콜팀</option>
                                <option value="" <?php attr_selected('call_pm',$row['t_access'])?>>콜팀장</option>
                            </select>

                        </td>
                        <td style="vertical-align: middle;">
                            <select class="form-control select2" name="t_team_<?php echo $row['t_no']?>"
                                id="t_team_<?echo $row['t_no']?>">
                                <option value="">팀을 선택해주세요.</option>
                                <option value="1팀 <?php attr_selected('1팀',$row['t_team'])?>">1팀</option>
                                <option value="2팀 <?php attr_selected('2팀',$row['t_team'])?>">2팀</option>
                                <option value="3팀 <?php attr_selected('3팀',$row['t_team'])?>">3팀</option>
                                <option value="4팀 <?php attr_selected('4팀',$row['t_team'])?>">4팀</option>
                            </select>
                        </td>

                        <td style="vertical-align: middle;">
                            <?echo $row['t_date'] ?>
                        </td>
                        <td style="vertical-align: middle;">
                            <? echo $row['t_login_date'] ?>
                        </td>
                        <td style="vertical-align: middle;">

                            <button value="수정" class="btn btn-primary"
                                onclick="member_update('<? echo $row['t_no']; ?>')">수정</button>

                        </td>
                    </tr>
                    <?php 
                    
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

    </section>

</div>



<script src="<?echo $host;?>/css/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?echo $host;?>/css/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?echo $host;?>/css/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?echo $host;?>/css/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?echo $host;?>/css/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?echo $host;?>/css/bower_components/moment/min/moment.min.js"></script>
<script src="<?echo $host;?>/css/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?echo $host;?>/css/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?echo $host;?>/css/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
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