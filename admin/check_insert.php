<?
	
	include_once('../head.php');
	include_once('../menu.php'); 

    $check = (isset($_GET['check']) && $_GET['check']) ? $_GET['check'] :'';
	
	if($check == '1'){
		
		$subject = '콜분류 등록';
		
	}else{
		
		$subject = '콜결과 등록';
		
	}
	

    // 서치
    $find = (isset($_GET['find']) && $_GET['find']) ? $_GET['find'] :1;

    // 현재 선택된 페이지
    $page_num = (isset($_GET['page']) && $_GET['page']) ? $_GET['page'] :1;
    
    // 리스트
    $list_num = (isset($_GET['list']) && $_GET['list']) ? $_GET['list'] :10;


    // 현재 선택된 페이지에서의 첫 t_no
    $s_point = ($page_num - 1) * $list_num;

    // 블럭
    $block_num = 5;

    // 현재 리스트의 블럭
    $block = ceil($page_num / $block_num);
    
    // 현재 블럭의 시작 페이지
    $block_start_page = ($block - 1) * $block_num + 1;

    // 블럭의 마지막 페이지
    $block_end_page = $block_start_page + $block_num - 1;


    if($find == 1){
        $sql = "";
    }

    $total_count = "SELECT count(t_no) FROM adm_check_$check $sql";
    $total_count = mysqli_query($connect, $total_count);
	$total_count = mysqli_fetch_array($total_count);
	$total_count = $total_count[0];
			
	//총 페이지 수						
	$total_page =  ceil($total_count/$list_num); 
	
	if ($block_end_page > $total_page) 
		$block_end_page = $total_page;

?>

<script type="text/javascript">
function check_insert() {

    if (document.getElementById("t_name").value == "") {

        alert("상태를 입력해주세요");
        return false;

    } else {

        document.insert.submit();

    }
}

function check_update(t_no) {

    var t_check = document.getElementById('t_check_' + t_no).value;

    if (confirm("수정 처리하시겠습니까?") == true) {

        $.get("<?echo $host;?>/admin/function/check_update.php?check=<?echo $check;?>&t_no=" + t_no + "&t_name=" +
            t_name,
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

                    <form name="insert" action="<?echo $host;?>/admin/function/check_insert.php" method="post"
                        enctype="multipart/form-data" autocomplete="off">


                        <div class="box-body">

                            <input type="hidden" id="check" name="check" value="<?echo $check;?>" />

                            <div class="form-group">
                                <label for="landing_subject">
                                    <?echo $subject;?>
                                </label>
                                <input type="text" class="form-control" name="t_name" id="t_name"
                                    placeholder="<?echo $subject;?>">
                            </div>

                        </div>

                        <div class="box-footer" align="right">
                            <a href="javascript:check_insert()" class="btn btn-primary">등록</a>
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
						
								$select= "select * from adm_check_$check $sql ORDER BY t_no DESC limit $s_point, $list_num";
								$rs = mysqlI_query($connect, $select);
								
								while($row = mysqli_fetch_array($rs)){ 
							
							?>

                            <tr align="center">

                                <td style="vertical-align: middle;">
                                    <input type="text" id="t_check_<? echo $row['t_no']; ?>"
                                        value="<? echo $row['t_name']; ?>" class="form-control" style="width: 200px" />
                                </td>
                                <td style="vertical-align: middle;">

                                    <button value="수정" class="btn btn-primary"
                                        onclick="status_update('<? echo $row['t_no']; ?>')">수정</button>

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

                            <li><a href="?check=<?echo $check;?>&page=<?=$page_num-1;?>">&laquo;</a></li>

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

                            <li><a href="?check=<?echo $check;?>&page=<?=$j?>"><?=$j?></a></li>

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

                            <li><a href="?check=<?echo $check;?>&page=<?=$block_end_page+1?>">&raquo;</a></li>

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