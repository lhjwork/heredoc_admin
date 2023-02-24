
</head>

<body class="hold-transition skin-blue sidebar-mini">

	<div class="wrapper">

	<header class="main-header">
		
		<a href="" class="logo">
			<span class="logo-mini"><b>Consult</span>
			<span class="logo-lg">Consult</span>
		</a>
		<nav class="navbar navbar-static-top">
			
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">메뉴 버튼</span>
			</a>
			
			<ul class="nav navbar-top-links navbar-right" style="margin-right: 10px;margin-top: 5px">
				
				<li>
					<a href="<? echo $host;?>/logout.php">
						<i class="fa fa-sign-out"></i> 로그아웃
					</a>
				</li>
		
			</ul>
			
		</nav>
		
	</header>
	
	<aside class="main-sidebar">
		
		<section class="sidebar">
			
			<div class="user-panel">

				<div class="pull-left image">
					<img src="https://ez-mc.com/admin_landing/dist/img/boxed-bg.jpg" class="img-circle" alt="User Image">
				</div>
			
				<a href="" data-target="#pw" data-toggle="modal">
					
					<div class="pull-left info" style="margin-left: 20px">
						<p><?echo $t_member_name;?> <?echo $t_member_rank;?></p>
						로그인 중입니다.
					</div>
				
				</a>
			
			</div>
			
			<?
			
				if($t_member_access == 'admin'){
					
					include_once('menu_admin.php'); 
					
				}else if($t_member_access == 'ad' || $t_member_access == 'ad_pm'){
					
					include_once('menu_ad.php'); 
					
				}else if($t_member_access == 'call' || $t_member_access == 'call_pm'){
					
					include_once('menu_call.php'); 
					
				}else if($t_member_access == 'jin'){
					include_once('menu_admin.php'); 
					include_once('menu_ad.php'); 
					include_once('menu_call.php');
				}
			
			?>
			
		</section>
		
	</aside>
	
	
	<div class="modal fade" id="modal-name">
		
		<div class="modal-dialog" style="width: 330px; margin-top: 200px">
		
			<div class="modal-content">
		
				<div class="modal-header">
			
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">이름수정</h4>
		   
				</div>
		   
				<div id="modal_name"></div>
				
			</div>
	
		</div>
	
	</div>
	
	<div class="modal fade" id="modal-data">
		
		<div class="modal-dialog" style="width: 70%; margin-top: 10px">
			
			<div class="modal-content">
		
				<div class="modal-header">
			
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">내용 확인</h4>
		   
				</div>
		   
		   		<div id="modal_data"></div>
				
			</div>
	
		</div>
	
	</div>
	
	<div class="modal fade" id="modal-update-day">
		
		<div class="modal-dialog" style="width: 30%; margin-top: 200px">
			
			<div class="modal-content">
		
				<div class="modal-header">
			
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">업무일지</h4>
		   
				</div>
		   
				<div id="modal_update_day"></div>
				
			</div>
	
		</div>
	
	</div>
	<div class="modal fade" id="modal-insert-day">
		
		<div class="modal-dialog" style="width: 30%; margin-top: 200px">
			
			<div class="modal-content">
		
				<div class="modal-header">
			
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">업무일지</h4>
		   
				</div>
		   
				<div id="modal_insert_day"></div>
				
			</div>
	
		</div>
	
	</div>
	
	<script>
		
		function modal_insert_day(t_no){
			
			$.ajax({
					 
				url: '<?echo $host;?>/data/day_insert_data.php?t_no=' + t_no + '&t_member_id=<?echo $t_member_id;?>',
				dataType : 'html' ,
				success: function(data) {
				  
				  $("#modal_insert_day").html(data);
				  
				}
						
			});
			
		}
		
		function modal_update_day(t_no){
			
			$.ajax({
					 
				url: '<?echo $host;?>/data/day_update_data.php?t_no=' + t_no,
				dataType : 'html' ,
				success: function(data) {
				  
				  $("#modal_update_day").html(data);
				  
				}
						
			});
			
		}
		
		function modal_name(t_no){
			
			$.ajax({
					 
				url: '<?echo $host;?>/data/name_data.php?t_no=' + t_no,
				dataType : 'html' ,
				success: function(data) {
				  
				  $("#modal_name").html(data);
				  
				}
						
			});
			
		}
		
		function modal_data(t_no){
			
			$.ajax({
					 
				url: '<?echo $host;?>/data/db_data.php?t_no=' + t_no,
				dataType : 'html' ,
				success: function(data) {
				  
				  $("#modal_data").html(data);
				  
				}
						
			});
			
		}
		
		
		
	</script>