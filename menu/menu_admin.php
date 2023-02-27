<ul class="sidebar-menu" data-widget="tree">
	
<li class="header">관리자 메뉴</li> 
	
<li>
    <a href="<? echo $host;?>/admin/member_insert.php">
        <i class="fa fa-edit"></i>
        <span>멤버 등록</span>
    </a>          
</li>

<li>
    <a href="<? echo $host;?>/admin/doc_insert.php">
        <i class="fa fa-edit"></i>
        <span>멤버 등록</span>
    </a>          
</li>

<li>
    <a href="<? echo $host;?>/admin/channel_insert.php">
        <i class="fa fa-edit"></i>
        <span>멤버 등록</span>
    </a>          
</li>

<li>
    <a href="<? echo $host;?>/admin/category_insert.php">
        <i class="fa fa-edit"></i>
        <span>멤버 등록</span>
    </a>          
    
</li>

<li class="treeview">
        <a href="#">
			<i class="fa fa-files-o"></i>
			<span>상담 상태 값</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>

    <ul class="treeview-menu">
        <?php 
            for($i = 1; $i < 5; $i++) {

        ?>
        <li>
            <a href="<?echo $host;?>/admin/status_insert.php?status=<?echo $i;?>">
            <i class="fa fa-edit"></i>
            <span><?echo $i;?>번 상태 리스트</span>
            </a>
         
        </li>

        <?php
            }
        ?>
    </ul>

</li>


<li class="treeview">
	
		<a href="#">
			<i class="fa fa-files-o"></i>
			<span>업무일지 상태 값</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
			
		<ul class="treeview-menu">
			
			<li>
				
				<a href="<?echo $host;?>/admin/check_insert.php?check=1">
					<i class="fa fa-edit"></i>
					<span>콜분류 리스트</span>
				</a>
			
			</li>
			
			<li>
				
				<a href="<?echo $host;?>/admin/check_insert.php?check=2">
					<i class="fa fa-edit"></i>
					<span>콜결과 리스트</span>
				</a>
			
			</li>
			
		</ul>
	
	</li>

</ul>