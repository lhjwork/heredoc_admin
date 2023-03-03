<?
	
	include_once('../head.php');
	include_once('../menu.php'); 
	
	$t_team = $_GET['team'];
	
	$subject = $t_team.'별 배당 처리하기';
	
		
?>

?>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.js"></script>




<div class="content-wrapper">

    <section class="content-header">

        <h1>
            <? echo $subject;?>
            <small>
                <? echo $subject;?>
            </small>
        </h1>

        <ol class="breadcrumb">

            <li><a href=""><i class="fa fa-dashboard"></i> 홈</a></li>
            <li class="active">
                <? echo $subject;?>
            </li>

        </ol>

    </section>


    <section class="content">

        <div class="row">

            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header with-border">

                        <h3 class="box-title">
                            <? echo $subject;?>
                        </h3>

                    </div>

                    <div class="box-body"></div>

                </div>
            </div>

        </div>

    </section>



    <script src="<?echo $host;?>/css/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?echo $host;?>/css/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?echo $host;?>/css/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?echo $host;?>/css/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?echo $host;?>/css/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script src="<?echo $host;?>/css/bower_components/moment/min/moment.min.js"></script>
    <script src="<?echo $host;?>/css/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?echo $host;?>/css/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
    </script>
    <script src="<?echo $host;?>/css/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js">
    </script>
    <script src="<?echo $host;?>/css/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?echo $host;?>/css/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?echo $host;?>/css/plugins/iCheck/icheck.min.js"></script>
    <script src="<?echo $host;?>/css/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="<?echo $host;?>/css/dist/js/adminlte.min.js"></script>
    <script src="<?echo $host;?>/css/dist/js/demo.js"></script>
    <script src="<?echo $host;?>/css/bower_components/select2/dist/js/select2.full.min.js"></script>

    <script>
    $(function() {

        $('.select2').select2()

    })
    </script>

    <?
		
		include_once('../tail.php');
		
	?>