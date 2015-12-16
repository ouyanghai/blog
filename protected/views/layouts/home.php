<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>欧阳个人博客</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="个人网站模板" />
<meta name="description" content="这是一个有关黑色时间轴的网站" />
<link href="<?php echo Yii::app()->request->baseurl ?>/assets/home/css/styles.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseurl ?>/assets/home/css/animation.css" rel="stylesheet">
<!-- 返回顶部调用 begin -->
<link href="<?php echo Yii::app()->request->baseurl ?>/assets/home/css/lrtk.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/public/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/public/js/js.js"></script>
<!-- 返回顶部调用 end-->
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
</head>
<body>
<header>
  <nav id="nav">
    <ul>
      <li><a href="<?php echo $this->createUrl('index/index') ?>" >网站首页</a></li>
      <li><a href="<?php echo $this->createUrl('pic/index') ?>"  title="相册">岁月容颜</a></li>
      <li><a href="<?php echo $this->createUrl('art/index') ?> " title="心情">心境变迁</a></li> 
      <li><a href="#"  title="视频">慢生活</a></li>
      <li><a href="#"  title="音乐">倾听世界</a></li>

      <li><a href="#"  title="自己发表的文章">碎言碎语</a></li>
      <li><a href="#"  title="前端模板">前端模板</a></li>
      <li><a href="#"  title="技术探讨">技术探讨</a></li>
      <li><a href="#" title="推荐文章">推荐文章</a></li>
    </ul>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/public/js/silder.js"></script><!--获取当前页导航 高亮显示标题--> 
  </nav>
</header>
<!--header end-->




<div id="mainbody">
  <div class="info">
    <figure> <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/art.jpg"  alt="Panama Hat">
      <figcaption><strong>渡人如渡己，渡已，亦是渡</strong> 当我们被误解时，会花很多时间去辩白。 但没有用，没人愿意听，大家习惯按自己的所闻、理解做出判别，每个人其实都很固执。与其努力且痛苦的试图扭转别人的评判，不如默默承受，给大家多一点时间和空间去了解。而我们省下辩解的功夫，去实现自身更久远的人生价值。其实，渡人如渡己，渡已，亦是渡人。</figcaption>
    </figure>
    <div class="card">
      <h1>我的名片</h1>
      <p>网名：逝 | 独步巅峰</p>
      <p>职业：网站设计师</p>
      <p>电话：13008821086</p>
      <p>Email：1114374850@qq.com</p>
      <ul class="linkmore">
        <li><a href="#" class="talk" title="给我留言"></a></li>
        <li><a href="#" class="address" title="联系地址"></a></li>
        <li><a href="#" class="email" title="给我写信"></a></li>
        <li><a href="#" class="photos" title="生活照片"></a></li>
       <!-- <li><a href="/" class="heart" title="关注我"></a></li> -->
      </ul>
    </div>
  </div>
  <!--info end-->





  <div class="blank"></div>
  <div class="blogs">







<?php
  echo $content;
?>


<?php
  $model=Part::model();
  $parts=$model->findAll();
  $i=0;

  $arts=Art::model()->findAll();
  $j=0;
?>






    <aside>

     <div class="toppic">
        <h2>岁月容颜</h2>
        <ul>
        <?php foreach($parts as $part): ?>
        <?php 
        $i++;
        if($i===4) break;
            $cates=Cate::model()->find('pid=:pid',array(':pid'=>$part->id));
         ?>
          <li><a href="<?php echo $this->createUrl('pic/index',array('pid'=>$part->id)) ?>"><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/uploads/album/cover/<?php echo $part->picname; ?>"><?php echo $part->name; ?>
            </a></li>
        <?php endforeach; ?>
            <li style="float:right"><a href="<?php echo $this->createUrl('pic/index') ?>">打开相册&gt;&gt;</a></li>
        </ul>
      </div>




       <div class="clicks">
        <h2>心境变迁</h2>
        <ol>
        <?php foreach($arts as $art): ?>
         <?php  
         $j++;
        if($j===4) break;
        ?>
          <li>
            <span><a href="<?php echo $this->createUrl('art/art',array('id'=>$art->id)) ?>"><?php echo $art->title ?></a></span>
            </li>

          <?php endforeach; ?>
          <li style="float:right"><a href="<?php echo $this->createUrl('art/index') ?>">更多&gt;&gt;</a></li>
         </ol>
      </div>




      <div class="tuijian">
        <h2>推荐文章</h2>
        <ol>
          <li><span><strong>1</strong></span><a href="/">有一种思念，是淡淡的幸福,一个心情一行文字</a></li>
          <li><span><strong>2</strong></span><a href="/">励志人生-要做一个潇洒的女人</a></li>
          <li><span><strong>3</strong></span><a href="/">女孩都有浪漫的小情怀——浪漫的求婚词</a></li>
          <li><span><strong>4</strong></span><a href="/">Green绿色小清新的夏天-个人博客模板</a></li>
          <li><span><strong>5</strong></span><a href="/">女生清新个人博客网站模板</a></li>
          <li><span><strong>6</strong></span><a href="/">Wedding-婚礼主题、情人节网站模板</a></li>
          <li><span><strong>7</strong></span><a href="/">Column 三栏布局 个人网站模板</a></li>
          <li><span><strong>8</strong></span><a href="/">时间煮雨-个人网站模板</a></li>
          <li><span><strong>9</strong></span><a href="/">花气袭人是酒香—个人网站模板</a></li>
        </ol>
      </div>

     

     
