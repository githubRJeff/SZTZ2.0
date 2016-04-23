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
        <div class="t-item" onclick="window.location.href='<?php echo U('Student/index');?>'">首页</div>
        <?php if(is_array($side)): $i = 0; $__LIST__ = $side;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($type == $vo['id']): ?><div class="t-item t-active" onclick="window.location.href='<?php echo ($vo[url]); ?>'"><?php echo ($vo['name']); ?></div>
            <?php else: ?>
                <div class="t-item" onclick="window.location.href='<?php echo ($vo[url]); ?>'"><?php echo ($vo['name']); ?></div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </div>

    </div>
    <div class="container">
        
    <div class="header">
        <span class="glyphicon glyphicon-home"></span> <span class="h-title"></span>
        <a class="h-add" onclick="window.location.href='<?php echo U('Student/addItem');?>'">
            <img class="h-img" src="/SZTZ2.0/Public/application/Student/img/addItem.png">
            <div class="h-text">添加</div>
        </a>
    </div>
    <div class="section analysis">
        <div class="a-title">学分认定情况</div>
        <div class="a-tips">更新时间：<span class="a-tips-date"></span>
            <div class="a-tips-detail">
                <span class="a-tips-item">已修学分：<?php echo ($detail['sum_point']); ?>分</span>
                <span class="a-tips-item">最低要求：<?php echo ($detail['min_point']); ?>分</span>
                <span class="a-tips-item">最大限制：<?php echo ($detail['max_point']); ?>分</span>
                <span class="a-tips-item">科目性质：<?php echo ($detail['property']); ?></span>
            </div>
        </div>

        <table class="table table-check-status a-table">
            <thead>
                <tr>
                    <th>标题</th>
                    <th width="100px">状态</th>
                    <th width="80px">上传时间</th>
                    <th width="80px">审批时间</th>
                    <th width="50px">得分</th>
                    <th width="40px">附件</th>
                    <th width="40px">操作</th>
                </tr>
            </thead>
            <tbody>
            <?php if(empty($subjectReport)): ?><tr><td class="t-empty" colspan="11">暂无提交记录</td></tr><?php endif; ?>
            <?php if(is_array($subjectReport)): $i = 0; $__LIST__ = $subjectReport;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td class="t-title"><span onclick="window.location.href='<?php echo ($vo['detail_url']); ?>'"><?php echo ($vo['title']); ?></span></td>
                    <td class="t-status"><?php echo ($vo['status']); ?></td>
                    <td><?php echo ($vo['created_at']); ?></td>
                    <td><?php echo ($vo['updated_at']); ?></td>
                    <td><?php echo ($vo['point']); ?></td>
                    <td class="t-file" data-url="<?php echo ($vo['file_url']); ?>" data-toggle="modal" data-target="#modal-file">
                        <img class="t-ico" src="/SZTZ2.0/Public/application/Student/img/pdf.png">
                    </td>
                    <td class="t-delete">
                        <img class="t-ico" src="/SZTZ2.0/Public/application/Student/img/delete.png" data-value="<?php echo ($vo['delete_val']); ?>">
                    </td>
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

    <style type="text/css">
    #modal-file .modal-dialog{
        height: 90%;
    }
    #modal-file .modal-content{
        height: 100%;
    }
    #modal-file .modal-body{
        height:90%;
    }
    #modal-file .modal-pdf{
        height: 100%;
        background: url("/SZTZ2.0/Public/application/Student/img/pdfError.png") center no-repeat;
    }
</style>

<div id="modal-file" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">PDF文件预览</h4>
            </div>
            <div class="modal-body">
                <div id="modal-pdf" class="modal-pdf"></div>
            </div>
        </div>
    </div>
</div>

<script src="/SZTZ2.0/Public/application/Common/js/pdfobject.js" type="text/javascript"></script>
<script type="text/javascript">
    var myPDF = new PDFObject({
        url: appRoot+"/Uploads/test/default.pdf",
        id: "modal-pdf",
        width: "100%",
        height: "100%",
        pdfOpenParams: {
            navpanes: 1,
            statusbar: 1,
            view: "FitH",
            pagemode: "thumbs"
        }
    });
    myPDF.embed("modal-pdf");
</script>

<script src="/SZTZ2.0/Public/application/Common/js/base.js" type="text/javascript"></script>
<script src="/SZTZ2.0/Public/application/Common/js/bootstrap.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $("#msg").click(function(){
            window.location.href='<?php echo U('Student/message');?>'
        });
        var deleteUrl = "<?php echo U('Student/deleteItem');?>";
    </script>
    <script src="/SZTZ2.0/Public/application/Student/js/student.js" type="text/javascript"></script>

</body>
</html>