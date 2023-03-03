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






<script src="<?echo $host;?>/css/bower_components/jquery/dist/jquery.min.js"></script>
<?
		
		include_once('../tail.php');
		
?>