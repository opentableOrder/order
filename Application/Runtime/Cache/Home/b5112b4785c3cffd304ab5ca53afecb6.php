<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($web_title); ?></title>
    <link rel="stylesheet" href="//cdn.bootcss.com/zui/1.5.0/css/zui.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/zui/1.5.0/lib/datatable/zui.datatable.min.css">
    <style type="text/css">
        #page_container a, .current {
            position: relative;
            float: left;
            padding: 5px 12px;
            margin-left: -1px;
            line-height: 1.53846154;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
        }
        #page_container a
    </style>

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
    <div class="row" style="margin-top: 35px;">
        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="请输入搜索内容">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary" type="button">搜索</button>
            <a href="<?php echo U('Active/add');?>" class="btn"  style="margin-left: 20px;padding:5px 20px; ">报名</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="margin-top: 20px;">
            <table class="table datatable table-hover table-bordered">
                <!--<thead>
                    <tr>
                        <th>活动名称</th>
                        <th>海报</th>
                        <th>详情</th>
                        <th>开始时间</th>
                        <th>结束时间</th>
                        <th>报名截止时间</th>
                    </tr>
                </thead>
                <tbody id="data_container">
                    <tr>
                        <td>活动1</td>
                        <td>海报</td>
                        <td>详情</td>
                        <td>2016-10-12</td>
                        <td>016-10-22</td>
                        <td>2016-10-8</td>
                    </tr>
                    <tr>
                        <td>活动2</td>
                        <td>海报</td>
                        <td>详情</td>
                        <td>2016-10-12</td>
                        <td>016-10-22</td>
                        <td>2016-10-8</td>
                    </tr>
                    <tr>
                        <td>活动3</td>
                        <td>海报</td>
                        <td>详情</td>
                        <td>2016-10-12</td>
                        <td>016-10-22</td>
                        <td>2016-10-8</td>
                    </tr>
                    <tr>
                        <td>活动4</td>
                        <td>海报</td>
                        <td>详情</td>
                        <td>2016-10-12</td>
                        <td>016-10-22</td>
                        <td>2016-10-8</td>
                    </tr>
                    <tr>
                        <td>活动5</td>
                        <td>海报</td>
                        <td>详情</td>
                        <td>2016-10-12</td>
                        <td>016-10-22</td>
                        <td>2016-10-8</td>
                    </tr>
                </tbody>-->
            </table>
        </div>
    </div>
    <div class="row">
        <div id="page_container" class="col-md-9 col-md-offset-3">

        </div>
    </div>

        </div>
    </div>
</div>
<!-- ZUI Javascript 依赖 jQuery -->
<script src="//cdn.bootcss.com/zui/1.5.0/lib/jquery/jquery.js"></script>
<!-- ZUI 标准版压缩后的 JavaScript 文件 -->
<script src="//cdn.bootcss.com/zui/1.5.0/js/zui.min.js"></script>

    <script type="text/javascript" src="/order/Public/Plus/zui.datatable.min.js"></script>
    <script type="text/javascript">
        $(function() {
            function formatDate(now) {
                var   year=now.getFullYear();
                var   month=now.getMonth()+1;
                var   date=now.getDate();
                var   hour=now.getHours();
                var   minute=now.getMinutes();
                if (minute < 10) {
                    minute = '0' + minute;
                }
                var   second=now.getSeconds();
                return   year+"-"+month+"-"+date+"   "+hour+":"+minute;
            }
            /*$('table.datatable').datatable({
                data : {
                    cols : [
                        {text: '活动名称', type: 'string'},
                        {text: '海报', type: 'string'},
                        {text: '详情', type: 'string'},
                        {text: '开始时间', type: 'string'},
                        {text: '结束时间', type: 'string'},
                        {text: '报名截止时间', type: 'string'}
                    ],
                    rows: [
                        {data:['活动1', '', '', '2016-10-18', '2016-10-29', '2016-10-12']},
                        {data:['活动2', '', '', '2016-10-18', '2016-10-29', '2016-10-12']},
                        {data:['活动3', '', '', '2016-10-18', '2016-10-29', '2016-10-12']}
                    ]
                }
            });*/
            function getData(url) {
                $.ajax({
                    url : url,
                    type : 'get',
                    dataType : 'json',
                    data : {

                    },
                    success : function(data) {
                        alert('1');
                        if (data.status === 1) {
                            var arr = [];
                            for (var i = 0; i < data.data.length; i++) {
                                var row = [];
                                row[0] = data.data[i].name;
                                row[1] = "";
                                row[2] = "";

                                //row[3] = formatDate(new Date(data.data[i].star));
                                row[3] = formatDate(new Date(data.data[i].star * 1000));
                                row[4] = formatDate(new Date(data.data[i].end * 1000));
                                row[5] = formatDate(new Date(data.data[i].cut_date * 1000));
                                arr[i] = {data : row}
                            }
                            //var str = '';
                            /*for (var i = 0; i < data.data.length; i++) {
                                str += '<tr>'
                                str += '<td>' + data.data[i].name + '</td>';
                                str += '<td></td>';
                                str += '<td></td>';
                                str += '<td>' + formatDate(new Date(data.data[i].star * 1000)) + '</td>';
                                str += '<td>' + formatDate(new Date(data.data[i].end * 1000)) + '</td>';
                                str += '<td>' + formatDate(new Date(data.data[i].cut_date * 1000)) + '</td>';
                                str += '</tr>';
                            }*/
                            //$('#data_container').html(str);
                            $('#page_container').html(data.page);
                            $('table.datatable').datatable('load', {
                                cols : [
                                    {text: '活动名称', type: 'string'},
                                    {text: '海报', type: 'string'},
                                    {text: '详情', type: 'string'},
                                    {text: '开始时间', type: 'string'},
                                    {text: '结束时间', type: 'string'},
                                    {text: '报名截止时间', type: 'string'}
                                ],
                                rows: arr
                            });
                        }

                    }
                });
            }
            getData("<?php echo U('Active/getActivities');?>");
            $('#page_container').on('click', 'a', function() {
                //alert($(this).attr('href'));
                getData($(this).attr('href'));
                return false;
            });
        });
    </script>

</body>
</html>