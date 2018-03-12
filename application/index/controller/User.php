<?php

namespace app\index\controller;

use app\index\model\User as UserModel;
use think\Request;
use think\Session;

class User extends Base
{

    // 用户登录
    public function login()
    {
        $this->alreadyLogin(); // 调用alreadyLogin方法防止重复登录
        return $this->fetch();
    }

    // 登录检测
    public function checkLogin(Request $request)
    {
        $status = 0;
        $result = '验证失败';
        $data = $request->param();
        // 创建验证规则
        $rule = [
            'name|用户名' => 'require',
            'password|登录密码' => 'require',
            'verify|验证码' => 'require|captcha'
        ];
        // 创建自定义提示
        $msg = [
            'name' => [
                'require' => '用户名不能为空,请检查!'
            ],
            'password' => [
                'require' => '用户密码为空,请检查!'
            ],
            'verify' => [
                'require' => '验证码不能为空,请检查!',
                'captcha' => '验证码错误'
            ]
        ];

        // 进行验证
        $result = $this->validate($data, $rule);

        // 如果验证通过则执行
        if ($result === true) {
            // 构造查询条件
            $map = [
                'name' => $data['name'], // 用户名等于从前台获取的用户名
                'password' => md5($data['password']) // 对从前端获取的用户密码进行加密
            ];
            // 查询用户信息
            $user = UserModel::get($map);
            if ($user === null) {
                $result = '没有找到该用户!';
            } else {
                $status = 1;
                $result = '点击确定进入系统!';
                // 设置使用记录用户登录信息session
                Session::set('user_id', $user->id);
                Session::set('user_info', $user->getData()); // 设置获取用户所有登录信息

                // 统计用户登录次数
                $user->setInc('login_count');
            }
        }
        return [
            'status' => $status,
            'message' => $result,
            'data' => $data
        ];
    }

    // 退出登录（注销session）
    public function logout()
    {
        // 推出前更新登录时间，这样下次登录时就知道上次登录的时间
        UserModel::update([
            'login_time' => time()
        ], [
            'id' => Session::get('user_id')
        ]);
        Session::delete('user_id'); // 删除用户的id信息
        Session::delete('user_info'); // 删除用户的全部信息
        $this->success('注销登录,正在返回', url('user/login'));
    }

    // 显示管理员列表
    /*     public function adminList()
        {
            $this->view->assign('title', '管理员列表');
            $this->view->assign('keywords', 'PHP中文网教学系统');
            $this->view->count = User::count();
            // 判断当前用户是否是admin用户
            // 首先通过session来检测登录用户名
            $userName = Session::get('user_info.name');
            if ($userName == 'admin') {
                $list = User::all(); // admin用户可以获取全部的记录，数据要经过模型获取器处理;
            } else {
                // 非admin用户只能查看自己的信息，数据经过模型获取器处理
                // 这里使用all是为了共用模板，逻辑上使用get更为合适
                $list = User::all([
                    'name' => $userName
                ]);
            }
            $this->view->assign('list', $list);
            return $this->view->fetch('admin_List2');
        } */
    public function adminList2()
    {
        // 判断当前用户是否是admin用户
        // 首先通过session来检测登录用户名
        $userName = Session::get('user_info.name');
        if ($userName == 'admin') {
            $list = UserModel::all(); // admin用户可以获取全部的记录，数据要经过模型获取器处理;
        } else {
            // 非admin用户只能查看自己的信息，数据经过模型获取器处理
            // 这里使用all是为了共用模板，逻辑上使用get更为合适
            $list = UserModel::all([
                'name' => $userName
            ]);
        }
        $this->view->assign('list', $list);
        //var_dump($list);
        // die;
        return $this->view->fetch('admin_List2');
    }

    public function adminList(Request $request)
    {
        //实例化化User模型
        $user = new UserModel();
        if (!$_POST) {
            $userName = Session::get('user_info.name');
            if ($userName == 'admin') {
                $result = $user::all();
            } else {
                $result = $user::all([
                    'name' => $userName
                ]);
            }
        } else {
            //获取从后台传递过来的查询条件
            $data = $request->param();
            $where = "";
            if ($data['se_name'] != "") {
                $where['name'] = $data['se_name'];
            }
            if ($data['se_role'] != "") {
                $where['role'] = $data['se_role'];
            }
            if ($data['se_status'] != "") {
                $where['status'] = $data['se_status'];
            }
            $result = $user->where($where)->select();
        }
        //从后台进行where查询
        $this->view->assign('list', $result);
        return $this->view->fetch('admin_List2');
    }

