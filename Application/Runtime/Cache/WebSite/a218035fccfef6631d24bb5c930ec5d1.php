<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
<title>WebSite后台管理系统</title>
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
<script type="text/javascript" src="/Public/WebSite/lib/jqplot/jquery.jqplot.min.js"></script>
<script src="/Public/WebSite/lib/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/WebSite/javascripts/graphDemo.js"></script>
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
			if($('#computer_name').val().trim() == ""){
				alert("请输入电脑主机名称");
				$('#computer_name').focus();
				return false;
			}
			if($('#server_name').val().trim() == ""){
				alert("请输入服务器名称");
				$('#server_name').focus();
				return false;
			}
			if($('#website_name').val().trim() == ""){
				alert("请输入网站名称");
				$('#website_name').focus();
				return false;
			}
			if($('#host_name').val().trim() == ""){
				alert("请输入主机名");
				$('#host_name').focus();
				return false;
			}
			if($('#id').val() == ""){
				document.forms[0].action = "<?php echo U('insert');?>";
			}else{
				document.forms[0].action = "<?php echo U('update');?>";
			}
			document.forms[0].submit();
		});
		$('#back').click(function(){
			document.forms[0].action = "<?php echo U('index');?>";
			document.forms[0].submit();
		});
	});
	</script>
</head>
<body> 
	<form class="stdform stdform2" method="post" >
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
                            <li><a href="/WebSite/Login/logout"><span class="iconfa-off"></span> 退出登录</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="index.html"><span class="first">WebSite</span> <span class="second">后台管理系统</span></a>
            </div>
        </div>
    </div>
		<div class="container-fluid">
			<div class="row-fluid">
				 <div class="span2">
	<div class="sidebar-nav">
		<div class="nav-header" data-toggle="collapse" data-target="#Input-menu"><i class="icon-dashboard"></i>网站</div>
		<ul id="Input-menu" class="nav nav-list collapse in">
			<li><a href="/WebSite/Host/index">网站列表</a></li>
		</ul>
	</div>
</div>
				<div class="span10">
					<h1 class="page-title"><?php echo ($title); ?>
						<div class="btn-toolbar" style="float:right">
							<input type="reset" class="btn" value="重置" id="reset">
							<input type="button" id="save" class="btn btn-primary" value="保存">
							<a href="javascript:void(0)" data-toggle="modal" class="btn" onClick="history.go(-1)">返回</a>
						</div>
					</h1>
				
					<div class="well">
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane active" id="home">
								<label>电脑主机名称</label>
								<span class="field">
									<input type="text" autocomplete="off" name="computer_name" id="computer_name" class="input-xxlarge" value="<?php echo ($info['computer_name']); ?>" />
								</span>
								<label>电脑主机地址</label>
								<span class="field">
									<input type="text" autocomplete="off" name="host_addr" id="host_addr" class="input-xxlarge" value="<?php echo ($info['host_addr']); ?>" />
								</span>
								<label>服务器名称</label>
								<span class="field">
									<input type="text" autocomplete="off" name="server_name" id="server_name" class="input-xxlarge" value="<?php echo ($info['server_name']); ?>" />
								</span>
								<label>网站名称</label>
								<span class="field">
									<input type="text" autocomplete="off" name="website_name" id="website_name" class="input-xxlarge" value="<?php echo ($info['website_name']); ?>" />
								</span>
								<label>主机名</label>
								<span class="field">
									<input type="text" autocomplete="off" name="host_name" id="host_name" class="input-xxlarge" value="<?php echo ($info['host_name']); ?>" />
								</span>
								<label>绑定端口</label>
								<span class="field">
									<input type="text" autocomplete="off" name="port" id="port" class="input-xxlarge" value="<?php echo ($info['port']); ?>" />
								</span>
								<label>配置文件名</label>
								<span class="field">
									<input type="text" autocomplete="off" name="file_name" id="file_name" class="input-xxlarge" value="<?php echo ($info['file_name']); ?>" />
								</span>
								<input type="hidden" id="id" name="id" value="<?php echo ($id); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<input type='hidden' id='hid_url' value='/WebSite/Host/index'>
			<footer>
	<hr>
	
	<p class="pull-right"><a href="#">WebSite</a></p>
	
	
	<p>&copy; 2015 <a href="#">Portnine</a></p>
</footer>
		</div>
	</form>
</body>
</html>