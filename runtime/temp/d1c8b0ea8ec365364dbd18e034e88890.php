<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:77:"D:\phpStudy\WWW\fire\public/../application/admin\view\crowdfunding\index.html";i:1530154815;s:73:"D:\phpStudy\WWW\fire\public/../application/admin\view\layout\default.html";i:1515575204;s:70:"D:\phpStudy\WWW\fire\public/../application/admin\view\common\meta.html";i:1527563835;s:72:"D:\phpStudy\WWW\fire\public/../application/admin\view\common\script.html";i:1527563882;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<link rel="shortcut icon" href="__CDN__/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="__CDN__/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="__CDN__/assets/js/html5shiv.js"></script>
  <script src="__CDN__/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <div class="panel panel-default panel-intro">
    <?php echo build_heading(); ?>

    <div class="panel-body">
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="one">
                <div class="widget-body no-padding">
                    <div id="toolbar" class="toolbar">
                        <?php echo build_toolbar('refresh,add,edit,del,import'); ?>
                    </div>
                    <!-- <div id="toolbar" class="toolbar" style="position: relative;">
                        <a href="javascript:;" class="btn btn-primary btn-refresh" title="刷新"><i class="fa fa-refresh"></i> </a> 
                        <a href="javascript:;" class="btn btn-success btn-add" title="添加"><i class="fa fa-plus"></i> 添加</a> 
                        <a href="javascript:;" class="btn btn-success btn-edit btn-disabled disabled" title="编辑"><i class="fa fa-pencil"></i> 编辑</a> 
                        <a href="javascript:;" class="btn btn-danger btn-del btn-disabled disabled" title="删除"><i class="fa fa-trash"></i> 删除</a> 
                        <a href="javascript:;" class="btn btn-danger btn-import" title="导入" id="btn-import-YNEzub" data-url="ajax/upload" data-mimetype="csv,xls,xlsx" data-multiple="false" initialized="true" style="position: relative; z-index: 1;"><i class="fa fa-upload"></i> 导入</a> 
                        <div id="html5_1ch252dlire69m51l0h7cj13rd4_container" class="moxie-shim moxie-shim-html5" style="position: absolute; top: 2px; left: 239px; width: 64px; height: 31px; overflow: hidden; z-index: 0;">
                            <input id="html5_1ch252dlire69m51l0h7cj13rd4" type="file" style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" accept=".csv,.xls,.xlsx" tabindex="-1">
                        </div>
                    </div> -->
                    <table id="table" class="table table-striped table-bordered table-hover"
                           data-operate-edit="<?php echo $auth->check('crowdfunding/edit'); ?>" 
                           data-operate-show="<?php echo $auth->check('crowdfunding/show'); ?>" 
                           data-operate-del="<?php echo $auth->check('crowdfunding/del'); ?>"
                           width="100%">
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<script id="categorytpl" type="text/html">
    <div class="row">
        <div class="col-xs-12">
            <div class="form-inline" data-toggle="cxselect" data-selects="one,two,tree,four,five">
                <select class="one form-control" name="category1" data-url="ajax/category?pid=0"></select>
                <select class="two form-control" name="category2" data-url="ajax/category" data-query-name="pid"></select>
                <select class="tree form-control" name="category3" data-url="ajax/category" data-query-name="pid"></select>
                <select class="four form-control" name="category4" data-url="ajax/category" data-query-name="pid"></select>
                <select class="five form-control" name="category5" data-url="ajax/category" data-query-name="pid"></select>
            </div>
        </div>
    </div>
</script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="__CDN__/assets/js/require.js" data-main="__CDN__/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>