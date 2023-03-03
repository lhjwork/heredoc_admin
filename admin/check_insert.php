<?
	
	include_once('../head.php');
	include_once('../menu.php'); 
	

    $check = (isset($_GET['check']) && $_GET['check']) ? $_GET['check'] :'';

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


<script src="<?echo $host;?>/css/bower_components/jquery/dist/jquery.min.js"></script>

<?
		
		include_once('../tail.php');
		
	?>