    public function test1()
    {
        $user = new UserModel();
        $result = $user->where('id' == '1')->select();
        var_dump($result);
        die();
    }

    // 管理员状态变更
    public function setStatus(Request $request)
    {
        $user_id = $request->param('id');
        $result = UserModel::get($user_id);
        if ($result->getData('status') == 1) {
            UserModel::update([
                'status' => 0
            ], [
                'id' => $user_id
            ]);
        } else {
            UserModel::update([
                'status' => 1
            ], [
                'id' => $user_id
            ]);
        }
    }

    // 用户名存在检验
    public function checkUserName(Request $request)
    {
        if ($request->param('name') == null) {
            $status = 0;
            $message = '用户名不能为空!';
        } else {
            $userName = trim($request->param('name'));
            $status = 1;
            $message = "用户名可用!";
            if (UserModel::get([
                'name' => $userName
            ])) {
                $status = 0;
                $message = '用户名已存在，请重新输入~~';
            }
        }
        return [
            'status' => $status,
            'message' => $message
        ];
    }

    // 检测用户输入的邮箱是否存在
    public function checkEmail(Request $request)
    {
        $userEmail = trim($request->param('email'));
        $status = 1;
        $message = "邮箱可用!";
        if (UserModel::get([
            'email' => $userEmail
        ])) {
            $status = 0;
            $message = '该邮箱已经存在,请更换其他邮箱~~';
        }
        return [
            'status' => $status,
            'message' => $message
        ];
    }

    // 添加管理员 Request $request
    public function userAdd(Request $request)
    {
        $data = $request->post();
        $message = "用户添加失败!";
        $status = 0;
        $rule = [
            'name|用户名' => 'require|min:3|max:20',
            'password|登录密码' => 'require|min:6|max:16',
            'email|邮箱' => 'require|email'
            // 'role|用户角色'=>'require|role'
        ];
        $data = [
            'name' => $data['name'],
            'password' => $data['password'],
            'email' => $data['email'],
            'role' => $data['role'],
            'status' => $data['status']
        ];
        $result = $this->validate($data, $rule);
        if ($result === true) {
            $user = UserModel::create($data);
            if ($user) {
                $status = 1;
                $message = '添加成功~~';
            } else {
                $status = 0;
                $message = '怎么会没有添加成功呢';
            }
        } else {
            $status = 0;
            $message = "您遇到了未知错误,我们正在努力解决!";
        }
        return [
            'status' => $status,
            'message' => $message
        ];
    }

    //渲染编辑管理员界面
    public function adminEdit(Request $request)
    {
        $user_id = $request->param('id');
        $result = UserModel::get($user_id);
        echo json_encode($result);
    }

    // 更新管理员
    public function updateAdmin(Request $request)
    {
        // 获取表单返回的数据
        $data = $request->post();
        $where['id'] = $data['id'];
        //$data['name']='pte1';
        $data = [
            'name' => $data['name'],
            'password' => $data['password'],
            'email' => $data['email'],
            'role' => $data['role'],
            'status' => $data['status']
        ];
        //$result=Db::table('user')->where($where)->update($data);
        $result = UserModel::update($data, $where);
        // 如果是admin用户,更新当前session中用户信息user_info中的角色role,供页面调用
        if (Session::get('user_info_name') == 'admin') {
            Session::set('user_info.role', $data['role']);
        }
        if (true == $result) {
            return ['status' => 1, 'message' => '更新成功'];
        } else {
            return ['status' => 0, 'message' => '更新失败,请检查具体原因!'];
        }
    }

    //恢复删除操作
    public function unDelete()
    {
        UserModel::update(['delete_time' => NULL], ['is_delete' => 1]);
    }

    //删除操作
    public function deleteUser(Request $request)
    {
        $user_id = $request->param('id');
        UserModel::update(['is_delete' => 1], ['id' => $user_id]);
        UserModel::destroy($user_id);

    }
}