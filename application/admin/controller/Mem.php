<?php

namespace app\admin\controller;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * 会员管理
 *
 * @icon user
 */
class Mem extends Backend
{
    
    /**
     * User模型对象
     */
    protected $model = null;

    /**
     * 搜索字段
     */
    protected $searchFields = 'id,username,mobile';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('User');

    }


    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个方法
     * 因此在当前控制器中可不用编写增删改查的代码,如果需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */
    
    public function index($role = 0){
        //设置过滤方法
        $this->request->filter(['strip_tags']);
        if ($this->request->isAjax())
        {
            //如果发送的来源是Selectpage，则转发到Selectpage
            if ($this->request->request('pkey_name'))
            {
                return $this->selectpage();
            }
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $status['role'] = $role; //非艺人
            $total = $this->model
                ->where($where)
                ->where($status)
                ->order($sort, $order)
                ->count();

            $list = $this->model
                ->where($where)
                ->where($status)
                ->order($sort, $order)
                ->limit($offset, $limit)
                ->select();

            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch("user/index");
    }

}
