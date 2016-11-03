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
	<style type="text/css">
		.well *{
			margin-left:5px;
		}
	</style>
</head>
<body>
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
				<h1 class="page-title" style="font-family:Helvetica Neue, Helvetica, Arial, sans-serif">网站列表
					<div class="btn-toolbar" style="float:right">
						<a class="btn btn-primary" href="<?php echo U('add');?>"><i class="icon-plus"></i>添加网站</a>
					</div>
				</h1>
				<div class="well">
					<form action="<?php echo U('index');?>" method="get">
						<label style="display: inline-block;">
							电脑主机:<input type="text" id="computer_name" name="computer_name" class="input-xxlarge" placeholder="电脑主机" value="<?php echo ($computer_name); ?>" style="margin-bottom: 0px;">
						</label>
						<input type="submit" class="btn btn-primary" value="搜索">
					</form>
				</div>
				<div class="well">
					<table class="table">
						 <thead>
							<tr>
								<th>序号</th>
								<th class="head1">电脑主机</th>
								<th class="head1">服务器</th>
								<th class="head1">网站名</th>
								<th class="head1">主机地址</th>
								<th class="head1">绑定端口</th>
								<th class="head0" style="width:10%">操作</th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($host)): $i = 0; $__LIST__ = $host;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$host): $mod = ($i % 2 );++$i;?><tr class="gradeX">
									<td><?php echo ($i + $num); ?></td>
									<td><?php echo ($host["computer_name"]); ?></td>
									<td><?php echo ($host["server_name"]); ?></td>
									<td><?php echo ($host["website_name"]); ?></td>
									<td><?php echo ($host["host_name"]); ?></td>
									<td><?php echo ($host["port"]); ?></td>
									<td class="center" style="padding-bottom:0px;padding-top:3px"> <a href="<?php echo U('edit?id='.$host['id']);?>" class="btn btn-primary btn-rounded"><i class="iconfa-pencil"></i> 编辑</a>
									<a href="<?php echo U('delete?id='.$host['id']);?>" class="btn btn-rounded" onClick="javascript:if(!confirm('确定要删除吗?')){return false;}"><i class="iconfa-remove"></i> 删除</a></td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
					</table>
				</div>
				<div class="technorati"><?php echo ($page); ?></div>
			</div>
		</div>
		<footer>
	<hr>
	
	<p class="pull-right"><a href="#">WebSite</a></p>
	
	
	<p>&copy; 2015 <a href="#">Portnine</a></p>
</footer>
	</div>
</body>
</html>