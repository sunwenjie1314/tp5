<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\wamp\www\tp5\public/../application/index\view\user\admin_List2.html";i:1520930156;}*/ ?>
﻿
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
    <script src="/static/js/bootstrap.min.js"></script>
    <script src="/static/js/ace-extra.min.js"></script>
    <script src="/static/js/ace-elements.min.js"></script>
    <script src="/static/js/sidebar-menu.js"></script>
    <script src="/static/js/bootstrap-tab.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="/static/js/html5shiv.js"></script>
    <script src="/static/js/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background: white; height: 95%;">
<div class="page-content" style=" height: 90%;">
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="row" style="height: auto;">
                    <form id="search_user" class="from-inline" method="post">
                        <div class="table-header">用户信息管理</div>
                        <table class="table table-hover " style="border: 1px solid #1a1a1a;background: #FFFFFF;">
                            <tbody>
                            <tr>
                                <td style="width:6%;">用户名称:</td>
                                <td style="width:10%;">
                                    <input width="200px;" type="text" id="se_name" name="se_name"
                                           placeholder="请输入用户名称"></td>
                                <td style="width:6%;">用户角色:</td>
                                <td style="width:6%;"><select name="se_role" id="se_role">
                                        <option value="">请选择用户角色</option>
                                        <option value="0">超级管理员</option>
                                        <option value="1">普通管理员</option>
                                        <option value="2">总经理</option>
                                        <option value="30">销售部经理</option>
                                        <option value="40">维护部经理</option>
                                    </select></td>
                                <td style="width:6%;">是否启用:</td>
                                <td style="width:6%;">
                                    <select name="se_status" id="se_status">
                                        <option value="">请选择角色状态</option>
                                        <option value="0">不启用</option>
                                        <option value="1">启&nbsp;&nbsp;用</option>
                                    </select></td>
                                <td style="width:4%;">
                                    <button class="btn btn-sm btn-primary" type="submit"/>
                                    <i class="icon-trash"></i> 查询
                                    </button></td>
                                <td style="width:50%;">
                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">
                                        <i class="icon-plus"></i> 新增管理员
                                    </button>
                                    <button class="btn btn-sm btn-primary">
                                        <i class="icon-trash"></i> 批量恢复
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="hr hr-24"></div>
                <div id="sample-table-2_wrapper" class="dataTables_wrapper"
                     role="grid" style="height:82%;">
                    <div style="height:100%; overflow-y:scroll;">
                        <table id="sample-table-2"
                               class="table table-striped table-bordered table-hover dataTable"
                               aria-describedby="sample-table-2_info" style="text-align: center; height:auto;">
                            <thead>
                            <tr role="row">
                                <th class="center sorting_disabled" role="columnheader"
                                    rowspan="1" colspan="1" aria-label=" " style="width:94px;"><label>
                                        <input type="checkbox" class="ace"> <span class="lbl"></span>
                                    </label></th>
                                <th class="sorting_disabled" role="columnheader" rowspan="1"
                                    colspan="1" aria-label="" style="width: 90px; text-align: center;">ID
                                </th>
                                <th class="sorting_disabled" role="columnheader" rowspan="1"
                                    colspan="1" aria-label="" style="width: 240px; text-align: center;">用户名
                                </th>
                                <th class="sorting_disabled" role="columnheader" rowspan="1"
                                    colspan="1" aria-label="" style="width: 240px; text-align: center;">邮箱
                                </th>
                                <th class="sorting_disabled" role="columnheader" rowspan="1"
                                    colspan="1" aria-label="" style="width: 240px; text-align: center;">角色
                                </th>
                                <th class="sorting_disabled" role="columnheader" rowspan="1"
                                    colspan="1" aria-label="" style="width: 240px; text-align: center;">登录次数
                                </th>
                                <th class="sorting_disabled" role="columnheader" rowspan="1"
                                    colspan="1" aria-label="" style="width: 240px; text-align: center;">上次登录时间
                                </th>
                                <th class="sorting_disabled" role="columnheader" rowspan="1"
                                    colspan="1" aria-label="" style="width: 240px; text-align: center;">是否已启用
                                </th>
                                <th class="sorting_disabled" role="columnheader" rowspan="1"
                                    colspan="1" aria-label="" style="width: 240px; text-align: center;">操作
                                </th>
                            </tr>
                            </thead>
                            <tbody role="alert" aria-live="polite" aria-relevant="all" style="height:auto;">
                            <?php if (is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0;
                                $__LIST__ = $list;
                                if (count($__LIST__) == 0) : echo ""; else: foreach ($__LIST__ as $key => $vo): $mod = ($i % 2);
                                    ++$i; ?>
                                    <tr role="row">
                                        <td class="center  sorting_1"><label> <input
                                                        type="checkbox" class="ace"> <span class="lbl"></span>
                                            </label></td>
                                        <td class=" "><?php echo $vo['id']; ?></td>
                                        <td class=" "><?php echo $vo['name']; ?></td>
                                        <td class=" "><?php echo $vo['email']; ?></td>
                                        <td class=" "><?php echo $vo['role']; ?></td>
                                        <td class=" "><?php echo $vo['login_count']; ?></td>
                                        <td class=" "><?php echo $vo['login_time']; ?></td>
                                        <td class=" " id="status"><?php if ($vo['status'] == '1'): ?>
                                                <span class="label label-sm label-success">已经启用
										</span><?php else: ?>
                                                <span class="label label-sm label-warning">已经停用
										</span><?php endif; ?>
                                        </td>
                                        <td class=" " style="width: 15%;">
                                            <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons"
                                                 id="cz">
                                                <?php if (\think\Session::get('user_info.name') == 'admin'): if ($vo['status'] == '已经启用'): ?>
                                                    <a class="blue" href="javascript:"
                                                       onclick="admin_start(this,'<?php echo $vo['id']; ?>');"> <i
                                                                class="icon-unlock bigger-130"></i>启用
                                                    </a>
                                                <?php else: ?>
                                                    <a class="blue" href="javascript:"
                                                       onclick="admin_stop(this,'<?php echo $vo['id']; ?>');"> <i
                                                                class="icon-lock bigger-130"></i>停用
                                                    </a>
                                                <?php endif; endif; ?>
                                                <a class="green" id="admin_edit"
                                                   onclick="admin_edit(this,'<?php echo $vo['id']; ?>')"><i
                                                            class="icon-edit bigger-130"></i>编辑
                                                </a>
                                                <?php if (\think\Session::get('user_info.name') == 'admin'): ?>
                                                <a class="red" href="#"
                                                   onclick="admin_del(this,'<?php echo $vo['id']; ?>')"><i
                                                                class="icon-trash bigger-130"></i> 删除
                                                    </a><?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; endif; else: echo "";endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div id="sample-table-2_length" class="dataTables_length">
                                <label>每页显示<select size="1"
                                                   name="sample-table-2_length" aria-controls="sample-table-2">
                                        <option value="10" selected="selected">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> 条记录
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="dataTables_info" id="sample-table-2_info">显示第
                                1 至 10 条记录 共计23 条记录
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="dataTables_paginate paging_bootstrap">
                                <?php echo $page; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 新增管理员窗口 -->
                <form method="post" action="" class="form-horizontal" role="form"
                      id="form_data" onsubmit="return check_form()">
                    <div id="myModal" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" aria-hidden="true"
                         class="fade modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="moal"
                                            aria-hidden="true">&times;
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">新增管理员</h4>
                                </div>
                                <form id="admin_add_data" class="form-horizontal ">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" id="id" name="id" class="col-xs-10 col-sm-6">
                                            <label class="col-sm-2 control-label no-padding-right"> 用户名称: </label>
                                            <div class="col-sm-10">
                                                <input type="text" id="name" name="name" placeholder="请输入用户名称"
                                                       class="col-xs-10 col-sm-6">
                                                <span class="help-inline col-xs-12 col-sm-6">
                                                    <span id="user_name" style="visibility: hidden;"></span></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right"> 密&nbsp;&nbsp;&nbsp;&nbsp;码: </label>
                                            <div class="col-sm-10">
                                                <input type="password" id="password" name="password"
                                                       placeholder="请设置用户密码" class="col-xs-10 col-sm-6">
                                                <span class="help-inline col-xs-12 col-sm-6"
                                                      style="vertical-align: bottom;">
                                                    <span id="user_password">密码由6-16位字符、字母、字符组成</span></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right"> 密码确认: </label>
                                            <div class="col-sm-10">
                                                <input type="password" id="repassword" name="repassword"
                                                       placeholder="请再次输入用户密码进行确认" class="col-xs-10 col-sm-6">
                                                <span class="help-inline col-xs-12 col-sm-6"
                                                      style="vertical-align: bottom;">
												<span id="user_repassword"></span>
											</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right"> 邮&nbsp;&nbsp;&nbsp;&nbsp;箱: </label>
                                            <div class="col-sm-10">
                                                <input type="text" id="email" name="email"
                                                       placeholder="请设置正确用户邮箱" class="col-xs-10 col-sm-6">
                                                <span class="help-inline col-xs-12 col-sm-6">
                                                    <span id="user_email" style="visibility: hidden;"></span></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right"> 用户角色: </label>
                                            <div class="col-sm-10">
                                                <select class="col-xs-10 col-sm-6" name="role" id="role"
                                                        onchange="doRole();">
                                                    <option>请设定用户角色</option>
                                                    <option value="0">超级管理员</option>
                                                    <option value="1">普通管理员</option>
                                                    <option value="2">总经理</option>
                                                    <option value="30">销售部经理</option>
                                                    <option value="40">维护部经理</option>
                                                </select>
                                                <span class="help-inline col-xs-12 col-sm-6">
                                                    <span id="user_role" style="visibility: hidden;"></span></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right"> 是否启用: </label>
                                            <div class="col-sm-10">
                                                <select class="col-xs-10 col-sm-6" name="status" id="status_c">
                                                    <option value="0">不启用</option>
                                                    <option value="1">启&nbsp;&nbsp;用</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                                data-dismiss="modal">关闭
                                        </button>
                                        <button type="submit" id="submit" class="btn btn-primary">提交</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- 结束     管理员窗口 -->
            </div>
            <!-- PAGE CONTENT ENDS -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.page-content -->
<script type="text/javascript" src="/static/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/static/js/bootbox.min.js"></script>

<script type="text/javascript">
    /*
    参数解释
    url:请求的url
    id:需要操作的数据id
    w:弹出层宽度(缺省调默认值)
    h:弹出层高度(缺省调默认值)
    */
    var flag;
    //失去焦点时检查用户名是否存在

    $("#name").blur(function () {
        $.ajax({
            type: 'GET',
            url: "checkUserName",
            data: {name: $(this).val()},
            dataType: 'json',
            success: function (data) {
                if (data.status == 1) {
                    $("#user_name").css("visibility", "visible");
                    $("#user_name").html(data.message).css("color", "green");
                } else {
                    $("#user_name").css("visibility", "visible");
                    $("#user_name").html(data.message).css("color", "red");
                }
            }
        });
    });
    //失去焦点时验证密码是否符合规范
    $("#password").blur(function () {
        var reg = /^[a-zA-Z0-9_.@~!?]{5,16}$/;
        var pass = $("#password");
        if (pass.val() == '' || pass.val().length == 0) {
            $("#user_password").html('密码不能为空!').css("color", "red");
        } else if (pass.val().length < 6) {
            $("#user_password").html('密码长度不能小于6位!').css("color", "red");
        } else if (pass.val().length > 16) {
            $("#user_password").html('密码长度不能大于16位!').css("color", "red");
        } else if (!reg.test(pass.val())) {
            $("#user_password").html('您输入的密码不符合规范!').css("color", "red");
        } else {
            $("#user_password").html('');
        }
    });
    //验证密码是否重复
    $("#repassword").blur(function () {
        if ($("#repassword").val() == '' || $("#repassword").val().length == 0) {
            $("#user_repassword").html('验证密码不能为空!').css("css", "red");
        } else if ($("#repassword").val() != $("#password").val()) {
            $("#user_repassword").html('两次输入的密码不一致!').css("color", "red");
        } else {
            $("#user_repassword").html('');
        }
    });
    //失去焦点时检查邮箱的格式是否符合规则
    $("#email").blur(function () {
        //邮箱验证正则表达式
        var reg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        if ($("#email").val() == '') {
            $("#user_email").css("visibility", "visible");
            $("#user_email").html('邮箱不能为空!').css("color", "red");
            $("#user_email").focus();
        } else if (!reg.test($("#email").val())) {
            $("#user_email").css("visibility", "visible");
            $("#user_email").html('邮箱输入格式不正确!').css("color", "red");
        } else {
            $.ajax({
                type: 'GET',
                url: "checkEmail",
                data: {email: $(this).val()},
                dataType: 'json',
                success: function (data) {
                    if (data.status == 1) {
                        $("#user_email").css("visibility", "visible");
                        $("#user_email").html(data.message).css("color", "green");
                    } else {
                        $("#user_email").css("visibility", "visible");
                        $("#user_email").html(data.message).css("color", "red");
                    }
                }
            });
        }
    });

    //判断角色是否选择
    function doRole() {
        $("#user_role").css("visibility", "hidden");
    }

    /*管理员-----新增*/
    function admin_add() {
        flag = 'add';
        if ($("#role").val() == '') {
            $("#user_role").css("visibility", "visible");
            $("#user_role").html('请选择用户角色').css("color", "red");
            $("#role").focus();
        } else {
            $.ajax({
                type: 'POST',
                url: "<?php echo url('user/userAdd'); ?>",
                data: $("#form_data").serialize(),
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 1) {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert(data.message);
                    }
                }
            });
        }
    }

    //编辑模态窗口
    function check_form() {
        if (flag == 'update') {
            var form_data = $('#form_data').serialize();
            //form_data=form_data;$.param({"act":"update"})+'&'+
            $.ajax({
                type: 'POST',
                url: "<?php echo url('user/updateAdmin'); ?>",
                data: form_data,
                // data:{"data":form_data,"act":"update"},
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 1) {
                        alert(data.message);
                        //alert(act.val());
                        location.reload();
                    } else {
                        alert(data.message);
                    }
                },
                error: function (data) {
                    alert(data.message);
                }
            });
        } else {
            admin_add();
        }
    }

    function admin_del(obj, id, name) {
        bootbox.confirm({
            title: '数据删除提示',
            message: "确定要删除用户吗?",
            buttons: {
                cancel: {
                    label: '取消',
                    className: 'btn-danger'
                },
                confirm: {
                    label: '确定',
                    className: 'btn-success'
                }
            },
            callback: function (result) {
                if (result) {
                    //后台进行对数据的处理
                    $.get("<?php echo url('user/deleteUser'); ?>", {id: id});
                    //返回处理的结果
                    $(obj).parents("tr").remove();
                    //bootbox.alert('已经启用!');
                    bootbox.alert({
                        buttons: {
                            ok: {
                                label: '确定',
                                className: 'btn-success'
                            }
                        },
                        message: "用户'++'已删除!",
                        title: "系统提示",
                    });
                }
                else {

                }
            }
        });
    }

    /*管理员--停用*/
    function admin_stop(obj, id) {
        bootbox.confirm({
            title: '重要提示',
            message: '确定要停用吗?',
            size: 'small',
            buttons: {
                cancel: {
                    label: '取消',
                    className: 'btn-danger'
                },
                confirm: {
                    label: '确定',
                    className: 'btn-success'
                }
            },
            callback: function (reuslt) {
                if (reuslt) {
                    //后台进行对数据的处理
                    $.get("<?php echo url('user/setStatus'); ?>", {id: id});
                    //返回处理的结果
                    $(obj).parents("td").find("#cz").prepend('<a class="blue" href="javascript:;" onclick="admin_start(this,' + id + ')">' +
                        '<i class="icon-unlock bigger-130"></i>启用</a>');
                    $(obj).parents("tr").find("#status").html('<span class="label label-sm label-warning"> 已经停用</span>');
                    $(obj).remove();
                    bootbox.alert({
                        buttons: {
                            ok: {
                                label: '确定',
                                className: 'btn-success'
                            }
                        },
                        message: '已经停用',
                        title: "系统提示",
                    });
                } else {

                }
            }

        });
    }

    /*管理员-----启用*/
    function admin_start(obj, id) {
        bootbox.confirm({
            title: '重要提示',
            message: '确定要启用吗?',
            buttons: {
                cancel: {
                    label: '取消',
                    className: 'btn-danger'
                },
                confirm: {
                    label: '确定',
                    className: 'btn-success'
                }
            },
            callback: function (result) {
                if (result) {
                    //后台进行对数据的处理
                    $.get("<?php echo url('user/setStatus'); ?>", {id: id});
                    //返回处理的结果
                    $(obj).parents("tr").find("#cz").prepend('<a class="blue" href="javascript:;" onclick="admin_stop(this,' + id + ')">' +
                        '<i class="icon-lock bigger-130"></i>启用</a>');
                    $(obj).parents("tr").find("#status").html('<span class="label label-sm label-success">已经启用</span>');
                    $(obj).remove();
                    bootbox.alert({
                        buttons: {
                            ok: {
                                label: '确定',
                                className: 'btn-success'
                            }
                        },
                        message: '已经启用',
                        title: "系统提示",
                    });
                }
                else {

                }
            }
        });
    }

    /*管理员----编辑*/
    function admin_edit(obj, id) {
        $('#myModal').modal('show');
        $('#myModalLabel').html("编辑用户");
        $('#submit').html("保存");
        flag = "update";

        $.ajax({
            url: "<?php echo url('user/adminEdit'); ?>",
            data: {"id": id, "act": "get"},
            type: "post",
            success: function (data) {
                if (data) {
                    var data = data;
                    var data_obj = eval("(" + data + ")");
                    var role_count = $("#role option").length;

                    //alert(data_obj.password)
                    $("#id").val(data_obj.id);
                    $("#name").val(data_obj.name);
                    $("#password").val(data_obj.password);
                    $("#repassword").val(data_obj.password);
                    $("#email").val(data_obj.email);
                    //设定用户角色的状态选定
                    for (var i = 0; i < role_count; i++) {
                        if ($("#role").get(0).options[i].text == data_obj.role) {
                            $("#role").get(0).options[i].selected = true;
                            break;
                        }
                    }
                    var options = $("#status_c option");
                    for (var i = 0; i < options.length; i++) {
                        if (options[i].value == data_obj.status) {
                            options[i].selected = true;
                            break;
                        }
                    }

                } else {
                    alert("出现了未知错误。");
                }
            }
        });
    }

    /*模态框----关闭*/
    $('#myModal').on('hide.bs.modal', function () {
        $("#form_data").get(0).reset();
        $('#myModalLabel').html("新增用户");
        $('#submit').html("提交");
    });
</script>

</body>

</html>