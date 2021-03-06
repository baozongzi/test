<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:75:"D:\phpStudy\WWW\fire\public/../application/admin\view\crowdfunding\add.html";i:1530502580;s:73:"D:\phpStudy\WWW\fire\public/../application/admin\view\layout\default.html";i:1515575204;s:70:"D:\phpStudy\WWW\fire\public/../application/admin\view\common\meta.html";i:1527563835;s:44:"../application/admin/view/public/artist.html";i:1529739022;s:72:"D:\phpStudy\WWW\fire\public/../application/admin\view\common\script.html";i:1527563882;}*/ ?>
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
            <input id="c-answer" class="form-control" name="row[title]" type="text" value="" >
        </div>
    </div>

    <div class="form-group">
        <label for="c-answer" class="control-label col-xs-12 col-sm-2"><?php echo __('总金额'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-answer" class="form-control" name="row[total_money]" type="text" value="" >
        </div>
    </div>

    <div class="form-group">
        <label for="c-answer" class="control-label col-xs-12 col-sm-2"><?php echo __('总购买数'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-answer" class="form-control" name="row[pay_num]" type="text" value="" >
        </div>
    </div>

    <div class="form-group">
        <label for="c-answer" class="control-label col-xs-12 col-sm-2"><?php echo __('分成比例'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-answer" class="form-control" name="row[pro]" type="text" value="" >
        </div>
    </div>

    <div class="form-group">
        <label for="e-time" class="control-label col-xs-12 col-sm-2"><?php echo __('结束时间'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="e-time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[endtime]" type="text" value="<?php echo date('Y-m-d H:i:s'); ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="c-type" class="control-label col-xs-12 col-sm-2"><?php echo __('赛事阶段'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <select id="c-type" data-rule="required" class="form-control selectpicker" name="row[successed]">
                <option value="1"  name="row['successed']" >火热进行中^_^</option>
                <option value="2"  name="row['successed']" >众筹成功^_^</option>
                <option value="0"  name="row['successed']" >众筹失败(╥╯^╰╥)</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="c-images" class="control-label col-xs-12 col-sm-2"><?php echo __('缩略图'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-images" class="form-control" size="50" name="row[thumb]" type="text">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-images" class="btn btn-danger plupload" data-input-id="c-images" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="true" data-preview-id="p-images"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-images" class="btn btn-primary fachoose" data-input-id="c-images" data-mimetype="image/*" data-multiple="true"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-images"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-images"></ul>
        </div>
    </div>

    <div class="form-group">
    <label for="c-answer" class="control-label col-xs-12 col-sm-2"><?php echo __('选择艺人'); ?>:</label>
    <div class="col-xs-12 col-sm-8">
        <div class="col-xs-12 col-sm-8">
            <a href="javascript:void(0);" class="btn btn-success btn-embossed" onclick ="artist()" ><?php echo __('选择艺人'); ?></a>
        </div>

        <div class="col-xs-12 col-sm-12 show_artist" >
            <?php if($artists): if(is_array($artists) || $artists instanceof \think\Collection || $artists instanceof \think\Paginator): $i = 0; $__LIST__ = $artists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <div class="remove_artist_<?php echo $vo['userid']; ?> remove_artist"> <a href="javascript:void(0);" onclick="close_artist_img('<?php echo $vo['userid']; ?>')">X</a><input type="hidden" name="user[userid][]" value="<?php echo $vo['userid']; ?>"/> <img src="<?php echo $vo['head']; ?>"><span><?php echo $vo['normal_name']; ?></span><input class="form-control cosplay" name="user[cosplay][]" placeholder="扮演角色" value="<?php echo $vo['cosplay']; ?>"></div>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </div>
        <div class="artist" style="display: none;">
            <div class="col-xs-12 col-sm-8 box">
            <a href="javascript:void(0);" onclick ="close_artist()" class="close_artist">X</a>
                <div class="col-xs-12" style="margin-top: 10px;">
                    <label for="c-analysis" class="control-label col-xs-12 col-sm-1"><?php echo __('姓名'); ?>:</label>
                    <div class="col-xs-12 col-sm-2">
                        <input class="form-control normal_name" name="data[normal_name]" type="text" value="" >
                    </div>
                    <label for="c-sex" class="control-label col-xs-12 col-sm-1">性别:</label>
                    <div class="col-xs-12 col-sm-2">
                        <select name="data[sex]" id="sex" class="form-control">
                            <option value="1">男</option>
                            <option value="0">女</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <a href="javascript:void(0);" class="btn btn-success btn-embossed" onclick ="search_artist()" ><?php echo __('搜索'); ?></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-10 tables" >
                    <table id="table" class="table table-striped table-bordered table-hover artist_tab" data-operate-edit="1" data-operate-del="1" width="100%">
                        <thead>
                            <tr data-index="0">
                                <th width="20"></th>
                                <th>头像</th>
                                <th>姓名</th>
                                <th>性别</th>
                                <th>年龄</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-xs-12 col-sm-2">
                    <a href="javascript:void(0);" class="btn btn-success btn-embossed" onclick ="sure_artist()" ><?php echo __('确定'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .artist{width: 96.3%;height: 386px;background: #f4f4f4;position: absolute;z-index: 999;border: 1px solid #f4f4f4;margin-top: 36px;}
    .artist .close_artist{position: absolute;right: 10px;top: 10px;font-weight: 700;}
    .artist .box{width: 100%;height: 100%;border-top: 1px solid #d2d6de;}
    .tables{width: 100%;height: 70%;margin-top: 2%;overflow: auto;}
    .tables table th,td{text-align: center;}
    .tables table img{width: 36px;}
    .show_artist{margin-top: 10px; width: 100%;}
    .remove_artist{height:158px;width:106px;float:left;margin-right:10px;margin-top:10px;border:1px solid #cccccc;position:relative;padding:2px;}
    .remove_artist img{width:100px;height:100px}
    .remove_artist span{display:inherit;text-align:center;margin-top:5px}
    .remove_artist a{position:absolute;right:2px;color:red;font-weight: 700;font-size: 16px;}
    .cosplay{border-radius:5px;border-color:#18bc9c;text-align: center;})
</style>
<script>
function artist(){
    $('.artist').show();
    $('.subms').addClass('disabled');
}
function close_artist(){
    $('.artist').hide();
    $('.subms').removeClass('disabled');
}

function search_artist(){
    $('.removes').remove();
    var normal_name = $('.normal_name').val();
    var sex = $('#sex').val();
    var cid = $('#cid').val();
    //构造ajax、
    $.ajax({
        url:"/admin/health/search_artist/cid/"+cid,
        type:'post',
        // data:{'name名':val值}
        data:{'normal_name':normal_name,'sex':sex},
        dataType:'json',
        success:function(data){
          if(data){
            var len = data.length;
            var artist_tab = $('.artist_tab');
            for(var i = 0; i < len; i++){
                artist_tab.append('<tr class="removes" data-index="0"><td><input type="checkbox" name="checkbox[]" value="'+data[i].id+'"  ><input type="hidden" value="'+data[i].id+'"  name="ids[]" class="ids_'+data[i].id+'"/></td><td ><img class="img_'+data[i].id+'" src="'+data[i].head+'" /></td><td >'+data[i].normal_name+'</td><td class="name_'+data[i].id+'">'+data[i].normal_name+'</td><td >'+data[i].normal_name+'</td></tr>');
            }
          }else{
            alert('数据读取失败');
          }
        }
    })
}

//
function sure_artist(){
    // $('.remove_artist').remove();
    var chk_values =[];    
    $('input[name="checkbox[]"]:checked').each(function(){    
        chk_values.push($(this).val());    
    });
    if(chk_values.length==0){
        alert('你还没有选择任何内容！');
        return false;
    }else{
        var str = new Array(); //定义一数组 
        str = chk_values.toString().split(","); //字符分割 
        for (i=0;i<str.length ;i++ ) { 
            ids = $(".ids_"+str[i]+"").val();
            img = $(".img_"+str[i]+"").attr('src');
            name = $(".name_"+str[i]+"").text();
            var html = '<div class="remove_artist_'+ids+'"> <a href="javascript:void(0);" onclick="close_artist_img('+ids+')">X</a><input type="hidden" name="user[userid][]" value="'+ids+'"/> <img src="'+img+'"><span>'+name+'</span><input class="form-control cosplay" name="user[cosplay][]" placeholder="扮演角色"></div>';
            $(".show_artist").append(html);
            $('.artist').hide();
            $('.subms').removeClass('disabled');
            $('.remove_artist_'+ids+'').css({'height':'158px','width':'106px','float':'left','margin-right':'10px','margin-top':'10px','border':'1px solid #cccccc','position':'relative','padding':'2px'});
            $('.remove_artist_'+ids+' img').css({'width':'100px','height':'100px'});
            $('.remove_artist_'+ids+' span').css({'display':'inherit','text-align':'center','margin-top':'5px'});
            $('.remove_artist_'+ids+' a').css({'position':'absolute','right':'2px','color':'red','font-weight':'700','font-size':'16px'});
            $('.cosplay').css({'border-radius':'5px','border-color':'#18bc9c','text-align':'center'})
        } 
    }
}
function close_artist_img(ids){
    $(".remove_artist_"+ids+"").remove();
}
</script>

    <div class="form-group">
        <label for="c-description" class="control-label col-xs-12 col-sm-2"><?php echo __('简介'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea id="c-description" class="form-control summernote editor" rows="5" name="row[description]" cols="50"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="c-analysis" class="control-label col-xs-12 col-sm-2"><?php echo __('内容'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <!-- <textarea id="c-analysis" class="form-control summernote edit" rows="5" name="row[analysis]" cols="50"></textarea> -->
            <textarea name="row[content]" id="ueditors" cols="30" rows="10"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="content" class="control-label col-xs-12 col-sm-2"><?php echo __('首页展示'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <label for="row[is_index]-normal"><input name="row[is_index]" type="radio" value="1"> 是</label>
            <label for="row[is_index]-normal"><input name="row[is_index]" checked type="radio" value="0"> 否</label>
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