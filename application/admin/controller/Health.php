<?php

namespace app\admin\controller;

use app\common\controller\Backend;
use think\Controller;
use fast\Tree;
use think\Cache;
use think\Request;
use think\Db;

/**
 * @icon fa fa-circle-o
 */
class Health extends Backend
{
    
    /**
     * Videos模型对象
     */
    protected $model = null;

    protected $searchFields = '';

    public function _initialize()
    {
        parent::_initialize();
        $this->cid = input('cid');
        // 判断数据表
        switch ($this->cid) {
        case '1':
            $this->model = model("Hinterview");
            $this->table = 'Hinterview';
            break;
        case '2':
            $this->model = model("Hstory");
            $this->table = 'Hstory';
            break;
        case '3':
            $this->model = model("Hproduct");
            $this->table = 'Hproduct';
            break;
        case '4':
            $this->model = model("Hcommon");
            $this->table = 'Hcommon';
            break;
        }
        // $this->tables = $this->model->seltables($this->cid);
        
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
            list($where, $sort, $order,$offset, $limit) = $this->buildparams();

            $status['status'] = 1; // 非回收站
            $total = $this->model
                ->where($where)
                ->where($status)
                ->order($sort,$order)
                ->count();

            $list = $this->model
                ->where($where)
                ->where($status)
                ->order($sort,$order)
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
            $params = $this->request->post("row/a");
            $user = $this->request->post('user/a');
            $info = $this->request->post('info/a');
            
            $params['inputtime'] = time();
            $params['updatetime'] = time();
            $result = $this->artist_handles('',$params,$user,$info,$this->table);
            if ($result)
            {
                // $this->model->save($params);
                $this->success();
            }
            $this->error();
        }
        if($this->cid == '1' || $this->cid == '2'){
            $template = "add_artist";
        }else{
            $template = 'add';
        }
        $artists = "";
        $team = "";
        $row['is_fee'] = "1";
        $row['price'] = "";
        $row['video'] = "";
        $row['crowd'] = '';
        $this->view->assign("row", $row);
        $this->view->assign("artists", $artists);
        $this->view->assign("team", $team);
        return $this->view->fetch($template);
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
            $user = $this->request->post('user/a');
            $info = $this->request->post('info/a');
            
            $result = $this->artist_handles($ids,$params,$user,$info,$this->table);
            if ($result)
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
        // 判断是否选择了艺人
        if($this->cid == '1' || $this->cid == '2'){
            if($row['artist']){
                $row['artist'] = unserialize($row['artist']);
                foreach ($row['artist'] as $r => $v) {
                    unset($row['artist']);
                    $row['artists'][$r]['userid'] = $v;
                    $user = Db::table("fa_user")->field('id,head,normal_name')->where('id = '.$v['userid'])->find();
                    $artists[$r]['userid'] = $user['id'];
                    $artists[$r]['head'] = $user['head'];
                    $artists[$r]['normal_name'] = $user['normal_name'];
                    $artists[$r]['cosplay'] = $v['cosplay'];
                }
            }else{
                $artists = "";
            }
            $template = "edit_artist";
        }else{
            $artists = "";
            $template = 'edit';
        }
        if($row['team']){
           $team = $row['team'] = unserialize($row['team']);
        }else{
            $team = "";
        }
        $row['crowd'] = Db::table('fa_crowdfunding')->where('id = '.$row['crowid'])->field('id,thumb,title')->find();
        if(explode(',',$row['crowd']['thumb'])){
            $row['crowd']['thumb'] = explode(',',$row['crowd']['thumb'])[0];
        }

        $this->view->assign("row", $row);
        $this->view->assign("artists", $artists);
        $this->view->assign("team", $team);
        return $this->view->fetch($template);
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
        return $this->view->fetch();
    }

    // 检索艺人信息
    public function search_artist(){
        // 继承backerd.php中的方法
        $data = $this->artist_search();
        exit(json_encode($data));
    }
    // 公共信息整理
    public function handles($params,$userids){
        $params = $this->artist_handles($params,$userids);
        return $params;
    }

}
