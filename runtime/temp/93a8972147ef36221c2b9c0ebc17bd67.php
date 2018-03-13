<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\wamp\www\tp5\public/../application/index\view\user\login.html";i:1520848600;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>系统登录</title>
    <meta name="renderer" content="webkit">
    <script src="/static/js/jquery-2.0.3.min.js"></script>
    <link href="/static/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        html, body {
            height: 100%;
            overflow: hidden;
        }

        body {
            font-family: "Verdana", "Tahoma", "Lucida Grande", "Microsoft YaHei", "Hiragino Sans GB", sans-serif;
            background: url("/static/images/loginbg_02.jpg") no-repeat center center fixed;
            background-size: cover;
        }

        .form-control {
            height: 37px;
        }

        .main_box {
            position: absolute;
            top: 45%;
            left: 50%;
            margin: -200px 0 0 -180px;
            padding: 15px 20px;
            width: 360px;
            height: 400px;
            min-width: 320px;
            background: #FAFAFA;
            background: rgba(255, 255, 255, 0.5);
            box-shadow: 1px 5px 8px #888888;
            border-radius: 6px;
        }

        .login_msg {
            height: 30px;
        }

        .input-group > .input-group-addon.code {
            padding: 0;
        }

        #captcha_img {
            cursor: pointer;
        }

        .main_box .logo img {
            height: 35px;
        }

        @media (min-width: 768px) {
            .main_box {
                margin-left: -240px;
                padding: 15px 55px;
                width: 480px;
            }

            .main_box .logo img {
                height: 40px;
            }
        }
    </style>

</head>
<body>

<div class="container">
    <div class="main_box">
        <form id="login_form" method="post" action="">
            <input type="hidden" value="" id="j_randomKey"/>
            <input type="hidden" name="jfinal_token" value=""/>
            <p class="text-center logo"><img src="/static/images/logo.png" height="45"></p>
            <div class="login_msg text-center"><font color="red"></font></div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon-user"><span
                                class="glyphicon glyphicon-user"></span></span>
                    <input type="text" class="form-control" id="j_username" name="name" placeholder="登录账号"
                           aria-describedby="sizing-addon-user">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon-password"><span
                                class="glyphicon glyphicon-lock"></span></span>
                    <input type="password" class="form-control" id="j_password" name="password" placeholder="登录密码"
                           aria-describedby="sizing-addon-password">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon-repassword"><span
                                class="glyphicon glyphicon-exclamation-sign"></span></span>
                    <input type="text" class="form-control" id="j_verify" name="verify" placeholder="验证码"
                           aria-describedby="sizing-addon-password">
                    <span class="input-group-addon code" id="basic-addon-code"><img id="verify_img"
                                                                                    src="<?php echo captcha_src(); ?>"
                                                                                    alt="验证码"
                                                                                    onclick="this.src='<?php echo captcha_src(); ?>'+'?'+Math.random()"></span>
                </div>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label for="j_remember" class="m"><input id="j_remember" type="checkbox" value="true">&nbsp;记住登陆账号!</label>
                </div>
            </div>
            <div class="text-center">
                <button type="button" id="login" class="btn btn-primary btn-lg">&nbsp;登&nbsp;录&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-default btn-lg">&nbsp;重&nbsp;置&nbsp;</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        <!-- 给登录按钮添加点击事件 -->
        $("#login").on('click', function (event) {
            $.ajax({
                type: 'post',
                url: "<?php echo url('user/checkLogin'); ?>",
                data: $("#login_form").serialize(),  //序列化表单数据
                dataType: 'json',
                success: function (data) {  //只有返回标志为1的时候才进行处理
                    if (data.status == 1) {
                        alert(data.message);
                        window.location.href = "<?php echo url('index/index'); ?>";
                    } else {
                        alert(data.message);
                    }
                }
            });
        })
    });

    <!-- 刷新验证码的脚本 -->
    function refreshVerify() {
        var ts = Date.parse(new Date()) / 1000;
        $("#verify_img").attr("src", "/captcha?id=" + ts);//刷新验证码
    }
</script>
</body>
</html>