<?php  
    if($t_member_access == 'ad_pm'){

?>

<ul class="sidebar-menu" data-wiget="tree">
    <li class="header">광고 관리자 메뉴</li> 
    
    <li>
    <a href="<?php echo $host;?>/admin/doc_insert.php">
        <i class="fa fa-edit"></i>
        <span>병원 등원</span>
    </a>
    </li>

    <li>
    <a href="<?php echo $host;?>/admin/channel_insert.php">
        <i class="fa fa-edit"></i>
        <span>채널 등록</span>
    </a>
    </li>

    <li>
    <a href="<?php echo $host;?>/admin/category_insert.php">
        <i class="fa fa-edit"></i>
        <span>시술 등록</span>
    </a>
    </li>



</ul>


<?php 
    }
?>


<ul class="sidebar-menu" data-widget="tree">

    <li class="header">광고 메뉴</li>

    <li>
        <a href="<?php echo $host?>/ad/landing_page.php">
        <i class="fa fa-edit"></i>
        <span>랜딩 코드 리스트</span>
        </a>
    </li>

    <li>
        <a href="<?php echo $host?>/ad/landing_insert.php">
        <i class="fa fa-edit"></i>
        <span>랜딩 등록</span>
        </a>
    </li>


    <li>
        <a href="<?php echo $host?>/ad/db_insert.php">
        <i class="fa fa-edit"></i>
        <span>DB 등록</span>
        </a>
    </li>

    <li>
        <a href="<?php echo $host?>/ad/db_update.php">
        <i class="fa fa-edit"></i>
        <span>DB 수정</span>
        </a>
    </li>


</ul>