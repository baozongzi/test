<?php

namespace app\admin\controller;

use app\common\controller\Backend;
use think\Controller;
use fast\Tree;
use think\Cache;
use think\Request;

/**
 * 
 *
 * @icon fa fa-circle-o
 */
class Attention extends Backend
{
    
    /**
     * Videos模型对象
     */
    protected $model = null;

    protected $searchFields = 'id,title,author,inputtime';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Attention');

    }

    /**
     * 导入
     * @return mixed
     */
    public function import(){
        return parent::import();
    }

    /**
     * 查看
     */
    public function index()
    {
        //设置过滤方法
        $this->request->filter(['strip_tags']);
        if ($this->request->isAjax())
        {
            //如果发送的来源是Selectpage，则转发到Selectpage
            if ($this->request->request('pkey_name'))
            {
                return $this->selectpage();
            }
            list($where, $order, $offset, $limit) = $this->buildparams();
            $status['status'] = 1; // 非回收站
            $total = $this->model
                ->where($where)
                ->count();

            $list = $this->model
                ->where($where)
                ->limit($offset, $limit)
                ->select();

            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }

        return $this->view->fetch();
    }

    /**
     * 添加
     */
    public function add()
    {
        if ($this->request->isPost())
        {
            $params = $this->request->post("row/a", [], 'strip_tags');
            $params['inputtime'] = time();
            $params['updatetime'] = time();
            if ($params)
            {
                $this->model->save($params);
                $this->success();
            }
            $this->error();
        }

        return $this->view->fetch();
    }

    /**
     * 编辑
     */
    public function edit($ids = NULL)
    {
        $row = $this->model->get($ids)->getData();

        if (!$row)
            $this->error(__('No Results were found'));
        $adminIds = $this->getDataLimitAdminIds();
        if (is_array($adminIds))
        {
            if (!in_array($row[$this->dataLimitField], $adminIds))
            {
                $this->error(__('You have no permission'));
            }
        }
        if ($this->request->isPost())
        {
            $params = $this->request->post("row/a");
            $params['updatetime'] = time();
            if ($params)
            {
                $result = $this->model->save($params,['id' => $ids]);
                if ($result !== false)
                {
                    $this->success();
                }
                $this->error($row->getError());
            }
            $this->error(__('Parameter %s can not be empty', ''));
        }

        $this->view->assign("row", $row);
        return $this->view->fetch();
    }

    /**
     * 软删除
     * @param string $ids
     */
    public function softDelete($ids = "")
    {
        if ($ids)
        {
            $where['id'] = ['in', $ids];
            $count = $this->model->where($where)->update(['status' => 0]);
            if ($count)
            {
                $this->success();
            }
        }
        $this->error(__('Parameter %s can not be empty', 'ids'));
    }

    /**
     *  回收站内容
     */
    public function soft()
    {
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
            $status = ['status' => 0];
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
        return $this->view->fetch('videos/index');
    }

}
