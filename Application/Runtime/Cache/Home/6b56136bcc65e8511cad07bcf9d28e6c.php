<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
<title>Tenmen后台管理系统</title>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" type="text/css" href="/Public/WebSite/lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/Public/WebSite/lib/bootstrap/css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="/Public/WebSite/stylesheets/theme.css">
<link rel="stylesheet" href="/Public/WebSite/stylesheets/page.css">
<link rel="stylesheet" href="/Public/WebSite/lib/font-awesome/css/font-awesome.css">

<script src="/Public/WebSite/lib/jquery-1.8.1.min.js" type="text/javascript"></script>
<!--
<script type="text/javascript" src="/Public/default/lib/jqplot/jquery.jqplot.min.js"></script>
<script src="/Public/default/lib/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/default/javascripts/graphDemo.js"></script>
-->
<!-- Demo page code -->

<style type="text/css">
	#line-chart {
		height:300px;
		width:800px;
		margin: 0px auto;
		margin-top: 1em;
	}
	.brand { font-family: georgia, serif; }
	.brand .first {
		color: #ccc;
		font-style: italic;
	}
	.brand .second {
		color: #fff;
		font-weight: bold;
	}
</style>

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="javascripts/html5.js"></script>
<![endif]-->

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="/Public/WebSite/lib/font-awesome/docs/assets/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/Public/WebSite/lib/font-awesome/docs/assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/Public/WebSite/lib/font-awesome/docs/assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/Public/WebSite/lib/font-awesome/docs/assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="/Public/WebSite/lib/font-awesome/docs/assets/ico/apple-touch-icon-57-precomposed.png">
<script type="text/javascript" src="/Public/WebSite/javascripts/common.js"></script>
<!-- 日期控件 -->
<script type="text/javascript" src="/Public/WebSite/javascripts/My97DatePicker/WdatePicker.js"></script>
	<script type="text/javascript">
	$(function(){
		$('#save').click(function(){
			if($('#name').val().trim() == ''){
				alert('请输入姓名');
				$('#name').focus();
				return false;
			}
			if($('#tel').val().trim() == ''){
				alert('请输入电话');
				$('#tel').focus();
				return false;
			}
			if($('#hid_info').val() == ''){
				if($('#info').val() == ''){
					alert('请选择客户详细资料');
					$('#info').focus();
					return false;
				}
			}
			if($('#risk').val().trim() == ''){
				alert('请输入客户最高风险承受指数');
				$('#risk').focus();
				return false;
			}else{
				if(!chkDecimal($('#risk').val().trim())){
					alert('客户最高风险承受指数必须是数字');
					$('#risk').focus();
					return false;
				}
			}
			if($('#profit').val().trim() == ''){
				alert('请输入最低预期收益指数');
				$('#profit').focus();
				return false;
			}else{
				if(!chkDecimal($('#profit').val().trim())){
					alert('最低预期收益指数必须是数字');
					$('#profit').focus();
					return false;
				}
			}
			$('form').submit();
		});
	});
	</script>
</head>
<body> 
	<form class="stdform stdform2" method="post" action="<?php echo U('customerDataInsert');?>" enctype="multipart/form-data">
		    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <ul class="nav pull-right" id="userinfo">
                    <li id="fat-menu" class="dropdown">
                        <a href="" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i><?php echo $_SESSION['username']; ?>
                            <i class="icon-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/Home/Login/logout"><span class="iconfa-off"></span> 退出登录</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="index.html"><span class="first">House</span> <span class="second">后台管理系统</span></a>
            </div>
        </div>
    </div>
		<div class="container-fluid">
			<div class="row-fluid">
				 <div class="span2">
	<div class="sidebar-nav">
		<?php if($typeUser['type'] == 0): ?><div class="nav-header" data-toggle="collapse" data-target="#dashboard-menu"><i class="icon-dashboard"></i>用户管理</div>
			<ul id="dashboard-menu" class="nav nav-list collapse in">
				<li><a href="/Home/User/index">用户管理</a></li>
			</ul><?php endif; ?>
		<div class="nav-header" data-toggle="collapse" data-target="#Input-menu"><i class="icon-dashboard"></i>数据录入</div>
		<ul id="Input-menu" class="nav nav-list collapse in">
			<?php if($typeUser['type'] == 0 or $typeUser['type'] == 1): ?><li><a href="/Home/Input/houseDataIndex">数据采集员录入</a></li><?php endif; ?>
			<?php if($typeUser['type'] == 0 or $typeUser['type'] == 3): ?><li><a href="/Home/Input/customerDataIndex">顾问录入</a></li><?php endif; ?>
			<?php if($typeUser['type'] == 0 or $typeUser['type'] == 2): ?><li><a href="/Home/Input/houseDataList">楼盘列表</a></li>
				<li><a href="/Home/Input/customerDataList">用户列表</a></li><?php endif; ?>
		</ul>
	</div>
</div>
				<div class="span10">
					<h1 class="page-title">录入客户数据
						<div class="btn-toolbar" style="float:right">
							<input type="button" class="btn" value="重置" id="reset">
							<input type="button" id="save" class="btn btn-primary" value="保存">
							<a href="javascript:void(0)" data-toggle="modal" class="btn" onClick="history.go(-1)">返回</a>
						</div>
					</h1>
					<div class="well">
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane active" id="home">
                                <label>姓名</label>
                                <span class="field">
									<input type="text" name="name" id="name" class="input-xxlarge" value="<?php echo ($customer["name"]); ?>"/>
								</span>
                                <label>电话</label>
                                <span class="field">
									<input type="text" name="tel" id="tel" class="input-xxlarge" value="<?php echo ($customer["tel"]); ?>"/>
								</span>
                                <label>客户详细资料</label>
                                <span class="field">
									<input type="file" name="info" id="info" class="input-xxlarge" />
								</span>
								<label>客户最高风险承受指数</label>
								<span class="field">
									<input type="text" name="risk" id="risk" class="input-xxlarge" value="<?php echo ($customer["risk"]); ?>"/>
								</span>
								<label>最低预期收益指数</label>
								<span class="field">
									<input type="text" name="profit" id="profit" class="input-xxlarge" value="<?php echo ($customer["profit"]); ?>"/>
								</span>
								<input type="hidden" name="hid_info" id="hid_info" value="<?php echo ($customer["info"]); ?>">
								<input type='hidden' id='id' name="id" value='<?php echo ($customer["id"]); ?>'>
							</div>
						</div>
					</div>
				</div>
			</div>
			<input type='hidden' id='hid_url' value='/Home/Input/customerDataIndex'>
			<footer>
	<hr>
	
	<p class="pull-right"><a href="#">House</a></p>
	
	
	<p>&copy; 2015 <a href="#">Portnine</a></p>
</footer>
		</div>
	</form>
</body>
</html>