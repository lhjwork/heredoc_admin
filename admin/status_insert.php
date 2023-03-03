<? 

include_once('../head.php');
include_once('../menu.php'); 


$status = (isset($_GET['status'])) && $_GET['status'] ? $_GET['status'] : '';
$subject = $status.'번 상태 등록';

// 서치
$find = (isset($_GET['find'])) && $_GET['find'] ? $_GET['find'] :1;

// 타입
$type = (isset($_GET['type'])) &&  $_GET['type'] ? $_GET['type'] : 1;

// 페이지 넘버 -> 현재 선택 된 페이지

$page_num = (isset($_GET['page'])) && $_GET['page'] ? $_GET['page'] :1;

// 리스트 수

$list_num = (isset($_GET['list'])) && $_GET['list'] ? $_GET['list'] :10;

// 블록 
$block_num = 5;

// 현재 리스트의 블럭 현재 선택한 페이지에서의 먗번 째 블럭인지 
$block = ceil($page_num / $block_num);

// 포인터 : 현재 블럭에 시작 리스트 위치
$s_point = ($page_num -1)* $list_num;

// 현재 블럭에서 시작페이지 번호
$block_start_page = (($block -1) * $block_num) +1;

// 마지막 페이지
$block_end_page = $block_start_page + $block_num -1;


if($find == 1){
		
    $sql = "";
    
}else{
    
}
$total_count = "SELECT count(t_no) FROM adm_status_$status $sql";
$total_count = mysqli_query($connect, $total_count);
$total_count = mysqli_fetch_array($total_count);
$total_count = $total_count[0];
        
//총 페이지 수						
$total_page =  ceil($total_count/$list_num); 

if ($block_end_page > $total_page) 
    $block_end_page = $total_page;


 ?>

<script type="text/javascript">
function status_insert() {
    $t_status = document.getElementById('t_status').value;

    if ($t_status == "" || is_null($t_status)) {
        alert('상태값을 입력해주세요.');
        return false;

    } else {
        document.insert.submit()
    }
}


function status_update() {
    var t_name = document.getElementById('t_status_' + t_no).value;

    if (confirm('수정 하시겠습니까?') == true) {
        $.get("<? echo $host ?>/admin/function/status_update.php?status=<? echo $status;?>&t_no=" + $t_no +
            "&t_name=" + $t_name,
            function(date, status) {
                if (data == 200) {
                    alert('수정되었습니다.');
                    window.location.reload();
                }
            })
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

                    <form name="insert" action="<?echo $host;?>/admin/function/status_insert.php" method="post"
                        enctype="multipart/form-data" autocomplete="off">


                        <div class="box-body">

                            <input type="hidden" id="status" name="status" value="<?echo $status;?>" />

                            <div class="form-group">
                                <label for="landing_subject">상태값</label>
                                <input type="text" class="form-control" name="t_status" id="t_status" placeholder="상태값">
                            </div>

                        </div>

                        <div class="box-footer" align="right">
                            <a href="javascript:status_insert()" class="btn btn-primary">등록</a>
                        </div>

                    </form>

                </div>

            </div>


        </div>

        <div class="row">

            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header with-border">

                        <h3 class="box-title">상태값 현황</h3>

                    </div>

                    <div class="box-body">
                        <table class="table table-bordered">

                            <tr style="background:#F9F9F9">
                                <td align="center" width="10%">상태값</td>
                                <td align="center" width="5%">수정</td>
                            </tr>


                            <? 
                            $select = "select * from adm_status_$status $sql ORDER BY t_no limit $s_point, $list_num";
                            $rs = mysqli_query($connect, $select);

                            while($row = mysqli_fetch_array($rs)){

                            
                        ?>
                            <tr align="center">
                                <td style="vertical-align:middle;">
                                    <input type="text" id="t_status_<? echo $row['t_no'];?>"
                                        value="<? echo $row['t_status'];?>" class="form-control" style="width:200px" />
                                </td>
                                <td style=" vertical-align:middle;">
                                    <button value="수정" class="btn btn-primary"
                                        onclick="status_update(<? $row['t_no'];?>)">수정</button>
                                </td>
                            </tr>

                            <? } ?>

                        </table>
                    </div>

                    <div class="box-footer clearfix">

                        <ul class="pagination pagination-sm no-margin pull-right">

                            <!-- 현재 선택된 페이지 -->
                            <? if($page_num <=1){ ?>
                            <!-- 뒤로가기만 나타남  -->
                            <li><a href="">&laquo;</a></li>

                            <? }else{?>

                            <!-- find가 뭔지 진짜 모르겟다 ... -->
                            <? if($find == 1) {?>
                            <li><a href="?status=<? echo $status?>?page=<? 
                                echo $page_num-1 ?>">&lsaquo;</a></li>
                            <? }else{ ?>

                            <? } ?>
                            <? } ?>

                            <? for($j = $block_start_page; $j <=$block_end_page; $j++){
                                if($page_num == $j){
                            ?>
                            <!-- 선택된 페이지랑 같으면 효과  -->
                            <li class="page-item active"><a href="#"><?=$j?></a></li>


                            <? }else{ ?>
                            <!-- 그 외 페이지 번호들은 효과 없앱 -->
                            <? if($find == 1){ ?>

                            <li><a href="?status=<? echo $status;?>&page=<?=$j?>"><?=$j?></a></li>

                            <? }else{?>


                            <? } ?>

                            <?}?>


                            <? } ?>


                            <? $total_block = ceil($total_page / $block_num);
                            
                            // $block : 현재 페이지가 존재하는 블럭
								if($block >= $total_block){
	
								}else{   

		                     ?>

                            <? if($find == 1 ){ ?>
                            <li><a href="?status=<? echo $status ?>?page=<? echo $page_num+1 ?>">&raquo;</a></li>
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
    <?
		
		include_once('../tail.php');
		
?>