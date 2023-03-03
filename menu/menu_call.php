<?php 

if($t_member_access == 'call_pm'){
?>

<ul class="sidebar-menu" data-widget="tree">

    <li class="header">TM 관리자 메뉴</li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-files-o"></i>
            <span>전체 배당하기(팀별)</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>


        <ul class="treeview-menu">
            <li>
                <a href="<?echo $host;?>/call/db_send.php?team=1팀">
                    <i class="fa fa-edit"></i>
                    <span>1팀 전체 배당하기</span>
                </a>
            </li>

            <li>

                <a href="<?echo $host;?>/call/db_send.php?team=2팀">
                    <i class="fa fa-edit"></i>
                    <span>2팀 전체 배당하기</span>
                </a>

            </li>
            <li>

                <a href="<?echo $host;?>/call/db_send.php?team=3팀">
                    <i class="fa fa-edit"></i>
                    <span>3팀 전체 배당하기</span>
                </a>

            </li>
            <li>

                <a href="<?echo $host;?>/call/db_send.php?team=4팀">
                    <i class="fa fa-edit"></i>
                    <span>4팀 전체 배당하기</span>
                </a>

            </li>

        </ul>

    </li>

    <li>

        <a href="<? echo $host;?>/call/db_send_update.php">
            <i class="fa fa-edit"></i>
            <span>배당 수정하기</span>
        </a>

    </li>
    <li>

        <a href="<? echo $host;?>/call/team_list.php">
            <i class="fa fa-edit"></i>
            <span>직원 팀설정</span>
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

            <?
			
				for($i = 1; $i < 5; $i++){
				
			?>

            <li>

                <a href="<?echo $host;?>/admin/status_insert.php?status=<?echo $i;?>">
                    <i class="fa fa-edit"></i>
                    <span>
                        <?echo $i;?>번 상태 리스트
                    </span>
                </a>

            </li>

            <? } ?>

        </ul>

    </li>


    <li class="treeview">

        <a href="#">
            <i class="fa fa-files-o"></i>
            <span>전체 병원별 상담페이지</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>

        <ul class="treeview-menu">

            <?
                        
                $select = "select t_doc, t_name from adm_doc where t_check = 'Y'";
                $rs = mysqlI_query($connect, $select);
                
                while($row = mysqli_fetch_array($rs)){  
                
            ?>

            <li>
                <!-- t_doc : 병원 코드, t_name : 병원이름 -->
                <a href="<?echo $host;?>/call/doc.php?doc=<?echo $row['t_doc'];?>">
                    <i class="fa fa-edit"></i>
                    <span>
                        <?echo $row['t_name'];?> 상담페이지
                    </span>
                </a>

            </li>

            <?
            
                }
        
            ?>

        </ul>
    </li>

    <li class="treeview">

        <a href="#">
            <i class="fa fa-files-o"></i>
            <span>전체 병원별 달력</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>

        <ul class="treeview-menu">
            <?php 
                $select = "select t_doc,t_name from adm_doc where t_check = 'Y'";
                $rs = mysqli_query($connect, $select);

                while($row = mysqli_fetch_array($rs)){

            ?>

            <li>
                <a href="<?echo $host;?>/call/calenddar_doc.php?doc=<?echo $row['t_doc'];?>">
                    <i class="fa fa-edit"></i>
                    <span>
                        <?echo $row['t_name'];?>달력현황
                    </span>
                </a>
            </li>

            <?php } ?>

        </ul>

    </li>


</ul>


<?php
} 
?>


<ul class="sidebar-menu" data-widget="tree">

    <li class="header">TM 메뉴</li>

    <li>

        <a href="<? echo $host;?>/call/db.php">
            <i class="fa fa-edit"></i>
            <span>나의 상담페이지</span>
        </a>

    </li>
    <li>

        <a href="<? echo $host;?>/call/calendar.php">
            <i class="fa fa-edit"></i>
            <span>나의 달력보기</span>
        </a>

    </li>
    <li>

        <a href="<? echo $host;?>/call/day.php">
            <i class="fa fa-edit"></i>
            <span>업무일지</span>
        </a>

    </li>
    <li>

        <a href="<? echo $host;?>/call/db_insert.php">
            <i class="fa fa-edit"></i>
            <span>수동입력</span>
        </a>

    </li>

    <li class="treeview">

        <a href="#">
            <i class="fa fa-files-o"></i>
            <span>
                <?echo $t_member_team;?> 상담페이지
            </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>

        <ul class="treeview-menu">

            <?
						
				$select = "select t_doc, t_name from adm_doc where t_check = 'Y' and t_team = '$t_member_team'";
				$rs = mysqlI_query($connect, $select);
				
				while($row = mysqli_fetch_array($rs)){  
				
			?>

            <li>

                <a href="<?echo $host;?>/call/doc.php?doc=<?echo $row['t_doc'];?>">
                    <i class="fa fa-edit"></i>
                    <span>
                        <?echo $row['t_name'];?> 상담페이지
                    </span>
                </a>

            </li>

            <?
			
				}
		
			?>

        </ul>

    </li>

    <li class="treeview">

        <a href="#">
            <i class="fa fa-files-o"></i>
            <span>
                <?echo $t_member_team;?> 병원 달력
            </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>

        <ul class="treeview-menu">

            <?
						
				$select = "select t_doc, t_name from adm_doc where t_check = 'Y' and t_team = '$t_member_team'";
				$rs = mysqlI_query($connect, $select);
				
				while($row = mysqli_fetch_array($rs)){  
				
			?>

            <li>

                <a href="<?echo $host;?>/call/calendar_doc.php?doc=<?echo $row['t_doc'];?>">
                    <i class="fa fa-edit"></i>
                    <span>
                        <?echo $row['t_name'];?> 달력현황
                    </span>
                </a>

            </li>

            <?
			
				}
		
			?>

        </ul>

    </li>

</ul>