<!--
      <div class="search">
        <form class="searchform" method="get" action="#">
          <input type="text" name="s" value="Search" onfocus="this.value=''" onblur="this.value='Search'">
        </form>
      </div>
-->
      <div class="viny">
        <dl>
          <dt class="art"><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/artwork.png" alt="专辑"></dt>
          <dd class="icon-song"><span></span>南方姑娘</dd>
          <dd class="icon-artist"><span></span>歌手：赵雷</dd>
          <dd class="icon-album"><span></span>所属专辑：《赵小雷》</dd>
          <dd class="icon-like"><span></span><a href="/">喜欢</a></dd>
          <dd class="music">
            <audio src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/nf.mp3" controls></audio>
          </dd>
          <!--也可以添加loop属性 音频加载到末尾时，会重新播放-->
        </dl>
      </div>


    </aside>
  </div>
  <!--blogs end--> 
</div>
<!--mainbody end-->



<footer>
  <div class="footer-mid">
  <div class="visitors">
  <h2>微信</h2>
  <ul>
       
        <li><a href="/"><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/04.jpg"></a></li>
  </ul>
  </div>
   <!-- <div class="links">
      <h2>友情链接</h2>
      <ul>
        <li><a href="/">杨青个人博客</a></li>
        <li><a href="http://www.3dst.com">3DST技术服务中心</a></li>
      </ul>
    </div>     
    <div class="visitors">
      <h2>最新评论</h2>
      <dl>
        <dt><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/s8.jpg">
        <dt>
        <dd>DanceSmile
          <time>49分钟前</time>
        </dd>
        <dd>在 <a href="#" class="title">如果要学习web前端开发，需要学习什么？ </a>中评论：</dd>
        <dd>文章非常详细，我很喜欢.前端的工程师很少，我记得几年前yahoo花高薪招聘前端也招不到</dd>
      </dl>
      <dl>
        <dt><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/s7.jpg">
        <dt>
        <dd>yisa
          <time>2小时前</time>
        </dd>
        <dd>在 <a href="#" class="title">芭蕾女孩的心事儿</a>中评论：</dd>
        <dd>我手机里面也有这样一个号码存在</dd>
      </dl>
      <dl>
        <dt><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/s6.jpg">
        <dt>
        <dd>小林博客
          <time>8月7日</time>
        </dd>
        <dd>在 <a href="http://www.yangqq.com/jstt/bj/2013-06-18/285.html" class="title">如果个人博客网站再没有价值，你还会坚持吗？ </a>中评论：</dd>
        <dd>博客色彩丰富，很是好看</dd>
      </dl>
    </div>

    -->
  
    <section class="flickr">
      <h2>摄影作品</h2>
      <ul>
       
        <li><a href="/"><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/04.jpg"></a></li>
        <li><a href="/"><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/05.jpg"></a></li>
        <li><a href="/"><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/06.jpg"></a></li>
        <li><a href="/"><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/07.jpg"></a></li>
        <li><a href="/"><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/08.jpg"></a></li>
        <li><a href="/"><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/09.jpg"></a></li>
      </ul>
    </section>

  </div>
  <div class="footer-bottom">
    <p>Copyright 2015 Design by <a href="#">独步巅峰</a></p>
  </div>
</footer>
<!-- jQuery仿腾讯回顶部和建议 代码开始 -->
<div id="tbox"> 
<!--
<a id="togbook" href="#"></a>
-->
 <a id="gotop" href="#"></a> 
 </div>
<!-- 代码结束 -->
</body>
</html>