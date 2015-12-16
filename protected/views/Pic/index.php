<link rel="stylesheet" media="screen" type="text/css" href="<?php echo Yii::app()->request->baseUrl ?>/assets/home/pic/zoom-visualizer.css">
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/pic/jquery.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/pic/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/pic/ZoomVisualizer.js"></script>

<?php if(isset($ispid)){ ?>
<script type="text/javascript">
alert('该相册中没有照片');
</script>
<?php } ?>
<!-- ----------------------------------3d相册------------------------------------------ -->

 <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/home/pic/style.css" type="text/css" rel="stylesheet">


<div class="s-skin-wrap" data-d="">
  <div class="s-skin-inner">
    <div class="s-skin-content">
      <div class="s-star-wrap" id="s-skin-tshow">
        <div class="s-star-list" id="s-star-list">
          <ul style="padding: 0px; position: relative;" class="clearfix roundabout-holder">
           <?php  $num=0; ?>
           <?php
            foreach($parts as $part){
              $cates=Cate::model()->find('pid=:pid',array(':pid'=>$part->id));
          ?>
            <li data-scale="0.8743" style="position: absolute; left: -35px; top: 161px; z-index: 4; transform: scale(0.8743); opacity: 0.87;" class="s-star-item s-star-p10 roundabout-moveable-item" data-index="9" data-starid="1015" data-starname="<?php echo $part->name ?>"> <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/uploads/album/cover/<?php echo $part->picname; ?>" alt="<?php echo $part->name ?>">
              <div class="s-star-label clearfix"> 
                <span class="s-star-name" data-starid="1015" data-log="skinPreview" data-logparam="starId=1015"><?php echo $part->name ?>
                </span> 

                <?php //echo $this->createUrl('pic/pic',array('pid'=>$part->id)) ?>
                <a href="<?php echo $this->createUrl('pic/index',array('pid'=>$part->id))?>" class="ouyang-star-preview">打开相册
                </a> 
              </div>
            </li>
            <?php } ?>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <div id="rightArea" class="right-area">
    <div id="advertisement" class="ad-area"> </div>
  </div>
</div>





<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/pic/threeD.js"></script>
<!-- 加载后会导致a 连接无效

<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/pic/jquery-1.js"></script>
-->
<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/pic/jQueryRotate.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/pic/jquery_003.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/pic/jquery.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/pic/jquery_002.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/pic/sbase_291c3c91.js"></script>

