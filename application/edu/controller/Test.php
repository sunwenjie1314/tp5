<?php

namespace app\edu\controller;

use think\Controller;
use think\Request;

class Test extends Controller
{
    public function index()
    {
        $name = '12345';
        $this->assign('name', $name);
        //$this->display('index');
        return $this->fetch();
    }

    public function demo()
    {
        $request = Request::instance();
        echo 'domain:' . $request->domain() . '</br>';
        echo 'file:' . $request->baseFile() . '</br>';
        echo "��ǰģ���ǣ�" . $request->module();
        echo "��ǰ�������ǣ�" . $request->controller();
        echo "��ǰ���������ǣ�" . $request->action();
        echo "������Ϣ��" . dump($request->dispatch()) . '</br>';
        echo "����utf-8�ַ���";
    }
}