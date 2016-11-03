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
	<style type="text/css">
		.well *{
			margin-left:5px;
		}
	</style>
</head>
<body> 
	<form method="post" action="<?php echo U('add');?>">
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
					<h1 class="page-title" style="font-family:Helvetica Neue, Helvetica, Arial, sans-serif">楼盘列表</h1>
					<div class="well">
						<table class="table">
							 <thead>
								<tr>
									<th>序号</th>
									<th class="head1">楼盘名</th>
									<th class="head1">编号</th>
									<th class="head1">楼盘详细资料</th>
									<th class="head1">楼盘风险指数</th>
									<th class="head1">楼盘收益指数</th>
									<th class="head1">录入时间</th>
									<th class="head1">录入人</th>
									<th class="head0" style="width:10%">操作</th>
								</tr>
							</thead>
							<tbody>
								<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="gradeX">
										<td><?php echo ($i + $num); ?></td>
										<td><?php echo ($vo["name"]); ?></td>
										<td><?php echo ($vo["code"]); ?></td>
										<td><a href="<?php echo ($vo["info"]); ?>" target="_blank"><?php echo ($vo["filename"]); ?></a></td>
										<td><?php echo ($vo["risk"]); ?></td>
										<td><?php echo ($vo["profit"]); ?></td>
										<td><?php echo ($vo["create_time"]); ?></td>
										<td><?php echo ($vo["username"]); ?></td>
										<td>
											<?php if($typeUser['type'] == 0 or $typeUser['type'] == 2): ?><a href="<?php echo U('houseDataIndex?id='.$vo['id']);?>" class="btn btn-primary btn-rounded"><i class="iconfa-pencil"></i> <?php if($typeUser['type'] != 2): ?>编辑<?php else: ?>查看<?php endif; ?></a><?php endif; ?>
										</td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</table>
					</div>
					<div class="technorati"><?php echo ($page); ?></div>
				</div>
			</div>
			<input type='hidden' id='hid_url' value='/Home/Input/houseDataList'>
			<footer>
	<hr>
	
	<p class="pull-right"><a href="#">House</a></p>
	
	
	<p>&copy; 2015 <a href="#">Portnine</a></p>
</footer>
		</div>
	</form>
</body>
</html>