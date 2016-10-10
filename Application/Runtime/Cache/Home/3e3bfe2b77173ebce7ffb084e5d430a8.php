<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($web_title); ?></title>
    <link rel="stylesheet" href="//cdn.bootcss.com/zui/1.5.0/css/zui.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/zui/1.5.0/lib/datetimepicker/datetimepicker.css">
    <link rel="stylesheet" href="/order/Public/Plus/uploadify/uploadify.css">

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
            
    <h2 class="text-center"><?php echo ($web_title); ?></h2>
    <form action="<?php echo U('Active/updateImg');?>" method="post" enctype="multipart/form-data">
        <div class="row" style="margin-top: 35px;">
            <div class="col-md-5 col-md-offset-3">
                <label>活动名称</label>
                <input id="act_name" name="act_name" type="text" class="form-control" placeholder="请输入活动名称">
            </div>
            <div class="col-md-5 col-md-offset-3" style="margin-top: 15px;">
                <label>活动类型</label>
                <select id="act_type" name="act_name" class="form-control">
                    <option value="1">校企招聘会</option>
                    <option value="2">培训班</option>
                    <option value="3">顶岗实习</option>
                    <option value="4">主题沙龙</option>
                    <option value="5">部门全员岗位定制培训</option>
                    <option value="6">专业人才订制培养</option>
                    <option value="7">学生课余兼职</option>
                    <option value="8">其他</option>
                </select>
            </div>
            <div class="col-md-5 col-md-offset-3" style="margin-top: 15px;">
                <label>上传海报</label>
                <input id="file_upload" name="file_upload" type="file">
            </div>
            <div class="col-md-5 col-md-offset-3" style="margin-top: 15px;">
                <label>开始时间</label>
                <input id="act_start" name="act_start" type="text" class="form-control form-datetime" placeholder="开始时间">
            </div>
            <div class="col-md-5 col-md-offset-3" style="margin-top: 15px;">
                <label>结束时间</label>
                <input id="act_end" name="act_end" type="text" class="form-control form-datetime" placeholder="结束时间">
            </div>
            <div class="col-md-5 col-md-offset-3" style="margin-top: 15px;">
                <label>报名截止时间</label>
                <input id="act_close" name="act_close" type="text" class="form-control form-datetime" placeholder="报名截止时间">
            </div>
            <div class="col-md-5 col-md-offset-3" style="margin-top: 15px;">
                <label>备注</label>
                <textarea id="bz" name="bz" rows="5" class="form-control" placeholder="请填写备注"></textarea>
            </div>
            <div class="col-md-5 col-md-offset-3" style="margin-top: 15px; margin-bottom: 10px;">
                <input id="btn-add" type="submit" style="padding: 5px 25px;" value="报名" class="btn btn-primary">
            </div>
        </div>
    </form>


        </div>
    </div>
</div>
<!-- ZUI Javascript 依赖 jQuery -->
<script src="//cdn.bootcss.com/zui/1.5.0/lib/jquery/jquery.js"></script>
<!-- ZUI 标准版压缩后的 JavaScript 文件 -->
<script src="//cdn.bootcss.com/zui/1.5.0/js/zui.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/zui/1.5.0/lib/datetimepicker/datetimepicker.js"></script>
    <script type="text/javascript" src="/order/Public/Plus/uploadify/jquery.uploadify.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var imgSavePath = '';
            //时间控件
            $(".form-datetime").datetimepicker({
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1,
                format: "yyyy-mm-dd hh:ii"
            });
            //图片上传
            $('#file_upload').uploadify({
                'swf'      : '/order/Public/Plus/uploadify/uploadify.swf',
                'uploader' : "<?php echo U('Active/updateImg');?>",
                'buttonClass': 'uploadify-button',
                'buttonText' : '上传',
                'fileTypeExts': '*.JPG;*.PNG;*.GIF',
                'onUploadSuccess': function (file, data, response) {
                    imgSavePath = data;
                }
            });
            //提交信息
            $('#btn-add').on('click', function() {
                $.ajax({
                    url : "<?php echo U('Active/addHandle');?>",
                    type : 'post',
                    data : {
                        'act_name' : $('#act_name').val(),
                        'act_type' : $('#act_type').val(),
                        'bp' : imgSavePath,
                        'start' : $('#act_start').val(),
                        'end' :  $('#act_end').val(),
                        'act_close' : $('#act_close').val(),
                        'bz' : $('#bz').val()
                    },
                    success : function(data) {
                        if (data !== '上传失败') {
                            location.href = data;
                        }
                    }
                });
                return false;
            });
        });
    </script>

</body>
</html>