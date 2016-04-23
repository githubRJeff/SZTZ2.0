<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="北京理工大学珠海学院商学院素质拓展活动学分认定系统">
    <link rel="shortcut icon" href="/SZTZ2.0/Public/application/Common/img/favicon.ico">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Cache" content="no-cache">
    <title>素质拓展活动学分认定系统</title>
    <meta name="keywords" content="素质拓展,学分认定,商学院,北京理工大学珠海学院">
    <link type="text/css" rel="stylesheet" href="/SZTZ2.0/Public/application/Common/css/base.css">
    <script src="/SZTZ2.0/Public/jquery/dist/jquery.min.js" type="text/javascript"></script>
    
    <link type="text/css" rel="stylesheet" href="/SZTZ2.0/Public/application/Student/css/student.css">

</head>
<body>
<div class="layout">
    <div class="menu">
        <div class="m-datetime">
            <div class="m-time"></div>
            <div class="m-date"></div>
        </div>
        <div class="m-nav">
            <a class="col-xs-4" data-toggle="modal" data-target="#modal-person">
                <img class="m-ico" src="/SZTZ2.0/Public/application/Common/img/person.png">
                <div class="m-text">个人</div>
            </a>
            <a id="msg" class="col-xs-4">
                <img class="m-ico" src="/SZTZ2.0/Public/application/Common/img/message.png">
                <div class="m-text">消息</div>
                <div class="m-read-tips"><?php echo ($msgCount); ?></div>
            </a>
            <a class="col-xs-4" onclick="window.location.href='<?php echo U('Index/exitSystem');?>'">
                <img class="m-ico" src="/SZTZ2.0/Public/application/Common/img/exit.png">
                <div class="m-text">退出</div>
            </a>
        </div>
        
    <div class="typeList">
        <div class="t-item t-active">首页</div>
        <?php if(is_array($side)): $i = 0; $__LIST__ = $side;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="t-item" onclick="window.location.href='<?php echo ($vo[url]); ?>'"><?php echo ($vo['name']); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>

    </div>
    <div class="container">
        
    <div class="header"><span class="glyphicon glyphicon-home"></span> 首页</div>
    <div class="section welcome">
        <div class="w-title">欢迎使用素质拓展活动学分认定系统！</div>
        <div class="w-tips">本次登录IP为：<?php echo ($note["login_ip"]); ?> | 上次登录时间为：<?php if(empty($note['created_at'])): ?>暂无记录<?php endif; echo ($note["created_at"]); ?></div>
        <div class="w-content">
            <div class="col-xs-4">
                <div class="w-small-title">学生信息</div>
                <div class="w-small-content">
                    <div class="w-small-row"><span class="w-ico glyphicon glyphicon-barcode"></span> 学号：<?php echo ($user[C('USERID')]); ?></div>
                    <div class="w-small-row"><span class="w-ico glyphicon glyphicon-user"></span> 姓名：<?php echo ($user[C('NAME')]); ?></div>
                    <div class="w-small-row"><span class="w-ico glyphicon glyphicon-stats"></span> 班级：<?php echo ($user[C('GRADE')]); ?>级 <?php echo ($user[C('CLASS')]); ?>班</div>
                    <div class="w-small-row"><span class="w-ico glyphicon glyphicon-education"></span> 专业：<?php echo ($user[C('PROFESSION')]); ?></div>
                    <div class="w-small-row"><span class="w-ico glyphicon glyphicon-earphone"></span> 联络方式：<?php echo ($user[C('MOBILE')]); ?></div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="w-small-title">导师信息</div>
                <div class="w-small-content">
                    <div class="w-small-row"><span class="w-ico glyphicon glyphicon-barcode"></span> 工号：<?php echo ($user[C('TEACHERID')]); ?></div>
                    <div class="w-small-row"><span class="w-ico glyphicon glyphicon-user"></span> 姓名：<?php echo ($user[C('TEACHERNAME')]); ?></div>
                    <div class="w-small-row"><span class="w-ico glyphicon glyphicon-earphone"></span> 联络方式：<?php echo ($user[C('TEACHERMOBILE')]); ?></div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="w-small-title">快捷操作</div>
                <div class="w-small-content">
                    <div class="w-small-row w-small-href" onclick="window.location.href='<?php echo U('Student/addItem');?>'"><span class="w-ico glyphicon glyphicon-edit"></span> 快速添加</div>
                    <div class="w-small-row w-small-href" onclick="window.location.href='<?php echo U('Student/report');?>'"><span class="w-ico glyphicon glyphicon-list-alt"></span> 统计分析</div>
                </div>
            </div>
        </div>
    </div>
    <div class="section notice">
        <div class="n-title">通知</div>
        <div class="n-tips">更新时间：<?php echo ($notice['updated_at']); ?></div>
        <div class="n-content"><?php echo ($notice['content']); ?></div>
    </div>
    <div class="section analysis">
        <div class="a-title">综合认定情况<div class="a-result">要求 <span class="a-request"><?php echo ($user[C('REQUIREDPOINT')]); ?></span> 学分，已修<span class="a-sum">0</span>分，还有<span class="a-count">0</span>个必修项未满要求</div></div>
        <div class="a-tips">更新时间：<span class="a-tips-date"></span></div>
        <table class="table table-check-point">
            <thead>
                <tr>
                    <th>科目名称</th>
                    <th>已修学分</th>
                    <th>最低要求</th>
                    <th>最大限制</th>
                    <th>科目性质</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($cognizanceReport)): $i = 0; $__LIST__ = $cognizanceReport;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($vo['type']); ?></td>
                        <td><span class="t-nowPoint"><?php echo ($vo['sum_point']); ?></span>分</td>
                        <td><span class="t-minPoint"><?php echo ($vo['min_point']); ?></span>分</td>
                        <td><span class="t-maxPoint"><?php echo ($vo['max_point']); ?></span>分</td>
                        <td class="t-tag"><?php echo ($vo['property']); ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
    <div class="footer">©2015 <a href="http://shang.xy.zhbit.com/" target="_blank">北京理工大学珠海学院商学院</a> 版权所有</div>

    </div>
