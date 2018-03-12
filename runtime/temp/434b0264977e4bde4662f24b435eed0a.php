<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:65:"D:\wamp\www\tp5\public/../application/index\view\index\index.html";i:1520328247;s:55:"D:\wamp\www\tp5\application\index\view\public\base.html";i:1519351966;s:55:"D:\wamp\www\tp5\application\index\view\public\head.html";i:1518160135;s:57:"D:\wamp\www\tp5\application\index\view\public\header.html";i:1518168047;s:55:"D:\wamp\www\tp5\application\index\view\public\menu.html";i:1518168061;s:55:"D:\wamp\www\tp5\application\index\view\public\foot.html";i:1520585537;}*/ ?>
﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- basic styles -->
    <link href="/static/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/static/css/font-awesome.min.css"/>
    <link href="/static/css/sidebar-menu.css" rel="stylesheet"/>
    <link href="/static/css/toastr.min.css" rel="stylesheet"/>
    <!-- ace styles -->
    <link rel="stylesheet" href="/static/css/ace.min.css"/>
    <link rel="stylesheet" href="/static/css/ace-rtl.min.css"/>
    <link rel="stylesheet" href="/static/css/ace-skins.min.css"/>

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="/static/css/ace-ie.min.css"/>
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="/static/js/jquery-2.0.3.min.js"></script>
    <script src="/static/js/ace-extra.min.js"></script>
    <script src="/static/js/sidebar-menu.js"></script>
    <script src="/static/js/bootstrap-tab.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="/static/js/html5shiv.js"></script>
    <script src="/static/js/respond.min.js"></script>
    <![endif]-->

    <title><?php echo(isset($title) && ($title !== '') ? $title : '综合教务管理系统'); ?></title>
    <meta name="keywords"
          content="Bootstrap模版,Bootstrap模版下载,Bootstrap教程,Bootstrap中文"/>
    <meta name="description"
          content="站长素材提供Bootstrap模版,Bootstrap教程,Bootstrap中文翻译等相关Bootstrap插件下载"/>
</head>


