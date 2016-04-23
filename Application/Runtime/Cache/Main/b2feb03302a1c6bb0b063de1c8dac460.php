<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="北京理工大学珠海学院商学院素质拓展活动学分认定系统">
    <link rel="shortcut icon" href="/SZTZ2.0/Public/application/Common/img/favicon.ico">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>素质拓展活动学分认定系统</title>
    <meta name="keywords" content="素质拓展,学分认定,商学院,北京理工大学珠海学院">
    <link type="text/css" rel="stylesheet" href="/SZTZ2.0/Public/application/Login/css/login.css">
</head>
<body>
    <img id="body-bg" src="/SZTZ2.0/Public/application/Login/img/backgroundColor.jpg">
    <img id="body-img" src="/SZTZ2.0/Public/application/Login/img/background.jpg">
    <div id="content">
        <div id="content-body">
            <div id="login">
                <div id="login-head">
                    <div id="login-title">素质拓展活动学分认定系统</div>
                </div>
                <div id="login-body">
                    <form action="<?php echo U('Login/index');?>" method="post" onsubmit="return is_empty();">
                        <div class="form-group">
                            <button type="button" class="btn dropdown-toggle form-select" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span id="select-text">学生</span> <span class="caret"></span></button>
                            <input id="select-type" type="hidden" name="userType" value="<?php echo ((isset($userType) && ($userType !== ""))?($userType):'student'); ?>">
                            <ul class="dropdown-menu" data-value="<?php echo ((isset($userType) && ($userType !== ""))?($userType):'student'); ?>">
                                <li><a class="active" data-value="student">学生</a></li>
                                <li><a data-value="teacher">教师</a></li>
                                <li><a data-value="administrator">管理员</a></li>
                            </ul>
                            <div class="form-logo glyphicon glyphicon-user col-xs-2"></div>
                            <input class="form-text col-xs-10" type="text" name="userName" placeholder="用户名" autocomplete="off" value="<?php echo ($userName); ?>" pattern="^[0-9]*[1-9][0-9]*$" title="请输入数字账号">
                            <span class="form-tips"><?php echo ($userNameError); ?></span>
                        </div>
                        <div class="form-group">
                            <div class="form-logo glyphicon glyphicon-link col-xs-2"></div>
                            <input class="form-text col-xs-10" type="password" name="password" placeholder="密码" autocomplete="off" value="<?php echo ($password); ?>">
                            <span class="form-tips"><?php echo ($passwordError); ?></span>
                        </div>
                        <div id="form-code" class="form-group">
                            <input class="form-text col-xs-12" type="text" name="code" placeholder="验证码" autocomplete="off" maxlength="4" autofocus>
                            <span class="form-tips"><?php echo ($codeError); ?></span>
                            <img id="codeImg" class="form-code" src="<?php echo U('Login/getCode');?>" title="点击刷新" alt="验证码">
                            <span id="change" class="form-code">换一个</span>
                        </div>
                        <input id="form-submit" class="form-control btn" type="submit" value="登录">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="footer">©2015 <a href="http://shang.xy.zhbit.com/" target="_blank">北京理工大学珠海学院商学院</a> 版权所有</div>
</body>
    <script src="/SZTZ2.0/Public/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="/SZTZ2.0/Public/application/Common/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/SZTZ2.0/Public/application/Login/js/login.js" type="text/javascript"></script>
</html>