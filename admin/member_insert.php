<?php

    include_once('../head.php');
    include_once('../menu.php'); 

    $subject = '멤버 등록';

    //서치
    $find = $_GET['find'] ? $_GET['find'] : 1;

    //타입 
    $type = $_GET['type'] ? $_GET['type'] : 1;

    // 페이지 넘버
    $page_num = $_GET['page'] ? $_GET['page'] : 1;

    // 페이지 리스트 갯수
    $list_num = $_GET['list'] ? $_GET['list'] : 10;

    // ?? 
    $s_point = ($list_num - 1) * $list_num;

    // 블럭에 나타낼 페이지 번호 갯수
    $blcok_num = 5;

    // 현재 리스트의 블럭 구하기 ceil : 올림
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
    $tottal_count = mysqli_fetch_array($total_count);
    $total_count = $total_count[0];

    // 총 페이지 수 = 전체 카운트 / 페이지 리스트 갯수 
    $total_page =  ceil($total_count/$list_num); 
	
	if ($block_end_page > $total_page){
        $block_end_page = $total_page;
    }
		
		


?>

<div class="content-wrapper">
        <section class="content-header">
			
            <h1><? echo $subject; ?>
                <small><? echo $sub_subject; ?></small>
            </h1>
          
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> 홈</a></li>
                <li class="active"><? echo $subject; ?></li>
            </ol>
                
        </section>

</div>



<?
		
		include_once('../tail.php');
		
?>	    