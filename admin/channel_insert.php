<? 


    include_once('../head.php');
    include_once('../menu.php'); 

    $subject = '채널 등록';
	

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
    $s_point = ($page_num - 1) * $list_num ;

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

        $sql = "";

    }else{
        
    }

    $total_count = "SELECT count(t_no) FROM adm_channel $sql";
    $total_count = mysqli_query($connect, $total_count);
    $total_count = mysqli_fetch_array($total_count);
    $total_count = $total_count[0];

    // 총페이지 수
    $total_page = ceil($total_count / $list_num);

    	
	if ($block_end_page > $total_page) 
    $block_end_page = $total_page;


?>

<script type="text/javascript">
function channel_insert() {
    if (document.getElementById("t_name").value == "") {
        alert("채널명 입력해주세요.");
        return false;
    } else {
        document.insert.submit()
    }
}

function channel_update(t_no) {

    var t_name = document.getElementById("t_name_" + t_no).value;

    if (confirm("Are you sure you want to") == true) {
        $.get("<?echo $host;?>/admin/function/channel_update.php?t_no=" + t_no + "&t_name=" + t_name, function(data,
            status) {
            if (data == 200) {
                alert('수정었습니다.')
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

                    <form name="insert" action="<?echo $host;?>/admin/function/channel_insert.php" method="post"
                        enctype="multipart/form-data" autocomplete="off">

                        <div class="box-body">

                            <div class="form-group">
                                <label for="landing_subject">채널명</label>
                                <input type="text" class="form-control" name="t_name" id="t_name" placeholder="채널명">
                            </div>

                        </div>

                        <div class="box-footer" align="right">
                            <a href="javascript:channel_insert()" class="btn btn-primary">등록</a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class=" box">

                    <div class="box-header with-border">

                        <h3 class="box-title">채널 현황</h3>

                    </div>

                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr style="background:#F9F9F9">
                                <td align="center" width="10%">채널 코드</td>
                                <td align="center" width="10%">채널명</td>
                                <td align="center" width="10%">등록일자</td>
                                <td align="center" width="5%">수정</td>
                            </tr>

                            <? 
                                $select = "select * from adm_channel $sql ORDER BY t_no DESC limit $s_point, $list_num";
                                $rs = mysqli_query($connect,$select);


                                while($row = mysqli_fetch_array($rs)){

                            ?>

                            <tr align="center">
                                <td style="vertical-align: middle;">
                                    <? echo $row['t_channel'] ?>
                                </td>
                                <td style="vertical-align: middle;">
                                    <input type="text" id="t_name_<? echo $row['t_no']?>" value="<? echo $row['t_name'];
                                            ?>" class="form-control" />
                                </td>
                                <td style="vertical-align: middle;">
                                    <? echo $row['t_date'] ?>
                                </td>
                                <td style="vertical-align: middle;">

                                    <button value="수정" class="btn btn-primary"
                                        onclick="channel_update('<? echo $row['t_no']?>')">수정</button>
                                </td>

                            </tr>

                            <? } ?>
                        </table>
                    </div>

                    <div class="box-footer clearfix">

                        <ul class="pagination pagination-sm no-margin pull-right">

                            <? if($page_num <= 1) {?>
                            <li><a href="">&laquo;</a></li>

                            <? }else{ ?>
                            <? if($find == 1){ ?>
                            <li> <a href="?page=<?=$page_num -1?>">&laquo;</a></li>

                            <? }else{ ?>

                            <? } ?>

                            <? } ?>

                            <? for($j = $block_start_page; $j <= $block_end_page; $j++){
                                if($page_num == $j){
                    
                                ?>
                            <li class="page-item active"><a href="#"><?= $j ?></a></li>
                            <? }else{ ?>

                            <? if($find == 1){?>

                            <li><a href="?page=<?=$j?>"><?=$j?></a></li>

                            <? }else{ ?>

                            <? } ?>

                            <? } ?>
                            <? } ?>

                            <? 
                              $total_block = ceil($total_page / $block_num);
                              if($block >= $total_block){ }else{
                            
                            ?>

                            <? if($find == 1){ ?>
                            <li><a href="?page=<?=$block_end_page?>">&raquo;</a></li>
                            <? }else{} ?>
                            <?}?>
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