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
        <div class="t-item t-active">上传材料</div>
        <?php if(is_array($side)): $i = 0; $__LIST__ = $side;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="t-item" onclick="window.location.href='<?php echo ($vo[url]); ?>'"><?php echo ($vo['name']); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>

    </div>
    <div class="container">
        
    <div class="header"><span class="glyphicon glyphicon-home"></span> 上传材料</div>
    <div class="section item">
        <div class="i-content">
            <div class="i-form">
                <form id="i-add" method="post">
                    <div class="f-teach">
                        <div class="f-group">
                            说明：为了方便资料的收集、整理与统计，统一使用PDF文件上传。<br/>
                            教程：<a href="http://jingyan.baidu.com/article/dca1fa6f866c26f1a44052ea.html" target="_blank">【百度经验】word转pdf教程</a>
                        </div>
                    </div>
                    <div class="f-group">
                        <label class="f-label col-xs-3">标题</label>
                        <input class="f-input col-xs-9" type="text" name="title" required>
                    </div>
                    <div class="f-group">
                        <label class="f-label col-xs-3">类型</label>
                        <select name="type_id">
                            <?php if(is_array($side)): $i = 0; $__LIST__ = $side;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>"><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <div class="f-group">
                        <label class="f-label col-xs-3">附件</label>
                        <div class="f-upload-group col-xs-9">
                            <input id="f-file" class="f-file" name="f-file" type="file" accept=".pdf">
                            <button class="f-btn btn btn-danger" name="file" type="button">上传</button>
                            <input class="f-url" type="hidden" name="url" value="">
                            <div class="f-tips"> * . pdf ; 限制30MB</div>
                        </div>
                    </div>
                    <div class="f-group" style="height: 150px">
                        <label class="f-label col-xs-3">说明</label>
                        <textarea name="remark"></textarea>
                    </div>
                    <div class="f-btn-group">
                        <button id="btn-submit" class="btn btn-success" type="button">提交</button>
                    </div>
                </form>
            </div>
            <div id="modal-pdf" class="i-pdf"></div>
        </div>
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
    <script src="/SZTZ2.0/Public/application/Common/js/ajaxfileupload.js" type="text/javascript"></script>
<script type="text/javascript">
    var uploadFiles =  function(options){
        var file = ""; //返回的file
        var flag = false; //请求是否成功
        var my = this; //获取当前对象
        options = $.extend({
            initialize : function(){
                //前置函数
            },
            url : "<?php echo U('Index/ajaxUploadFile');?>", //处理图片的脚本路径
            fileElementId : "", //file控件ID 和 名称
            data : {}, //附加参数
            callback : function(file,status){
                //回调函数
            }
        }, options);
        this.initialize = options.initialize; //前置函数
        this.callback = options.callback; //回调函数
        this.startUpload = function(){
            my.initialize();
            $.ajaxFileUpload({
                url : options.url,   //处理图片的脚本路径
                type : 'post',       //提交的方式
                secureuri : false,   //是否启用安全提交
                fileElementId : options.fileElementId,    //file控件ID 和 名称
                dataType : 'json',  //服务器返回的数据类型
                data : options.data,
                success : function (data){  //提交成功后自动执行的处理函数
                    flag = true;
                    var reg = /<pre.+?>(.+)<\/pre>/g; //正则表达式
                    data.match(reg); //html转json字符串
                    data = RegExp.$1; //获取json字符串
                    file = $.parseJSON(data); //json字符串转对象
                },
                error : function(data, status, e){   //提交失败自动执行的处理函数
                    flag = false;
                    file = e;
                },
                complete : function(){  //请求完成后回调函数 (请求成功或失败之后均调用)
                    my.callback(file,flag);
                }
            });
        };
        return my;
    };
</script>

<script src="/SZTZ2.0/Public/application/Common/js/base.js" type="text/javascript"></script>
<script src="/SZTZ2.0/Public/application/Common/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="/SZTZ2.0/Public/application/Student/js/student.js" type="text/javascript"></script>
    <script type="text/javascript">
        $("#msg").click(function(){
            window.location.href='<?php echo U('Student/message');?>'
        });
        $("#btn-submit").on('click',function(){
            $.ajax({
                cache: true,
                type: "POST",
                url: "<?php echo U('Student/saveItem');?>",
                data: $('#i-add').serialize(),// 你的formid
                async: false,
                error: function(data) {
                    alert("操作发生异常");
                },
                success: function(data) {
                    if(data.status){
                        alert("操作成功");
                        window.location.reload(true);
                    }else{
                        alert(data.msg);
                    }
                }
            });
        });
    </script>

</body>
</html>