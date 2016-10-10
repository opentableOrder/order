<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($web_title); ?></title>
    <link rel="stylesheet" href="//cdn.bootcss.com/zui/1.5.0/css/zui.min.css">
    
</head>
<body>
<div class="bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <h2>订餐系统</h2>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid" style="margin-top: 10px">
    <div class="row">
        <div class="col-md-2">
            
                <nav class="menu" data-toggle="menu" style="width: 200px; margin-top: 30px;">
                    <ul class="nav nav-primary">
                        <li><a href="javascript:;">店铺申请</a></li>
                        <li><a href="javascript:;">单位入驻</a></li>
                        <li><a href="javascript:;">广告</a></li>
                        <li><a href="javascript:;">消息</a></li>
                        <li><a href="<?php echo U('Active/index');?>">活动管理</a></li>
                        <li><a href="javascript:;">设置</a></li>
                    </ul>
                </nav>
            
        </div>
        <div class="col-md-10">
            <!--右边主题内容-->
        </div>
    </div>
</div>
<!-- ZUI Javascript 依赖 jQuery -->
<script src="//cdn.bootcss.com/zui/1.5.0/lib/jquery/jquery.js"></script>
<!-- ZUI 标准版压缩后的 JavaScript 文件 -->
<script src="//cdn.bootcss.com/zui/1.5.0/js/zui.min.js"></script>
<!--js文件-->
</body>
</html>