</div>
<script type="text/javascript">
    var appRoot = "/SZTZ2.0";
    var appPublic = "/SZTZ2.0/Public";
    var appUpload = "<?php echo C('UPLOAD_STATIC_SITE');?>";
</script>
<style type="text/css">
    #modal-person .modal-body{
        padding-top: 5px;
    }
    .user{
        font-size: 14px;
        margin-top: 5px;
    }

    .u-row{
        line-height: 26px;
    }

    .u-ico{
        color: #0d5381;
    }
    .u-password{
        text-align: center;
        border-top: 1px solid #ccc;
        margin-top: 10px;
        padding-top: 10px;
    }
    .u-form{
        display: none;
    }
    .f-group{
        height: 30px;
        margin-bottom: 10px;
        position: relative;
    }
    .f-label{
        text-align: right;
        padding-right: 5px;
        line-height: 30px;
    }
    .f-input{
        padding: 5px;
    }
    #f-btn{
        width: 100px;
    }
</style>
<div id="modal-person" class="modal fade bs-example-modal-sm" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">个人信息</h4>
            </div>
            <div class="modal-body">
                <div class="user">
                    <?php if($user[C('USERTYPE')] == 'student'): ?><div class="u-row"><span class="u-ico glyphicon glyphicon-barcode"></span> 学　　号：<?php echo ($user[C('USERID')]); ?></div>
                        <div class="u-row"><span class="u-ico glyphicon glyphicon-user"></span> 姓　　名：<?php echo ($user[C('NAME')]); ?></div>
                        <div class="u-row"><span class="u-ico glyphicon glyphicon-stats"></span> 班　　级：<?php echo ($user[C('GRADE')]); ?>级 <?php echo ($user[C('CLASS')]); ?>班</div>
                        <div class="u-row"><span class="u-ico glyphicon glyphicon-education"></span> 专　　业：<?php echo ($user[C('PROFESSION')]); ?></div>
                        <div class="u-row"><span class="u-ico glyphicon glyphicon-earphone"></span> 联络方式：<?php echo ($user[C('MOBILE')]); ?></div>
                    <?php elseif($user[C('USERTYPE')] == 'teacher'): ?>
                        <div class="u-row"><span class="u-ico glyphicon glyphicon-barcode"></span> 工　　号：<?php echo ($user[C('USERID')]); ?></div>
                        <div class="u-row"><span class="u-ico glyphicon glyphicon-user"></span> 姓　　名：<?php echo ($user[C('NAME')]); ?></div>
                        <div class="u-row"><span class="u-ico glyphicon glyphicon-earphone"></span> 联络方式：<?php echo ($user[C('MOBILE')]); ?></div>
                    <?php else: ?>
                        <div class="u-row"><span class="u-ico glyphicon glyphicon-barcode"></span> 工　　号：<?php echo ($user[C('USERID')]); ?></div>
                        <div class="u-row"><span class="u-ico glyphicon glyphicon-user"></span> 姓　　名：<?php echo ($user[C('NAME')]); ?></div><?php endif; ?>
                    <div class="u-row u-password">
                        <button class="btn btn-primary" type="button">修改密码</button>
                        <div class="u-form">
                            <form id="updatePassword" method="post">
                                <div class="f-group">
                                    <label class="f-label col-xs-3">原密码</label>
                                    <input class="f-input col-xs-9" type="password" name="oldPassword" required>
                                </div>
                                <div class="f-group">
                                    <label class="f-label col-xs-3">新密码</label>
                                    <input class="f-input col-xs-9" type="password" name="newPassword" required>
                                </div>
                                <div class="f-group">
                                    <label class="f-label col-xs-3">确认密码</label>
                                    <input class="f-input col-xs-9" type="password" name="resetPassword" required>
                                </div>
                                <button id="f-btn" class="btn btn-success" type="button">保存</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    (function($,document,window){
        $(".u-password").find("button").click(function(){  //点击修改密码时切换到表单
            $(this).hide();
            $(".u-form").show();
        });
        $('#modal-person').on('hidden.bs.modal', function (e) {  //模态框消失时恢复初始状态
            $(".u-password").find("button").show();
            $(".u-form").hide();
            $(".f-input").val("");
        });
        $("#f-btn").click(function(){ //异步提交表单
            $.ajax({
                cache: true,
                type: "POST",
                url: "<?php echo U('Index/updatePassword');?>",
                data:$('#updatePassword').serialize(),// 你的formid
                async: false,
                error: function(data) {
                    alert("保存异常");
                },
                success: function(data) {
                    if(data.status){
                        $(".u-password").find("button").show();
                        $(".u-form").hide();
                        $(".f-input").val("");
                        alert("保存成功");
                    }else{
                        $("#f-btn").show();
                        alert(data.msg);
                    }
                }
            });
        });
    })(jQuery,document,window);
</script>

<script src="/SZTZ2.0/Public/application/Common/js/base.js" type="text/javascript"></script>
<script src="/SZTZ2.0/Public/application/Common/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="/SZTZ2.0/Public/application/Student/js/student.js" type="text/javascript"></script>
    <script type="text/javascript">
        $("#msg").click(function(){
            window.location.href='<?php echo U('Student/message');?>'
        });
    </script>

</body>
</html>