<body>
<div class="navbar navbar-default" id="navbar">
    <script type="text/javascript">
        try {
            ace.settings.check('navbar', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="navbar navbar-default" id="navbar">
        <script type="text/javascript">
            try {
                ace.settings.check('navbar', 'fixed')
            } catch (e) {
            }
        </script>

        <div class="navbar-container" id="navbar-container">
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small><i
                                class="icon-leaf"></i> ACE后台管理系统
                    </small>
                </a>
                <!-- /.brand -->
            </div>
            <div class="navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">
                    <li class="light-blue open"><a data-toggle="dropdown" href="#"
                                                   class="dropdown-toggle"> <img class="nav-user-photo"
                                                                                 src="/static/avatars/user.jpg"
                                                                                 alt="Jason's Photo"> <span
                                    class="user-info"> <small>欢迎您,</small> <?php echo \think\Session::get('user_info.name'); ?>
					</span> <i class="icon-caret-down"></i>
                        </a>

                        <ul
                                class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li><a href="#"> <i class="icon-cog"></i> 系统设置
                                </a></li>
                            <li><a href="#"> <i class="icon-user"></i> 个人信息
                                </a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo url('user/logout'); ?>"> <i class="icon-off"></i>
                                    退出登录
                                </a></li>
                        </ul>
                    </li>
                </ul>
                <!-- /.ace-nav -->
            </div>
            <!-- /.navbar-header -->
        </div>
        <!-- /.container -->
    </div>
    <div class="main-container" id="main-container">
        <div class="main-container-inner">
            <a class="menu-toggler" id="menu-toggler" href="#"> <span
                        class="menu-text"></span>
            </a>
            <!-- /.container -->
        </div>

        <div class="main-container" id="main-container">
            <div class="main-container-inner">
                <a class="menu-toggler" id="menu-toggler" href="#">
                    <span class="menu-text">111111111</span>
                </a>
                <div class="sidebar" id="sidebar">
                    <ul class="nav nav-list" id="menu"></ul>
                    <div class="sidebar-collapse" id="sidebar-collapse">
                        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left"
                           data-icon2="icon-double-angle-right"></i>
                    </div>
                </div>


                <div class="main-content">
                    <div class="page-content" style="padding-bottom: 0px;height: 100%;">
                        <div class="row" style="height: auto;">
                            <div class="col-xs-12" style="padding-left: 5px; height: 100%;">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="active"><a href="#Index" role="tab"
                                                          data-toggle="tab"><i class="icon-home"></i>系统首页</a></li>
                                </ul>
                                <div class="tab-content" style="height: auto;">
                                    <div role="tabpanel" class="tab-pane active" id="Index"
                                         style="height: auto;">
                                        <p>登录次数:<?php echo \think\Session::get('user_info.login_count'); ?></p>
                                        <p>上次登录IP:<?php echo \think\Request::instance()->ip(); ?>
                                            上次登录时间:<?php echo date("Y-m-d
								H:i:s", \think\Session::get('user_info.login_login_time')); ?></p>
                                        <table class="table table-bordered table-hover"
                                               style="width: 45%">
                                            <thead>
                                            <tr>
                                                <th colspan="2" scope="col">服务器运行信息</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td width="45%">服务器计算机名:</td>
                                                <td><?php echo \think\Request::instance()->host(); ?></td>
                                            </tr>
                                            <tr>
                                                <td>服务器IP地址:</td>
                                                <td><?php echo \think\Request::instance()->ip(); ?></td>
                                            </tr>
                                            <tr>
                                                <td>服务器域名:</td>
                                                <td><?php echo \think\Request::instance()->domain(); ?></td>
                                            </tr>
                                            <tr>
                                                <td>当前PHP版本:</td>
                                                <td><?php echo PHP_VERSION; ?></td>
                                            </tr>
                                            <tr>
                                                <td>服务器版本:</td>
                                                <td><?php echo PHP_OS; ?></td>
                                            </tr>
                                            <tr>
                                                <td>当前请求URL:</td>
                                                <td><?php echo \think\Request::instance()->url(true); ?></td>
                                            </tr>
                                            <tr>
                                                <td>当前Session数量:</td>
                                                <td><?php echo count($_SESSION); ?></td>
                                            </tr>
                                            <tr>
                                                <td>当前SessionID:</td>
                                                <td><?php echo session_id(); ?></td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- basic scripts -->
        <!--[if IE]>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <![endif]-->

        <!--[if !IE]> -->
        <!-- <![endif]-->

        <!--[if IE]>
        <script type="text/javascript">
            window.jQuery || document.write("<script src='/static/js/jquery-1.10.2.min.js'>" + "<" + "script>");
        </script>
        <![endif]-->

        <script type="text/javascript">
            if ("ontouchend" in document) document.write("<script src='/staticjs/jquery.mobile.custom.min.js'>" + "<" + "script>");
        </script>
        <script src="/static/js/bootstrap.min.js"></script>
        <script src="/static/js/typeahead-bs2.min.js"></script>

        <!-- page specific plugin scripts -->

        <!--[if lte IE 8]>
        <script src="/static/js/excanvas.min.js"></script>
        <![endif]-->

        <script src="/static/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="/static/js/jquery.ui.touch-punch.min.js"></script>
        <script src="/static/js/jquery.slimscroll.min.js"></script>
        <script src="/static/js/jquery.easy-pie-chart.min.js"></script>
        <script src="/static/js/jquery.sparkline.min.js"></script>
        <script src="/static/js/flot/jquery.flot.min.js"></script>
        <script src="/static/js/flot/jquery.flot.pie.min.js"></script>
        <script src="/static/js/flot/jquery.flot.resize.min.js"></script>

        <!-- ace scripts -->

        <script src="/static/js/ace-elements.min.js"></script>
        <script src="/static/js/ace.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $('#menu').sidebarMenu({
                    data: [{
                        id: '1',
                        text: '系统设置',
                        icon: 'icon-cog',
                        url: '',
                        menus: [{
                            id: '11',
                            text: '管理员管理',
                            icon: 'icon-glass',
                            url: "<?php echo url('user/adminList'); ?>"
                        }]
                    }, {
                        id: '2',
                        text: '学生管理',
                        icon: 'icon-leaf',
                        url: '',
                        menus: [{
                            id: '21',
                            text: '信息管理',
                            icon: 'icon-glass',
                            url: '/BasicData/BasicFeature/Index'
                        }, {
                            id: '22',
                            text: '成绩管理',
                            icon: 'icon-glass',
                            url: '/BasicData/Features/Index'
                        }, {
                            id: '23',
                            text: '物料维护',
                            icon: 'icon-glass',
                            url: '/Model/Index'
                        }, {
                            id: '24',
                            text: '站点管理',
                            icon: 'icon-glass',
                            url: '/Station/Index'
                        }]
                    }, {
                        id: '3',
                        text: '权限管理',
                        icon: 'icon-user',
                        url: '',
                        menus: [{
                            id: '31',
                            text: '用户管理',
                            icon: 'icon-user',
                            url: '/SystemSetting/User'
                        }, {
                            id: '32',
                            text: '角色管理',
                            icon: 'icon-apple',
                            url: '/SystemSetting/Role'
                        }, {
                            id: '33',
                            text: '菜单管理',
                            icon: 'icon-list',
                            url: '/SystemSetting/Menu'
                        }, {
                            id: '34',
                            text: '部门管理',
                            icon: 'icon-glass',
                            url: '/SystemSetting/Department'
                        }]
                    }]

                })
            });
        </script>


</body>

</html>