<script type="text/javascript">F._setMod("superui");F._fileMap({"/js/ubase_ac2154f3.js":["superui","util/tool","util/emitter","util/dot","component","component/draggable","component/scrollbar","component/dialog","component/tips","component/share","component/share2","component/notify","component/suggestion","component/placeholder"],"/js/ubase_unused_216715a0.js":["component/draggsort","component/draggselect","component/draggdirs"],"/css/ubase_c9c757ef.css":["superui.css","dialog.css","tips.css","share.css","scrollbar.css","suggestion.css"],"/css/ubase_sync_ac0620ef.css":["scrollbar_sync.css"],"/js/utils_718740fc.js":["util/pubsub"]});</script><script type="text/javascript">F.module("activity:activity/login",function(d,c,b){var a=null;function e(){if(typeof passport!="undefined"){this.init()}}e.prototype={init:function(){var g=this,f=location.href.indexOf("activitygoddess")>-1?"/home/skin/show/activitygoddess?from_login=1":"/home/skin/show/activityskin?from_login=1";this.config={tangram:true,cache:true,type:"login",apiOpt:{product:"superplus",staticPage:s_domain.bs+"/home/xman/show/worldcupv3jump",memberPass:true,subpro:"superplus_activity",u:s_domain.bs+f},onLoginSuccess:function(h){h.returnValue=false;if(typeof g.config.jump=="function"){g.config.jump()}},forgetLink:"https://passport.baidu.com/?getpass_index&tpl=mn&u="+encodeURIComponent(s_session.afterReglink),registerLink:"https://passport.baidu.com/v2/?reg&regType=1&tpl=mn&u="+encodeURIComponent(s_session.afterReglink),authsite:["tsina","renren","qzone","tqq","fetion"]}},options:function(f,g){if(this.config){this.config[f]=g}},login:function(g,f){if(!this.inited){if(f){this.config.apiOpt.u=this.config.apiOpt.u+"&"+f}this.popup=passport.pop.init(this.config);this.inited=true}this.options("jump",g);this.show()},show:function(){if(this.popup){this.popup.show()}},hide:function(){if(this.popup){this.popup.hide()}}};return new e});F.addLog("activity:activity/log",["activitylog"]);F.module("activity:activity/log",function(g,e,c){var a=$(document.body),d=a.attr("data-logactid"),f=location.pathname.match(/\/home\/xman\/show\/(.+)/i)||location.pathname.match(/\/home\/skin\/show\/(.+)/i);f=(f?f[1]:"default");var b={init:function(){a.on("mousedown",function(j){var i=$(j.target),h=i.attr("data-log"),k=i.attr("data-logparam");if(h){b.send("click",h,k)}})},send:function(i,h,k){var j={logactid:d};j[i+"Type"]=f+h;if(i=="show"){j.logactid=d.replace(/1$/,"0")}if(k){$.each((k||"").split(";"),function(n,p){var l=(p||"").split("="),m,o;m=l[0];o=l[1];j[m]=o})}c.fire("activitylog",j)}};return b});F.module("activity:activity/topmenu",function(d,c,b){var f=d("activity:activity/login"),a=d("activity:activity/log");var e={init:function(){this.initUser();this.initLogin();this.initLog()},initLog:function(){var g=(location.href||"").match(/(?:super_frm|from_reg|from_login)=[^&]+/ig)||[];a.init();$("a").each(function(){var i=$(this),h=i.attr("href")||"";if(h=="/"||h.match(/^http(s)?:\/\/(www|yulan)\.baidu\.com(\/)?[^\/]?$/)){i.attr("href",h+=g.length?(h.indexOf("?")>0?"&":"?")+g.join("&"):"")}})},initLogin:function(){$(".s-login").on("click",function(){f.login(function(){var g=location.href.replace(/(&|\?)from_login=1/,"");window.location.href=g+(g.indexOf("?")>-1?"&":"?")+"from_login=1"})})},initUser:function(){var g=$(".s-activity-username"),h=g.find(".s-activity-userlist");g.on("mouseenter mouseleave",function(i){h[i.type=="mouseleave"?"hide":"show"]()});g.find(".facebook").on("click",function(){h.hide();if(!$(".feedback_check_qa").get(0)){$.getScript("http://f3.baidu.com/index.php/feedback/zx/loadfeedback?pid=1&v=2014225",function(){if(bds&&bds.qa&&bds.qa.ShortCut&&bds.qa.ShortCut.initRightBar){bds.qa.ShortCut.initRightBar()}$("#feedback-dialog-header").delegate(".feedback-close","click",function(i){$("#feedback_right_dialog_pagecanvas2").remove()})})}else{if(bds&&bds.qa&&bds.qa.ShortCut&&bds.qa.ShortCut.initRightBar){bds.qa.ShortCut.initRightBar()}}return false});g.find(".logout").on("click",function(){window.location.href=s_domain.logout+document.location.href;return false})}};c.init=function(){e.init()}});F.call("activity:activity/topmenu","init");</script><script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/pic/goddess_min_d1c0f6e5.js">
</script>

<!------------------------------------------ 遮罩 ----------------------------------- -->



<?php if(!empty($_GET['pid'])){ ?>
<script type="text/javascript">

      jQuery(document).ready(function()  {
          $(window).ZoomVisualizer({
              added: added,
              removed: removed,
              object: '#zoom-visualizer',
              resizeInitial: true,
              centerThumbs: true,
             // loader: "<?php echo Yii::app()->request->baseUrl ?>/assets/home/pic/ajax-loader-overlay.gif",
              sliderOrientation: "vertical",
              positionZoom: {
                  left: 10,
                  right: 10,
                  top:10,
                  bottom:10
              }

          });
          function added() {
              console.log("相册打开了！");
          }

          function removed() {
              console.log("相册关闭了！");
          }
      });

</script>
  <?php } ?>

