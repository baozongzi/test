<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:76:"D:\phpStudy\WWW\fire\public/../application/admin\view\crowdfunding\edit.html";i:1527331651;s:73:"D:\phpStudy\WWW\fire\public/../application/admin\view\layout\default.html";i:1515575204;s:70:"D:\phpStudy\WWW\fire\public/../application/admin\view\common\meta.html";i:1527304699;s:72:"D:\phpStudy\WWW\fire\public/../application/admin\view\common\script.html";i:1527306529;}*/ ?>
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
                                <form id="add-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">
    
    <div>
        <div class="form-group">
        <label for="c-answer" class="control-label col-xs-12 col-sm-2"><?php echo __('title'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-answer" class="form-control" name="row[title]" type="text" value="<?php echo $row['title']; ?>" >
        </div>
    </div>

    <div class="form-group">
        <label for="c-answer" class="control-label col-xs-12 col-sm-2"><?php echo __('总金额'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-answer" class="form-control" name="row[total_money]" type="text" value="<?php echo $row['total_money']; ?>" >
        </div>
    </div>

    <div class="form-group">
        <label for="c-answer" class="control-label col-xs-12 col-sm-2"><?php echo __('总购买数'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-answer" class="form-control" name="row[pay_num]" type="text" value="<?php echo $row['pay_num']; ?>" >
        </div>
    </div>

    <div class="form-group">
        <label for="c-answer" class="control-label col-xs-12 col-sm-2"><?php echo __('分成比例'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-answer" class="form-control" name="row[pro]" type="text" value="<?php echo $row['pro']; ?>" >
        </div>
    </div>

    <div class="form-group">
        <label for="e-time" class="control-label col-xs-12 col-sm-2"><?php echo __('结束时间'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="e-time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[endtime]" type="text" value="<?php echo datetime($row['endtime']); ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="c-type" class="control-label col-xs-12 col-sm-2"><?php echo __('赛事阶段'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <select id="c-type" data-rule="required" class="form-control selectpicker" name="row[successed]">
                <option value="1" <?php if($row['successed'] == '1'): ?>selected<?php endif; ?> name="row['successed']" >火热进行中^_^</option>
                <option value="2" <?php if($row['successed'] == '2'): ?>selected<?php endif; ?> name="row['successed']" >众筹成功^_^</option>
                <option value="0" <?php if($row['successed'] == '0'): ?>selected<?php endif; ?> name="row['successed']" >众筹失败(╥╯^╰╥)</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="c-analysis" class="control-label col-xs-12 col-sm-2"><?php echo __('内容'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <!-- <textarea id="c-analysis" class="form-control summernote edit" rows="5" name="row[analysis]" cols="50"></textarea> -->
            <textarea name="row[content]" id="ueditors" cols="30" rows="10"><?php echo $row['content']; ?></textarea>
        </div>
    </div>

    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>


<link rel="stylesheet" href="__CDN__/assets/js/kindeditor/themes/default/default.css" />
<script charset="utf-8" src="__CDN__/assets/js/kindeditor/jquery-1.7.1.min.js"></script>
<script charset="utf-8" src="__CDN__/assets/js/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="__CDN__/assets/js/kindeditor/lang/zh_CN.js"></script>
<script>
    var editor;
    KindEditor.ready(function(K) {
        editor = KindEditor.create('#ueditors',{allowImageUpload:true,resizeType : 1,width:"100%",height:"360px"});

    });
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