<style type="text/css">
      .clear {
        clear: both !important;
        float: none !important;
        margin: 0px !important;
        padding: 0px !important;
        height: 0px !important;
        width: 0px !important
      }
      .clearfix:after {
        content: ".";
        display: block;
        clear: both;
        visibility: hidden;
        line-height: 0;
        height: 0;
      }
      .clearfix {
        display: inline-block;
      }
      html[xmlns] .clearfix {
        display: block;
      }
      * html .clearfix {
        height: 1%;
      }
      img {
        display: block;
      }
      input, textarea {
        color: #999999;
      }
      select {
        color: #999999;
      }
      .oldBrowser {
        display: none !important
      }
      .center {
        width: 1000px;
        margin: 0 auto;
        text-align: left
      }
      /*
      body {
        background: #f7f6f6;
        font-family: 'Roboto', sans-serif;
        font-size: 14px;
        line-height: 20px;
        color: #555;
        font-weight: 100;
      }*/
</style>


<div id="zoom-visualizer" >
  <div class="lightbox-ofertas-bg"></div>
  <div class="lightbox">
    <div class="header">
      <div class="inside">
        <div id="wrapper-fechar" class="tooltip-content">
          <div class="tooltip">
            <p>Close</p>
            <span></span> </div>
          <a href="" class="fechar tooltip-caller"></a>
          <div class="clear"></div>
        </div>
        <div id="zoom">
          <div>
            <div class="tooltip-content">
              <div class="tooltip">
                <p>Zoom Out</p>
                <span></span> </div>
              <a href="#" class="zoom-out tooltip-caller"></a> </div>
            <div id="wrapper-barra-zoom" class="tooltip-content">
              <div class="tooltip">
                <p>Zoom</p>
                <span></span> </div>
              <div class="tooltip-caller wrapper-barra"> <span id="barra"> <strong id="scroll" class="ui-draggable" style="position: relative; left: 0px;"> </strong> </span> </div>
            </div>
            <div class="tooltip-content">
              <div class="tooltip">
                <p>Zoom In</p>
                <span></span> </div>
              <a href="#" class="zoom-in tooltip-caller"></a> </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <?php 
    if(!empty($_GET['pid'])){ 
        $cate=Cate::model()->find('pid=:pid',array(':pid'=>$_GET['pid']));
        }
        ?>
    <div class="content"> 
      <a href="" id="next"></a>
      <div class="wrapper" style="width: 1415px; height: 362px;">
        <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/uploads/album/<?php if(!empty($_GET['pid'])) {echo $cate->name; }?>" class="dragme">
      </div>
      <a href="" id="before"></a>
    </div>
    <div class="footer">
      <a href="#" id="aba-lista"><span>Hide Thumbnails</span></a>
      <div id="listagem-imagens">
        <div>

         <?php if(!empty($_GET['pid'])){ 
            $cates=Cate::model()->findAll('pid=:pid',array(':pid'=>$_GET['pid']));
            reset($cates);
            foreach($cates as $cate):?>   
          <!--  <a class="item-zoom-image ativo" href="img/camiseta_hombre_jackknife_negra.jpg" alt="0"><img src="img/camiseta_hombre_jackknife_negra-thumb.jpg"> </a> -->
               
            <a class="item-zoom-image ativo" href="<?php echo Yii::app()->request->baseUrl ?>/assets/uploads/album/<?php echo $cate->name ?>" alt="0">
            <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/uploads/album/<?php echo $cate->thumbname ?>"> 
            </a>
           <?php endforeach; } ?>
            <div class="clear"></div>
        </div>
      </div>      
    </div>


  </div>
</div>

